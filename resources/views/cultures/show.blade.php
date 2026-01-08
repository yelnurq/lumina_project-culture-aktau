@extends('layouts.app')

@section('content')
{{-- Фон страницы — мягкий светлый --}}
<div class="bg-[#F8F8FA] min-h-screen text-[#1A1A1A] font-montserrat">

    {{-- 🔹 Баннер-слайдер (Immersive Hero) --}}
    <div class="relative w-full h-[60vh] overflow-hidden border-b border-gray-200">
        <div class="swiper h-full">
            <div class="swiper-wrapper">
                @php
                    $allImages = collect([$culture->image]);
                    if($culture->images) $allImages = $allImages->merge($culture->images->pluck('image_path'));
                @endphp

                @foreach($allImages as $path)
                    <div class="swiper-slide relative">
                        <img src="{{ asset('storage/' . $path) }}" class="w-full h-full object-cover transition-transform duration-[10s] scale-110" alt="{{ $culture->title }}">
                        {{-- Светлый градиент для мягкого перехода --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-[#F8F8FA] via-transparent to-black/10"></div>
                    </div>
                @endforeach
            </div>
            {{-- Кнопки навигации теперь темные полупрозрачные --}}
            <div class="swiper-button-next !text-[#C5A367] after:!text-2xl"></div>
            <div class="swiper-button-prev !text-[#C5A367] after:!text-2xl"></div>
        </div>

        {{-- Контент поверх слайдера --}}
        <div class="absolute inset-0 z-20 flex flex-col items-center justify-center text-center px-4 pointer-events-none">
            <span class="text-[#C5A367] text-[10px] uppercase tracking-[0.5em] font-bold mb-4 drop-shadow-sm animate-fadeInUp">
                {{ $culture->category->name }}
            </span>
            <h1 class="text-4xl md:text-6xl font-bold text-white uppercase tracking-tighter drop-shadow-lg animate-fadeInUp delay-200">
                {{ $culture->title }}
            </h1>
        </div>
    </div>

    {{-- 🔹 Основной контент --}}
    <div class="container mx-auto px-6 max-w-6xl -mt-20 relative z-30 pb-24">
        
        {{-- Карточка с описанием (Светлый Glassmorphism) --}}
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
                    <div class="text-gray-700 leading-[1.8] text-lg font-light space-y-6">
                        {!! nl2br(e($culture->description)) !!}
                    </div>
                </div>

                <div class="lg:col-span-5">
                    {{-- Плашка характеристик --}}
                    <div class="bg-[#FBFBFD] border border-gray-100 rounded-3xl p-8 sticky top-24">
                        <h3 class="text-[#1A1A1A] font-bold mb-6 uppercase text-sm tracking-widest">Характеристики</h3>
                        <ul class="space-y-4 text-sm">
                            <li class="flex justify-between border-b border-gray-100 pb-3">
                                <span class="text-gray-400 uppercase text-[10px] font-bold tracking-wider">Категория</span>
                                <span class="text-[#C5A367] font-semibold">{{ $culture->category->name }}</span>
                            </li>
                            <li class="flex justify-between border-b border-gray-100 pb-3">
                                <span class="text-gray-400 uppercase text-[10px] font-bold tracking-wider">Координаты</span>
                                <span class="text-gray-800 font-mono">{{ $culture->latitude }}, {{ $culture->longitude }}</span>
                            </li>
                        </ul>
                        
                        {{-- Кнопка "Маршрут" --}}
                        <a href="https://yandex.kz/maps/?pt={{ $culture->longitude }},{{ $culture->latitude }}&z=15" target="_blank" 
                           class="mt-8 w-full bg-[#1A1A1A] text-white text-center py-4 rounded-2xl text-[10px] font-bold uppercase tracking-widest hover:bg-[#C5A367] transition-all duration-500 flex items-center justify-center gap-2 shadow-lg shadow-black/5">
                            Построить маршрут
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- 🔹 Галерея --}}
        <section class="mb-24">
            <h2 class="text-3xl font-light mb-12 uppercase tracking-tighter text-[#1A1A1A]">Визуальная <span class="font-bold text-[#C5A367]">История</span></h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($culture->images as $img)
                    <a href="{{ asset('storage/' . $img->image_path) }}" class="glightbox relative group overflow-hidden rounded-[2rem] aspect-square shadow-sm hover:shadow-xl transition-all duration-500" data-gallery="culture-gallery">
                        <img src="{{ asset('storage/' . $img->image_path) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                        <div class="absolute inset-0 bg-white/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="bg-white p-4 rounded-full shadow-xl">
                                <svg class="w-6 h-6 text-[#C5A367]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2"/></svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        {{-- 🔹 Видео --}}
        @if($culture->youtube_link)
        <section class="mb-24">
            <div class="relative rounded-[3rem] overflow-hidden border-8 border-white shadow-2xl aspect-video group">
                <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ preg_replace('/.*v=/', '', $culture->youtube_link) }}" frameborder="0" allowfullscreen></iframe>
            </div>
        </section>
        @endif

        {{-- 🔹 Карта --}}
        <section class="mb-24">
            <h2 class="text-xs font-bold mb-8 uppercase tracking-[0.3em] text-[#C5A367] flex items-center gap-4">
                <span class="h-px w-8 bg-[#C5A367]"></span> Локация на карте
            </h2>
            <div id="map" class="rounded-[3rem] shadow-xl overflow-hidden h-[500px] border border-white bg-white"></div>
        </section>

        {{-- 🔹 Другие объекты --}}
        <section class="mb-24">
            <div class="flex items-center justify-between mb-12">
                <h2 class="text-3xl font-light uppercase tracking-tighter text-[#1A1A1A]">Похожие <span class="font-bold text-[#C5A367]">Места</span></h2>
                <a href="/culture-list" class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400 hover:text-[#C5A367] transition-colors">Смотреть все →</a>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach ($relatedCultures as $item)
                    <a href="{{ route('cultures.show', $item->id) }}" class="group block bg-white border border-gray-100 rounded-[2.5rem] overflow-hidden hover:shadow-2xl transition-all duration-500">
                        <div class="h-64 overflow-hidden">
                            <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        </div>
                        <div class="p-8 text-center">
                            <h3 class="font-bold text-[#1A1A1A] mb-2 transition-colors group-hover:text-[#C5A367]">{{ $item->title }}</h3>
                            <p class="text-gray-400 text-[10px] uppercase tracking-widest font-bold">{{ $item->category->name }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

    </div>
</div>

<style>
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeInUp { animation: fadeInUp 0.8s ease-out forwards; }
    .delay-200 { animation-delay: 0.2s; }

    /* Swiper — делаем навигацию аккуратнее на светлом */
    .swiper-button-next, .swiper-button-prev { 
        background: white; 
        width: 44px; height: 44px; 
        border-radius: 50%; 
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
    }
</style>

<script>
    const swiper = new Swiper('.swiper', {
        effect: 'fade',
        loop: true,
        autoplay: { delay: 5000 },
        navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' }
    });
    const lightbox = GLightbox({ selector: '.glightbox' });
</script>
@endsection