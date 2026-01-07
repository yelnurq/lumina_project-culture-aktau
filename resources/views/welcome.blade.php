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

                    <div class="flex flex-col sm:flex-row items-stretch sm:items-start gap-4 opacity-0 translate-y-6 animate-fadeInUp delay-600">
                        <a href="/culture-list" class="text-[14px] md:text-md inline-flex justify-center items-center bg-white text-black font-bold px-8 py-4 rounded-2xl shadow-xl hover:scale-105 active:scale-95 transition-all">
                            Проложить маршрут
                        </a>
                        <a href="/about" class="hidden md:flex shadow backdrop-blur-lg bg-black/40 text-[14px] md:text-md inline-flex justify-center items-center text-white font-bold px-8 py-4 rounded-2xl hover:bg-white hover:text-black transition-all">
                            О проекте
                        </a>
                    </div>
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
                                    class="w-full bg-black/40 border border-white/20 rounded-2xl py-3.5 px-5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:bg-black/60 transition-all placeholder:text-gray-500"
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
<div class="bg-gray-100 py-20">
  <div class="container mx-auto max-w-7xl px-6 flex flex-col md:flex-row gap-8 md:gap-16 items-start">
    
    <div class="md:w-1/2">
        <span class="text-[10px] uppercase tracking-[0.4em] text-[#C5A367] font-bold mb-4 block">Вектор развития</span>

      <h2 class="font-title text-2xl md:text-3xl font-bold text-primary mb-4 text-left md:text-left uppercase" data-lang="goal-title">НАША ЦЕЛЬ</h2>
      <div class="w-20 h-1 bg-primary rounded mb-6"></div>

      <div class="prose prose-sm text-gray-800" style="text-align: left;">
        <p class="text-md" data-lang="goal-desc1">Сохранение Каспийского моря и его новых берегов помогает защитить природу, культурное наследие и <span class="text-blue-900 font-semibold">будущее Маңғыстау</span>. Мы хотим показать уникальность региона и вдохновить людей беречь его богатства.</p>

        <p class="text-md" data-lang="goal-desc2">Этот проект направлен на изучение и популяризацию всех новых островков и песчаных кос, чтобы каждый мог увидеть <span class="text-blue-900 font-semibold">красоту и значимость</span> Каспия.</p>
      </div>

            <a href="/about"  data-lang="goal-btn" class="hidden md:inline-block bg-none text-primary font-600 px-6 sm:px-8 py-2 sm:py-3  hover:bg-primary hover:text-white transition opacity-0 translate-y-6 animate-fadeInUp delay-600 text-sm sm:text-base" style="border-radius: 16px;font-size:16px;font-weight:500; border:1px solid rgb(15 59 99); margin-top:30px;" >
                Ознакомиться
            </a>
    </div>

    <div id="heritage-container" 
     class="w-full md:w-1/2 grid grid-cols-1 sm:grid-cols-2 gap-4">

  <div style="border-radius: 16px;" 
       class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300 sm:row-span-2">
    <img src="/images/heritages/airakty.jpg" alt="Долина замков Айракты" 
         class="w-full h-64 sm:h-full object-cover">
    <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
      <h3 class="font-title font-bold text-md" data-lang="ayrakty-title"></h3>
      <p class="text-xs text-gray-200" data-lang="ayrakty-desc"></p>
    </div>
  </div>

  <div style="border-radius: 16px;" 
       class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300">
    <img src="/images/heritages/buhta.jpeg" alt="Голубая Бухта" 
         class="w-full h-64 object-cover">
    <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
      <h3 class="font-title font-bold text-md" data-lang="buhta-title"></h3>
      <p class="text-xs text-gray-200" data-lang="buhta-desc"></p>
    </div>
  </div>

  <div style="border-radius: 16px;" 
       class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300">
    <img src="/images/heritages/12.jpg" alt="Пещера Балаюк" 
         class="w-full h-64 object-cover">
    <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
      <h3 class="font-title font-bold text-md" data-lang="balayuk-title"></h3>
      <p class="text-xs text-gray-200" data-lang="balayuk-desc"></p>
    </div>
  </div>

</div>


  </div>
