<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Центр охраны наследия области Абай</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    @yield("restaurant_meta")
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0F3B63',     
                        accent: '#FF5A1F',       
                        background: '#F9FAFB',   
                        textPrimary: '#1E293B',  
                        textSecondary: '#64748B' 
                    },
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif'],
                    }
                }
            }
        }
    </script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

</head>
<style>
    /* Общий темный скроллбар для всего сайта */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #121212; 
}

::-webkit-scrollbar-thumb {
    background: #333;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: #9fbad3; /* Цвет при наведении */
}

/* Для Firefox */
* {
    scrollbar-width: thin;
    scrollbar-color: #333 #121212;
}
</style>
<body class="flex flex-col min-h-screen bg-background font-sans text-textPrimary">


@if(request()->is('/'))
    <header class="absolute top-0 left-0 w-full z-50 hidden md:flex">
        <div class="w-full flex items-center justify-between p-4" style="padding-left:50px;padding-right:50px">
            <a href="/" class="flex items-center space-x-6">
                <span class="text-white font-semibold text-xl" style="font-weight:600; font-size:17px;padding:10px;">
                    Mangystau oblysy
                </span>
            </a>
            <nav class="flex items-center space-x-6 text-white text-sm font-semibold">
                <div class="relative group inline-block">
                    <button 
                        class="flex items-center gap-1 text-gray-800 hover:text-white-700 transition-colors duration-300"
                        style="font-weight:400; font-size:15px;color:white">
                        О регионе
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180" 
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div 
                        class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transform transition-all duration-200 origin-top z-50">
                        <a href="/about" 
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors duration-150" style="font-weight: 400">
                        О нас
                        </a>
                        <a href="/history" 
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors duration-150" style="font-weight: 400">
                        История региона
                        </a>
                        <a href="/contacts" 
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors duration-150" style="font-weight: 400">
                        Контакты
                        </a>
                    </div>
                </div>
                <a href="/culture-list" data-lang="nav-culture" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;"></a>
                <a href="/restaurants" data-lang="nav-restaurant" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;"></a>
                <a href="/hotels" data-lang="nav-hotels" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;"></a>

                <div class="relative inline-block text-left">
                <select 
                    onchange="setLang(this.value)" 
                    class="appearance-none bg-white/10 backdrop-blur-md text-white px-4 py-2 pr-8 rounded-lg text-sm focus:outline-none border border-white/30 hover:border-white transition-colors duration-300"
                >
                    <option class="bg-black/50 text-white" value="ru" {{ app()->getLocale() == 'ru' ? 'selected' : '' }}>🇷🇺 Рус</option>
                    <option class="bg-black/50 text-white" value="kk" {{ app()->getLocale() == 'kk' ? 'selected' : '' }}>🇰🇿 Qaz</option>
                    <option class="bg-black/50 text-white" value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>🇬🇧 UK</option>
                </select>


                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>



                @auth
                    <a href="{{ route('admin.index') }}" data-lang="nav-admin" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;">Админ-панель</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" data-lang="nav-logout" class="hover:text-accent transition-colors duration-300 bg-transparent border-none cursor-pointer text-white" style="font-weight:400; font-size:15px;">Выйти</button>
                    </form>
                @endauth
            </nav>
        </div>
    </header>
    <header class="absolute shadow top-0 left-0 w-full md:hidden bg-transparent backdrop-blur-sm" style="z-index:50;">
    <div class="w-full flex items-center justify-between p-3 px-4">
        <a href="/" class="flex items-center space-x-3">
            <span class="text-white font-semibold text-base" style="font-weight:600; font-size:15px;">
                Mangystau oblysy
            </span>
        </a>

        <button id="mobileMenuBtn" aria-expanded="false" aria-controls="mobileMenu"
                class="p-2 rounded-lg bg-white/10 hover:bg-white/20 text-white focus:outline-none focus:ring-2 focus:ring-primary">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <span class="sr-only">Открыть меню</span>
        </button>
    </div>
</header>

<div id="mobileOverlay" class="fixed inset-0 bg-black/50 z-[55] hidden md:hidden opacity-0 transition-opacity duration-300"
     aria-hidden="true"></div>

