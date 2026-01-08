<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Центр охраны наследия области Абай</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Overpass:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

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


@if(request()->is('/') || request()->is('cultures*') || request()->is('partnership'))
    <header class="shadow backdrop-blur-md bg-black/40 fixed top-0 left-0 w-full z-50 hidden lg:flex">
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
                <a href="/culture-list" data-lang="nav-culture" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:14px;">Объекты культуры</a>

        <div style="position: relative; display: inline-block;">
            <span style="position: absolute; top: -14px; right: -25px; font-size: 9px; color: #ffab00; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">
                Скоро
            </span>
            
            <a href="#" 
            class="transition-colors duration-300" 
            style="font-weight:400; font-size:14px; text-decoration:line-through; color: rgba(255,255,255,0.4); pointer-events: none; cursor: default;"
            tabindex="-1"
            data-lang="nav-restaurant">
            Вкусно покушать
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
      class="transition-all duration-500 px-5 py-2 rounded-full text-[11px] font-bold uppercase tracking-[0.15em] border border-[#C5A367] text-[#C5A367] hover:bg-[#C5A367] hover:text-white">

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

<header class="shadow backdrop-blur-md bg-black/30 border-b border-white/10 fixed top-0 left-0 w-full lg:hidden" style="z-index:50;">
    <div class="w-full flex items-center justify-between p-4">
        <a href="/" class="flex items-center space-x-2">
            <span class="text-white font-bold tracking-tighter uppercase text-sm">Lumina | Mangystau</span>
        </a>

        <button id="mobileMenuBtn" aria-expanded="false" aria-controls="mobileMenu"
                class="p-2.5 rounded-xl bg-white/5 hover:bg-[#C5A367]/20 text-white transition-all active:scale-95 border border-white/10">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>
</header>

<div id="mobileOverlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[55] hidden opacity-0 transition-opacity duration-300" aria-hidden="true"></div>

<div id="mobileMenu"
     class="fixed top-0 right-0 h-full w-[80%] max-w-[320px] bg-[#1A1A1A] text-white shadow-2xl z-[60] transform translate-x-full transition-transform duration-500 ease-in-out flex flex-col"
     role="dialog" aria-label="Мобильное меню">
    
    <div class="flex items-center justify-between p-6 border-b border-white/5">
        <span class="text-[10px] font-black uppercase tracking-[0.3em] text-[#C5A367]">Навигация</span>
        <button id="mobileMenuClose" class="p-2 rounded-full hover:bg-white/5 transition-colors">
            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <nav class="flex-1 overflow-y-auto py-4 px-4 space-y-1">
        @php
            $links = [
                ['url' => '/', 'name' => 'Главная'],
                ['url' => '/about', 'name' => 'О проекте'],
                ['url' => '/history', 'name' => 'История региона'],
                ['url' => '/culture-list', 'name' => 'Объекты культуры'],
                ['url' => '/restaurants', 'name' => 'Рестораны'],
                ['url' => '/hotels', 'name' => 'Отели'],
                ['url' => '/contacts', 'name' => 'Контакты'],
            ];
        @endphp

        @foreach($links as $link)
            <a href="{{ $link['url'] }}" 
               class="group flex items-center justify-between px-4 py-4 rounded-2xl hover:bg-white/5 transition-all duration-300 border border-transparent hover:border-white/5">
                <span class="text-lg font-light tracking-tight group-hover:text-[#C5A367] transition-colors">{{ $link['name'] }}</span>
                <svg class="w-4 h-4 text-gray-600 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        @endforeach
    </nav>

    <div class="p-6 border-t border-white/5 bg-black/20">
        <a href="/partnership" class="block w-full py-4 bg-[#C5A367] text-white text-center rounded-2xl font-bold uppercase tracking-widest text-[10px] hover:bg-[#b08f56] transition-all shadow-lg shadow-[#C5A367]/10">
            Станьте партнером
        </a>
        <div class="mt-6 flex justify-center space-x-6 text-gray-500">
            <span class="text-[9px] uppercase tracking-widest">&copy; 2026 Mangystau Heritage</span>
        </div>
    </div>