</div>
<section class="py-24 bg-white text-[#1A1A1A] overflow-hidden">
    <div class="container mx-auto px-6">
        
        <div class="flex flex-col md:flex-row justify-between md:items-end mb-16 md:gap-8">
            <div class="max-w-xl">
                <span class="text-[10px] uppercase tracking-[0.4em] text-[#C5A367] font-bold mb-4 block">Инфраструктура</span>
                <h2 class="font-title text-2xl md:text-3xl font-bold text-primary mb-4 text-left md:text-left uppercase leading-tight tracking-tight">
                    Где остановиться <br> <span class="font-sans italic font-light text-primary">& вкусно поесть</span>
                </h2>
                <div class="w-20 h-1 bg-primary rounded mb-6"></div>
            </div>

            <p class="text-gray-700 max-w-sm text-sm leading-relaxed font-light">
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
                        <h4 class="text-2xl font-medium tracking-tight">Caspian Riviera</h4>
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

                    <div class="flex items-center justify-between pt-6 border-t border-gray-100">
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
                        <h4 class="text-2xl font-medium tracking-tight">Aidala</h4>
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

                    <div class="flex items-center justify-between pt-6 border-t border-gray-100">
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
<div class="bg-gray-100 py-12 md:py-20">
    <div class="container mx-auto max-w-7xl px-6 flex flex-col md:flex-row gap-8">
        <div class="mb-0 md:mb-12">
        <span class="text-[10px] uppercase tracking-[0.4em] text-[#C5A367] font-bold mb-4 block">Уникальность края</span>

            <h2
            class="font-title w-full text-2xl md:text-3xl 
                    font-bold text-primary mb-4 text-left uppercase
                    break-words whitespace-normal"
            data-lang="advantages-title"
            >
            Наши преимущества
            </h2>
            <div class="w-20 h-1 bg-primary rounded"></div>
        </div>

        <div class="flex flex-col md:flex-row gap-8">
            <div class="flex-1 flex flex-col gap-6">
                
                <div class="relative bg-gray-50 p-6 rounded-xl shadow hover:shadow-lg transition flex-1 flex items-start gap-4">
                    
                    <div>
                           <div class="absolute inset-0"
                                style="
                                    background-image: url('/images/icon.svg');
                                    background-repeat: no-repeat;
                                    background-position: top -25px right -70px;
                                    background-size: 200px auto;
                                    opacity: 0.1;
                                    pointer-events: none;
                                ">
                            </div>
                        <h3 class="font-title text-md md:text-lg font-semibold mb-1 text-gray-800" data-lang="adv1-title">Сохранение природы</h3>
                        <p class="text-gray-700 text-sm" data-lang="adv1-desc">Каспий и новые островки под нашим контролем — для будущих поколений.</p>
                    </div>
                </div>

                <div class="relative bg-gray-50 p-6 rounded-xl shadow hover:shadow-lg transition flex-1 flex items-start gap-4">
                    <div>
                        <div class="absolute inset-0"
                                style="
                                    background-image: url('/images/icon.svg');
                                    background-repeat: no-repeat;
                                    background-position: top -25px left -70px;
                                    background-size: 200px auto;
                                    opacity: 0.1;
                                    pointer-events: none;
                                ">
                            </div>
                        <h3 class="font-title text-md md:text-lg font-semibold mb-1 text-gray-800" data-lang="adv2-title">Культурное наследие</h3>
                        <p class="text-gray-700 text-sm" data-lang="adv2-desc">Изучаем и популяризируем памятники, историю и традиции Маңғыстау.</p>
                    </div>
                </div>
            </div>

            <div class="flex-1 flex flex-col gap-6">
                <div class="relative bg-gray-50 p-6 rounded-xl shadow hover:shadow-lg transition flex-1 flex items-start gap-4">
                    <div>
                        <div class="absolute inset-0"
                                style="
                                    background-image: url('/images/icon.svg');
                                    background-repeat: no-repeat;
                                    background-position: top -25px right -70px;
                                    background-size: 200px auto;
                                    opacity: 0.1;
                                    pointer-events: none;
                                ">
                            </div>
                        <h3 class="font-title text-md md:text-lg font-semibold mb-1 text-gray-800" data-lang="adv3-title">Современные инициативы</h3>
                        <p class="text-gray-700 text-sm" data-lang="adv3-desc">Фестивали, мастер-классы и выставки развивают местное творчество.</p>
                    </div>
                </div>

                <div class="relative bg-gray-50 p-6 rounded-xl shadow hover:shadow-lg transition flex-1 flex items-start gap-4">
                    <div>
                        <div class="absolute inset-0"
                                style="
                                    background-image: url('/images/icon.svg');
                                    background-repeat: no-repeat;
                                    background-position: top -25px left -70px;
                                    background-size: 200px auto;
                                    opacity: 0.1;
                                    pointer-events: none;
                                ">
                            </div>
                        <h3 class="font-title text-md md:text-lg font-semibold mb-1 text-gray-800" data-lang="adv4-title">Доступность информации</h3>
                        <p class="text-gray-700 text-sm" data-lang="adv4-desc">Онлайн-карта и экскурсии помогают каждому увидеть новые объекты Каспия.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
