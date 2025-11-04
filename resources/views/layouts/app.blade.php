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
                <a href="/" data-lang="nav-home" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;"></a>
                <a href="/culture-list" data-lang="nav-culture" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;"></a>
                <a href="/restaurants" data-lang="nav-restaurant" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;"></a>
                <a href="/hotels" data-lang="nav-hotels" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;"></a>
                <a href="/contacts" data-lang="nav-contacts" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;"></a>

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
@else
    <header class="shadow top-0 left-0 w-full z-50 hidden md:flex">
        <div class="w-full flex items-center justify-between p-4" style="padding-left:50px;padding-right:50px">
            <a href="/" class="flex items-center space-x-6">
                <span class="text-black font-semibold text-xl" style="font-weight:600; font-size:17px;padding:10px;">
                    Mangystau oblysy
                </span>
            </a>
            <nav class="flex items-center space-x-6 text-black text-sm font-semibold">
                <a href="/" data-lang="nav-home" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;"></a>
                <a href="/culture-list" data-lang="nav-culture" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;"></a>
                <a href="/restaurants" data-lang="nav-restaurant" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;"></a>
                <a href="/hotels" data-lang="nav-hotels" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;"></a>
                <a href="/contacts" data-lang="nav-contacts" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;"></a>

                                <div class="relative inline-block text-left">
                <select 
                    onchange="setLang(this.value)" 
                    class="appearance-none bg-white/10 backdrop-blur-md text-black px-4 py-2 pr-8 rounded-lg text-sm focus:outline-none border border-black/30 transition-colors duration-300"
                >
                    <option class="bg-black/50 text-white" value="ru" {{ app()->getLocale() == 'ru' ? 'selected' : '' }}>🇷🇺 Рус</option>
                    <option class="bg-black/50 text-white" value="kk" {{ app()->getLocale() == 'kk' ? 'selected' : '' }}>🇰🇿 Qaz</option>
                    <option class="bg-black/50 text-white" value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>🇬🇧 UK</option>
                </select>

                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                        <svg class="w-4 h-4 text-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>


                @auth
                    <a href="{{ route('admin.index') }}" data-lang="nav-admin" class="hover:text-accent transition-colors duration-300" style="font-weight:400; font-size:15px;">Админ-панель</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" data-lang="nav-logout" class="hover:text-accent transition-colors duration-300 bg-transparent border-none cursor-pointer text-black" style="font-weight:400; font-size:15px;">Выйти</button>
                    </form>
                @endauth
            </nav>
        </div>
    </header>
@endif
<header class="shadow  top-0 left-0 w-full z-50 md:flex md:hidden">
        <div class="w-full flex items-center justify-center p-1">
            <a href="/" class="flex items-center space-x-6">
                <span class="text-black font-semibold text-xl" style="font-weight:600; font-size:17px;padding:10px;">
                    Mangystau oblysy
                </span>
            </a>

        </div>
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


        <!-- Контакты -->
        <a href="/contacts" class="flex flex-col items-center">
            <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 24 24">
                <path d="M21 8V7l-3 2-2-2-3 2-2-2-3 2-2-2v1l2 2-2 2v1l2-2 3 2 2-2 3 2 2-2 3 2V12l-3-2z"/>
            </svg>
            Контакты
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
