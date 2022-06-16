<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @include('styles')
    <title>Админ панель</title>
</head>


<body>

    <div class="side__bar list-group">
        <h4>Добавление</h4>
        <a href="{{ route('category') }}" target="_blank" class="list-group-item list-group-item-action">Новая -> категория</a>
        <a href="{{ route('color') }}" target="_blank" class="list-group-item list-group-item-action">Новая -> цвет</a>
        <a href="{{ route('material') }}" target="_blank" class="list-group-item list-group-item-action">Новая -> материал</a>
        <a href="{{ route('variation') }}" target="_blank" class="list-group-item list-group-item-action">Новая -> дверь</a>
        <a href="{{ route('partner') }}" target="_blank" class="list-group-item list-group-item-action">Новая -> партнер</a>
        <a href="{{ route('door') }}" target="_blank" class="list-group-item list-group-item-action">Новая -> коллекция</a>
        <a href="{{ route('glasses') }}" target="_blank" class="list-group-item list-group-item-action">Новая -> стекло</a>
        <a href="{{ route('slider') }}" target="_blank" class="list-group-item list-group-item-action">Новая -> слайдер главная</a>
        <a href="{{ route('shades') }}" target="_blank" class="list-group-item list-group-item-action">Новая -> оттенки</a>
        <a href="{{ route('service') }}" target="_blank" class="list-group-item list-group-item-action">Новая -> услуги</a>
        <a href="{{ route('stock') }}" target="_blank" class="list-group-item list-group-item-action">Новая -> акции</a>
        <a href="{{ route('banner') }}" target="_blank" class="list-group-item list-group-item-action">Новая -> Баннер в Услугах</a>
        <a href="{{ route('complete') }}" target="_blank" class="list-group-item list-group-item-action">Новая -> Выполненые работы</a>

        <h4>Список</h4>
        <a href="{{ route('category_all') }}" target="_blank" class="list-group-item list-group-item-action">Категории</a>
        <a href="{{ route('color_all') }}" target="_blank" class="list-group-item list-group-item-action">Цвета</a>
        <a href="{{ route('material_all') }}" target="_blank" class="list-group-item list-group-item-action">Материалы</a>
        <a href="{{ route('variation_all') }}" target="_blank" class="list-group-item list-group-item-action">Двери</a>
        <a href="{{ route('partner_all') }}" target="_blank" class="list-group-item list-group-item-action">Партнеры</a>
        <a href="{{ route('door_all') }}" target="_blank" class="list-group-item list-group-item-action">Коллекции</a>
        <a href="{{ route('slider_all') }}" target="_blank" class="list-group-item list-group-item-action">Cлайдер главная</a>
        <a href="{{ route('shades_all') }}" target="_blank" class="list-group-item list-group-item-action">Oттенки</a>
        <a href="{{ route('service_all') }}" target="_blank" class="list-group-item list-group-item-action">Услуги</a>
        <a href="{{ route('stock_all') }}" target="_blank" class="list-group-item list-group-item-action">Акции</a>
        <a href="{{ route('banner_all') }}" target="_blank" class="list-group-item list-group-item-action">Баннер в Услугах</a>
        <a href="{{ route('complete_all') }}" target="_blank" class="list-group-item list-group-item-action">Выполненые работы</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
