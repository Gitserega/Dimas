<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Paws - Груминг для кошек и собак</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
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
        </nav>
        <button class="menu-toggle" id="menuToggle">☰</button>
    </div>
    <div class="mobile-menu" id="mobileMenu">
        <a href="{{ route('records.create') }}" class="mobile-nav-link">Услуги</a>
        <a href="{{ route('records.index') }}" class="mobile-nav-link">Запись</a>
        <a href="{{ route('contact.index') }}" class="mobile-nav-link">О нас</a>
    </div>
</header>

<main class="main-content">
    @yield('content')
</main>

<script>
    document.getElementById('menuToggle').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobileMenu');
        const isActive = mobileMenu.classList.toggle('active');

        this.textContent = isActive ? '✕' : '☰';

        document.body.style.overflow = isActive ? 'hidden' : '';
    });

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
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
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


    @yield('footer')
</footer>
</html>

