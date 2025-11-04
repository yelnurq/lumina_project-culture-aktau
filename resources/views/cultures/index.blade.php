@extends('layouts.app')

@section('content')
<div class="mx-4 md:mx-24 mt-[40px] mb-16">



<div class="pb-6 border-b border-gray-300 mb-6">
    <nav class="text-sm text-gray-500 mb-4">
        <ol class="list-reset flex space-x-2">
            <li>
                <a href="/" class="hover:underline text-blue-600" data-lang="culture_breadcrumb_home">
                    Главная
                </a>
            </li>
            <li>/</li>
            <li class="text-gray-700" data-lang="culture_breadcrumb_current">
                Объекты культуры
            </li>
        </ol>
    </nav>

    <h1 class="text-3xl font-bold text-gray-800" data-lang="culture_header_title">
        Объекты культуры Мангистауской области
    </h1>
    <p class="text-gray-600 mt-2 text-sm" data-lang="culture_header_description">
        Каталог природных объектов Мангистауской области: песчаные дюны, скалистые образования, каньоны, побережья и солёные озёра.
    </p>
</div>

<form method="GET" action="{{ route('cultures.index') }}" class="mb-4 flex flex-col md:flex-row gap-4 items-start md:items-auto">
    <input 
        name="search" 
        type="text" 
        placeholder="🔍 Поиск по названию..." 
        value="{{ request('search') }}"
        class="w-full md:w-1/3 px-4 py-2 rounded-lg border border-gray-300 text-sm"
        data-lang="culture_search_placeholder"
    >

<select name="category" class="w-full md:w-1/4 px-4 py-2 rounded-lg border border-gray-300 text-sm">
            <option value="">Все категории</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->name }}" {{ request('category') == $cat->name ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>

    <button 
        type="submit" 
        class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700"
        data-lang="culture_apply_button"
    >
        Применить
    </button>
</form>

@if(request('search') || request('category'))
<div class="mb-6 text-sm text-gray-700 flex items-center gap-4 flex-wrap">
    <div data-lang="culture_filters_label">Фильтры:</div>
    @if(request('search'))
        <span class="bg-gray-100 px-3 py-1 rounded-full" >
            <span data-lang="culture_filter_search">Поиск:</span> "{{ request('search') }}"
        </span>
    @endif
    @if(request('category'))
        <span class="bg-gray-100 px-3 py-1 rounded-full" >
            <span data-lang="culture_filter_category">Категория:</span> "{{ request('category') }}"
        </span>
    @endif
    <a href="{{ route('cultures.index') }}" class="text-red-500 hover:underline" data-lang="culture_reset_filters_btn">
        Сбросить фильтры
    </a>
</div>
@endif

<div class="mb-6 flex space-x-4 text-sm font-semibold">
    <button 
        onclick="switchTab('list')" 
        id="listTab" 
        class="px-4 py-2 rounded-lg bg-blue-600 text-white" 
        data-lang="culture_tab_list"
    >
        Список
    </button>
    <button 
        onclick="switchTab('map')" 
        id="mapTab" 
        class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700" 
        data-lang="culture_tab_map"
    >
        На карте
    </button>
