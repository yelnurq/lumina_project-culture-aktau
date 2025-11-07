@extends('layouts.app')

@section('content')

{{-- <div class="mx-auto px-6 max-w-6xl mt-10 mb-16"> --}}
<div class="px-6 sm:mx-6 md:mx-16 lg:mx-24 mt-10 mb-16">
    {{-- 🔹 Навигация --}}
    <div class="pb-6 border-b border-gray-300 mb-6">
        <nav class="text-sm text-gray-500 mb-4">
            <ol class="list-reset flex flex-wrap justify-left md:justify-start space-x-2">
                <li>
                    <a href="/" class="hover:underline text-blue-600" data-lang="restaurant_breadcrumb_home">
                        Главная
                    </a>
                </li>
                <li>/</li>
                <li class="text-gray-700" data-lang="restaurant_breadcrumb_current">
                    Вкусно покушать
                </li>
            </ol>
        </nav>

        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 text-left md:text-left" data-lang="restaurant_header_title">
            Рестораны Мангистауской области
        </h1>
        <p class="text-gray-600 mt-2 text-sm sm:text-base text-left md:text-left" data-lang="restaurant_header_description">
            Каталог лучших заведений региона с описаниями, рейтингами и координатами на карте.
        </p>
    </div>

    {{-- 🔹 Переключатель "Список / Карта" --}}
    <div class="mb-6 flex flex-wrap gap-2 text-sm font-semibold">
        <button 
            onclick="switchTab('list')" 
            id="listTab" 
            class="px-4 py-2 rounded-lg bg-blue-600 text-white flex-1 md:flex-none"
            data-lang="culture_tab_list"
        >
            Список
        </button>
        <button 
            onclick="switchTab('map')" 
            id="mapTab" 
            class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 flex-1 md:flex-none"
            data-lang="culture_tab_map"
        >
            На карте
        </button>
    </div>

    {{-- 🔹 Карта --}}
    <div id="mapSection" class="rounded-xl shadow-lg overflow-hidden mb-12 h-[400px] sm:h-[600px] md:h-[700px] border border-gray-200 hidden"></div>

    {{-- 🔹 Список ресторанов --}}
    <div id="listSection">
        @if ($restaurants->isEmpty())
            <div class="text-center text-gray-500 text-lg py-16" data-lang="restaurant_empty_message">
                Пока нет ресторанов.
            </div>
        @else
            <div class="space-y-6">
                @foreach ($restaurants as $restaurant)
                <a href="{{ route('restaurants.show', $restaurant->id) }}" 
                   class="relative rounded-[12px] overflow-hidden flex flex-col md:flex-row cursor-pointer transform transition duration-300 gap-5 hover:shadow-lg  bg-white"
                   data-lat="{{ $restaurant->latitude }}"
                   data-lng="{{ $restaurant->longitude }}"
                   data-id="{{ $restaurant->id }}">
                   
                    {{-- Фото ресторана --}}
                    <img src="{{ asset('storage/' . $restaurant->image) }}" 
                         alt="{{ $restaurant->title_ru }}" 
                         loading="lazy"
                         class="w-full md:w-1/3 object-cover h-[220px] sm:h-[280px] md:h-[300px]">

                    <div class="p-4 sm:p-6 flex flex-col justify-between md:w-2/3">
                        {{-- Название и адрес --}}
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                            <h3 class="font-bold text-xl text-gray-800">{{ $restaurant->title_ru }}</h3>
                            @if ($restaurant->address_ru)
                                <span class="text-sm text-gray-500">{{ $restaurant->address_ru }}</span>
                            @endif
                        </div>

                        {{-- Рейтинг --}}
                        <div class="flex items-center text-yellow-400 mt-2">
                            <span>⭐️⭐️⭐️⭐️☆</span>
                            <span class="ml-2 text-gray-600 text-sm">4.7</span>
                        </div>

                        {{-- Краткое описание --}}
                        <p class="text-gray-700 mt-3 text-sm leading-relaxed">
                            {{ $restaurant->excerpt_ru ?? $restaurant->excerpt_en }}
                        </p>

                        {{-- Контактная информация --}}
                        <div class="mt-4 flex items-center gap-3 text-sm text-blue-600 flex-wrap">
                            @if ($restaurant->phone)
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-phone"></i> 
                                    <span>{{ $restaurant->phone }}</span>
                                </div>
                                <span class="text-gray-400">•</span>
                            @endif

                            @if ($restaurant->working_hours)
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-clock"></i>
                                    <span>{{ $restaurant->working_hours }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        @endif

        <div class="mt-10">
            {{ $restaurants->links('vendor.pagination.tailwind') }}
        </div>
    </div>

   <section class="mb-12">
            <h2 class="text-[18px] font-semibold mb-4 text-[#444]">Рекомендованные отели области</h2>

            <div class="grid md:grid-cols-3 gap-5">
                @if(isset($hotels) && $hotels->count())
                    @foreach ($hotels as $item)
                        <a href="{{ route('hotels.show', $item->id) }}" 
                        class="block rounded-xl overflow-hidden border hover:shadow-lg transition bg-white">
                            @if ($item->images->first())
                                <img src="{{ asset('storage/' . $item->image) }}" 
                                    alt="{{ $item->title }}" 
                                    class="w-full h-52 object-cover">
                            @else
                                <img src="https://placehold.co/400x250?text=Culture" 
                                    class="w-full h-52 object-cover" 
                                    alt="{{ $item->title }}">
                            @endif

                            <div class="p-4">
                                <h3 class="font-semibold text-gray-800">
                                    {{ $item->title_ru ?? 'Без названия' }}
                                </h3>
                                <p class="text-gray-600 text-sm mt-1 line-clamp-3">
                                    {{ Str::limit($item->description, 100) ?? 'Описание отсутствует.' }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                @else
                    @foreach (range(1,3) as $i)
                        <a href="#" class="block rounded-xl overflow-hidden border hover:shadow-lg transition bg-white">
                            <img src="https://placehold.co/400x250?text=Culture+{{ $i }}" 
                                class="w-full h-52 object-cover" 
                                alt="Культура {{ $i }}">
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-800">Культурный объект {{ $i }}</h3>
                                <p class="text-gray-600 text-sm mt-1">Краткое описание объекта культурного наследия.</p>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </section>

</div>

{{-- 🔹 Скрипт карты --}}
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
const map = L.map('mapSection').setView([44.59, 51.50], 7);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);

const allRestaurants = @json($allRestaurants);

allRestaurants.forEach(r => {
    const lat = parseFloat(r.latitude);
    const lng = parseFloat(r.longitude);
    const title = r.title_ru ?? 'Ресторан';
    const url = `/restaurants/${r.id}`;

    if (!isNaN(lat) && !isNaN(lng)) {
        const marker = L.circleMarker([lat, lng], {
            radius: 8,
            fillColor: '#E53935',
            color: '#fff',
            weight: 1,
            opacity: 1,
            fillOpacity: 0.8
        }).addTo(map);

        marker.bindPopup(`<strong>${title}</strong><br><a href="${url}" target="_blank" style="color:#2563EB">Перейти к ресторану</a>`);
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
        map.invalidateSize();
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
@endsection
