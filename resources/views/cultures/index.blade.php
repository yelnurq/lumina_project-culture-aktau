@extends('layouts.app')

@section('content')
<div class=" overflow-hidden container mx-auto max-w-7xl px-6 py-12 pt-[8rem] lg:pt-[9rem] animate-fadeIn">

    {{-- 🔹 Хедер с декоративным элементом --}}
    <div class="relative lg:mb-16 border-b border-gray-100 pb-12">
        <div class="absolute -left-10 top-0 text-[12rem] font-bold text-black/[0.02] select-none pointer-events-none uppercase tracking-tighter">
            Culture
        </div>
        
        <nav class="mb-8 relative z-10">
            <ol class="flex items-center space-x-3 text-[10px] uppercase tracking-[0.3em] font-bold text-gray-400">
                <li><a href="/" class="hover:text-[#C5A367] transition-all">Главная</a></li>
                <li class="text-gray-300">/</li>
                <li class="text-[#C5A367]">Экспедиция по Каспию</li>
            </ol>
        </nav>

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 relative z-10">
            <div>
                <h1 class="font-title text-4xl md:text-5xl font-light text-gray-900 mb-4 uppercase tracking-tight">
                    Объекты <span class="font-bold text-primary italic">Культуры</span>
                </h1>
                <p class="text-gray-500 max-w-xl font-light leading-relaxed border-l-2 border-[#C5A367] pl-6">
                    От древних некрополей до футуристических берегов — откройте для себя Мангистау, который меняет представление о путешествиях.
                </p>
            </div>
            
            <div class="flex items-baseline gap-2 text-primary">
                <span class="text-5xl font-bold tracking-tighter">{{ $cultures->total() }}</span>
                <span class="text-[10px] uppercase tracking-widest font-bold text-gray-400">локаций найдено</span>
            </div>
        </div>
    </div>

    {{-- 🔹 Панель управления (Smart Toolbar) --}}
    <div class="lg:sticky top-24 z-40 mb-12">
        <div class="bg-white/80 backdrop-blur-xl border border-white shadow-[0_8px_30px_rgb(0,0,0,0.04)] p-3 rounded-[2rem] flex flex-col lg:flex-row lg:items-center justify-between gap-4">
            
            {{-- Улучшенная форма поиска --}}
            <form method="GET" action="{{ route('cultures.index') }}" class="flex flex-wrap items-center gap-2 flex-1">
                <div class="relative flex-1 min-w-[200px]">
                    <span class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </span>
                    <input 
                        name="search" type="text" placeholder="Найти артефакт..." value="{{ request('search') }}"
                        class="bg-gray-50/50 border-none pl-12 pr-6 py-3 rounded-2xl text-sm w-full focus:ring-2 focus:ring-[#C5A367]/20 transition-all outline-none"
                    >
                </div>

                <select name="category" 
                        class="bg-gray-50/50 border-none px-6 py-3 rounded-2xl text-sm focus:ring-2 focus:ring-[#C5A367]/20 transition-all outline-none cursor-pointer font-medium text-gray-600">
                    <option value="">Все категории</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->name }}" {{ request('category') == $cat->name ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>

                <button type="submit" class="bg-primary text-white h-11 px-8 rounded-2xl text-xs font-bold uppercase tracking-[0.1em] hover:bg-[#C5A367] transition-all duration-500 shadow-lg shadow-primary/10">
                    Применить
                </button>
            </form>

            {{-- Переключатель Режимов --}}
            <div class="bg-gray-50 p-1.5 rounded-2xl inline-flex shadow-inner">
                <button onclick="switchTab('list')" id="listTab" class="flex items-center gap-2 px-6 py-2.5 rounded-xl text-[10px] font-bold uppercase tracking-widest transition-all duration-500 bg-white text-primary shadow-sm">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
                    Список
                </button>
                <button onclick="switchTab('map')" id="mapTab" class="flex items-center gap-2 px-6 py-2.5 rounded-xl text-[10px] font-bold uppercase tracking-widest transition-all duration-500 text-gray-400 hover:text-gray-600">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m6 13l5.447-2.724A1 1 0 0021 18.382V7.618a1 1 0 00-1.447-.894L15 4m0 16V4m0 0L9 7"/></svg>
                    Карта
                </button>
            </div>
        </div>
    </div>

    {{-- 🔹 Секция Карты (Визуально облегчена) --}}
    <div id="mapSection" class="rounded-[3rem] shadow-[0_20px_50px_rgba(0,0,0,0.1)] overflow-hidden mb-12 h-[600px] border-4 border-white hidden relative animate-fadeInUp"></div>

    {{-- 🔹 Галерея Объектов --}}
    <div id="listSection">
        @if ($cultures->isEmpty())
            <div class="flex flex-col items-center justify-center py-32 bg-gray-50 rounded-[3rem] border-2 border-dashed border-gray-200">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4 text-gray-300">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <p class="text-gray-400 font-light tracking-wide uppercase text-xs">Ничего не найдено по вашему запросу</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach ($cultures as $culture)
                    <article class="group relative bg-white rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-[0_30px_60px_-15px_rgba(0,0,0,0.2)] transition-all duration-700 animate-fadeInUp" style="animation-delay: {{ $loop->index * 100 }}ms">
                        <a href="{{ route('cultures.show', $culture->id) }}" class="block h-full">
                            {{-- Image Container --}}
                            <div class="relative h-[480px] overflow-hidden">
                                <img src="{{ asset('storage/' . $culture->image) }}" 
                                     alt="{{ $culture->title }}" 
                                     class="w-full h-full object-cover transition-transform duration-[2s] group-hover:scale-110">
                                
                                {{-- Smart Overlays --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-[#0f172a]/90 via-transparent to-transparent"></div>
                                
                                <div class="absolute top-6 left-6">
                                    <span class="bg-white/10 backdrop-blur-md border border-white/20 text-white text-[9px] font-bold uppercase tracking-widest px-4 py-2 rounded-full">
                                        {{ $culture->category->name ?? 'Локация' }}
                                    </span>
                                </div>

                                {{-- Контент --}}
                                <div class="absolute bottom-0 left-0 p-10 w-full transform transition-transform duration-500 group-hover:-translate-y-2">
                                    <h3 class="text-white font-title text-2xl font-bold mb-4 leading-tight group-hover:text-[#C5A367] transition-colors">
                                        {{ $culture->title }}
                                    </h3>
                                    
                                    <p class="text-white/70 text-sm font-light leading-relaxed line-clamp-2 mb-6 group-hover:text-white transition-colors">
                                        {{ $culture->description }}
                                    </p>

                                    <div class="flex items-center gap-4">
                                        <div class="h-px flex-1 bg-white/20"></div>
                                        <span class="text-white text-[10px] font-bold uppercase tracking-[0.2em] whitespace-nowrap">Узнать Больше</span>
                                        <div class="w-8 h-8 rounded-full border border-white/30 flex items-center justify-center text-white group-hover:bg-[#C5A367] group-hover:border-[#C5A367] transition-all duration-500">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 8l4 4m0 0l-4 4m4-4H3" stroke-width="2"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        @endif
        
        <div class="mt-24 flex justify-center">
            {{ $cultures->withQueryString()->links('vendor.pagination.tailwind') }}
        </div>
    </div>
    {{-- 🔹 Секция "Посетите также" --}}
    <section class="mt-4 border-t border-gray-100">
        <div class="flex flex-col md:flex-row items-baseline justify-between mb-12 gap-4">
            <h2 class="font-title text-3xl md:text-4xl font-light text-gray-900 uppercase tracking-tight">
                Дополните ваш <span class="font-bold text-[#C5A367] italic">Маршрут</span>
            </h2>
            <p class="text-[10px] uppercase tracking-[0.3em] font-bold text-gray-400">Рекомендованные места для отдыха</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Объединяем коллекции для вывода вперемешку или по очереди --}}
            @foreach($randomHotels->concat($randomRestaurants)->shuffle()->take(3) as $place)
                <a href="{{ url(strtolower(class_basename($place)) . 's/' . $place->id) }}" class="group bg-white rounded-[2rem] p-4 shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-50 flex items-center gap-6">
                    <div class="relative w-24 h-24 shrink-0 overflow-hidden rounded-2xl">
                        <img src="{{ asset('storage/' . $place->image) }}" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                             alt="{{ $place->title }}">
                        {{-- Шильдик типа объекта --}}
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors"></div>
                    </div>

                    <div class="flex-1 min-w-0">
                        <span class="text-[9px] font-bold uppercase tracking-widest text-[#C5A367] mb-1 block">
                            {{ class_basename($place) == 'Hotel' ? 'Отель' : 'Ресторан' }}
                        </span>
                        <h4 class="text-gray-900 font-bold text-sm uppercase tracking-tight truncate group-hover:text-[#C5A367] transition-colors">
                            {{ $place->title }}
                        </h4>
                        <div class="flex items-center mt-2 text-gray-400">
                             <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2"/></svg>
                             <span class="text-[10px] truncate">Актау, Мангистау</span>
                        </div>
                    </div>

                    <div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-300 group-hover:bg-[#C5A367]/10 group-hover:text-[#C5A367] transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="2"/></svg>
                    </div>
                </a>
            @endforeach
        </div>

        {{-- Заглушка, если данных нет вообще --}}
        @if($randomHotels->isEmpty() && $randomRestaurants->isEmpty())
             <div class="bg-gray-50 rounded-[2rem] p-12 text-center border border-dashed border-gray-200">
                <p class="text-gray-400 text-xs uppercase tracking-widest">Скоро здесь появятся лучшие заведения региона</p>
             </div>
        @endif
    </section>
</div>
<script>
    let map;
    const cultures = @json($cultures->items()); {{-- Передаем данные из PHP в JS --}}

    function initMap() {
        if (map) return; {{-- Предотвращаем повторную инициализацию --}}

        {{-- Центрируем карту на Мангистау --}}
        map = L.map('mapSection').setView([44.5, 52.0], 7);

        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);

        {{-- Добавляем маркеры объектов --}}
        cultures.forEach(item => {
            if (item.latitude && item.longitude) {
                const marker = L.marker([item.latitude, item.longitude]).addTo(map);
                
                {{-- Красивый попап --}}
                const popupContent = `
                    <div class="text-center p-2">
                        <img src="/storage/${item.image}" class="w-full h-24 object-cover rounded-xl mb-2">
                        <h4 class="font-bold text-gray-900 uppercase text-[10px] tracking-wider">${item.title}</h4>
                        <a href="/cultures/${item.id}" class="text-[#C5A367] text-[9px] font-bold uppercase mt-2 block">Посмотреть</a>
                    </div>
                `;
                marker.bindPopup(popupContent);
            }
        });
    }

    function switchTab(mode) {
        const listSection = document.getElementById('listSection');
        const mapSection = document.getElementById('mapSection');
        const listTab = document.getElementById('listTab');
        const mapTab = document.getElementById('mapTab');

        if (mode === 'map') {
            listSection.classList.add('hidden');
            mapSection.classList.remove('hidden');
            
            // Стили вкладок
            mapTab.classList.add('bg-white', 'text-primary', 'shadow-sm');
            mapTab.classList.remove('text-gray-400');
            listTab.classList.remove('bg-white', 'text-primary', 'shadow-sm');
            listTab.classList.add('text-gray-400');

            initMap();
            // Исправляем баг с отрисовкой плиток при переключении
            setTimeout(() => map.invalidateSize(), 200);
        } else {
            listSection.classList.remove('hidden');
            mapSection.classList.add('hidden');
            
            listTab.classList.add('bg-white', 'text-primary', 'shadow-sm');
            listTab.classList.remove('text-gray-400');
            mapTab.classList.remove('bg-white', 'text-primary', 'shadow-sm');
            mapTab.classList.add('text-gray-400');
        }
    }
</script>
<style>
    /* Продвинутые анимации */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn { animation: fadeIn 1s ease-out forwards; }
    .animate-fadeInUp { animation: fadeInUp 0.8s ease-out forwards; }

    /* Кастомизация Попапа Карты */
    .leaflet-popup-content-wrapper {
        background: rgba(255, 255, 255, 0.9) !important;
        backdrop-filter: blur(10px);
        border-radius: 2rem !important;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1) !important;
        border: 1px solid white;
    }
    .leaflet-popup-content {
        margin: 15px 20px !important;
        font-family: 'Montserrat', sans-serif !important;
    }
</style>
@endsection