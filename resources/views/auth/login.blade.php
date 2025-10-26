@extends('layouts.app')

@section("header")
<div style="background:rgb(46 95 79);" class="w-full text-white text-center py-2 text-sm font-semibold tracking-wide">
В честь 180-летия со дня рождения великого Абая Кунанбаева!
</div>

<header class="top-0 left-0 w-full z-50">

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
<div class="max-w-md mx-auto px-6 py-16 mt-24 bg-white rounded-xl shadow mb-24">
    <h2 class="text-2xl font-bold mb-6 text-center">Вход в админ-панель</h2>

    @if(session('error'))
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            {{ session('error') }}
        </div>
    @endif

    @error('email')
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            {{ $message }}
        </div>
    @enderror

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div>
            <label class="block font-medium mb-1">Email</label>
            <input type="email" name="email" required value="{{ old('email') }}"
                   class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div>
            <label class="block font-medium mb-1">Пароль</label>
            <input type="password" name="password" required
                   class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div class="text-center">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
                Войти
            </button>
        </div>
    </form>
</div>

@endsection
