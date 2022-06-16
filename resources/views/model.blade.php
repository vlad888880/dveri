<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('styles')

    <title>ДверОК — {{ $door[0]['name_door'] }}</title>

</head>

<body>
    <style>
        .js--carusel-slick {
            max-height: 80vh;
        }
        .open {
            display: grid;
        }
        @media only screen and (max-width: 768px) {
            .secondes{
                left: 0px !important;
                top: -500px !important;
            }
        }
        @media only screen and (min-width: 769px) {
            .secondes{
                left: 0px !important;
                top: -80vh !important;
            }
        }
        .slick-track{
            max-width: 375px !important;
        }
        @media only screen and (min-width: 768px) {
            .slick-next {
                right: 5px;
            }
        }
    </style>

    @include('header')
    <section class="article-section article-page__article-section" data-id="">
        <!--TODO: Вставить сюда Parent_id-->
        <div class="article-section__breadcrumb breadcrumb">
            <a href="{{ route('welcome') }}">Главная</a>
            <a href="{{ route('shop') }}">Каталог</a>
            <a href="{{ $door[0]['id_category '] }}">{{ $door[0]['name_door'] }}</a>
        </div>
        <button class="article-section__photo-wrapper js-photo">
            @foreach($variation_for_images as $item)
            @if($item->id_variation == $model)
            <div class="js--carusel-slick">
                <div>
                    <img src="{{ asset('storage/app/variation') }}/{{ $item->img_variation }}"
                    class="article-section__photo js--main-door-foto js-lupa"
                    data-zoom-image="{{ asset('storage/app/variation') }}/{{ $item->img_variation }}" />
                </div>
                @if(isset($item->img_variation_second))
                <div class="secondes">
                    <img src="{{ asset('storage/app/variation') }}/{{ $item->img_variation_second }}"
                        class="article-section__photo js--main-door-foto js-lupa"
                        data-zoom-image="{{ asset('storage/app/variation') }}/{{ $item->img_variation_second }}" />
                </div>
                @endif
            </div>
            @endif
            @endforeach
            <div class="article-section__magnify-glass article-section__selectors--desktop"></div>
        </button>

        <div class="article-section__category paragraph paragraph--small paragraph--gray">
            @foreach($category as $item)
            @if($item['id_category'] == $door[0]['id_category'])
            {{ $item['name_category'] }}
            @break
            @endif
            @endforeach
        </div>
        <div class="title1 article-section__title article-section__title--mobile">

        </div>

        <div class="article-section__selectors article-section__selectors--mobile js-selectors">
            <div class="article-section__model-material model-material">
                <div class="model-material__grid js-grid-material js-grid js-sub-grid">
                    <div class="model-material__title paragraph">
                        @foreach($variation_for_images as $item_img)
                        @if($item_img->id_variation == $model)
                        Модель: <span class="model_name">{{ $item_img->name_variation }}</span>
                        @endif
                        @endforeach
                    </div>
                    <div class="model-material__content js-content model-material__content--material">
                        @foreach($variation as $item)
                        @if($item->type_variation == $model)
                        @foreach($variation_for_images as $item_img)
                        @if($item_img->id_variation == $model)
                        <a href="{{ route('model', ['id' => $id, 'model' => $item_img->id_variation, 'type' => $item_img->type_variation]) }}"
                            color="{{ $item->id_color }}"
                            class="model-material__item model-material__item--material selected">
                            <!-- <div class="model-material__item model-material__item--material js-sub-material-selector"> -->
                            <img class="model-material__photo"
                                src="{{ asset('storage/app/variation') }}/{{ $item_img->img_variation }}" />
                            <!-- </div> -->
                        </a>
                        @endif
                        @endforeach
                        @else
                        <a href="{{ route('model', ['id' => $id, 'model' => $item->id_variation, 'type' => $item->type_variation]) }}"
                            color="{{ $item->id_color }}" class="model-material__item model-material__item--material">
                            <img class="model-material__photo"
                                src="{{ asset('storage/app/variation') }}/{{ $item->img_variation }}" />
                        </a>
                        @endif
                        @endforeach
                        <!-- <div class="model-material__item model-material__item--material js-sub-material-selector">
                            <img class="model-material__photo" src="" />
                        </div>
                        <div style="border: 1px solid red">

                        </div> -->
                    </div>
                    <div class="page-selector model-material__page-selector">
                        <span class="page-selector__prev">Назад</span>
                        <span class="page-selector__numbers">
                            <span class="page-selector__number">01</span>
                            <span class="page-selector__count">01</span>
                        </span>
                        <span class="page-selector__next">Далее</span>
                    </div>

                </div>
                <div class="model-material__grid js-grid js-grid-material">
                    <div class="model-material__title paragraph">

                    </div>
                    <div class="model-material__content js-content model-material__content--material">

                        <div data-id="" data-material="" data-color="" data-color-name="" data-material-name=""
                            class="model-material__item model-material__item--material js-material-selector ">
                            <img class="model-material__photo" src="" />
                        </div>

                    </div>
                    <div class="page-selector model-material__page-selector">
                        <span class="page-selector__prev">Назад</span>
                        <span class="page-selector__numbers">
                            <span class="page-selector__number">01</span>
                            <span class="page-selector__count">01</span>
                        </span>
                        <span class="page-selector__next">Далее</span>
                    </div>
                </div>
            </div>
            <div class="article-section__selectors article-section__selectors--mobile js-selectors">
                <div class="article-section__tab-wrapper">
                    <div class="article-section__tab js-tab selected">
                        <div class="article-section__model-material model-material ">
                            <div class="model-material__grid js-grid-model js-grid">
                                @if($cnt_glass == 0)
                                @foreach($material as $key_mat => $mat)
                                <div class="model-material__grid js-grid js-grid-material stage2">
                                    <div class="article-section__selectors--desktop block_of_info">
                                        @foreach($variation_for_images as $key => $item)
                                        @if($key == 0 && $key_mat == 0)
                                        <span>{{ $mat->name_material }}</span>: <span
                                            class="js-color-this js--default">{{ $variation_select[0]->name_color }}</span>
                                        <span style="display: none"
                                            class="js--default-name">{{ $variation_select[0]->name_color }}</span>
                                        @endif
                                        @if($key == 0 && $key_mat != 0)
                                        <span>{{ $mat->name_material }}</span>: <span class="js-color-this"></span>
                                        @endif
                                        @endforeach
                                        <svg style="cursor: pointer;" class="js--cancel" id="cancel" width="16"
                                            height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8 15.9999C12.4183 15.9999 16 12.4182 16 7.99988C16 3.5816 12.4183 -0.00012207 8 -0.00012207C3.58172 -0.00012207 0 3.5816 0 7.99988C0 12.4182 3.58172 15.9999 8 15.9999ZM4.71486 5.75215C4.42838 5.46567 4.42838 5.00121 4.71486 4.71473C5.00133 4.42826 5.4658 4.42826 5.75227 4.71473L8 6.96246L10.2477 4.71473C10.5342 4.42826 10.9987 4.42826 11.2851 4.71473C11.5716 5.00121 11.5716 5.46567 11.2851 5.75215L9.03741 7.99988L11.2851 10.2476C11.5716 10.5341 11.5716 10.9985 11.2851 11.285C10.9987 11.5715 10.5342 11.5715 10.2477 11.285L8 9.03729L5.75227 11.285C5.4658 11.5715 5.00133 11.5715 4.71486 11.285C4.42838 10.9985 4.42838 10.5341 4.71486 10.2476L6.96259 7.99988L4.71486 5.75215Z"
                                                fill="#333333" />
                                        </svg>
                                    </div>
                                    <div
                                        class="model-material__content js-content model-material__content--material stage1">
                                        @foreach($variation_for_images as $key => $item)
                                        @if($item->name_material == $mat->name_material)
                                        @if($key == 0 && $key_mat == 0)
                                        <div color_name="{{ $item->name_color }}"
                                            material_name="{{ $item->name_material }}"
                                            src_image="{{ asset('storage/app/variation') }}/{{ $item->img_variation }}"
                                            variation_id="{{ $item->id_variation }}"
                                            variation_name="{{ $item->name_variation }}"
                                            class="model-material__item model-material__item--material js--color-selector js--variation selected js--default-select">
                                            <img class="model-material__photo"
                                                src="{{ asset('storage/app/color') }}/{{ $item->img_color }}"
                                                title="{{ $item->name_color }}" />
                                        </div>
                                        @else
                                        <div color_name="{{ $item->name_color }}"
                                            material_name="{{ $item->name_material }}"
                                            src_image="{{ asset('storage/app/variation') }}/{{ $item->img_variation }}"
                                            variation_id="{{ $item->id_variation }}"
                                            variation_name="{{ $item->name_variation }}"
                                            class="model-material__item model-material__item--material js--color-selector js--variation">
                                            <img class="model-material__photo"
                                                src="{{ asset('storage/app/color') }}/{{ $item->img_color }}"
                                                title="{{ $item->name_color }}" />
                                        </div>
                                        @endif
                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="page-selector model-material__page-selector">
                                        <span class="page-selector__prev">Назад</span>
                                        <span class="page-selector__numbers">
                                            <span class="page-selector__number">01</span>
                                            <span class="page-selector__count">01</span>
                                        </span>
                                        <span class="page-selector__next">Далее</span>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--  mobile end-->
        <div class="article-section__properties">
            <!-- <div class="article-section__article title4">
                Артикул: <span class="js-article"> </span>
            </div> -->
            <div class="article-section__order-table">
                <div class="article-section__table-row">
                    <div
                        class="article-section__table-column article-section__table-column--first paragraph paragraph--gray paragraph">
                        Количество:
                    </div>
                    <div class="article-section__table-column">
                        <div class="number-input js-number paragraph js-cnt">1</div>
                    </div>
                </div>
                @foreach($variation_for_images as $item)
                @if($item->id_variation == $model)
                <div class="article-section__table-row">
                    <div
                        class="article-section__table-column article-section__table-column--first paragraph paragraph--gray paragraph">
                        Цвет:
                    </div>
                    <div class="article-section__table-column js-color paragraph">
                        {{ $item->name_color }}
                    </div>
                </div>
                <div class="article-section__table-row">
                    <div
                        class="article-section__table-column article-section__table-column--first paragraph paragraph--gray paragraph">
                        Материал:
                    </div>
                    <div class="article-section__table-column js--material paragraph">
                        {{ $item->name_material }}
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <div class="article-section__price title2 js-price">
                @if(!empty($door[0]['price_door']))
                От {{ $door[0]['price_door'] }} Р
                @endif
            </div>
            <button class="button js-add-to-cart article-section__button js-ajax-cart">

            </button>
        </div>


        <div class="article-section__right-part article-section__selectors--desktop">
            <!-- Title -->
            <h1 class="title1 article-section__title">
                {{ $door[0]['name_door'] }}
            </h1>
            @foreach($variation_for_images as $item_img)
            @if($item_img->id_variation == $model)
            Модель: <span class="model_name">{{ $item_img->name_variation }}</span>
            @endif
            @endforeach

            <div class="article-section__selectors article-section__selectors--desktop js-selectors"
                style="margin-top: 40px">
                <div class="article-section__tab-wrapper">
                    <div class="article-section__tab js-tab selected">
                        <div class="article-section__model-material model-material">
                            <div class="model-material__grid js-grid-model js-grid">
                                <div class="model-material__content js-content model-material__content--model">
                                    @foreach($variation as $item)
                                    @if($item->type_variation == $type)
                                    @foreach($variation_for_images as $item_img)
                                    @if($item_img->id_variation == $model)
                                    <a href="{{ route('model', ['id' => $id, 'model' => $item_img->id_variation, 'type' => $item_img->type_variation]) }}"
                                        color="{{ $item->id_color }}"
                                        class="model-material__item model-material__item--model selected">
                                        <img class="model-material__photo own"
                                            src="{{ asset('storage/app/variation') }}/{{ $item_img->img_variation }}" />
                                    </a>
                                    @break
                                    @endif
                                    @endforeach
                                    @else
                                    <a href="{{ route('model', ['id' => $id, 'model' => $item->id_variation, 'type' => $item->type_variation]) }}"
                                        color="{{ $item->id_color }}"
                                        class="model-material__item model-material__item--model">
                                        <img class="model-material__photo"
                                            src="{{ asset('storage/app/variation') }}/{{ $item->img_variation }}" />
                                    </a>
                                    @endif
                                    @endforeach
                                    <!-- <div data-id="" data-glass="false" data-model-sku=""
                                        class="model-material__item model-material__item--model js-model-selector">
                                        <img class="model-material__photo" src="" />
                                    </div> -->
                                </div>
                                <div class="page-selector model-material__page-selector">
                                    <span class="page-selector__prev">Назад</span>
                                    <span class="page-selector__numbers">
                                        <span class="page-selector__number">01</span>
                                        <span class="page-selector__count">01</span>
                                    </span>
                                    <span class="page-selector__next">Далее</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="article-section__model-material model-material article-section__selectors--desktop js-selectors"
                style="margin-top: 45px">

                <div class="model-material__grid js-grid-material js-grid js-sub-grid" style="display: none">
                    <div class="model-material__content js-content model-material__content--material">
                        <div data-id="" data-glass-slug="" data-glass-attribute=""
                            class="model-material__item model-material__item--material js-sub-material-selector  ">
                            <img class="model-material__photo" src="" />
                        </div>
                    </div>
                </div>
                @if($cnt_glass == 0)
                @foreach($material as $key_mat => $mat)
                <div class="model-material__grid js-grid js-grid-material stage2">
                    <div class="article-section__selectors--desktop block_of_info">
                        @foreach($variation_for_images as $key => $item)
                        @if($mat->id_material == $variation_select[0]->id_material)
                        <span>{{ $mat->name_material }}</span>: <span
                            class="js-color-this js--default">{{ $variation_select[0]->name_color }}</span>
                        <!-- <span style="display: none" class="js--default-name">{{ $item->name_color }}</span> -->
                        <svg style="cursor: pointer;" class="js--cancel default" id="cancel" width="16" height="16"
                            viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8 15.9999C12.4183 15.9999 16 12.4182 16 7.99988C16 3.5816 12.4183 -0.00012207 8 -0.00012207C3.58172 -0.00012207 0 3.5816 0 7.99988C0 12.4182 3.58172 15.9999 8 15.9999ZM4.71486 5.75215C4.42838 5.46567 4.42838 5.00121 4.71486 4.71473C5.00133 4.42826 5.4658 4.42826 5.75227 4.71473L8 6.96246L10.2477 4.71473C10.5342 4.42826 10.9987 4.42826 11.2851 4.71473C11.5716 5.00121 11.5716 5.46567 11.2851 5.75215L9.03741 7.99988L11.2851 10.2476C11.5716 10.5341 11.5716 10.9985 11.2851 11.285C10.9987 11.5715 10.5342 11.5715 10.2477 11.285L8 9.03729L5.75227 11.285C5.4658 11.5715 5.00133 11.5715 4.71486 11.285C4.42838 10.9985 4.42838 10.5341 4.71486 10.2476L6.96259 7.99988L4.71486 5.75215Z"
                                fill="#333333" />
                        </svg>
                        @else
                        <span>{{ $mat->name_material }}</span>: <span class="js-color-this"></span>
                        <svg style="cursor: pointer;" class="js--cancel non" id="cancel" width="16" height="16"
                            viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8 15.9999C12.4183 15.9999 16 12.4182 16 7.99988C16 3.5816 12.4183 -0.00012207 8 -0.00012207C3.58172 -0.00012207 0 3.5816 0 7.99988C0 12.4182 3.58172 15.9999 8 15.9999ZM4.71486 5.75215C4.42838 5.46567 4.42838 5.00121 4.71486 4.71473C5.00133 4.42826 5.4658 4.42826 5.75227 4.71473L8 6.96246L10.2477 4.71473C10.5342 4.42826 10.9987 4.42826 11.2851 4.71473C11.5716 5.00121 11.5716 5.46567 11.2851 5.75215L9.03741 7.99988L11.2851 10.2476C11.5716 10.5341 11.5716 10.9985 11.2851 11.285C10.9987 11.5715 10.5342 11.5715 10.2477 11.285L8 9.03729L5.75227 11.285C5.4658 11.5715 5.00133 11.5715 4.71486 11.285C4.42838 10.9985 4.42838 10.5341 4.71486 10.2476L6.96259 7.99988L4.71486 5.75215Z"
                                fill="#333333" />
                        </svg>
                        @endif
                        @break
                        @endforeach
                    </div>
                    <div class="model-material__content js-content model-material__content--material stage1">
                        @foreach($variation_for_images as $key => $item)
                        @if($item->name_material == $mat->name_material)
                        @if($item->id_variation == $model)
                        <div color_name="{{ $item->name_color }}" material_name="{{ $item->name_material }}"
                            variation_id="{{ $item->id_variation }}" color_id="{{ $item->id_color }}"
                            id_glass="{{ $item->id_glass }}" variation_name="{{ $item->name_variation }}"
                            src_image="{{ asset('storage/app/variation') }}/{{ $item->img_variation }}"
                            class="model-material__item model-material__item--material js--color-selector js--variation selected js--default-select not-glass">
                            <img class="model-material__photo"
                                src="{{ asset('storage/app/color') }}/{{ $item->img_color }}"
                                title="{{ $item->name_color }}" />
                        </div>
                        @else
                        <div color_name="{{ $item->name_color }}" material_name="{{ $item->name_material }}"
                            id_glass="{{ $item->id_glass }}" variation_id="{{ $item->id_variation }}"
                            color_id="{{ $item->id_color }}" variation_name="{{ $item->name_variation }}"
                            src_image="{{ asset('storage/app/variation') }}/{{ $item->img_variation }}"
                            class="model-material__item model-material__item--material js--color-selector js--variation not-glass">
                            <img class="model-material__photo"
                                src="{{ asset('storage/app/color') }}/{{ $item->img_color }}"
                                title="{{ $item->name_color }}" />
                        </div>
                        @endif
                        @endif
                        @endforeach
                    </div>
                    <div class="page-selector model-material__page-selector">
                        <span class="page-selector__prev">Назад</span>
                        <span class="page-selector__numbers">
                            <span class="page-selector__number">01</span>
                            <span class="page-selector__count">01</span>
                        </span>
                        <span class="page-selector__next">Далее</span>
                    </div>
                </div>
                @endforeach
                @else
                <div class="model-material__grid js-grid js-grid-material stage2">
                    <div class="article-section__selectors--desktop block_of_info glassi">
                        <span class="js--mat-glass"></span>: <span class="js--color-glass"></span>
                    </div>
                    <div class="model-material__content js-content model-material__content--material stage1">
                        @foreach($variation_for_color as $key => $item)
                        @if($item->id_color == $ccolor)
                        <div color_name="{{ $item->name_color }}" material_name="{{ $item->name_material }}"
                            variation_id="{{ $item->id_variation }}" color_id="{{ $item->id_color }}"
                            id_glass="{{ $item->id_glass }}" variation_name="{{ $item->name_variation }}"
                            src_image="{{ asset('storage/app/variation') }}/{{ $item->img_variation }}"
                            class="model-material__item model-material__item--material js--color-selector js--variation selected js--default-select js--glass">
                            <img class="model-material__photo"
                                src="{{ asset('storage/app/color') }}/{{ $item->img_color }}"
                                title="{{ $item->name_color }}" />
                        </div>
                        @else
                        <div color_name="{{ $item->name_color }}" material_name="{{ $item->name_material }}"
                            id_glass="{{ $item->id_glass }}" variation_id="{{ $item->id_variation }}"
                            color_id="{{ $item->id_color }}" variation_name="{{ $item->name_variation }}"
                            src_image="{{ asset('storage/app/variation') }}/{{ $item->img_variation }}"
                            class="model-material__item model-material__item--material js--color-selector js--variation js--glass">
                            <img class="model-material__photo"
                                src="{{ asset('storage/app/color') }}/{{ $item->img_color }}"
                                title="{{ $item->name_color }}" />
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="page-selector model-material__page-selector">
                        <span class="page-selector__prev">Назад</span>
                        <span class="page-selector__numbers">
                            <span class="page-selector__number">01</span>
                            <span class="page-selector__count">01</span>
                        </span>
                        <span class="page-selector__next">Далее</span>
                    </div>
                </div>
                @endif
            </div>

            <!-- стекло -->
            @if($cnt_glass > 0)
            <div class="article-section__model-material model-material article-section__selectors--desktop js-selectors"
                style="margin-top: 45px">

                <div class="model-material__grid js-grid-material js-grid js-sub-grid" style="display: none">
                    <div class="model-material__content js-content model-material__content--material">
                        <div data-id="" data-glass-slug="" data-glass-attribute=""
                            class="model-material__item model-material__item--material js-sub-material-selector  ">
                            <img class="model-material__photo" src="" />
                        </div>
                    </div>
                </div>

                <div class="model-material__grid js-grid js-grid-material stage2">
                    <div class="article-section__selectors--desktop block_of_info">

                        <span class="js-glass-grup"></span>: <span class="js-glass-this js--default"></span>

                        <svg style="cursor: pointer;" class="js--cancel default glass_here" id="cancel" width="16"
                            height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8 15.9999C12.4183 15.9999 16 12.4182 16 7.99988C16 3.5816 12.4183 -0.00012207 8 -0.00012207C3.58172 -0.00012207 0 3.5816 0 7.99988C0 12.4182 3.58172 15.9999 8 15.9999ZM4.71486 5.75215C4.42838 5.46567 4.42838 5.00121 4.71486 4.71473C5.00133 4.42826 5.4658 4.42826 5.75227 4.71473L8 6.96246L10.2477 4.71473C10.5342 4.42826 10.9987 4.42826 11.2851 4.71473C11.5716 5.00121 11.5716 5.46567 11.2851 5.75215L9.03741 7.99988L11.2851 10.2476C11.5716 10.5341 11.5716 10.9985 11.2851 11.285C10.9987 11.5715 10.5342 11.5715 10.2477 11.285L8 9.03729L5.75227 11.285C5.4658 11.5715 5.00133 11.5715 4.71486 11.285C4.42838 10.9985 4.42838 10.5341 4.71486 10.2476L6.96259 7.99988L4.71486 5.75215Z"
                                fill="#333333" />
                        </svg>

                    </div>
                    <div class="model-material__content js-content model-material__content--material stage1 glass">


                    </div>
                    <div class="page-selector model-material__page-selector">
                        <span class="page-selector__prev">Назад</span>
                        <span class="page-selector__numbers">
                            <span class="page-selector__number">01</span>
                            <span class="page-selector__count">01</span>
                        </span>
                        <span class="page-selector__next">Далее</span>
                    </div>
                </div>
            </div>
            @endif
            <!-- стекло -->


            <div class="block" style="margin-bottom: 50px;">
                <a class="about" href="#about">Описание</a>
                @if(isset($characteristics[0]['name_characteristics']))
                <a class="property" href="#property">Характеристики</a>
                @endif
                @if(isset($recomend[0]->name_variation))
                <a class="recamend" href="#recamend">Рекомендуемые товары</a>
                @endif
            </div>
            <div class="specific">
                <div style="margin-bottom: 80px;">
                    <a class="property_name" name="about" id="about">Описание</a>
                    <div class="article-section__description paragraph">
                        {{ $door[0]['description_door'] }}
                    </div>
                </div>
                @if($door[0]['have_guard'] != null)
                <a class="property_name">Дверные щиты</a>
                <p class="property_product_value" style="margin-bottom: 80px;">Вы можете заказакать дверной щит в
                    индвидуальной стилистке, цвете и материала</p>
                @endif
                @if(isset($characteristics[0]['name_characteristics']))
                <div style="margin-bottom: 80px;">
                    <a class="property_name" name="property" id="property">Характеристики</a>
                    @foreach($characteristics as $key => $item)
                    @if($key%2 == 0 || $key == 0)
                    <div class="article-section__stat-tables">
                        @endif
                        <div class="article-section__stat-table paragraph">
                            {{ $item['name_characteristics'] }}
                            <div class="article-section__table-row">
                                <div
                                    class="article-section__table-column article-section__table-column--small article-section__table-column--first paragraph paragraph--gray">
                                    {{ $item['key1'] }}
                                </div>
                                <div
                                    class="article-section__table-column article-section__table-column--small paragraph">
                                    {{ $item['value1'] }}
                                </div>
                            </div>
                            <div class="article-section__table-row">
                                <div
                                    class="article-section__table-column article-section__table-column--small article-section__table-column--first paragraph paragraph--gray">
                                    {{ $item['key2'] }}
                                </div>
                                <div
                                    class="article-section__table-column article-section__table-column--small paragraph">
                                    {{ $item['value2'] }}
                                </div>
                            </div>
                            <div class="article-section__table-row">
                                <div
                                    class="article-section__table-column article-section__table-column--small article-section__table-column--first paragraph paragraph--gray">
                                    {{ $item['key3'] }}
                                </div>
                                <div
                                    class="article-section__table-column article-section__table-column--small paragraph">
                                    {{ $item['value3'] }}
                                </div>
                            </div>
                            <div class="article-section__table-row">
                                <div
                                    class="article-section__table-column article-section__table-column--small article-section__table-column--first paragraph paragraph--gray">
                                    {{ $item['key4'] }}
                                </div>
                                <div
                                    class="article-section__table-column article-section__table-column--small paragraph">
                                    {{ $item['value4'] }}
                                </div>
                            </div>
                            <div class="article-section__table-row">
                                <div
                                    class="article-section__table-column article-section__table-column--small article-section__table-column--first paragraph paragraph--gray">
                                    {{ $item['key5'] }}
                                </div>
                                <div
                                    class="article-section__table-column article-section__table-column--small paragraph">
                                    {{ $item['value5'] }}
                                </div>
                            </div>
                            <div class="article-section__table-row">
                                <div
                                    class="article-section__table-column article-section__table-column--small article-section__table-column--first paragraph paragraph--gray">
                                    {{ $item['key6'] }}
                                </div>
                                <div
                                    class="article-section__table-column article-section__table-column--small paragraph">
                                    {{ $item['value6'] }}
                                </div>
                            </div>
                            <div class="article-section__table-row">
                                <div
                                    class="article-section__table-column article-section__table-column--small article-section__table-column--first paragraph paragraph--gray">
                                    {{ $item['key7'] }}
                                </div>
                                <div
                                    class="article-section__table-column article-section__table-column--small paragraph">
                                    {{ $item['value7'] }}
                                </div>
                            </div>
                            <div class="article-section__table-row">
                                <div
                                    class="article-section__table-column article-section__table-column--small article-section__table-column--first paragraph paragraph--gray">
                                    {{ $item['key8'] }}
                                </div>
                                <div
                                    class="article-section__table-column article-section__table-column--small paragraph">
                                    {{ $item['value8'] }}
                                </div>
                            </div>
                            <div class="article-section__table-row">
                                <div
                                    class="article-section__table-column article-section__table-column--small article-section__table-column--first paragraph paragraph--gray">
                                    {{ $item['key9'] }}
                                </div>
                                <div
                                    class="article-section__table-column article-section__table-column--small paragraph">
                                    {{ $item['value9'] }}
                                </div>
                            </div>
                            <div class="article-section__table-row">
                                <div
                                    class="article-section__table-column article-section__table-column--small article-section__table-column--first paragraph paragraph--gray">
                                    {{ $item['key10'] }}
                                </div>
                                <div
                                    class="article-section__table-column article-section__table-column--small paragraph">
                                    {{ $item['value10'] }}
                                </div>
                            </div>
                        </div>
                        @if($key%2 == 1)
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif
            <!-- Recommended items -->
            @if(isset($recomend[0]->name_variation))
            <div class="recommended-items article-section__recommended-items">
                <a class="title2 recommended-items__title" name="recamend" id="recamend">
                    Рекомендуемые товары
                </a>
                <p class="paragraph recommended-items__description">
                    Работы по установке замком и фурнитуры производятся в нашем цехе
                </p>

                <!-- <div class="recommended-items__tab-selector-wrapper">
                    <button class="tab-selector recommended-items__tab-selector js-tab-selector selected">
                        Оформление портала
                    </button>
                    <button class="tab-selector js-tab-selector recommended-items__tab-selector">
                        Замки и фурнитура
                    </button>
                </div> -->
                <div class="recommended-items__tab-wrapper">
                    <div class="recommended-items__tab js-tab selected">
                        <div class="recommended-items__wrapper ">
                            <div class="recommended-items__grid js-grid">
                                <div class="recommended-items__content js-content ">
                                    @foreach($recomend as $item)
                                    @if(empty($item->type_variation))
                                    <div data-id="" class="recommended-items__item">
                                        <img class="recommended-items__photo"
                                            src="{{ asset('storage/app/variation') }}/{{ $item->img_variation }}" />
                                        <h3 class="title4 recommended-items__item-title">
                                        </h3>
                                        <button
                                            class="paragraph button button--outlined recommended-items__left-button">Добавить
                                            к заказу</button>
                                        <a class="button button--transparent recommended-items__right-button"><button
                                                class="paragraph">Подробнее</button></a>
                                    </div>
                                    @elseif($item->type_variation == $type)
                                    <div data-id="" class="recommended-items__item">
                                        <img class="recommended-items__photo"
                                            src="{{ asset('storage/app/variation') }}/{{ $item->img_variation }}" />
                                        <h3 class="title4 recommended-items__item-title">
                                        </h3>
                                        <button
                                            class="paragraph button button--outlined recommended-items__left-button">Добавить
                                            к заказу</button>
                                        <a class="button button--transparent recommended-items__right-button"><button
                                                class="paragraph">Подробнее</button></a>
                                    </div>
                                    @endif 
                                    @endforeach
                                </div>
                                <div class="page-selector recommended-items__page-selector">
                                    <span class="page-selector__prev">Назад</span>
                                    <span class="page-selector__numbers">
                                        <span class="page-selector__number">01</span>
                                        <span class="page-selector__count">01</span>
                                    </span>
                                    <span class="page-selector__next">Далее</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="recommended-items__tab js-tab">
                        <div class="recommended-items__wrapper ">
                            <div class="recommended-items__grid js-grid">
                                <div class="recommended-items__content js-content ">
                                    <div data-id="" class="recommended-items__item">
                                        <img class="recommended-items__photo" src="" />
                                        <h3 class="title4 recommended-items__item-title">
                                            <button
                                                class="paragraph button button--outlined recommended-items__left-button">Добавить
                                                к заказу</button>
                                    </div>
                                </div>
                                <div class="page-selector recommended-items__page-selector">
                                    <span class="page-selector__prev">Назад</span>
                                    <span class="page-selector__numbers">
                                        <span class="page-selector__number">01</span>
                                        <span class="page-selector__count">01</span>
                                    </span>
                                    <span class="page-selector__next">Далее</span>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            @endif
    </section>
    <div style="display: none" class="model">{{ $model }}</div>
    @include('contacts')
    @include('footer')
    @include('scripts')
    <script>
        $(document).ready(function () {
            $('.js--carusel-slick').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 500,
                fade: true,
                centerMode: true,
                cssEase: 'linear'
            });
            // $(".js-lupa").elevateZoom({ zoomType: "lens", containLensZoom: true, lensSize: 200});

            $('.js-ajax-cart').on('click', function (e) {
                e.preventDefault();
                let cnt = Number($('.js-cnt').text());
                if ($('.js--variation.selected').hasClass('js--glass-this'))
                    var id = Number($('.js--glass-this.selected').attr('variation_id'));
                else
                    var id = Number($('.js--color-selector.selected').attr('variation_id'));
                $.ajax({
                    url: "{{ route('addToCart') }}",
                    type: "POST",
                    data: JSON.stringify({
                        count: cnt,
                        id: id
                    }),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {}
                });
            })

            getGlasses("{{ route('glass') }}", $('.js--variation.selected').attr('color_id'), $('.model')
                .text());

            $('div[color_id]').on('click', function () {
                getGlasses("{{ route('glass') }}", $(this).attr('color_id'), $(this).attr(
                    'variation_id'));
                $('.js--mat-glass').text($(this).attr('material_name'))
                $('.js--color-glass').text($(this).attr('color_name'))
            });


            $(document).on('click', '.js--cancel', function () {
                if ($(this).hasClass('glass_here')) {
                    getGlasses("{{ route('glass') }}", $('.js--default-select').attr('color_id'), $(
                        '.model').text());
                    $('.js--cancel').css('display', 'none');
                    $('.default').css('display', 'block');
                    $('.js-color-this').text('');
                    $('.js-color-this.js--default').text($('.js--default-name').text());
                    $('.js--variation').removeClass('selected');
                    $('.js--default-select').toggleClass('selected');
                    $('.js--material').text($('.js--default-select').attr('material_name'));
                    $('.js-color').text($('.js--default-select').attr('color_name'));
                } else {
                    $('.js--cancel').css('display', 'none');
                    $('.default').css('display', 'block');
                    $('.js-color-this').text('');
                    $('.js-color-this.js--default').text($('.js--default-name').text());
                    $('.js--variation').removeClass('selected');
                    $('.js--default-select').toggleClass('selected');
                    $('.js--main-door-foto').attr('src', $('.js--default-select').attr('src_image'));
                    $('.js--main-door-foto').attr('data-zoom-image', $('.js--default-select').attr(
                        'src_image'));
                    $('.js--material').text($('.js--default-select').attr('material_name'));
                    $('.js-color').text($('.js--default-select').attr('color_name'));
                }
            });



            function getGlasses(url, color, model) {
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        type: "{{ $type }}",
                        id_door: "{{ $id }}",
                        id_color: color,
                        model: model
                    },
                    dataType: "text",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        $('.glass').html(data)
                        $('.js--mat-glass').text($('.selected.js--default-select.js--glass').attr(
                            'material_name'))
                        $('.js--color-glass').text($('.selected.js--default-select.js--glass').attr(
                            'color_name'))
                        $('.js-glass-grup').text($('.js--glass-this.selected').attr('group_glass'))
                        $('.js-glass-this').text($('.js--glass-this.selected').attr('color_glass'))
                        $('.js--main-door-foto').attr('src', $('.--glass').attr('src_image'));
                        $('.js--main-door-foto').attr('data-zoom-image', $('.--glass').attr(
                            'src_image'));
                    },
                    error: function (xhr, textStatus) {
                        console.log(xhr)
                    },
                });
            }
        })

    </script>
</body>

</html>
