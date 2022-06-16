<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .fotos {
            display: flex;
        }
        .del_foto {
            width: 100px;
            margin: 0 10px;
        }
        .del {
            cursor: pointer;
        }
        .del_foto > img {
            object-fit: cover;
            min-width: 100%;
            min-height: 100%;
        }
    </style>
    <title>Редактор двери {{ $complete->name }}</title>
</head>


<body style="margin: 2em 15em">

    <form action="{{ route('complete_edit', ['id' => $complete->id]) }}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    {{ method_field('PATCH') }}
        <div class="form-group">
            <label >Картинка услуги</label>
            <img src="{{ asset('storage/app/service') }}/{{ $complete->path }}" alt="" style="max-width: 5rem">
            <input type="file" name="img" class="form-control-file">
        </div>
        <div class="form-group">
            <label >Название</label>
            <input type="text" name="name" class="form-control" value="{{ $complete->name }}">
        </div>
        <div class="form-group">
            <label >Описание</label>
            <input type="text" name="description" class="form-control" value="{{ $complete->description }}">
        </div>
        <div class="form-group">
            <label>Задача</label>
            <input type="text" name="purpose" class="form-control" value="{{ $complete->purpose }}">
        </div>
        <div class="form-group">
            <label >Проведённые работы</label>
            <textarea class="form-control" name="works" rows="10">{{ $complete->works }}</textarea>
        </div>
        <div class="form-group">
            <label >Отзыв клиента</label>
            <input type="text" class="form-control" name="feedback" value="{{ $complete->feedback }}" />
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <form action="{{ route('complete_foto_new') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="id" value="{{ $complete->id }}">
        <label >Добавить картинки</label>
        <div class="fotos">
            @foreach($fotos as $foto)
            <div class="del_foto" data_id="{{ $foto->id }}">
                <div class="del" foto_id="{{ $foto->id }}">delete</div>
                <img src="{{ asset('storage/app/service') }}/{{ $foto->path }}" alt="" style="max-width: 5rem">
            </div>
            @endforeach
        </div>
        <div class="form-group">
            <input type="file" name="img[]" class="form-control-file" multiple>
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
    
    @include('scripts')
    <script>
        $('.del').on('click', function() {
            $.ajax({
                url: '{{ route("complete_foto_del") }}',
                type: "POST",
                data: JSON.stringify({
                    id: $(this).attr('foto_id')
                }),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    $(`.del_foto[data_id=${$(this).attr('foto_id')}]`).remove();
                },
                error: function (xhr, textStatus) {

                },
            });
        });
    </script>
</body>

</html>
