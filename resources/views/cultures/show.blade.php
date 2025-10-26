@extends('layouts.app')

@section("header")
<div style="background:rgb(46 95 79);" class="w-full text-white text-center py-2 text-sm font-semibold tracking-wide">
В честь 180-летия со дня рождения великого Абая Кунанбаева!
</div>

<header class="top-0 left-0 w-full z-50">

    <div class="w-full flex items-center justify-between p-4 bg-primary/40 backdrop-blur-md"
         style="padding-left:50px;padding-right:50px">
        <a href="/" class="flex items-center space-x-6">
            <img src="{{ asset('icons/logo.png') }}" style="height: 50px" alt="">
            <span class="text-white font-semibold text-xl" style="font-weight: 400; font-size:15px;">
                Центр охраны наследия Абай
            </span>
        </a>
        <nav class="space-x-6 text-white text-sm font-semibold flex items-center">
            <a style="font-weight:400; font-size:15px;"  href="/" class="hover:text-accent transition-colors duration-300">Главная</a>
            <a style="font-weight:400; font-size:15px;"  href="/cultures" class="hover:text-accent transition-colors duration-300">Объекты культуры</a>
            <a style="font-weight:400; font-size:15px;"  href="/news" class="hover:text-accent transition-colors duration-300">Новости</a>
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
<div class="container mx-auto px-6  max-w-6xl mt-[40px] font-montserrat text-gray-900" style="padding-bottom: 40px;">

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
        <h2 class="text-[18px] font-medium mb-4 text-[#444]">Дополнительная информация</h2>
        <ul class="text-[#444] space-y-2 list-disc pl-5 text-[16px]">
            <li><span class="font-medium">Широта:</span> {{ $culture->latitude }}</li>
            <li><span class="font-medium">Долгота:</span> {{ $culture->longitude }}</li>
        </ul>
    </section>

    <section class="mb-12">
        <h2 class="text-[18px] font-medium mb-4 text-[#444]">Расположение на карте</h2>
        <div id="map" class="rounded-xl shadow-lg overflow-hidden h-[450px]"></div>
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
                zoom: 14,
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
