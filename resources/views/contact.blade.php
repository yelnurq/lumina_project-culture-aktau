@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-b from-white to-[#F8F8FA] min-h-screen pt-[9rem] pb-24">
    <div class="container mx-auto max-w-7xl px-6">
        
        {{-- 🔹 Хедер страницы --}}
        <div class="relative mb-20 border-b border-gray-100 pb-12">
            <div class="absolute -left-10 top-0 text-[10rem] font-bold text-black/[0.02] select-none pointer-events-none uppercase tracking-tighter">
                Contact
            </div>
            
            <nav class="mb-8 relative z-10">
                <ol class="flex items-center space-x-3 text-[10px] uppercase tracking-[0.3em] font-bold text-gray-400">
                    <li><a href="/" class="hover:text-[#C5A367] transition-all">Главная</a></li>
                    <li class="text-gray-300">/</li>
                    <li class="text-[#C5A367]">Связаться с нами</li>
                </ol>
            </nav>

            <div class="max-w-3xl relative z-10">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 uppercase tracking-tight mb-6">
                    Центр сохранения <span class="text-[#C5A367] italic font-light">Наследия</span>
                </h1>
                <p class="text-gray-500 leading-relaxed border-l-2 border-[#C5A367] pl-6 text-lg font-light">
                    Мы открыты для сотрудничества, новых идей и предложений, направленных на сохранение уникальной природы и культурных памятников Мангистау.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
            
            {{-- 🔹 Инфо-блок (Левая колонка) --}}
            <div class="lg:col-span-5 space-y-10">
                
                {{-- Карточки контактов --}}
                <div class="grid grid-cols-1 gap-6">
                    {{-- Адрес --}}
                    <div class="group p-8 bg-white rounded-[2rem] shadow-sm border border-gray-50 hover:shadow-xl transition-all duration-500">
                        <div class="w-12 h-12 bg-[#F8F8FA] rounded-xl flex items-center justify-center mb-6 group-hover:bg-[#C5A367]/10 transition-colors">
                            <svg class="w-6 h-6 text-[#C5A367]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="1.5"/></svg>
                        </div>
                        <h3 class="text-xs uppercase tracking-widest font-bold text-gray-400 mb-2">Наш офис</h3>
                        <p class="text-gray-900 font-medium">г. Актау, пр. Нурсултана Назарбаева, 12, Казахстан</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Телефон --}}
                        <div class="group p-8 bg-white rounded-[2rem] shadow-sm border border-gray-50 hover:shadow-xl transition-all duration-500">
                            <h3 class="text-xs uppercase tracking-widest font-bold text-gray-400 mb-2">Телефон</h3>
                            <a href="tel:+77292456789" class="text-gray-900 font-bold hover:text-[#C5A367] transition-colors">+7 (7292) 45-67-89</a>
                        </div>
                        {{-- Email --}}
                        <div class="group p-8 bg-white rounded-[2rem] shadow-sm border border-gray-50 hover:shadow-xl transition-all duration-500">
                            <h3 class="text-xs uppercase tracking-widest font-bold text-gray-400 mb-2">Email</h3>
                            <a href="mailto:info@caspianheritage.kz" class="text-gray-900 font-bold hover:text-[#C5A367] transition-colors">info@caspian.kz</a>
                        </div>
                    </div>
                </div>

                {{-- Соцсети --}}
                <div class="p-8 bg-[#1A1A1A] rounded-[2.5rem] text-white overflow-hidden relative">
                    <div class="relative z-10">
                        <h3 class="text-[#C5A367] text-[10px] font-bold uppercase tracking-[0.3em] mb-6">Мы в сетях</h3>
                        <div class="flex gap-4">
                            @foreach(['Instagram', 'Facebook', 'Telegram'] as $social)
                                <a href="#" class="px-6 py-3 border border-white/10 rounded-xl text-xs font-bold uppercase tracking-widest hover:bg-[#C5A367] hover:border-[#C5A367] transition-all">
                                    {{ $social }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="absolute -right-10 -bottom-10 text-white/[0.03] text-9xl font-bold select-none">@</div>
                </div>
            </div>

            {{-- 🔹 Форма (Правая колонка) --}}
            <div class="lg:col-span-7">
                <div class="bg-white rounded-[3rem] p-10 md:p-14 shadow-[0_30px_100px_rgba(0,0,0,0.04)] border border-gray-50">
                    <h2 class="text-3xl font-bold text-gray-900 uppercase tracking-tighter mb-10">Напишите <span class="text-[#C5A367]">нам</span></h2>

                    @if(session('success'))
                        <div class="mb-8 p-5 bg-green-50 text-green-700 rounded-2xl border border-green-100 flex items-center gap-3 animate-fadeIn">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7" stroke-width="3"/></svg>
                            <span class="font-bold text-sm uppercase tracking-wide">{{ session('success') }}</span>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.send') }}" class="space-y-8">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="text-[10px] uppercase tracking-widest font-black text-gray-400 ml-4">Как вас зовут?</label>
                                <input type="text" name="name" required placeholder="Алия Садыкова"
                                    class="w-full bg-[#F8F8FA] border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-[#C5A367]/20 transition-all outline-none">
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] uppercase tracking-widest font-black text-gray-400 ml-4">Ваш Email</label>
                                <input type="email" name="email" required placeholder="example@mail.com"
                                    class="w-full bg-[#F8F8FA] border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-[#C5A367]/20 transition-all outline-none">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] uppercase tracking-widest font-black text-gray-400 ml-4">Сообщение</label>
                            <textarea name="message" rows="4" required placeholder="Расскажите о вашей идее или задайте вопрос..."
                                class="w-full bg-[#F8F8FA] border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-[#C5A367]/20 transition-all outline-none resize-none"></textarea>
                        </div>

                        <button type="submit" class="w-full md:w-auto bg-[#1A1A1A] text-white px-12 py-5 rounded-2xl font-bold uppercase tracking-[0.2em] text-xs hover:bg-[#C5A367] transition-all duration-500 shadow-xl shadow-black/10">
                            Отправить сообщение
                        </button>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection