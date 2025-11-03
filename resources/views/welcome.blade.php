@extends('layouts.app')

@section("header")

<header class="absolute top-0 left-0 w-full z-50 hidden md:flex" >
    <div class="w-full flex items-center justify-between p-4 "
         style="padding-left:50px;padding-right:50px">
        <a href="/" class="flex items-center space-x-6">
            <span class="text-white font-semibold text-xl" style="font-weight: 600; font-size:17px;padding:10px;">
                Mangystau oblysy
            </span>
        </a>
<nav class="flex items-center space-x-6 text-white text-sm font-semibold">
  <a href="/" data-lang="nav-home" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;">Главная</a>
  <a href="/culture-list" data-lang="nav-culture" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;">Объекты культуры</a>
  <a href="/news" data-lang="nav-news" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;">Новости</a>
  <a href="/contacts" data-lang="nav-contacts" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;">Контакты</a>

  <div class="flex items-center space-x-2 ml-4">
    <button onclick="setLang('ru')" id="btn-ru" class="lang-btn text-white hover:text-accent transition-colors duration-300 bg-transparent border-none focus:outline-none text-sm">
      🇷🇺 Рус
    </button>
    <span class="text-gray-400">|</span>
    <button onclick="setLang('en')" id="btn-en" class="lang-btn text-white hover:text-accent transition-colors duration-300 bg-transparent border-none focus:outline-none text-sm">
      🇬🇧 Eng
    </button>
    <span class="text-gray-400">|</span>
    <button onclick="setLang('kk')" id="btn-kk" class="lang-btn text-white hover:text-accent transition-colors duration-300 bg-transparent border-none focus:outline-none text-sm">
      🇰🇿 Qaz
    </button>
  </div>

  @auth
    <a href="{{ route('admin.index') }}" data-lang="nav-admin" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;">Админ-панель</a>

    <form action="{{ route('logout') }}" method="POST" class="inline">
      @csrf
      <button type="submit" data-lang="nav-logout" class="hover:text-accent transition-colors duration-300 bg-transparent border-none cursor-pointer text-white" style="font-weight:400; font-size:15px;">
        Выйти
      </button>
    </form>
  @endauth
</nav>

    </div>
</header>
<header class="absolute top-0 left-0 w-full z-50  md:hidden ">

        <a href="/" class="flex items-center space-x-6" style="text-align: center">
            <span class="text-white font-semibold text-xl" style="font-weight: 600; font-size:17px;padding:10px;text-align:center">
                Mangystau oblysy
            </span>
        </a>

</header>
<nav class="fixed bottom-0 left-0 w-full backdrop-blur-md md:hidden" style="z-index: 1000; background-color: rgb(0 0 0 / 62%);">
    <div class="flex justify-around items-center py-2 text-white text-sm font-semibold">
        <!-- Главная -->
        <a href="/" class="flex flex-col items-center">
            <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 24 24">
                <path d="M3 12l9-9 9 9v9a3 3 0 01-3 3h-3v-6h-6v6H6a3 3 0 01-3-3v-9z"/>
            </svg>
            Главная
        </a>

        <!-- Культура -->
        <a href="/culture-list" class="flex flex-col items-center">
            <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 24 24">
                <path d="M4 22h16v-2H4v2zm2-4h12v-2H6v2zm1-4h10V6H7v8z"/>
            </svg>
            Культура
        </a>

        <!-- Новости -->
        <a href="/news" class="flex flex-col items-center">
            <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 24 24">
                <path d="M4 4h16v2H4V4zm0 4h16v2H4V8zm0 4h10v2H4v-2zm0 4h10v2H4v-2z"/>
            </svg>
            Новости
        </a>

        <!-- Контакты -->
        <a href="/contacts" class="flex flex-col items-center">
            <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 24 24">
                <path d="M21 8V7l-3 2-2-2-3 2-2-2-3 2-2-2v1l2 2-2 2v1l2-2 3 2 2-2 3 2 2-2 3 2V12l-3-2z"/>
            </svg>
            Контакты
        </a>
    </div>
</nav>


@endsection