<div id="mobileMenu"
     class="fixed top-0 right-0 h-full w-[50%] max-w-[420px] md:hidden bg-white/95 backdrop-blur-sm shadow-lg z-[60] overflow-y-auto transform translate-x-full transition-transform duration-300"
     aria-hidden="true" role="dialog" aria-label="Мобильное меню" style="min-height:100vh;">
    <div class="flex items-center justify-between p-4 border-b">
        <div class="text-lg font-semibold">Меню</div>
        <button id="mobileMenuClose" class="p-2 rounded-lg hover:bg-black/5" aria-label="Закрыть меню">
            <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <nav class="flex flex-col p-2 space-y-2">
        <a href="/" class="block px-4 py-2 text-black hover:bg-gray-100 rounded  text-1xl">Главная</a>
        <a href="/about" class="block px-4 py-2 text-black hover:bg-gray-100 rounded  text-1xl">О проекте</a>
        <a href="/history" class="block px-4 py-2 text-black hover:bg-gray-100 rounded  text-1xl">История региона</a>
        <a href="/contacts" class="block px-4 py-2 text-black hover:bg-gray-100 rounded  text-1xl">Контакты</a>
        <a href="/culture-list" class="block px-4 py-2 text-black hover:bg-gray-100 rounded text-1xl" >Объекты культуры</a>
        <a href="/restaurants" class="block px-4 py-2 text-black hover:bg-gray-100 rounded  text-1xl">Рестораны</a>
        <a href="/hotels" class="block px-4 py-2 text-black hover:bg-gray-100 rounded  text-1xl">Отели</a>
    </nav>
</div>

<script>
(function(){
    const btn = document.getElementById('mobileMenuBtn');
    const menu = document.getElementById('mobileMenu');
    const overlay = document.getElementById('mobileOverlay');
    const closeBtn = document.getElementById('mobileMenuClose');
    if (!btn || !menu || !overlay) return;

    function showOverlay() {
        overlay.classList.remove('hidden');
        overlay.classList.remove('opacity-0');
        overlay.classList.add('opacity-100');
        overlay.setAttribute('aria-hidden', 'false');
    }
    function hideOverlay() {
        overlay.classList.add('opacity-0');
        overlay.classList.remove('opacity-100');
        setTimeout(()=> overlay.classList.add('hidden'), 300);
        overlay.setAttribute('aria-hidden', 'true');
    }

    function openMenu() {
        menu.classList.remove('translate-x-full');
        menu.classList.add('translate-x-0');
        menu.setAttribute('aria-hidden', 'false');
        showOverlay();
        btn.setAttribute('aria-expanded', 'true');
        document.body.classList.add('overflow-hidden');
    }
    function closeMenu() {
        menu.classList.remove('translate-x-0');
        menu.classList.add('translate-x-full');
        menu.setAttribute('aria-hidden', 'true');
        hideOverlay();
        btn.setAttribute('aria-expanded', 'false');
        document.body.classList.remove('overflow-hidden');
    }

    btn.addEventListener('click', function(e){
        e.stopPropagation();
        if (menu.classList.contains('translate-x-0')) closeMenu(); else openMenu();
    });

    if (closeBtn) closeBtn.addEventListener('click', closeMenu);
    overlay.addEventListener('click', closeMenu);

    document.addEventListener('keydown', function(e){
        if (e.key === 'Escape' && menu.classList.contains('translate-x-0')) closeMenu();
    });

    document.addEventListener('click', function(e){
        if (menu.classList.contains('translate-x-0') && !menu.contains(e.target) && e.target !== btn) {
            closeMenu();
        }
    });
})();
</script>
@else
<header class="relative shadow top-0 left-0 w-full z-50 hidden md:flex bg-white overflow-visible">
        <div class="absolute inset-0"
            style="
                background-image: url('/images/icon.svg'), url('/images/icon.svg');
                background-repeat: repeat-x, repeat-x;
                background-position: top -55px left, bottom -55px left;
                background-size: 80px auto;
                opacity: 0.25;
                pointer-events: none;
            ">
        </div>

    <div class="w-full flex items-center justify-between p-4 relative z-10" style="padding-left:50px;padding-right:50px">
        <a href="/" class="flex items-center space-x-6">
            <span class="text-black font-semibold text-xl" style="font-weight:600; font-size:17px;padding:10px;">
                Mangystau oblysy
            </span>
        </a>

        <nav class="flex items-center space-x-6 text-black text-sm font-semibold">
                <div class="relative group inline-block">
                    <button 
                        class="flex items-center gap-1 text-gray-800 hover:text-white-700 transition-colors duration-300"
                        style="font-weight:400; font-size:15px;">
                        О регионе
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180" 
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div 
    class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg 
           opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transform 
           transition-all duration-200 origin-top z-[9999]">

                        <a href="/about" 
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors duration-150" style="font-weight: 400">
                        О нас
                        </a>
                        <a href="/history" 
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors duration-150" style="font-weight: 400">
                        История региона
                        </a>
                        <a href="/contacts" 
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors duration-150" style="font-weight: 400">
                        Контакты
                        </a>
                    </div>
                </div>
                
                            <a href="/culture-list" data-lang="nav-culture" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;"></a>
            <a href="/restaurants" data-lang="nav-restaurant" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;"></a>
            <a href="/hotels" data-lang="nav-hotels" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;"></a>
             <div class="relative inline-block text-left">
                <select 
                    onchange="setLang(this.value)" 
                    class="appearance-none bg-white/10 backdrop-blur-md text-black px-4 py-2 pr-8 rounded-lg text-sm focus:outline-none border border-black/30 hover:border-black/40 transition-colors duration-300"
                >
                    <option class="bg-black/50 text-white" value="ru" {{ app()->getLocale() == 'ru' ? 'selected' : '' }}>🇷🇺 Рус</option>
                    <option class="bg-black/50 text-white" value="kk" {{ app()->getLocale() == 'kk' ? 'selected' : '' }}>🇰🇿 Qaz</option>
                    <option class="bg-black/50 text-white" value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>🇬🇧 UK</option>
                </select>


                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                        <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
        </nav>
    </div>
