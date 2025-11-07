@extends('layouts.app')

@section("restaurant_meta")
<meta name="restaurant-id" content="{{ $restaurant->id }}">

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

<div class="container mx-auto px-6 max-w-6xl mt-10 font-montserrat text-gray-900" style="padding-bottom: 60px;">
    <nav class="text-sm text-gray-500 mb-4">
        <ol class="list-reset flex space-x-2">
            <li>
                <a href="/" class="hover:underline text-blue-600" data-lang="restaurant_breadcrumb_home">
                    Главная
                </a>
            </li>
            <li>/</li>
            <li >
                <a href="/" class="hover:underline text-blue-600" data-lang="restaurant_breadcrumb_current">
                    Рестораны
                </a>            
            </li>
            <li>/</li>
            <li class="text-gray-700" id="restaurant-title">
                {{ $restaurant->title_ru }}
            </li>
        </ol>
    </nav>
<section class="mb-12">
<div class="flex flex-col md:flex-row gap-4 items-stretch">
    @if($restaurant->image)
        <div class="hidden md:block md:w-3/5 h-72 md:h-[500px]">
            <img src="{{ asset('storage/' . $restaurant->image) }}"
                alt="{{ $restaurant->title_ru }}"
                class="w-full h-full object-cover rounded-xl shadow-lg" />
        </div>
    @endif

    {{-- Галерея --}}
    <div class="w-full md:w-2/5 h-72 md:h-[500px] flex flex-col gap-4">
        <!-- Десктопная сетка: все ячейки делят доступную высоту (grid-auto-rows:1fr) -->
        <div class="hidden md:block h-full">
            @if($restaurant->images->count() >= 1)
                <div class="grid grid-cols-3 gap-4 h-full" style="grid-auto-rows: 1fr;">
                    @foreach($restaurant->images as $image)
                        <a href="{{ asset('storage/' . $image->image) }}"
                           class="glightbox block rounded-xl overflow-hidden"
                           data-gallery="restaurant-gallery">
                            <img src="{{ asset('storage/' . $image->image) }}"
                                 class="w-full h-full object-cover transition-transform duration-200 hover:scale-105"
                                 alt="Фото ресторана">
                        </a>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Мобильный слайдер -->
        <div class="md:hidden">
            <div class="swiper restaurantSwiper">
                <div class="swiper-wrapper">
                    @foreach($restaurant->images as $image)
                        <div class="swiper-slide">
                            <a href="{{ asset('storage/' . $image->image) }}" class="glightbox" data-gallery="restaurant-gallery">
                                <img src="{{ asset('storage/' . $image->image) }}"
                                     class="w-full h-64 object-cover rounded-xl shadow-md"
                                     alt="Фото ресторана">
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination mt-2"></div>
            </div>
        </div>
    </div>
</div>

<div id="restaurant-description" class="mt-6 text-gray-800 text-[16px] leading-relaxed text-left md:text-justify">
    {!! nl2br(e($restaurant->description_ru)) !!}
</div>

</section>

