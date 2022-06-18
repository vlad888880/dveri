<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div>
        <span>Имя клиента: {{ $name }}</span><br>
        <span>Телефон клиента: {{ $phone }}</span><br>
    </div>
    <br>
    <hr>
    <br>
    <?php $y=0; ?>
    @foreach($doors as $door)
        <img src="http://dveri/storage/app/variation/{{ $door['door']['img_variation'] }}" alt="" height="auto" width="250"><br>
        <span>Количество: {{ $door['count'] }}</span> <br>
        <span>Название: {{ $door['door']['name_variation'] }}</span> <br>
        <a href="http://dveri/shop/{{ $door['door']['id_door'] }}/model={{ $door['door']['id_variation'] }}/type={{ $door['door']['type_variation'] }}">Ссылка на дверь</a><br>
        <span>Цвет: {{ $door['door']['color']['name_color'] }}</span><br>
        <span>Материал: {{ $door['door']['color']['material']['name_material'] }}</span><br>
        <span>Стекло: {{ isset($door['door']['glass']['name_glass']) ? $door['door']['glass']['name_glass'] : "Отсутствует" }}</span><br>
        <span>Cумма: {{ $door['price'] * $door['count'] }}</span> <br>
        <?php $y=$y + $door['price'] * $door['count'] ; ?>
        <br>
        <hr>
        <br>
    @endforeach
    <span>Итого: <?php echo $y; ?></span> Р <br>

</body>
</html>