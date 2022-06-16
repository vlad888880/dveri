<footer class="footer section">
    <div class="footer__info">
        <img class="logo logo--footer footer__logo" alt="ДверОК" src="{{ asset('resources/images/logo.svg') }}" />
    </div>
    <div class="footer__links">
        <div class="footer__menu">
            <div class="button-text">Меню</div>
            <div class="footer__menu-list">
                <div class="footer__nav footer__nav--menu">
                    <a class="footer__link" href="{{ route('welcome') }}">Главная</a>
                    <a class="footer__link" href="{{ route('services') }}">Услуги</a>
                    <a class="footer__link" href="{{ route('stocks') }}">Акции</a>
                    <a class="footer__link" href="{{ route('shop') }}">Каталог</a>
                </div>
                <div class="footer__nav footer__nav--menu">
                    <a class="footer__link" href="{{ route('about') }}">О нас</a>
                    <a class="footer__link" href="{{ route('contact') }}">Контакты</a>
                    <a class="footer__link" href="{{ route('completed') }}">Выполненные работы</a>
                </div>
            </div>
        </div>
        <div class="footer__security">
            <div class="button-text">Безопасность</div>
            <div class="footer__nav">  
                <a class="footer__link" href="{{ route('politika') }}">Политика обработки персональных данных</a>
                <a class="footer__link" href="{{ route('politika') }}">Политика конфиденциальности</a>
            </div>
        </div>
    </div>
</footer>
