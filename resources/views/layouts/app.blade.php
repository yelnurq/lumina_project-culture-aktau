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


        @yield("header")


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
