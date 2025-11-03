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
    "balayuk-desc": "Прекрасное место для отдыха"
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
    "balayuk-desc": "A perfect place to relax"
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
    "balayuk-desc": "Демалуға тамаша орын"
  }
};

function setLang(lang) {
  // обновляем текст на странице
  document.querySelectorAll("[data-lang]").forEach(el => {
    const key = el.getAttribute("data-lang");
    if (translations[lang][key]) {
      el.textContent = translations[lang][key];
    }
  });

  // сохраняем язык в localStorage
  localStorage.setItem("lang", lang);

  // подсвечиваем активную кнопку
  document.querySelectorAll(".lang-btn").forEach(btn => btn.classList.remove("text-accent", "font-bold"));
  const btn = document.querySelector(`#btn-${lang}`);
  if (btn) btn.classList.add("text-accent", "font-bold");
}

// при загрузке страницы
document.addEventListener("DOMContentLoaded", () => {
  const savedLang = localStorage.getItem("lang") || "ru";
  setLang(savedLang);
});
