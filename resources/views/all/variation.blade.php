<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @include('styles')
    <title>Список Дверей</title>
</head>


<body style="width: 80%; margin: 0 auto">
    <h4>Всего Дверей <? echo count($variation); ?></h4>
    
    {{ $variation->links('pagination') }}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Удалить</th>
                <th scope="col">Редактировать</th>
                <th scope="col">Картинка</th>
                <th scope="col">название</th>
                <th scope="col">цвет \ материал</th>
                <th scope="col">Коллекция</th>
            </tr>
        </thead>
        <tbody>
        @foreach($variation as $item)
            <tr>
                <th scope="row">
                    <form action="{{ route('variation_del', ['id' => $item->id_variation]) }}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-outline-danger" type="submit">
                            <img src="{{ asset('resources/icons/delete.svg') }}" style="width: 1rem" alt="">
                        </button>
                    </form>
                </th>
                <th scope="row"><a href="{{ route('variation_open_edit', ['id' => $item->id_variation]) }}"><img src="{{ asset('resources/icons/edit.svg') }}" style="width: 1rem" alt=""></a></th>
                <td><img src="{{ asset('storage/app/variation') }}/{{ $item->img_variation }}" style="max-width: 5rem; max-height: 5rem; min-width: 5rem; min-height: 5rem; object-fit: contain" alt=""></td>
                <td>{{ $item->name_variation }}</td>
                <td>{{ $item->name_color }} \ {{ $item->name_material }}</td>
                <td>{{ $item->name_door }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
      

    {{ $variation->links('pagination') }}
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
