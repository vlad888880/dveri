<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Добавление Двери</title>
</head>


<body style="margin: 2em 15em">

    <form action="{{ route('variation_new') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label >Картинка вариации</label>
            <input type="file" name="img_variation" class="form-control-file">
        </div>
        <div class="form-group">
            <label >Вторая картинка вариации</label>
            <input type="file" name="img_variation_second" class="form-control-file">
        </div>
        <div class="form-group">
            <label >артикль</label>
            <input type="text" name="article_variation" class="form-control">
        </div>
        <div class="form-group">
            <label >Название вариации</label>
            <input type="text" name="name_variation" class="form-control">
        </div>
        <label class="my-1 mr-2">Цвет</label>
        <select class="js-select2 custom-select my-1 mr-sm-2" name="id_color">
            @foreach($color as $item)
            <option value="{{ $item->id_color }}">{{ $item->name_color }} из материала {{ $item->name_material }}</option>
            @endforeach
        </select>
        <label class="my-1 mr-2">Стекло</label>
        <select class="js-select3 custom-select my-1 mr-sm-2" name="id_glass">
            <option value="0">Отсутствует</option>
            @foreach($glass as $item)
            <option value="{{ $item->id_glass }}">{{ $item->name_glass }} : {{ $item->group_glass }}</option>
            @endforeach
        </select>
        <label class="my-1 mr-2">Дверь</label>
        <select class="custom-select my-1 mr-sm-2" name="id_door">
            @foreach($door as $item)
            <option value="{{ $item['id_door'] }}">{{ $item['name_door'] }}</option>
            @endforeach
        </select>
        <div class="form-group">
            <label>Тип вариации</label>
            <input type="text" name="type_variation" class="form-control">
            <small>Указать номер вариации, например 1</small>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" name="is_new" />
            <label class="form-check-label" for="inlineCheckbox1">Новинка</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" name="is_best_price" />
            <label class="form-check-label" for="inlineCheckbox2">Лучшая цена</label>
        </div>
        <div class="form-group">
            <label >Цена</label>
            <input type="text" class="form-control" name="price_door" />
        </div>
        <div class="js--append">
        </div>
        <div class="js--add-apend btn btn-secondary btn">Добавить характеристики</div>
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
    $('.js--add-apend').on('click', function() {
     $(".js--append").append(`
        <div class="form-group">
            <label >Название характеристики</label>
            <input type="еуче" class="form-control" name="name_characteristics[]" />
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label>название 1</label>
                <input type="text" class="form-control" name="key1[]" value="" />
            </div>
            <div class="col-md-4 mb-3">
                <label>значение 1</label>
                <input type="text" class="form-control" name="value1[]" value="" />
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label>название 2</label>
                <input type="text" class="form-control" name="key2[]" value="" />
            </div>
            <div class="col-md-4 mb-3">
                <label>значение 2</label>
                <input type="text" class="form-control" name="value2[]" value="" />
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label>название 3</label>
                <input type="text" class="form-control" name="key3[]" value="" />
            </div>
            <div class="col-md-4 mb-3">
                <label>значение 3</label>
                <input type="text" class="form-control" name="value3[]" value="" />
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label>название 4</label>
                <input type="text" class="form-control" name="key4[]" value="" />
            </div>
            <div class="col-md-4 mb-3">
                <label>значение 4</label>
                <input type="text" class="form-control" name="value4[]" value="" />
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label>название 5</label>
                <input type="text" class="form-control" name="key5[]" value="" />
            </div>
            <div class="col-md-4 mb-3">
                <label>значение 5</label>
                <input type="text" class="form-control" name="value5[]" value="" />
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label>название 6</label>
                <input type="text" class="form-control" name="key6[]" value="" />
            </div>
            <div class="col-md-4 mb-3">
                <label>значение 6</label>
                <input type="text" class="form-control" name="value6[]" value="" />
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label>название 7</label>
                <input type="text" class="form-control" name="key7[]" value="" />
            </div>
            <div class="col-md-4 mb-3">
                <label>значение 7</label>
                <input type="text" class="form-control" name="value7[]" value="" />
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label>название </label>
                <input type="text" class="form-control" name="key8[]" value="" />
            </div>
            <div class="col-md-4 mb-3">
                <label>значение 8</label>
                <input type="text" class="form-control" name="value8[]" value="" />
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label>название 9</label>
                <input type="text" class="form-control" name="key9[]" value="" />
            </div>
            <div class="col-md-4 mb-3">
                <label>значение 9</label>
                <input type="text" class="form-control" name="value9[]" value="" />
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label>название 10</label>
                <input type="text" class="form-control" name="key10[]" value="" />
            </div>
            <div class="col-md-4 mb-3">
                <label>значение 10</label>
                <input type="text" class="form-control" name="value10[]" value="" />
            </div>
        </div>
        <hr>`);
    });
    </script>
    <script>
        $(document).ready(function () {
            $('.js-select2').select2({
                placeholder: "Выберите Цвет",
                maximumSelectionLength: 2,
                language: "ru"
            });
            $('.js-select3').select2({
                placeholder: "Выберите Стекло",
                maximumSelectionLength: 2,
                language: "ru"
            });
        });

    </script>
</body>

</html>
