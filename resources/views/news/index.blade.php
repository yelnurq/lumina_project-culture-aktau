@extends('layouts.app')

@section("header")
<!-- Верхний баннер с юбилейной надписью -->
<div class="w-full text-white text-center py-2 text-sm font-semibold tracking-wide bg-[#2e5f4f]">
    В честь 180-летия со дня рождения великого Абая Кунанбаева!
</div>

<!-- Основной header -->
<header class="sticky top-0 left-0 w-full z-50">
    <div class="w-full flex items-center justify-between p-4 bg-primary/40 backdrop-blur-md px-[50px]">
        <a href="/" class="flex items-center space-x-6">
            <img src="{{ asset('icons/logo.png') }}" class="h-[50px]" alt="">
            <span class="text-white font-normal text-[15px]">
                Центр охраны наследия Абай
            </span>
        </a>
        <nav class="space-x-6 text-white text-sm font-semibold flex items-center">
            <a href="/" class="font-normal text-[15px] hover:text-accent transition-colors duration-300">Главная</a>
            <a href="/cultures" class="font-normal text-[15px] hover:text-accent transition-colors duration-300">Объекты культуры</a>
            <a href="/news" class="font-normal text-[15px] hover:text-accent transition-colors duration-300">Новости</a>
            <a href="/contacts" class="font-normal text-[15px] hover:text-accent transition-colors duration-300">Контакты</a>

            @auth
                <a href="{{ route('admin.index') }}" class="font-normal text-[15px] hover:text-accent transition-colors duration-300">Админ-панель</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="font-normal text-[15px] hover:text-accent transition-colors duration-300 bg-transparent border-none cursor-pointer">
                        Выйти
                    </button>
                </form>
            @endauth
        </nav>
    </div>
</header>
@endsection

@section('content')
<div class="mx-4 md:mx-24 mt-10 mb-16 relative">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4 pb-6 border-b border-gray-300">
        <div>
            <nav class="text-sm text-gray-500 mb-4">
                <ol class="list-reset flex space-x-2">
                    <li><a href="/" class="hover:underline text-blue-600">Главная</a></li>
                    <li>/</li>
                    <li class="text-gray-700">Новости</li>
                </ol>
            </nav>
            <div class="flex items-center justify-between">
                <h1 class="text-3xl font-bold text-gray-800">Все новости</h1>
                <div class="flex items-center gap-4">
                    <form method="GET" action="{{ route('news.index') }}" class="flex flex-col sm:flex-row gap-2">
                        <div class="relative w-full sm:w-80">
                            <input
                                type="text"
                                name="q"
                                value="{{ request('q') }}"
                                placeholder="Поиск по заголовку или описанию..."
                                class="border border-gray-300 rounded-full py-2 px-4 pl-10 w-full focus:outline-none focus:ring-2 focus:ring-primary/50 text-[15px]"
                            />
                            <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z"/>
                            </svg>
                        </div>

                        <button type="submit" class="bg-primary text-white px-4 py-2 rounded-full hover:bg-primary/80 transition text-[15px]">
                            Поиск
                        </button>

                        @if (request('q'))
                            <a href="{{ route('news.index') }}" class="text-sm text-gray-500 hover:text-red-500 underline self-center">
                                Сбросить
                            </a>
                        @endif
                    </form>
                </div>
            </div>

            <p class="text-gray-600 text-sm mt-2 text-[15px]">
                Здесь собраны все актуальные новости, связанные с культурным наследием Абайской области.
                <span class="font-medium">
                    Мы делимся важными событиями, открытиями и инициативами, направленными на сохранение историко-культурного наследия региона.
                </span>
            </p>
        </div>
    </div>

    @if ($news->isEmpty())
        <div class="text-center text-gray-500 text-lg py-16">
            @if (request('q'))
                По запросу <strong>«{{ request('q') }}»</strong> ничего не найдено.
            @else
                Пока нет ни одной новости.
            @endif
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
            @foreach ($news as $item)
                <a href="{{ route('news.show', $item->id) }}" class="bg-white rounded-3xl shadow-md hover:shadow-lg transition overflow-hidden flex flex-col">
                    <img 
                        src="{{ asset('storage/' . $item->image) }}" 
                        alt="{{ $item->title }}" 
                        loading="lazy" 
                        style="background-color: white"
                        decoding="async"
                        class="w-full h-40 object-cover">
                    <div class="p-4 flex flex-col justify-between h-full">
                        <h4 class="text-[17px] font-semibold text-primary mb-2">
                            {{ $item->title }}
                        </h4>
                        <p class="text-gray-700 text-sm mb-3">
                            {{ \Illuminate\Support\Str::limit($item->description, 100) }}
                        </p>
                        <time datetime="{{ $item->created_at }}">
                            {{ $item->created_at->translatedFormat('d.m.Y') }}
                        </time>
                    </div>
                </a>
            @endforeach
        </div>
    @endif

    <div class="mt-10">
        {{ $news->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection
