<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('styles')
    <title>ДверОК</title>
</head>

<body>
    @include('header')
    <div style="height: 100px"></div>
    <div class="container" data-fs-scroll>
        <div class="sections">
            <div class="section">
                <div class="flash"></div>

                <section class="welcome-section">
                    <div class="welcome-section__images --header-img">
                        @foreach($slider as $item) 
                            @if(isset($item['img_slider']))
                            <?php if(substr($item->type_file, 0, strpos($item->type_file, "/")) != 'video'){ ?>
                                <img class="welcome-section__image" src="{{ asset('storage/app/carusel') }}/{{ $item['img_slider'] }}" alt="" >
                            <?php }else{ ?>
                                <video class="welcome-section__image vidio" src="{{ asset('storage/app/carusel') }}/{{ $item['img_slider'] }}" autoplay loop muted></video>
                            <?php }; ?>
                            @endif
                        @endforeach
                    </div>
                    <div class="welcome-section__images --header-mobile-img">
                        @foreach($slider as $item) 
                            @if(isset($item['img_slider_mobile']))
                            <?php if(substr($item->type_file_mobile, 0, strpos($item->type_file_mobile, "/")) != 'video'){ ?>
                                <img class="welcome-section__image-mobile" src="{{ asset('storage/app/carusel') }}/{{ $item['img_slider_mobile'] }}" alt="" >
                            <?php }else{ ?>
                                <video class="welcome-section__image-mobile vidio" src="{{ asset('storage/app/carusel') }}/{{ $item['img_slider_mobile'] }}" autoplay loop muted></video>
                            <?php }; ?>
                            @endif
                        @endforeach
                    </div>
                    <div class="welcome-section__descriptions">
                        <!-- Описание и заголовок -->
                        @foreach($slider as $item)
                        <div class="welcome-section__description-wrapper">
                            <div class="welcome-section__title">
                                <h2 class="title1 welcome-section__title-content"><pre>{!! $item['title_slider'] !!}</pre></h2>
                            </div>
                            <div class="paragraph welcome-section__description"><pre>{!! $item['subtitle_slider'] !!}</pre></div>

<!-- <a class="welcome-section__link button-text button--more"
    style="cursor: pointer; z-index:-1; position: absolute;"
    href="{{ $item['link_slider'] }}">Подробнее</a> -->
@if($item['title_slider'] == 'Наши партнеры')
<div class="bllok-right">
    <div class="slide__brand">
        @foreach($partner as $key => $item)
        @if($key%3 === 0 || $key === 0)
        <div class="slide__brand-col">
            @endif
            <div class="slide-img-container">
                <a href="{{ $item['link_partner'] }}"
                    style="cursor: pointer; min-width: 100%; min-hight: 100%;">
                    <img src="{{ asset('storage/app/partner') }}/{{ $item['img_partner'] }}"
                        alt="{{ $item['name_partner'] }}"
                        style="min-width: 70%; max-width: 70%; max-hight: 70%; min-hight: 70%; object-fit: cover">
                </a>
            </div>
            @if(($key%3) - 2 === 0 || $key - 2 === 0)
        </div>
        @endif
        @endforeach
        @if(count($partner)%3 != 0)
    </div>
    @endif
