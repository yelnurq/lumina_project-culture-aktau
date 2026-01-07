@extends('layouts.app')



@section('content')
<div class="relative w-full h-[100svh] lg:h-[100vh] overflow-hidden">
    <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover z-0">
        <source src="{{ asset('media/video.mp4') }}" type="video/mp4" />
        Ваш браузер не поддерживает видео.
    </video>

    <div class="relative z-10 w-full h-full bg-black/50 md:bg-black/40 bg-gradient-to-r from-primary/40 md:from-primary/60 via-primary/40 to-transparent flex items-center">
        
        <div class="container mx-auto px-6 md:px-3">
            <div class="flex flex-col md:flex-row items-center justify-between gap-12">
                
                <div class="max-w-3xl w-full">
                    <p 
                        class="text-left text-sm md:text-md text-blue-200 font-semibold mb-4 uppercase opacity-0 translate-y-6 animate-fadeInUp delay-1200"
                        data-lang="main-subtitle"
                    >
                        ДУХ СВОБОДЫ И ПУСТЫНИ
                </p>
                    <h1 
                        class="font-title text-left text-2xl md:text-4xl font-extrabold text-white mb-6 leading-[1.1] opacity-0 translate-y-6 animate-fadeInUp"
                        data-lang="main-title"
                    >
                        Новые берега Каспия<br class="hidden sm:block"> 
                        <span class="text-blue-400">—</span> неизвестная красота Маңғыстау
                    </h1>

                    <p 
                        class="text-left text-[14px] md:text-[16px] text-gray-100 max-w-2xl mb-10 leading-relaxed opacity-0 translate-y-6 animate-fadeInUp delay-300"
                        data-lang="main-desc"
                    >
                        Каспийское море отступает, открывая новые островки и дороги. Там, где раньше была вода — теперь просторы, полные жизни, света и тишины.
                    </p>

               <div class="flex flex-col sm:flex-row items-center sm:items-start gap-5 opacity-0 translate-y-6 animate-fadeInUp delay-600">
    
    <a href="/culture-list" 
       class="group relative text-[11px] md:text-[12px] uppercase tracking-[0.2em] inline-flex justify-center items-center bg-white text-black font-bold px-10 py-5 rounded-full shadow-2xl hover:bg-[#C5A367] hover:text-white transition-all duration-500 overflow-hidden">
        <span class="relative z-10">Проложить маршрут</span>
        <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:animate-[shimmer_1.5s_infinite]"></div>
    </a>

    <a href="/about" 
       class="hidden md:inline-flex text-[11px] md:text-[12px] uppercase tracking-[0.2em] justify-center items-center backdrop-blur-md bg-white/10 border border-white/20 text-white font-bold px-10 py-5 rounded-full hover:bg-white hover:text-black transition-all duration-500">
        О проекте
    </a>

</div>

<style>
@keyframes shimmer {
  100% { transform: translateX(100%); }
}
</style>
                </div>

                <div class="hidden lg:flex flex-col gap-6 w-full lg:max-w-sm opacity-0 translate-x-12 animate-fadeInRight delay-900">
                    
                    <div class="bg-black/50 backdrop-blur-2xl border border-white/10 rounded-[2.5rem] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.5)]">
                        
                        <div class="p-8 pb-6">
                            <h3 class="text-xs uppercase tracking-[0.2em] text-blue-400 font-bold mb-3 flex items-center gap-2 drop-shadow-sm">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                                </span>
                                Знаете ли вы?
                            </h3>
                            <p class="text-sm text-gray-200 leading-relaxed font-normal drop-shadow-md">
                                Устюрт — это дно древнего океана Тетис. Здесь до сих пор находят зубы доисторических акул, которым более <span class="font-bold text-white underline decoration-blue-500/50 underline-offset-4">20 миллионов лет</span>.
                            </p>
                        </div>

                        <div class="px-8">
                            <div class="h-[1px] w-full bg-white/10"></div>
                        </div>

                        <div class="p-8 pt-6 bg-black/20">
                            <label class="block text-white text-sm font-bold mb-4 drop-shadow-sm">Найти приключение</label>
                            <div class="relative group">
                                <input 
                                    type="text" 
                                    placeholder="Напр: Бозжыра..." 
                                    class="w-full bg-black/40 border border-white/20 rounded-2xl py-3.5 px-5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:bg-black/60 transition-all placeholder:text-gray-700"
                                >
                                <button class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 group-hover:text-white transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </div>
                            
                            <div class="flex flex-wrap gap-2 mt-4">
                                <span class="text-[10px] text-gray-300 hover:text-blue-400 font-medium cursor-pointer transition-colors bg-white/5 px-2 py-1 rounded-md">#каньоны</span>
                                <span class="text-[10px] text-gray-300 hover:text-blue-400 font-medium cursor-pointer transition-colors bg-white/5 px-2 py-1 rounded-md">#море</span>
                                <span class="text-[10px] text-gray-300 hover:text-blue-400 font-medium cursor-pointer transition-colors bg-white/5 px-2 py-1 rounded-md">#пещеры</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
     
        </div>
        
    </div>