@section('content')
<div class="relative w-full h-[85vh] md:h-[80vh] lg:h-[85vh] overflow-hidden">
    <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover">
        <source src="{{ asset('media/video.mp4') }}" type="video/mp4" />
        Ваш браузер не поддерживает видео.
    </video>
    <div class="relative z-10 bg-primary/20 bg-gradient-to-r from-primary/10 to-blue-600/40 text-white flex items-center justify-center h-full px-4 sm:px-6 text-left">
        <div class="container mx-auto max-w-9xl py-20 pt-32">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold mb-4 leading-tight opacity-0 translate-y-6 animate-fadeInUp" data-lang="main-title">
                Новые берега Каспия<br> — неизвестная красота Маңғыстау
            </h1>
            <p style="margin: 0 0 30px" class="text-base sm:text-lg md:text-xl max-w-3xl mx-auto mb-12 sm:mb-16 font-light opacity-0 translate-y-6 animate-fadeInUp delay-300" data-lang="main-desc">
                Каспийское море отступает, открывая новые островки и дороги.  
                Там, где раньше была вода — теперь просторы, полные жизни, света и тишины.  
                Мы показываем, как туда добраться и почему эти места стоит увидеть своими глазами.
            </p>
            <a href="/routes" data-lang="main-btn1" class="inline-block bg-white text-primary font-semibold px-6 sm:px-8 py-2 sm:py-3 shadow-lg hover:bg-gray-100 transition opacity-0 translate-y-6 animate-fadeInUp delay-600 text-sm sm:text-base" style="border-radius: 14px;">
                Проложить маршрут
            </a>
            <a href="/routes" data-lang="main-btn2" class="inline-block bg-white text-white font-semibold px-6 sm:px-8 py-2 sm:py-3 shadow-lg hover:bg-white transition opacity-0 translate-y-6 animate-fadeInUp delay-600 text-sm sm:text-base" style="border-radius: 14px; background:none; border:1px solid white;colo:white;">
                О проекте
            </a>
        </div>
    </div>
</div>


    </div>
</div>
<div class="bg-gray-100 py-20">
  <div class="container mx-auto max-w-7xl px-6 flex flex-col md:flex-row gap-16 items-start">
    
    <!-- Левая колонка: заголовок и текст -->
    <div class="md:w-1/2">
      <h2 class="text-4xl font-bold text-primary mb-4" data-lang="goal-title">НАША ЦЕЛЬ</h2>
      <div class="w-20 h-1 bg-primary rounded mb-6"></div>

      <div class="prose prose-sm text-gray-800" style="text-align: justify;">
        <p  data-lang="goal-desc1">Сохранение Каспийского моря и его новых берегов помогает защитить природу, культурное наследие и <span class="text-blue-900 font-semibold">будущее Маңғыстау</span>. Мы хотим показать уникальность региона и вдохновить людей беречь его богатства.</p>

        <p  data-lang="goal-desc2">Этот проект направлен на изучение и популяризацию всех новых островков и песчаных кос, чтобы каждый мог увидеть <span class="text-blue-900 font-semibold">красоту и значимость</span> Каспия.</p>
      </div>
            <a href="/routes"  data-lang="goal-btn" class="inline-block bg-none text-primary font-600 px-6 sm:px-8 py-2 sm:py-3  hover:bg-primary hover:text-white transition opacity-0 translate-y-6 animate-fadeInUp delay-600 text-sm sm:text-base" style="border-radius: 16px;font-size:16px;font-weight:500; border:1px solid rgb(15 59 99); margin-top:30px;" >
                Ознакомиться
            </a>
    </div>

    <!-- Правая колонка: грид с изображениями -->
    <div id="heritage-container" class="md:w-1/2 grid grid-cols-2 grid-rows-2 gap-4">
      
      <!-- img1 занимает две строки -->
      <div style="border-radius: 16px;" class="relative row-span-2 bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300">
        <img src="/images/heritages/airakty.jpg" alt="Долина замков Айракты" class="w-full h-full object-cover">
        <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
            <h3 class="font-bold text-lg" data-lang="ayrakty-title"></h3> <p class="text-sm" data-lang="ayrakty-desc"></p>

        </div>
      </div>

      <!-- img2 -->
      <div style="border-radius: 16px;" class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300">
        <img src="/images/heritages/buhta.jpeg" alt="Голубая Бухта" class="w-full h-full object-cover">
        <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
            <h3 class="font-bold text-lg" data-lang="buhta-title"></h3> <p class="text-sm" data-lang="buhta-desc"></p>

        </div>
      </div>

      <!-- img3 -->
      <div style="border-radius: 16px;" class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300">
        <img src="/images/heritages/12.jpg" alt="Пещера Балаюк" class="w-full h-full object-cover">
        <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
          <h3 class="font-bold text-lg" data-lang="balayuk-title"></h3> <p class="text-sm" data-lang="balayuk-desc"></p>
        </div>
      </div>

    </div>

  </div>
