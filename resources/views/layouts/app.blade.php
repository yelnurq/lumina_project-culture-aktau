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

</head>
<body class="flex flex-col min-h-screen bg-background font-sans text-textPrimary">


        @yield("header")


    <main class="flex-grow ">
        @yield('content')
    </main>


    <footer class="bg-primary text-white" style="background: #333">
        <div class="container mx-auto max-w-7xl px-6 py-10 flex flex-col md:flex-row justify-between gap-8">
            <div class="max-w-md">
                o
                <h2 class="text-xl font-semibold mb-3">Центр по охране историко-культурного наследия области Абай</h2>
                <p class="text-sm text-white/80">© 2025 Все права защищены.</p>
            </div>
            <div class="flex flex-col md:flex-row gap-12 text-sm">
                <div>
                    <h3 class="font-semibold mb-2">Контакты</h3>
                    <p>Телефон: +7 (123) 456-7890</p>
                    <p>Email: info@abayheritage.kz</p>
                </div>
                <div>
                    <h3 class="font-semibold mb-2">Адрес</h3>
                    <p>г. Семей, ул. Историческая, 10</p>
                    <p>Казахстан</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
