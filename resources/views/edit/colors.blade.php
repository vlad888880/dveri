<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @include('styles')
    <title>Добавление цвета</title>
</head>


<body style="margin: 2em 15em">

    <form action="{{ route('color_new') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Картинка цвета</label>
            <input type="file" name="img_color" class="form-control-file">
        </div>
        <div class="form-group">
            <label>Название цвета</label>
            <input type="text" name="name_color" class="form-control">
        </div>
        <label class="my-1 mr-2">Материал</label>
        <select class="js-select2 custom-select my-1 mr-sm-2" name="id_material">
            @foreach($material as $item)
            <option value="{{ $item['id_material'] }}">{{ $item['name_material'] }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="{{ asset('resources/css/select2.min.css') }}">
    <script src="{{ asset('resources/js/select2.min.js') }}"></script>
    <script src="{{ asset('resources/js/i18n/ru.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.js-select2').select2({
                placeholder: "Выберите Цвет",
                maximumSelectionLength: 2,
                language: "ru"
            });
        });

    </script>
</body>

</html>
