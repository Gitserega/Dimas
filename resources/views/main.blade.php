@extends('layouts.app')
@section('head')

@endsection
@section('content')
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Профессиональный груминг салон для кошек и собак</h1>
                    <p class="subtitle">Лучший друг заслуживает лучшего ухода</p>
                </div>
                <div class="hero-image">
                    <img src="{{ asset('images/22.png') }}" alt="Груминг для питомцев">
                </div>
            </div>
        </div>
    </section>

    <section class="dogo-section">
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

    <style>

.dogo-section {
    padding: 35px 0;
    background-color: #f9f9f9;
}

.dogo-text h2 {
    text-align: center;
    margin-bottom: 40px;
    color: #333;
}

.dogo-gallery {
    display: flex;
    justify-content: center;
    gap: 20px;
    max-width: 1200px;
    margin-left: 115px;
}

.gallery-column {
    display: flex;
    flex-direction: column;
    gap: 10px;
    width: 25%;
}

.center-image {
    flex: 1;
    text-align: center;
    align-self: flex-start; /* Поднимаем к верхнему краю */
    margin-top: -100px; /* Дополнительный подъем */
    position: relative; /* Для возможного z-index */
    z-index: 1; /* Чтобы было выше фона */
}

.center-image img {
    max-width: 120%;
    height: auto;
    border-radius: 8px;
}

/* Стиль для цифры (PNG) */


.gallery-item img {
    width: 60px;
    height: 60px;
    object-fit: contain;
    margin-right: 2px; /* Отступ справа от цифры */
    margin-top: 30px; /* Поднимаем цифру для визуального слияния */
}

/* Стиль для текстового блока */
.text-item {
    margin-right: 5cm; /* Отступ справа от цифры */
    margin-top: -30px; /* Поднимаем цифру для визуального слияния */
}

.text-item img {
    width: 400px; /* Размер иконки в тексте */
    height: 120px;
    object-fit: contain;
    float: left;
}

/* Адаптивность */
@media (max-width: 768px) {
    .dogo-gallery {
        flex-direction: column;
        align-items: center;
    }

    .gallery-column,
    .center-image {
        width: 90%;
    }

    .gallery-column {
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
    }

    .gallery-item {
        width: 45%;
        margin: 5px;
    }
}

.cat-section:nth-child(odd) {
    /* background-color: #f7f5f3; */
    width: 100%;
    max-width: 2000px; /* Максимальная ширина */
    height: 700px; /* Жестко заданная высота */
    overflow: hidden; /* Обрезаем содержимое, если выходит за границы */

}

.cat-text h2 {
    font-size: 3.0rem;
    color: #f7f4f4;
    margin-bottom: 20px;
    line-height: 2.7;
    text-align: center;
}

        /* Новые стили для второй секции */
/* Стили для полноразмерной картинки */
.cat-image {
    margin-top: -600px;
    flex: 1;
    text-align: right;
    margin-right: 40px;
}

.cat-image img {
    max-width: 500px;
    width: 500px;
    height: auto;
    border-radius: 4;
    margin-top: 0.1cm;
}

.cat-text h3 {
    font-size: 3.0rem;
    color: #020202;
    margin-bottom: 0.8px;
    line-height: 2.7;
    text-align: left;
    margin-left: 60px;
}

.review-image {
    flex: 1;
    text-align: left;
    margin-top: 10px;
    margin-left: 40px;
}

.review-column {
    display: flex;
    flex-direction: column;
    gap: 10px;
    width: 25%;
}

/* Для адаптивности */
@media (max-width: 768px) {
    .cat-image {
        height: 50vh; /* На половину высоты экрана на мобильных */
    }
}


.dogo-section:nth-child(even) {
    background-color: #e7ae63;
    width: 100%;
    height: 650px;
    overflow: hidden;
    padding: 35px 0;
}
.dogo-gallery {
    display: flex;
    justify-content: center;
    gap: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.dogo-text h2 {
    font-size: 3.0rem;
    color: #f7f4f4;
    margin-bottom: 5px;
    line-height: 0.01cm;
    text-align: center;
}


        /* Base Styles */
:root {
    --secondary: #0c0c0c; /*Контакты и Соцсети - следите за нами!*/
    --dark: #fefafa;/*Фон footer*/
    --light: #fdfafa;/*???*/
}
/*header*/
body {
    font-family: 'Montserrat', sans-serif;
            color: var(--text);
            line-height: 1.6;
            margin: 0;
            padding: 0;
            padding-top: 70px; /* Отступ для фиксированного хедера */
}

.container {
    width: 0%;
    max-width: 0;
    margin: 0 auto;
}


.container {
    width: 9%;
    max-width: 10px;
    margin: 0 auto;
}

/* Hero section */
.hero-section {
    width: 100%;
    padding: 100px;
    /* background-color: #f9f9f9; */
}

.container {
    width: 100%;
    /* max-width: 1200px; */
    margin: 0 auto;
}

.hero-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 0;
    width: 100%;
}

.hero-text {
    flex: 1;
    max-width: 1000px;
}

.hero-image {
    flex: 1;
    text-align: right;
    margin-bottom: 50px;
}

.hero-image img {
    max-width: 600px;
    width: 100%;
    height: auto;
    border-radius: 0;
}

.hero-text h1 {
    font-size: 4.0rem;
    color: #040404;
    margin-bottom: 20px;
    line-height: 1.3;
}

.hero-text .subtitle {
    font-size: 2.0rem;
    color: #080808;
    margin-bottom: 30px;
}

/* Адаптивность */
@media (max-width: 768px) {
    .hero-content {
        flex-direction: column;
    }

    .hero-image {
        order: -1;
        text-align: center;
        margin-bottom: 30px;
    }

    .hero-text {
        text-align: center;
    }
}
    </style>
@endsection
