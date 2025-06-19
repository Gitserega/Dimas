@extends('layouts.app')

@section('head')
<title>Наше местоположение</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://api-maps.yandex.ru/2.1/?apikey=4afd13cb-03a5-45cc-b6b0-263a0312c4e4&lang=ru_RU"></script>
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
    
</div>

<script>
    ymaps.ready(function() {
        try {
            
            var map = new ymaps.Map("map", {
                center: [55.160478, 61.370244], 
                zoom: 15,
                controls: ['zoomControl', 'typeSelector']
            });

           
            var marker = new ymaps.Placemark([55.160478, 61.370244], {
                hintContent: 'Наш салон',
                balloonContent: 'Груминг-салон "Elite Paws"'
            }, {
                preset: 'islands#blueIcon'
            });

            map.geoObjects.add(marker);
            
        } catch (e) {
            console.error('Ошибка:', e);
            document.getElementById('map').innerHTML = 
                '<div class="map-error">' +
                    '<p>Не удалось загрузить карту</p>' +
                    '<a href="https://yandex.ru/maps/?pt=61.370244,55.160478&z=15&l=map" target="_blank" class="btn btn-primary">' +
                        'Открыть в Яндекс.Картах' +
                    '</a>' +
                '</div>';
        }
    });
</script>

<div class="contact-info mt-3">
</div>
@endsection