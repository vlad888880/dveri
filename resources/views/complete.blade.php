<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Добавление выполненой работы</title>
</head>


<body style="margin: 2em 15em">
    <form action="{{ route('complete_new') }}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="form-group">
            <label >Картинка для декстопа</label>
            <input type="file" name="img" class="form-control-file">
        </div>
        <div class="form-group">
            <label >Заголовок</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label >Описание</label>
            <input type="text" name="description" class="form-control">
        </div>
        <div class="form-group">
            <label >Задача</label>
            <input type="text" name="purpose" class="form-control">
        </div>
        <div class="form-group">
            <label >Проведенные работы</label>
            <textarea class="form-control" name="works" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label >Отзыв клиента</label>
            <input type="text" name="feedback" class="form-control">
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
