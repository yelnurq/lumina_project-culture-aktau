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
        </nav>
    </div>
</header>
@endsection

@section('content')
{{-- Баннер --}}
<div class="relative w-full h-[35vh] md:h-[45vh] overflow-hidden">
    <img src="{{ asset('storage/' . $restaurant->image) }}"
         class="w-full h-full object-cover blur-sm scale-105" alt="{{ $restaurant->title_ru }}">
    <div class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
        <h1 class="text-white text-3xl md:text-5xl font-extrabold text-center px-4 tracking-wide">
            {{ $restaurant->title_ru }}
        </h1>
    </div>
</div>

<div class="container mx-auto px-6 max-w-6xl mt-[40px] font-montserrat text-gray-900" style="padding-bottom: 60px;">

    {{-- Заголовок --}}
    <header class="mb-10 border-b border-gray-300 pb-6 flex flex-col md:flex-row md:items-center md:justify-between">
        <h1 class="text-[28px] font-extrabold text-primary mb-4 md:mb-0">{{ $restaurant->title_ru }}</h1>
        @if ($restaurant->address_ru)
            <p class="text-[16px] font-semibold text-gray-800">
                Адрес: <span class="text-gray-700">{{ $restaurant->address_ru }}</span>
            </p>
        @endif
    </header>

    {{-- Описание --}}
    <section class="mb-12 clearfix">
        @if ($restaurant->image)
            <img 
                src="{{ asset('storage/' . $restaurant->image) }}" 
                alt="{{ $restaurant->title_ru }}"
                class="float-left w-full md:w-[45%] max-w-md mr-6 mb-4 rounded-xl shadow-lg object-cover max-h-[450px]" 
            />
        @endif

        <div class="text-[16px] leading-relaxed text-gray-800 text-justify">
            {!! nl2br(e($restaurant->description_ru)) !!}
        </div>
    </section>

 

    {{-- Контакты --}}
    <section class="mb-12">
        <h2 class="text-[18px] font-semibold mb-4 text-[#444]">Контактная информация</h2>
        <ul class="text-[#444] space-y-2 list-disc pl-5 text-[16px]">
            @if ($restaurant->address_ru)
                <li><span class="font-medium">Адрес:</span> {{ $restaurant->address_ru }}</li>
            @endif
            @if ($restaurant->phone)
                <li><span class="font-medium">Телефон:</span> {{ $restaurant->phone }}</li>
            @endif
            @if ($restaurant->working_hours)
                <li><span class="font-medium">Режим работы:</span> {{ $restaurant->working_hours }}</li>
            @endif
        </ul>
    </section>
  <section class="mb-16">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.955a1 1 0 00.95.69h4.166c.969 0 1.371 1.24.588 1.81l-3.374 2.45a1 1 0 00-.364 1.118l1.286 3.955c.3.921-.755 1.688-1.54 1.118l-3.374-2.45a1 1 0 00-1.176 0l-3.374 2.45c-.785.57-1.84-.197-1.54-1.118l1.286-3.955a1 1 0 00-.364-1.118L2.06 9.382c-.783-.57-.38-1.81.588-1.81h4.166a1 1 0 00.95-.69l1.285-3.955z" />
        </svg>
        Отзывы гостей
    </h2>

    <div class="grid md:grid-cols-2 gap-6">
        <!-- Отзыв 1 -->
        <div class="p-6 bg-white rounded-2xl shadow-md hover:shadow-lg transition-shadow duration-300">
        <div class="flex items-center mb-4">
            <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5.121 17.804A8.967 8.967 0 0112 15c2.21 0 4.21.804 5.879 2.139M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            </div>        <div class="ml-3">
            <p class="font-semibold text-gray-800">Айгерим Т.</p>
            <p class="text-sm text-gray-500">Актау</p>
            </div>
        </div>
        <p class="text-gray-700 leading-relaxed">“Потрясающий вид на море, еда отличная, особенно стейк из сибаса. Обязательно вернусь снова!”</p>
        <div class="flex mt-3 text-yellow-400 text-lg">⭐️⭐️⭐️⭐️⭐️</div>
        </div>

        <!-- Отзыв 2 -->
        <div class="p-6 bg-white rounded-2xl shadow-md hover:shadow-lg transition-shadow duration-300">
        <div class="flex items-center mb-4">
            <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5.121 17.804A8.967 8.967 0 0112 15c2.21 0 4.21.804 5.879 2.139M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            </div>        <div class="ml-3">
            <p class="font-semibold text-gray-800">Данияр К.</p>
            <p class="text-sm text-gray-500">Мангистау</p>
            </div>
        </div>
        <p class="text-gray-700 leading-relaxed">“Отличное место для свидания. Обслуживание на высоте, уютная атмосфера!”</p>
        <div class="flex mt-3 text-yellow-400 text-lg">⭐️⭐️⭐️⭐️⭐️</div>
        </div>
    </div>
