@extends('layouts.app')

@section('head')
<title>Наше местоположение</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Подключаем Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    #map {
        width: 100%;
        height: 400px;
        margin: 20px 0;
        border: 1px solid #ddd;
    }
    .map-error {
        color: red;
        padding: 20px;
        text-align: center;
    }
</style>
@endsection

@section('content')
<div id="map">
    <p class="map-error">Загрузка карты...</p>
</div>

<!-- Подключаем Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        try {
            // Координаты (широта, долгота)
            const coords = [55.160478, 61.370244];
            
            // Создаем карту
            const map = L.map('map').setView(coords, 15);
            
            // Добавляем слой с картой OSM
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            
            // Создаем метку
            const marker = L.marker(coords).addTo(map)
                .bindPopup('Груминг-салон "Elite Paws"')
                .openPopup();
            
            // Добавляем контролы
            map.zoomControl.setPosition('topright');
            
        } catch (e) {
            console.error('Ошибка:', e);
            document.getElementById('map').innerHTML = 
                '<div class="map-error">' +
                    '<p>Не удалось загрузить карту</p>' +
                    '<a href="https://www.openstreetmap.org/?mlat=55.160478&mlon=61.370244#map=15/55.160478/61.370244" target="_blank" class="btn btn-primary">' +
                        'Открыть в OpenStreetMap' +
                    '</a>' +
                '</div>';
        }
    });
</script>

<div class="contact-info mt-3">
    <p><strong>Адрес:</strong> г. Челябинск, ул. Примерная, д. 123</p>
    <p><strong>Телефон:</strong> +7 (351) 123-45-67</p>
</div>
@endsection

@section('footer')
@endsection