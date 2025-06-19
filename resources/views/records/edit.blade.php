@extends('layouts.app')

@section('head')
    <style>
        .form-control::placeholder { color: #adb5bd; opacity: 1; }
        .form-control:focus::placeholder { color: transparent; }
        .form-select { color: #495057; }
        .form-select option[disabled] { color: #adb5bd; }
    </style>
@endsection

@section('content')
    @php
        $appointment = $appointments->first();
    @endphp

    <div class="container mt-4">
        <h3 class="mb-4">Редактирование записи от {{ $appointment->date->format('d.m.Y') }}</h3>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('records.update', $record->id) }}" method="post">
            @csrf
            @method('patch')


            <div class="mb-3">
                <label for="name"  class="form-label">Имя</label>
                <input type="text"
                       id="name"
                       name="name"
                       class="form-control"
                       value="{{ old('name', $record->name) }}"
                       required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Телефон</label>
                <input type="tel"
                       id="phone"
                       name="phone"
                       class="form-control"
                       value="{{ old('phone', $record->phone) }}"
                       required>
            </div>


            <div class="mb-3">
                <label for="pname" class="form-label">Кличка питомца</label>
                <input type="text"
                       id="pname"
                       name="pname"
                       class="form-control"
                       value="{{ old('pname', $pet->pname) }}"
                       required>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Тип питомца</label>
                <select id="type"
                        name="type"
                        class="form-select"
                        required>
                    <option value="" disabled {{ old('type', $pet->type) ? '' : 'selected' }}>
                        Выберите тип
                    </option>
                    <option value="Кошка" {{ old('type', $pet->type)==='Кошка' ? 'selected' : '' }}>
                        Кошка
                    </option>
                    <option value="Собака" {{ old('type', $pet->type)==='Собака' ? 'selected' : '' }}>
                        Собака
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label for="breed" class="form-label">Порода</label>
                <input type="text"
                       id="breed"
                       name="breed"
                       class="form-control"
                       value="{{ old('breed', $pet->breed) }}">
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Возраст</label>
                <input type="number"
                       id="age"
                       name="age"
                       class="form-control"
                       value="{{ old('age', $pet->age) }}">
            </div>


            <div class="mb-3">
                <label for="groomer" class="form-label">Мастер</label>
                <select id="groomer"
                        name="groomer"
                        class="form-select"
                        required>
                    <option value="" disabled {{ old('groomer', $appointment->groomer_id) ? '' : 'selected' }}>
                        Выберите мастера
                    </option>
                    @foreach($groomers as $g)
                        <option value="{{ $g->id }}"
                            {{ old('groomer', $appointment->groomer_id)==$g->id ? 'selected' : '' }}>
                            {{ $g->name }} ({{ $g->specialization }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Дата записи</label>
                <input type="date"
                       id="date"
                       name="date"
                       class="form-control"
                       value="{{ old('date', $appointment->date->format('Y-m-d')) }}"
                       required>
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">Примечания</label>
                <textarea id="notes"
                          name="notes"
                          class="form-control"
                          rows="3">{{ old('notes', $appointment->notes) }}</textarea>
            </div>

            <div class="mb-4">
                <h5>Услуги</h5>
                @foreach($services as $service)
                    <div class="form-check">
                        <input class="form-check-input"
                               type="checkbox"
                               id="service-{{ $service->id }}"
                               name="services[]"
                               value="{{ $service->id }}"
                            {{ in_array(
                                $service->id,
                                old('services', $appointment->services->pluck('id')->toArray())
                              ) ? 'checked' : '' }}>
                        <label class="form-check-label" for="service-{{ $service->id }}">
                            {{ $service->name }} —
                            {{ number_format($service->price, 0, '', ' ') }} руб.
                            ({{ $service->duration_minutes }} мин)
                        </label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
