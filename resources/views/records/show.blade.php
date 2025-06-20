@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
<div class="card mt-4">
  <div class="card-body">
    <h5 class="card-title">
      <span class="label">Записи пользователя:</span>
      <span class="value">{{ $record->name }}</span>
      <br>
      <span class="label">Питомец:</span>
      <span class="value">{{ $pet->pname }}</span>
    </h5>

    @forelse($appointments as $appointment)
      <div class="appointment-details mt-4">
        <h6 class="appointment-date">Дата: {{ $appointment->date->format('d.m.Y') }}</h6>

        @if($appointment->groomer)
          <p class="appointment-info"><span class="info-label">Мастер:</span> {{ $appointment->groomer->full_name ?? $appointment->groomer->name }}</p>
          @if($appointment->groomer->specialization)
            <p class="appointment-info"><span class="info-label">Ранг:</span> {{ $appointment->groomer->specialization }}</p>
          @endif
        @else
          <p class="text-warning appointment-info">Мастер не назначен</p>
        @endif

        <p class="appointment-info">
          <span class="info-label">Статус:</span>
          <span class="badge bg-{{ $appointment->status === 'completed' ? 'success' : 'warning' }}">
            {{ $appointment->status }}
          </span>
        </p>

        <p class="appointment-info"><span class="info-label">Примечания:</span> {{ $appointment->notes ?? 'Нет примечаний' }}</p>

        <h6 class="services-title">Услуги:</h6>
        <ul class="list-group mb-3">
          @foreach($appointment->services as $service)
            <li class="list-group-item service-item">
              <span class="service-name">{{ $service->name }}</span>
              <span class="service-price">{{ number_format($service->price, 0, '', ' ') }} руб.</span>
            </li>
          @endforeach
        </ul>

        <div class="total-price">
          <strong>Итого: {{ number_format($appointment->services->sum('price'), 0, '', ' ') }} руб.</strong>
        </div>
      </div>
    @empty
      <p class="no-appointments">Нет записей.</p>
    @endforelse

    <div class="action-buttons mt-4">
      <a href="{{ route('records.edit', $record->id) }}" class="btn btn-action btn-edit">
        Редактировать
      </a>
      <form action="{{ route('records.delete', $record->id) }}" method="post" class="d-inline" onsubmit="return confirm('Вы уверены, что хотите отменить запись?');">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-action btn-cancel">
          Отменить
        </button>
      </form>
    </div>
  </div>
</div>

{{--<style>--}}
{{--  body {--}}
{{--    background-image: url('/images/paws-background.png');--}}
{{--    background-size: cover;--}}
{{--    background-attachment: fixed;--}}
{{--    background-position: center;--}}
{{--    background-repeat: no-repeat;--}}
{{--    min-height: 100vh;--}}
{{--  }--}}
{{--  --}}
{{--  body::before {--}}
{{--    content: '';--}}
{{--    position: fixed;--}}
{{--    top: 0;--}}
{{--    left: 0;--}}
{{--    right: 0;--}}
{{--    bottom: 0;--}}
{{--    background-color: rgba(255, 255, 255, 0.9);--}}
{{--    z-index: -1;--}}
{{--  }--}}

{{--  .card {--}}
{{--    max-width: 700px;--}}
{{--    margin: 0 auto;--}}
{{--    border: none;--}}
{{--    border-radius: 12px;--}}
{{--    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);--}}
{{--    overflow: hidden;--}}
{{--  }--}}

{{--  .card-body {--}}
{{--    padding: 2rem;--}}
{{--  }--}}

