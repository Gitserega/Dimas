@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
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