</header>


    <header class="shadow top-0 left-0 w-full md:hidden bg-transparent backdrop-blur-sm" style="z-index:50;">
               <div class="absolute inset-0"
            style="
                background-image: url('/images/icon.svg'), url('/images/icon.svg');
                background-repeat: repeat-x, repeat-x;
                background-position: top -55px left, bottom -55px left;
                background-size: 80px auto;
                opacity: 0.25;
                pointer-events: none;
            ">
        </div>
        <div class="w-full flex items-center justify-between p-3 px-4">
        <a href="/" class="flex items-center space-x-3">
            <span class="text-black font-semibold text-base" style="font-weight:600; font-size:15px;">
                Mangystau oblysy
            </span>
        </a>

        <button id="mobileMenuBtn" aria-expanded="false" aria-controls="mobileMenu"
                class="p-2 rounded-lg bg-white/10 hover:bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-primary">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <span class="sr-only">Открыть меню</span>
        </button>
        </div>
    </header>

<div id="mobileOverlay" class="fixed inset-0 bg-black/50 z-[55] hidden md:hidden opacity-0 transition-opacity duration-300"
     aria-hidden="true"></div>

<div id="mobileMenu"
     class="fixed top-0 right-0 h-full w-[50%] max-w-[420px] md:hidden bg-white/95 backdrop-blur-sm shadow-lg z-[60] overflow-y-auto transform translate-x-full transition-transform duration-300"
     aria-hidden="true" role="dialog" aria-label="Мобильное меню" style="min-height:100vh;">
    
    <div class="absolute inset-0 z-[-1]"
         style="
             background-image: url('/images/icon.svg');
             background-repeat: repeat-y;
             background-position: left -90px top;
             background-size: 220px auto;
             opacity: 0.09;
             pointer-events: none;
         ">
    </div>

    <div class="flex items-center justify-between p-[14px] border-b bg-white/80 sticky top-0">
        <div class="text-black font-semibold text-base text-[15px]">Меню</div>
        <button id="mobileMenuClose" class="p-2 rounded-lg hover:bg-black/5" aria-label="Закрыть меню">
            <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <nav class="flex flex-col p-4 space-y-2 relative z-10">
        <a href="/" class="block px-2 py-2 text-black hover:bg-gray-100/50 rounded text-[16px] transition-colors">Главная</a>
        <a href="/about" class="block px-2 py-2 text-black hover:bg-gray-100/50 rounded text-[16px] transition-colors">О проекте</a>
        <a href="/history" class="block px-2 py-2 text-black hover:bg-gray-100/50 rounded text-[16px] transition-colors">История региона</a>
        <a href="/culture-list" class="block px-2 py-2 text-black hover:bg-gray-100/50 rounded text-[16px] transition-colors">Объекты культуры</a>
        <a href="/restaurants" class="block px-2 py-2 text-black hover:bg-gray-100/50 rounded text-[16px] transition-colors">Рестораны</a>
        <a href="/hotels" class="block px-2 py-2 text-black hover:bg-gray-100/50 rounded text-[16px] transition-colors">Отели</a>
        <a href="/contacts" class="block px-2 py-2 text-black hover:bg-gray-100/50 rounded text-[16px] transition-colors">Контакты</a>
    </nav>
