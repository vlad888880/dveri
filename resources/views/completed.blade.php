<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('styles')
    <title>ДверОК — Выполненные проекты</title>

</head>

<body>
    <div class="flash"></div>
    @include('header')
    <section class="stock-section">
    <div class="contacts-section__title-wrapper">
        <h1 class="contacts-section__title title1">Выполненные работы</h1>
        <p class="paragraph"></p>
    </div>
    <div class="stock-section__wrapper">
        @if(count($completed_works) == 0)
        <div class="empty-services">
            <img src="{{ asset('resources/images/empty.svg') }}" alt="На данный момент услуги отсутствуют">
            <div>На данный момент работы отсутствуют</div>
        </div>
        @else
        <div class="partners_block">
        @foreach($completed_works as $work)
            <a href="{{ route('completedone', ['id' => $work['id']]) }}" class="partners_item">
                <div class="competed_img">
                    <img src="{{ asset('storage/app/service') }}/{{ $work['path'] }}" alt="">
                </div>
                <div class="partners_text">
                    <h5>{{ $work['name'] }}</h5>
                    <h6>{{ $work['description'] }}</h6>
                </div>
            </a>
        @endforeach
        </div>
        @endif
    </div>

    <div class="side-menu js--stock-modal">
        <div class="side-menu__wrapper">
            <div class="side-menu__content stock-modal">
                <div class="js-title title1 stock-modal__title js-stock-title">
                    
                </div>
                <div class="js-content paragraph js-stock-description">
                    
                </div>
                <div class="side-menu__cross">
                </div>
            </div>
        </div>
    </div>
</section>
    @include('contacts') 
    @include('footer')
    @include('scripts')
</body>

</html>
