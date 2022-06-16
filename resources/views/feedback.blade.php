<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('styles')
    <style>
        .numer,
        li {
            font-style: normal;
            font-weight: 550;
            font-size: 18px;
            line-height: 18px;
        }

        .zip_code {
            font-weight: bold;
            font-size: 20px;
            line-height: 20px;
        }

        .js--open-modal-feedback-add {
            cursor: pointer;
        }

        .property_product {
            font-style: normal;
            font-weight: normal;
            font-size: 18px;
            line-height: 150%;
            color: #828282;
        }

        .property_product_value {
            font-style: normal;
            font-weight: normal;
            font-size: 18px;
            line-height: 150%;
            color: #333333
        }

        .price {
            font-style: normal;
            font-weight: bold;
            font-size: 40px;
            line-height: 150%;
            color: #333333;
        }

        .flex_center {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .flex_center_row {
            display: flex;
            align-items: center;
            flex-direction: row;
        }

        .flex_center_columm {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
        }

        .btn {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #76CD1A;
        }

        .btn_space {
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid #76CD1A;
        }

        .btn_space:hover {
            background-color: #76CD1A;
        }

        .btn_add {
            height: 55px;
            width: 202px;
        }

        .left_side {
            margin-right: 15px;
        }

        .name_product {
            font-weight: bold;
            font-size: 70px;
            line-height: 120%;
            margin-bottom: 87px;
        }

        .right-side {
            display: flex;
            flex-direction: column;
        }

        .doors img {
            cursor: pointer;
        }

        .doors img:not(:first-child) {
            margin-left: 15px;
        }

        .color_doors svg:not(:first-child) {
            margin-left: 15px;
        }

        .block {
            border-bottom: 2px solid #BDBDBD;
            font-style: normal;
            font-weight: normal;
            font-size: 20px;
            line-height: 20px;
            color: #000000;
            padding-bottom: 15px;
        }

        .block a:not(:first-child) {
            margin-left: 50px;
        }

        .class_activ {
            border-bottom: 4px solid #000000;
            font-weight: bold;
            padding-bottom: 13px;
        }

        .property_name {
            font-style: normal;
            font-weight: bold;
            font-size: 40px;
            line-height: 180%;
            color: #333333;
        }

        .property_text {
            font-style: normal;
            font-weight: normal;
            font-size: 18px;
            line-height: 150%;
            color: #333333;
        }

        .btn_door {
            height: 64px;
            width: 395px;
            font-weight: bold;
            font-size: 20px;
            line-height: 20px;
        }

        .btn_offer {
            height: 43px;
            width: 224px;
        }

        .btn_add_to_order {
            height: 43px;
            width: 196px;
        }

        .main_item {
            height: 649px;
            width: auto
        }

        .large {
            display: flex;
            margin-bottom: 500px;
            margin-top: 500px;
        }

        .smoll {
            display: none;
        }

        #door,
        #door_color {
            margin: 7px;
            padding: 5px;
        }

        .activ {
            border: 2px solid #333333;
        }

        /* slider */
        .slider {
            height: inherit;
            width: 1252px;
        }

        /* slider */
        .doors_min {
            margin: 0;
            padding: 0;
        }

        .slide__price {
            display: flex;
            align-items: center;
        }

        .slide__main-text {
            margin: 1.0416666667vw 0 0.78125vw 0;
            font-weight: bold;
            font-size: 1.5625vw;
            line-height: 1.5625vw;
        }

        .slide__price-new {
            font-style: normal;
            font-weight: 550;
            font-size: 1.0416666667vw;
            line-height: 1.0416666667vw;
        }

        .price-padding {
            margin-right: 0.5208333333vw;
        }

        .price-margin {
            margin-right: 0.3208333333vw;
        }

        .slide__price-old {
            font-weight: normal;
            font-size: 0.9375vw;
            line-height: 150%;
        }

        .slide__img {
            height: 25.7291666667vw;
            width: 24.84375vw;
        }

        .slider-sale {
            margin-left: 6.1979166667vw;
            width: 78.4895833333vw;
        }

        .koment {
            width: 38.28125vw;
            padding: 2.0833333333vw;
            background-color: #F2F2F2;
            margin: 0 20px 15px 0;
        }


        .koment-section-coment {
            padding: 15px 20px;
            margin: 15px 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .koment-section-answer {
            background-color: #F2F2F2;
            padding: 15px 20px;
            margin: 15px 0 15px 30px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .koment-section {
            display: flex;
            background-color: #F2F2F2;
            height: 11.25vw;
            width: 100%;
            padding: 20px 15px;
        }

        .koment-main-text {
            font-style: normal;
            font-weight: bold;
            font-size: 1.8rem;
            line-height: 150%;
            color: #333333;
            max-width: 24rem;
            min-width: 24rem;
        }

        .koment-main-text-answer {
            font-weight: bold;
            font-size: 2.0833333333vw;
            line-height: 150%;
            width: 16.25vw;
        }

        .koment-text-section {
            width: 20rem;
            margin-top: 10px;
            margin-left: 3rem;
            font-style: normal;
            font-weight: bold;
            font-size: 1.2rem;
            line-height: 1.25rem;
        }

        .koment-section-answer-botton {
            margin: 30px 15px 30px 21.5vw;
        }

        hr {
            width: 100%;
            height: 2px;
            background: #C4C4C4;
        }

        .koment-data-section {
            width: 51rem;
            margin-top: 10px;
            font-weight: normal;
            font-size: 1.2rem;
            line-height: 150%;
            color: #333333;
            /* margin-left: 5vw; */
        }

        .koments {
            display: flex;
            align-items: center;
            flex-direction: column;
            width: 90vw;
            margin: 8vh 0;
        }

        .koments-head {
            padding-left: 8vw;
            flex-direction: row;
            display: flex;
            width: 90vw;
            height: 20vh;
            margin-top: 10vh;
            justify-content: space-between;
        }

        .koment-block {
            width: 100%;
            display: flex;
            flex-direction: column;
            margin: 4vh 0;
            border-bottom: 1px solid black;
            box-sizing: border-box;
        }

        .koments-btn {
            height: 2.9166666667vw;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 13.3333333333vw;
        }

        .slide-koments {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-content: space-between;
            flex-wrap: wrap;
        }

        .slide-koment-block {
            display: flex;
            flex-direction: row;
        }

        .koment-main-texv {
            font-weight: bold;
            font-size: 2.0833333333vw;
            line-height: 150%;
        }

        .koment-data {
            font-weight: normal;
            font-size: 0.78125vw;
            line-height: 150%;
            margin: 0.462962963vh 0 1.3888888889vh 0;
        }

        .koment-text {
            font-weight: normal;
            font-size: 0.9375vw;
            line-height: 150%;
        }




        @media (max-width: 600px) {
            .large {
                display: none;
            }

            .smoll {
                display: block;
            }

            body {
                padding: 28px 14px 28px 14px;
            }

            .menu_larg {
                display: none;
            }

            .main_item {
                height: 356px;
                width: auto
            }

            .name_product {
                font-weight: bold;
                font-size: 28px;
                line-height: 120%;
                margin-bottom: 87px;
            }

            .property_product {
                font-size: 13px;
            }

            .btn_door {
                width: 348px;
                height: 55px;
            }

            .price,
            .property_name {
                font-size: 28px;
            }

            .property_product_value,
            .btn_offer,
            .property_product {
                font-size: 15px;
                font-style: normal;
                font-weight: normal;
                line-height: 15px;
            }

            .btn_offer {
                height: 35px;
                width: 174px;
            }

            .zip_code {
                font-size: 17px;
            }

            .btn_add_to_order {
                width: 255px;
                height: 43px;
            }

            .add_to_card_img {
                height: 264px;
                width: 255px;
            }

            .slider {
                height: inherit;
                width: 361px;
            }

            .color_doors {
                width: 322px;
            }

            .door {
                height: inherit;
                width: 347px;
            }

            .block {
                font-size: 15px;
                overflow: hidden;
                display: flex;
                padding-top: 119px;
            }

            .block a:not(:first-child) {
                margin-left: 40px;
                align-content: center;

            }

            .slide__main-text {
                margin: 10vw 0 5vw 0;
                font-weight: bold;
                font-size: 7vw;
                line-height: 2.5625vw;
            }

            .slide__price-new {
                font-style: normal;
                font-weight: 550;
                font-size: 5vw;
                line-height: 2.0416666667vw;
            }

            .price-padding {
                margin-right: 5vw;
            }

            .price-margin {
                margin-right: 2vw;
            }

            .slide__price-old {
                font-weight: normal;
                font-size: 5vw;
                line-height: 150%;
            }

            .slide__img {
                height: auto;
                width: 80vw;
            }

            .slider-sale,
            .slider-koment {
                margin-left: 6.1979166667vw;
                width: 90vw;
                height: 100vh;
            }



            .koment-section-coment,
            .koment-section-answer {
                display: flex;
                flex-direction: column;
            }

            .koment-section-answer {
                padding: 15px 20px;
                margin: 0;
            }

            .koment-main-text {
                font-weight: bold;
                font-size: 5.0833333333vw;
                line-height: 150%;
                width: 100%;
            }

            .koment-main-text-answer {
                font-weight: bold;
                font-size: 5.0833333333vw;
                line-height: 150%;
                width: 100%;
            }

            .koment-text-section {
                width: 42.9166666667vw;
                font-weight: normal;
                font-size: 3.5vw;
                width: 100%;
                line-height: 150%;
            }

            .koment-section-answer-botton {
                margin: 30px 15px 30px 15px;
                cursor: pointer;
            }

            .koment-data-section {
                max-width: 51rem !important;
                font-weight: bold;
                margin-top: 2vh;
                font-size: 4.0416666667vw;
                line-height: 1.0416666667vw;
            }

            .koments {
                display: flex;
                align-items: center;
                flex-direction: column;
                width: 90vw;
                margin: 8vh 0;
            }

            .koments-head {
                padding-left: 5.3020833333vw;
                flex-direction: row;
                display: flex;
                width: 90vw;
                height: 20vh;
                margin-top: 10vh;
                justify-content: space-between;
            }

            .koment-block {
                width: 100%;
                display: flex;
                flex-direction: column;
                margin: 4vh 0;
            }

            .koments-btn {
                height: 10vw;
                display: flex;
                justify-content: center;
                align-items: center;
                width: 40.3333333333vw;
                font-size: 12px;
            }

        }

        .content_active {
            display: block !important;
        }

        .category-carousel-section__slider-koment-section {
            max-width: 84%;
        }

    </style>
    <title>ДверОК — отзывы</title>

</head>

<body>
    @include('header')
        <?
         $mon = [
            1 => "Января", 2 => "Февраля", 3 => "Марта", 
            4 => "Апреля",  5 => "Мая", 6 => "Июня",
            7 => "Июля", 8 => "Августа", 9 => "Сентября", 
            10 => "Октября", 11 => "Ноября", 12 => "Декабря"
         ]
        
        ?>

    <div class="koments section">
        <div class="koments-head">
            <div class="title1">
                Отзывы
            </div>
            <div class="button button-text koments-btn js--open-modal-feedback-add">
                Написать новый отзыв
            </div>
        </div>
        <div class="category-carousel-section__slider-koment-section">
            @if(count($comment) == 0)
                На данный момент отзывы отсутствуют
            @endif
            @foreach($comment as $item)
            @if($item['id_answer'] == null && $item['is_show'] != null)
            <div class="koment-block">
                <div class="koment-section-coment">
                    <div class="koment-main-text">{{ $item['name_comment'] }}</div>
                    <div class="koment-data-section">{{ $item['text_comment'] }}</div>
                    <div class="koment-text-section">
                    <? 
                        $unixDate = strtotime($item['created_at']);
                        echo date('d ', $unixDate) . " " . $mon[date('n', $unixDate)] . " " . date('Y ', $unixDate); 
                    ?>
                    </div>
                </div>
                @foreach($comment as $answer)
                    @if($item['id_comment'] == $answer['id_answer'])
                        <div class="koment-section-answer">
                            <div class="koment-main-text-answer">{{ $answer['name_comment'] }}</div>
                            <div class="koment-data-section">{{ $answer['text_comment'] }}</div>
                            <div class="koment-text-section"><? 
                        $unixDateA = strtotime($answer['created_at']);
                        echo date('d ', $unixDateA) . " " . $mon[date('n', $unixDateA)] . " " . date('Y ', $unixDateA); 
                    ?></div>
                        </div>
                    @endif
                @endforeach
                <!-- <div id="respond" class="comment-respond" data-commentid="">
                    <form action="" method="post" id="commentform" class="comment-form" novalidate="">
                        <p class="comment-notes">
                            <span id="email-notes">Ваш адрес email не будет опубликован.</span>
                            Обязательные поля помечены
                            <span class="required">*</span>
                        </p>
                        <p class="comment-form-comment">
                            <label for="comment">Комментарий</label>
                            <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525"
                                required="required"></textarea>
                        </p>
                        <p class="comment-form-author">
                            <label for="author">Имя <span class="required">*</span></label>
                            <input id="author" name="author" type="text" value="" size="30" maxlength="245"
                                required="required">
                        </p>
                        <p class="comment-form-email"><label for="email">Email <span class="required">*</span></label>
                            <input id="email" name="email" type="email" value="" size="30" maxlength="100"
                                aria-describedby="email-notes" required="required"></p>
                        <p class="form-submit">
                            <input name="submit" type="submit" id="submit" class="submit btn"
                                value="Отправить комментарий">
                            <input type="hidden" name="comment_post_ID" value="616" id="comment_post_ID">
                            <input type="hidden" name="comment_parent" id="comment_parent" value="">
                        </p>
                    </form>
                </div> -->
            </div>
            @endif
            @endforeach
           

        </div>
    </div>
    @include('contacts')
    @include('footer')
    @include('scripts')

</body>

</html>
