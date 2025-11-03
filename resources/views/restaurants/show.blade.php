@extends('layouts.app')

@section("header")
<div style="background:rgb(17 24 39);" class="w-full text-white text-center py-2 text-sm font-semibold tracking-wide">
    Мангистауский Колледж Туризма
</div>
<header class="shadow top-0 left-0 w-full z-50 hidden md:flex bg-white">
    <div class="w-full flex items-center justify-between p-4" style="padding-left:50px;padding-right:50px">
        <a href="/" class="flex items-center space-x-6">
            <span class="text-black font-semibold text-xl" style="font-weight: 600; font-size:17px;padding:10px;">
                Mangystau oblysy
            </span>
        </a>
        <nav class="space-x-6 text-black text-sm font-semibold flex items-center">
            <a style="font-weight:400; font-size:15px;" href="/" class="hover:text-accent transition-colors duration-300">Главная</a>
            <a style="font-weight:400; font-size:15px;" href="/restaurants" class="hover:text-accent transition-colors duration-300">Рестораны</a>
            <a style="font-weight:400; font-size:15px;" href="/contacts" class="hover:text-accent transition-colors duration-300">Контакты</a>

            @auth
                <a style="font-weight:400; font-size:15px;" href="{{ route('admin.index') }}" class="hover:text-accent transition-colors duration-300">Админ-панель</a>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" style="font-weight:400; font-size:15px;" class="hover:text-accent transition-colors duration-300 bg-transparent border-none cursor-pointer">
                        Выйти
                    </button>
                </form>
            @endauth
        </nav>
    </div>
</header>
@endsection

@section('content')
{{-- Баннер --}}
<div class="relative w-full h-[30vh] md:h-[30vh] lg:h-[30vh] overflow-hidden">
    <div class="swiper h-full">
        <div class="swiper-wrapper">
            @if($restaurant->image)
                <div class="swiper-slide">
                    <img src="{{ asset('storage/' . $restaurant->image) }}" class="w-full h-full object-cover scale-105" 
                         style="filter: blur(4px);" 
                         alt="{{ $restaurant->name }}">
                </div>
            @endif

            @if($restaurant->images && $restaurant->images->count() > 0)
                @foreach($restaurant->images as $img)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/' . $img->image_path) }}" class="w-full h-full object-cover scale-105" 
                             style="filter: blur(4px);" 
                             alt="{{ $restaurant->name }}">
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="absolute inset-0 z-10 flex items-center justify-center bg-black/30">
        <h1 class="text-white text-2xl md:text-4xl font-bold text-center px-4">
            {{ $restaurant->name }}
        </h1>
    </div>
</div>

{{-- Swiper --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
const swiper = new Swiper('.swiper', {
    loop: true,
    autoplay: { delay: 4000, disableOnInteraction: false },
    pagination: { el: '.swiper-pagination', clickable: true },
    navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
    effect: 'fade',
    fadeEffect: { crossFade: true }
});
</script>

<div class="container mx-auto px-6 max-w-6xl mt-[40px] font-montserrat text-gray-900" style="padding-bottom: 40px;">
    <header class="mb-10 border-b border-gray-300 pb-6 flex flex-col md:flex-row md:items-center md:justify-between">
        <h1 class="text-[25px] font-extrabold text-primary mb-4 md:mb-0">
            {{ $restaurant->name }}
        </h1>
        <p class="text-[17px] font-semibold text-gray-800">
            Категория: <span class="text-gray-700">{{ $restaurant->category->name ?? 'Без категории' }}</span>
        </p>
    </header>

    <section class="mb-12 clearfix">
        @if($restaurant->image)
            <img 
                src="{{ asset('storage/' . $restaurant->image) }}" 
                alt="{{ $restaurant->name }}" 
                class="float-left w-full md:w-[45%] max-w-md mr-6 mb-4 rounded-xl shadow-lg object-cover object-top max-h-[500px]"
                loading="lazy"
            />
        @endif

        <div class="text-[16px] leading-relaxed text-gray-800 text-justify">
            {!! nl2br(e($restaurant->description)) !!}
        </div>
    </section>

    <section class="mb-12">
        <h2 class="text-[18px] font-medium mb-4 text-[#444]">Галерея</h2>
        @if($restaurant->images && $restaurant->images->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($restaurant->images as $img)
                    <a href="{{ asset('storage/' . $img->image_path) }}" class="glightbox" data-gallery="restaurant-gallery">
                        <img 
                            src="{{ asset('storage/' . $img->image_path) }}" 
                            alt="{{ $restaurant->name }}" 
                            class="w-full h-[200px] object-cover rounded-xl shadow-lg hover:scale-105 transition-transform cursor-pointer"
                        />
                    </a>
                @endforeach
            </div>
        @else
            <p class="text-gray-600 text-sm">Дополнительные фотографии отсутствуют.</p>
        @endif
    </section>

    <script>
    const lightbox = GLightbox({ selector: '.glightbox', touchNavigation: true, loop: true });
    </script>

    <section class="mb-12">
        <h2 class="text-[18px] font-medium mb-4 text-[#444]">Дополнительная информация</h2>
        <ul class="text-[#444] space-y-2 list-disc pl-5 text-[16px]">
            <li><span class="font-medium">Адрес:</span> {{ $restaurant->address }}</li>
            <li><span class="font-medium">Телефон:</span> {{ $restaurant->phone }}</li>
        </ul>
    </section>

    <section class="mb-12">
        <h2 class="text-[18px] font-medium mb-4 text-[#444]">Расположение на карте</h2>
        <div id="map" class="rounded-xl shadow-lg overflow-hidden h-[550px]"></div>
    </section>

    <section class="mb-12">
        <h2 class="text-[18px] font-medium mb-2 text-[#444]">Поделиться объектом:</h2>
        <div class="flex gap-4 text-sm text-gray-600">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="hover:text-blue-600 transition">Facebook</a>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="hover:text-blue-400 transition">X (Twitter)</a>
            <a href="https://t.me/share/url?url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="hover:text-blue-500 transition">Telegram</a>
            <a href="https://wa.me/?text={{ urlencode(request()->fullUrl()) }}" target="_blank" class="hover:text-green-600 transition">WhatsApp</a>
        </div>
    </section>

    <div class="mt-12 flex justify-end">
        <a href="/restaurants" class="inline-block bg-primary text-white px-6 py-3 rounded-xl text-sm font-semibold hover:bg-gray-800 transition">
            ← Назад ко всем ресторанам
        </a>
    </div>
</div>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" async defer></script>
<script>
window.addEventListener('load', () => {
    ymaps.ready(function () {
        const myMap = new ymaps.Map('map', {
            center: [{{ $restaurant->latitude }}, {{ $restaurant->longitude }}],
            zoom: 12,
            controls: ['zoomControl', 'fullscreenControl']
        });

        const placemark = new ymaps.Placemark(
            [{{ $restaurant->latitude }}, {{ $restaurant->longitude }}], 
            { hintContent: '{{ addslashes($restaurant->name) }}' },
            { preset: 'islands#icon', iconColor: '#2563eb' }
        );

        myMap.geoObjects.add(placemark);
    });
});
</script>
@endsection