</div>


    <div id="mapSection" class="rounded-xl shadow-lg overflow-hidden mb-12 h-[700px] border border-gray-200 hidden"></div>

    <div id="listSection">
        @if ($cultures->isEmpty())
            <div class="text-center text-gray-500 text-lg py-16" data-lang="culture_empty_message">
                Пока нет культурных объектов.
            </div>

        @else
            <div class="space-y-6">
                @foreach ($cultures->chunk(3) as $chunk)
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach ($chunk as $culture)
                            <a href="{{ route('cultures.show', $culture->id) }}" 
                            class="relative bg-white rounded-[12px] shadow-lg overflow-hidden cursor-pointer transform transition duration-300"
                            data-lat="{{ $culture->latitude }}"
                            data-lng="{{ $culture->longitude }}"
                            data-id="{{ $culture->id }}"
                            data-category="{{ strtolower($culture->category->name ?? 'other') }}">
                            
                                <img src="{{ asset('storage/' . $culture->image) }}" 
                                    alt="{{ $culture->title }}" 
                                    loading="lazy"
                                    class="w-full object-cover" style="height:20rem">

                                <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
                                    <h3 class="font-bold text-lg">{{ $culture->title }}</h3>
                                    <p class="text-sm">{{ Str::limit($culture->description) }}</p>
                                    <span class="block text-xs mt-1 text-gray-200">
                                        {{ $culture->category->name ?? 'Без категории' }}
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endforeach


            </div>
        @endif

        <div class="mt-10">
            {{ $cultures->withQueryString()->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
const map = L.map('mapSection').setView([44.59, 51.50], 7);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    const categoryColors = {
        'историческое здание': 'gold',
        'музей': 'red',
        'памятник': 'blue',
        'архитектура': 'green',
        'мемориал': 'orange',
        'default': 'gray'
    };

    const allCultures = @json($allCultures);

    allCultures.forEach(culture => {
        const lat = parseFloat(culture.latitude);
        const lng = parseFloat(culture.longitude);
        const title = culture.title ?? 'Объект';
        const url = `/cultures/${culture.id}`;
        const category = (culture.category?.name ?? 'default').toLowerCase().trim();
        const color = categoryColors[category] || categoryColors['default'];

        if (!isNaN(lat) && !isNaN(lng)) {
            const marker = L.circleMarker([lat, lng], {
                radius: 8,
                fillColor: color,
                color: '#000',
                weight: 1,
                opacity: 1,
                fillOpacity: 0.8
            }).addTo(map);

            marker.bindPopup(`<strong style="font-family:Montserrat">${title}</strong><br><a href="${url}" target="_blank" style="color:#2563EB">Перейти к объекту</a>`);
        }
    });

    function switchTab(tab) {
        const mapTab = document.getElementById('mapTab');
        const listTab = document.getElementById('listTab');
        const mapSection = document.getElementById('mapSection');
        const listSection = document.getElementById('listSection');

        if (tab === 'map') {
            mapSection.classList.remove('hidden');
            listSection.classList.add('hidden');
            map.invalidateSize(); // важно!
            mapTab.classList.add('bg-blue-600', 'text-white');
            mapTab.classList.remove('bg-gray-200', 'text-gray-700');
            listTab.classList.remove('bg-blue-600', 'text-white');
            listTab.classList.add('bg-gray-200', 'text-gray-700');
        } else {
            mapSection.classList.add('hidden');
            listSection.classList.remove('hidden');
            listTab.classList.add('bg-blue-600', 'text-white');
            listTab.classList.remove('bg-gray-200', 'text-gray-700');
            mapTab.classList.remove('bg-blue-600', 'text-white');
            mapTab.classList.add('bg-gray-200', 'text-gray-700');
        }
    }
</script>

{{-- 
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    const map = L.map('mapSection').setView([50.4111, 80.2275], 8);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    const categoryColors = {
        'историческое здание': 'gold',
        'музей': 'red',
        'памятник': 'blue',
        'архитектура': 'green',
        'мемориал': 'orange',
        'default': 'gray'
    };

    document.querySelectorAll('.culture-card').forEach(card => {
        const lat = parseFloat(card.dataset.lat);
        const lng = parseFloat(card.dataset.lng);
        const title = card.querySelector('h4')?.innerText ?? 'Объект';
        const url = card.getAttribute('href');
        const category = (card.dataset.category || 'default').trim().toLowerCase();
        const color = categoryColors[category] || categoryColors['default'];

        if (!isNaN(lat) && !isNaN(lng)) {
            const marker = L.circleMarker([lat, lng], {
                radius: 8,
                fillColor: color,
                color: '#000',
                weight: 1,
                opacity: 1,
                fillOpacity: 0.8
            }).addTo(map);

            marker.bindPopup(`<strong style="font-family:Montserrat">${title}</strong><br><a href="${url}" target="_blank" style="color:#2563EB">Перейти к объекту</a>`);
        }
    });

    // Вкладки "Список" / "Карта"
    function switchTab(tab) {
        const mapTab = document.getElementById('mapTab');
        const listTab = document.getElementById('listTab');
        const mapSection = document.getElementById('mapSection');
        const listSection = document.getElementById('listSection');

        if (tab === 'map') {
            mapSection.classList.remove('hidden');
            listSection.classList.add('hidden');
            map.invalidateSize(); // важно!
            mapTab.classList.add('bg-blue-600', 'text-white');
            mapTab.classList.remove('bg-gray-200', 'text-gray-700');
            listTab.classList.remove('bg-blue-600', 'text-white');
            listTab.classList.add('bg-gray-200', 'text-gray-700');
        } else {
            mapSection.classList.add('hidden');
            listSection.classList.remove('hidden');
            listTab.classList.add('bg-blue-600', 'text-white');
            listTab.classList.remove('bg-gray-200', 'text-gray-700');
            mapTab.classList.remove('bg-blue-600', 'text-white');
            mapTab.classList.add('bg-gray-200', 'text-gray-700');
        }
    }
</script> --}}
@endsection