{{--  .card-title {--}}
{{--    color: #2c3e50;--}}
{{--    font-weight: 700;--}}
{{--    font-size: 1.5rem;--}}
{{--    margin-bottom: 1.5rem;--}}
{{--    padding-bottom: 1rem;--}}
{{--    border-bottom: 2px solid #f1f1f1;--}}
{{--    position: relative;--}}
{{--  }--}}

{{--  .card-title::after {--}}
{{--    content: '';--}}
{{--    position: absolute;--}}
{{--    bottom: -2px;--}}
{{--    left: 0;--}}
{{--    width: 100px;--}}
{{--    height: 3px;--}}
{{--    background: linear-gradient(to right, #ed770f, #e7ae63);--}}
{{--  }--}}

{{--  .card-title .label {--}}
{{--    color: #7f8c8d;--}}
{{--    font-weight: 500;--}}
{{--    margin-right: 10px;--}}
{{--  }--}}

{{--  .card-title .value {--}}
{{--    color: #e88617;--}}
{{--    font-weight: 600;--}}
{{--    padding: 3px 8px;--}}
{{--    background-color: rgba(232, 134, 23, 0.1);--}}
{{--    border-radius: 4px;--}}
{{--    border-left: 2px solid #e88617;--}}
{{--  }--}}

{{--  .appointment-details {--}}
{{--    background-color: #ffffff;--}}
{{--    border-radius: 10px;--}}
{{--    padding: 1.5rem;--}}
{{--    margin-bottom: 2rem;--}}
{{--    border-left: 4px solid #e88617;--}}
{{--    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);--}}
{{--  }--}}

{{--  .appointment-date {--}}
{{--    color: #2c3e50;--}}
{{--    font-weight: 600;--}}
{{--    margin-bottom: 1.2rem;--}}
{{--    font-size: 1.1rem;--}}
{{--  }--}}

{{--  .appointment-info {--}}
{{--    margin-bottom: 0.6rem;--}}
{{--    color: #34495e;--}}
{{--    line-height: 1.6;--}}
{{--  }--}}

{{--  .info-label {--}}
{{--    color: #7f8c8d;--}}
{{--    font-weight: 500;--}}
{{--    margin-right: 8px;--}}
{{--  }--}}

{{--  .services-title {--}}
{{--    color: #2c3e50;--}}
{{--    font-weight: 600;--}}
{{--    margin: 1.5rem 0 1rem;--}}
{{--    font-size: 1.1rem;--}}
{{--  }--}}

{{--  .list-group {--}}
{{--    border-radius: 8px;--}}
{{--    overflow: hidden;--}}
{{--  }--}}

{{--  .service-item {--}}
{{--    display: flex;--}}
{{--    justify-content: space-between;--}}
{{--    align-items: center;--}}
{{--    padding: 0.8rem 1.25rem;--}}
{{--    border-color: #f1f1f1;--}}
{{--  }--}}

{{--  .service-name {--}}
{{--    color: #2c3e50;--}}
{{--    font-weight: 500;--}}
{{--  }--}}

{{--  .service-price {--}}
{{--    color: #e88617;--}}
{{--    font-weight: 600;--}}
{{--  }--}}

{{--  .total-price {--}}
{{--    font-size: 1.1rem;--}}
{{--    color: #2c3e50;--}}
{{--    padding-top: 1rem;--}}
{{--    margin-top: 1rem;--}}
{{--    border-top: 1px solid #f1f1f1;--}}
{{--    text-align: right;--}}
{{--    font-weight: 600;--}}
{{--  }--}}

{{--  .no-appointments {--}}
{{--    color: #7f8c8d;--}}
{{--    text-align: center;--}}
{{--    padding: 1.5rem;--}}
{{--  }--}}

{{--  .action-buttons {--}}
{{--    display: flex;--}}
{{--    gap: 15px;--}}
{{--    margin-top: 2rem;--}}
{{--  }--}}

{{--  .btn-action {--}}
{{--    flex: 1;--}}
{{--    padding: 12px;--}}
{{--    border-radius: 8px;--}}
{{--    font-weight: 600;--}}
{{--    text-align: center;--}}
{{--    transition: all 0.3s ease;--}}
{{--    border: none;--}}
{{--  }--}}

{{--  .btn-edit {--}}
{{--    background: linear-gradient(to right, #ed770f, #e7ae63);--}}
{{--    color: white;--}}
{{--  }--}}

{{--  .btn-cancel {--}}
{{--    background: linear-gradient(to right, #e74c3c, #e67e22);--}}
{{--    color: white;--}}
{{--  }--}}

{{--  .btn-action:hover {--}}
{{--    transform: translateY(-2px);--}}
{{--    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);--}}
{{--    opacity: 0.9;--}}
{{--  }--}}

{{--  .badge {--}}
{{--    padding: 0.4em 0.75em;--}}
{{--    font-size: 0.85em;--}}
{{--    font-weight: 600;--}}
{{--    letter-spacing: 0.5px;--}}
{{--  }--}}

{{--  .text-warning {--}}
{{--    color: #e67e22 !important;--}}
{{--  }--}}

{{--  @media (max-width: 576px) {--}}
{{--    .action-buttons {--}}
{{--      flex-direction: column;--}}
{{--      gap: 10px;--}}
{{--    }--}}
{{--    --}}
{{--    .card-body {--}}
{{--      padding: 1.5rem;--}}
{{--    }--}}
{{--  }--}}
{{--</style>--}}
@endsection
