@extends('layouts.app')

@section('content')
<div class="bg-white overflow-hidden">
    {{-- 🔹 Декоративный фоновый заголовок как на странице культуры --}}
    <div class="relative py-12 lg:pt-[9rem] container mx-auto max-w-7xl px-6">
        <div class="absolute left-0 top-20 text-[10rem] md:text-[15rem] font-bold text-black/[0.03] select-none pointer-events-none uppercase tracking-tighter italic">
            History
        </div>

        {{-- 🔹 Хлебные крошки в вашем стиле --}}
        <nav class="mb-8 relative z-10">
            <ol class="flex items-center space-x-3 text-[10px] uppercase tracking-[0.3em] font-bold text-gray-400">
                <li><a href="/" class="hover:text-[#C5A367] transition-all">Главная</a></li>
                <li class="text-gray-300">/</li>
                <li class="text-[#C5A367]">История региона</li>
            </ol>
        </nav>

        {{-- 🔹 Заголовок секции --}}
        <div class="relative z-10 lg:mb-16">
            <h1 class="font-title text-4xl md:text-6xl font-light text-gray-900 mb-6 uppercase tracking-tight">
                Летопись <span class="font-bold text-[#C5A367] italic">Маңғыстау</span>
            </h1>
            <div class="h-1 w-20 bg-[#C5A367] lg:mb-8"></div>
        </div>
    </div>

    {{-- 🔹 Основной контент --}}
    <section class="container mx-auto max-w-7xl px-6 mb-24 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            <div class="space-y-8">
                <p class="text-gray-600 text-lg leading-relaxed font-light text-justify border-l-2 border-[#C5A367]/30 pl-8">
                    Маңғыстау — уникальный край на западе Казахстана, омываемый водами Каспийского моря. 
                    С древних времён эта земля была пересечением торговых путей, местом проживания кочевых племён 
                    и колыбелью богатой культуры.
                </p>
                <p class="text-gray-500 leading-relaxed text-justify font-light">
                    Через Маңғыстау проходили караванные пути Великого Шёлкового пути. Торговля солью, пряностями, тканями и металлом привела к смешению культур, 
                    формированию уникальной архитектуры и духовного наследия. Древние некрополи и петроглифы хранят память о тысячелетней истории региона.
                </p>
                
                <blockquote class="relative p-8 rounded-[2rem] bg-gray-50 border border-gray-100 shadow-sm overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 text-8xl text-[#C5A367]/10 font-serif">“</div>
                    <p class="relative z-10 italic text-gray-600 text-xl font-light leading-snug">
                        «История Маңғыстау — это живое дыхание степей, море, которое хранит тайны древних цивилизаций, и ветры, что шепчут легенды.»
                    </p>
                </blockquote>
            </div>

            <div class="relative">
                <div class="aspect-[4/5] rounded-[3rem] overflow-hidden shadow-2xl">
                    <img src="/images/history/aktau.jpg" alt="History" class="w-full h-full object-cover">
                </div>
                {{-- Декоративный элемент --}}
                <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-[#C5A367] rounded-[2rem] -z-10 opacity-20 blur-2xl"></div>
            </div>
        </div>
    </section>

    {{-- 🔹 Таймлайн в новом стиле --}}
    <section class="bg-[#0f172a] py-24 text-white">
        <div class="container mx-auto max-w-7xl px-6">
            <div class="text-center mb-20">
                <span class="text-[10px] uppercase tracking-[0.4em] font-bold text-[#C5A367]">Хронология</span>
                <h2 class="text-3xl md:text-5xl font-bold mt-4 uppercase tracking-tight">Величественные этапы</h2>
            </div>

            <div class="relative">
                {{-- Центральная линия --}}
                <div class="absolute top-0 left-1/2 w-px bg-white/10 h-full -translate-x-1/2 hidden md:block"></div>

                <div class="space-y-24 md:space-y-0">
                    {{-- Этап 1 --}}
                    <div class="relative md:flex items-center justify-between md:mb-32 group">
                        <div class="md:w-[45%] mb-8 md:mb-0">
                            <div class="relative overflow-hidden rounded-[2.5rem] aspect-video shadow-2xl">
                                <img src="/images/history/bronze.png" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Древность">
                                <div class="absolute inset-0 bg-black/40"></div>
                                <div class="absolute bottom-6 left-8 text-[#C5A367] font-bold tracking-[0.3em] uppercase text-[10px]">Бронзовый век</div>
                            </div>
                        </div>
                        <div class="absolute left-1/2 -translate-x-1/2 w-4 h-4 bg-[#C5A367] rounded-full shadow-[0_0_20px_#C5A367] hidden md:block"></div>
                        <div class="md:w-[45%] md:pl-12">
                            <h3 class="text-2xl font-bold mb-4 uppercase tracking-tight">Древние поселения</h3>
                            <p class="text-gray-400 font-light leading-relaxed">Первые люди обитали на территории Маңғыстау ещё в бронзовом и железном веках, создавая уникальные наскальные рисунки.</p>
                        </div>
                    </div>

                    {{-- Этап 2 --}}
                    <div class="relative md:flex items-center justify-between md:mb-32 flex-row-reverse group">
                        <div class="md:w-[45%] mb-8 md:mb-0">
                            <div class="relative overflow-hidden rounded-[2.5rem] aspect-video shadow-2xl">
                                <img src="/images/history/silkway.png" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Шелковый путь">
                                <div class="absolute inset-0 bg-black/40"></div>
                                <div class="absolute bottom-6 left-8 text-[#C5A367] font-bold tracking-[0.3em] uppercase text-[10px]">Средние века</div>
                            </div>
                        </div>
                        <div class="absolute left-1/2 -translate-x-1/2 w-4 h-4 bg-[#C5A367] rounded-full shadow-[0_0_20px_#C5A367] hidden md:block"></div>
                        <div class="md:w-[45%] md:pr-12 md:text-right">
                            <h3 class="text-2xl font-bold mb-4 uppercase tracking-tight">Великий Шёлковый путь</h3>
                            <p class="text-gray-400 font-light leading-relaxed">Через регион проходили караваны, соединяющие Восток и Запад. Соль и пряности сформировали торговую мощь края.</p>
                        </div>
                    </div>

                    {{-- Этап 3 --}}
                    <div class="relative md:flex items-center justify-between group">
                        <div class="md:w-[45%] mb-8 md:mb-0">
                            <div class="relative overflow-hidden rounded-[2.5rem] aspect-video shadow-2xl border border-white/10">
                                <img src="/images/history/aktau.jpg" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Современность">
                                <div class="absolute inset-0 bg-black/40"></div>
                                <div class="absolute bottom-6 left-8 text-[#C5A367] font-bold tracking-[0.3em] uppercase text-[10px]">Наши дни</div>
                            </div>
                        </div>
                        <div class="absolute left-1/2 -translate-x-1/2 w-4 h-4 bg-[#C5A367] rounded-full shadow-[0_0_20px_#C5A367] hidden md:block"></div>
                        <div class="md:w-[45%] md:pl-12">
                            <h3 class="text-2xl font-bold mb-4 uppercase tracking-tight">Новая эра</h3>
                            <p class="text-gray-400 font-light leading-relaxed">Сегодня Маңғыстау превращается в глобальный центр притяжения для туристов, ценящих первозданную природу и историю.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .font-title { font-family: 'Montserrat', sans-serif; }
    /* Плавное появление */
    section {
        animation: fadeInUp 1s ease-out forwards;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection