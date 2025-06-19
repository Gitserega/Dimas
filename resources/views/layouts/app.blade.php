<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Paws - Груминг для кошек и собак</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">
    <style>
        /* Основные стили */
        body {
            font-family: 'Montserrat', sans-serif;
            color: var(--text);
            line-height: 1.6;
            margin: 0;
            padding: 0;
            padding-top: 56px; /* Отступ для мобильного хедера */
        }

        /* Стили для фиксированного хедера */
        .site-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(8px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 8px 0;
        }

        /* Контейнер для содержимого хедера */
        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Логотип */
        .logo {
            font-size: 20px;
            font-weight: bold;
            color: #e88409;
            text-decoration: none;
            white-space: nowrap;
        }

        /* Горизонтальное меню - только для десктопа */
        .main-nav {
            display: flex;
            gap: 15px;
        }

        .nav-link {
            text-decoration: none;
            color: #0a0a0a;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s;
            padding: 6px 12px;
            border-radius: 4px;
            white-space: nowrap;
        }

        .nav-link:hover {
            background: rgba(232, 132, 9, 0.1);
            color: #e88409;
        }

        /* Кнопка бургер меню - только для мобильных */
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #e88409;
            padding: 5px 10px;
        }

        /* Мобильное меню */
        .mobile-menu {
            display: none;
            width: 100%;
            background: white;
            padding: 0;
            position: absolute;
            left: 0;
            top: 56px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .mobile-menu.active {
            display: block;
        }

        .mobile-nav-link {
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
            border-bottom: 1px solid #f5f5f5;
            transition: all 0.2s;
        }

        .mobile-nav-link:hover {
            background: #f9f9f9;
            color: #e88409;
            padding-left: 25px;
        }

        /* Медиа-запросы для мобильных устройств */
        @media (max-width: 768px) {
            .main-nav {
                display: none !important; /* Полностью скрываем обычное меню */
            }

            .menu-toggle {
                display: block; /* Показываем бургер-меню */
            }
        }

        /* Стили для десктопа */
        @media (min-width: 769px) {
            .mobile-menu {
                display: none !important; /* Скрываем мобильное меню на десктопе */
            }

            .menu-toggle {
                display: none !important; /* Скрываем бургер на десктопе */
            }
        }
    </style>
    @yield('head')
</head>
<body>
<header class="site-header">
    <div class="header-container">
        <a href="{{ route('main.index') }}" class="logo">Elite Paws</a>
        <nav class="main-nav">
            <a href="{{ route('records.create') }}" class="nav-link">Услуги</a>
            <a href="{{ route('records.index') }}" class="nav-link">Запись</a>
            <a href="{{ route('contact.index') }}" class="nav-link">О нас</a>
            <a href="{{ route('service.index') }}" class="nav-link">Контакты</a>
        </nav>
        <button class="menu-toggle" id="menuToggle">☰</button>
    </div>
    <div class="mobile-menu" id="mobileMenu">
        <a href="{{ route('records.create') }}" class="mobile-nav-link">Услуги</a>
        <a href="{{ route('records.index') }}" class="mobile-nav-link">Запись</a>
        <a href="{{ route('contact.index') }}" class="mobile-nav-link">О нас</a>
        <a href="{{ route('service.index') }}" class="mobile-nav-link">Контакты</a>
    </div>
</header>

<main class="main-content">
    @yield('content')
</main>

<script>
    // Скрипт для работы мобильного меню
    document.getElementById('menuToggle').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobileMenu');
        const isActive = mobileMenu.classList.toggle('active');

        // Меняем иконку бургера на крестик и обратно
        this.textContent = isActive ? '✕' : '☰';

        // Блокируем/разблокируем скролл страницы при открытом меню
        document.body.style.overflow = isActive ? 'hidden' : '';
    });

    // Закрываем меню при клике на пункт
    document.querySelectorAll('.mobile-nav-link').forEach(link => {
        link.addEventListener('click', () => {
            document.getElementById('mobileMenu').classList.remove('active');
            document.getElementById('menuToggle').textContent = '☰';
            document.body.style.overflow = '';
        });
    });
</script>
</body>
</html>
<footer>
    <div class="container">
        <div class="footer__grid">
            <div class="footer__contacts">
                <h3 class="footer__title">Контакты</h3>
                <p class="footer__text">7 (912) 345–67–89</p>
                <p class="footer__text">г. Челябинск, ул. Пушкистая, 15</p>
                <p class="footer__text">Email: hello@elitepaws.ru</p>
                <p class="footer__text">Часы работы:<br>Пн-Пт: 10:00–20:00<br>Сб-Вс: 9:00–18:00</p>
            </div>

            <div class="footer__social">
                <h3 class="footer__title">Соцсети – следите за нами!</h3>
                <div class="social-links">
                    <a href="#" class="social-link">ВКонтакте</a>
                    <a href="#" class="social-link">Instagram</a>
                    <a href="#" class="social-link">Telegram</a>
                </div>
            </div>
        </div>

        <div class="footer__copyright">
            © 2025 ElitePaws. Все права защищены.
        </div>
    </div>
<style>

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
}


.footer__grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 1.5rem;
    border-top: 1px solid rgba(235, 141, 11, 0.937);
    padding-top: 2rem;
}

/* Стили для блока контактов */
.footer__contacts {
    max-width: 350px;
}

/* Стили для блока соцсетей */
.footer__social {
    max-width: 350px;
    margin-left: auto;
}

.footer__title {
    font-family: 'Roboto Slab', serif;
    font-size: 1.2rem;
    margin-bottom: 0.8rem;
    color: var(--secondary);
}

.footer__text {
    margin-bottom: 0.4rem;
    font-size: 0.9rem;
    line-height: 1.4;
}

/* Стили для соцсетей */
.social-links {
    display: flex;
    flex-wrap: wrap;
    gap: 0.8rem;
    margin-top: 0.5rem;
}

.social-link {
    color: rgb(5, 5, 5);
    text-decoration: none;
    transition: color 0.3s;
    font-size: 0.9rem;
}

.social-link:hover {
    color: var(--secondary);
}

.footer__copyright {
    text-align: center;
    padding-top: 2rem;
    border-top: 1px solid rgba(235, 141, 11, 0.937);
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    min-height: 80px;
    box-sizing: border-box;
}


    .location-header h1 {
        font-size: 2.5rem;
        color: #2c3e50;
        margin-bottom: 15px;
    }

    .location-header p {
        font-size: 1.1rem;
        color: #7f8c8d;
        max-width: 700px;
        margin: 0 auto;
    }

    .map-error p {
        font-size: 1.2rem;
        margin-bottom: 20px;
    }
    .contact-card h3 {
        color: #2c3e50;
        margin-bottom: 15px;
        font-size: 1.3rem;
    }

    .contact-card p {
        color: #7f8c8d;
        line-height: 1.6;
    }

    @media (max-width: 768px) {
        .location-header h1 {
            font-size: 2rem;
        }
    }
    </style>




<style>
  .alert-danger ul {
      padding-left: 20px;
      margin-bottom: 0;
  }
  </style>
<style>
    body {
        background-image: url('/images/paws-background.png');
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
    }
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(255, 255, 255, 0.85);
        z-index: -1;
    }

  .alert-danger ul {
      padding-left: 20px;
      margin-bottom: 0;
  }
</style>

    @yield('footer')
</footer>
</html>

