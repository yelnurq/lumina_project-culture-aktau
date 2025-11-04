@extends('layouts.app')

@section("header")
<div style="background:rgb(17 24 39);" class="w-full text-white text-center py-2 text-sm font-semibold tracking-wide">
    Мангистауский Колледж Туризма
</div>
<header class="shadow top-0 left-0 w-full z-50 hidden md:flex bg-white" >
    <div class="w-full flex items-center justify-between p-4 "
         style="padding-left:50px;padding-right:50px">
        <a href="/" class="flex items-center space-x-6">
            <span class="text-black font-semibold text-xl" style="font-weight: 600; font-size:17px;padding:10px;">
                Mangystau oblysy
            </span>
        </a>
        <nav class="space-x-6 text-black text-sm font-semibold flex items-center">
            <a style="font-weight:400; font-size:15px;"  href="/" class="hover:text-accent transition-colors duration-300">Главная</a>
            <a style="font-weight:400; font-size:15px;"  href="/culture-list" class="hover:text-accent transition-colors duration-300">Объекты культуры</a>
            <a style="font-weight:400; font-size:15px;"  href="/contacts" class="hover:text-accent transition-colors duration-300">Контакты</a>

            @auth
                <a style="font-weight:400; font-size:15px;"  href="{{ route('admin.index') }}" class="hover:text-accent transition-colors duration-300">Админ-панель</a>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"  style="font-weight:400; font-size:15px;" class="hover:text-accent transition-colors duration-300 bg-transparent border-none cursor-pointer">
                        Выйти
                    </button>
                </form>
            @endauth
        </nav>
    </div>
</header>
@endsection
@section('content')

{{-- Баннер с слайдером --}}
<div class="relative w-full h-[30vh] md:h-[30vh] lg:h-[30vh] overflow-hidden">
    <div class="swiper h-full">
        <div class="swiper-wrapper">
            @if($culture->image)
                <div class="swiper-slide">
                    <img src="{{ asset('storage/' . $culture->image) }}" class="w-full h-full object-cover scale-105" 
     style="filter: blur(4px);" 
     alt="{{ $culture->title }}"> alt="{{ $culture->title }}">
                </div>
            @endif

            @if($culture->images && $culture->images->count() > 0)
                @foreach($culture->images as $img)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/' . $img->image_path) }}" class="w-full h-full object-cover scale-105" 
     style="filter: blur(4px);" 
     alt="{{ $culture->title }}"> alt="{{ $culture->title }}">
                    </div>
                @endforeach
            @endif
        </div>

    </div>

    <div class="absolute inset-0 z-10 flex items-center justify-center bg-black/30">
        <h1 class="text-white text-2xl md:text-4xl font-bold text-center px-4">
            {{ $culture->title }}
        </h1>
    </div>
</div>

{{-- Swiper JS --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.swiper', {
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        }
    });
</script>




<div class="container mx-auto px-6 max-w-6xl mt-[40px] font-montserrat text-gray-900" style="padding-bottom: 40px;">
    <nav class="text-sm text-gray-500 mb-4">
        <ol class="list-reset flex space-x-2">
            <li>
                <a href="/" class="hover:underline text-blue-600" data-lang="restaurant_breadcrumb_home">
                    Главная
                </a>
            </li>
            <li>/</li>
            <li >
                <a href="/culture-list" class="hover:underline text-blue-600" data-lang="restaurant_breadcrumb_current">
                    Объекты культуры
                </a>            
            </li>
            <li>/</li>
            <li class="text-gray-700">
                {{ $culture->title }}
            </li>
        </ol>
    </nav>
    <header class="mb-10 border-b border-gray-300 pb-6 flex flex-col md:flex-row md:items-center md:justify-between">
        <h1 class="text-[25px] font-extrabold text-primary mb-4 md:mb-0">
            {{ $culture->title }}
        </h1>
        <p class="text-[17px] font-semibold text-gray-800">
            Категория: <span class="text-gray-700">{{ $culture->category->name }}</span>
        </p>
    </header>

    <section class="mb-12 clearfix">
        @if($culture->image)
            <img 
                src="{{ asset('storage/' . $culture->image) }}" 
                alt="{{ $culture->title }}" 
                class="float-left w-full md:w-[45%] max-w-md mr-6 mb-4 rounded-xl shadow-lg object-cover object-top max-h-[500px]"
                loading="lazy"
            />
        @endif

        <div class="text-[16px] leading-relaxed text-gray-800 text-justify">
            {!! nl2br(e($culture->description)) !!}
        </div>
    </section>

<section class="mb-12">
    <h2 class="text-[18px] font-medium mb-4 text-[#444]">Галерея</h2>
    @if($culture->images && $culture->images->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach($culture->images as $img)
                <a href="{{ asset('storage/' . $img->image_path) }}" class="glightbox" data-gallery="culture-gallery">
                    <img 
                        src="{{ asset('storage/' . $img->image_path) }}" 
                        alt="{{ $culture->title }}" 
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
    const lightbox = GLightbox({
        selector: '.glightbox',
        touchNavigation: true,
        loop: true,
    });
</script>


    <section class="mb-12">
        <h2 class="text-[18px] font-medium mb-4 text-[#444]">Дополнительная информация</h2>
        <ul class="text-[#444] space-y-2 list-disc pl-5 text-[16px]">
            <li><span class="font-medium">Широта:</span> {{ $culture->latitude }}</li>
            <li><span class="font-medium">Долгота:</span> {{ $culture->longitude }}</li>
        </ul>
    </section>

    <section class="mb-12">
        <h2 class="text-[18px] font-medium mb-4 text-[#444]">Расположение на карте</h2>
        <div id="map" class="rounded-xl shadow-lg overflow-hidden h-[550px]"></div>
    </section>

    <section class="mb-12">
        <h2 class="text-[18px] font-medium mb-4 text-[#444]">Видео объекта</h2>
        @if($culture->youtube_link)
            <div class="w-full rounded-xl overflow-hidden shadow-lg aspect-video">
                <iframe 
                    class="w-full h-full" 
                    src="https://www.youtube.com/embed/{{ preg_replace('/.*v=/', '', $culture->youtube_link) }}" 
                    title="{{ $culture->title }}" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen
                ></iframe>
            </div>
        @else
            <p class="text-gray-600 text-sm">Видео отсутствует.</p>
        @endif
    </section>

{{-- Поделиться --}}
<section class="mb-12">
    <h2 class="text-[18px] font-semibold mb-3 text-[#444] flex items-center gap-2">

        Поделиться:
    </h2>

    <div class="flex flex-wrap gap-6 text-sm">
        @php
            $url = urlencode(Request::url());
            $title = urlencode($culture->title);
        @endphp
        {{-- WhatsApp --}}
        <a href="https://api.whatsapp.com/send?text={{ $title }}%20{{ $url }}" target="_blank" class="flex items-center gap-2 hover:text-green-600 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="#25D366" viewBox="0 0 24 24">
                <path d="M20.52 3.48A11.949 11.949 0 0012 0C5.37 0 0 5.37 0 12a11.95 11.95 0 001.91 6.58L0 24l5.54-1.91A11.949 11.949 0 0012 24c6.63 0 12-5.37 12-12 0-3.2-1.25-6.22-3.48-8.52zM12 21.82a9.78 9.78 0 01-5.1-1.47l-.36-.22-3.28 1.13 1.1-3.2-.23-.37A9.78 9.78 0 012.18 12 9.78 9.78 0 0112 2.18 9.78 9.78 0 0121.82 12 9.78 9.78 0 0112 21.82zM17.5 14.7c-.27-.14-1.6-.78-1.85-.87-.25-.08-.43-.14-.61.14-.18.27-.69.87-.85 1.05-.16.18-.33.2-.6.07-.27-.14-1.14-.42-2.17-1.33-.8-.71-1.34-1.6-1.5-1.88-.16-.28-.02-.43.12-.57.12-.12.27-.32.41-.48.14-.16.18-.27.27-.45.09-.18.05-.33-.02-.46-.08-.13-.61-1.47-.84-2.02-.22-.53-.45-.46-.61-.47-.16 0-.34 0-.52 0-.18 0-.46.07-.7.33-.25.27-.94.92-.94 2.24s.96 2.59 1.09 2.77c.13.18 1.9 2.9 4.61 4.07 2.71 1.17 2.71.78 3.2.73.49-.05 1.6-.65 1.82-1.28.22-.63.22-1.16.16-1.27-.05-.12-.18-.18-.36-.32z"/>
            </svg>
            WhatsApp
        </a>
        {{-- Facebook --}}
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}" target="_blank" class="flex items-center gap-2 hover:text-blue-600 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="#1877F2" viewBox="0 0 24 24">
                <path d="M22 12a10 10 0 10-11 9.95v-7.05H8v-2.9h3V9.5c0-3 1.79-4.64 4.52-4.64 1.31 0 2.68.23 2.68.23v2.95h-1.51c-1.49 0-1.95.93-1.95 1.88v2.26h3.32l-.53 2.9h-2.79v7.05A10.001 10.001 0 0022 12z"/>
            </svg>
            Facebook
        </a>

        {{-- X (Twitter) --}}
        <a href="https://twitter.com/intent/tweet?url={{ $url }}&text={{ $title }}" target="_blank" class="flex items-center gap-2 hover:text-blue-400 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="#1DA1F2" viewBox="0 0 24 24">
                <path d="M23 3a10.9 10.9 0 01-3.14 1.53A4.48 4.48 0 0022.4.36a9 9 0 01-2.83 1.08 4.52 4.52 0 00-7.86 4.13A12.85 12.85 0 013 2.82a4.51 4.51 0 001.4 6.03 4.41 4.41 0 01-2.05-.56v.06a4.52 4.52 0 003.63 4.43 4.52 4.52 0 01-2.04.08 4.52 4.52 0 004.21 3.14A9 9 0 012 19.54a12.72 12.72 0 006.92 2.03c8.3 0 12.84-6.87 12.84-12.84 0-.2 0-.42-.01-.63A9.2 9.2 0 0023 3z"/>
            </svg>
            X
        </a>

        {{-- Telegram --}}
        <a href="https://t.me/share/url?url={{ $url }}&text={{ $title }}" target="_blank" class="flex items-center gap-2 hover:text-blue-500 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="#0088cc" viewBox="0 0 24 24">
                <path d="M21.53 2.47a1.5 1.5 0 00-1.82-.25L2.5 10.5v4.01l5.5-1.5 1.5 4 3-3 5-5 1.5-1.5a1.5 1.5 0 00-.25-1.82z"/>
            </svg>
            Telegram
        </a>


    </div>