</div>
<script>
(function(){
    const btn = document.getElementById('mobileMenuBtn');
    const menu = document.getElementById('mobileMenu');
    const overlay = document.getElementById('mobileOverlay');
    const closeBtn = document.getElementById('mobileMenuClose');
    if (!btn || !menu || !overlay) return;

    function showOverlay() {
        overlay.classList.remove('hidden');
        overlay.classList.remove('opacity-0');
        overlay.classList.add('opacity-100');
        overlay.setAttribute('aria-hidden', 'false');
    }
    function hideOverlay() {
        overlay.classList.add('opacity-0');
        overlay.classList.remove('opacity-100');
        // оставляем hidden после анимации
        setTimeout(()=> overlay.classList.add('hidden'), 300);
        overlay.setAttribute('aria-hidden', 'true');
    }

    function openMenu() {
        menu.classList.remove('translate-x-full');
        menu.classList.add('translate-x-0');
        menu.setAttribute('aria-hidden', 'false');
        showOverlay();
        btn.setAttribute('aria-expanded', 'true');
        document.body.classList.add('overflow-hidden');
    }
    function closeMenu() {
        menu.classList.remove('translate-x-0');
        menu.classList.add('translate-x-full');
        menu.setAttribute('aria-hidden', 'true');
        hideOverlay();
        btn.setAttribute('aria-expanded', 'false');
        document.body.classList.remove('overflow-hidden');
    }

    btn.addEventListener('click', function(e){
        e.stopPropagation();
        if (menu.classList.contains('translate-x-0')) closeMenu(); else openMenu();
    });

    if (closeBtn) closeBtn.addEventListener('click', closeMenu);
    overlay.addEventListener('click', closeMenu);

    document.addEventListener('keydown', function(e){
        if (e.key === 'Escape' && menu.classList.contains('translate-x-0')) closeMenu();
    });

    document.addEventListener('click', function(e){
        if (menu.classList.contains('translate-x-0') && !menu.contains(e.target) && e.target !== btn) {
            closeMenu();
        }
    });
})();
</script>
@endif
<nav class="fixed bottom-4 inset-x-4 md:hidden z-[1002]">
  <div
    class="bg-black/50 backdrop-blur-lg rounded-2xl shadow-lg px-2 py-2 flex justify-between items-center text-sm text-white"
    style="padding-bottom: calc(env(safe-area-inset-bottom) + 0.5rem);">

    <!-- Главная -->
    <a href="/"
       aria-label="Главная"
       class="flex-1 flex flex-col items-center py-2 mx-1 rounded-lg transition-colors duration-200 text-center {{ request()->is('/') ? 'bg-white/10 text-white' : 'text-white/80 hover:bg-white/5' }}">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
           stroke-width="1.8" stroke="currentColor" class="w-6 h-6 mb-1">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M2.25 12l9.75-9.75L21.75 12M4.5 9.75V21h15V9.75" />
      </svg>
      <span class="text-xs leading-tight">Главная</span>
    </a>
    <!-- Культура -->
    <a href="/culture-list"
    aria-label="Культура"
    class="flex-1 flex flex-col items-center py-2 mx-1 rounded-lg transition-colors duration-200 text-center {{ request()->is('culture-list*') ? 'bg-white/10 text-white' : 'text-white/80 hover:bg-white/5' }}">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="1.6" class="w-6 h-6 mb-1">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M2.75 5.5l8.25-2.5 8.25 2.5M2.75 5.5v12.25l8.25 2.75m0-15L19.25 5.5m-8.25 15V8.25m0 0L19.25 5.5v12.25l-8.25 2.75" />
    </svg>
    <span class="text-xs leading-tight">Культура</span>
    </a>

    <!-- Рестораны -->
    <a href="/restaurants"
       aria-label="Рестораны"
       class="flex-1 flex flex-col items-center py-2 mx-1 rounded-lg transition-colors duration-200 text-center {{ request()->is('restaurants*') ? 'bg-white/10 text-white' : 'text-white/80 hover:bg-white/5' }}">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
           stroke-width="1.8" stroke="currentColor" class="w-6 h-6 mb-1">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M6 3v18m6-18v18m6-18v18M3 8h18" />
      </svg>
      <span class="text-xs leading-tight">Рестораны</span>
    </a>

    <!-- Отели -->
    <a href="/hotels"
       aria-label="Отели"
       class="flex-1 flex flex-col items-center py-2 mx-1 rounded-lg transition-colors duration-200 text-center {{ request()->is('hotels*') ? 'bg-white/10 text-white' : 'text-white/80 hover:bg-white/5' }}">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
           stroke-width="1.8" stroke="currentColor" class="w-6 h-6 mb-1">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M4.5 21V9.75l7.5-6 7.5 6V21M9 21v-6h6v6" />
      </svg>
      <span class="text-xs leading-tight">Отели</span>
    </a>
  </div>
