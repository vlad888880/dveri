<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        @include('styles')
    <title>Редактирование </title>
</head>


<body style="margin: 2em 15em">

    <form action="{{ route('stock_edit', ['id' => $stock[0]->id_stock]) }}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    {{ method_field('PATCH') }}
        <div class="form-group">
            <label >Картинка партнера</label>
            <img src="{{ asset('storage/app/stock') }}/{{ $stock[0]->img_stock }}" alt="" style="max-width: 15rem; border: 1px solid black">
            <input type="file" name="img_stock" class="form-control-file">
        </div>
        <div class="form-group">
            <label >Заголовок</label>
            <input type="text" name="title_stock" class="form-control" value="{{ $stock[0]->title_stock }}">
        </div>
        <div class="form-group">
            <label >Подзаголовок</label>
            <input type="text" name="subtitle_stock" class="form-control" value="{{ $stock[0]->subtitle_stock }}">
        </div>
        <div class="form-group">
            <label >Текст</label>
            <textarea name="text_stock" id="" cols="30" rows="10" class="form-control">{{ $stock[0]->text_stock }}</textarea>
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
</body>

</html>
