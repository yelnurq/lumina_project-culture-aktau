@extends('layouts.app')

@section("header")
<div style="background:rgb(46 95 79);" class="w-full text-white text-center py-2 text-sm font-semibold tracking-wide">
В честь 180-летия со дня рождения великого Абая Кунанбаева!
</div>

<header class="sticky top-0 left-0 w-full z-50">

    <div class="w-full flex items-center justify-between p-4 bg-primary/40 backdrop-blur-md"
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
<div class="mx-4 md:mx-24 mt-[40px] mb-16 relative">

    <div style="padding-bottom: 21px; border-bottom: 1px solid #dbdbdb;" class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
        <div>
            <nav class="text-sm text-gray-500 mb-4">
                <ol class="list-reset flex space-x-2">
                    <li><a href="/" class="hover:underline text-blue-600">Главная</a></li>
                    <li>/</li>
                    <li class="text-gray-700">Контакты</li>
                </ol>
            </nav>

            <h1 class="text-3xl md:text-3xl font-bold text-gray-800 mb-2">Контакты</h1>

            <p class="text-gray-600 text-sm md:text-base mt-2" style="font-size: 15px;">
                Свяжитесь с Центром охраны наследия Абайской области. Мы готовы ответить на ваши вопросы, предложения и замечания, связанные с деятельностью центра и сохранением культурного наследия региона.
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">
        <div class="space-y-6 text-gray-700 leading-relaxed text-base">
            <div>
                <h2 class="text-xl font-semibold mb-2 text-gray-900">Центр охраны наследия Абайской области</h2>
                <p>ул. Ауэзова 45, г. Семей, Казахстан</p>
            </div>

            <div>
                <h2 class="text-lg font-semibold mb-1">Телефон</h2>
                <p>+7 (7222) 12-34-56</p>
            </div>

            <div>
                <h2 class="text-lg font-semibold mb-1">Email</h2>
                <p>info@abayheritage.kz</p>
            </div>

            <div>
                <h2 class="text-lg font-semibold mb-1">Режим работы</h2>
                <p>Пн–Пт: 9:00–18:00 <br> Сб–Вс: выходной</p>
            </div>
        </div>

        <div>
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Связаться с нами</h2>

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('contact.send') }}" class="space-y-6">
                @csrf

                <div>
                    <label class="block font-medium mb-1">Ваше имя</label>
                    <input type="text" name="name" required class="w-full border rounded px-4 py-2" placeholder="Иван Иванов">
                </div>

                <div>
                    <label class="block font-medium mb-1">Email</label>
                    <input type="email" name="email" required class="w-full border rounded px-4 py-2" placeholder="you@example.com">
                </div>

                <div>
                    <label class="block font-medium mb-1">Сообщение</label>
                    <textarea name="message" rows="5" required class="w-full border rounded px-4 py-2" placeholder="Ваш вопрос или предложение..."></textarea>
                </div>

                <div class="text-right">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
                        Отправить
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
