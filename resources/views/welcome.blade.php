@extends('layouts.app')

@section("header")

<header class="fixed top-0 left-0 w-full z-50">
    <div class="w-full flex items-center justify-between p-4 bg-primary/30 backdrop-blur-md"
         style="padding-left:50px;padding-right:50px">
        <a href="/" class="flex items-center space-x-6">
            <img src="{{ asset('icons/logo.png') }}" style="height: 50px" alt="">
            <span class="text-white font-semibold text-xl" style="font-weight: 400; font-size:15px;">
                Центр охраны наследия Абай
            </span>
        </a>
        <nav class="space-x-6 text-white text-sm font-semibold flex items-center">
            <a style="font-weight:400; font-size:15px;"  href="/" class="hover:text-accent transition-colors duration-300">Главная</a>
            <a style="font-weight:400; font-size:15px;"  href="/cultures" class="hover:text-accent transition-colors duration-300">Объекты культуры</a>
            <a style="font-weight:400; font-size:15px;"  href="/news" class="hover:text-accent transition-colors duration-300">Новости</a>
            <a style="font-weight:400; font-size:15px;"  href="/contacts" class="hover:text-accent transition-colors duration-300">Контакты</a>

            @auth
                <a style="font-weight:400; font-size:15px;"  href="{{ route('admin.index') }}" class="hover:text-accent transition-colors duration-300">Админ-панель</a>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"  style="font-weight:400; font-size:15px;" class="hover:text-accent transition-colors duration-300 bg-transparent border-none cursor-pointer">
                        Выйти
                    </button>
                </form>
            @endauth
        </nav>
    </div>
</header>
@endsection



@section('content')
<div class="relative w-full h-[650px] overflow-hidden">
    <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover">
        <source src="{{ asset('media/video.mp4') }}" type="video/mp4" />
        Ваш браузер не поддерживает видео.
    </video>
    <div class="relative z-10 bg-primary/20 bg-gradient-to-r from-primary/10 to-blue-600/40 text-white flex items-center justify-center h-full px-6 text-center">
        <div class="container mx-auto max-w-7xl py-20 pt-32">
            <h1 class="text-5xl font-extrabold mb-4 leading-tight opacity-0 translate-y-6 animate-fadeInUp">
                Центр по охране<br> историко-культурного наследия<br> области Абай
            </h1>
            <p class="text-xl max-w-3xl mx-auto mb-10 font-light opacity-0 translate-y-6 animate-fadeInUp delay-300">
                Сохраняем, изучаем и популяризируем культурное наследие нашего региона — богатое прошлое, вдохновляющее будущее.
            </p>
            <a href="/cultures" class="inline-block bg-white text-primary font-semibold rounded-full px-8 py-3 shadow-lg hover:bg-gray-100 transition opacity-0 translate-y-6 animate-fadeInUp delay-600">
                Посмотреть объекты культуры
            </a>
        </div>
    </div>
</div>

<div class="bg-gray-100 py-20">
    <div class="container mx-auto max-w-4xl px-6">
        <h2 class="text-3xl font-bold mb-6 text-center">Почему важно сохранять культуру Абайской области?</h2>
        <div class="prose prose-lg max-w-none text-gray-800" style="text-align: justify;">
            <p>Абайская область — это не просто географическая территория. Это колыбель казахской культуры, духовности и просвещения. Здесь родились и творили такие выдающиеся личности, как Абай Кунанбаев — поэт, философ, реформатор, оказавший огромное влияние на развитие национального самосознания.</p>
            <p>Каждое культурное наследие, будь то мавзолей, музей или народное ремесло, является частью нашей коллективной памяти. Уничтожение или утрата этих объектов — это утрата идентичности, связи поколений и корней. Сохранение культуры — это сохранение души народа.</p>
            <p>В современном мире, где глобализация стирает границы, особенно важно защищать и развивать местную культуру. Абайская область обладает огромным потенциалом: от этнографических экспозиций до современных арт-фестивалей. Развитие культурных инициатив способствует туризму, образованию и укреплению общественных ценностей.</p>
            <p class="font-semibold">Поддерживая культуру — мы сохраняем будущее. Сделаем это вместе!</p>
        </div>
    </div>
</div>

<div class="container mx-auto max-w-7xl px-6 py-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
        <a href="/cultures" class="group block p-8 bg-white rounded-3xl shadow-md hover:shadow-xl transition">
            <div class="mx-auto mb-4 w-16 h-16 flex items-center justify-center bg-primary text-white rounded-full text-3xl">🎭</div>
            <h2 class="text-xl font-semibold mb-2 group-hover:text-primary transition">Объекты культуры</h2>
            <p class="text-gray-600">Узнайте больше о памятниках, музеях и культурных объектах области Абай.</p>
        </a>

        <a href="/regions" class="group block p-8 bg-white rounded-3xl shadow-md hover:shadow-xl transition">
            <div class="mx-auto mb-4 w-16 h-16 flex items-center justify-center bg-primary text-white rounded-full text-3xl">🗺️</div>
            <h2 class="text-xl font-semibold mb-2 group-hover:text-primary transition">Области</h2>
            <p class="text-gray-600">Исследуйте регионы области и их уникальное культурное наследие.</p>
        </a>

        <a href="/contacts" class="group block p-8 bg-white rounded-3xl shadow-md hover:shadow-xl transition">
            <div class="mx-auto mb-4 w-16 h-16 flex items-center justify-center bg-primary text-white rounded-full text-3xl">📞</div>
            <h2 class="text-xl font-semibold mb-2 group-hover:text-primary transition">Контакты</h2>
            <p class="text-gray-600">Свяжитесь с нами для сотрудничества или получения дополнительной информации.</p>
        </a>
    </div>
