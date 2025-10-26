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
<div class="max-w-3xl mx-auto px-6 py-10 mt-[40px] bg-white rounded-xl shadow mb-[40px]">
    <a href="{{ route('admin.index') }}" class="inline-flex items-center text-sm text-blue-600 hover:underline mb-8">
        ← Назад в панель администратора
    </a>

    <h2 class="text-2xl font-bold mb-6">Сообщение от {{ $message->name }}</h2>

    <div class="space-y-6 text-gray-800 text-base">
        <div>
            <span class="font-medium">Email:</span>
            <p class="text-gray-700">{{ $message->email }}</p>
        </div>

        <div>
            <span class="font-medium">Дата:</span>
            <p class="text-gray-700">{{ $message->created_at->format('d.m.Y H:i') }}</p>
        </div>

        <div>
            <span class="font-medium">Сообщение:</span>
            <div class="bg-gray-50 border rounded p-4 mt-2 text-gray-700 whitespace-pre-line">
                {{ $message->message }}
            </div>
        </div>
    </div>
</div>
@endsection
