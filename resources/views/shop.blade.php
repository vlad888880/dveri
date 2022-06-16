<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('styles')
    <title>ДверОК</title>
</head>

<body>
    @include('header')
    <section class="catalog-section catalog-page__catalog-section">
        <div class="side-menu js-filters">
            <div class="side-menu__wrapper">
                <div class="side-menu__content filters-menu">
                    <div class="filters-menu__title title1">Фильтры</div>
                    <form action="{{ route('shop') }}" method="GET">
                        <div class="scrollElement">
                            <div class="block_of_filter">
                                <div class="filter_title">
                                    <div>
                                        <span class="filter_name">Сортировка</span>
                                        <div class="preview_look">
                                            <span class="non" style="display: none"></span>
                                        </div>
                                    </div>
                                    <svg class="hide_filter_list" data-type="close" width="13" height="7"
                                        viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.0001 0.999736C13.0001 1.17758 12.9272 1.35577 12.78 1.49136L7.03211 6.79636C6.73797 7.06788 6.26184 7.06788 5.9677 6.79636L0.220609 1.49136C-0.0735366 1.21984 -0.0735366 0.779985 0.220609 0.508467C0.514754 0.236948 0.991262 0.236948 1.28503 0.508467L6.4999 5.32255L11.7148 0.508466C12.0089 0.236947 12.4858 0.236947 12.78 0.508466C12.9268 0.64405 13.0001 0.821893 13.0001 0.999736Z"
                                            fill="#333333" />
                                    </svg>
                                </div>
                                <div class="filter_block" data="sort">
                                    <label class="item"><span>По умолчанию</span><input call="По умолчанию"
                                            name="sorting" value="default" type="radio"></label>
                                    <label class="item"><span>Цена: сначала дороже</span><input
                                            call="Цена: сначала дороже" name="sorting" value="price_max"
                                            type="radio"></label>
                                    <label class="item"><span>Цена: сначала дешевле</span><input
                                            call="Цена: сначала дешевле" name="sorting" value="price_min"
                                            type="radio"></label>
                                    <label class="item"><span>По новизне</span><input call="По новизне" name="sorting"
                                            value="new" type="radio"></label>
                                    <label class="item"><span>По названию</span><input call="По названию" name="sorting"
                                            value="call" type="radio"></label>
                                    <!-- <div class="item"><span>По популярности</span><input name="sorting" value="popular" type="radio"></div> -->
                                </div>
                            </div>
                            <div class="block_of_filter">
                                <div class="filter_title">
                                    <div>
                                        <span class="filter_name">Категории</span>
                                        <div class="preview_look">
                                            <span class="non" style="display: none"></span>
                                        </div>
                                    </div>
                                    <svg class="hide_filter_list" data-type="close" width="13" height="7"
                                        viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.0001 0.999736C13.0001 1.17758 12.9272 1.35577 12.78 1.49136L7.03211 6.79636C6.73797 7.06788 6.26184 7.06788 5.9677 6.79636L0.220609 1.49136C-0.0735366 1.21984 -0.0735366 0.779985 0.220609 0.508467C0.514754 0.236948 0.991262 0.236948 1.28503 0.508467L6.4999 5.32255L11.7148 0.508466C12.0089 0.236947 12.4858 0.236947 12.78 0.508466C12.9268 0.64405 13.0001 0.821893 13.0001 0.999736Z"
                                            fill="#333333" />
                                    </svg>
                                </div>
                                <div class="filter_block" data="cat">
                                    @foreach($category as $item)
                                    <label class="item">
                                        <span>{{ $item['name_category'] }}</span>
                                        <input call="{{ $item['name_category'] }}" type="checkbox" name="category[]"
                                            value="{{ $item['id_category'] }}"></input>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="block_of_filter">
                                <div class="filter_title">
                                    <div>
                                        <span class="filter_name">Материал</span>
                                        <div class="preview_look">
                                            <span class="non" style="display: none"></span>
                                        </div>
                                    </div>
                                    <svg class="hide_filter_list" data-type="close" width="13" height="7"
                                        viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.0001 0.999736C13.0001 1.17758 12.9272 1.35577 12.78 1.49136L7.03211 6.79636C6.73797 7.06788 6.26184 7.06788 5.9677 6.79636L0.220609 1.49136C-0.0735366 1.21984 -0.0735366 0.779985 0.220609 0.508467C0.514754 0.236948 0.991262 0.236948 1.28503 0.508467L6.4999 5.32255L11.7148 0.508466C12.0089 0.236947 12.4858 0.236947 12.78 0.508466C12.9268 0.64405 13.0001 0.821893 13.0001 0.999736Z"
                                            fill="#333333" />
                                    </svg>
                                </div>
                                <div class="filter_block" data="material">
                                    @foreach($material as $item)
                                    <label class="item">
                                        <span>{{ $item['name_material'] }}</span>
                                        <input call="{{ $item['name_material'] }}" type="checkbox" name="material[]"
                                            value="{{ $item['id_material'] }}"></input>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="block_of_filter">
                                <div class="filter_title">
                                    <span class="filter_name">Оттенки</span>
                                    <svg class="hide_filter_list" data-type="close" width="13" height="7" viewBox="0 0 13 7"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.0001 0.999736C13.0001 1.17758 12.9272 1.35577 12.78 1.49136L7.03211 6.79636C6.73797 7.06788 6.26184 7.06788 5.9677 6.79636L0.220609 1.49136C-0.0735366 1.21984 -0.0735366 0.779985 0.220609 0.508467C0.514754 0.236948 0.991262 0.236948 1.28503 0.508467L6.4999 5.32255L11.7148 0.508466C12.0089 0.236947 12.4858 0.236947 12.78 0.508466C12.9268 0.64405 13.0001 0.821893 13.0001 0.999736Z"
                                            fill="#333333" />
                                    </svg>
                                </div>
                                <div class="filter_block_c">
                                    @foreach($shades as $item)
                                    <label class="items_c">
                                        <div class="js--activiert">
                                            <div class="circle_color" style="background: {{ $item['color_hash'] }};"></div>
                                        </div>
                                        <div class="title_color">{{ $item['name'] }}</div>
                                        <input type="checkbox" name="shades[]"
                                            value="{{ $item['id_shades'] }}"></input>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="block_of_filter">
                                <div class="filter_title">
                                    <div>
                                        <span class="filter_name">Цена</span>
                                        <div class="preview_look">
                                            <span class="non" style="display: none"></span>
                                        </div>
                                    </div>
                                    <svg class="hide_filter_list" data-type="close" width="13" height="7"
                                        viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.0001 0.999736C13.0001 1.17758 12.9272 1.35577 12.78 1.49136L7.03211 6.79636C6.73797 7.06788 6.26184 7.06788 5.9677 6.79636L0.220609 1.49136C-0.0735366 1.21984 -0.0735366 0.779985 0.220609 0.508467C0.514754 0.236948 0.991262 0.236948 1.28503 0.508467L6.4999 5.32255L11.7148 0.508466C12.0089 0.236947 12.4858 0.236947 12.78 0.508466C12.9268 0.64405 13.0001 0.821893 13.0001 0.999736Z"
                                            fill="#333333" />
                                    </svg>
                                </div>
                                <div class="filter_block" data="price">
                                    <label class="item">
                                        <span>0 - 10 000 <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1.41152 0H5.93822C7.06088 0 7.95179 0.25749 8.61097 0.772472C9.27015 1.27715 9.59974 2.07538 9.59974 3.16714C9.59974 5.38156 8.34833 6.48877 5.84552 6.48877H2.86377V7.56673H6.13733V8.75695H2.86377V11H1.41152V8.75695H0V7.56673H1.41152V6.47709H0.0396268V5.28687H1.41152V0ZM2.86377 1.25141V5.26827H5.66012C6.4429 5.26827 7.05058 5.12407 7.48316 4.83568C7.92605 4.53699 8.14749 4.01171 8.14749 3.25984C8.14749 2.83755 8.07539 2.48736 7.9312 2.20927C7.7973 1.93118 7.59646 1.72519 7.32867 1.59129C7.06088 1.4574 6.78279 1.36985 6.4944 1.32865C6.20601 1.27715 5.86097 1.25141 5.45928 1.25141H2.86377Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <input call="0 - 10 000" type="checkbox" name="price[]" value="1"></input>
                                    </label>
                                    <label class="item">
                                        <span>10 000 - 25 000 <svg width="10" height="11" viewBox="0 0 10 11"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1.41152 0H5.93822C7.06088 0 7.95179 0.25749 8.61097 0.772472C9.27015 1.27715 9.59974 2.07538 9.59974 3.16714C9.59974 5.38156 8.34833 6.48877 5.84552 6.48877H2.86377V7.56673H6.13733V8.75695H2.86377V11H1.41152V8.75695H0V7.56673H1.41152V6.47709H0.0396268V5.28687H1.41152V0ZM2.86377 1.25141V5.26827H5.66012C6.4429 5.26827 7.05058 5.12407 7.48316 4.83568C7.92605 4.53699 8.14749 4.01171 8.14749 3.25984C8.14749 2.83755 8.07539 2.48736 7.9312 2.20927C7.7973 1.93118 7.59646 1.72519 7.32867 1.59129C7.06088 1.4574 6.78279 1.36985 6.4944 1.32865C6.20601 1.27715 5.86097 1.25141 5.45928 1.25141H2.86377Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <input call="10 000 - 25 000" type="checkbox" name="price[]" value="2"></input>
                                    </label>
                                    <label class="item">
                                        <span>от 25 000 <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1.41152 0H5.93822C7.06088 0 7.95179 0.25749 8.61097 0.772472C9.27015 1.27715 9.59974 2.07538 9.59974 3.16714C9.59974 5.38156 8.34833 6.48877 5.84552 6.48877H2.86377V7.56673H6.13733V8.75695H2.86377V11H1.41152V8.75695H0V7.56673H1.41152V6.47709H0.0396268V5.28687H1.41152V0ZM2.86377 1.25141V5.26827H5.66012C6.4429 5.26827 7.05058 5.12407 7.48316 4.83568C7.92605 4.53699 8.14749 4.01171 8.14749 3.25984C8.14749 2.83755 8.07539 2.48736 7.9312 2.20927C7.7973 1.93118 7.59646 1.72519 7.32867 1.59129C7.06088 1.4574 6.78279 1.36985 6.4944 1.32865C6.20601 1.27715 5.86097 1.25141 5.45928 1.25141H2.86377Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <input call="от 25 000" type="checkbox" name="price[]" value="3"></input>
                                    </label>
                                </div>
                            </div>
                            <div class="block_of_filter">
                                <div class="filter_title">
                                    <div>
                                        <span class="filter_name">Производитель</span>
                                        <div class="preview_look">
                                            <span class="non" style="display: none"></span>
                                        </div>
                                    </div>
                                    <svg class="hide_filter_list" data-type="close" width="13" height="7"
                                        viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.0001 0.999736C13.0001 1.17758 12.9272 1.35577 12.78 1.49136L7.03211 6.79636C6.73797 7.06788 6.26184 7.06788 5.9677 6.79636L0.220609 1.49136C-0.0735366 1.21984 -0.0735366 0.779985 0.220609 0.508467C0.514754 0.236948 0.991262 0.236948 1.28503 0.508467L6.4999 5.32255L11.7148 0.508466C12.0089 0.236947 12.4858 0.236947 12.78 0.508466C12.9268 0.64405 13.0001 0.821893 13.0001 0.999736Z"
                                            fill="#333333" />
                                    </svg>
                                </div>
                                <div class="filter_block" data="partner">
                                    @foreach($partner as $item)
                                    <label class="item">
                                        <span>{{ $item['name_partner'] }}</span>
                                        <input call="{{ $item['name_partner'] }}" type="checkbox" name="partner[]"
                                            value="{{ $item['id_partner'] }}"></input>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="block_of_filter">
                                <div class="filter_title">
                                    <div>
                                        <span class="filter_name">Коллекция</span>
                                        <div class="preview_look">
                                            <span class="non" style="display: none"></span>
                                        </div>
                                    </div>
                                    <svg class="hide_filter_list" data-type="close" width="13" height="7"
                                        viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.0001 0.999736C13.0001 1.17758 12.9272 1.35577 12.78 1.49136L7.03211 6.79636C6.73797 7.06788 6.26184 7.06788 5.9677 6.79636L0.220609 1.49136C-0.0735366 1.21984 -0.0735366 0.779985 0.220609 0.508467C0.514754 0.236948 0.991262 0.236948 1.28503 0.508467L6.4999 5.32255L11.7148 0.508466C12.0089 0.236947 12.4858 0.236947 12.78 0.508466C12.9268 0.64405 13.0001 0.821893 13.0001 0.999736Z"
                                            fill="#333333" />
                                    </svg>
                                </div>
                                <div class="filter_block" data="collection">
                                    @foreach($collection as $item)
                                    <label class="item">
                                        <span>{{ $item['name_door'] }}</span>
                                        <input call="{{ $item['name_door'] }}" type="checkbox" name="collection[]"
                                            value="{{ $item['id_door'] }}"></input>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="overlay__btn">
                            <div class="btn_clean">Очистить фильтры</div>
                            <div class="btn_look">Смотреть<span class="btn_look_count"></span></div>
                        </div>
                    </form>
                    <div class="side-menu__cross">

                    </div>
                </div>
            </div>
        </div>
        <div class="catalog-section__header">
            <div class="catalog-section__title-wrapper">
                <div class="catalog-section__title">
                    <h1 class="title1 js--rt">Каталог</h1>
                </div>
                <button class="button button-text js-filters-button catalog-section__button">Фильтры</button>
                <div class="breadcrumb catalog-section__breadcrumb">

                </div>
            </div>
            <div class="tab_sort">
                <div class="item btn_clean_tab">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="16.6317" y="15.2175" width="2" height="21" transform="rotate(135 16.6317 15.2175)"
                            fill="#333333" />
                        <rect x="1.78247" y="16.6316" width="2" height="21" transform="rotate(-135 1.78247 16.6316)"
                            fill="#333333" />
                    </svg>
                </div>
                <div class="item mdt-open" data="sort">Сортировка</div>
                <div class="item mdt-open" data="cat">Категория</div>
                <div class="item mdt-open" data="price">Цена</div>
                <div class="item mdt-open" data="material">материал</div>
                <div class="item mdt-open" data="partner">Производитель</div>
                <div class="item mdt-open" data="collection">Коллекция</div>
                <div class="item mdt-open">Все фильтры</div>
            </div>
        </div>
        <div class="catalog-section__grid-wrapper">

        </div>

    </section>
    <div id="zatemnenie"></div>
    <div class="overlay_filter">
        <form action="{{ route('shop') }}" method="GET">
            <div class="close_filter">
                <svg width="53" height="53" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="12.3742" y="13.7888" width="2" height="37" transform="rotate(-45 12.3742 13.7888)"
                        fill="black" />
                    <rect x="13.7887" y="39.9517" width="2" height="37" transform="rotate(-135 13.7887 39.9517)"
                        fill="black" />
                </svg>
            </div>
            <div class="scrollElement">
                <div class="block_of_filter">
                    <div class="filter_title">
                        <div>
                            <span class="filter_name">Сортировка</span>
                            <div class="preview_look">
                                <span class="non" style="display: none"></span>
                            </div>
                        </div>
                        <svg class="hide_filter_list" data-type="close" width="13" height="7" viewBox="0 0 13 7"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.0001 0.999736C13.0001 1.17758 12.9272 1.35577 12.78 1.49136L7.03211 6.79636C6.73797 7.06788 6.26184 7.06788 5.9677 6.79636L0.220609 1.49136C-0.0735366 1.21984 -0.0735366 0.779985 0.220609 0.508467C0.514754 0.236948 0.991262 0.236948 1.28503 0.508467L6.4999 5.32255L11.7148 0.508466C12.0089 0.236947 12.4858 0.236947 12.78 0.508466C12.9268 0.64405 13.0001 0.821893 13.0001 0.999736Z"
                                fill="#333333" />
                        </svg>
                    </div>
                    <div class="filter_block" data="sort">
                        <label class="item"><span>По умолчанию</span><input call="По умолчанию" name="sorting"
                                value="default" type="radio"></label>
                        <label class="item"><span>Цена: сначала дороже</span><input call="Цена: сначала дороже"
                                name="sorting" value="price_max" type="radio"></label>
                        <label class="item"><span>Цена: сначала дешевле</span><input call="Цена: сначала дешевле"
                                name="sorting" value="price_min" type="radio"></label>
                        <label class="item"><span>По новизне</span><input call="По новизне" name="sorting" value="new"
                                type="radio"></label>
                        <label class="item"><span>По названию</span><input call="По названию" name="sorting"
                                value="call" type="radio"></label>
                        <!-- <div class="item"><span>По популярности</span><input name="sorting" value="popular" type="radio"></div> -->
                    </div>
                </div>
                <div class="block_of_filter">
                    <div class="filter_title">
                        <div>
                            <span class="filter_name">Категории</span>
                            <div class="preview_look">
                                <span class="non" style="display: none"></span>
                            </div>
                        </div>
                        <svg class="hide_filter_list" data-type="close" width="13" height="7" viewBox="0 0 13 7"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.0001 0.999736C13.0001 1.17758 12.9272 1.35577 12.78 1.49136L7.03211 6.79636C6.73797 7.06788 6.26184 7.06788 5.9677 6.79636L0.220609 1.49136C-0.0735366 1.21984 -0.0735366 0.779985 0.220609 0.508467C0.514754 0.236948 0.991262 0.236948 1.28503 0.508467L6.4999 5.32255L11.7148 0.508466C12.0089 0.236947 12.4858 0.236947 12.78 0.508466C12.9268 0.64405 13.0001 0.821893 13.0001 0.999736Z"
                                fill="#333333" />
                        </svg>
                    </div>
                    <div class="filter_block" data="cat">
                        @foreach($category as $item)
                        <label class="item">
                            <span>{{ $item['name_category'] }}</span>
                            <input call="{{ $item['name_category'] }}" type="checkbox" name="category[]"
                                value="{{ $item['id_category'] }}"></input>
                        </label>
                        @endforeach
                    </div>
                </div>
                <div class="block_of_filter">
                    <div class="filter_title">
                        <div>
                            <span class="filter_name">Материал</span>
                            <div class="preview_look">
                                <span class="non" style="display: none"></span>
                            </div>
                        </div>
                        <svg class="hide_filter_list" data-type="close" width="13" height="7" viewBox="0 0 13 7"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.0001 0.999736C13.0001 1.17758 12.9272 1.35577 12.78 1.49136L7.03211 6.79636C6.73797 7.06788 6.26184 7.06788 5.9677 6.79636L0.220609 1.49136C-0.0735366 1.21984 -0.0735366 0.779985 0.220609 0.508467C0.514754 0.236948 0.991262 0.236948 1.28503 0.508467L6.4999 5.32255L11.7148 0.508466C12.0089 0.236947 12.4858 0.236947 12.78 0.508466C12.9268 0.64405 13.0001 0.821893 13.0001 0.999736Z"
                                fill="#333333" />
                        </svg>
                    </div>
                    <div class="filter_block" data="material">
                        @foreach($material as $item)
                        <label class="item">
                            <span>{{ $item['name_material'] }}</span>
                            <input call="{{ $item['name_material'] }}" type="checkbox" name="material[]"
                                value="{{ $item['id_material'] }}"></input>
                        </label>
                        @endforeach
                    </div>
                </div>
                <div class="block_of_filter">
                    <div class="filter_title">
                        <span class="filter_name">Оттенки</span>
                        <svg class="hide_filter_list" data-type="close" width="13" height="7" viewBox="0 0 13 7"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.0001 0.999736C13.0001 1.17758 12.9272 1.35577 12.78 1.49136L7.03211 6.79636C6.73797 7.06788 6.26184 7.06788 5.9677 6.79636L0.220609 1.49136C-0.0735366 1.21984 -0.0735366 0.779985 0.220609 0.508467C0.514754 0.236948 0.991262 0.236948 1.28503 0.508467L6.4999 5.32255L11.7148 0.508466C12.0089 0.236947 12.4858 0.236947 12.78 0.508466C12.9268 0.64405 13.0001 0.821893 13.0001 0.999736Z"
                                fill="#333333" />
                        </svg>
                    </div>
                    <div class="filter_block_c">
                        @foreach($shades as $item)
                        <label class="items_c">
                            <div class="js--activiert">
                                <div class="circle_color" style="background: {{ $item['color_hash'] }};"></div>
                            </div>
                            <div class="title_color">{{ $item['name'] }}</div>
                            <input type="checkbox" name="shades[]"
                                value="{{ $item['id_shades'] }}"></input>
                        </label>
                        @endforeach
                    </div>
                </div>
                <div class="block_of_filter">
                    <div class="filter_title">
                        <div>
                            <span class="filter_name">Цена</span>
                            <div class="preview_look">
                                <span class="non" style="display: none"></span>
                            </div>
                        </div>
                        <svg class="hide_filter_list" data-type="close" width="13" height="7" viewBox="0 0 13 7"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.0001 0.999736C13.0001 1.17758 12.9272 1.35577 12.78 1.49136L7.03211 6.79636C6.73797 7.06788 6.26184 7.06788 5.9677 6.79636L0.220609 1.49136C-0.0735366 1.21984 -0.0735366 0.779985 0.220609 0.508467C0.514754 0.236948 0.991262 0.236948 1.28503 0.508467L6.4999 5.32255L11.7148 0.508466C12.0089 0.236947 12.4858 0.236947 12.78 0.508466C12.9268 0.64405 13.0001 0.821893 13.0001 0.999736Z"
                                fill="#333333" />
                        </svg>
                    </div>
                    <div class="filter_block" data="price">
                        <label class="item">
                            <span>0 - 10 000 <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1.41152 0H5.93822C7.06088 0 7.95179 0.25749 8.61097 0.772472C9.27015 1.27715 9.59974 2.07538 9.59974 3.16714C9.59974 5.38156 8.34833 6.48877 5.84552 6.48877H2.86377V7.56673H6.13733V8.75695H2.86377V11H1.41152V8.75695H0V7.56673H1.41152V6.47709H0.0396268V5.28687H1.41152V0ZM2.86377 1.25141V5.26827H5.66012C6.4429 5.26827 7.05058 5.12407 7.48316 4.83568C7.92605 4.53699 8.14749 4.01171 8.14749 3.25984C8.14749 2.83755 8.07539 2.48736 7.9312 2.20927C7.7973 1.93118 7.59646 1.72519 7.32867 1.59129C7.06088 1.4574 6.78279 1.36985 6.4944 1.32865C6.20601 1.27715 5.86097 1.25141 5.45928 1.25141H2.86377Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <input call="0 - 10 000" type="checkbox" name="price[]" value="1"></input>
                        </label>
                        <label class="item">
                            <span>10 000 - 25 000 <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1.41152 0H5.93822C7.06088 0 7.95179 0.25749 8.61097 0.772472C9.27015 1.27715 9.59974 2.07538 9.59974 3.16714C9.59974 5.38156 8.34833 6.48877 5.84552 6.48877H2.86377V7.56673H6.13733V8.75695H2.86377V11H1.41152V8.75695H0V7.56673H1.41152V6.47709H0.0396268V5.28687H1.41152V0ZM2.86377 1.25141V5.26827H5.66012C6.4429 5.26827 7.05058 5.12407 7.48316 4.83568C7.92605 4.53699 8.14749 4.01171 8.14749 3.25984C8.14749 2.83755 8.07539 2.48736 7.9312 2.20927C7.7973 1.93118 7.59646 1.72519 7.32867 1.59129C7.06088 1.4574 6.78279 1.36985 6.4944 1.32865C6.20601 1.27715 5.86097 1.25141 5.45928 1.25141H2.86377Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <input call="10 000 - 25 000" type="checkbox" name="price[]" value="2"></input>
                        </label>
                        <label class="item">
                            <span>от 25 000 <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1.41152 0H5.93822C7.06088 0 7.95179 0.25749 8.61097 0.772472C9.27015 1.27715 9.59974 2.07538 9.59974 3.16714C9.59974 5.38156 8.34833 6.48877 5.84552 6.48877H2.86377V7.56673H6.13733V8.75695H2.86377V11H1.41152V8.75695H0V7.56673H1.41152V6.47709H0.0396268V5.28687H1.41152V0ZM2.86377 1.25141V5.26827H5.66012C6.4429 5.26827 7.05058 5.12407 7.48316 4.83568C7.92605 4.53699 8.14749 4.01171 8.14749 3.25984C8.14749 2.83755 8.07539 2.48736 7.9312 2.20927C7.7973 1.93118 7.59646 1.72519 7.32867 1.59129C7.06088 1.4574 6.78279 1.36985 6.4944 1.32865C6.20601 1.27715 5.86097 1.25141 5.45928 1.25141H2.86377Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <input call="от 25 000" type="checkbox" name="price[]" value="3"></input>
                        </label>
                    </div>
                </div>
                <div class="block_of_filter">
                    <div class="filter_title">
                        <div>
                            <span class="filter_name">Производитель</span>
                            <div class="preview_look">
                                <span class="non" style="display: none"></span>
                            </div>
                        </div>
                        <svg class="hide_filter_list" data-type="close" width="13" height="7" viewBox="0 0 13 7"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.0001 0.999736C13.0001 1.17758 12.9272 1.35577 12.78 1.49136L7.03211 6.79636C6.73797 7.06788 6.26184 7.06788 5.9677 6.79636L0.220609 1.49136C-0.0735366 1.21984 -0.0735366 0.779985 0.220609 0.508467C0.514754 0.236948 0.991262 0.236948 1.28503 0.508467L6.4999 5.32255L11.7148 0.508466C12.0089 0.236947 12.4858 0.236947 12.78 0.508466C12.9268 0.64405 13.0001 0.821893 13.0001 0.999736Z"
                                fill="#333333" />
                        </svg>
                    </div>
                    <div class="filter_block" data="partner">
                        @foreach($partner as $item)
                        <label class="item">
                            <span>{{ $item['name_partner'] }}</span>
                            <input call="{{ $item['name_partner'] }}" type="checkbox" name="partner[]"
                                value="{{ $item['id_partner'] }}"></input>
                        </label>
                        @endforeach
                    </div>
                </div>
                <div class="block_of_filter">
                    <div class="filter_title">
                        <div>
                            <span class="filter_name">Коллекция</span>
                            <div class="preview_look">
                                <span class="non" style="display: none"></span>
                            </div>
                        </div>
                        <svg class="hide_filter_list" data-type="close" width="13" height="7" viewBox="0 0 13 7"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.0001 0.999736C13.0001 1.17758 12.9272 1.35577 12.78 1.49136L7.03211 6.79636C6.73797 7.06788 6.26184 7.06788 5.9677 6.79636L0.220609 1.49136C-0.0735366 1.21984 -0.0735366 0.779985 0.220609 0.508467C0.514754 0.236948 0.991262 0.236948 1.28503 0.508467L6.4999 5.32255L11.7148 0.508466C12.0089 0.236947 12.4858 0.236947 12.78 0.508466C12.9268 0.64405 13.0001 0.821893 13.0001 0.999736Z"
                                fill="#333333" />
                        </svg>
                    </div>
                    <div class="filter_block" data="collection">
                        @foreach($collection as $item)
                        <label class="item">
                            <span>{{ $item['name_door'] }}</span>
                            <input call="{{ $item['name_door'] }}" type="checkbox" name="collection[]"
                                value="{{ $item['id_door'] }}"></input>
                        </label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="overlay__btn">
                <div class="btn_clean">Очистить фильтры</div>
                <div class="btn_look">Смотреть<span class="btn_look_count"></span></div>
            </div>
        </form>
    </div>
    @include('contacts')
    @include('footer')
    @include('scripts')
    <script>
        $(document).ready(function () {
            $('.items_c').on('mouseup', function(e){
                $(this).find('.js--activiert').hasClass('--active') ? $(this).find('.js--activiert').removeClass('--active') : $(this).find('.js--activiert').toggleClass('--active');
            });

            $('input:checked').each(function () {
                !$(this).parent('.items_c').find('.js--activiert').hasClass('--active') ? $(this).parent('.items_c').find('.js--activiert').toggleClass('--active') : "";
            });

            getArticles("{{ route('index') }}");
            $('form').on('change', function (e) {
                e.preventDefault();
                getArticles("{{ route('index') }}");
            })

            $('input:checked').each(function () {
                $(this).parent('.item').parent('.filter_block').parent('.block_of_filter').find('.non')
                    .after(`<span class="each">${$(this).attr('call')}</span>&nbsp;`);
            });

            $('input').on('change', function () {
                $(".each").remove();
                $('input:checked').each(function () {
                    $(this).parent('.item').parent('.filter_block').parent('.block_of_filter')
                        .find('.non').after(
                            `<span class="each">${$(this).attr('call')}</span>&nbsp;`);
                });
            })

            $('html').on('click', '.btn_clean, .btn_clean_tab', function (e) {
                e.preventDefault();
                $('.each').remove();
                $('div').removeClass('--active');
                $('form').trigger("reset");
                getArticles("{{ route('index') }}");
            });

            $('body').on('click', '.pagination a', function (e) {
                e.preventDefault();

                // $('#load a').css('color', '#dfecf6');
                // $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

                getArticles($(this).attr('href'));
                // window.history.pushState("", "", url);
            });

            function getArticles(url) {
                $.ajax({
                    url: url,
                    type: "GET",
                    data: $('form').serialize(),
                    dataType: "text",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        $('.catalog-section__grid-wrapper').html(data)
                        $('.btn_look_count').text($('.cnt').attr('data'))
                    },
                    error: function (xhr, textStatus) {

                    },
                });
            }
        })

    </script>
</body>

</html>
