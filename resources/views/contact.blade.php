<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('styles')



    <title>ДверОК — контакты</title>

</head>

<body>


    @include('header')
    <div style="height: 100px"></div>
    @include('contacts')     
    @include('footer')          
    @include('scripts')

</body>

</html>
