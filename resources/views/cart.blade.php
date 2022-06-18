<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('styles')

    <title>ДверОк — Корзина</title>

</head>

<body>

    @include('header')
    <section class="cart-section">
        <div class="cart-section__title title1">
            Корзина
        </div>
        <div class="cart-section__description paragraph">
            @foreach($cart as $item)
            <div class="cart-section__cart-item cart-item">
                <a class="cart-item__link js-link" href="">
                    <img class="cart-item__photo js-photo"
                            src="{{ asset('storage/app/variation') }}/{{ $item['attributes']['img'] }}">
                </a>
                <div class="cart-item__name-wrapper">
                    <div class="title3 cart-item__subtitle js-name">{{ $item['name'] }}</div>
                    <div class="cart-item__properties js-properties">
                        <div class="paragraph cart-item__property js-property">Цвет: {{ !isset($item['attributes']['color'])  ? "" :   $item['attributes']['color'] }} </div>
                        <div class="paragraph cart-item__property js-property">Материал: {{ !isset($item['attributes']['material']) ? "" :  $item['attributes']['material'] }}</div>
                    </div>
                </div>
                <div class="cart-item__number">
                     <div class="title3 cart-item__subtitle">Количество:</div>
                   <div class="paragraph">
                        {{ $item['quantity'] }}
                    </div>
                </div>
                @if($item['price'] != 0)
                <div class="cart-item__sum">
                    <div class="title3 cart-item__subtitle">Сумма:</div>
                    <div class="paragraph cart-item__sum-content js-sum" >{{ $item['price'] * $item['quantity'] }}</div>
                </div>
                @endif
                <div class="cart-item__remove js--remove paragraph" id_del="{{ $item['id'] }}">
                    Удалить из корзины
                </div>
            </div>
            @endforeach
            @if(count($cart) == 0)
            Ваша корзина пуста.
            <br>
            Если у вас есть вопросы, вы можете оставить заявку и мы вам перезвоним.
            <button class="button button-text js-order cart-section__button cart-section__button--empty">
                Оформить заказ
            </button>
            @endif
        </div>
        @if(count($cart) != 0)
        <div class="cart-section__content">
            <div class="cart-section__content-items">
            </div>
        </div>
        <div class="cart-section__control-wrapper">
            <div class="cart-section__control">
                <div class="cart-section__control-title title3">
                    Итого:
                </div>
                <div class="cart-section__control-sum title2">
                <span class="js-control-price">
                <?php $x=0; ?>
                @foreach($cart as $item)
                <?php $x=$x + $item['price'] * $item['quantity'] ; ?>
                @endforeach
                <?php echo $x; ?>
                </span> Р
                </div>
                <button class="button button-text js-cart-order cart-section__button title4">
                    Оформить заказ
                </button>
            </div>
        </div>
        @endif

        <div class="side-menu js-cart-order-menu">
            <div class="side-menu__wrapper">
                <div class="side-menu__content order-modal">
                    <div class="order-modal__description">
                        <div class="title1 order-modal__title">
                            Оформление заказа
                        </div>
                        <div class="paragraph">
                            Оставьте ваши контактные данные и мы вам перезвоним, для уточнения заказа
                        </div>
                    </div>
                    <form class="order-modal__form" action="{{ route('order') }}" method="POST">
                         @csrf
                        <label class="order-modal__label title4">
                            Имя
                            <input class="order-modal__input title4" placeholder="Никита" name="name" type="text" require>
                            <div class="error">Неверный формат имени</div>
                        </label>
                        <label class="order-modal__label title4">
                            Телефон
                            <input class="order-modal__input title4" placeholder="+7 999 999 9999" name="phone"
                                type="tel" require>
                            <div class="error">Неверный формат телефона</div>
                        </label>
                        <input class="button order-modal__button title4" type="submit" value="Оформить заказ">
                        <div class="order-modal__note">
                            Нажимая кнопку “оформить заказ”, вы соглашаетесь с политикой конфиденциальности и политикой
                            обработки данных
                        </div>
                    </form>
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
        $('.js-cart-order-menu').modal($('.js-cart-order'));
        $(document).ready(function () {
            $(document).on('click', '.js--remove', function(e) {
                e.preventDefault();
                let id = Number($('.js--remove').attr('id_del'));
                $.ajax({
                    url: "{{ route('delItem') }}",
                    type: "POST",
                    data: JSON.stringify({
                        del: id
                    }),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                       console.log(data)
                    },
                    error: function (xhr, textStatus) {
                        console.log(textStatus)
                    },
                });
                $(this).parent('.cart-item').remove();
                if($('.cart-item').length == 0){
                    $('.header__cart-button').removeClass('cart-button--full');
                    $('.header__cart-button').toggleClass('cart-button');
                } 
            })
        })
    </script>
</body>

</html>
