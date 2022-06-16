<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('styles')
    <title>ДверОК — Партнеры</title>

</head>

<body>
    <div class="flash"></div>
    @include('header')
    <section class="stock-section">
        <div class="contacts-section__title-wrapper fix-them">
            <h1 class="contacts-section__title title1">Наши партнеры</h1>
            <p class="paragraph">Мы сотрудничаем с лучшими фабриками России</p>
        </div>
        <div class="partners_block">
            @foreach($partners as $partner)
                <a href="{{ $partner['link_partner'] }}" class="partners_item">
                    <div class="partners_img">
                        <img src="{{ asset('storage/app/partner') }}/{{ $partner['img_partner'] }}" alt="">
                    </div>
                    <div class="partners_text">
                        <h5>{{ $partner['name_partner'] }}</h5>
                        <h6>{{ $partner['text_partner'] }}</h6>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
    @include('contacts') 
    @include('footer')
    @include('scripts')
</body>

</html>
