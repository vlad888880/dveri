<header class="header">
    <div class="header__content">
        <a class="header__logo" href="{{ route('welcome') }}">
            <img class="logo" alt="ДверОК" src="{{ asset('resources/images/logo.svg') }}" />
        </a>
        <ul class="header__nav">
            <li class="header__nav-item">
                <a class="header__nav-link" href="{{ route('about') }}">О нас</a>
            </li>
            
            <li class="header__nav-item">
                <a class="header__nav-link" href="{{ route('shop') }}">Каталог</a>
            </li>
            <li class="header__nav-item">
                <a class="header__nav-link" href="{{ route('services') }}">Услуги</a>
            </li>
            <li class="header__nav-item">
                <a class="header__nav-link" href="{{ route('stocks') }}">Акции</a>
            </li>
            <li class="header__nav-item">
                <a class="header__nav-link" href="{{ route('feedback') }}">Отзывы</a>
            </li>
            <li class="header__nav-item">
                <a class="header__nav-link" href="{{ route('completed') }}">Выполненные работы</a>
            </li>
            <li class="header__nav-item">
                <a class="header__nav-link" href="{{ route('cart') }}">Корзина</a>
            </li>
        </ul>
        <div class="header__buttons-wrapper">
            <button class="button header__button button--header button-text js-order-button">
                Оставить заявку
            </button> 
            <button class="hamburger hamburger--mobile header__hamburger js-burger-button">
                <div class="hamburger__element"></div>
                <div class="hamburger__element"></div>
                <div class="hamburger__element"></div>
            </button>
        </div>
    </div>
    <div class="header__background"></div>
    <div class="side-menu js-order-menu">
        <div class="side-menu__wrapper">
            <div class="side-menu__content order-modal">
                <div class="order-modal__description">
                    <div class="title1 order-modal__title">
                        Оставить заявку
                    </div>
                    <div class="paragraph">
                        Оставьте ваши контактные данные и мы вам перезвоним.
                    </div>
                </div>
                <form class="order-modal__form" action="{{ route('app') }}" method="POST">
                @csrf
                    <label class="order-modal__label title4">
                        Имя
                        <input class="order-modal__input title4" placeholder="Сергей" name="name" type="text" required>
                        <div class="error">Не верный формат имени</div>
                    </label>
                    <label class="order-modal__label title4">
                        Телефон
                        <input class="order-modal__input title4" placeholder="+7 999 999 9999" name="phone" type="tel" required>
                        <div class="error">Не верный формат телефона</div>
                    </label>
                    <button class="button order-modal__button title4">Отправить заявку</button>
                    <a class="order-modal__note" href="{{ route('politika') }}">
                        Нажимая кнопку “отправить заявку”, вы соглашаетесь с политикой конфиденциальности и
                        политикой обработки данных
                    </a><br><br>
                    This site is protected by reCAPTCHA and the Google
                    <a class="order-modal__note" href="https://policies.google.com/privacy">
                    Privacy Policy
                    </a>
                    and
                    <a class="order-modal__note" href="https://policies.google.com/terms">
                    Terms of Service
                    </a>apply.
                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                </form>
                <div class="side-menu__cross">

                </div>
            </div>
        </div>
    </div>
    <div class="side-menu js-order-feedback">
        <div class="side-menu__wrapper">
            <div class="side-menu__content order-modal">
                <div class="order-modal__description">
                    <div class="title1 order-modal__title">
                        Оставить отзыв
                    </div>
                </div>
                <form class="order-modal__form" action="{{ route('komm') }}" method="POST"
                    id="commentform" novalidate="">
                    @csrf
                    <label class="order-modal__label title4">
                        Имя
                        <input class="order-modal__input title4" id="author" name="author" type="text" value=""
                            size="30" maxlength="245" required>
                        <div class="error">Не верный формат имени</div>
                    </label>
                    <label class="order-modal__label title4">
                        E-mail
                        <input class="order-modal__input title4" id="email" name="email" type="email" value="" size="30"
                            maxlength="100" aria-describedby="email-notes" required>
                        <div class="error">Не верный формат E-mail</div>
                    </label>
                    <label class="order-modal__label title4">
                        Телефон
                        <input class="order-modal__input title4" placeholder="+7 999 999 9999" name="phone" type="tel">
                        <div class="error">Не верный формат телефона</div>
                    </label>
                    <label class="order-modal__label title4">
                        Отзыв
                        <textarea class="order-modal__input title4" id="comment" name="comment" cols="45" rows="8"
                            maxlength="65525" required></textarea>
                    </label>
                    <input class="button order-modal__button title4" type="submit" value="Отправить заявку">
                    <a class="order-modal__note" href="{{ route('politika') }}">
                        Нажимая кнопку “отправить заявку”, вы соглашаетесь с политикой конфиденциальности и
                        политикой обработки данных
                    </a><br><br>
                    This site is protected by reCAPTCHA and the Google
                    <a class="order-modal__note" href="https://policies.google.com/privacy">
                    Privacy Policy
                    </a>
                    and
                    <a class="order-modal__note" href="https://policies.google.com/terms">
                    Terms of Service
                    </a>apply.
                    <input type="hidden" name="recaptcha_response" id="recaptchaKomm">
                </form>
                <div class="side-menu__cross">

                </div>
            </div>
        </div>
    </div>
    @if(Session::has('ok'))
    <div id="approve" class="side-menu" style="display: flex !important">
        <div class="side-menu__wrapper">
            <div class="side-menu__content answer-modal">
                <div class="answer-modal__description">
                    <div class="title1 answer-modal__title">
                        Данные успешно отправлены
                    </div>
                    <div class="paragraph">
                        Наш менеджер с вами свяжется в течении 10 минут.
                    </div>
                </div>
                <button class="title4 button answer-modal__button">Хорошо</button>
                <div class="side-menu__cross">

                </div>
            </div>
        </div>
    </div>
    @endif
    @if(Session::has('error'))
    <div id="denied" class="side-menu" style="display: flex !important">
        <div class="side-menu__wrapper">
            <div class="side-menu__content answer-modal">
                <div class="answer-modal__description">
                    <div class="title1 answer-modal__title">
                        Ошибка отправки данных!
                    </div>
                    <div class="paragraph">
                        Попробуйте отправить их снова.
                    </div>
                </div>
                <button class="title4 button answer-modal__button">Хорошо</button>
                <div class="side-menu__cross">

                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="side-menu side-menu--mobile js-mobile-menu">
        <div class="side-menu__wrapper side-menu__wrapper--mobile">
            <div class="side-menu__content mobile-menu">
                <ul class="mobile-menu__nav">
                    <li class="mobile-menu__nav-item">
                        <a class="title1" href="{{ route('partners') }}">Наши партеры</a>
                    </li>
                    <li class="mobile-menu__nav-item">
                        <a class="title1" href="{{ route('services') }}">Услуги</a>
                    </li>
                    <li class="mobile-menu__nav-item">
                        <a class="title1" href="{{ route('stocks') }}">Акции</a>
                    </li>
                    <li class="mobile-menu__nav-item">
                        <a class="title1" href="{{ route('about') }}">О нас</a>
                    </li>
                    <li class="mobile-menu__nav-item">
                        <a class="title1" href="{{ route('contact') }}">Контакты</a>
                    </li>
                    <li class="mobile-menu__nav-item">
                        <a class="title1" href="{{ route('completed') }}">Выполненные работы</a>
                    </li>
                </ul>
                <button class="button mobile-menu__button js-order-button">
                    Оставить заявку
                </button>
            </div>
        </div>
    </div>
</header>
