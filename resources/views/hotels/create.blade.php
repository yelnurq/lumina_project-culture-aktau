@extends('layouts.app')
@section("header")
<div style="background:rgb(17 24 39);" class="w-full text-white text-center py-2 text-sm font-semibold tracking-wide">
    Мангистауский Колледж Туризма
</div>
<header class="shadow top-0 left-0 w-full z-50 hidden md:flex bg-white">
    <div class="w-full flex items-center justify-between p-4" style="padding-left:50px;padding-right:50px">
        <a href="/" class="flex items-center space-x-6">
            <span class="text-black font-semibold text-xl" style="font-weight: 600; font-size:17px;padding:10px;">
                Mangystau oblysy
            </span>
        </a>
        <nav class="space-x-6 text-black text-sm font-semibold flex items-center">
            <a style="font-weight:400; font-size:15px;" href="/" class="hover:text-accent transition-colors duration-300">Главная</a>
            @auth
                <a style="font-weight:400; font-size:15px;" href="{{ route('admin.index') }}" class="hover:text-accent transition-colors duration-300">Админ-панель</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" style="font-weight:400; font-size:15px;" class="hover:text-accent transition-colors duration-300 bg-transparent border-none cursor-pointer">
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

    <h2 class="text-2xl font-bold mb-6">Добавить объект</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hotels.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label class="block font-medium mb-1">Название (RU)</label>
            <input type="text" name="title_ru" value="{{ old('title_ru') }}" required class="w-full border rounded px-4 py-2" placeholder="Название на русском">
        </div>

        <div>
            <label class="block font-medium mb-1">Название (EN)</label>
            <input type="text" name="title_en" value="{{ old('title_en') }}" class="w-full border rounded px-4 py-2" placeholder="Название на английском">
        </div>

        <div>
            <label class="block font-medium mb-1">Название (KK)</label>
            <input type="text" name="title_kk" value="{{ old('title_kk') }}" class="w-full border rounded px-4 py-2" placeholder="Название на казахском">
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
            <label class="block font-medium mb-1">Описание (RU)</label>
            <textarea name="description_ru" rows="4" class="w-full border rounded px-4 py-2" placeholder="Описание на русском">{{ old('description_ru') }}</textarea>
        </div>

        <div>
            <label class="block font-medium mb-1">Описание (EN)</label>
            <textarea name="description_en" rows="4" class="w-full border rounded px-4 py-2" placeholder="Описание на английском">{{ old('description_en') }}</textarea>
        </div>

        <div>
            <label class="block font-medium mb-1">Описание (KK)</label>
            <textarea name="description_kk" rows="4" class="w-full border rounded px-4 py-2" placeholder="Описание на казахском">{{ old('description_kk') }}</textarea>
        </div>

 
<div>
    <label class="block font-medium mb-1">Краткое описание (RU)</label>
    <textarea name="excerpt_ru" rows="2" class="w-full border rounded px-4 py-2"
              placeholder="Краткое описание на русском">{{ old('excerpt_ru') }}</textarea>
</div>

<div>
    <label class="block font-medium mb-1">Краткое описание (EN)</label>
    <textarea name="excerpt_en" rows="2" class="w-full border rounded px-4 py-2"
              placeholder="Краткое описание на английском">{{ old('excerpt_en') }}</textarea>
</div>

<div>
    <label class="block font-medium mb-1">Краткое описание (KK)</label>
    <textarea name="excerpt_kk" rows="2" class="w-full border rounded px-4 py-2"
              placeholder="Краткое описание на казахском">{{ old('excerpt_kk') }}</textarea>
</div>

<hr class="my-6">

<div>
    <label class="block font-medium mb-1">Адрес (RU)</label>
    <input type="text" name="address_ru" value="{{ old('address_ru') }}"
           class="w-full border rounded px-4 py-2" placeholder="Адрес на русском">
</div>

<div>
    <label class="block font-medium mb-1">Адрес (EN)</label>
    <input type="text" name="address_en" value="{{ old('address_en') }}"
           class="w-full border rounded px-4 py-2" placeholder="Адрес на английском">
</div>

<div>
    <label class="block font-medium mb-1">Адрес (KK)</label>
    <input type="text" name="address_kk" value="{{ old('address_kk') }}"
           class="w-full border rounded px-4 py-2" placeholder="Адрес на казахском">
</div>
{{-- ---------------------- КОНТАКТЫ ---------------------- --}}
<hr class="my-6">

<div class="grid md:grid-cols-2 gap-4">
    <div>
        <label class="block font-medium mb-1">Телефон</label>
        <input type="text" name="phone" value="{{ old('phone') }}"
               class="w-full border rounded px-4 py-2" placeholder="+7 (XXX) XXX-XX-XX">
    </div>
    <div>
        <label class="block font-medium mb-1">Email</label>
        <input type="email" name="email" value="{{ old('email') }}"
               class="w-full border rounded px-4 py-2" placeholder="example@mail.com">
    </div>
</div>

