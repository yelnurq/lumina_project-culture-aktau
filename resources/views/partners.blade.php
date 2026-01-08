@extends('layouts.app')

@section('content')
<div class="bg-[#F8F8FA] min-h-screen font-montserrat pb-24">
    
    {{-- 🔹 Hero Section --}}
    <div class="relative py-32 bg-[#1A1A1A] overflow-hidden">
        <div class="absolute inset-0 opacity-40">
            {{-- Убедитесь, что путь к картинке верный --}}
            <img src="/images/caspian-sea.jpg" class="w-full h-full object-cover" alt="Partnership">
        </div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-white uppercase tracking-tighter mb-6 animate-fadeInUp">
                Станьте частью <br><span class="text-[#C5A367] italic font-light">Наследия Мангистау</span>
            </h1>
            <p class="text-gray-400 max-w-2xl mx-auto text-lg font-light leading-relaxed animate-fadeInUp delay-200">
                Мы объединяем лучшие локации региона с профессионалами индустрии, чтобы открывать новые берега Каспия всему миру.
            </p>
        </div>
    </div>

    <div class="container mx-auto px-6 max-w-7xl -mt-16 relative z-20">
        
        {{-- 🔹 Блок преимуществ --}}
        <div class="grid md:grid-cols-3 gap-8 mb-24">
@php
    $benefits = [
        [
            'title' => 'Охват аудитории', 
            'desc' => 'Ваши услуги увидят тысячи туристов, планирующих поездку в Мангистау через наш портал.', 
            'icon' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z'
        ],
        [
            'title' => 'Доверие', 
            'desc' => 'Размещение на официальной платформе центра наследия повышает статус вашего бренда в глазах гостей.', 
            // Иконка: Простой щит - символ защиты и надежности
            'icon' => 'M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'
        ],
        [
            'title' => 'Поддержка', 
            'desc' => 'Мы предоставляем актуальные данные, GPS-координаты и медиа-контент для ваших рекламных туров.', 
            // Иконка: Диалоговое окно (чат) с вопросительным знаком - символ помощи/консультации
            'icon' => 'M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z'
        ],
    ];