</section>

    {{-- 🍽 Популярные блюда --}}
    @if($restaurant->dishes->count())
<section class="mb-12">
    <h2 class="text-[18px] font-semibold mb-4 text-[#444]">Популярные блюда</h2>
    <div class="grid md:grid-cols-3 gap-6">
        @foreach($restaurant->dishes as $dish)
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
            @if($dish->image)
                <img src="{{ asset('storage/' . $dish->image) }}" class="w-full h-48 object-cover" alt="{{ $dish->name }}">
            @endif
            <div class="p-4">
                <h3 class="font-semibold text-lg mb-2">{{ $dish->name }}</h3>
                @if($dish->price)
                    <p class="text-gray-600 text-sm mb-1">Цена: {{ $dish->price }} ₸</p>
                @endif
                <p class="text-gray-700 text-sm">{{ $dish->description }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif

{{-- 🖼 Галерея --}}
@if($restaurant->images->count())
<section class="mb-12">
    <h2 class="text-[18px] font-semibold mb-4 text-[#444]">Галерея</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach($restaurant->images as $image)
            <a href="{{ asset('storage/' . $image->image) }}" class="glightbox" data-gallery="restaurant-gallery">
                <img src="{{ asset('storage/' . $image->image) }}" 
                     class="rounded-xl shadow-md object-cover w-full h-48 hover:scale-105 transition cursor-pointer" 
                     alt="Фото ресторана">
            </a>
        @endforeach
    </div>
</section>
@endif



 

    {{-- Карта --}}
    <section class="mb-12">
        <h2 class="text-[18px] font-semibold mb-4 text-[#444]">Расположение на карте</h2>
        <div id="map" class="rounded-xl shadow-lg overflow-hidden h-[550px]"></div>
    </section>

    {{-- Поделиться --}}
    <section class="mb-12">
        <h2 class="text-[18px] font-semibold mb-2 text-[#444]">Поделиться:</h2>
        <div class="flex gap-4 text-sm text-gray-600">
            <a href="#" class="hover:text-blue-600 transition">Facebook</a>
            <a href="#" class="hover:text-blue-400 transition">X (Twitter)</a>
            <a href="#" class="hover:text-blue-500 transition">Telegram</a>
            <a href="#" class="hover:text-green-600 transition">WhatsApp</a>
        </div>
    </section>
   {{-- 🏖 Похожие рестораны --}}
    <section class="mb-12">
        <h2 class="text-[18px] font-semibold mb-4 text-[#444]">Похожие рестораны</h2>
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
    {{-- Назад --}}
    <div class="mt-12 flex justify-end">
        <a href="{{ route('restaurants.index') }}" class="inline-block bg-primary text-white px-6 py-3 rounded-xl text-sm font-semibold hover:bg-gray-800 transition">
            ← Назад ко всем ресторанам
        </a>
    </div>
    
</div>
<script>
    const lightbox = GLightbox({
        selector: '.glightbox',
        touchNavigation: true,
        loop: true,
    });
</script>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" async defer></script>
<script>
window.addEventListener('load', () => {
    ymaps.ready(function () {
        const myMap = new ymaps.Map('map', {
            center: [{{ $restaurant->latitude }}, {{ $restaurant->longitude }}],
            zoom: 14,
            controls: ['zoomControl', 'fullscreenControl']
        });

        const placemark = new ymaps.Placemark(
            [{{ $restaurant->latitude }}, {{ $restaurant->longitude }}],
            { hintContent: '{{ $restaurant->title_ru }}' },
            { preset: 'islands#icon', iconColor: '#2563eb' }
        );

        myMap.geoObjects.add(placemark);
    });
});
</script>
@endsection