</div>

<script>
(function(){
    const btn = document.getElementById('mobileMenuBtn');
    const menu = document.getElementById('mobileMenu');
    const overlay = document.getElementById('mobileOverlay');
    const closeBtn = document.getElementById('mobileMenuClose');

    if (!btn || !menu || !overlay) return;

    function toggleMenu(isOpen) {
        if (isOpen) {
            overlay.classList.remove('hidden');
            setTimeout(() => {
                overlay.classList.replace('opacity-0', 'opacity-100');
                menu.classList.replace('translate-x-full', 'translate-x-0');
            }, 10);
            document.body.style.overflow = 'hidden';
            btn.setAttribute('aria-expanded', 'true');
        } else {
            overlay.classList.replace('opacity-100', 'opacity-0');
            menu.classList.replace('translate-x-0', 'translate-x-full');
            setTimeout(() => overlay.classList.add('hidden'), 300);
            document.body.style.overflow = '';
            btn.setAttribute('aria-expanded', 'false');
        }
    }

    btn.addEventListener('click', () => toggleMenu(true));
    closeBtn.addEventListener('click', () => toggleMenu(false));
    overlay.addEventListener('click', () => toggleMenu(false));

    // Закрытие по клику на ссылку (важно для SPA/плавной навигации)
    menu.querySelectorAll('nav a').forEach(link => {
        link.addEventListener('click', () => toggleMenu(false));
    });

    // ESC key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !menu.classList.contains('translate-x-full')) toggleMenu(false);
    });
})();
</script>
@else
<header class="shadow bg-gray-900 fixed top-0 left-0 w-full z-50 hidden lg:flex">
        <div class="w-full flex items-center justify-between p-4" style="padding-left:50px;padding-right:50px">
            <a href="/" class="flex items-center space-x-6">
                <span class="text-gray-100 font-semibold" style="font-weight:600; font-size:14px;padding:10px;">
                    ΛUMINA | Mangystau oblysy
                </span>
            </a>
            <nav class="flex items-center space-x-6 text-white text-sm font-semibold">
                <div class="relative group inline-block">
                    <button 
                        class="flex items-center gap-1 text-gray-200 hover:text-white-700 transition-colors duration-300"
                        style="font-weight:400; font-size:14px;">
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
                <a href="/culture-list" data-lang="nav-culture" class="hover:text-accent transition-colors duration-300 text-gray-200" style="font-weight:400; font-size:14px;"></a>

        <div style="position: relative; display: inline-block;">
            <span style="position: absolute; top: -14px; right: -25px; font-size: 9px; color: #ffab00; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">
                Скоро
            </span>
            
            <a href="#" 
            class="transition-colors duration-300 text-gray-400" 
            style="font-weight:400; font-size:14px; text-decoration:line-through; pointer-events: none; cursor: default;"
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
            class="transition-colors duration-300 text-gray-400" 
            style="font-weight:400; font-size:14px; text-decoration:line-through; pointer-events: none; cursor: default;"
            tabindex="-1"
            data-lang="nav-hotels">
            Отели
            </a>
        </div>

                <a href="/partnership" 
   class="transition-all duration-500 px-5 py-2 rounded-full text-[11px] font-bold uppercase tracking-[0.15em] border border-[#C5A367] text-[#C5A367] hover:bg-[#C5A367] hover:text-white">
    Стать партнером
