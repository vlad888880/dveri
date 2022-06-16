<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('styles')
    <title>ДверОК — {{ $work['name'] }}</title>

</head>

<body>
    <!-- <div class="flash"></div> -->
    @include('header')
    <section class="stock-section completed-section">
         <div class="completed_routes article-section__breadcrumb breadcrumb">
         <div class="article-section__breadcrumb breadcrumb">
                    <a href="{{ route('welcome') }}">Главная</a>
                    <a href="{{ route('completed') }}">Выполненные работы</a>
                    <a href="">{{ $work['name'] }}</a>
         </div> 
         </div>
        <div class="partners_block" style='display: block'>
            <!-- <div class="partners_item"> -->
                <div>
                <h1 class="completed_title">{{ $work['name'] }}</h1>
                <div class='services-section__slider'>
                    @foreach($fotos as $image)
                    <div class='services-section__slide'>
                            <img src="{{ asset('storage/app/service') }}/{{ $image }}" alt="" class="section-project__single-project-main-image">
                        </div> 
                        @endforeach
               </div>

                </div>
                <div class="block block-ancor">
                    <a class="purpose" href="#purpose">Задача</a>
                    <a class="works" href="#works">Проведённые работы</a>
                    <a class="feedback" href="#feedback">Отзыв клиента</a>
                </div>
                <div class='service_description'>
                <div class="service_about">
                        <h2 id='purpose'>Задача</h2>
                        <div class="service_about__text">
                        {{ $work['purpose'] }}
                        </div>
                </div>
                <div  class="service_include">
                        <h2 id='works'>Проведённые работы</h2>
                        <div class="service_include__text">
                            <pre>{{ $work['works'] }}</pre>
                        </div>
                </div>
                <div  class="service_offer">
                        <h2 id='feedback'>Отзыв клиента</h2>
                        <div class="service_offer__text">
                        {{ $work['feedback'] }}
                        </div>
                </div>
            <!-- </div>  -->
            </div>
        </div>
    </section>
    @include('contacts') 
    @include('footer')
    @include('scripts')
    <script>

        $(function() {
            $('.services-section__slider').slick({
                arrows: false,
                dots: true
            })
        })

        $('.section-project__single-project-slider-main').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.section-project__single-project-slider-pre'
        });
        $('.section-project__single-project-slider-pre').slick({
            slidesToShow: 7,
            slidesToScroll: 1,
            dots: false, 
            arrows: false,
            autoplay: true,
            focusOnSelect: true,
            asNavFor: '.section-project__single-project-slider-main'
        });
    </script>
</body>

</html>