</section>
 <section class="mb-12">
        <h2 class="text-[18px] font-semibold mb-4 text-[#444]">Еще объекты культур</h2>
        <div class="grid md:grid-cols-3 gap-5">
            @foreach (range(1,3) as $i)
                <a href="#" class="block rounded-xl overflow-hidden border hover:shadow-lg transition">
                    <img src="https://placehold.co/400x250?text=Restaurant+{{ $i }}" class="w-full h-52 object-cover" alt="Ресторан {{ $i }}">
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-800">Ресторан {{ $i }}</h3>
                        <p class="text-gray-600 text-sm mt-1">Короткое описание заведения.</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
    <div class="mt-12 flex justify-end">
        <a href="/cultures" class="inline-block bg-primary text-white px-6 py-3 rounded-xl text-sm font-semibold hover:bg-gray-800 transition">
            ← Назад ко всем объектам
        </a>
    </div>
</div>

<style>
    .clearfix::after {
        content: "";
        display: table;
        clear: both;
    }

    section {
        opacity: 0;
        transform: translateY(15px);
        animation: fadeUp 0.6s forwards;
    }
    header {
        animation-delay: 0.1s;
    }
    section:nth-of-type(1) {
        animation-delay: 0.3s;
    }
    section:nth-of-type(2) {
        animation-delay: 0.5s;
    }
    section:nth-of-type(3) {
        animation-delay: 0.7s;
    }
    section:nth-of-type(4) {
        animation-delay: 0.9s;
    }

    @keyframes fadeUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" async defer></script>
<script>
    window.addEventListener('load', () => {
        ymaps.ready(function () {
            const myMap = new ymaps.Map('map', {
                center: [{{ $culture->latitude }}, {{ $culture->longitude }}],
                zoom: 7,
                controls: ['zoomControl', 'fullscreenControl']
            });

            const placemark = new ymaps.Placemark(
                [{{ $culture->latitude }}, {{ $culture->longitude }}], 
                {
                    hintContent: '{{ addslashes($culture->title) }}',
                    balloonContentHeader: `<strong>{{ addslashes($culture->title) }}</strong>`,
                    balloonContentBody: `{{ addslashes($culture->description) }}`
                }, 
                {
                    preset: 'islands#icon',
                    iconColor: '#2563eb'
                }
            );

            myMap.geoObjects.add(placemark);
        });
    });
</script>
@endsection
