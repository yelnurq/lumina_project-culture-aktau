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


<div class="mx-auto px-4 md:px-24 mt-[40px] mb-20 max-w-screen-xl">
    <nav class="text-sm text-gray-500 mb-4">
    <ol class="list-reset flex space-x-2">
        <li><a href="{{ route('welcome') }}" class="hover:underline text-blue-600">Главная</a></li>
        <li>/</li>
        <li><a href="{{ route('news.index') }}" class="hover:underline text-blue-600">Новости</a></li>
        <li>/</li>
        <li class="text-gray-700">{{ $news->title}}</li>
    </ol>
</nav>
    <article class="prose prose-lg max-w-none prose-red">
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900">
            {{ $news->title }}
        </h1>

        <div class="text-gray-500 text-sm mb-6 mt-3">
            {{ \Carbon\Carbon::parse($news->created_at)->translatedFormat('d.m.Y') }}
        </div>

        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" style="height: 400px;object-fit:contain;" class="w-full rounded-xl mb-6 shadow">

        <div class="text-gray-800 leading-relaxed">
            <p style="font-style: italic" class="first-letter:text-6xl first-letter:font-bold first-letter:text-green-800 first-letter:float-left first-letter:leading-none first-letter:pr-3">
                {!! nl2br(e($news->description)) !!}
            </p>


        </div>

        @if($news->tags && count($news->tags))
        <div class="mt-6 space-x-2">
            @foreach($news->tags as $tag)
                <span class="inline-block bg-gray-100 text-gray-600 text-xs font-medium px-3 py-1 rounded-full">{{ $tag }}</span>
            @endforeach
        </div>
        @endif
    </article>

    <section class="mt-16">
        <h2 class="text-xl font-bold text-gray-800 mb-4" style="padding-top: 21px;
    border-top: 1px solid #dbdbdb;">Смотрите также</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($relatedNews as $item)
            <a href="{{ route('news.show', $item->id) }}" class="group rounded-xl overflow-hidden shadow hover:shadow-md transition bg-white">
                <img src="{{ asset('storage/' . $item->image) }}" class="h-40 w-full object-cover" alt="{{ $item->title }}">
                <div class="p-4">
                    <p class="text-xs text-gray-500 mb-1">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d.m.Y') }}</p>
                    <h3 class="text-sm font-semibold text-gray-800 group-hover:text-blue-600 transition">
                        {{ Str::limit($item->title, 60) }}
                    </h3>
                </div>
            </a>
            @endforeach
        </div>
    </section>
</div>
@endsection