<div id="scroll-trigger" class="hidden lg:flex absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center z-20 cursor-pointer group">
    <span id="scroll-text" class="text-[9px] text-white/50 uppercase tracking-[0.3em] mb-4 animate-pulse flex flex-col items-center gap-2 font-light text-center">
        Погрузитесь ниже <br> (крутите колесико)
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
        </svg>
    </span>

    <div class="relative w-16 h-20">
        <svg viewBox="0 0 100 120" class="absolute inset-0 w-full h-full fill-none stroke-white/20 stroke-[1.5]">
            <path d="M5 115 L20 80 L30 85 L35 95 L55 30 L65 70 L75 85 L80 80 L95 115 Z" />
        </svg>

        <svg viewBox="0 0 100 120" id="rock-fill" class="absolute inset-0 w-full h-full transition-all duration-150 ease-out" style="clip-path: inset(100% 0 0 0);">
            <path fill="#C5A367" d="M5 115 L20 80 L30 85 L35 95 L55 30 L65 70 L75 85 L80 80 L95 115 Z" />
            <path fill="#E8D5B5" d="M50 40 L55 30 L60 45 Z" />
        </svg>
    </div>
</div>

<script>
    const rockFill = document.getElementById('rock-fill');
    const scrollText = document.getElementById('scroll-text');
    const rockContainer = document.querySelector('.relative.w-16.h-20');
    
    let charge = 0;         
    let targetCharge = 0;   
    let isUnlocked = false;

    const isMobile = window.innerWidth < 1024;

    if (isMobile) {
        // Если мобилка — сразу всё открываем
        isUnlocked = true;
        if (rockFill) {
            rockFill.style.clipPath = 'inset(0% 0 0 0)';
            rockFill.style.opacity = '1';
        }
        if (scrollText) {
            scrollText.innerHTML = 'Листайте вниз';
            scrollText.style.color = '#C5A367';
        }
    }

    function animate() {
        // На мобилках анимация не нужна
        if (isMobile) return; 
        if (isUnlocked && Math.abs(targetCharge - charge) < 0.1) return;

        charge += (targetCharge - charge) * 0.1; 
        const safeCharge = Math.max(0, Math.min(100, charge));
        const fillValue = 100 - safeCharge;

        if (rockFill) {
            rockFill.style.clipPath = `inset(${fillValue}% 0 0 0)`;
            rockFill.style.opacity = 0.3 + (safeCharge / 100 * 0.7);
        }

        requestAnimationFrame(animate);
    }
    
    if (!isMobile) requestAnimationFrame(animate);

    // Колесо мыши (только для десктопа)
    window.addEventListener('wheel', (e) => {
        if (isUnlocked || isMobile) return;
        
        window.scrollTo(0, 0); 
        if (e.cancelable) e.preventDefault();

        targetCharge += e.deltaY * 0.05; 
        
        if (targetCharge < 0) targetCharge = 0;
        if (targetCharge >= 100) {
            targetCharge = 100;
            unlockPage();
        }
    }, { passive: false });


    function unlockPage() {
        if (isUnlocked) return;
        isUnlocked = true;

        if (navigator.vibrate) navigator.vibrate([70, 40, 70]); 

        if (rockContainer) rockContainer.classList.add('shake-animation');
        
        if (scrollText) {
            scrollText.innerHTML = 'Путь открыт';
            scrollText.style.color = '#C5A367';
            scrollText.classList.remove('animate-pulse');
        }
    }
</script>
</div>
<style>
@keyframes rock-shake {
    0% { transform: translate(0, 0); }
    25% { transform: translate(-4px, 0); }
    50% { transform: translate(4px, 0); }
    75% { transform: translate(-4px, 0); }
    100% { transform: translate(0, 0); }
}
.shake-animation {
    animation: rock-shake 0.4s cubic-bezier(.36,.07,.19,.97) both;
}
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeInRight {
        from { opacity: 0; transform: translateX(40px); }
        to { opacity: 1; transform: translateX(0); }
    }
    @keyframes scrollLine {
        0% { transform: translateY(-100%); }
        100% { transform: translateY(100%); }
    }

    .animate-fadeInUp { animation: fadeInUp 0.8s ease-out forwards; }
    .animate-fadeInRight { animation: fadeInRight 1s ease-out forwards; }
    .animate-scrollLine { animation: scrollLine 2s linear infinite; }
    
    .delay-300 { animation-delay: 0.3s; }
    .delay-600 { animation-delay: 0.6s; }
    .delay-900 { animation-delay: 0.9s; }
    .delay-1200 { animation-delay: 1.2s; }
