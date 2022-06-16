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

    <form action="{{ route('partner_edit', ['id' => $partner[0]->id_partner]) }}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    {{ method_field('PATCH') }}
        <div class="form-group">
            <label >Картинка партнера</label>
            <img src="{{ asset('storage/app/partner') }}/{{ $partner[0]->img_partner }}" alt="" style="max-width: 15rem; border: 1px solid black">
            <input type="file" name="img_partner" class="form-control-file">
        </div>
        <div class="form-group">
            <label >Название партнера</label>
            <input type="text" name="name_partner" class="form-control" value="{{ $partner[0]->name_partner }}">
        </div>
        <div class="form-group">
            <label >Картинка на слайдер в главной</label>
            <img src="{{ asset('storage/app/banner_of_partner') }}/{{ $partner[0]->bg_img }}" alt="" style="max-width: 15rem; border: 1px solid black">
            <input type="file" name="bg_img" class="form-control-file">
            <small>Используеться для слайдера</small>
        </div>
        <div class="form-group">
            <label >текст о партнере</label>
            <input type="text" name="text_partner" class="form-control" value="{{ $partner[0]->text_partner }}">
            <small>Используеться для слайдера</small>
        </div>
        <div class="form-group">
            <label >заголовок</label>
            <input type="text" name="mini_title" class="form-control" value="{{ $partner[0]->mini_title }}">
            <small>Используеться для слайдера</small>
        </div>
        <div class="form-group">
            <label >подзаголовок</label>
            <input type="text" name="mini_subtitle" class="form-control" value="{{ $partner[0]->mini_subtitle }}">
            <small>Используеться для слайдера</small>
        </div>
        <div class="form-group">
            <label >Ссылка на  партнера</label>
            <input type="text" name="link_partner" class="form-control" value="{{ $partner[0]->link_partner }}">
            <small>Используеться для слайдера</small>
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
