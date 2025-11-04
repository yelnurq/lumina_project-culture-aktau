@extends('layouts.app')

@section('content')

<div class="mx-4 md:mx-24 mt-[40px] mb-16">

<div class="pb-6 border-b border-gray-300 mb-6">
    <nav class="text-sm text-gray-500 mb-4">
        <ol class="list-reset flex space-x-2">
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

    <h1 class="text-3xl font-bold text-gray-800" data-lang="restaurant_header_title">
        Рестораны Мангистауской области
    </h1>
    <p class="text-gray-600 mt-2 text-sm" data-lang="restaurant_header_description">
        Каталог лучших заведений региона с описаниями, рейтингами и координатами на карте.
    </p>
</div>

{{-- 🔹 Фильтры и поиск --}}
<div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4">
    <div class="flex items-center space-x-4 text-sm font-semibold">
        <button 
            onclick="switchTab('list')" 
            id="listTab" 
            class="px-4 py-2 rounded-lg bg-blue-600 text-white"
            data-lang="restaurant_tab_list"
        >
            Список
        </button>
        <button 
            onclick="switchTab('map')" 
            id="mapTab" 
            class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700"
            data-lang="restaurant_tab_map"
        >
            На карте
        </button>
    </div>
</div>


    {{-- 🔹 Карта --}}
    <div id="mapSection" class="rounded-xl shadow-lg overflow-hidden mb-12 h-[700px] border border-gray-200 hidden"></div>

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
       class="relative rounded-[12px] overflow-hidden flex flex-col md:flex-row cursor-pointer transform transition duration-300 gap-5 hover:shadow-lg hover:-translate-y-1"
       data-lat="{{ $restaurant->latitude }}"
       data-lng="{{ $restaurant->longitude }}"
       data-id="{{ $restaurant->id }}">
       
        {{-- Фото ресторана --}}
        <img src="{{ asset('storage/' . $restaurant->image) }}" 
             alt="{{ $restaurant->title_ru }}" 
             loading="lazy"
             class="w-full md:w-1/3 object-cover h-[300px]">

        <div class="p-4 justify-between md:w-2/3">
            {{-- Название и адрес --}}
            <div class="flex items-center justify-between flex-wrap">
                <h3 class="font-bold text-xl text-gray-800">{{ $restaurant->title_ru }}</h3>
                @if ($restaurant->address_ru)
                    <span class="text-sm text-gray-500">{{ $restaurant->address_ru }}</span>
                @endif
            </div>

            {{-- Рейтинг (опционально, можно заменить на реальный) --}}
            <div class="flex items-center text-yellow-400 mt-2">
                <span>⭐️⭐️⭐️⭐️☆</span>
                <span class="ml-2 text-gray-600 text-sm">4.7</span>
            </div>

            {{-- Краткое описание (excerpt) --}}
            @if ($restaurant->excerpt_ru)
                <p class="text-gray-700 mt-3 text-sm leading-relaxed">
                    {{ $restaurant->excerpt_ru}}
                </p>
            @else
                <p class="text-gray-700 mt-3 text-sm">{{ $restaurant->excerpt_en}}</p>
            @endif

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



    {{-- 🔹 Рекомендованные рестораны --}}
    <div class="mt-20">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Рекомендованные места</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @for ($i = 1; $i <= 3; $i++)
                <div class="rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition bg-white">
                    <img src="/images/demo/rest{{ $i }}.jpg" class="w-full h-48 object-cover" alt="">
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-gray-800">Demo Restaurant {{ $i }}</h3>
                        <p class="text-gray-500 text-sm mt-1">г. Актау • Европейская кухня</p>
                        <p class="text-sm text-gray-700 mt-3">Современное меню, уютная атмосфера и панорамный вид на Каспий.</p>
                    </div>
                </div>
            @endfor
        </div>
    </div>

</div>

{{-- 🔹 Карта и переключатель --}}
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
