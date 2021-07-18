<div id="map" style="width: 100%; height: calc(100vh - 56px);"></div>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script type="text/javascript">
    ymaps.ready(init);
    function init() {
        var myMap = new ymaps.Map("map", {
            center: [55.76, 37.64],
            zoom: 10
        }, {
            searchControlProvider: 'yandex#search'
        });

        @foreach($mapPoints as $mapPoint)

            {{-- Определяем вывод точки (помщещение красное / платно зелёное / бесплатно синее) --}}
            @if($mapPoint->type == "в помещении")
                <?php $mapPoint->dot = "islands#redDotIcon"; ?>
            @elseif($mapPoint->pay)
                <?php $mapPoint->dot = "islands#greenDotIcon"; ?>
            @else
                <?php $mapPoint->dot = "islands#blueDotIcon"; ?>
            @endif

            var myPlacemark = new ymaps.Placemark([{{ $mapPoint->coordinates }}], {
                balloonContentHeader: "{{ $mapPoint->name }}",
                balloonContentBody:
                    "Тип площадки: {{ $mapPoint->type }}<br>" +
                    "Количество столов: {{ $mapPoint->num }}<br>" +
                    "Покрытие: {{ $mapPoint->coverage }}<br>" +
                    "Сетка: {{ $mapPoint->net }}<br>" +
                    "Освещение: {{ $mapPoint->light }}<br>" +
                    "Цена: " +
                    {{-- Определяем вывод цены (платно со ссылкой / платно без ссылки / бесплатно) --}}
                    @if($mapPoint->pay && !empty($mapPoint->website))
                        "<a href='{{ $mapPoint->website}}'>платно</a>"
                    @elseif($mapPoint->pay)
                        "платно"
                    @else
                        "бесплатно"
                    @endif ,
                balloonContentFooter: "<a href='/report/{{ $mapPoint->id }}'>Неверно?</a>",
                hintContent: "{{ $mapPoint->name }}"
            }, {
                preset: '{{ $mapPoint->dot }}'
            });
            myMap.geoObjects.add(myPlacemark);
        @endforeach
    }
</script>
