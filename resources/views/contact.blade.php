@extends('layouts.app')

@section('content')
<div class="mx-4 md:mx-24 mt-[40px] mb-16 relative">

    <div style="padding-bottom: 21px; border-bottom: 1px solid #dbdbdb;" 
         class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
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
                Свяжитесь с Центром охраны наследия Мангистауской области. 
                Мы открыты для сотрудничества, предложений и идей, направленных на сохранение природы, 
                культурных памятников и новых берегов Каспийского моря.
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">
        <div class="space-y-6 text-gray-700 leading-relaxed text-base">
            <div>
                <h2 class="text-xl font-semibold mb-2 text-gray-900">Центр сохранения природы и наследия Мангистау</h2>
                <p>г. Актау, пр. Нурсултана Назарбаева, 12, Казахстан</p>
            </div>

            <div>
                <h2 class="text-lg font-semibold mb-1">Телефон</h2>
                <p>+7 (7292) 45-67-89</p>
            </div>

            <div>
                <h2 class="text-lg font-semibold mb-1">Email</h2>
                <p>info@caspianheritage.kz</p>
            </div>

            <div>
                <h2 class="text-lg font-semibold mb-1">Режим работы</h2>
                <p>Пн–Пт: 9:00–18:00 <br> Сб–Вс: выходной</p>
            </div>

            <div>
                <h2 class="text-lg font-semibold mb-1">Социальные сети</h2>
                <div class="flex gap-3 mt-2">
                    <a href="https://instagram.com/caspianheritage" target="_blank" class="text-blue-600 hover:text-blue-800">Instagram</a>
                    <a href="https://facebook.com/caspianheritage" target="_blank" class="text-blue-600 hover:text-blue-800">Facebook</a>
                    <a href="https://t.me/caspianheritage" target="_blank" class="text-blue-600 hover:text-blue-800">Telegram</a>
                </div>
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
                    <input type="text" name="name" required class="w-full border rounded px-4 py-2" placeholder="Алия Садыкова">
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