</style>
<div class="bg-gray-100 py-24 border-y border-gray-100">
  <div class="container mx-auto max-w-7xl px-6 flex flex-col lg:flex-row gap-12 lg:gap-20 items-center">
    
    <div class="w-full lg:w-5/12">
        <span class="text-[10px] uppercase tracking-[0.4em] text-[#C5A367] font-bold mb-4 block">Вектор развития</span>

        <h2 class="font-title text-3xl md:text-4xl font-light text-gray-900 mb-6 leading-tight uppercase tracking-tight">
                    Наша <span class="font-bold text-primary">ЦЕЛЬ</span>
                    
                </h2>
                <div class="w-20 h-1 bg-primary rounded mb-6"></div>

        <div class="space-y-6 text-gray-900 font-light leading-relaxed">
            <p class="text-lg" data-lang="goal-desc1">
                Сохранение Каспийского моря и его новых берегов — это миссия по защите природы и <span class="text-[#C5A367] font-medium italic">будущего Маңғыстау</span>. Мы открываем уникальность региона, чтобы вдохновить мир беречь его первозданную красоту.
            </p>

            <p class="text-base" data-lang="goal-desc2">
                Проект направлен на изучение и популяризацию заповедных островков и песчаных кос, раскрывая <span class="text-primary font-medium">глубинную значимость</span> Каспия для каждого исследователя.
            </p>
        </div>

        <div class="mt-12">
            <a href="/about" data-lang="goal-btn" 
               class="inline-block border border-primary text-primary px-10 py-4 rounded-full text-sm font-bold uppercase tracking-widest hover:bg-primary hover:text-white transition-all duration-500">
                О проекте
            </a>
        </div>
    </div>

    <div id="heritage-container" class="w-full lg:w-7/12 grid grid-cols-1 sm:grid-cols-2 gap-4 h-[500px]">

        <div class="group relative overflow-hidden rounded-[2rem] shadow-sm hover:shadow-2xl transition-all duration-700 sm:row-span-2">
            <img src="/images/heritages/airakty.jpg" alt="Долина замков Айракты" 
                 class="w-full h-full object-cover transition-transform duration-[1.5s] group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
            <div class="absolute bottom-0 left-0 p-8">
                <h3 class="text-white font-bold text-lg uppercase tracking-wider" data-lang="ayrakty-title">Айракты</h3>
                <p class="text-white/70 text-xs font-light" data-lang="ayrakty-desc">Долина каменных замков</p>
            </div>
        </div>

        <div class="group relative overflow-hidden rounded-[2rem] shadow-sm hover:shadow-2xl transition-all duration-700">
            <img src="/images/heritages/buhta.jpeg" alt="Голубая Бухта" 
                 class="w-full h-full object-cover transition-transform duration-[1.5s] group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
            <div class="absolute bottom-0 left-0 p-6">
                <h3 class="text-white font-bold text-md uppercase tracking-wider" data-lang="buhta-title">Голубая Бухта</h3>
                <p class="text-white/70 text-xs font-light" data-lang="buhta-desc">Лазурные берега</p>
            </div>
        </div>

        <div class="group relative overflow-hidden rounded-[2rem] shadow-sm hover:shadow-2xl transition-all duration-700">
            <img src="/images/heritages/12.jpg" alt="Пещера Балаюк" 
                 class="w-full h-full object-cover transition-transform duration-[1.5s] group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
            <div class="absolute bottom-0 left-0 p-6">
                <h3 class="text-white font-bold text-md uppercase tracking-wider" data-lang="balayuk-title">Балаюк</h3>
                <p class="text-white/70 text-xs font-light" data-lang="balayuk-desc">Тайны подземных озер</p>
            </div>
        </div>

    </div>
  </div>
