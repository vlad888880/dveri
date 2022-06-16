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
    <section class="">
        <div class="services-section__banner">
          <div class='services-section__slider'>
            @foreach($service_banner as $banner)
            <div class='services-section__slide'>
                <img class='banner_img' src="{{ asset('storage/app/service') }}/{{ $banner['path'] }}" alt="Баннер отсутствует">
                <div class="services-section__banner_block">
                    <h2 class="banner_title title2">{{ $banner['name'] }}</h2> 
                    <p class="banner_title__text">{{ $banner['description'] }}</p> 
                    @if($banner['link'])
                    <a href="{{ $banner['link'] }}" class="banner_title__link"><small>Подробнее</small>    
                        <svg width="73" height="48" viewBox="0 0 73 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.5">
                            <circle cx="49" cy="24" r="22.5" stroke="#333333" stroke-width="3"/>
                            <rect y="23" width="49" height="2" fill="#333333"/>
                            </g>
                        </svg>
                    </a> 
                    @endif
                </div>
            </div> 
            @endforeach   
          </div>
        </div>
        <div class="services-section__banner_mobile">
            <div class='services-section__slider_mobile'>
                @foreach($service_banner as $banner)
                <div class='services-section__slide'>
                    <img class='banner_img' src="{{ asset('storage/app/service') }}/{{ $banner['path'] }}" alt="Баннер отсутствует">

                    <div class="services-section__banner_mobile">
                        <h2 class="banner_title title2">{{ $banner['name'] }}</h2> 
                        <p class="banner_title__text">{{ $banner['description'] }}</p> 
                        @if($banner['link'])
                        <a href="{{ $banner['link'] }}" class="banner_title__link_m"><small>Подробнее</small>    
                            <svg width="36" height="24" viewBox="0 0 36 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="24" cy="12" r="11" stroke="#333333" stroke-width="2"/>
                                <line y1="11.9863" x2="23" y2="11.9863" stroke="#333333" stroke-width="2"/>
                            </svg>
                        </a> 
                        @endif
                  </div>

                </div>
                @endforeach 
            </div>
        </div>
        
        <div class="services-section__wrapper services-section__wrapper--without-description">
            <h1 class="services-section__title title1">Услуги</h1>
            @if(count($service) == 0 && count($service_banner) == 0)
            <div class="empty-services">
                <img src="{{ asset('resources/images/empty.svg') }}" alt="На данный момент услуги отсутствуют">
                <div>На данный момент услуги отсутствуют</div>
            </div>
            @else
            <div class="services">
                @foreach($service as $key => $item)
                 <div class="product-card catalog-section__product-card services_product__card">
                    <a href="{{ route('serviceone', ['id' => $item['id_service']]) }}" class="product-card__link">
                        <img src="{{ asset('storage/app/service') }}/{{ $item['img_service'] }}" alt="Фото"
                            class="product-card__image">
                        <div class="product-card__text">
                            <h2 class="product-card__name title4">
                                {{ $item['title_service'] }} 
                            </h2>
                            <h3 class="button-text product-card__price">
                                {{ $item['price'] }} Р {{ $item['id'] }}
                            </h3>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            @endif
        </div>

        <div class="side-menu js-service-menu js--services-modal">
            <div class="side-menu__wrapper">
                <div class="side-menu__content order-modal">
                    <div class="service-modal__description">
                        <div class="title1 service-modal__title js-title">
                           
                        </div>
                        <div class="service-modal__title js-price">
                           
                        </div>
                        <div class="tt">
                            Об услуге
                        </div>
                        <div class="js-content service-modal__content">

                        </div>
                        <div  class="tt">
                            В стоимость входит: 
                        </div>
                        <div class="js-text service-modal__content">

                        </div>
                    </div>
                    <!-- <button class="button button-text js-service-button service-modal__button">Оставить заявку</button> -->
                    <div class="side-menu__cross">

                    </div>
                </div>
            </div>
        </div>
        
    </section>

    @include('contacts')
    @include('footer')
    @include('scripts')
    <script>

        $(function() {
            $('.services-section__slider').slick()
        })
        $(function() {
            $('.services-section__slider_mobile').slick({
                arrows: false,
                dots: true
            })
        })

        $('.side-menu__cross').on('click', function() {
            $('.js--services-modal').hide();
        })
        
        $('.js--services').on('click', function() {
             $.ajax({
                url: '{{ route("get_service") }}',
                type: "GET",
                data: {
                    id: $(this).attr('id_servise')
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    $('.js--services-modal').show();
                    $('.js-title').text(data['service']['title_service']);
                    $('.js-content').text(data['service']['subtitle_service']);
                    $('.js-text').html(data['service']['text']);
                    $('.js-price').text(data['service']['price']);
                },
                error: function (xhr, textStatus) {

                },
            });
        })
    </script>
</body>

</html>
