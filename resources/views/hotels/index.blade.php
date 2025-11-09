@extends('layouts.app')

@section('content')

{{-- <div class="mx-auto px-6 max-w-6xl mt-10 mb-16"> --}}
<div class="px-6 sm:mx-6 md:mx-16 lg:mx-24 mt-10 mb-16">
    {{-- 🔹 Навигация --}}
    <div class="pb-6 border-b border-gray-300 mb-6">
        <nav class="text-sm text-gray-500 mb-4">
            <ol class="list-reset flex flex-wrap justify-left md:justify-start space-x-2">
                <li>
                    <a href="/" class="hover:underline text-blue-600" data-lang="hotel_breadcrumb_home">
                        Главная
                    </a>
                </li>
                <li>/</li>
                <li class="text-gray-700" data-lang="hotel_breadcrumb_current">
                    Отели
                </li>
            </ol>
        </nav>

        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 text-left md:text-left" data-lang="hotel_header_title">
            Отели Мангистауской области
        </h1>
        <p class="text-gray-600 mt-2 text-sm sm:text-base text-left md:text-left" data-lang="hotel_header_description">
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
{{-- 🔹 Список отелей --}}
<div id="listSection">
    @if ($hotels->isEmpty())
        <div class="text-center text-gray-500 text-lg py-16" data-lang="hotel_empty_message">
            Пока нет отелей.
        </div>
    @else
        <div class="flex flex-col gap-6">
            @foreach ($hotels as $hotel)
            <a href="{{ route('hotels.show', $hotel->id) }}" 
               class="group block rounded-2xl overflow-hidden bg-white border border-gray-200 hover:shadow-xl transition-all duration-300 flex flex-col md:flex-row"
               data-lat="{{ $hotel->latitude }}"
               data-lng="{{ $hotel->longitude }}"
               data-id="{{ $hotel->id }}">
               
                {{-- Фото --}}
                <div class="relative h-56 md:h-auto md:w-1/3 overflow-hidden">
                    <img src="{{ asset('storage/' . $hotel->image) }}" 
                         alt="{{ $hotel->title_ru }}" 
                         loading="lazy"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                    {{-- Мини-тег рейтинга --}}
                    <div class="absolute top-3 right-3 bg-white/90 text-yellow-500 px-2 py-1 rounded-md text-sm font-medium shadow">
                        ⭐ 4.7
                    </div>
                </div>

                {{-- Контент карточки --}}
                <div class="p-5 flex flex-col justify-between md:w-2/3">
                    {{-- Название --}}
                    <h3 class="text-lg font-semibold text-gray-800 mb-1 group-hover:text-blue-600 transition">
                        {{ $hotel->title_ru }}
                    </h3>

                    {{-- Адрес --}}
                    @if ($hotel->address_ru)
                        <div class="text-sm text-gray-500 mb-3 flex items-center gap-2">
                            <i class="fa-solid fa-location-dot text-blue-500"></i>
                            <span class="line-clamp-1">{{ $hotel->address_ru }}</span>
                        </div>
                    @endif

                    {{-- Описание --}}
                    <p class="text-sm text-gray-600 mb-4 line-clamp-3">
                        {{ $hotel->excerpt_ru ?? 'Описание отсутствует.' }}
                    </p>

                    {{-- Контакты / Часы --}}
                <div class="flex items-center justify-between text-sm text-gray-700 mt-auto">
                    @if ($hotel->phone)
                        <div class="flex items-center gap-2 text-blue-500">
                            {{-- Телефонная иконка --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M1 5V1h6v4L4.5 7.5l4 4L11 9h4v6h-4C5.477 15 1 10.523 1 5z"/>
                            </svg>
                            <span>{{ $hotel->phone }}</span>
                        </div>
                    @endif

                    @if ($hotel->working_hours)
                        <div class="flex items-center gap-2 text-blue-500">
                            {{-- Часовая иконка --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 16c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm-1-13v5.414L10.293 11.707l1.414-1.414L9 7.586V3H7z"/>
                            </svg>
                            <span>{{ $hotel->working_hours }}</span>
                        </div>
                    @endif
                </div>


                </div>
            </a>
            @endforeach
        </div>
    @endif

    <div class="mt-10">
        {{ $hotels->links('vendor.pagination.tailwind') }}
    </div>
</div>

<section class="mb-12">
    <h2 class="text-xl font-semibold mb-6 text-gray-800">Рекомендованные рестораны области</h2>

    <div class="grid gap-6 md:grid-cols-3">
        @if(isset($restaurants) && $restaurants->count())
            @foreach ($restaurants as $item)
                <a href="{{ route('restaurants.show', $item->id) }}" 
                   class="group flex flex-col rounded-2xl overflow-hidden bg-white border border-gray-200 hover:shadow-xl transition-all duration-300"
                   data-lat="{{ $item->latitude }}"
                   data-lng="{{ $item->longitude }}"
                   data-id="{{ $item->id }}">
                   
                    {{-- Фото ресторана --}}
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{ asset('storage/' . $item->image ?? 'placeholder.png') }}" 
                             alt="{{ $item->title }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                        {{-- Мини-тег рейтинга --}}
                        <div class="absolute top-3 right-3 bg-white/90 text-yellow-500 px-2 py-1 rounded-md text-sm font-medium shadow">
                            ⭐ 4.7
                        </div>
                    </div>

                    {{-- Контент карточки --}}
                    <div class="p-5 flex flex-col justify-between">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2 group-hover:text-blue-600 transition">
                            {{ $item->title_ru ?? 'Без названия' }}
                        </h3>

                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            {{ Str::limit($item->description_ru, 120) ?? 'Описание отсутствует.' }}
                        </p>

                  
                    </div>
                </a>
            @endforeach
        @else
            {{-- Заглушки, если нет ресторанов --}}
            @foreach (range(1,3) as $i)
                <div class="group flex flex-col rounded-2xl overflow-hidden bg-white border border-gray-200 hover:shadow-xl transition-all duration-300">
                    <div class="h-56 overflow-hidden">
                        <img src="https://placehold.co/400x250?text=Restaurant+{{ $i }}" 
                             alt="Ресторан {{ $i }}" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="p-5 flex flex-col justify-between">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Ресторан {{ $i }}</h3>
                        <p class="text-gray-600 text-sm mb-4">Краткое описание ресторана отсутствует.</p>
                    </div>
                </div>
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

const allHotels = @json($allHotels);

allHotels.forEach(r => {
    const lat = parseFloat(r.latitude);
    const lng = parseFloat(r.longitude);
    const title = r.title_ru ?? 'Ресторан';
    const url = `/hotels/${r.id}`;

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