</div>
<div class="mt-16 max-w-4xl mx-auto px-6 text-center text-white italic font-light text-lg relative" style="color: rgb(27, 27, 27); margin-top: 20px;">
<div style="display: flex;justify-content:center;">
<svg style="width: 40px;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve"><g><g id="right_x5F_quote"><g><path style=";fill:#333;" d="M0,4v12h8c0,4.41-3.586,8-8,8v4c6.617,0,12-5.383,12-12V4H0z"/><path style="fill:#333;" d="M20,4v12h8c0,4.41-3.586,8-8,8v4c6.617,0,12-5.383,12-12V4H20z"/></g></g></g></svg>

</div>
    <blockquote style="padding-top: 20px;"> 
        <p>«Если человек не думает, что он должен сделать, он не может сделать ничего хорошего.»</p>
        <footer class="mt-4 font-semibold">— Абай Кунанбаев</footer>
    </blockquote>
</div>

<div class="mx-24 md:mx-32 my-12" style="margin-top:70px;">
@if ($news->count())
    <div class="grid md:grid-cols-3 gap-8 mb-12">
        <!-- Главная новость -->
        <article class="md:col-span-2 bg-white rounded-3xl shadow-md hover:shadow-lg transition overflow-hidden">
            <a href="{{route("news.show", ["news"=>$news[0]->id])}}">
                <img style="height: 450px" src="{{ asset("/storage/".$news[0]->image) }}" alt="{{ $news[0]->title }}" class="w-full h-72 object-cover">
                <div class="p-6">
                    <h3 style="font-size: 23px" class="text-2xl font-bold text-primary mb-2">{{ $news[0]->title }}</h3>
                    <p class="text-gray-700 mb-4">{{ \Illuminate\Support\Str::limit($news[0]->description,300) }}</p>
                    <time datetime="{{ $news[0]->created_at }}" class="text-sm text-gray-400">
                        {{ $news[0]->created_at->translatedFormat('d.m.Y') }}
                    </time>
                </div>
            </a>
        </article>

        <!-- Остальные 2 новости -->
        <div class="space-y-6">
            @foreach ($news->slice(1) as $item)
                <article class="bg-white rounded-3xl shadow-md hover:shadow-lg transition overflow-hidden flex flex-col">
                    <a href="{{route("news.show", ["news"=>$item->id])}}">
                                            <img src="{{ asset("/storage/".$item->image) }}" alt="{{ $item->title }}" class="w-full h-40 object-cover">
                    <div class="p-4 flex flex-col justify-between h-full">
                        <h4 class="text-lg font-semibold text-primary mb-2">{{ $item->title }}</h4>
                        <p class="text-gray-700 text-sm mb-3">{{ \Illuminate\Support\Str::limit($item->description, 100) }}</p>
                        <time datetime="{{ $item->created_at }}" class="text-sm text-gray-400">
                            {{ $item->created_at->translatedFormat('d.m.Y') }}
                        </time>
                    </div>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
@else
    <p class="text-gray-500 text-center">Новостей пока нет.</p>
@endif

</div>

<div class="relative bg-primary text-white py-20 overflow-hidden">
    <!-- Фоновое изображение с blur и синим фильтром -->
    <div class="absolute inset-0">
        <img src="{{ asset('images/abai2.jpeg') }}" alt="Фон" class="w-full h-full object-cover filter blur-sm brightness-75" />
        <div class="absolute inset-0 bg-blue-900 opacity-40"></div>
    </div>

    <div class="relative container mx-auto max-w-6xl px-6 text-center">
        <h2 class="text-4xl font-bold mb-6">Культурное сердце Казахстана — Абайская область</h2>
        <p class="text-lg mb-10 max-w-3xl mx-auto font-light">
            Здесь, на стыке традиций и истории, формировалась самобытная культура казахского народа. Мы гордимся наследием великого Абая, развиваем творчество и сохраняем память.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left text-white">
            <div class="bg-white/10 rounded-2xl p-6 backdrop-blur-sm">
                <h3 class="text-xl font-semibold mb-2">📝 Наследие Абая</h3>
                <p>Поэзия, философия и идеи Абая Кунанбаева вдохновляют поколения и формируют культурную идентичность региона.</p>
            </div>
            <div class="bg-white/10 rounded-2xl p-6 backdrop-blur-sm">
                <h3 class="text-xl font-semibold mb-2">🏺 Уникальные памятники</h3>
                <p>Древние мавзолеи, археологические находки и этнографические комплексы — живая связь с историей.</p>
            </div>
            <div class="bg-white/10 rounded-2xl p-6 backdrop-blur-sm">
                <h3 class="text-xl font-semibold mb-2">🎨 Современное творчество</h3>
                <p>Культурные фестивали, выставки и мастер-классы поддерживают и развивают традиции в новом свете.</p>
            </div>
        </div>

        <a href="/cultures" class="mt-12 inline-block bg-white text-primary font-semibold rounded-full px-8 py-3 shadow-lg hover:bg-gray-100 transition">
            Изучить объекты культуры области
        </a>
    </div>
</div>


<div class="bg-white py-16">
    <div class="container mx-auto max-w-6xl px-6">
        <h2 class="text-3xl font-bold text-center mb-8">Карта объектов культуры</h2>
        <div id="kzMap" class="w-full h-[500px] rounded-xl shadow"></div>
    </div>
</div>

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
