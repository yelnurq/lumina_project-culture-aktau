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
    <img src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=1400&q=80"
         class="w-full h-full object-cover blur-sm scale-105" alt="Ресторан Kaspiy Sunset">
    <div class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
        <h1 class="text-white text-3xl md:text-5xl font-extrabold text-center px-4 tracking-wide">
            Ресторан «Kaspiy Sunset»
        </h1>
    </div>
</div>

<div class="container mx-auto px-6 max-w-6xl mt-[40px] font-montserrat text-gray-900" style="padding-bottom: 60px;">

    {{-- Заголовок --}}
    <header class="mb-10 border-b border-gray-300 pb-6 flex flex-col md:flex-row md:items-center md:justify-between">
        <h1 class="text-[28px] font-extrabold text-primary mb-4 md:mb-0">Ресторан «Kaspiy Sunset»</h1>
        <p class="text-[16px] font-semibold text-gray-800">
            Категория: <span class="text-gray-700">Казахская и Европейская кухня</span>
        </p>
    </header>

    {{-- Описание и главное фото --}}
    <section class="mb-12 clearfix">
        <img 
            src="https://images.unsplash.com/photo-1555992336-cbfac5b3e0cc?auto=format&fit=crop&w=900&q=80" 
            alt="Kaspiy Sunset"
            class="float-left w-full md:w-[45%] max-w-md mr-6 mb-4 rounded-xl shadow-lg object-cover max-h-[450px]" 
        />
        <div class="text-[16px] leading-relaxed text-gray-800 text-justify">
            Добро пожаловать в ресторан <strong>«Kaspiy Sunset»</strong> — одно из самых атмосферных заведений города Актау, 
            расположенное прямо на побережье Каспийского моря.  
            Здесь вас ждут изысканные блюда казахской и европейской кухни, 
            панорамный вид на закат, живая музыка и уютная терраса под открытым небом.
            <br><br>
            Ресторан идеально подходит как для романтического ужина, так и для семейных мероприятий и корпоративных встреч.  
            Каждый вечер вас ждёт живая музыка и специальное предложение от шеф-повара.
        </div>
    </section>

    {{-- Галерея --}}
    <section class="mb-12">
        <h2 class="text-[18px] font-semibold mb-4 text-[#444]">Фотогалерея</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=800&q=80"
                 class="w-full h-[200px] object-cover rounded-xl shadow-lg hover:scale-105 transition-transform" alt="">
            <img src="https://images.unsplash.com/photo-1578683010236-d716f9a3f461?auto=format&fit=crop&w=800&q=80"
                 class="w-full h-[200px] object-cover rounded-xl shadow-lg hover:scale-105 transition-transform" alt="">
            <img src="https://images.unsplash.com/photo-1613145993486-91f8b6a3cb93?auto=format&fit=crop&w=800&q=80"
                 class="w-full h-[200px] object-cover rounded-xl shadow-lg hover:scale-105 transition-transform" alt="">
            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=800&q=80"
                 class="w-full h-[200px] object-cover rounded-xl shadow-lg hover:scale-105 transition-transform" alt="">
            <img src="https://images.unsplash.com/photo-1578683010236-d716f9a3f461?auto=format&fit=crop&w=800&q=80"
                 class="w-full h-[200px] object-cover rounded-xl shadow-lg hover:scale-105 transition-transform" alt="">
            <img src="https://images.unsplash.com/photo-1541544741938-0af808871cc0?auto=format&fit=crop&w=800&q=80"
                 class="w-full h-[200px] object-cover rounded-xl shadow-lg hover:scale-105 transition-transform" alt="">
        </div>
    </section>


    {{-- Меню (фиктивное) --}}
    <section class="mb-12">
        <h2 class="text-[18px] font-semibold mb-4 text-[#444]">Популярные блюда</h2>
        <ul class="grid md:grid-cols-2 gap-4 text-gray-800 text-[15px]">
            <li class="p-4 rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition">
                <span class="font-semibold">Бешбармак по-мангистаускому</span> — 4200 ₸<br>
                Традиционное блюдо из конины с домашней лапшой и ароматным бульоном.
            </li>
            <li class="p-4 rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition">
                <span class="font-semibold">Стейк из сибаса</span> — 5900 ₸<br>
                Подаётся с лимонным соусом и свежими овощами.
            </li>
            <li class="p-4 rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition">
                <span class="font-semibold">Коктейль «Sunset»</span> — 1800 ₸<br>
                Освежающий микс цитрусовых и маракуйи.
            </li>
            <li class="p-4 rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition">
                <span class="font-semibold">Шоколадный фондан</span> — 2500 ₸<br>
                Десерт с мягкой сердцевиной и ванильным мороженым.
            </li>
        </ul>
    </section>

    {{-- Отзывы --}}
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


    {{-- Контакты --}}
    <section class="mb-12">
        <h2 class="text-[18px] font-semibold mb-4 text-[#444]">Контактная информация</h2>
        <ul class="text-[#444] space-y-2 list-disc pl-5 text-[16px]">
            <li><span class="font-medium">Адрес:</span> г. Актау, 14-й микрорайон, набережная, здание «Sunset Plaza»</li>
            <li><span class="font-medium">Телефон:</span> +7 (7292) 55-44-22</li>
            <li><span class="font-medium">Режим работы:</span> 10:00 — 00:00 (ежедневно)</li>
        </ul>
    </section>

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
<section class="mb-12">
    <h2 class="text-[18px] font-semibold mb-4 text-[#444]">Похожие рестораны</h2>
    <div class="grid md:grid-cols-3 gap-6">
        <a href="/restaurants/aktau-sea" class="block rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition">
            <img src="https://images.unsplash.com/photo-1542038784456-1ea8e935640e?auto=format&fit=crop&w=800&q=80" class="h-[180px] w-full object-cover">
            <div class="p-4">
                <h3 class="font-semibold text-gray-800">«Aktau Sea Lounge»</h3>
                <p class="text-sm text-gray-500">Средиземноморская кухня</p>
            </div>
        </a>
        <a href="/restaurants/khan-shatyr" class="block rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition">
            <img src="https://images.unsplash.com/photo-1625943534118-40e8e7ec6ad5?auto=format&fit=crop&w=800&q=80" class="h-[180px] w-full object-cover">
            <div class="p-4">
                <h3 class="font-semibold text-gray-800">«Khan Shatyr Grill»</h3>
                <p class="text-sm text-gray-500">Мясное меню и мангал</p>
            </div>
        </a>
        <a href="/restaurants/luna" class="block rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition">
            <img src="https://images.unsplash.com/photo-1561715276-a2d087060f1f?auto=format&fit=crop&w=800&q=80" class="h-[180px] w-full object-cover">
            <div class="p-4">
                <h3 class="font-semibold text-gray-800">«Luna Terrace»</h3>
                <p class="text-sm text-gray-500">Кофейня у моря</p>
            </div>
        </a>
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
            center: [43.6470, 51.1667], // примерные координаты Актау
            zoom: 13,
            controls: ['zoomControl', 'fullscreenControl']
        });

        const placemark = new ymaps.Placemark(
            [43.6470, 51.1667],
            { hintContent: 'Ресторан «Kaspiy Sunset»' },
            { preset: 'islands#icon', iconColor: '#2563eb' }
        );

        myMap.geoObjects.add(placemark);
    });
});
</script>
@endsection
