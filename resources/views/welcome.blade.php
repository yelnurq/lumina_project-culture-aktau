@extends('layouts.app')



@section('content')
<div class="relative w-full h-[100svh] lg:h-[90vh] overflow-hidden">
    <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover z-0">
        <source src="{{ asset('media/video.mp4') }}" type="video/mp4" />
        Ваш браузер не поддерживает видео.
    </video>

    <div class="relative z-10 w-full h-full bg-primary/30 bg-gradient-to-r from-primary/30 to-blue-600/40 flex items-center">
        
        <div class="container mx-auto px-6">
            <div class="max-w-8xl">
                
                <h1 
                    class="mb-4 text-left text-3xl md:text-3xl lg:text-4xl font-extrabold text-white mb-4 leading-[1.1] opacity-0 translate-y-6 animate-fadeInUp"
                    data-lang="main-title"
                >
                    Новые берега Каспия<br class="hidden sm:block"> 
                    <span class="text-blue-400">—</span> неизвестная красота Маңғыстау
                </h1>

                <p 
                    class="text-left text-base md:text-xl text-white max-w-2xl mb-10 font-normal leading-relaxed opacity-0 translate-y-6 animate-fadeInUp delay-300"
                    data-lang="main-desc"
                >
                    Каспийское море отступает, открывая новые островки и дороги. Там, где раньше была вода — теперь просторы, полные жизни, света и тишины.
                </p>

                <div class="flex flex-col sm:flex-row items-stretch sm:items-start gap-4 opacity-0 translate-y-6 animate-fadeInUp delay-600">
                    <a 
                        href="/culture-list" 
                        data-lang="main-btn1"
                        class="inline-flex justify-center items-center bg-white text-black  px-8 py-4 rounded-2xl shadow-xl hover:scale-105 active:scale-95 transition-all text-base"
                    >
                        Проложить маршрут
                    </a>

                    <a 
                        href="/about"
                        data-lang="main-btn2"
                        class="inline-flex justify-center items-center border-2 border-white/50 backdrop-blur-md text-white px-8 py-4 rounded-2xl hover:bg-white hover:text-black transition-all text-base"
                    >
                        О проекте
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    /* Анимация появления, если её еще нет в вашем CSS */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(24px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-fadeInUp {
        animation: fadeInUp 0.8s ease-out forwards;
    }
    .delay-300 { animation-delay: 0.3s; }
    .delay-600 { animation-delay: 0.6s; }
</style>

<div class="bg-gray-100 py-20">
  <div class="container mx-auto max-w-7xl px-6 flex flex-col md:flex-row gap-16 items-start">
    
    <div class="md:w-1/2">
      <h2 class="text-3xl sm:text-3xl md:text-3xl lg:text-4xl font-bold text-primary mb-4 text-left md:text-left uppercase" data-lang="goal-title">НАША ЦЕЛЬ</h2>
      <div class="w-20 h-1 bg-primary rounded mb-6"></div>

      <div class="prose prose-sm text-gray-800" style="text-align: justify;">
        <p  data-lang="goal-desc1">Сохранение Каспийского моря и его новых берегов помогает защитить природу, культурное наследие и <span class="text-blue-900 font-semibold">будущее Маңғыстау</span>. Мы хотим показать уникальность региона и вдохновить людей беречь его богатства.</p>

        <p  data-lang="goal-desc2">Этот проект направлен на изучение и популяризацию всех новых островков и песчаных кос, чтобы каждый мог увидеть <span class="text-blue-900 font-semibold">красоту и значимость</span> Каспия.</p>
      </div>
            <a href="/about"  data-lang="goal-btn" class="inline-block bg-none text-primary font-600 px-6 sm:px-8 py-2 sm:py-3  hover:bg-primary hover:text-white transition opacity-0 translate-y-6 animate-fadeInUp delay-600 text-sm sm:text-base" style="border-radius: 16px;font-size:16px;font-weight:500; border:1px solid rgb(15 59 99); margin-top:30px;" >
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
      <h3 class="font-bold text-lg" data-lang="ayrakty-title"></h3>
      <p class="text-sm" data-lang="ayrakty-desc"></p>
    </div>
  </div>

  <div style="border-radius: 16px;" 
       class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300">
    <img src="/images/heritages/buhta.jpeg" alt="Голубая Бухта" 
         class="w-full h-64 object-cover">
    <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
      <h3 class="font-bold text-lg" data-lang="buhta-title"></h3>
      <p class="text-sm" data-lang="buhta-desc"></p>
    </div>
  </div>

  <div style="border-radius: 16px;" 
       class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300">
    <img src="/images/heritages/12.jpg" alt="Пещера Балаюк" 
         class="w-full h-64 object-cover">
    <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
      <h3 class="font-bold text-lg" data-lang="balayuk-title"></h3>
      <p class="text-sm" data-lang="balayuk-desc"></p>
    </div>
  </div>

</div>


  </div>
</div>

<div class="bg-white py-20">
    <div class="container mx-auto max-w-7xl px-6 flex flex-col md:flex-row gap-8">
        <div class="mb-0 md:mb-12">
            <h2
            class="w-full text-2xl sm:text-3xl md:text-3xl lg:text-4xl
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
                        <h3 class="text-xl font-semibold mb-1 text-gray-700" data-lang="adv1-title">Сохранение природы</h3>
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
                        <h3 class="text-xl font-semibold mb-1 text-gray-700" data-lang="adv2-title">Культурное наследие</h3>
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
                        <h3 class="text-xl font-semibold mb-1 text-gray-700" data-lang="adv3-title">Современные инициативы</h3>
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
                        <h3 class="text-xl font-semibold mb-1 text-gray-700" data-lang="adv4-title">Доступность информации</h3>
                        <p class="text-gray-700 text-sm" data-lang="adv4-desc">Онлайн-карта и экскурсии помогают каждому увидеть новые объекты Каспия.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
</div>
<section class=" relative w-full py-20 bg-gray-100" id="attractions">
<div class="container mx-auto px-6 max-w-7xl">
    <div class="mb-[2rem]">
        <h2
            class="w-full text-2xl sm:text-3xl md:text-3xl lg:text-4xl
                    font-bold text-primary mb-4 text-left uppercase
                    break-words whitespace-normal" data-lang="heritages-title">Наши достояния</h2>
        <div class="w-20 h-1 bg-primary rounded"></div>
    </div>

<div class="flex flex-col sm:grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 auto-rows-[300px]">
        <!-- Карточка 1 -->
        <div style="border-radius: 16px;" class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300">
            <img src="images/boszhyra.jpg" alt="Бозжыра" class="w-full h-full object-cover">
            <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
                <h3 class="font-bold text-lg" data-lang="heritage1-title">Бозжыра</h3>
                <p class="text-sm" data-lang="heritage1-desc">Удивительные скалы и каньоны Мангистау</p>
            </div>
        </div>

        <!-- Карточка 2 -->
        <div style="border-radius: 16px;" class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300 col-span-2">
            <img src="images/heritages/sherqala.jpg" alt="Шеркала" class="w-full h-full object-cover">
            <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
                <h3 class="font-bold text-lg" data-lang="heritage2-title">Шеркала</h3>
                <p class="text-sm" data-lang="heritage2-desc">Современный город на побережье Каспия</p>
            </div>
        </div>

        <!-- Карточка 3 -->
        <div style="border-radius: 16px;" class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300">
            <img src="images/heritages/kok-kala.jpg" alt="Кок-кала" class="w-full h-full object-cover">
            <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
                <h3 class="font-bold text-lg" data-lang="heritage3-title">Урочище Кок-кала</h3>
                <p class="text-sm" data-lang="heritage3-desc">Маленькое село с красивыми видами</p>
            </div>
        </div>

        <!-- Карточка 4 -->
        <div style="border-radius: 16px;" class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300">
            <img src="images/heritages/sor.jpg" alt="Сор Тузбаир" class="w-full h-full object-cover">
            <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
                <h3 class="font-bold text-lg" data-lang="heritage4-title">Сор Тузбаир</h3>
                <p class="text-sm" data-lang="heritage4-desc">Исторические памятники и скалы</p>
            </div>
        </div>

        <!-- Карточка 5 -->
        <div style="border-radius: 16px;" class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300">
            <img src="images/heritages/kaspi.jpg" alt="Каспи" class="w-full h-full object-cover">
            <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
                <h3 class="font-bold text-lg" data-lang="heritage5-title">Каспийское море</h3>
                <p class="text-sm" data-lang="heritage5-desc">Красивые холмы и живописные виды</p>
            </div>
        </div>

        <!-- Карточка 6 -->
        <div style="border-radius: 16px;" class="relative bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:scale-105 transform transition duration-300 col-span-2">
            <img src="images/heritages/kyzylkup.jpg" alt="Кызылкуп" class="w-full h-full object-cover">
            <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white p-4">
                <h3 class="font-bold text-lg" data-lang="heritage6-title">Урочище Кызылкуп</h3>
                <p class="text-sm" data-lang="heritage6-desc">Исторические маршруты через Мангистауские степи</p>
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




<div class="relative bg-primary text-white py-20 overflow-hidden">
    <!-- Фоновое изображение с blur и синим фильтром -->
    <div class="absolute inset-0">
        <img src="{{ asset('images/boszhyra.jpg') }}" alt="Фон" class="w-full h-full object-cover filter blur-sm brightness-75" style="object-position: bottom" />
        <div class="absolute inset-0 bg-blue-900 opacity-40"></div>
    </div>
<div class="relative container mx-auto max-w-7xl px-6 text-left md:text-center">
    <h2
            class="w-full text-2xl sm:text-3xl md:text-3xl lg:text-4xl
                    font-bold text-white mb-4 uppercase
                     whitespace-normal" data-lang="main-section-title">
        Новые берега Маңғыстау — открываем неизведанное
    </h2>
    <p class="text-md md:text-lg mb-10 max-w-3xl mx-auto font-light" data-lang="main-section-desc">
        Каспийское море отступает, создавая новые островки, песчаные косы и удивительные маршруты. Мы исследуем их, показываем красоту и рассказываем, как туда добраться.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left text-white">
        <div class="bg-white/10 rounded-lg p-6 backdrop-blur-sm">
            <h3 class="text-xl font-semibold mb-2" data-lang="feature1-title">Новые маршруты</h3>
            <p data-lang="feature1-desc">Показываем, как безопасно и интересно посетить недавно открывшиеся островки и побережья.</p>
        </div>
        <div class="bg-white/10 rounded-lg p-6 backdrop-blur-sm">
            <h3 class="text-xl font-semibold mb-2" data-lang="feature2-title">Природные чудеса</h3>
            <p data-lang="feature2-desc">Уникальные пейзажи, редкая флора и фауна — места, которые стоит увидеть своими глазами.</p>
        </div>
        <div class="bg-white/10 rounded-lg p-6 backdrop-blur-sm">
            <h3 class="text-xl font-semibold mb-2" data-lang="feature3-title">Исследования и фотографии</h3>
            <p data-lang="feature3-desc">Документируем изменения побережья, создаем фотогалереи и визуальные маршруты для путешественников.</p>
        </div>
    </div>

    <a href="/routes" class="mt-12 inline-block bg-white text-primary font-semibold px-8 py-3 shadow-lg hover:bg-gray-100 transition" style="border-radius: 14px;" data-lang="main-btn">
        Посмотреть маршруты и островки
    </a>
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
