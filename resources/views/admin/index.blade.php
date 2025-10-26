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
                    <li class="text-gray-700">Админ-панель</li>
                </ol>
            </nav>
            <h1 class="text-3xl font-bold text-gray-800">
                Админ-панель: 
                <span class="text-blue-600">
                    {{ Auth::user()->role === 'superadmin' ? 'Суперадмин' : 'Модератор' }}
                </span>
            </h1>
            <p class="text-gray-600 text-sm md:text-base mt-2" style="font-size: 15px;">
                Управляйте новостями и культурными объектами на сайте. Здесь вы можете добавлять, редактировать и удалять записи.
            </p>
        </div>
    </div>

    <div class="mb-12">

            <div class="flex items-center justify-between mb-5">
                <h2 class="text-2xl font-semibold">Новости</h2>
                <a href="{{ route('news.create') }}"
                class="bg-green-600 hover:bg-green-700 text-white text-sm px-4 py-2 rounded transition">
                    + Добавить новость
                </a>
            </div>        
            <table class="min-w-full bg-white shadow rounded overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-4 py-2">Заголовок</th>
                    <th class="text-left px-4 py-2">Описание</th>
                    <th class="text-left px-4 py-2">Дата</th>
                    <th class="text-left px-4 py-2">Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($news as $item)
                    <tr class="border-t">
                        <td class="px-4 py-2 hover:underline"><a href="{{route("news.show", ["news"=>$item->id])}}">{{ $item->title }}</a></td>
                        <td class="px-4 py-2">{{ Str::limit($item->description, 50) }}</td>
                        <td class="px-4 py-2">{{ $item->created_at->format('d.m.Y') }}</td>
                        <td class="px-4 py-2">
                            @if(auth()->user()->role === 'superadmin')
                                <form action="{{ route('news.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Удалить новость?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Удалить</button>
                                </form>
                            @endif

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center px-4 py-4">Нет новостей.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">
            {{ $news->withQueryString()->links() }}
        </div>

    </div>

    <div>
        <div class="flex items-center justify-between mb-5">
            <h2 class="text-2xl font-semibold">Культурные объекты</h2>
            <a href="{{ route('cultures.create') }}"
            class="bg-green-600 hover:bg-green-700 text-white text-sm px-4 py-2 rounded transition">
                + Добавить объект
            </a>
        </div>        
    <table class="min-w-full bg-white shadow rounded overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-4 py-2">Название</th>
                    <th class="text-left px-4 py-2">Описание</th>
                    <th class="text-left px-4 py-2">Дата</th>
                    <th class="text-left px-4 py-2">Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cultures as $item)
                    <tr class="border-t">
                        <td class="px-4 py-2 hover:underline"><a href="{{route("cultures.show", ["id"=>$item->id])}}">{{ $item->title }}</a></td>
                        <td class="px-4 py-2">{{ Str::limit($item->description, 50) }}</td>
                        <td class="px-4 py-2">{{ $item->created_at->format('d.m.Y') }}</td>
                        <td class="px-4 py-2">
                            @if(auth()->user()->role === 'superadmin')
                                <form action="{{ route('cultures.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Удалить объект?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Удалить</button>
                                </form>
                            @endif

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center px-4 py-4">Нет объектов культуры.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    <div class="mt-4">
        {{ $cultures->withQueryString()->links() }}
    </div>

    </div>
<div class="mt-16">
    <div class="flex items-center justify-between mb-5">
        <h2 class="text-2xl font-semibold">Сообщения обратной связи</h2>
    </div>        
    <table class="min-w-full bg-white shadow rounded overflow-hidden">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left px-4 py-2">Имя</th>
                <th class="text-left px-4 py-2">Email</th>
                <th class="text-left px-4 py-2">Сообщение</th>
                <th class="text-left px-4 py-2">Дата</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($messages as $msg)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $msg->name }}</td>
                    <td class="px-4 py-2">{{ $msg->email }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.messages.show', $msg->id) }}" class="text-blue-600 hover:underline">
                            {{ Str::limit($msg->message, 100) }}
                        </a>
                    </td>
                    <td class="px-4 py-2">{{ $msg->created_at->format('d.m.Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center px-4 py-4">Нет сообщений.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $messages->withQueryString()->links() }}
    </div>
</div>

</div>
@endsection
