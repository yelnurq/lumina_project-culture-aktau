@extends('layouts.app')

@section('content')
<div class="bg-[#F8F8FA] min-h-screen text-[#1A1A1A] font-montserrat">
{{-- 🔹 Баннер (Статичный Immersive Hero) --}}
<div class="relative w-full h-[60vh] overflow-hidden border-b border-gray-200 bg-[#1A1A1A]">
    {{-- Основное изображение объекта --}}
    <img src="{{ asset('storage/' . $culture->image) }}" 
         class="w-full h-full object-cover" 
         alt="{{ $culture->title }}">

    {{-- Мягкий градиент для читаемости текста и перехода в фон --}}
    <div class="absolute inset-0 bg-gradient-to-t from-gray-300 via-black/30 to-black/30"></div>

    {{-- Контент поверх картинки --}}
    <div class="absolute inset-0 z-20 flex flex-col items-center justify-center text-center px-4 pointer-events-none">
        <span class="text-[#C5A367] text-[10px] uppercase tracking-[0.5em] font-bold mb-4 drop-shadow-md animate-fadeInUp">
            {{ $culture->category->name ?? 'Объект' }}
        </span>
        <h1 class="text-4xl md:text-6xl font-bold text-white uppercase tracking-tighter drop-shadow-2xl animate-fadeInUp delay-200">
            {{ $culture->title }}
        </h1>
    </div>
    
</div>
    <div class="container mx-auto px-6 max-w-6xl -mt-20 relative z-30 pb-24">
        
        {{-- Карточка с описанием --}}
        <div class="bg-white/90 backdrop-blur-2xl border border-white shadow-[0_30px_60px_-15px_rgba(0,0,0,0.05)] rounded-[3rem] p-8 md:p-16 overflow-hidden mb-16">
            {{-- Breadcrumbs --}}
            <nav class="mb-10">
                <ol class="flex items-center space-x-3 text-[9px] uppercase tracking-[0.2em] font-bold text-gray-400">
                    <li><a href="/" class="hover:text-[#C5A367] transition-all">Главная</a></li>
                    <li class="text-gray-300">/</li>
                    <li><a href="/culture-list" class="hover:text-[#C5A367] transition-all">Каталог</a></li>
                    <li class="text-gray-300">/</li>
                    <li class="text-[#C5A367]">{{ $culture->title }}</li>
                </ol>
            </nav>

            <div class="grid lg:grid-cols-12 gap-12">
                <div class="lg:col-span-7">
                    <h2 class="text-[#C5A367] text-xs font-bold uppercase tracking-widest mb-6 flex items-center gap-3">
                        <span class="w-8 h-px bg-[#C5A367]"></span> Об объекте
                    </h2>
                    <div class="text-gray-700 leading-[1.8] text-md lg:text-lg font-light space-y-6 italic-quotes">
                        {!! nl2br(e($culture->description)) !!}
                    </div>
                </div>

                <div class="lg:col-span-5">
                    <div class="bg-[#FBFBFD] border border-gray-100 rounded-3xl p-8 sticky top-24">
                        <h3 class="text-[#1A1A1A] font-bold mb-6 uppercase text-sm tracking-widest">Характеристики</h3>
                        <ul class="space-y-4 text-sm">
                            <li class="flex justify-between border-b border-gray-100 pb-3">
                                <span class="text-gray-400 uppercase text-[10px] font-bold tracking-wider">Категория</span>
                                <span class="text-[#C5A367] font-semibold">{{ $culture->category->name ?? '—' }}</span>
                            </li>
                            <li class="flex justify-between border-b border-gray-100 pb-3">
                                <span class="text-gray-400 uppercase text-[10px] font-bold tracking-wider">Координаты</span>
                                <span class="text-gray-800 font-mono">{{ $culture->latitude }}, {{ $culture->longitude }}</span>
                            </li>
                        </ul>
                        <a href="https://yandex.kz/maps/?pt={{ $culture->longitude }},{{ $culture->latitude }}&z=15" target="_blank" 
                           class="mt-8 w-full bg-[#1A1A1A] text-white text-center py-4 rounded-2xl text-[10px] font-bold uppercase tracking-widest hover:bg-[#C5A367] transition-all duration-500 flex items-center justify-center gap-2 shadow-lg shadow-black/5">
                            Открыть в картах
                        </a>
                    </div>
<div class="mt-8 bg-white border border-gray-100 rounded-3xl p-8 shadow-sm">
    <h3 class="text-[#1A1A1A] font-bold mb-6 uppercase text-[10px] tracking-[0.2em] flex items-center gap-2">
        <svg class="w-4 h-4 text-[#C5A367]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" stroke-width="2"/></svg>
        Организовать тур
    </h3>
    <div class="space-y-3">
        @php
            // Это можно вынести в контроллер, но для примера оставим здесь
            $tours = [
                ['name' => 'Mangystau Safari', 'url' => 'https://example.com/safari'],
                ['name' => 'Caspian Travel', 'url' => 'https://example.com/caspian'],
                ['name' => 'Aktau Guides', 'url' => 'https://example.com/guides'],
            ];
        @endphp

        @foreach($tours as $tour)
            <a href="{{ $tour['url'] }}" target="_blank" 
               class="group flex items-center justify-between p-4 rounded-2xl bg-[#FBFBFD] hover:bg-[#C5A367] transition-all duration-500">
                <span class="text-xs font-bold text-gray-700 group-hover:text-white transition-colors">{{ $tour['name'] }}</span>
                <svg class="w-4 h-4 text-gray-300 group-hover:text-white transition-colors transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M14 5l7 7-7 7" stroke-width="2"/></svg>
            </a>
        @endforeach
    </div>
    <p class="mt-4 text-[9px] text-gray-400 italic leading-relaxed">
        * Ссылки ведут на внешние ресурсы партнеров
    </p>
</div>
                </div>
            </div>
        </div>

        {{-- 🔹 Галерея --}}
        @if($culture->images && $culture->images->count() > 0)
        <section class="mb-24">
            <h2 class="text-3xl font-light mb-12 uppercase tracking-tighter text-[#1A1A1A]">Визуальная <span class="font-bold text-[#C5A367]">История</span></h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($culture->images as $img)
                    <a href="{{ asset('storage/' . $img->image_path) }}" class="glightbox relative group overflow-hidden rounded-[2rem] aspect-square shadow-sm hover:shadow-xl transition-all duration-500">
                        <img src="{{ asset('storage/' . $img->image_path) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy" />
                        <div class="absolute inset-0 bg-white/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="bg-white p-4 rounded-full shadow-xl">
                                <svg class="w-6 h-6 text-[#C5A367]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2"/></svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
        @endif

        {{-- 🔹 Карта (Leaflet) --}}
        <section class="mb-24">
            <h2 class="text-xs font-bold mb-8 uppercase tracking-[0.3em] text-[#C5A367] flex items-center gap-4">
                <span class="h-px w-8 bg-[#C5A367]"></span> Локация на карте
            </h2>
            
            <div id="leafletMap" class="rounded-[3rem] shadow-xl overflow-hidden h-[500px] border-8 border-white bg-gray-100 z-10"></div>
        </section>

        {{-- 🔹 Похожие объекты с заглушками --}}
        <section class="lg:mb-24">
            <div class="flex items-center justify-between mb-12">
                <h2 class="text-3xl font-light uppercase tracking-tighter text-[#1A1A1A]">Похожие <span class="font-bold text-[#C5A367]">Места</span></h2>
                <a href="/culture-list" class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400 hover:text-[#C5A367] transition-colors">Смотреть все →</a>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @forelse ($relatedCultures as $item)
                    <a href="{{ route('cultures.show', $item->id) }}" class="group block bg-white border border-gray-100 rounded-[2.5rem] overflow-hidden hover:shadow-2xl transition-all duration-500">
                        <div class="h-64 overflow-hidden bg-gray-200">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="1.5"/></svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-8 text-center">
                            <h3 class="font-bold text-[#1A1A1A] mb-2 transition-colors group-hover:text-[#C5A367]">{{ $item->title }}</h3>
                            <p class="text-gray-400 text-[10px] uppercase tracking-widest font-bold">{{ $item->category->name ?? 'Объект' }}</p>
                        </div>
                    </a>
                @empty
                    {{-- Заглушки, если похожих объектов нет --}}
                    @foreach(range(1, 3) as $index)
                        <div class="bg-white/50 border border-dashed border-gray-400 rounded-[2.5rem] p-8 flex flex-col items-center justify-center opacity-60">
                            <div class="w-16 h-16 bg-gray-200 rounded-full mb-4 flex items-center justify-center text-gray-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2"/></svg>
                            </div>
                            <p class="text-[10px] uppercase tracking-widest text-gray-600 font-bold">Скоро появятся новые места</p>
                        </div>
                    @endforeach
                @endforelse
            </div>
        </section>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Проверяем, есть ли блок для карты на странице
        const mapContainer = document.getElementById('leafletMap');
        
        if (mapContainer) {
            const lat = {{ $culture->latitude ?? 43.2389 }};
            const lng = {{ $culture->longitude ?? 76.8897 }};
            
            // Инициализация карты
            const map = L.map('leafletMap').setView([lat, lng], 13);

            // Используем светлую тему для соответствия дизайну
            L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; OpenStreetMap'
            }).addTo(map);

            // Золотая точка-маркер
            const goldIcon = L.divIcon({
                html: `<div style="background-color: #C5A367; width: 16px; height: 16px; border-radius: 50%; border: 3px solid white; box-shadow: 0 0 10px rgba(0,0,0,0.2);"></div>`,
                className: '',
                iconSize: [16, 16],
                iconAnchor: [8, 8] // Центрируем точку
            });

            L.marker([lat, lng], {icon: goldIcon})
                .addTo(map)
                .bindPopup(`<b style="font-family: Montserrat;">{{ $culture->title }}</b>`)
                .openPopup();
                
            map.scrollWheelZoom.disable();

            // Важно для корректного отображения внутри контейнеров
            setTimeout(() => {
                map.invalidateSize();
            }, 500);
        }
    });
</script>

@endsection