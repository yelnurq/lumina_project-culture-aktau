// lang.js

const translations = {
  ru: {
    "nav-home": "Главная",
    "nav-culture": "Объекты культуры",
    "nav-news": "Новости",
    "nav-contacts": "Контакты",
    "nav-admin": "Админ-панель",
    "nav-logout": "Выйти",
    "ayrakty-title": "Долина замков Айракты",
    "ayrakty-desc": "Живописные скалы и каньоны",
    "buhta-title": "Голубая Бухта",
    "buhta-desc": "Современный город на побережье Каспия",
    "balayuk-title": "Пещера Балаюк",
    "balayuk-desc": "Прекрасное место для отдыха",
     "main-title": "Новые берега Каспия<br> — неизвестная красота Маңғыстау",
    "main-desc": "Каспийское море отступает, открывая новые островки и дороги.  Там, где раньше была вода — теперь просторы, полные жизни, света и тишины.  Мы показываем, как туда добраться и почему эти места стоит увидеть своими глазами.",
    "main-btn1": "Проложить маршрут",
    "main-btn2": "О проекте",
     "goal-title": "НАША ЦЕЛЬ",
  "goal-desc1": "Сохранение Каспийского моря и его новых берегов помогает защитить природу, культурное наследие и <span class=\"text-blue-900 font-semibold\">будущее Маңғыстау</span>. Мы хотим показать уникальность региона и вдохновить людей беречь его богатства.",
  "goal-desc2": "Этот проект направлен на изучение и популяризацию всех новых островков и песчаных кос, чтобы каждый мог увидеть <span class=\"text-blue-900 font-semibold\">красоту и значимость</span> Каспия.",
  "goal-btn": "Ознакомиться",
  },
  en: {
    "nav-home": "Home",
    "nav-culture": "Cultural Sites",
    "nav-news": "News",
    "nav-contacts": "Contacts",
    "nav-admin": "Admin Panel",
    "nav-logout": "Logout",
    "ayrakty-title": "Airakty Castle Valley",
    "ayrakty-desc": "Picturesque cliffs and canyons",
    "buhta-title": "Blue Bay",
    "buhta-desc": "A modern city on the Caspian coast",
    "balayuk-title": "Balayuk Cave",
    "balayuk-desc": "A perfect place to relax",
       "main-title": "New Shores of the Caspian<br> — the Unknown Beauty of Mangystau",
    "main-desc": "The Caspian Sea is receding, revealing new islands and roads. Where water once was — now expanses full of life, light, and silence. We show how to get there and why these places are worth seeing with your own eyes.",
    "main-btn1": "Plan Route",
    "main-btn2": "About the Project",
     "goal-title": "OUR GOAL",
  "goal-desc1": "Preserving the Caspian Sea and its new shores helps protect nature, cultural heritage, and <span class=\"text-blue-900 font-semibold\">the future of Mangystau</span>. We aim to showcase the region's uniqueness and inspire people to cherish its treasures.",
  "goal-desc2": "This project focuses on exploring and promoting all new islets and sandy spits so that everyone can see the <span class=\"text-blue-900 font-semibold\">beauty and significance</span> of the Caspian.",
  "goal-btn": "Learn More"
  },
  kk: {
    "nav-home": "Басты бет",
    "nav-culture": "Мәдени нысандар",
    "nav-news": "Жаңалықтар",
    "nav-contacts": "Байланыс",
    "nav-admin": "Әкімші панелі",
    "nav-logout": "Шығу",
    "ayrakty-title": "Айрақты қамалдар аңғары",
    "ayrakty-desc": "Әсем жартастар мен шатқалдар",
    "buhta-title": "Көк шығанағы",
    "buhta-desc": "Каспий жағалауындағы заманауи қала",
    "balayuk-title": "Балаюк үңгірі",
    "balayuk-desc": "Демалуға тамаша орын",
        "main-title": "Каспийдің жаңа жағалаулары<br> — Маңғыстаудың белгісіз сұлулығы",
    "main-desc": "Каспий теңізі шегініп, жаңа аралдар мен жолдарды ашады. Бұрын су болған жерде — қазір өмірге, жарыққа және тыныштыққа толы кеңістіктер бар. Біз сол жерге қалай жетуге болатынын және неліктен осы жерлерді өз көзіңізбен көруге тиіс екеніңізді көрсетеміз.",
    "main-btn1": "Маршрут жасау",
    "main-btn2": "Жоба туралы",
      "goal-title": "БІЗДІҢ МАҚСАТЫМЫЗ",
  "goal-desc1": "Каспий теңізін және оның жаңа жағалауларын сақтау табиғатты, мәдени мұраны және <span class=\"text-blue-900 font-semibold\">Маңғыстаудың болашағын</span> қорғауға көмектеседі. Біз аймақтың бірегейлігін көрсету және адамдарды оның байлықтарын бағалауға шабыттандыруды мақсат етеміз.",
  "goal-desc2": "Бұл жоба барлық жаңа аралдар мен құмды жағалауларды зерттеу және насихаттауға бағытталған, сол арқылы әркім Каспийдің <span class=\"text-blue-900 font-semibold\">сұлулығы мен мәнін</span> көре алады.",
  "goal-btn": "Танысу"
  }
};

function setLang(lang) {
  document.querySelectorAll("[data-lang]").forEach(el => {
    const key = el.getAttribute("data-lang");
    if (translations[lang][key]) {
      if (key.includes("title") || key.includes("desc")) {
        el.innerHTML = translations[lang][key]; // чтобы <br> работал
      } else {
        el.textContent = translations[lang][key];
      }
    }
  });

  localStorage.setItem("lang", lang);

  document.querySelectorAll(".lang-btn").forEach(btn => btn.classList.remove("text-accent", "font-bold"));
  const btn = document.querySelector(`#btn-${lang}`);
  if (btn) btn.classList.add("text-accent", "font-bold");
}


// при загрузке страницы
document.addEventListener("DOMContentLoaded", () => {
  const savedLang = localStorage.getItem("lang") || "ru";
  setLang(savedLang);
});
