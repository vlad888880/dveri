<style>
    iframe {
        max-height: 100% !important;
        min-height: 100% !important;
        min-width: 100% !important;
        max-width: 100% !important;
        overflow: hidden;
    }

</style>
<section class="contacts-section section">
    @foreach($contacts as $key => $item)
    <div data-contacts="{{ $key }}" class="side-menu js-contacts">
        <div class="side-menu__wrapper">
            <div class="side-menu__content contacts-menu">
                <div class="contacts-menu__title title1">
                    {{ $item['name_contacts'] }}
                </div>
                <div class="contacts-menu__label gray-text paragraph">
                    Адрес:
                </div>
                <div class="contacts-menu__info paragraph paragraph--semi-bold">
                    {{ $item['addres_contacts'] }}
                </div>
                <div class="contacts-menu__label gray-text paragraph ">
                    Телефон:
                </div>
                <a href="tel:{{ $item['phone_contacts'] }}" class="contacts-menu__info paragraph paragraph--semi-bold">
                    {{ $item['phone_contacts'] }}
                </a>
                <div class="contacts-menu__label gray-text paragraph">
                    Режим работы:
                </div>
                <div class="contacts-menu__info contacts-menu__info--schedule paragraph">
                    <div class="contacts-menu__schedule-item">
                        <span class="contacts-menu__schedule-label gray-text">пн-пт</span>
                        <span class="paragraph--semi-bold">{{ $item['mode_weekdays'] }}</span>
                    </div>
                    <div class="contacts-menu__schedule-item">
                        <span class="contacts-menu__schedule-label gray-text">сб</span>
                        <span class="paragraph--semi-bold">{{ $item['mode_saturday'] }}</span>
                    </div>
                    <div class="contacts-menu__schedule-item">
                        <span class="contacts-menu__schedule-label gray-text">вс</span>
                        <span class="paragraph--semi-bold">{{ $item['mode_sunday'] }}</span>
                    </div>
                </div>

                <div class="side-menu__cross">

                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="contacts-section__title-wrapper">
        <h2 class="contacts-section__title title1">Как нас найти</h2>
        <p class="paragraph">

            Приходите к нам за покупками!<br>
            По всем вопросам работы сайта пишите сюда:
            <a class="contacts-section__title-link"><b>{{ isset($settings[0]['email']) ? $settings[0]['email'] : "" }}</b></a>
        </p>
    </div>

    <div class="contacts-section__info-buttons">
        @foreach($contacts as $key => $item)
        <a href="{{ $item['link'] }}"
            class="contacts-section__info-button  button--tick button--contacts js-contacts-button title4">
            {{ $item['name_contacts'] }}
        </a>
        @endforeach
    </div>


    <div class="contacts-section__infos">
        @foreach($contacts as $key => $item)
        <div class="contacts-section__info-wrapper">
            <div class="contacts-section__info-title title2">
                {{ $item['name_contacts'] }}
            </div>
            <div class="contacts-section__info">
                <div>
                    <div class="gray-text">
                        Адрес:
                    </div>
                    <div>
                        {{ $item['addres_contacts'] }}
                    </div>
                </div>
                <div>
                    <div class="gray-text">
                        Телефон:
                    </div>
                    <div>
                        {{ $item['phone_contacts'] }}
                    </div>
                </div>
                <div>
                    <div class="gray-text">
                        Режим работы:
                    </div>
                    <div>
                        <span class="contacts-section__schedule"><span class="gray-text">пн-пт</span> {{ $item['mode_weekdays'] }}</span>
                        <span class="contacts-section__schedule"><span class="gray-text">сб</span> {{ $item['mode_saturday'] }}</span>
                        <span class="contacts-section__schedule"><span class="gray-text">вс</span> {{ $item['mode_sunday'] }}</span>
                    </div>
                </div>

            </div>
        </div>
        @endforeach

    </div>

    <div class="contacts-section__map-wrapper">
        
            <iframe 
            src="https://yandex.ru/map-widget/v1/?um=constructor%3A07abddd82b7dbc2cf68015c0d486762774b2a5816a112ebcc1efc7f411362761&amp;source=constructor" 
            frameborder="0"></iframe>
    </div>

</section>
