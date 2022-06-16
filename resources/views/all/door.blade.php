<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @include('styles')
    <title>Список Коллекции</title>
</head>


<body style="width: 80%; margin: 0 auto">
    <h4>Всего Коллекции <? echo count($door); ?></h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Удалить</th>
                <th scope="col">Редактировать</th>
                <th scope="col">Картинка</th>
                <th scope="col">Партнер</th>
                <th scope="col">Категория</th>
                <th scope="col">Название двери</th>
            </tr>
        </thead>
        <tbody>
        @foreach($door as $item)
            <tr>
                <th scope="row"><a href=""><img src="{{ asset('resources/icons/delete.svg') }}" style="width: 1rem" alt=""></a></th>
                <th scope="row"><a href=""><img src="{{ asset('resources/icons/edit.svg') }}" style="width: 1rem" alt=""></a></th>
                <td><img src="{{ asset('storage/app/door') }}/{{ $item->preview_door }}" style="max-width: 5rem; max-height: 5rem; min-width: 5rem; min-height: 5rem; object-fit: contain" alt=""></td>
                <td>{{ $item->name_partner }}</td>
                <td>{{ $item->name_category }}</td>
                <td>{{ $item->name_door }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
      


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