<section class="mb-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-stretch">
        {{-- Контакты --}}
        <div class="bg-white rounded-2xl p-6 shadow-md">
            <h3 class="text-xl font-semibold mb-4 text-gray-800">Контактная информация</h3>

            <ul class="space-y-4 text-[15px] text-gray-700">
                @if ($restaurant->address_ru)
                    <li class="flex gap-3 items-start">
                        <svg class="w-5 h-5 text-gray-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0L6.343 16.657A8 8 0 1117.657 16.657z"/></svg>
                        <div><div class="font-medium text-gray-800">Адрес</div><div>{{ $restaurant->address_ru }}</div></div>
                    </li>
                @endif

                @if ($restaurant->phone)
                    <li class="flex gap-3 items-center">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h2.5a1 1 0 01.97.757L9.9 7.9a1 1 0 01-.242.97l-1.2 1.6a11 11 0 005.6 5.6l1.6-1.2a1 1 0 01.97-.242l4.143 1.43A1 1 0 0121 18.5V21a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"/></svg>
                        <div><div class="font-medium text-gray-800">Телефон</div><div class="text-blue-600">{{ $restaurant->phone }}</div></div>
                    </li>
                @endif

                @if ($restaurant->email)
                    <li class="flex gap-3 items-center">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12l-4-3-4 3M20 8v8a2 2 0 01-2 2H6a2 2 0 01-2-2V8"/></svg>
                        <div><div class="font-medium text-gray-800">Почта</div><div class="break-words">{{ $restaurant->email }}</div></div>
                    </li>
                @endif

                @if ($restaurant->website)
                    <li class="flex gap-3 items-center">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2l4 20M2 12h20"/></svg>
                        <div><div class="font-medium text-gray-800">Веб-сайт</div>
                            <a href="{{ $restaurant->website }}" class="text-blue-600 hover:underline" target="_blank" rel="noopener">{{ $restaurant->website }}</a>
                        </div>
                    </li>
                @endif

                @if ($restaurant->working_hours)
                    <li class="flex gap-3 items-center">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3"/></svg>
                        <div><div class="font-medium text-gray-800">Режим работы (общий)</div><div>{{ $restaurant->working_hours }}</div></div>
                    </li>
                @endif
            </ul>
        </div>

        {{-- Расписание --}}
        <div class="bg-gradient-to-b from-white/80 to-white rounded-2xl p-4 shadow-md">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-semibold text-gray-800">Режим работы по дням</h3>
                @php
                    // keys order: mon..sun
                    $dayKeys = ['mon','tue','wed','thu','fri','sat','sun'];
                    $dayNames = ['Понедельник','Вторник','Среда','Четверг','Пятница','Суббота','Воскресенье'];

                    $schedule = [];
                    if (!empty($restaurant->working_hours_json)) {
                        $schedule = json_decode($restaurant->working_hours_json, true) ?: [];
                    } elseif (!empty($restaurant->working_hours_schedule)) {
                        $schedule = json_decode($restaurant->working_hours_schedule, true) ?: [];
                    } elseif (!empty($restaurant->working_hours)) {
                        foreach ($dayKeys as $k) $schedule[$k] = $restaurant->working_hours;
                    }

                    $now = new DateTime('now');
                    $todayKey = $dayKeys[intval(date('N')) - 1];
                @endphp
            </div>

            <div class="divide-y rounded-lg overflow-hidden border border-gray-100">
                @for ($i = 0; $i < 7; $i++)
                    @php
                        $key = $dayKeys[$i];
                        $label = $dayNames[$i];
                        $entry = isset($schedule[$key]) ? trim($schedule[$key]) : '—';
                        $isOpen = false;

                        if (preg_match('/^(\d{1,2}:\d{2})\s*[-–]\s*(\d{1,2}:\d{2})$/', $entry, $m)) {
                            try {
                                $from = new DateTime(date('Y-m-d').' '.$m[1]);
                                $to = new DateTime(date('Y-m-d').' '.$m[2]);
                                if ($to <= $from) $to->modify('+1 day');
                                $isOpen = ($now >= $from && $now <= $to);
                            } catch (\Exception $e) { $isOpen = false; }
                        } else {
                            $lc = mb_strtolower($entry);
                            if (in_array($lc, ['круглосуточно','24/7','24:00-24:00','00:00-23:59'])) $isOpen = true;
                        }

                        $isToday = ($todayKey === $key);
                    @endphp

                    <div class="flex items-center justify-between px-4 py-3 bg-white {{ $isToday ? 'md:bg-primary/5' : '' }}">
                        <div class="flex items-center gap-3">
                            <div class="w-10 text-sm text-gray-600">{{ mb_substr($label,0,3) }}</div>
                            <div class="min-w-[120px]">
                                <div class="text-sm {{ $isToday ? 'font-semibold text-gray-800' : 'text-gray-700' }}">{{ $label }}</div>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="text-sm text-gray-600">{{ $entry }}</div>
                            @if($isToday)
                                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-sm font-medium {{ $isOpen ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' }}">
                                    <span class="w-2 h-2 rounded-full {{ $isOpen ? 'bg-green-600' : 'bg-red-600' }}"></span>
                                    {{ $isOpen ? 'Открыто' : 'Закрыто' }}
                                </span>
                            @endif
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
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
    <h2 class="text-2xl font-bold mb-6 text-gray-800 flex items-center gap-2">Популярные блюда</h2>
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





 

    {{-- Карта --}}
    <section class="mb-12">
        <h2 class="text-[18px] font-semibold mb-4 text-[#444]">Расположение на карте</h2>
        <div id="map" class="rounded-xl shadow-lg overflow-hidden h-[550px]"></div>
    </section>

{{-- Поделиться --}}
<section class="mb-6 pb-6 border-b border-gray-300">
    <h2 class="text-[18px] font-semibold mb-3 text-[#444] flex items-center gap-2">

        Поделиться:
    </h2>

    <div class="flex flex-wrap gap-6 text-sm">
        @php
            $url = urlencode(Request::url());
            $title = urlencode($restaurant->title_ru);
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

   {{-- 🏖 Похожие рестораны --}}
   <section class="mb-12">
    <h2 class="text-[18px] font-semibold mb-4 text-[#444]">Похожие рестораны</h2>
    <div class="grid md:grid-cols-3 gap-5">
        @foreach ($similarRestaurants as $sim)
            <a href="{{ route('restaurants.show', $sim->id) }}" class="block rounded-xl overflow-hidden border hover:shadow-lg transition">
                @if($sim->image)
                    <img src="{{ asset('storage/' . $sim->image) }}" class="w-full h-52 object-cover" alt="{{ $sim->title_ru }}">
                @else
                    <img src="https://placehold.co/400x250?text=No+Image" class="w-full h-52 object-cover" alt="No Image">
                @endif
                <div class="p-4">
                    <h3 class="font-semibold text-gray-800">{{ $sim->title_ru }}</h3>
                    @if($sim->description_ru)
                        <p class="text-gray-600 text-sm mt-1">{{ Str::limit($sim->excerpt_ru, 120) }}</p>
                    @else
                        <p class="text-gray-600 text-sm mt-1">Описание отсутствует.</p>
                    @endif
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
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.restaurantSwiper', {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
</script>
<style>
    .restaurantSwiper .swiper-pagination-bullet {
        background-color: white;
        opacity: 0.7;
    }

    .restaurantSwiper .swiper-pagination-bullet-active {
        background-color: white;
        opacity: 1;
    }
</style>

@endsection


