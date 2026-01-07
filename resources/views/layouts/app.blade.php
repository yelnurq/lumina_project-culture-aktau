<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Центр охраны наследия области Абай</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Overpass:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Raleway:ital,wght@0,100..900;1,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">    <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
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
                        sans: ['Raleway', 'sans-serif'],
                        title: ['Montserrat', 'sans-serif'],
                    }
                }
            }
        }
    </script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

</head>
<style>
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

* {
    scrollbar-width: thin;
    scrollbar-color: #333 #121212;
}


</style>
<body class="flex flex-col min-h-screen bg-background font-sans text-textPrimary">


@if(request()->is('/'))
    <header class="shadow backdrop-blur-md bg-black/20 absolute top-0 left-0 w-full z-50 hidden lg:flex">
        <div class="w-full flex items-center justify-between p-4" style="padding-left:50px;padding-right:50px">
            <a href="/" class="flex items-center space-x-6">
                <span class="text-white font-semibold" style="font-weight:600; font-size:14px;padding:10px;">
                    ΛUMINA | Mangystau oblysy
                </span>
            </a>
            <nav class="flex items-center space-x-6 text-white text-sm font-semibold">
                <div class="relative group inline-block">
                    <button 
                        class="flex items-center gap-1 text-gray-800 hover:text-white-700 transition-colors duration-300"
                        style="font-weight:400; font-size:14px;color:white">
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
                <a href="/culture-list" data-lang="nav-culture" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:14px;"></a>

        <div style="position: relative; display: inline-block;">
            <span style="position: absolute; top: -14px; right: -25px; font-size: 9px; color: #ffab00; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">
                Скоро
            </span>
            
            <a href="#" 
            class="transition-colors duration-300" 
            style="font-weight:400; font-size:14px; text-decoration:line-through; color: rgba(255,255,255,0.4); pointer-events: none; cursor: default;"
            tabindex="-1"
            data-lang="nav-restaurant">
            Рестораны
            </a>
        </div>

        <div style="position: relative; display: inline-block;margin-right:15px;">
            <span style="position: absolute; top: -14px; right: -25px; font-size: 9px; color: #ffab00; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">
                Скоро
            </span>
            
            <a href="#" 
            class="transition-colors duration-300" 
            style="font-weight:400; font-size:14px; text-decoration:line-through; color: rgba(255,255,255,0.4); pointer-events: none; cursor: default;"
            tabindex="-1"
            data-lang="nav-hotels">
            Отели
            </a>
        </div>

        <a href="/partnership" 
        class="hover:bg-accent hover:text-white transition-all duration-300" 
        style="border: 1px solid #C5A367; color: #C5A367; padding: 4px 12px; border-radius: 4px; font-size: 13px; font-weight: 500; text-decoration: none; text-transform: uppercase; letter-spacing: 0.5px;">
        Стать партнером
        </a>

        <div class="flex items-center gap-2 text-white text-xs md:text-sm border-l pl-4" style="margin-left: 25px;">
            <button 
                id="btn-kk" 
                onclick="setLang('kk')" 
                class="lang-btn font-semibold  transition-all duration-300">
                QAZ
            </button>

            <span class="w-[1px] h-3 bg-white/20"></span>

            <button 
                id="btn-ru" 
                onclick="setLang('ru')" 
                class="lang-btn font-semibold  transition-all duration-300">
                RUS
            </button>

            <span class="w-[1px] h-3 bg-white/20"></span>

            <button 
                id="btn-en" 
                onclick="setLang('en')" 
                class="lang-btn font-semibold  transition-all duration-300">
                ENG
            </button>
        </div>

            



                @auth
                    <a href="{{ route('admin.index') }}" data-lang="nav-admin" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:14px;">Админ-панель</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" data-lang="nav-logout" class="hover:text-accent transition-colors duration-300 bg-transparent border-none cursor-pointer text-white" style="font-weight:400; font-size:14px;">Выйти</button>
                    </form>
                @endauth
            </nav>
        </div>
    </header>

    <header class="shadow backdrop-blur-lg bg-black/20 absolute top-0 left-0 w-full lg:hidden" style="z-index:50;">
        <div class="w-full flex items-center justify-between p-3 px-4">
            <a href="/" class="flex items-center space-x-3">
                <span class="text-white font-semibold text-base" style="font-weight:600; font-size:14px;">
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
                        style="font-weight:400; font-size:14px;">
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
                
                            <a href="/culture-list" data-lang="nav-culture" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:14px;"></a>
            <a href="/restaurants" data-lang="nav-restaurant" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:14px;"></a>
            <a href="/hotels" data-lang="nav-hotels" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:14px;"></a>
 <div class="flex items-center gap-4 text-white text-xs md:text-sm font-bold tracking-widest">
    <button 
        id="btn-kk" 
        onclick="setLang('kk')" 
        class="lang-btn transition-all duration-300 {{ app()->getLocale() == 'kk' ? 'text-blue-400 opacity-100' : 'opacity-50 hover:opacity-100 hover:text-white' }}"
    >
        QAZ
    </button>

    <span class="w-[1px] h-3 bg-white/20"></span>

    <button 
        id="btn-ru" 
        onclick="setLang('ru')" 
        class="lang-btn transition-all duration-300 {{ app()->getLocale() == 'ru' ? 'text-blue-400 opacity-100' : 'opacity-50 hover:opacity-100 hover:text-white' }}"
    >
        RUS
    </button>

    <span class="w-[1px] h-3 bg-white/20"></span>

    <button 
        id="btn-en" 
        onclick="setLang('en')" 
        class="lang-btn transition-all duration-300 {{ app()->getLocale() == 'en' ? 'text-blue-400 opacity-100' : 'opacity-50 hover:opacity-100 hover:text-white' }}"
    >
        ENG
    </button>
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
            <span class="text-black font-semibold text-base" style="font-weight:600; font-size:14px;">
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
<nav class="fixed bottom-5 inset-x-5 md:hidden z-[1002]">
  <div class="bg-black/60 backdrop-blur-xl border border-white/10 rounded-[1.8rem] shadow-2xl px-3 py-2 flex justify-around items-center"
       style="padding-bottom: calc(env(safe-area-inset-bottom) + 0.5rem);">

    <a href="/"
       class="flex-1 flex flex-col items-center py-2 transition-all duration-300 {{ request()->is('/') ? 'text-[#C5A367]' : 'text-white/50 hover:text-white' }}">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
      </svg>
      <span class="text-[9px] uppercase tracking-[0.15em] font-bold">Главная</span>
    </a>

    <a href="/culture-list"
       class="flex-1 flex flex-col items-center py-2 transition-all duration-300 {{ request()->is('culture-list*') ? 'text-[#C5A367]' : 'text-white/50 hover:text-white' }}">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
      </svg>
      <span class="text-[9px] uppercase tracking-[0.15em] font-bold">Места</span>
    </a>

    <div class="relative flex-1 flex flex-col items-center py-2 text-white/20">
      <span class="absolute top-0 right-2 text-[7px] text-[#C5A367] font-bold uppercase tracking-tighter bg-[#C5A367]/10 px-1 rounded">Скоро</span>
      
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
      </svg>
      <span class="text-[9px] uppercase tracking-[0.15em] font-bold">Кухня</span>
    </div>

    <div class="relative flex-1 flex flex-col items-center py-2 text-white/20">
      <span class="absolute top-0 right-2 text-[7px] text-[#C5A367] font-bold uppercase tracking-tighter bg-[#C5A367]/10 px-1 rounded">Скоро</span>

      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
      </svg>
      <span class="text-[9px] uppercase tracking-[0.15em] font-bold">Отели</span>
    </div>

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
