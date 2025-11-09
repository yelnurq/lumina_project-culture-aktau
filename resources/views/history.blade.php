@extends('layouts.app')

@section('content')
<div class="relative overflow-hidden bg-gradient-to-b from-sky-50 via-white to-amber-50">

    <!-- Decorative background blur -->
    <div class="absolute top-[-150px] right-[-200px] w-[500px] h-[500px] bg-sky-200/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-[-180px] left-[-200px] w-[450px] h-[450px] bg-amber-100/20 rounded-full blur-3xl"></div>

    <!-- HISTORY -->
    <section class="relative mx-4 md:mx-24 mt-[80px] mb-28 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div class="space-y-6 text-gray-700">
            <h2 class="text-3xl font-semibold text-gray-900">История Маңғыстауской области</h2>
            <p class="leading-relaxed text-[17px] text-justify">
                Маңғыстау — уникальный край на западе Казахстана, омываемый водами Каспийского моря. 
                С древних времён эта земля была пересечением торговых путей, местом проживания кочевых племён 
                и колыбелью богатой культуры. Археологические находки свидетельствуют о жизни здесь людей ещё в бронзовом и железном веках.
            </p>
            <p class="leading-relaxed text-[17px] text-justify">
                Через Маңғыстау проходили караванные пути Великого Шёлкового пути. Торговля солью, пряностями, тканями и металлом привела к смешению культур, 
                формированию уникальной архитектуры и духовного наследия. Древние некрополи, мавзолеи и петроглифы хранят память о тысячелетней истории региона.
            </p>
            <p class="leading-relaxed text-[17px] text-justify">
                Природа области уникальна: пустыни, плато, горные массивы, бухты и песчаные косы формируют неповторимый ландшафт. 
                Эти места издавна служили не только домом для людей, но и местом для проведения ритуалов, торговли и культурных обменов.
            </p>
            <blockquote class="border-l-4 border-sky-600 pl-4 italic text-gray-600 text-base">
                «История Маңғыстау — это живое дыхание степей, море, которое хранит тайны древних цивилизаций, и ветры, что шепчут легенды.»
            </blockquote>
            <p class="leading-relaxed text-[17px] text-justify">
                Сегодня Маңғыстау развивается как туристический и исследовательский центр. Создаются маршруты для посещения исторических памятников, музеев и археологических объектов. 
                Главная цель — сохранить богатое наследие региона и передать его будущим поколениям, чтобы каждый мог ощутить связь между прошлым, настоящим и будущим.
            </p>
        </div>

        <div class="relative">
            <div class="absolute -inset-2 bg-gradient-to-r from-sky-100 to-amber-100 rounded-3xl blur-2xl opacity-40"></div>
            <img src="/images/history_mangystau.jpg" alt="Исторические пейзажи Маңғыстау" 
                class="relative rounded-3xl shadow-xl w-full object-cover transition-transform duration-700 hover:scale-[1.04] hover:shadow-2xl">
        </div>
    </section>

    <!-- TIMELINE OR FEATURES -->
    <section class="relative mx-4 md:mx-24 mb-28">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-14 text-center">
            Основные этапы истории
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            <!-- Ancient Era -->
            <div class="group bg-white/80 backdrop-blur-sm rounded-3xl shadow-lg hover:shadow-2xl transition p-8 text-center relative overflow-hidden">
                <img src="/images/ancient.jpg" alt="Древние поселения" class="w-full h-52 object-cover rounded-2xl mb-5 shadow-md">
                <h3 class="text-xl font-semibold mb-3 text-gray-900">Древние поселения</h3>
                <p class="text-gray-600 leading-relaxed">
                    Первые люди обитали на территории Маңғыстау ещё в бронзовом и железном веках. Археологические находки позволяют увидеть быт, ремёсла и культуру древних племён.
                </p>
            </div>

            <!-- Silk Road Era -->
            <div class="group bg-white/80 backdrop-blur-sm rounded-3xl shadow-lg hover:shadow-2xl transition p-8 text-center relative overflow-hidden">
                <img src="/images/silk_road.jpg" alt="Великий Шёлковый путь" class="w-full h-52 object-cover rounded-2xl mb-5 shadow-md">
                <h3 class="text-xl font-semibold mb-3 text-gray-900">Великий Шёлковый путь</h3>
                <p class="text-gray-600 leading-relaxed">
                    Через регион проходили торговые караваны. Соль, пряности и ткани создавали культурное разнообразие и экономическое развитие области.
                </p>
            </div>

            <!-- Modern Era -->
            <div class="group bg-white/80 backdrop-blur-sm rounded-3xl shadow-lg hover:shadow-2xl transition p-8 text-center relative overflow-hidden">
                <img src="/images/modern.jpg" alt="Современный Маңғыстау" class="w-full h-52 object-cover rounded-2xl mb-5 shadow-md">
                <h3 class="text-xl font-semibold mb-3 text-gray-900">Современность</h3>
                <p class="text-gray-600 leading-relaxed">
                    Сегодня Маңғыстау развивается как туристический и культурный центр. Создаются маршруты и экспозиции, чтобы каждый мог почувствовать историю и дух региона.
                </p>
            </div>
        </div>
    </section>

</div>
@endsection
