<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @include('styles')
    <title>Список Акций</title>
</head>


<body style="width: 80%; margin: 0 auto">
    <h4>Всего Акций
        <? echo count($stock); ?>
    </h4>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Удалить</th>
                <th scope="col">Редактировать</th>
                <th scope="col">Картинка</th>
                <th scope="col">Заголовок</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stock as $item)
            <tr>
                <th scope="row">
                    <form action="{{ route('stock_del', ['id' => $item->id_stock]) }}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-outline-danger" type="submit">
                            <img src="{{ asset('resources/icons/delete.svg') }}" style="width: 1rem" alt="">
                        </button>
                    </form>
                </th>
                <th scope="row"><a href="{{ route('stock_open_edit', ['id' => $item->id_stock]) }}">
                <img src="{{ asset('resources/icons/edit.svg') }}" style="width: 1rem" alt=""></a></th>
                <td><img src="{{ asset('storage/app/stock') }}/{{ $item->img_stock }}" style="width: 4.2rem" alt="">
                </td>
                <td>{{ $item->title_stock }}</td>
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