@endphp

        @foreach($benefits as $b)
            <div class="relative bg-white p-10 rounded-[3rem] shadow-xl shadow-black/5 border border-white hover:-translate-y-2 transition-all duration-500 group overflow-hidden">
                {{-- Фоновая иконка со смещением --}}
                <div class="absolute inset-0 pointer-events-none opacity-[0.05] group-hover:opacity-[0.08] transition-opacity duration-700" 
                    style="background-image: url('/images/icon2.svg'); 
                            background-size: 200px; 
                            background-position: right -20px bottom -20px; 
                            background-repeat: no-repeat;">
                </div>

                {{-- Контент карточки --}}
                <div class="w-14 h-14 bg-[#F8F8FA] rounded-2xl flex items-center justify-center mb-8 group-hover:bg-[#C5A367]/10 transition-colors relative z-10">
                    <svg class="w-8 h-8 text-[#C5A367]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="{{ $b['icon'] }}" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                
                <h3 class="text-lg font-bold text-gray-900 uppercase tracking-tight mb-4 relative z-10">{{ $b['title'] }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed font-light relative z-10">{{ $b['desc'] }}</p>
            </div>
        @endforeach
        </div>

        {{-- 🔹 Блок Логотипов (Доверие) --}}
{{-- 🔹 Блок Доверия: Флаги стран (Grid 2) --}}
<div class="mb-24 text-center px-4">
    <p class="text-[10px] uppercase tracking-[0.4em] font-bold text-gray-400 mb-10">Нам уже доверяют туристы из</p>
    
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-y-10 gap-x-4 max-w-4xl mx-auto opacity-80">
        
        {{-- Казахстан --}}
        <div class="flex flex-col items-center gap-3 group">
            <img src="https://flagcdn.com/w80/kz.png" alt="Kazakhstan" class="w-12 h-12 object-cover rounded-full shadow-lg group-hover:scale-110 transition-all duration-500 border-2 border-white">
            <span class="text-[9px] font-bold text-gray-400 group-hover:text-[#C5A367] uppercase tracking-widest transition-colors text-center">Kazakhstan</span>
        </div>

        {{-- Узбекистан --}}
        <div class="flex flex-col items-center gap-3 group">
            <img src="https://flagcdn.com/w80/uz.png" alt="Uzbekistan" class="w-12 h-12 object-cover rounded-full shadow-lg group-hover:scale-110 transition-all duration-500 border-2 border-white">
            <span class="text-[9px] font-bold text-gray-400 group-hover:text-[#C5A367] uppercase tracking-widest transition-colors text-center">Uzbekistan</span>
        </div>

        {{-- Кыргызстан --}}
        <div class="flex flex-col items-center gap-3 group">
            <img src="https://flagcdn.com/w80/kg.png" alt="Kyrgyzstan" class="w-12 h-12 object-cover rounded-full shadow-lg group-hover:scale-110 transition-all duration-500 border-2 border-white">
            <span class="text-[9px] font-bold text-gray-400 group-hover:text-[#C5A367] uppercase tracking-widest transition-colors text-center">Kyrgyzstan</span>
        </div>

        {{-- Таджикистан --}}
        <div class="flex flex-col items-center gap-3 group">
            <img src="https://flagcdn.com/w80/tj.png" alt="Tajikistan" class="w-12 h-12 object-cover rounded-full shadow-lg group-hover:scale-110 transition-all duration-500 border-2 border-white">
            <span class="text-[9px] font-bold text-gray-400 group-hover:text-[#C5A367] uppercase tracking-widest transition-colors text-center">Tajikistan</span>
        </div>

        {{-- Туркменистан --}}
        <div class="flex flex-col items-center gap-3 group">
            <img src="https://flagcdn.com/w80/tm.png" alt="Turkmenistan" class="w-12 h-12 object-cover rounded-full shadow-lg group-hover:scale-110 transition-all duration-500 border-2 border-white">
            <span class="text-[9px] font-bold text-gray-400 group-hover:text-[#C5A367] uppercase tracking-widest transition-colors text-center">Turkmenistan</span>
        </div>

        {{-- Россия --}}
        <div class="flex flex-col items-center gap-3 group">
            <img src="https://flagcdn.com/w80/ru.png" alt="Russia" class="w-12 h-12 object-cover rounded-full shadow-lg group-hover:scale-110 transition-all duration-500 border-2 border-white">
            <span class="text-[9px] font-bold text-gray-400 group-hover:text-[#C5A367] uppercase tracking-widest transition-colors text-center">Russia</span>
        </div>

        {{-- Грузия --}}
        <div class="flex flex-col items-center gap-3 group">
            <img src="https://flagcdn.com/w80/ge.png" alt="Georgia" class="w-12 h-12 object-cover rounded-full shadow-lg group-hover:scale-110 transition-all duration-500 border-2 border-white">
            <span class="text-[9px] font-bold text-gray-400 group-hover:text-[#C5A367] uppercase tracking-widest transition-colors text-center">Georgia</span>
        </div>

        {{-- Армения --}}
        <div class="flex flex-col items-center gap-3 group">
            <img src="https://flagcdn.com/w80/am.png" alt="Armenia" class="w-12 h-12 object-cover rounded-full shadow-lg group-hover:scale-110 transition-all duration-500 border-2 border-white">
            <span class="text-[9px] font-bold text-gray-400 group-hover:text-[#C5A367] uppercase tracking-widest transition-colors text-center">Armenia</span>
        </div>

        {{-- Китай --}}
        <div class="flex flex-col items-center gap-3 group">
            <img src="https://flagcdn.com/w80/cn.png" alt="China" class="w-12 h-12 object-cover rounded-full shadow-lg group-hover:scale-110 transition-all duration-500 border-2 border-white">
            <span class="text-[9px] font-bold text-gray-400 group-hover:text-[#C5A367] uppercase tracking-widest transition-colors text-center">China</span>
        </div>

        {{-- Германия --}}
        <div class="flex flex-col items-center gap-3 group">
            <img src="https://flagcdn.com/w80/de.png" alt="Germany" class="w-12 h-12 object-cover rounded-full shadow-lg group-hover:scale-110 transition-all duration-500 border-2 border-white">
            <span class="text-[9px] font-bold text-gray-400 group-hover:text-[#C5A367] uppercase tracking-widest transition-colors text-center">Germany</span>
        </div>

    </div>
</div>
        {{-- 🔹 Направления партнерства --}}
        <div class="mb-24">
            <div class="flex flex-col items-center mb-16">
                <h2 class="text-3xl font-light uppercase tracking-tighter text-gray-900 text-center">
                    Форматы <span class="font-bold text-primary">Сотрудничества</span>
                </h2>
                <div class="w-20 h-1 bg-primary mt-4 rounded-full"></div>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-8">
    {{-- Туроператоры --}}
    <div class="group bg-white rounded-[3rem] overflow-hidden flex flex-col md:flex-row shadow-sm border border-gray-100 hover:shadow-2xl transition-all duration-700">
        <div class="md:w-1/2 overflow-hidden h-64 md:h-auto">
            <img src="/images/partnership/tour.png" 
                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" 
                 alt="Tour Operators">
        </div>
        <div class="md:w-1/2 p-10 flex flex-col justify-center">
            <span class="text-[10px] font-black text-[#C5A367] uppercase tracking-widest block mb-4">Для агентств</span>
            <h3 class="text-2xl font-bold text-gray-900 mb-4 tracking-tighter italic uppercase">Тур-операторы</h3>
            <p class="text-gray-500 text-sm font-light leading-relaxed mb-6">Включение ваших маршрутов в наш официальный каталог и прямые рекомендации туристам.</p>
            <ul class="text-[10px] space-y-2 text-gray-400 font-bold uppercase tracking-wider">
                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-[#C5A367] rounded-full"></span> Приоритетное размещение</li>
                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-[#C5A367] rounded-full"></span> Статус проверенного гида</li>
            </ul>
        </div>
    </div>

    {{-- Отели и Базы отдыха --}}
    <div class="group bg-white rounded-[3rem] overflow-hidden flex flex-col md:flex-row shadow-sm border border-gray-100 hover:shadow-2xl transition-all duration-700">
        <div class="md:w-1/2 overflow-hidden h-64 md:h-auto">
            <img src="/images/partnership/hotel.png" 
                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" 
                 alt="Hotels">
        </div>
        <div class="md:w-1/2 p-10 flex flex-col justify-center">
            <span class="text-[10px] font-black text-[#C5A367] uppercase tracking-widest block mb-4">Для HoReCa</span>
            <h3 class="text-2xl font-bold text-gray-900 mb-4 tracking-tighter italic uppercase">Отели & Отдых</h3>
            <p class="text-gray-500 text-sm font-light leading-relaxed mb-6">Размещение в блоке «Где остановиться» на страницах самых популярных объектов наследия.</p>
            <ul class="text-[10px] space-y-2 text-gray-400 font-bold uppercase tracking-wider">
                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-[#C5A367] rounded-full"></span> Кнопка бронирования</li>
                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-[#C5A367] rounded-full"></span> Профессиональные фото</li>
            </ul>
        </div>
    </div>
</div>
        </div>

        {{-- 🔹 FAQ Section (Новый блок) --}}
      

        {{-- 🔹 Форма заявки --}}
        <div id="application-form" class="bg-[#1A1A1A] rounded-[4rem] p-10 md:p-20 relative overflow-hidden text-white shadow-2xl">
            <div class="relative z-10 grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold uppercase tracking-tighter mb-6">Отправьте <span class="text-[#C5A367]">заявку</span></h2>
                    <p class="text-gray-400 font-light mb-12 text-lg">Наш менеджер свяжется с вами, чтобы подготовить индивидуальное соглашение о сотрудничестве.</p>
                    
                    <div class="space-y-6">
                        <div class="flex items-center gap-5 group">
                            <div class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center text-[#C5A367] font-bold group-hover:border-[#C5A367] transition-all">01</div>
                            <span class="text-sm font-medium">Заполнение первичной анкеты</span>
                        </div>
                        <div class="flex items-center gap-5 text-gray-500 group">
                            <div class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center font-bold">02</div>
                            <span class="text-sm font-medium">Верификация ваших данных</span>
                        </div>
                        <div class="flex items-center gap-5 text-gray-500 group">
                            <div class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center font-bold">03</div>
                            <span class="text-sm font-medium">Заключение партнерского договора</span>
                        </div>
                    </div>
                </div>

                {{-- Форма --}}
                <div class="bg-white/5 backdrop-blur-md p-8 md:p-12 rounded-[3rem] border border-white/10">
                    <form action="#" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="space-y-1">
                                <label class="text-[9px] uppercase tracking-widest text-[#C5A367] font-bold ml-2">Название компании</label>
                                <input type="text" name="company" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 focus:border-[#C5A367] outline-none transition-all placeholder:text-gray-600" placeholder="ТОО 'Safari'">
                            </div>
                            <div class="space-y-1">
                                <label class="text-[9px] uppercase tracking-widest text-[#C5A367] font-bold ml-2">Контактное лицо</label>
                                <input type="text" name="name" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 focus:border-[#C5A367] outline-none transition-all placeholder:text-gray-600" placeholder="Имя Фамилия">
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="text-[9px] uppercase tracking-widest text-[#C5A367] font-bold ml-2">Email адрес</label>
                            <input type="email" name="email" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 focus:border-[#C5A367] outline-none transition-all placeholder:text-gray-600" placeholder="partner@example.com">
                        </div>

                        <div class="space-y-1">
                            <label class="text-[9px] uppercase tracking-widest text-[#C5A367] font-bold ml-2">Ваша специализация</label>
                            <select name="type" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 focus:border-[#C5A367] outline-none transition-all text-gray-400 appearance-none">
                                <option class="bg-[#1A1A1A]">Выберите категорию</option>
                                <option class="bg-[#1A1A1A]">Тур-оператор</option>
                                <option class="bg-[#1A1A1A]">Отель / Гостевой дом</option>
                                <option class="bg-[#1A1A1A]">Частный гид / Проводник</option>
                                <option class="bg-[#1A1A1A]">Транспортные услуги</option>
                            </select>
                        </div>

                        <div class="space-y-1">
                            <label class="text-[9px] uppercase tracking-widest text-[#C5A367] font-bold ml-2">Кратко о себе</label>
                            <textarea name="message" rows="3" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 focus:border-[#C5A367] outline-none transition-all resize-none placeholder:text-gray-600" placeholder="Расскажите о вашем опыте..."></textarea>
                        </div>
                        
                        <button type="submit" class="w-full bg-[#C5A367] text-white py-5 rounded-2xl font-bold uppercase tracking-widest text-[10px] hover:bg-white hover:text-[#1A1A1A] transition-all shadow-xl shadow-[#C5A367]/10 active:scale-[0.98]">
                            Отправить заявку
                        </button>
                    </form>
                </div>
            </div>

            {{-- Декор --}}
            <div class="absolute -right-20 -bottom-20 text-[20rem] font-bold text-white/[0.02] select-none uppercase tracking-tighter pointer-events-none">
                Partner
            </div>
        </div>

    </div>
</div>

<style>
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeInUp { animation: fadeInUp 0.8s ease-out forwards; }
    .delay-200 { animation-delay: 0.2s; }
</style>
@endsection