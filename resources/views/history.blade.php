@extends('layouts.app')

@section('content')
<div class="relative overflow-hidden bg-gradient-to-b from-sky-50 via-white to-amber-50">

    <div class="absolute top-[-200px] right-[-250px] w-[600px] h-[600px] bg-sky-200/20 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-[-200px] left-[-220px] w-[500px] h-[500px] bg-amber-100/20 rounded-full blur-3xl animate-pulse"></div>

    <section class="relative px-6 sm:mx-6 md:mx-16 lg:mx-24 mt-10 mb-16">
            <nav class="text-sm text-gray-500 mb-4">
            <ol class="list-reset flex flex-wrap justify-left md:justify-start space-x-2">
                <li>
                    <a href="/" class="hover:underline text-blue-600" data-lang="restaurant_breadcrumb_home">
                        Главная
                    </a>
                </li>
                <li>/</li>
                <li class="text-gray-700" data-lang="restaurant_breadcrumb_current">
                    Вкусно покушать
                </li>
            </ol>
        </nav>
        <div class="space-y-6 text-gray-700">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900">История Маңғыстауской области</h2>
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
            <blockquote class="border-l-4 border-sky-600 pl-6 italic text-gray-600 text-lg bg-white/30 backdrop-blur-md rounded-xl py-4 px-6 shadow-md">
                «История Маңғыстау — это живое дыхание степей, море, которое хранит тайны древних цивилизаций, и ветры, что шепчут легенды.»
            </blockquote>
            <p class="leading-relaxed text-[17px] text-justify">
                Сегодня Маңғыстау развивается как туристический и исследовательский центр. Создаются маршруты для посещения исторических памятников, музеев и археологических объектов. 
                Главная цель — сохранить богатое наследие региона и передать его будущим поколениям, чтобы каждый мог ощутить связь между прошлым, настоящим и будущим.
            </p>
        </div>


    </section>
<section class="relative mx-4 md:mx-24 mb-28">
  <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-14 text-center">
    Основные величественные этапы истории Маңғыстау
  </h2>

  <div class="relative">
    <div class="absolute top-0 left-1/2 w-1 bg-sky-300 h-full -translate-x-1/2"></div>

    <div class=" flex justify-start w-full relative">
      <div class="w-1/2 pr-10 text-right">
        <div class="inline-block bg-white/80 backdrop-blur-lg p-6 rounded-xl shadow-2xl hover:shadow-3xl transition relative">
          <img src="/images/caspian-sea.jpg" alt="Древние поселения" class="w-full h-56 object-cover rounded-2xl mb-4 shadow-md">
          <h3 class="text-2xl font-semibold mb-2 text-gray-900">Древние поселения</h3>
          <p class="text-gray-600 text-[16px]">
            Первые люди обитали на территории Маңғыстау ещё в бронзовом и железном веках.
          </p>
          <span class="absolute top-1/2 right-[-2rem] w-6 h-6 bg-sky-500 rounded-full border-2 border-white -translate-y-1/2"></span>
        </div>
      </div>
      <div class="w-1/2"></div>
    </div>

    <div style="margin-top:-200px;" class="flex justify-end w-full relative">
      <div class="w-1/2"></div>
      <div class="w-1/2 pl-10 text-left">
        <div class="inline-block bg-white/80 backdrop-blur-lg p-6 rounded-xl shadow-2xl hover:shadow-3xl transition relative">
          <img src="/images/caspian-sea.jpg" alt="Великий Шёлковый путь" class="w-full h-56 object-cover rounded-2xl mb-4 shadow-md">
          <h3 class="text-2xl font-semibold mb-2 text-gray-900">Великий Шёлковый путь</h3>
          <p class="text-gray-600 text-[16px]">
            Через регион проходили торговые караваны. Соль, пряности и ткани создавали культурное разнообразие.
          </p>
          <span class="absolute top-1/2 left-[-2rem] w-6 h-6 bg-yellow-500 rounded-full border-2 border-white -translate-y-1/2"></span>
        </div>
      </div>
    </div>

    <div style="margin-top:-100px;"  class="flex justify-start w-full relative">
      <div class="w-1/2 pr-10 text-right">
        <div class="inline-block bg-white/80 backdrop-blur-lg p-6 rounded-xl shadow-2xl hover:shadow-3xl transition relative">
          <img src="/images/boszhyra.jpg" alt="Эпоха Казахского ханства" class="w-full h-56 object-cover rounded-2xl mb-4 shadow-md">
          <h3 class="text-2xl font-semibold mb-2 text-gray-900">Эпоха Казахского ханства</h3>
          <p class="text-gray-600 text-[16px]">
            В середине XV века на землях западного Казахстана образовалось Казахское ханство.
          </p>
          <span class="absolute top-1/2 right-[-2rem] w-6 h-6 bg-yellow-500 rounded-full border-2 border-white -translate-y-1/2"></span>
        </div>
      </div>
      <div class="w-1/2"></div>
    </div>

    <div style="margin-top:-200px;"  class="mb-0 flex justify-end w-full relative">
      <div class="w-1/2"></div>
      <div class="w-1/2 pl-10 text-left">
        <div class="inline-block bg-white/80 backdrop-blur-lg p-6 rounded-xl shadow-2xl hover:shadow-3xl transition relative">
          <img src="/images/boszhyra.jpg" alt="Современность" class="w-full h-56 object-cover rounded-2xl mb-4 shadow-md">
          <h3 class="text-2xl font-semibold mb-2 text-gray-900">Современность</h3>
          <p class="text-gray-600 text-[16px]">
            Сегодня Маңғыстау развивается как туристический и культурный центр.
          </p>
          <span class="absolute top-1/2 left-[-2rem] w-6 h-6 bg-sky-500 rounded-full border-2 border-white -translate-y-1/2"></span>
        </div>
      </div>
    </div>

  </div>
</section>


</div>
@endsection