</div>
<section class="py-24 bg-white text-[#1A1A1A] overflow-hidden">
    <div class="container mx-auto px-6">
        
        <div class="flex flex-col md:flex-row justify-between md:items-end mb-8 md:mb-16 md:gap-8">
            <div class="max-w-xl">
                <span class="text-[10px] uppercase tracking-[0.3em] text-[#C5A367] font-bold mb-4 block">Инфраструктура</span>
                <h2 class="font-title text-2xl md:text-3xl font-bold text-primary mb-4 text-left md:text-left uppercase leading-tight tracking-tight">
                    Где остановиться <br> <span class="font-sans italic font-light text-primary">& вкусно поесть</span>
                </h2>
                <div class="w-20 h-1 bg-primary rounded mb-6"></div>
            </div>
            
            <p class="text-gray-700 max-w-sm text-sm leading-relaxed font-light md:font-normal">
                Лучшие локации Актау и области, отобранные для вашего комфортного пребывания в самом сердце Каспия.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            
          <div class="group relative bg-gray-100 rounded-[2rem] overflow-hidden shadow-md hover:shadow-[0_20px_50px_rgba(0,0,0,0.05)] transition-all duration-700 border border-gray-200">
{{--     
            <div class="absolute inset-0 pointer-events-none opacity-[0.09] group-hover:opacity-[0.08] transition-opacity duration-700" 
         style="background-image: url('/images/icon2.svg'); background-size: 200px; background-position:bottom; background-repeat: repeat;">
            </div> --}}

            <div class="relative z-10">
                <div class="relative h-72 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&q=80&w=800" alt="Hotel" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
                    <div class="absolute top-6 left-6 bg-white/90 backdrop-blur-sm px-4 py-1.5 rounded-full text-[9px] font-bold uppercase tracking-widest text-black shadow-sm">Отели</div>
                </div>
                
                <div class="p-8">
                    <div class="flex justify-between items-center mb-6">
                        <h4 class="text-2xl font-medium tracking-tight">Caspian World</h4>
                        <div class="flex items-center gap-1.5">
                            <span class="text-sm font-bold text-[#C5A367]">5.0</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 fill-[#C5A367]" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        </div>
                    </div>
                    
                    <div class="space-y-3 mb-8">
                        <p class="text-gray-900 text-sm flex items-center gap-3 font-light">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#C5A367]"></span> Вид на Каспийское море
                        </p>
                        <p class="text-gray-900 text-sm flex items-center gap-3 font-light">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#C5A367]"></span> Infinity бассейн
                        </p>
                        <p class="text-gray-900 text-sm flex items-center gap-3 font-light">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#C5A367]"></span> Атмосфера кочевников
                        </p>
                    </div>

                    <div class="flex items-center justify-between pt-6 border-t border-gray-100 flex-wrap">
                        <p class="text-xl font-light tracking-tighter">от 45.000 ₸</p>
                        <button class="group/btn relative overflow-hidden text-sm font-bold uppercase tracking-widest py-2">
                            <span class="relative z-10">Забронировать</span>
                            <div class="absolute bottom-0 left-0 w-full h-[1px] bg-black transition-all duration-300 group-hover/btn:h-[2px]"></div>
                        </button>
                    </div>
                </div>
            </div>
        </div>

          <div class="group relative bg-gray-100 rounded-[2rem] overflow-hidden shadow-md hover:shadow-[0_20px_50px_rgba(0,0,0,0.05)] transition-all duration-700 border border-gray-200">
                {{-- <div class="absolute inset-0 pointer-events-none opacity-[0.07] group-hover:opacity-[0.08] transition-opacity duration-700" 
         style="background-image: url('/images/icon.svg'); background-size: 200px; background-position:bottom; background-repeat: repeat;">
    </div> --}}
                <div class="relative h-72 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&q=80&w=800" alt="Restaurant" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
                    <div class="absolute top-6 left-6 bg-white/90 backdrop-blur-sm px-4 py-1.5 rounded-full text-[9px] font-bold uppercase tracking-widest text-black shadow-sm">Рестораны</div>
                </div>
                
                <div class="p-8">
                    <div class="flex justify-between items-center mb-6">
                        <h4 class="text-2xl font-medium tracking-tight">Lumia Cafe</h4>
                        <div class="flex items-center gap-1.5">
                            <span class="text-sm font-bold text-[#C5A367]">4.8</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 fill-[#C5A367]" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        </div>
                    </div>
                    
                    <div class="space-y-3 mb-8">
                        <p class="text-gray-900 text-sm flex items-center gap-3 font-light">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#C5A367]"></span> Национальная кухня
                        </p>
                        <p class="text-gray-900 text-sm flex items-center gap-3 font-light">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#C5A367]"></span> Атмосфера кочевников
                        </p>
                        <p class="text-gray-900 text-sm flex items-center gap-3 font-light">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#C5A367]"></span> Атмосфера кочевников
                        </p>
                    </div>

                    <div class="flex items-center justify-between pt-6 border-t border-gray-100 flex-wrap">
                        <p class="text-xl font-light tracking-tighter">~ 12.000 ₸</p>
                        <button class="group/btn relative overflow-hidden text-sm font-bold uppercase tracking-widest py-2">
                            <span class="relative z-10">Посмотреть меню</span>
                            <div class="absolute bottom-0 left-0 w-full h-[1px] bg-black transition-all duration-300 group-hover/btn:h-[2px]"></div>
                        </button>
                    </div>
                </div>
            </div>

            <div class="group relative bg-white rounded-[2rem] overflow-hidden border-2 border-dashed border-[#C5A367] flex flex-col items-center justify-center p-12 text-center hover:border-[#C5A367] transition-colors duration-500">
                <div class="absolute inset-0 pointer-events-none opacity-[0.05] group-hover:opacity-[0.08] transition-opacity duration-700" 
         style="background-image: url('/images/icon2.svg'); background-size: 200px; background-repeat: repeat;">
    </div>
                <div class="w-16 h-16 rounded-full bg-gray-200 flex items-center justify-center mb-6 group-hover:bg-[#C5A367] group-hover:text-white transition-all duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </div>
                <h4 class="text-xl font-medium mb-3 tracking-tight">Еще 20+ мест</h4>
                <p class="text-gray-400 text-sm font-light leading-relaxed mb-8">Базы отдыха, этно-аулы и скрытые жемчужины региона</p>
                <a href="#" class="text-[10px] font-bold uppercase tracking-[0.3em] text-black border-b border-black pb-1 hover:text-[#C5A367] hover:border-[#C5A367] transition-all">Открыть каталог</a>
            </div>

        </div>
    </div>
</section>
<div class="bg-gray-100 py-20 md:py-32 overflow-hidden relative">
    <div class="absolute left-[-5%] bottom-[10%] text-[15rem] font-bold text-black/[0.03] select-none pointer-events-none uppercase tracking-tighter">
        Mangystau
    </div>

    <div class="container mx-auto max-w-7xl px-6 relative z-10">
        <div class="flex flex-col lg:flex-row gap-16 items-start">
            
            <div class="w-full lg:w-1/3 lg:sticky lg:top-32 flex flex-col h-full">
                <span class="text-[10px] uppercase tracking-[0.4em] text-[#C5A367] font-bold mb-4 block">Уникальность края</span>
                
                <h2 class="font-title text-3xl md:text-4xl font-light text-gray-900 mb-6 leading-[1.1] uppercase tracking-tight">
                    Наши <br> <span class="font-bold text-primary italic">Преимущества</span>
                </h2>
                
            <div class="w-20 h-1 bg-primary rounded mb-6"></div>
                
                <p class="text-gray-600 text-lg leading-relaxed max-w-xs font-light mb-12">
                    Мы создаем экосистему, где природа Каспия и вековые традиции встречаются с современным комфортом.
                </p>

                <div class="hidden lg:flex items-center gap-6 mt-auto pt-10 border-t border-black/30">
                    <div class="text-4xl font-bold text-primary">362</div>
                    <div class="text-[10px] uppercase tracking-widest text-gray-400 font-medium leading-tight">
                        сакральных <br> объектов региона
                    </div>
                </div>
            </div>

<div class="w-full lg:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-6">
    
    <div class="group relative bg-white border border-gray-100 p-10 rounded-[2.5rem] shadow-sm hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
        <div class="absolute inset-0 opacity-[0.05] group-hover:opacity-[0.1] transition-opacity duration-500 pointer-events-none rounded-[2.5rem]"
             style="background-image: url('/images/icon.svg'); background-size: 180px; background-position: center; background-repeat: repeat;">
        </div>
        <div class="relative z-10">
            <div class="text-[3rem] font-bold text-primary/5 absolute -top-4 -right-2 transition-colors group-hover:text-[#C5A367]/10">01</div>
            <div class="w-12 h-12 bg-[#C5A367] text-white rounded-xl flex items-center justify-center mb-8 shadow-lg shadow-[#C5A367]/20">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </div>
            <h3 class="font-title text-xl font-bold mb-4 text-gray-800 uppercase tracking-wide">Сохранение природы</h3>
            <p class="text-gray-500 text-sm leading-relaxed font-light">Каспий и новые островки под нашим контролем — бережное отношение к экосистеме для будущих поколений.</p>
        </div>
    </div>

    <div class="group relative bg-white border border-gray-100 p-10 rounded-[2.5rem] shadow-sm hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
        <div class="absolute inset-0 opacity-[0.05] group-hover:opacity-[0.1] transition-opacity duration-500 pointer-events-none rounded-[2.5rem]"
             style="background-image: url('/images/icon.svg'); background-size: 180px; background-position: center; background-repeat: repeat;">
        </div>
        <div class="relative z-10">
            <div class="text-[3rem] font-bold text-primary/5 absolute -top-4 -right-2 transition-colors group-hover:text-[#C5A367]/10">02</div>
            <div class="w-12 h-12 bg-primary text-white rounded-xl flex items-center justify-center mb-8 shadow-lg shadow-primary/20">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <h3 class="font-title text-xl font-bold mb-4 text-gray-800 uppercase tracking-wide">Культурное наследие</h3>
            <p class="text-gray-500 text-sm leading-relaxed font-light">Мы глубоко изучаем и популяризируем сакральные памятники, историю и живые традиции Маңғыстау.</p>
        </div>
    </div>

    <div class="group relative bg-white border border-gray-100 p-10 rounded-[2.5rem] shadow-sm hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 md:col-span-2">
        <div class="absolute inset-0 opacity-[0.05] group-hover:opacity-[0.1] transition-opacity duration-500 pointer-events-none rounded-[2.5rem]"
             style="background-image: url('/images/icon.svg'); background-size: 180px; background-position: center; background-repeat: repeat;">
        </div>
        <div class="relative z-10 flex flex-col md:flex-row md:items-center gap-8">
            <div class="flex-shrink-0">
                <div class="text-[3rem] font-bold text-primary/5 absolute -top-4 -right-2 transition-colors group-hover:text-[#C5A367]/10">03</div>
                <div class="w-16 h-16 bg-[#C5A367]/10 text-[#C5A367] rounded-2xl flex items-center justify-center shadow-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.628.283a2 2 0 01-1.186.127l-2.431-.486a2 2 0 00-1.638.527l-1.138 1.138a2 2 0 00-.586 1.414v.33a2 2 0 002 2h12a2 2 0 002-2v-.33a2 2 0 00-.586-1.414l-1.138-1.138z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 3h6v6M10 14L21 3M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6" />
                    </svg>
                </div>
            </div>
            <div>
                <h3 class="font-title text-xl font-bold mb-2 text-gray-800 uppercase tracking-wide">Современные инициативы</h3>
                <p class="text-gray-500 text-base leading-relaxed font-light max-w-2xl">
                    Фестивали, мастер-классы и выставки развивают местное творчество, объединяя древние промыслы с современным искусством. Мы создаем платформу для нового поколения талантов региона.
                </p>
            </div>
        </div>
    </div>

</div>
        </div>
    </div>
</div>
<section class="relative w-full py-24 bg-white" id="attractions">
    <div class="container mx-auto px-6 max-w-7xl">
        
        <div class="mb-10">
            <span class="text-[10px] uppercase tracking-[0.4em] text-[#C5A367] font-bold mb-4 block">Духовные артефакты</span>
            <h2 class="font-title text-3xl md:text-4xl font-light text-gray-900 mb-6 uppercase tracking-tight">
                Наши <span class="font-bold text-primary">достояния</span>
            </h2>
            <div class="w-20 h-1 bg-primary rounded mb-6"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 auto-rows-[320px]">
            
            <div class="group relative overflow-hidden rounded-[2rem] shadow-sm hover:shadow-xl transition-all duration-500">
                <img src="images/boszhyra.jpg" alt="Бозжыра" class="w-full h-full object-cover transition-transform duration-[1.5s] group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-8 w-full">
                    <h3 class="text-white font-bold text-xl mb-1.5" data-lang="heritage1-title">Бозжыра</h3>
                    <p class="text-white/80 text-xs font-light leading-relaxed" data-lang="heritage1-desc">Инопланетные пейзажи меловых каньонов</p>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-[2rem] shadow-sm hover:shadow-xl transition-all duration-500 sm:col-span-2">
                <img src="images/heritages/sherqala.jpg" alt="Шеркала" class="w-full h-full object-cover transition-transform duration-[1.5s] group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-8 w-full">
                    <h3 class="text-white font-bold text-2xl mb-1.5" data-lang="heritage2-title">Шеркала</h3>
                    <p class="text-white/80 text-sm font-light leading-relaxed max-w-sm" data-lang="heritage2-desc">Священная гора, напоминающая юрту или спящего льва</p>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-[2rem] shadow-sm hover:shadow-xl transition-all duration-500">
                <img src="images/heritages/kok-kala.jpg" alt="Кок-кала" class="w-full h-full object-cover transition-transform duration-[1.5s] group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-8 w-full">
                    <h3 class="text-white font-bold text-xl mb-1.5" data-lang="heritage3-title">Кок-кала</h3>
                    <p class="text-white/80 text-xs font-light leading-relaxed" data-lang="heritage3-desc">Радужные глиняные разломы древнего океана</p>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-[2rem] shadow-sm hover:shadow-xl transition-all duration-500">
                <img src="images/heritages/sor.jpg" alt="Сор Тузбаир" class="w-full h-full object-cover transition-transform duration-[1.5s] group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-8 w-full">
                    <h3 class="text-white font-bold text-xl mb-1.5" data-lang="heritage4-title">Сор Тузбаир</h3>
                    <p class="text-white/80 text-xs font-light leading-relaxed" data-lang="heritage4-desc">Белоснежное соляное зеркало бесконечности</p>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-[2rem] shadow-sm hover:shadow-xl transition-all duration-500">
                <img src="images/heritages/kaspi.jpg" alt="Каспи" class="w-full h-full object-cover transition-transform duration-[1.5s] group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-8 w-full">
                    <h3 class="text-white font-bold text-xl mb-1.5" data-lang="heritage5-title">Каспий</h3>
                    <p class="text-white/80 text-xs font-light leading-relaxed" data-lang="heritage5-desc">Бирюзовые воды и дикие скалистые берега</p>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-[2rem] shadow-sm hover:shadow-xl transition-all duration-500 sm:col-span-2">
                <img src="images/heritages/kyzylkup.jpg" alt="Кызылкуп" class="w-full h-full object-cover transition-transform duration-[1.5s] group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-8 w-full">
                    <h3 class="text-white font-bold text-2xl mb-1.5" data-lang="heritage6-title">Кызылкуп</h3>
                    <p class="text-white/80 text-sm font-light leading-relaxed max-w-sm" data-lang="heritage6-desc">Тирамису-горы с полосатыми красно-белыми слоями</p>
                </div>
            </div>
            
        </div>
    </div>
</section>






{{-- <div class="bg-gray-100 py-20">
    <div class="container mx-auto max-w-5xl px-6">
    <h2 class="text-3xl font-bold mb-6 text-center">Почему важно сохранять Каспий и его новые берега?</h2>
    <div class="prose prose-lg max-w-none text-gray-800" style="text-align: justify;">
        <p>Каспийское море — это не просто водоём. Это сердце Маңғыстау, источник жизни, истории и вдохновения для людей, живущих у его берегов. Сегодня Каспий меняется: уровень воды снижается, появляются новые островки и песчаные косы, исчезают старые бухты.</p>
        <p>Эти перемены открывают перед нами неизвестные территории, но одновременно несут угрозу экосистемам и культурным памятникам, связанным с морем. Если не обратить внимание сейчас, мы можем потерять не только природную красоту, но и часть своей истории.</p>
        <p>Сохранение Каспия — это забота о будущем региона, о людях, которые веками жили в гармонии с морем, о природе, которая формирует нашу идентичность. Это возможность показать миру, как уникален и живописен Маңғыстау.</p>
        <p class="font-semibold">Берегите море — и оно сохранит нас. Каспий — это наша живая память и наше будущее.</p>
    </div>
</div> --}}

</div>


<div class="relative lg:hidden w-full overflow-hidden bg-slate-950">
    
    <div class="absolute inset-0 z-0">
        <img 
            src="{{ asset('images/boszhyra.jpg') }}" 
            alt="Фон" 
            class="w-full h-full object-cover filter blur-[2px] brightness-[0.4]" 
            style="object-position: bottom" 
        />
        <div class="absolute inset-0 bg-blue-950/60 mix-blend-multiply"></div>
    </div>

    <div class="relative z-10 px-6 py-12 border-t border-white/10">
        

        <div class="flex flex-col gap-10">
            
     


            <div class="space-y-6 mb-4">
                <label class="block text-white text-xs uppercase tracking-widest font-bold opacity-80">Поиск локаций</label>
                <div class="relative group">
                    <input 
                        type="text" 
                        placeholder="Куда отправимся?.." 
                        class="w-full bg-black/40 border border-white/10 rounded-2xl py-4 px-6 text-base text-white focus:outline-none focus:ring-1 focus:ring-blue-500/50 backdrop-blur-md transition-all placeholder:text-gray-600"
                    >
                    <button class="absolute right-4 top-1/2 -translate-y-1/2 text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shadow-sm" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
                
                <div class="flex flex-wrap gap-2">
                    <span class="text-[11px] font-medium text-gray-400 bg-black/30 border border-white/5 px-4 py-2 rounded-xl active:bg-blue-600 active:text-white transition-all">#каньоны</span>
                    <span class="text-[11px] font-medium text-gray-400 bg-black/30 border border-white/5 px-4 py-2 rounded-xl active:bg-blue-600 active:text-white transition-all">#пляжи</span>
                    <span class="text-[11px] font-medium text-gray-400 bg-black/30 border border-white/5 px-4 py-2 rounded-xl active:bg-blue-600 active:text-white transition-all">#святыни</span>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
{{-- 
<div class="bg-white py-16">
    <div class="container mx-auto max-w-6xl px-6">
        <h2 class="text-3xl font-bold text-center mb-8">Карта объектов культуры</h2>
        <div id="kzMap" class="w-full h-[500px] rounded-xl shadow"></div>
    </div>
</div> --}}



<div class="bg-gray-50 py-16" style="display: none ">
    <div class="container mx-auto max-w-3xl px-6">
        <h2 class="text-3xl font-bold mb-6 text-center text-primary">Обратная связь</h2>
        <form action="/" method="POST" class="bg-white rounded-3xl shadow-lg p-8 space-y-6" novalidate>
            @csrf
            <div>
                <label for="name" class="block mb-2 font-semibold text-gray-700">Имя</label>
                <input type="text" id="name" name="name" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" />
            </div>
            <div>
                <label for="email" class="block mb-2 font-semibold text-gray-700">Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" />
            </div>
            <div>
                <label for="message" class="block mb-2 font-semibold text-gray-700">Сообщение</label>
                <textarea id="message" name="message" rows="5" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
            </div>
            <button type="submit" class="bg-primary text-white font-semibold px-6 py-3 rounded-full hover:bg-primary-dark transition">
                Отправить
            </button>
        </form>
    </div>
</div>

<button id="btnScrollTop" aria-label="Наверх" style="font-size: 30px; padding:10px" 
    class="fixed bottom-8 right-8 bg-primary text-white rounded-full p-4 shadow-lg hover:bg-primary-dark transition opacity-0 pointer-events-none">
    ↑
</button>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script>
document.addEventListener("DOMContentLoaded", () => {
    ymaps.ready(() => {
        const map = new ymaps.Map("kzMap", {
            center: [48.0196, 66.9237],
            zoom: 5,
            controls: ["zoomControl"]
        });

        const cultures = @json($cultures);

        cultures.forEach(culture => {
            if (culture.latitude && culture.longitude) {
                const balloonContent = `
                    <strong>${culture.title}</strong><br>
                    <em>${culture.category.name}</em><br>
                    ${culture.description ? culture.description.substring(0, 200) + '...' : ''}
                    ${culture.image ? `<div style="margin-top: 8px;"><img src="http://127.0.0.1:8000/storage/${culture.image}" alt="${culture.title}" style="max-width: 160px; border-radius: 5px;"></div>` : ''}
                    <div style="margin-top: 10px;">
                        <a href="/cultures/${culture.id}" target="_blank" 
                        style="display:inline-block; padding: 6px 12px; background-color: #2563eb; color: white; border-radius: 6px; text-decoration: none; font-weight: 600; font-family: 'Montserrat', sans-serif;">
                        Подробнее
                        </a>
                    </div>
                `;

                const placemark = new ymaps.Placemark(
                    [culture.latitude, culture.longitude],
                    {
                        balloonContent: balloonContent,
                    },
                    {
                        preset: 'islands#icon',
                        iconColor: '#2563eb',
                        cursor: 'pointer'
                    }
                );

                placemark.events.add('click', () => {
                    const el = document.getElementById('culture-' + culture.id);
                    if (el) {
                        el.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        el.classList.add('ring', 'ring-primary', 'ring-offset-2');
                        setTimeout(() => el.classList.remove('ring', 'ring-primary', 'ring-offset-2'), 2000);
                    }
                });

                map.geoObjects.add(placemark);
            }
        });

    });

    const btnScrollTop = document.getElementById('btnScrollTop');
    window.addEventListener('scroll', () => {
        const show = window.scrollY > 300;
        btnScrollTop.classList.toggle('opacity-0', !show);
        btnScrollTop.classList.toggle('pointer-events-none', !show);
        btnScrollTop.classList.toggle('opacity-100', show);
    });

    btnScrollTop.addEventListener('click', () => {
        window.scrollTo({top: 0, behavior: 'smooth'});
    });
});
</script>

<style>
    ymaps {
        font-family: "Montserrat";
    }
@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(1.5rem);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}
.animate-fadeInUp {
    animation: fadeInUp 0.8s ease forwards;
}
.delay-300 {
    animation-delay: 0.3s;
}
.delay-600 {
    animation-delay: 0.6s;
}
</style>
@endsection
