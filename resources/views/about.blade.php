@extends('layouts.app')

@section('content')
<div class="relative overflow-hidden bg-gradient-to-b from-sky-50 via-white to-amber-50">

    <div class="absolute top-[-150px] right-[-200px] w-[500px] h-[500px] bg-sky-200/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-[-180px] left-[-200px] w-[450px] h-[450px] bg-amber-100/20 rounded-full blur-3xl"></div>

    <section class="relative mx-4 md:mx-24 mt-[80px] mb-28 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div class="order-2 md:order-1 space-y-6 text-gray-700">
            <h2 class="text-3xl font-semibold text-gray-900">О проекте</h2>
            <p class="leading-relaxed text-[17px]">
                <strong>«Новые берега Каспия»</strong> — это цифровое путешествие в сердце Маңғыстау, 
                где море встречается с пустыней, а каньоны скрывают дыхание древности. 
                Мы исследуем, как отступающее Каспийское море открывает новые пейзажи и смыслы.
            </p>
            <p class="leading-relaxed text-[17px]">
                Этот проект — о переменах, красоте и памяти земли. 
                Мы собираем голоса, истории и снимки, чтобы показать, 
                как природа Казахстана создаёт новые линии горизонта.
            </p>
            <blockquote class="border-l-4 border-sky-600 pl-4 italic text-gray-600 text-base">
                «Маңғыстау — место, где ветер рассказывает легенды, а скалы хранят дыхание моря.»
            </blockquote>
        </div>

        <div class="order-1 md:order-2 relative">
            <div class="absolute -inset-2 bg-gradient-to-r from-sky-100 to-amber-100 rounded-3xl blur-2xl opacity-40"></div>
            <img src="/images/boszhyra.jpg" alt="Каспий и каньоны" 
                class="relative rounded-3xl shadow-xl w-full object-cover transition-transform duration-700 hover:scale-[1.04] hover:shadow-2xl">
        </div>
    </section>

    <section class="relative mx-4 md:mx-24 mb-28">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-14 text-center">
            Что ждёт вас на проекте
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            <div class="group bg-white/80 backdrop-blur-sm rounded-3xl shadow-lg hover:shadow-2xl transition p-8 text-center relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-b from-sky-100/40 to-transparent opacity-0 group-hover:opacity-100 transition"></div>
                <img src="/images/boszhyra.jpg" alt="Культура Маңғыстау" class="w-full h-52 object-cover rounded-2xl mb-5 shadow-md">
                <h3 class="text-xl font-semibold mb-3 text-gray-900">Культурные объекты</h3>
                <p class="text-gray-600 leading-relaxed">
                    Исследуйте древние некрополи, мечети и священные места. 
                    Здесь, среди скал и ветра, история говорит голосом степи.
                </p>
            </div>

            <div class="group bg-white/80 backdrop-blur-sm rounded-3xl shadow-lg hover:shadow-2xl transition p-8 text-center relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-b from-sky-100/40 to-transparent opacity-0 group-hover:opacity-100 transition"></div>
                <img src="/images/boszhyra.jpg" alt="Отели Маңғыстау" class="w-full h-52 object-cover rounded-2xl mb-5 shadow-md">
                <h3 class="text-xl font-semibold mb-3 text-gray-900">Отдых у моря</h3>
                <p class="text-gray-600 leading-relaxed">
                    Юрты, панорамные домики, апартаменты у скал — 
                    почувствуйте гостеприимство и спокойствие побережья.
                </p>
            </div>

            <div class="group bg-white/80 backdrop-blur-sm rounded-3xl shadow-lg hover:shadow-2xl transition p-8 text-center relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-b from-sky-100/40 to-transparent opacity-0 group-hover:opacity-100 transition"></div>
                <img src="/images/boszhyra.jpg" alt="Кухня Маңғыстау" class="w-full h-52 object-cover rounded-2xl mb-5 shadow-md">
                <h3 class="text-xl font-semibold mb-3 text-gray-900">Каспийская кухня</h3>
                <p class="text-gray-600 leading-relaxed">
                    Блюда с ароматом моря и степи — свежие морепродукты, бешбармак, бауырсақи и чай на ветру.
                </p>
            </div>
        </div>
    </section>

    <section class="relative mx-4 md:mx-24 mb-28">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-14 text-center">
            Авторы проекта
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-lg p-8 text-center hover:shadow-2xl transition">
                <img src="/images/boszhyra.jpg" alt="Автор" class="w-28 h-28 mx-auto rounded-full mb-5 object-cover shadow-md border-4 border-sky-200">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Зейнолла Елнұр</h3>
                <p class="text-sky-700 font-medium mb-3">Веб-разработчик</p>
                <p class="text-gray-600 text-[15px] leading-relaxed">
                    Автор проекта, разработчик платформы и интерфейсов. 
                    Соединяет цифровой код с вдохновением Маңғыстау.
                </p>
            </div>
                        <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-lg p-8 text-center hover:shadow-2xl transition">
                <img src="/images/boszhyra.jpg" alt="Автор" class="w-28 h-28 mx-auto rounded-full mb-5 object-cover shadow-md border-4 border-sky-200">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Зейнолла Елнұр</h3>
                <p class="text-sky-700 font-medium mb-3">Веб-разработчик</p>
                <p class="text-gray-600 text-[15px] leading-relaxed">
                    Автор проекта, разработчик платформы и интерфейсов. 
                    Соединяет цифровой код с вдохновением Маңғыстау.
                </p>
            </div>
                        <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-lg p-8 text-center hover:shadow-2xl transition">
                <img src="/images/boszhyra.jpg" alt="Автор" class="w-28 h-28 mx-auto rounded-full mb-5 object-cover shadow-md border-4 border-sky-200">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Зейнолла Елнұр</h3>
                <p class="text-sky-700 font-medium mb-3">Веб-разработчик</p>
                <p class="text-gray-600 text-[15px] leading-relaxed">
                    Автор проекта, разработчик платформы и интерфейсов. 
                    Соединяет цифровой код с вдохновением Маңғыстау.
                </p>
            </div>
        </div>
    </section>

</div>
@endsection