</div>

<div class="bg-white py-20">
<div class="container mx-auto max-w-7xl px-6 flex flex-col md:flex-row gap-8">
        <!-- Заголовок -->
        <div class="mb-12">
            <h2 class="text-4xl font-bold text-primary mb-4 uppercase">Наши преимущества</h2>
                <div class="w-20 h-1 bg-primary rounded"></div>
        </div>

        <!-- Флекс блок с двумя колонками -->
     <div class="flex flex-col md:flex-row gap-8">
    <!-- Левая колонка -->
    <div class="flex-1 flex flex-col gap-6">
        <div class="bg-gray-50 p-6 rounded-xl shadow hover:shadow-lg transition flex-1 flex items-start gap-4">
            <div>
                <h3 class="text-xl font-semibold mb-1">Сохранение природы</h3>
                <p class="text-gray-700 text-sm">Каспий и новые островки под нашим контролем — для будущих поколений.</p>
            </div>
        </div>

        <div class="bg-gray-50 p-6 rounded-xl shadow hover:shadow-lg transition flex-1 flex items-start gap-4">
            <div>
                <h3 class="text-xl font-semibold mb-1">Культурное наследие</h3>
                <p class="text-gray-700 text-sm">Изучаем и популяризируем памятники, историю и традиции Маңғыстау.</p>
            </div>
        </div>
    </div>

    <!-- Правая колонка -->
    <div class="flex-1 flex flex-col gap-6">
        <div class="bg-gray-50 p-6 rounded-xl shadow hover:shadow-lg transition flex-1 flex items-start gap-4">
            <div>
                <h3 class="text-xl font-semibold mb-1">Современные инициативы</h3>
                <p class="text-gray-700 text-sm">Фестивали, мастер-классы и выставки развивают местное творчество.</p>
            </div>
        </div>

        <div class="bg-gray-50 p-6 rounded-xl shadow hover:shadow-lg transition flex-1 flex items-start gap-4">
            <div>
                <h3 class="text-xl font-semibold mb-1">Доступность информации</h3>
                <p class="text-gray-700 text-sm">Онлайн-карта и экскурсии помогают каждому увидеть новые объекты Каспия.</p>
            </div>
        </div>
    </div>
</div>

    </div>
</div>
<section class=" relative w-full py-20 bg-gray-100" id="attractions">
  <div class="container mx-auto px-6 max-w-7xl">
            <div class="mb-5 ">
                <h2 class="text-4xl font-bold text-primary mb-4 uppercase">Наши достояния</h2>
                <div class="w-20 h-1 bg-primary rounded"></div>
            </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 auto-rows-[300px]">
      <!-- Карточка 1: стандартная -->
      <div style="border-radius: 16px;" class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300">
        <img src="images/boszhyra.jpg" alt="Бозжыра" class="w-full h-full object-cover">
        <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
          <h3 class="font-bold text-lg">Бозжыра</h3>
          <p class="text-sm">Удивительные скалы и каньоны Мангистау</p>
        </div>
      </div>

      <!-- Карточка 2: занимает две колонки -->
      <div style="border-radius: 16px;" class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300 col-span-2">
        <img src="images/heritages/sherqala.jpg" alt="Шеркала" class="w-full h-full object-cover">
        <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
          <h3 class="font-bold text-lg">Шеркала</h3>
          <p class="text-sm">Современный город на побережье Каспия</p>
        </div>
      </div>

      <!-- Карточка 3: стандартная -->
      <div style="border-radius: 16px;" class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300">
        <img src="images/heritages/kok-kala.jpg" alt="Кок-кала" class="w-full h-full object-cover">
        <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
          <h3 class="font-bold text-lg">Урочище Кок-кала</h3>
          <p class="text-sm">Маленькое село с красивыми видами</p>
        </div>
      </div>

      <!-- Карточка 4: стандартная -->
      <div style="border-radius: 16px;" class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300">
        <img src="images/heritages/sor.jpg" alt="Сор Тузбаир" class="w-full h-full object-cover">
        <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
          <h3 class="font-bold text-lg">Сор Тузбаир</h3>
          <p class="text-sm">Исторические памятники и скалы</p>
        </div>
      </div>

      <!-- Карточка 5: стандартная -->
      <div style="border-radius: 16px;" class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300">
        <img src="images/heritages/kaspi.jpg" alt="Каспи" class="w-full h-full object-cover">
        <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
          <h3 class="font-bold text-lg">Каспийское море</h3>
          <p class="text-sm">Красивые холмы и живописные виды</p>
        </div>
      </div>

      <!-- Карточка 6: занимает две колонки -->
      <div style="border-radius: 16px;" class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300 col-span-2">
        <img src="images/heritages/kyzylkup.jpg" alt="Кызылкуп" class="w-full h-full object-cover">
        <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
          <h3 class="font-bold text-lg">Урочище Кызылкуп</h3>
          <p class="text-sm">Исторические маршруты через Мангистауские степи</p>
        </div>
      </div>

    </div>
  </div>