</div>

<section class=" relative w-full py-20 bg-white" id="attractions">
<div class="container mx-auto px-6 max-w-7xl">
    <div class="mb-[2rem]">
        <span class="text-[10px] uppercase tracking-[0.4em] text-[#C5A367] font-bold mb-4 block">Духовные артефакты</span>
        
        <h2
            class="font-title w-full text-2xl md:text-3xl 
                    font-bold text-primary mb-4 text-left uppercase
                    break-words whitespace-normal" data-lang="heritages-title">Наши достояния</h2>
        <div class="w-20 h-1 bg-primary rounded"></div>
    </div>

<div class="flex flex-col sm:grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 auto-rows-[300px]">
        <!-- Карточка 1 -->
        <div style="border-radius: 16px;" class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300">
            <img src="images/boszhyra.jpg" alt="Бозжыра" class="w-full h-full object-cover">
            <div class="absolute bottom-0 left-0 right-0 bg-black/60 text-white p-4">
                <h3 class="font-title font-bold text-md" data-lang="heritage1-title">Бозжыра</h3>
                <p class="text-xs text-gray-200" data-lang="heritage1-desc">Удивительные скалы и каньоны Мангистау</p>
            </div>
        </div>

        <!-- Карточка 2 -->
        <div style="border-radius: 16px;" class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300 col-span-2">
            <img src="images/heritages/sherqala.jpg" alt="Шеркала" class="w-full h-full object-cover">
            <div class="absolute bottom-0 left-0 right-0 bg-black/60 text-white p-4">
                <h3 class="font-title font-bold text-md" data-lang="heritage2-title">Шеркала</h3>
                <p class="text-xs text-gray-200" data-lang="heritage2-desc">Современный город на побережье Каспия</p>
            </div>
        </div>

        <!-- Карточка 3 -->
        <div style="border-radius: 16px;" class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300">
            <img src="images/heritages/kok-kala.jpg" alt="Кок-кала" class="w-full h-full object-cover">
            <div class="absolute bottom-0 left-0 right-0 bg-black/60 text-white p-4">
                <h3 class="font-title font-bold text-md" data-lang="heritage3-title">Урочище Кок-кала</h3>
                <p class="text-xs text-gray-200" data-lang="heritage3-desc">Маленькое село с красивыми видами</p>
            </div>
        </div>

        <!-- Карточка 4 -->
        <div style="border-radius: 16px;" class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300">
            <img src="images/heritages/sor.jpg" alt="Сор Тузбаир" class="w-full h-full object-cover">
            <div class="absolute bottom-0 left-0 right-0 bg-black/60 text-white p-4">
                <h3 class="font-title font-bold text-md" data-lang="heritage4-title">Сор Тузбаир</h3>
                <p class="text-xs text-gray-200" data-lang="heritage4-desc">Исторические памятники и скалы</p>
            </div>
        </div>

        <!-- Карточка 5 -->
        <div style="border-radius: 16px;" class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300">
            <img src="images/heritages/kaspi.jpg" alt="Каспи" class="w-full h-full object-cover">
            <div class="absolute bottom-0 left-0 right-0 bg-black/60 text-white p-4">
                <h3 class="font-title font-bold md:text-md" data-lang="heritage5-title">Каспийское море</h3>
                <p class="text-xs text-gray-200" data-lang="heritage5-desc">Красивые холмы и живописные виды</p>
            </div>
        </div>

        <!-- Карточка 6 -->
        <div style="border-radius: 16px;" class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300 col-span-2">
            <img src="images/heritages/kyzylkup.jpg" alt="Кызылкуп" class="w-full h-full object-cover">
            <div class="absolute bottom-0 left-0 right-0 bg-black/60 text-white p-4">
                <h3 class="font-title font-bold text-md" data-lang="heritage6-title">Урочище Кызылкуп</h3>
                <p class="text-xs text-gray-200" data-lang="heritage6-desc">Исторические маршруты через Мангистауские степи</p>
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
