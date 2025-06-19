@extends('layouts.app')
@section('head')
<style>
    /* Фон всей страницы */
    body {
        background-image: url('/images/paws-background.png'); /* Путь к вашему изображению */
        background-size: cover; /* Растягиваем на весь экран */
        background-attachment: fixed; /* Фон фиксированный при прокрутке */
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh; /* Минимальная высота на весь экран */
    }

    /* Полупрозрачный слой поверх фона для лучшей читаемости */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(255, 255, 255, 0.85); /* Белый с прозрачностью */
        z-index: -1; /* Под основным контентом */
    }

    /* Стили для формы */
    .booking-form-container {
        max-width: 600px;
        margin: 30px auto;
        padding: 30px;
        background-color: #e7ae63;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    
    .form-control, .form-select {
        width: 100%;
        max-width: 400px;
        margin: 0 auto 15px;
        display: block;
        background-color: rgba(255, 255, 255, 0.8);
    }
    
        .submit-btn {
        display: block;
        width: 200px;
        margin: 30px auto 0;
        padding: 12px 24px;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        border: none;
        border-radius: 30px; /* Закругленные углы */
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        background-color: #ed770f; /* Коралловый */
        color: white;
        border-color: #ed770f; /* Цвет рамки */

        background: linear-gradient(to right, #ed770f, #e7ae63);
        color: white;
        border: none;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        background-color: #ed770f; /* Темнее при наведении */
        border-color: #ed770f;

        background: linear-gradient(to right,  #ed770f, #e7ae63);
    }

    .submit-btn:active {
        transform: translateY(0);
    }

    /* Обновленный стиль для контейнера услуг */
.services-container {
    max-width: 450px; /* Фиксированная ширина */
    margin: 0 auto; /* Центрирование */
    padding: 15px;
    background-color: rgba(255, 255, 255, 0.7);
    border-radius: 10px;
}

/* Стиль для чекбоксов */
.form-check {
    padding: 8px 15px;
    margin-bottom: 8px;
    /* чbackground-color: white; */
    border-radius: 6px;
    transition: all 0.3s ease;
}

.form-check:hover {
    background-color: #f8f9fa;
    transform: translateX(5px);
}

/* Стили для чекбоксов */
.form-check-input {
    width: 1.2em;
    height: 1.2em;
    margin-top: 0.3em;
    cursor: pointer;
}

/* Цвет рамки невыбранного чекбокса */
.form-check-input:not(:checked) {
    border-color: #e67e22; /* Оранжевая рамка */
}

 /* Стиль для выбранного чекбокса */
.form-check-input:checked {
    background-color: #e67e22; /* Оранжевый фон */
    border-color: #e67e22; /* Оранжевая рамка */
} 

/* Стиль при наведении */
.form-check-input:hover:not(:checked) {
    border-color: #d35400; /* Темно-оранжевая рамка */
}

.form-check-label {
    margin-left: 8px;
    font-size: 15px;
}

/* Центрирование заголовков */
h5.text-center {
    margin: 25px 0 15px;
    color: #5a3e36;
    font-weight: 600;
}

/* Обновленный стиль формы */
.booking-form-container {
    max-width: 600px;
    margin: 30px auto;
    padding: 30px;
    border: 1px solid #e7ae63;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

input[type="date"] {
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ddd;
}
</style>
@endsection

@section('content')
<div class="booking-form-container">
    <h3 class="text-center mb-4">Запись на услугу</h3>
    <form action="{{ route('records.store') }}" method="post">
        @csrf
        
        <div class="mb-3">
            <input type="text" name="name" class="form-control" id="name" placeholder="Введите ваше имя" required>
        </div>
        
        <div class="mb-3">
            <input type="tel" name="phone" class="form-control" id="phone" placeholder="+7 (XXX) XXX-XX-XX" required>
        </div>
        
        <div class="mb-3">
            <input type="text" name="pname" class="form-control" id="pet" placeholder="Введите кличку питомца" required>
        </div>
        
        <h5 class="text-center mb-4">Информация о питомце</h5>
        
        <div class="mb-3">
            <select name="type" class="form-select" id="type" required>
                <option value="" selected disabled>Выберите тип</option>
                <option value="Кошка">Кошка</option>
                <option value="Собака">Собака</option>
            </select>
        </div>
        
        <div class="mb-3">
            <input type="text" name="breed" class="form-control" id="breed" placeholder="Введите породу">
        </div>
        
        <div class="mb-3">
            <input type="number" name="age" class="form-control" id="age" placeholder="Укажите возраст">
        </div>
        
        <h5 class="text-center md-4">Выбор мастера</h5>
        
        <div class="mb-3">
            <select name="groomer" class="form-select" id="groomer" required>
                <option value="" selected disabled>Выберите мастера</option>
                @foreach($groomers as $groomer)
                    <option value="{{ $groomer->id }}">{{ $groomer->name }} ({{ $groomer->specialization }})</option>
                @endforeach
            </select>
        </div>
        
        <h5 class="text-center mb-4">Выберите услуги</h5>
        
        <div class="mb-3 services-container">
            @foreach($services as $service)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" 
                name="services[]" 
                id="service-{{ $service->id }}" 
                value="{{ $service->id }}">
                <label class="form-check-label" for="service-{{ $service->id }}">
                    {{ $service->name }} - {{ $service->price }} руб. ({{ $service->duration_minutes }} мин)
                </label>
            </div>
            @endforeach
        </div>
        
        <h5 class="text-center mb-4">Дата и комментарии</h5>
        
        <div class="mb-3">
            <input type="date" name="date" class="form-control" id="date" required>
        </div>
        
        <div class="mb-3">
            <input type="text" name="notes" class="form-control" id="notes" placeholder="Комментарии к записи">
        </div>
        
        <button type="submit" class="btn btn-primary submit-btn">Отправить</button>
    </form>
</div>
@endsection

@section('footer')
@endsection