</section>







{{-- <div class="bg-gray-100 py-20">
    <div class="container mx-auto max-w-5xl px-6">
    <h2 class="text-3xl font-bold mb-6 text-center">Почему важно сохранять Каспий и его новые берега?</h2>
    <div class="prose prose-lg max-w-none text-gray-800" style="text-align: justify;">
        <p>Каспийское море — это не просто водоём. Это сердце Маңғыстау, источник жизни, истории и вдохновения для людей, живущих у его берегов. Сегодня Каспий меняется: уровень воды снижается, появляются новые островки и песчаные косы, исчезают старые бухты.</p>
        <p>Эти перемены открывают перед нами неизвестные территории, но одновременно несут угрозу экосистемам и культурным памятникам, связанным с морем. Если не обратить внимание сейчас, мы можем потерять не только природную красоту, но и часть своей истории.</p>
        <p>Сохранение Каспия — это забота о будущем региона, о людях, которые веками жили в гармонии с морем, о природе, которая формирует нашу идентичность. Это возможность показать миру, как уникален и живописен Маңғыстау.</p>
        <p class="font-semibold">Берегите море — и оно сохранит нас. Каспий — это наша живая память и наше будущее.</p>
    </div>
</div> --}}

</div>




<div class="relative bg-primary text-white py-20 overflow-hidden">
    <!-- Фоновое изображение с blur и синим фильтром -->
    <div class="absolute inset-0">
        <img src="{{ asset('images/boszhyra.jpg') }}" alt="Фон" class="w-full h-full object-cover filter blur-sm brightness-75" style="object-position: bottom" />
        <div class="absolute inset-0 bg-blue-900 opacity-40"></div>
    </div>

    <div class="relative container mx-auto max-w-6xl px-6 text-center">
        <h2 class="text-4xl font-bold mb-6">Новые берега Маңғыстау — открываем неизведанное</h2>
        <p class="text-lg mb-10 max-w-3xl mx-auto font-light">
            Каспийское море отступает, создавая новые островки, песчаные косы и удивительные маршруты. Мы исследуем их, показываем красоту и рассказываем, как туда добраться.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left text-white">
            <div class="bg-white/10 rounded-lg p-6 backdrop-blur-sm">
                <h3 class="text-xl font-semibold mb-2">Новые маршруты</h3>
                <p>Показываем, как безопасно и интересно посетить недавно открывшиеся островки и побережья.</p>
            </div>
            <div class="bg-white/10 rounded-lg p-6 backdrop-blur-sm">
                <h3 class="text-xl font-semibold mb-2">Природные чудеса</h3>
                <p>Уникальные пейзажи, редкая флора и фауна — места, которые стоит увидеть своими глазами.</p>
            </div>
            <div class="bg-white/10 rounded-lg p-6 backdrop-blur-sm">
                <h3 class="text-xl font-semibold mb-2">Исследования и фотографии</h3>
                <p>Документируем изменения побережья, создаем фотогалереи и визуальные маршруты для путешественников.</p>
            </div>
        </div>

        <a href="/routes" class="mt-12 inline-block bg-white text-primary font-semibold px-8 py-3 shadow-lg hover:bg-gray-100 transition" style="border-radius: 14px;">
            Посмотреть маршруты и островки
        </a>
    </div>
