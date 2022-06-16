<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('styles')

    <title>Ошибка 404 : Страница не найдена</title>

</head>

<body>
    <div class="not-found">
        <div class="not-found__content">
            <div class="not-found__background-img"></div>
            <div class="not-found__text">Страница не найдена</div>
        </div>
        <div class="not-found__bottom"></div>
    </div>
	
</body>

</html>