</a>

        <div class="flex items-center gap-2 text-gray-200 text-xs md:text-sm border-l pl-4" style="margin-left: 25px;">
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
<footer class="bg-[#0F172A] text-white pt-20 pb-10 border-t border-white/5">
    <div class="container mx-auto px-6 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 mb-16">
            
            {{-- 🔹 О проекте --}}
            <div class="lg:col-span-5">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-[#C5A367] rounded-xl flex items-center justify-center shadow-lg shadow-[#C5A367]/20">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2"/></svg>
                    </div>
                    <h2 class="text-2xl font-bold tracking-tighter uppercase" data-lang="footer-title">Новые берега <span class="text-[#C5A367]">Каспия</span></h2>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed max-w-md font-light" data-lang="footer-desc">
                    Маңғыстау — это край, где Каспийское море, отступая, открывает миру сакральные тайны и неземные пейзажи. Мы помогаем вам проложить маршрут к местам, полным тишины и первозданной красоты.
                </p>
            </div>

            {{-- 🔹 Навигация --}}
            <div class="lg:col-span-3 sm:grid-cols-2 grid lg:block gap-8">
                <div>
                    <h3 class="text-[#C5A367] text-[10px] font-bold uppercase tracking-[0.2em] mb-6" data-lang="footer-nav-title">Исследовать</h3>
                    <ul class="space-y-4">
                        <li><a href="/" class="text-gray-400 hover:text-white transition-colors text-sm flex items-center gap-2 group" data-lang="nav-home">
                            <span class="w-1.5 h-1.5 bg-gray-700 rounded-full group-hover:bg-[#C5A367] transition-colors"></span> Главная
                        </a></li>
                        <li><a href="/culture-list" class="text-gray-400 hover:text-white transition-colors text-sm flex items-center gap-2 group" data-lang="nav-culture">
                            <span class="w-1.5 h-1.5 bg-gray-700 rounded-full group-hover:bg-[#C5A367] transition-colors"></span> Объекты культуры
                        </a></li>
                        <li><a href="/contacts" class="text-gray-400 hover:text-white transition-colors text-sm flex items-center gap-2 group" data-lang="nav-contacts">
                            <span class="w-1.5 h-1.5 bg-gray-700 rounded-full group-hover:bg-[#C5A367] transition-colors"></span> Контакты
                        </a></li>
                    </ul>
                </div>
            </div>

            {{-- 🔹 Соцсети и Контакты --}}
            <div class="lg:col-span-4">
                <h3 class="text-[#C5A367] text-[10px] font-bold uppercase tracking-[0.2em] mb-6" data-lang="footer-share-title">Присоединяйтесь</h3>
                <div class="flex gap-3 mb-8">
                    @php
                        $socials = [
                            ['icon' => 'M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z', 'link' => '#', 'label' => 'Facebook'],
                            ['icon' => 'M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z', 'link' => '#', 'label' => 'Twitter'],
                            ['icon' => 'M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z', 'link' => '#', 'label' => 'Telegram'],
                        ];
                    @endphp

                    @foreach($socials as $social)
                        <a href="{{ $social['link'] }}" class="w-11 h-11 bg-white/5 border border-white/10 rounded-xl flex items-center justify-center hover:bg-[#C5A367] hover:border-[#C5A367] hover:-translate-y-1 transition-all duration-300 group">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="{{ $social['icon'] }}"></path>
                            </svg>
                        </a>
                    @endforeach
                </div>
                <div class="bg-white/5 border border-white/10 rounded-2xl p-4">
                    <p class="text-[10px] text-gray-500 uppercase font-bold mb-1 tracking-widest">Нужна помощь?</p>
                    <a href="mailto:info@caspian.kz" class="text-white font-medium hover:text-[#C5A367] transition-colors">info@caspian.kz</a>
                </div>
            </div>
        </div>

        {{-- 🔹 Копирайт --}}
        <div class="border-t border-white/5 pt-10 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-gray-500 text-[11px] font-medium tracking-wide uppercase" data-lang="footer-copyright">
                &copy; {{ date('Y') }} Новые берега Каспия. Все права защищены.
            </p>
            <div class="flex gap-6 text-[11px] text-gray-500 uppercase font-bold tracking-widest">
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>

    <script src="/js/lang.js"></script>

</body>
</html>
