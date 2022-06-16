<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>ADMIN — shades</title>
</head>


<body style="margin: 2em 15em">

    <form action="{{ route('shades_edit', ['id' => $shades[0]->id_shades]) }}" method="POST">
    {{csrf_field()}}
    {{ method_field('PATCH') }}
        <div class="form-group">
            <label >Название цвета</label>
            <input type="text" name="name" class="form-control-file" value="{{ $shades[0]->name }}">
        </div>
        <div class="form-group">
            <label >HEX - цвета, например <span style="background: #F4F3D7; padding: 5px">#F4F3D7</span></label>
            <input type="text" name="color_hash" class="form-control" value="{{ $shades[0]->color_hash }}">
        </div>
        <div class="js--append">
        @foreach($shades_color as $item)
        <select class="custom-select my-1 mr-sm-2" name="shades[]">
            @foreach($color as $val)
                @if($item['color_id'] == $val['id_color'])
                <option selected value="{{ $val['id_color'] }}">{{ $val['name_color'] }}</option>
                @else
                <option value="{{ $val['id_color'] }}">{{ $val['name_color'] }}</option>
                @endif
            @endforeach
        </select>
        @endforeach
        </div>
        <div class="js--add-apend btn btn-secondary btn">Добавить цвет</div>
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

    <script>
    $('.js--add-apend').on('click', function() {
     $(".js--append").append(`
        <select class="custom-select my-1 mr-sm-2" name="shades[]">
            @foreach($color as $val)
                <option value="{{ $val['id_color'] }}">{{ $val['name_color'] }}</option>
            @endforeach
        </select>`);
    });
    </script>
</body>

</html>
