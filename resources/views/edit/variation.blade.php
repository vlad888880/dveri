<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Редактор двери {{ $variation[0]->name_variation }}</title>
</head>


<body style="margin: 2em 15em">

    <form action="{{ route('variation_edit', ['id' => $variation[0]->id_variation]) }}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    {{ method_field('PATCH') }}
        <div class="form-group">
            <label >Картинка двери</label>
            <img src="{{ asset('storage/app/variation') }}/{{ $variation[0]->img_variation }}" alt="" style="max-width: 5rem">
            <input type="file" name="img_variation" class="form-control-file">
        </div>
        <div class="form-group">
            <label >артикль</label>
            <input type="text" name="article_variation" class="form-control" value="{{ $variation[0]->article_variation }}">
        </div>
        <div class="form-group">
            <label >Название  двери</label>
            <input type="text" name="name_variation" class="form-control" value="{{ $variation[0]->name_variation }}">
        </div>
        <label class="my-1 mr-2">Цвет</label>
        <select class="js-select2 custom-select my-1 mr-sm-2" name="id_color">
            @foreach($color as $item)
            @if($item->id_color == $variation[0]->id_color)
            <option selected value="{{ $item->id_color }}">{{ $item->name_color }} из материала {{ $item->name_material }}</option>
            @else
            <option value="{{ $item->id_color }}">{{ $item->name_color }} из материала {{ $item->name_material }}</option>
            @endif
            @endforeach
        </select>
        <label class="my-1 mr-2">Стекло</label>
        <select class="js-select3 custom-select my-1 mr-sm-2" name="id_glass">
            @foreach($glass as $key => $item)
            @if($key == 0 && $item->id_glass != $variation[0]->id_glass)
            <option value="0">Отсутствует</option>
            @endif
            @if($key == 0 && $item->id_glass == $variation[0]->id_glass)
            <option selected value="0">Отсутствует</option>
            @endif
            @if($item->id_glass == $variation[0]->id_glass)
            <option selected value="{{ $item->id_glass }}">{{ $item->name_glass }} : {{ $item->group_glass }}</option>
            @else
            <option value="{{ $item->id_glass }}">{{ $item->name_glass }} : {{ $item->group_glass }}</option>
            @endif
            @endforeach
        </select>
        <label class="my-1 mr-2">Дверь</label>
        <select class="custom-select my-1 mr-sm-2" name="id_door">
            @foreach($door as $item)
                @if($item['id_door'] == $variation[0]->id_door)
                <option selected value="{{ $item['id_door'] }}">{{ $item['name_door'] }}</option>
                @else
                <option value="{{ $item['id_door'] }}">{{ $item['name_door'] }}</option>
                @endif
            @endforeach
        </select>
        <div class="form-group">
            <label>Тип вариации</label>
            <input type="text" name="type_variation" class="form-control" value="{{ $variation[0]->type_variation }}">
            <small>Указать номер вариации, например 1</small>
        </div>
        <div class="form-check form-check-inline">
            @if(!isset($variation[0]->is_new))
            <input  class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" name="is_new" />
            @else
            <input checked="checked" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" name="is_new" />
            @endif
            <label class="form-check-label" for="inlineCheckbox1">Новинка</label>
        </div>
        <div class="form-check form-check-inline">
            @if(!isset($variation[0]->is_best_price))
            <input  class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" name="is_best_price" />
            @else
            <input checked="checked"  class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" name="is_best_price" />
            @endif
            <label class="form-check-label" for="inlineCheckbox2">Лучшая цена</label>
        </div>
        <div class="form-group">
            <label >Цена</label>
            <input type="text" class="form-control" name="price_door" value="{{ $variation[0]->price_door }}" />
        </div>
       
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

            $('.js-select3').select2({
                placeholder: "Выберите Стекло",
                maximumSelectionLength: 2,
                language: "ru"
            });
        });
    </script>
</body>

</html>
