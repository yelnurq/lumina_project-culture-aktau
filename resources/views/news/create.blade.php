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

<div class="max-w-3xl mx-auto px-6 py-10 mt-[40px] bg-white rounded-xl shadow mb-[40px]">
    <a href="{{ route('admin.index') }}" class="inline-flex items-center text-sm text-blue-600 hover:underline mb-8 ">
    ← Назад в панель администратора
</a>

    <h2 class="text-2xl font-bold mb-6">Добавить новость</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div>
            <label class="block font-medium mb-1">Заголовок</label>
            <input placeholder="Например: Открытие выставки..." type="text" name="title" value="{{ old('title') }}" required class="w-full border rounded px-4 py-2">
        </div>

        <div>
            <label class="block font-medium mb-1">Описание</label>
            <textarea placeholder="Полное описание новости..." name="description" rows="5" required class="w-full border rounded px-4 py-2">{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="block font-medium mb-1">Изображение</label>
            <input type="file" name="image" accept="image/*" onchange="previewImage(event)" class="w-full">
            <img id="imagePreview" src="#" alt="Превью изображения" class="mt-4 max-h-60 hidden rounded-lg border border-gray-200">
        </div>

        <div class="text-right">
            <button id="submitBtn" type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded disabled:opacity-50"
                onclick="disableSubmit(this)">
                Опубликовать
            </button>

        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('imagePreview');
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    function disableSubmit(button) {
        button.disabled = true;
        button.innerText = 'Отправка...';
        button.form.submit(); 
    }
</script>

@endsection
