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

    <h2 class="text-2xl font-bold mb-6">Добавить объект культуры</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cultures.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label class="block font-medium mb-1">Название</label>
            <input type="text" name="title" value="{{ old('title') }}" required class="w-full border rounded px-4 py-2" placeholder="Например: Дом-музей Абая">
        </div>

        <div>
            <label class="block font-medium mb-1">Категория</label>
            <select name="category_id" required class="w-full border rounded px-4 py-2">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-medium mb-1">Область</label>
            <select name="region_id" id="regionSelect" required class="w-full border rounded px-4 py-2">
                <option value="">-- Выберите область --</option>
                @foreach($regions as $region)
                    <option value="{{ $region->id }}"
                            data-lat="{{ $region->latitude }}"
                            data-lng="{{ $region->longitude }}"
                            @selected(old('region_id') == $region->id)>
                        {{ $region->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-medium mb-1">Выберите точное местоположение</label>
            <div id="map" style="height: 350px;" class="rounded shadow mb-2"></div>
        </div>

        <div class="flex gap-4">
            <div class="flex-1">
                <label class="block mb-1 font-medium">Широта</label>
                <input type="text" name="latitude" id="latitude" readonly required
                       class="w-full border rounded px-4 py-2 bg-gray-100" value="{{ old('latitude') }}">
            </div>
            <div class="flex-1">
                <label class="block mb-1 font-medium">Долгота</label>
                <input type="text" name="longitude" id="longitude" readonly required
                       class="w-full border rounded px-4 py-2 bg-gray-100" value="{{ old('longitude') }}">
            </div>
        </div>

        <div>
            <label class="block font-medium mb-1">Описание</label>
            <textarea name="description" rows="4" required class="w-full border rounded px-4 py-2"
                      placeholder="Введите краткое описание объекта...">{{ old('description') }}</textarea>
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

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script>
        function disableSubmit(button) {
        button.disabled = true;
        button.innerText = 'Отправка...';
        button.form.submit(); 
    }
    ymaps.ready(init);

    let map;
    let placemark;

    function init() {
        map = new ymaps.Map("map", {
            center: [50.4111, 80.2275],
            zoom: 6,
            controls: ['zoomControl', 'fullscreenControl']
        });

        const regionSelect = document.getElementById('regionSelect');

        regionSelect.addEventListener('change', function () {
            const option = this.options[this.selectedIndex];
            const lat = parseFloat(option.getAttribute('data-lat'));
            const lng = parseFloat(option.getAttribute('data-lng'));

            if (!isNaN(lat) && !isNaN(lng)) {
                map.setCenter([lat, lng], 10);
                if (placemark) {
                    placemark.geometry.setCoordinates([lat, lng]);
                } else {
                    placemark = new ymaps.Placemark([lat, lng], {}, { draggable: true });
                    map.geoObjects.add(placemark);
                    placemark.events.add('dragend', () => {
                        updateInputs(placemark.geometry.getCoordinates());
                    });
                }
                updateInputs([lat, lng]);
            }
        });

        map.events.add('click', function (e) {
            const coords = e.get('coords');
            if (!placemark) {
                placemark = new ymaps.Placemark(coords, {}, { draggable: true });
                map.geoObjects.add(placemark);
                placemark.events.add('dragend', () => {
                    updateInputs(placemark.geometry.getCoordinates());
                });
            } else {
                placemark.geometry.setCoordinates(coords);
            }
            updateInputs(coords);
        });
    }

    function updateInputs(coords) {
        document.getElementById('latitude').value = coords[0].toFixed(7);
        document.getElementById('longitude').value = coords[1].toFixed(7);
    }

    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('imagePreview');
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