</div>
</div>
@endif
</div>
@endforeach
</div>
<div class="welcome-section__step-wrapper">
                <div class="welcome-section__step-buttons">
                    <button
                        class="button--prev button-text button--arrow welcome-section__step-button js-back">Назад</button>
                    <button
                        class="button--next button-text button--arrow welcome-section__step-button js-next">Далее</button>
                </div>
                @foreach($slider as $key => $item)
                <div class="welcome-section__step">
                    <div class="welcome-section__step-number button-text">0{{ $key + 1 }}</div>
                    <div class="paragraph welcome-section__paragraph">
                        {{ $item['title_slider'] }}</div>
                    <div class="progress-bar welcome-section__progress-bar">
                        <div class="progress-bar__background"></div>
                        <div class="progress-bar__indicator"></div>
                    </div>
                </div>
                @endforeach
            </div>
            </section>
        </div>
        <section class="our-doors-section section">
            <div class="our-doors-section__text">
                <div class="our-section__text-wrapper">
                    <div class="our-doors-section__tag">
                        Производитель
                    </div>
                    <h3 class="our-doors-section__title title1"></h3>
                    <p class="paragraph js--paragraph"></p>
                </div>
            </div>
            <div class="our-doors-section__buttons-wrapper">
                <button class="button button-text our-doors-section__button js-order-button">Оставить
                    заявку</button>
                <a class="button-text our-doors-section__button" href="{{ route('contact') }}"><button
                        class="our-doors-section__button--link button-text">Найти магазин</button></a>
            </div>

            <div class="our-doors-section__image-wrapper">
                <div class="our-doors-section__image">
                </div>
                <div class="our-doors-section__descriptions">

                    @foreach($partner as $key => $item)
                    <div class="our-doors-section__description selected">
                        <div class="title1 our-doors-section__description-number">{{ $key + 1 }}</div>
                        <div class="our-doors-section__description-wrapper">
                            <div class="our-doors-section__description-title paragraph">
                                {{ $item['mini_title'] }}
                            </div>
                            <div class="paragraph our-doors-section__description-text">
                                {{ $item['mini_subtitle'] }}
                            </div>
                        </div>
                        <div class="our-doors-section__description-buttons">
                            <button class="button--tick button--prev js-prev"></button>
                            <button class="button--tick button--next js-next"></button>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            <div class="our-doors-section__images-wrapper">
                <div class="our-doors-section__images">
                    @foreach($partner as $item)
                    <img src="{{ asset('storage/app/banner_of_partner') }}/{{ $item['bg_img'] }}">
                    <h1 style="display: none">{{ $item['name_partner'] }}</h1>
                    <h3 style="display: none">{!! $item['text_partner'] !!}</h3>
                    <span style="display: none">{{ $item['mini_title'] }}</span>
                    @endforeach
                </div>
                <div class="button--tick button--next our-doors-section__images-button js-next"></div>
            </div>
        </section>


        <section class="category-carousel-section section">
            <div class="category-carousel-section__title-wrapper">
                <div class="category-carousel-section__title">
                    <h2 class="title1">
                        Межкомнатные двери
                    </h2>
                </div>
                <div class="category-carousel-section__button-wrapper">
                    <button class="button--prev button--arrow button-text js-prev">Назад</button>
                    <button class="button--next button--arrow button-text js-next">Далее</button>
                </div>
            </div>
            <div class="category-carousel-section__image">
                @foreach($carusel1 as $item)
                <img src="{{ asset('storage/app/sliders') }}/{{ $item['img_carusel'] }}" />
                @endforeach
            </div>
            <div class="category-carousel-section__description-wrapper">
                <div class="category-carousel-section__description-container">
                    @foreach($carusel1 as $item)
                    <div class="category-carousel-section__description selected">
                        <h3 class="category-carousel-section__description-title title2">
                            {{ $item['title_carusel'] }}
                        </h3>
                        <p class="paragraph category-carousel-section__paragraph">
                            <span class="category-carousel-section__paragraph-price paragraph js--small-mobile">
                                {{ $item['subtitle_carusel'] }}
                            </span>
                            <span class="category-carousel-section__paragraph-text paragraph js--small-mobile">
                                {{ $item['text_carusel'] }}
                            </span>
                        </p>
                    </div>
                    @endforeach
                </div>
                <a href="/shop" class="category-carousel-section__link button--catalog"></a>
            </div>

        </section>

        <section class="category-carousel-section section">
            <div class="category-carousel-section__title-wrapper">
                <div class="category-carousel-section__title">
                    <h2 class="title1">
                        Входные двери
                    </h2>
                </div>
                <div class="category-carousel-section__button-wrapper">
                    <button class="button--prev button--arrow button-text js-prev">Назад</button>
                    <button class="button--next button--arrow button-text js-next">Далее</button>
                </div>
            </div>
            <div class="category-carousel-section__image">
                @foreach($carusel2 as $item)
                <img src="{{ asset('storage/app/sliders') }}/{{ $item['img_carusel'] }}" />
                @endforeach
            </div>
            <div class="category-carousel-section__description-wrapper">
                <div class="category-carousel-section__description-container">
                    @foreach($carusel2 as $item)
                    <div class="category-carousel-section__description selected">
                        <h3 class="category-carousel-section__description-title title2">
                            {{ $item['title_carusel'] }}
                        </h3>
                        <p class="paragraph category-carousel-section__paragraph">
                            <span class="category-carousel-section__paragraph-price paragraph js--small-mobile">
                                {{ $item['subtitle_carusel'] }}
                            </span>
                            <span class="category-carousel-section__paragraph-text paragraph js--small-mobile">
                                {{ $item['text_carusel'] }}
                            </span>
                        </p>
                    </div>
                    @endforeach
                </div>
                <a href="/shop" class="category-carousel-section__link button--catalog"></a>
            </div>
        </section>

        @if(count($carusel3) != 0)
        <section class="category-carousel-section section">
            <div class="category-carousel-section__title-wrapper">
                <div class="category-carousel-section__title">
                    <h2 class="title1">
                        Фурнитура
                    </h2>
                </div>
                <div class="category-carousel-section__button-wrapper">
                    <button class="button--prev button--arrow button-text js-prev">Назад</button>
                    <button class="button--next button--arrow button-text js-next">Далее</button>
                </div>
            </div>
            <div class="category-carousel-section__image">
                @foreach($carusel3 as $item)
                <img src="{{ asset('storage/app/sliders') }}/{{ $item['img_carusel'] }}" />
                @endforeach
            </div>
            <div class="category-carousel-section__description-wrapper">
                <div class="category-carousel-section__description-container">
                    @foreach($carusel3 as $item)
                    <div class="category-carousel-section__description selected">
                        <h3 class="category-carousel-section__description-title title2">
                            {{ $item['title_carusel'] }}
                        </h3>
                        <p class="paragraph category-carousel-section__paragraph">
                            <span class="category-carousel-section__paragraph-price paragraph js--small-mobile">
                                {{ $item['subtitle_carusel'] }}
                            </span>
                            <span class="category-carousel-section__paragraph-text paragraph js--small-mobile">
                                {{ $item['text_carusel'] }}
                            </span>
                        </p>
                    </div>
                    @endforeach
                </div>
                <a href="/shop" class="category-carousel-section__link button--catalog"></a>
            </div>
        </section>
        @endif
        @if(count($best) > 0)
        <div class="coments_section">
            <div class="category-carousel-section__title-wrapper">
                <div class="category-carousel-section__title">
                    <h2 class="title1">
                        Двери с лучшей ценной
                    </h2>
                </div>
                <div class="slick_arr">
                    <button class="button--prev button--arrow button-text js-prev-best-price">Назад</button>
                    <button class="button--next button--arrow button-text js-next-best-price">Далее</button>
                </div>
            </div>

            <div class="slick-slider-best-price">
                @foreach($best as $key => $item)
                @if($key > 15)
                @break
                @endif
                <div class="product-card catalog-section__product-card">
                    <a href="{{ route('model', ['id' => $item['id_door'], 'model' => $item->id_variation, 'type' => $item->type_variation]) }}"
                        class="product-card__link">
                        <img src="{{ asset('storage/app/variation') }}/{{ $item['img_variation'] }}" alt="Фото "
                            class="product-card__image">
                        <div class="product-card__text">
                            <h2 class="product-card__name title4">
                                {{ $item['name_variation'] }}
                            </h2>
                            <h3 class="button-text product-card__price">
                                От <span class="js-price">{{ number_format($item->price_door, 0, ',', ' ') }}</span>
                            </h3>
                        </div>
                        @if(isset($item['is_best_price']))
                        <div class="product-card__best-price-label">
                            Лучшая цена
                        </div>
                        @endif
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        @if(count($comment) != 0)
        <div class="coments_section">
            <div class="">
                <div class="">
                    <h2 class="title1">
                        Отзывы
                    </h2>
                </div>
                <div class="slick_arr dekstop">
                    <button class="button--prev button--arrow button-text js-prev-coments">Назад</button>
                    <button class="button--next button--arrow button-text js-next-coments">Далее</button>
                </div>
                <div class="slick_arr mobile">
                    <button class="button--prev button--arrow button-text js-prev-coments-m">Назад</button>
                    <button class="button--next button--arrow button-text js-next-coments-m">Далее</button>
                </div>
            </div>
            <div class="slick-slider-m mobile">
                @foreach($comment as $key => $item)
                <div class="coments">
                    <div class="coments-block">
                        <h1 class="coments-block__title">
                            {{ $item['name_comment'] }}
                        </h1>
                        <span class="coments-block__data">
                            @php
                            $date = new DateTime($item['date_comment']);
                            echo $date->format('d M Y');
                            @endphp
                        </span>
                        <h4 class="coments-block__text">
                            {{ $item['text_comment'] }}
                        </h4>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="slick-slider dekstop">
                @foreach($comment as $key => $item)
                    @if($key%4 === 0 || $key === 0)
                    <div class="coments">
                        @endif
                        <div class="coments-block">
                            <h1 class="coments-block__title">
                                {{ $item['name_comment'] }}
                            </h1>
                            <span class="coments-block__data">
                                @php
                                $date = new DateTime($item['date_comment']);
                                echo $date->format('d M Y');
                                @endphp
                            </span>
                            <h4 class="coments-block__text">
                                {{ $item['text_comment'] }}
                            </h4>
                        </div>
                        @if(($key%4) - 3 === 0 || $key - 3 === 0)
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        @endif
    </div>
    @include('contacts')
    @include('footer')
    <script src="{{ asset('resources/js/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('resources/js/welcome-section.js') }}"></script>
    <script src="{{ asset('resources/js/jquery.inview.min.js') }}"></script>
    <script src="{{ asset('resources/js/jquery.touchSwipe.min.js') }}"></script>
    <script src="{{ asset('resources/js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('resources/js/category-carousel-section.js') }}"></script>
    <script src="{{ asset('resources/js/our-doors-section.js') }}"></script>
    <script src="{{ asset('resources/js/jquery.easing.1.3.min.js') }}"></script>
    <script src="{{ asset('resources/js/header.js') }}"></script>
    <script src="{{ asset('resources/js/index.js') }}"></script>
    <script src="{{ asset('resources/js/slick.min.js') }}"></script>
</body>

</html>