</div>
{{-- 
<div class="bg-white py-16">
    <div class="container mx-auto max-w-6xl px-6">
        <h2 class="text-3xl font-bold text-center mb-8">Карта объектов культуры</h2>
        <div id="kzMap" class="w-full h-[500px] rounded-xl shadow"></div>
    </div>
</div> --}}



<div class="bg-gray-50 py-16" style="display: none ">
    <div class="container mx-auto max-w-3xl px-6">
        <h2 class="text-3xl font-bold mb-6 text-center text-primary">Обратная связь</h2>
        <form action="/" method="POST" class="bg-white rounded-3xl shadow-lg p-8 space-y-6" novalidate>
            @csrf
            <div>
                <label for="name" class="block mb-2 font-semibold text-gray-700">Имя</label>
                <input type="text" id="name" name="name" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" />
            </div>
            <div>
                <label for="email" class="block mb-2 font-semibold text-gray-700">Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" />
            </div>
            <div>
                <label for="message" class="block mb-2 font-semibold text-gray-700">Сообщение</label>
                <textarea id="message" name="message" rows="5" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
            </div>
            <button type="submit" class="bg-primary text-white font-semibold px-6 py-3 rounded-full hover:bg-primary-dark transition">
                Отправить
            </button>
        </form>
    </div>
</div>

<button id="btnScrollTop" aria-label="Наверх" style="font-size: 30px; padding:10px" 
    class="fixed bottom-8 right-8 bg-primary text-white rounded-full p-4 shadow-lg hover:bg-primary-dark transition opacity-0 pointer-events-none">
    ↑
</button>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script>
document.addEventListener("DOMContentLoaded", () => {
    ymaps.ready(() => {
        const map = new ymaps.Map("kzMap", {
            center: [48.0196, 66.9237],
            zoom: 5,
            controls: ["zoomControl"]
        });

        const cultures = @json($cultures);

        cultures.forEach(culture => {
            if (culture.latitude && culture.longitude) {
                const balloonContent = `
                    <strong>${culture.title}</strong><br>
                    <em>${culture.category.name}</em><br>
                    ${culture.description ? culture.description.substring(0, 200) + '...' : ''}
                    ${culture.image ? `<div style="margin-top: 8px;"><img src="http://127.0.0.1:8000/storage/${culture.image}" alt="${culture.title}" style="max-width: 160px; border-radius: 5px;"></div>` : ''}
                    <div style="margin-top: 10px;">
                        <a href="/cultures/${culture.id}" target="_blank" 
                        style="display:inline-block; padding: 6px 12px; background-color: #2563eb; color: white; border-radius: 6px; text-decoration: none; font-weight: 600; font-family: 'Montserrat', sans-serif;">
                        Подробнее
                        </a>
                    </div>
                `;

                const placemark = new ymaps.Placemark(
                    [culture.latitude, culture.longitude],
                    {
                        balloonContent: balloonContent,
                    },
                    {
                        preset: 'islands#icon',
                        iconColor: '#2563eb',
                        cursor: 'pointer'
                    }
                );

                placemark.events.add('click', () => {
                    const el = document.getElementById('culture-' + culture.id);
                    if (el) {
                        el.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        el.classList.add('ring', 'ring-primary', 'ring-offset-2');
                        setTimeout(() => el.classList.remove('ring', 'ring-primary', 'ring-offset-2'), 2000);
                    }
                });

                map.geoObjects.add(placemark);
            }
        });

    });

    const btnScrollTop = document.getElementById('btnScrollTop');
    window.addEventListener('scroll', () => {
        const show = window.scrollY > 300;
        btnScrollTop.classList.toggle('opacity-0', !show);
        btnScrollTop.classList.toggle('pointer-events-none', !show);
        btnScrollTop.classList.toggle('opacity-100', show);
    });

    btnScrollTop.addEventListener('click', () => {
        window.scrollTo({top: 0, behavior: 'smooth'});
    });
});
</script>

<style>
    ymaps {
        font-family: "Montserrat";
    }
@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(1.5rem);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}
.animate-fadeInUp {
    animation: fadeInUp 0.8s ease forwards;
}
.delay-300 {
    animation-delay: 0.3s;
}
.delay-600 {
    animation-delay: 0.6s;
}
</style>
@endsection
