<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('styles')
    <title>ДверОК — Услуги</title> 
</head>

<body>
    @include('header')
    <section class="service-section">
        <div class="service">
            <div class="article-section__breadcrumb breadcrumb">
                <a href="{{ route('welcome') }}">Главная</a>
                <a href="{{ route('services') }}">Услуги</a>
                <a href="">{{ $service['title_service'] }}</a>
            </div> 
            <div class="service_card__item">
                <div class="section-project__single-project-slider">
                    <div class="section-project__single-project-slider-main"> 
                        @foreach($fotos as $image)
                        <div class="test-img">
                            <img src="{{ asset('storage/app/service') }}/{{ $image }}" alt=""
                                class="section-project__single-project-main-img">
                        </div>
                        @endforeach
                    </div>
                    @if(count($fotos) > 1)
                    <div class="section-project__single-project-slider-pre">
                        @foreach($fotos as $image)
                        <div>
                            <img src="{{ asset('storage/app/service') }}/{{ $image }}" alt=""
                                class="section-project__single-project-main-img">
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                <div class="service_card__text">
                    <h2 class="service_card__name title2">
                        {{ $service['title_service'] }}
                    </h2>
                    <h3 class="button-text service_card__price">
                        От {{ $service['price'] }} Р                           
                    </h3>
                    <button class="button_service js-order-button">Оставить заявку</button>
                </div>
            </div>
        </div>
        </div>
            <div class="block block-ancor">
                @if($service['subtitle_service'])
                <a class="about" href="#about">Об услуге</a>
                @endif
                @if($service['text'])
                <a class="property" href="#property">В стоимость входит</a>
                @endif
                @if(count($services) > 0)
                <a class="recamend" href="#recamend">Рекомендуемые услуги</a>
                @endif
            </div>
            <div class='service_description'>
                @if($service['subtitle_service'])
                <div class="service_about">
                    <h2 id='about'>Об услуге</h2>
                    <div class="service_about__text">
                        {{ $service['subtitle_service'] }}
                    </div>
                </div>
                @endif
                @if($service['text'])
                <div  class="service_include">
                    <h2 id='property'>В стоимость входит:</h2>
                    <div class="service_include__text">
                        <pre>{{ $service['text'] }} </pre>
                    </div>
                </div>
                @endif
                @if(count($services) > 0)
                <div class="service_offer">
                    <h2 id='recamend'>Рекомендуемые услуги</h2>
                </div>
                <div class="article-section__selectors article-section__selectors--desktop js-selectors" style="margin-top: 40px">
                    <div class="article-section__tab-wrapper">
                        <div class="article-section__tab js-tab selected">
                            <div class="article-section__model-material model-material">
                                <div class="model-material__grid js-grid-model js-grid">
                                    <div class="model-material__content js-content">
                                        @foreach($services as $service)
                                            <a href="{{ route('serviceone', ['id' => $service['id_service']]) }}" class="model-material__item">
                                                <img class="services_photos__block" style="margin: 0 10px; width: 285px; height: 285px;"  
                                                    src="{{ asset('storage/app/service') }}/{{ $service->img_service }}" />
                                            </a>
                                        @endforeach
                                    </div>
                                    <div class="page-selector model-material__page-selector">
                                        <span class="page-selector__prev">Назад</span>
                                        <span class="page-selector__numbers">
                                            <span class="page-selector__number">01</span>
                                            <span class="page-selector__count">01</span>
                                        </span>
                                        <span class="page-selector__next">Далее</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                @endif
            </section>

    @include('contacts')
    @include('footer')
    @include('scripts')
</body>

</html>