</nav>


    <main class="flex-grow ">
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-2 max-w-10xl flex flex-col md:flex-row md:justify-between md:items-start gap-8">
            <div class="md:w-1/2">
                <h2 class="text-xl font-bold mb-4" data-lang="footer-title">Новые берега Каспия</h2>
                <p class="text-gray-300 text-sm leading-relaxed" data-lang="footer-desc">
                    — неизвестная красота Маңғыстау<br>
                    Каспийское море отступает, открывая новые островки и дороги. Там, где раньше была вода — теперь просторы, полные жизни, света и тишины. Мы показываем, как туда добраться и почему эти места стоит увидеть своими глазами.
                </p>
            </div>

            <div class="md:w-1/2 flex flex-col md:flex-row md:justify-between gap-6">
                <div>
                    <h3 class="font-semibold mb-2" data-lang="footer-nav-title">Навигация</h3>
                    <ul class="space-y-1 text-gray-400 text-sm">
                        <li><a href="/" class="hover:text-white transition" data-lang="nav-home">Главная</a></li>
                        <li><a href="/culture-list" class="hover:text-white transition" data-lang="nav-culture">Объекты культуры</a></li>
                        <li><a href="/contacts" class="hover:text-white transition" data-lang="nav-contacts">Контакты</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-2" data-lang="footer-share-title">Поделиться</h3>
                    <ul class="space-y-1 text-gray-400 text-sm">
                        <li><a href="#" class="hover:text-white transition" data-lang="share-facebook">Facebook</a></li>
                        <li><a href="#" class="hover:text-white transition" data-lang="share-twitter">Twitter</a></li>
                        <li><a href="#" class="hover:text-white transition" data-lang="share-telegram">Telegram</a></li>
                        <li><a href="#" class="hover:text-white transition" data-lang="share-whatsapp">WhatsApp</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mt-12 border-t border-gray-800 pt-6 text-center text-gray-500 text-sm" data-lang="footer-copyright">
            &copy; {{ date('Y') }}. Все права защищены.
        </div>
    </footer>

    <script src="/js/lang.js"></script>

</body>
</html>
