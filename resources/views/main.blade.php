@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endsection
@section('content')
    <div class="scroll-progress">
        <div class="scroll-progress-bar"></div>
    </div>
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Профессиональный груминг салон для кошек и собак</h1>
                    <p class="subtitle">Лучший друг заслуживает лучшего ухода</p>
                    <a href="{{route('records.create')}}" class="appointment-button">Записаться</a>
                </div>
                <div class="hero-image">
                    <img src="{{ asset('images/22.png') }}" alt="Груминг для питомцев">
                </div>
            </div>
        </div>
    </section>
    <div class="scroll-dots">
        <div class="scroll-dot" data-section="0"></div>
        <div class="scroll-dot" data-section="1"></div>
        <div class="scroll-dot" data-section="2"></div>


    </div>
    <section class="dogo-section services-screen">
        <div class="dogo-text">
            <h2>Груминг - забота о вашем питомце</h2>
        </div>

        <div class="dogo-gallery">
            <!-- Левая колонка изображений -->
            <div class="gallery-column left-column">
                <div class="gallery-item">
                    <img src="{{ asset('images/one.png') }}" alt="Очищающие средства">
                </div>
                <div class="text-item">
                    <img src="{{ asset('images/ears.png') }}" alt="Чистка ушей">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('images/two.png') }}" alt="Шампунь">
                </div>
                <div class="text-item">
                    <img src="{{ asset('images/water.png') }}" alt="Водные процедуры">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('images/three.png') }}" alt="Кондиционер">
                </div>
                <div class="text-item">
                    <img src="{{ asset('images/shampoo.png') }}" alt="Шампунь">
                </div>
            </div>

            <!-- Центральное изображение -->
            <div class="center-image">
                <img src="{{ asset('images/dog.png') }}" alt="Уход за питомцем">
            </div>

            <!-- Правая колонка изображений -->
            <div class="gallery-column right-column">
                <div class="gallery-item">
                    <img src="{{ asset('images/four.png') }}" alt="Сушка">
                </div>
                <div class="text-item">
                    <img src="{{ asset('images/dry.png') }}" alt="Сушка">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('images/five.png') }}" alt="Сушка">
                </div>
                <div class="text-item">
                    <img src="{{ asset('images/cut.png') }}" alt="Стрижка">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('images/six.png') }}" alt="Эмоции">
                </div>
                <div class="text-item">
                    <img src="{{ asset('images/energy.png') }}" alt="Энергия">
                </div>
            </div>
        </div>
    </section>

        <section class="cat-section">
            <div class="cat-text">
                <h3>Отзывы наших клиентов</h3>
            </div>
            <div class="review-column">
            <div class="review-image">
                <img src="{{ asset('images/review1.png') }}" alt="отзыв1" class="review-image">
                <img src="{{ asset('images/review2.png') }}" alt="отзыв2" class="review-image">
                <img src="{{ asset('images/review3.png') }}" alt="отзыв3" class="review-image">
            </div>
        </div>
            <div class="cat-image">
                <img src="{{ asset('images/cat.png') }}" alt="Полноразмерное изображение" class="cat-image">
            </div>
            </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('section');
            const dots = document.querySelectorAll('.scroll-dot');
            const progressBar = document.querySelector('.scroll-progress-bar');
            let currentSection = 0;
            let isScrolling = false;
            let scrollTimeout;

            // Обновление активной точки и прогресс-бара
            function updateUI() {
                // Обновляем точки навигации
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentSection);
                });

                // Обновляем прогресс-бар
                const scrollPercentage = (currentSection / (sections.length - 1)) * 100;
                progressBar.style.width = `${scrollPercentage}%`;
            }

            // Плавный скролл к секции
            function scrollToSection(index) {
                if (index < 0 || index >= sections.length) return;

                currentSection = index;
                isScrolling = true;

                let offset = 0;
                if (index === 1) { // Для второй секции (индекс 1)
                    offset = 150; // Такой же отступ, как в CSS
                }

                window.scrollTo({
                    top: sections[index].offsetTop - offset,
                    behavior: 'smooth'
                });

                updateUI();

                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(() => {
                    isScrolling = false;
                }, 800);
            }

            // Обработчик колеса мыши
            window.addEventListener('wheel', (e) => {
                if (isScrolling) return;

                if (e.deltaY > 0 && currentSection < sections.length - 1) {
                    scrollToSection(currentSection + 1);
                } else if (e.deltaY < 0 && currentSection > 0) {
                    scrollToSection(currentSection - 1);
                }
            }, { passive: false });

            // Обработчик касаний для мобильных устройств
            let touchStartY = 0;
            window.addEventListener('touchstart', (e) => {
                touchStartY = e.touches[0].clientY;
            }, { passive: true });

            window.addEventListener('touchend', (e) => {
                if (isScrolling) return;

                const touchEndY = e.changedTouches[0].clientY;
                const diff = touchStartY - touchEndY;

                if (Math.abs(diff) > 50) { // Порог для срабатывания
                    if (diff > 0 && currentSection < sections.length - 1) {
                        scrollToSection(currentSection + 1);
                    } else if (diff < 0 && currentSection > 0) {
                        scrollToSection(currentSection - 1);
                    }
                }
            }, { passive: true });

            // Клик по точкам навигации
            dots.forEach(dot => {
                dot.addEventListener('click', () => {
                    const sectionIndex = parseInt(dot.getAttribute('data-section'));
                    scrollToSection(sectionIndex);
                });
            });

            // Обновление при загрузке
            updateUI();

            // Обновление при ручном скролле
            window.addEventListener('scroll', () => {
                if (isScrolling) return;

                const scrollPosition = window.scrollY + (window.innerHeight / 2);
                const offset = 80; // Совпадает с margin-bottom

                sections.forEach((section, index) => {
                    const sectionTop = section.offsetTop - (index > 0 ? offset : 0);
                    const sectionBottom = sectionTop + section.offsetHeight;

                    if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                        currentSection = index;
                        updateUI();
                    }
                });
            });
        });
    </script>
@endsection
