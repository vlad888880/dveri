<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('styles')
    <title>ДверОК — Акции</title>

</head>

<body>
    <div class="flash"></div>
    @include('header')
    <section class="stock-section">
        <h1 class="title1 stock-section__title">Акции</h1>
        <div class="stock-section__wrapper">
            @if(count($stock) == 0)
                <div class="empty-services">
                    <img src="{{ asset('resources/images/empty.svg') }}" alt="На данный момент услуги отсутствуют">
                    <div>На данный момент акции отсутствуют</div>
                </div>
            @else
            <div class="stock-section__row">
                @foreach($stock as $key => $item)
                    @if(($key % 2) == 0)
                    <img data-id="" class="stock-section__image--first stock-section__image" src="{{ asset('storage/app/stock') }}/{{ $item['img_stock'] }}">
                    <div data-id="{{ $item['id_stock'] }}" class="js--stock-open stock-section__thumb--first stock-section__thumb">
                        <div class="title3 stock-section__thumb-title">
                            {{ $item['title_stock'] }}
                        </div>
                        <div class="paragraph">
                            {{ $item['subtitle_stock'] }}
                        </div>
                    </div>
                    <div data-id="" class="stock-section__description--first stock-section__description">
                        <div class="title2  stock-section__description-title">
                            {{ $item['title_stock'] }}
                        </div>
                        <div class="paragraph">
                            {{ $item['text_stock'] }}
                        </div>
                    </div>
                    @else
                    <img data-id="" class="stock-section__image--second stock-section__image" src="{{ asset('storage/app/stock') }}/{{ $item['img_stock'] }}">
                    <div data-id="{{ $item['id_stock'] }}" class="js--stock-open stock-section__thumb--second stock-section__thumb">
                        <div class="title3 stock-section__thumb-title">
                            {{ $item['title_stock'] }}
                        </div>
                        <div class="paragraph">
                            {{ $item['subtitle_stock'] }}
                        </div>
                    </div>
                    <div data-id="" class="stock-section__description--second stock-section__description">
                        <div class="title2  stock-section__description-title">
                            {{ $item['title_stock'] }}
                        </div>
                        <div class="paragraph">
                            {{ $item['text_stock'] }}
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
                <div class="stock-section__row">
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
     <script>
        $('.side-menu__cross').on('click', function() {
            $('.js--stock-modal').hide();
        })
        
        $('.js--stock-open').on('click', function() {
             $.ajax({
                url: '{{ route("get_stock") }}',
                type: "GET",
                data: {
                    id: $(this).attr('data-id')
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    $('.js--stock-modal').show();
                    $('.js-title').text(data['stock']['title_stock']);
                    $('.js-content').text(data['stock']['text_stock']);
                },
                error: function (xhr, textStatus) {

                },
            });
        })
    </script>
</body>

</html>
