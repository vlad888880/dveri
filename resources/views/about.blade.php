<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('styles')



    <title>ДверОК — о нас</title>

</head>

<body>


    @include('header')
    <style>
        .slide__brand {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            height: 28.9768518519vh;
            width: auto;
        }

        .slide__brand-col {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            margin-right: 1.8229166667vw;
            height: 25vh;
            width: 3vw;
        }

        .slide__brand-col:not(:last-child) {
            margin-bottom: 3.5416666667vw;
        }

        .slide-img-container {
            height: 15vw;
            width: 15vw;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .slide-img-container a {
            display: flex;
            width: 100%;
            justify-content: center;
            align-items: center;
        }

        .bllok-left__link-text {
            font-weight: 550;
            font-size: 0.9375vw;
            line-height: 0.9375vw;
            display: flex;
            align-items: center;
            margin-top: 1.5625vw;
            cursor: pointer;
        }

        .welcome-section__description-wrapper {
            margin-top: -15vh;
        }

    </style>

    <div class="flash"></div>

    <div class="container" data-fs-scroll>
        <div class="sections">
            <div class="section">

                <section class="info-section">
                    <h1 class="info-section__title title1">
                        О компании
                    </h1>
                    <div class="info-section__statistic-background">

                    </div>
                    <div class="info-section__statistic">
                        <div class="info-section__statistic-wrapper">

                            <div class="info-section__stat paragraph">
                                <div class="info-section__stat-number">
                                <? echo date("Y") - 2016  ?>
                                </div>
                                Лет на рынке
                            </div>

                            <div class="info-section__stat paragraph">
                                <div class="info-section__stat-number">
                                {{ count($partner) }}
                                </div>
                                Фабрик-партнеров
                            </div>
                            <div class="info-section__stat paragraph">
                                <div class="info-section__stat-number">
                                {{ $aboutus[0]['count_shop'] }}
                                </div>
                                Розничный магазин
                            </div>
                        </div>
                    </div>



                    <div class="info-section__info-wrapper">
                        <div class="info-section__info-title-wrapper">
                            <h2 class="info-section__info-title title2">
                                Наши ценности
                            </h2>
                            <div class="paragraph">
                            {{ $aboutus[0]['text'] }}
                            </div>
                        </div>

                        <div class="info-section__info-content-wrapper">

                            <div class="info-section__info-content-column">
                                <h3 class="title4 info-section__info-content-title">
                                {{ $aboutus[0]['title1'] }}
                                </h3>
                                <div class="paragraph info-section__info-content-text">
                                {{ $aboutus[0]['subtitle1'] }}
                                </div>
                            </div>
                            <div class="info-section__info-content-column">
                                <h3 class="title4 info-section__info-content-title">
                                {{ $aboutus[0]['title2'] }}
                                </h3>
                                <div class="paragraph info-section__info-content-text">
                                {{ $aboutus[0]['subtitle2'] }}
                                </div>
                            </div>
                            <div class="info-section__info-content-column">
                                <h3 class="title4 info-section__info-content-title">
                                {{ $aboutus[0]['title3'] }}
                                </h3>
                                <div class="paragraph info-section__info-content-text">
                                {{ $aboutus[0]['subtitle3'] }}
                                </div>
                            </div>
                            <div class="info-section__info-content-column">
                                <h3 class="title4 info-section__info-content-title">
                                {{ $aboutus[0]['title4'] }}
                                </h3>
                                <div class="paragraph info-section__info-content-text">
                                {{ $aboutus[0]['subtitle4'] }}
                                </div>
                            </div>
                            <div class="info-section__info-content-column">
                                <h3 class="title4 info-section__info-content-title">
                                {{ $aboutus[0]['title5'] }}
                                </h3>
                                <div class="paragraph info-section__info-content-text">
                                {{ $aboutus[0]['subtitle5'] }}
                                </div>
                            </div>
                            <div class="info-section__info-content-column">
                                <h3 class="title4 info-section__info-content-title">
                                {{ $aboutus[0]['title6'] }}
                                </h3>
                                <div class="paragraph info-section__info-content-text">
                                {{ $aboutus[0]['subtitle6'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @include('contacts')
            @include('footer')
            @include('scripts')

</body>

</html>
