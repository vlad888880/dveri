$(document).ready(() => {
    $("a[href^='#']").click(function () {
        var _href = $(this).attr("href");
        $("html, body").animate({
            scrollTop: $(_href).offset().top + "px"
        });
        return false;
    });
    $('.filter_block_c').hide();
    $('.filter_block').hide();
    $('.filter_title').on('click', function () {
        if ($(this).find('.hide_filter_list').attr('data-type') == 'close') {
            $(this).parent('.block_of_filter').find('.filter_block').show();
            $(this).parent('.block_of_filter').find('.filter_block_c').show();
            $(this).find('.hide_filter_list').attr('data-type', 'open');
        } else {
            $(this).parent('.block_of_filter').find('.filter_block').hide();
            $(this).parent('.block_of_filter').find('.filter_block_c').hide();
            $(this).find('.hide_filter_list').attr('data-type', 'close');
        }
    });

    $(document).on('click', '.js--glass-this.selected', function () {
        $('.js-glass-grup').text($(this).attr('group_glass'));
        $('.js-glass-this').text($(this).attr('color_glass'));
    });

    $('.mdt-open').on('click', function () {
        $(`.filter_block`).hide();
        $(`.filter_block[data="${$(this).attr('data')}"]`).show();
        $('#zatemnenie').css('display', 'block');
        $('html').toggleClass('no-scroll');
        $('.overlay_filter').css('display', 'block');
    });

    $('html').on('click', '.close_filter, #zatemnenie, .btn_look', function () {
        $('#zatemnenie').css('display', 'none');
        $('html').removeClass('no-scroll');
        $('.overlay_filter').css('display', 'none');
    });

    $('.slick-slider').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        nextArrow: '.js-next-coments',
        prevArrow: '.js-prev-coments',
        fade: true
    });

    $('.slick-slider-m').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        nextArrow: '.js-next-coments-m',
        prevArrow: '.js-prev-coments-m',
        fade: true,
    });

    $('.slick-slider-best-price').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        nextArrow: '.js-next-best-price',
        prevArrow: '.js-prev-best-price',
        responsive: [
            {
            breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            }
        ]
    });

   

    $('html').on('click', '.js--variation', function () {
        if ($('.--glass').hasClass('js--variation')) {
            $('.js--mat-glass').text($(this).attr('mat_name'));
            $('.js--color-glass').text($(this).attr('color_name'));
            $(this).attr('variation_name') != "" ? $('.model_name').text($(this).attr('variation_name')) : "";
            $('.js--main-door-foto').attr('src', $(this).attr('src_image'));
            $('.js--main-door-foto').attr('data-zoom-image', $(this).attr('src_image'));
            $('.zoomWindow').css('background-image', `url("${$(this).attr('src_image')}")`);
            $(this).parent().parent().find('.js--cancel').css('display', 'block');
            $('.own').attr('src', $(this).attr('src_image'));
            $(this).hasClass('js--glass-this') ? $('.js--variation.js--glass-this').removeClass('selected') :  $('.js--variation').removeClass('selected');
            $(this).toggleClass('selected');
            $('.js--material').text($(this).attr('material_name'));
            $('.js-color').text($(this).attr('color_name'));
            $('.js-price-view').text($(this).attr('price'));
            $('.js-color-this').text('');
            $(this).parent('.stage1').parent('.stage2').find('.js-color-this').text($(this).attr('color_name'));
        } else {
            $(this).attr('variation_name') != "" ? $('.model_name').text($(this).attr('variation_name')) : "";
            $('.js--main-door-foto').attr('src', $(this).attr('src_image'));
            $('.js--main-door-foto').attr('data-zoom-image', $(this).attr('src_image'));
            $('.zoomWindow').css('background-image',`url("${$(this).attr('src_image')}")`);
            $('.js--cancel').css('display', 'none');
            $('.js--glass-this').removeClass('selected');
            $('.js--variation').removeClass('selected');
            $(this).toggleClass('selected');
            $(this).parent().parent().find('.js--cancel').css('display', 'block');
            $('.own').attr('src', $(this).attr('src_image'));
            $('.js--material').text($(this).attr('material_name'));
            $('.js-color').text($(this).attr('color_name'));
            $('.js-price-view').text($(this).attr('price'));
            $('.js-color-this').text('');
            $(this).parent('.stage1').parent('.stage2').find('.js-color-this').text($(this).attr('color_name'));
        }
    });

    $('html').on('click', '.js--main-door-foto', function () {
        $('.modal-img').attr('style', 'background-image: url("' + $(this).attr('src') + '")');
    });

     $('.product-card__image').css('width', '25.625rem');

    $(function () {
        var tab = $('.switcher-items__tab-selector');
        tab.on('click', function (event) {
            $('.switcher-items__tab-selector').removeClass('selected');
            $('.switcher-items__tab-selector[data-set=' + $(this).attr('data-set') + ']').toggleClass('selected');
            $('.js--model-switcher').removeClass('open');
            $('.js--model-switcher[data-set=' + $(this).attr('data-set') + ']').toggleClass('open');
        });
    });

    const $header = $('.header');
    const $headerBackground = $('.header__background');
    const $flash = $('.flash');

    //Cart
    (() => {
        const $cartButton = $('.cart-button');
        if (Cart.get().length > 0) {
            $cartButton.addClass('cart-button--full');
        } else {
            $cartButton.removeClass('cart-button--full');
        }
    })();




    //Mobile side-menu
    (() => {
        const $sideMenu = $('.js-mobile-menu');
        const $sideMenuButton = $('.js-burger-button');



        $sideMenuButton.click(() => {
            const isActive = $sideMenuButton.hasClass('hamburger--active');
            $sideMenuButton.toggleClass('hamburger--active');
            if (isActive) {
                $headerBackground.css('width', '0');
                $sideMenu.closeModal();
                $('html, body').removeClass('no-scroll');
            } else {
                $headerBackground.css('width', '100%');
                $('html, body').addClass('no-scroll');
                $sideMenu.openModal();
            }
        });



    })();


    //Catalog menu for desktop
    ((duration = 400) => {
        const $wrapper = $('.dropdown-menu__wrapper').hide(0);
        const $dropdownMenu = $('.dropdown-menu');
        const $submenu = $('.dropdown-menu__item').fadeOut(0);
        const $dom = $('html, body');
        let wasNoScroll = false;
        const show = () => {
            wasNoScroll = $dom.hasClass('no-scroll');
            if (!wasNoScroll)
                $dom.addClass('no-scroll');
            $dropdownMenu.css('height', '100vh');
            const height = $('.welcome-section_step-wrapper').outerHeight() || 0;
            const windowHeight = window.innerHeight;
            $headerBackground.animate({
                right: '0'
            }, {
                duration: duration
            });
            $flash.fadeIn({
                duration,
                easing: 'easeInOutCubic'
            }).fadeOut(duration);
            $wrapper
                .show(0)
                .css({
                    top: `${windowHeight-height}px`
                })
                .animate({
                    top: '6.25rem'
                }, {
                    duration: duration,
                    complete: () => {
                        $submenu.fadeIn('slow');
                    }
                });
        };
        const hide = () => {
            const height = $('.welcome-section_step-wrapper').outerHeight() || 0;
            const windowHeight = window.innerHeight;
            $headerBackground.animate({
                right: '100%'
            }, {
                duration: duration
            });
            $wrapper
                .animate({
                    top: `${windowHeight-height}px`
                }, {
                    duration: duration,
                    complete: () => {
                        $dropdownMenu.css('height', '0');
                        $wrapper.hide(0);
                        $submenu.fadeOut('slow');
                        if (!wasNoScroll)
                            $dom.removeClass('no-scroll');
                    }
                });
        };


        (() => {


            const mouseEnterHandler = function () {
                $(this).find('.dropdown-menu__dropdown').stop().show('slow');
            };
            const mouseLeaveHandler = function () {
                $(this).find('.dropdown-menu__dropdown').stop().hide('slow');
            };


            (() => {

                $('.js-dropdown > .dropdown__title').click(function () {
                    const $this = $(this).parent('.js-dropdown');
                    const isActive = $this.hasClass('active');
                    const $child = $this.find('.dropdown__dropdown').stop();
                    if (isActive) {
                        $child.hide('slow');
                        $this.removeClass('active')
                    } else {
                        $child.show('slow');
                        $this.addClass('active')
                    }
                });
            })();



            $submenu.on('mouseenter', mouseEnterHandler).on('mouseleave', mouseLeaveHandler).mouseleave();

        })();

        const checkboxHandler = function () {
            show();
            $(document).one('click', (event) => {
                if (!($dropdownMenu.is(event.target) || $dropdownMenu.has(event.target).length || $header.is(event.target) || $header.has(event.target).length)) {
                    hide();
                    $(this).prop('checked', false);
                }
            });
        };

        $('.header__nav-dropdown').mouseenter(checkboxHandler);
        $('.js-dropdown').mouseleave(function () {
            hide();
        });
    })();


    $('.comment-respond').hide();
    $('.comment-respond[data-commentid=' + getAllUrlParams().replytocom + ']').toggleClass('content_active');

    $('.js-order-button').on('click', function () {
        $('.slide__brand').hide();
        $('.sections').css({
            'transform': 'translateY(0)'
        });
    });
    $('.js-order-menu').on('click', function () {
        $('.slide__brand').show();
    });
    $('.js-order-menu').modal($('.js-order-button'));

    $('.js-order-feedback').modal($('.js--open-modal-feedback-add'));

    $('.shop_sort').modal($('.js--rt'));


    function getAllUrlParams(url) {

        var queryString = url ? url.split('?')[1] : window.location.search.slice(1);

        var obj = {};

        if (queryString) {

            queryString = queryString.split('#')[0];

            var arr = queryString.split('&');

            for (var i = 0; i < arr.length; i++) {

                var a = arr[i].split('=');

                var paramNum = undefined;

                var paramName = a[0].replace(/\[\d*\]/, function (v) {

                    paramNum = v.slice(1, -1);

                    return '';

                });

                var paramValue = typeof (a[1]) === 'undefined' ? true : a[1];

                paramName = paramName.toLowerCase();

                paramValue = paramValue.toLowerCase();

                if (obj[paramName]) {

                    if (typeof obj[paramName] === 'string') {

                        obj[paramName] = [obj[paramName]];

                    }

                    if (typeof paramNum === 'undefined') {

                        obj[paramName].push(paramValue);

                    } else {

                        obj[paramName][paramNum] = paramValue;

                    }

                } else {

                    obj[paramName] = paramValue;

                }

            }

        }

        return obj;

    }

});