<div class="grid md:grid-cols-2 gap-4 mt-4">
    <div>
        <label class="block font-medium mb-1">Сайт</label>
        <input type="url" name="website" value="{{ old('website') }}"
               class="w-full border rounded px-4 py-2" placeholder="https://example.com">
    </div>
    <div>
        <label class="block font-medium mb-1">Instagram</label>
        <input type="text" name="instagram" value="{{ old('instagram') }}"
               class="w-full border rounded px-4 py-2" placeholder="@username">
    </div>
</div>

<div class="mt-4">
    <label class="block font-medium mb-1">Рейтинг (0–5)</label>
    <input type="number" name="rating" value="{{ old('rating') }}" min="0" max="5" step="0.1"
           class="w-32 border rounded px-4 py-2" placeholder="5">
</div>

<hr class="my-6">

<div>
    <label class="block font-medium mb-1">Время работы</label>
    <input type="text" name="working_hours" value="{{ old('working_hours') }}"
           class="w-full border rounded px-4 py-2"
           placeholder="Например: Пн–Вс: 09:00–23:00">
</div>
       <div>
            <label class="block font-medium mb-1">Главное изображение</label>
            <input type="file" name="image" accept="image/*" onchange="previewImage(event)" class="w-full">
            <img id="imagePreview" src="#" alt="Превью изображения" class="mt-4 max-h-60 hidden rounded-lg border border-gray-200">
        </div>
{{-- ---------------------- ДОПОЛНИТЕЛЬНЫЕ ИЗОБРАЖЕНИЯ ---------------------- --}}
<hr class="my-6">

<div>
    <label class="block font-medium mb-2">Дополнительные изображения (галерея)</label>
    <input type="file" name="gallery[]" multiple accept="image/*"
           onchange="previewGallery(event)" class="w-full">
    <div id="galleryPreview" class="mt-4 flex flex-wrap gap-3"></div>
</div>

{{-- ---------------------- Комнаты ---------------------- --}}
<hr class="my-6">

<div id="roomsSection">
    <label class="block font-medium mb-2">Комнаты</label>
    <div id="roomsContainer" class="space-y-6">
        <div class="room-item border rounded-xl p-4 bg-gray-50">
            <div class="grid md:grid-cols-3 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-1">Название блюда</label>
                    <input type="text" name="rooms[0][name]" class="w-full border rounded px-4 py-2"
                           placeholder="Например: Плов с бараниной">

                    <label class="block text-sm font-medium mb-1 mt-3">Описание блюда</label>
                    <textarea name="rooms[0][description]" rows="2"
                              class="w-full border rounded px-4 py-2"
                              placeholder="Краткое описание блюда"></textarea>

      
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Фото блюда</label>
                    <input type="file" name="rooms[0][image]" accept="image/*" onchange="previewroomImage(event, 0)">
                    <img id="roomPreview_0" src="#" alt="Фото блюда" class="mt-2 max-h-32 hidden rounded-lg border">
                </div>
            </div>
        </div>
    </div>

    <button type="button" onclick="addroom()"
            class="mt-4 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-semibold px-4 py-2 rounded">
        + Добавить ещё блюдо
    </button>
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
            center: [44.59, 51.50],
            zoom: 6,
            controls: ['zoomControl', 'fullscreenControl']
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
    // Галерея предпросмотр
function previewGallery(event) {
    const container = document.getElementById('galleryPreview');
    container.innerHTML = '';
    Array.from(event.target.files).forEach(file => {
        const reader = new FileReader();
        reader.onload = e => {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.classList.add('h-24', 'w-24', 'object-cover', 'rounded', 'border');
            container.appendChild(img);
        };
        reader.readAsDataURL(file);
    });
}

// Динамическое добавление блюд
let roomIndex = 1;
function addroom() {
    const container = document.getElementById('roomsContainer');
    const roomHTML = `
        <div class="room-item border rounded-xl p-4 bg-gray-50">
            <div class="grid md:grid-cols-3 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-1">Название блюда</label>
                    <input type="text" name="rooms[${roomIndex}][name]" class="w-full border rounded px-4 py-2"
                           placeholder="Название блюда">

                    <label class="block text-sm font-medium mb-1 mt-3">Описание блюда</label>
                    <textarea name="rooms[${roomIndex}][description]" rows="2"
                              class="w-full border rounded px-4 py-2"
                              placeholder="Описание блюда"></textarea>

          
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Фото блюда</label>
                    <input type="file" name="rooms[${roomIndex}][image]" accept="image/*"
                           onchange="previewroomImage(event, ${roomIndex})">
                    <img id="roomPreview_${roomIndex}" src="#" alt="Фото блюда" class="mt-2 max-h-32 hidden rounded-lg border">
                </div>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', roomHTML);
    roomIndex++;
}

// Предпросмотр фото блюда
function previewroomImage(event, index) {
    const reader = new FileReader();
    reader.onload = function(e) {
        const preview = document.getElementById(`roomPreview_${index}`);
        preview.src = e.target.result;
        preview.classList.remove('hidden');
    };
    reader.readAsDataURL(event.target.files[0]);
}

</script>
@endsection
