@extends('layouts.app')



@section('content')
<div class="mx-4 md:mx-24 mt-[40px] mb-16">
    <div class="pb-6 border-b border-gray-300 mb-6">
            <nav class="text-sm text-gray-500 mb-4">
            <ol class="list-reset flex space-x-2">
                <li><a href="/" class="hover:underline text-blue-600">Главная</a></li>
                <li>/</li>
                <li class="text-gray-700">Вкусно покушать</li>
            </ol>
        </nav>
        <h1 class="text-3xl font-bold text-gray-800">Рестораны Мангистауской области</h1>
        <p class="text-gray-600 mt-2 text-sm">
            Каталог ресторанов Мангистауской области с координатами для отображения на карте.
        </p>
    </div>

    <div class="mb-6 flex space-x-4 text-sm font-semibold">
        <button onclick="switchTab('list')" id="listTab" class="px-4 py-2 rounded-lg bg-blue-600 text-white">Список</button>
        <button onclick="switchTab('map')" id="mapTab" class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700">На карте</button>
    </div>

    <div id="mapSection" class="rounded-xl shadow-lg overflow-hidden mb-12 h-[700px] border border-gray-200 hidden"></div>

    <div id="listSection">
    @if ($restaurants->isEmpty())
        <div class="text-center text-gray-500 text-lg py-16">
            Пока нет ресторанов.
        </div>
    @else
        <div class="space-y-6">
            @foreach ($restaurants as $restaurant)
                <a href="{{ route('restaurants.show', $restaurant->id) }}" 
                   class="relative  rounded-[12px] overflow-hidden flex flex-col md:flex-row cursor-pointer transform transition duration-300 gap-5 "
                   data-lat="{{ $restaurant->latitude }}"
                   data-lng="{{ $restaurant->longitude }}"
                   data-id="{{ $restaurant->id }}">
                   
                    <img src="{{ asset('storage/' . $restaurant->image) }}" 
                         alt="{{ $restaurant->title_ru }}" 
                         loading="lazy"
                         class="w-full md:w-1/3 object-cover h-20 md:h-auto" style="height: 350px">

                    <div class="p-4 justify-between md:w-2/3">
                        <h3 class="font-bold text-xl text-gray-800">{{ $restaurant->title_ru }}</h3>

                        <div class="flex items-center text-yellow-400" style="margin: 5px 0">
                            <span>⭐️⭐️⭐️⭐️⭐️</span>
                            <span class="ml-2 text-gray-600 text-sm">5.0</span>
                        </div>

                        <p class="text-gray-700" style="margin: 20px 0; font-weight:400">Казахская кухня</p>
                        <p class="text-gray-800 text-m" style="font-weight: 500; ">{{ Str::limit($restaurant->description_ru, 350) }}</p>

                    </div>

                </a>
            @endforeach
        </div>
    @endif

    <div class="mt-10">
        {{ $restaurants->links('vendor.pagination.tailwind') }}
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

const allRestaurants = @json($allRestaurants);

allRestaurants.forEach(r => {
    const lat = parseFloat(r.latitude);
    const lng = parseFloat(r.longitude);
    const title = r.title_ru ?? 'Ресторан';
    const url = `/restaurants/${r.id}`;

    if (!isNaN(lat) && !isNaN(lng)) {
        const marker = L.circleMarker([lat, lng], {
            radius: 8,
            fillColor: 'red',
            color: '#000',
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
