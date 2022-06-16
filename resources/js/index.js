const $document = $(document);
$.ajaxSetup({dataType: 'json', contentType: 'application/json'});

// $.ajax({
// 	url: '{{ url(morePosts) }}',         /* Куда пойдет запрос */
// 	method: 'get',             /* Метод передачи (post или get) */
// 	dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
// 	// data: {text: 'Текст'},     /* Параметры передаваемые в запросе. */
// 	success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
// 		console.log(data);            /* В переменной data содержится ответ от index.php. */
// 	}
// });
     
    
       

$document.ready(()=>{
    


    $('input[type="tel"]').mask('+7 999 999 9999');

    $('.flash').fadeOut(500, ()=>{
        $('section').eq(0).mouseenter();
    });

    $('.js-add-to-cart').on('click', function() {
        if(!$('.header__cart-button').hasClass('cart-button--full')){
            $('.header__cart-button').removeClass('cart-button');
            $('.header__cart-button').toggleClass('cart-button--full');
        }
    });

    $('.section-project__single-project-slider-main').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.section-project__single-project-slider-pre'
    });
    $('.section-project__single-project-slider-pre').slick({
        slidesToShow: 7,
        slidesToScroll: 1,
        dots: false, 
        arrows: false,
        autoplay: true,
        focusOnSelect: true,
        asNavFor: '.section-project__single-project-slider-main'
    });
    // $.cookie('door', '5', { expires: 1 });
    // console.log($.cookie('door'));

    // $('.js-order-menu').on('submit', (e)=>{
    //     e.preventDefault();

    //     const form = e.target;

    //     const close = () => {
    //         $(form).siblings('.side-menu__cross').click();
    //     };

    //     const $name = $(form.name);
    //     const $telephone = $(form.phone);

    //     const name = form.name.value;
    //     const phone = form.phone.value.replace(/\D/g, '');

    //     let error = false;


    //     if (name.trim().length === 0) {
    //         error = true;
    //         $name.addClass('invalid');
    //     } else {
    //         $name.removeClass('invalid');
    //     }


    //     if (phone.length === 11) {
    //         $telephone.removeClass('invalid');
    //     } else {
    //         $telephone.addClass('invalid');
    //         error = true;
    //     }

    //     if (error) return;

    //     const data = {name, phone};

    //     $.ajax('/application', {
    //         type: 'POST',
    //         data: JSON.stringify(data),
    //     })
    //         .done((res) => {
    //             close();
    //             answerModal(res.status);
    //         })
    //         .fail(()=>{
    //             close();
    //             answerModal(false);
    //         });

    // });

    window.answerModal = (function () {
        const $approve = $('#approve');
        const $approveBtn = $approve.find('button, .side-menu__cross');
        const $denied = $('#denied');
        const $deniedBtn = $denied.find('button, .side-menu__cross')
        $approveBtn.click(()=>{
            $approve.closeModal();
            $('html, body').removeClass('no-scroll');
        })
        $deniedBtn.click(()=>{
            $denied.closeModal();
            $('html, body').removeClass('no-scroll');
        })

        return function  (isApprove) {
            $('html, body').addClass('no-scroll');
            if (isApprove)
                $approve.openModal();
            else
                $denied.openModal();

        }
    })();

});



$.fn.tabs = function ($tabs) {
    let prev = 0, current = 0;
    $tabs.css({position: 'absolute', top: 0}).not(':eq(0)').hide(0);
    const $tabParent = $tabs.parent().css('height', $tabs.eq(0).show(0).outerHeight());
    $(window).on('resize', ()=> $tabParent.css('height', $tabs.eq(current).outerHeight()));
    $tabs.find('img').one('load', ()=> $tabParent.css('height', $tabs.eq(current).outerHeight())).each(function () {
        if (this.complete)
            $(this).trigger('load');
    });
    $(this).each((i, el)=>{
        const $tabSelector = $(el);
        $tabSelector.on('click', ()=>{
            prev = current;
            current = i;
            if (current === prev) return;
            $(this).removeClass('selected');
            $tabSelector.addClass('selected');
            const $prev = $tabs.eq(prev);
            const $current = $tabs.eq(current);


            const from = $prev.animate({opacity: 0}, {duration: 200}).hide(0).outerHeight();
            const to = $current.css('opacity', 0).show(0).animate({opacity: 1}, {duration: 200}).outerHeight();

            $tabParent.css('height', from).animate({height: to}, {duration: 200});
        })
    })
};


$.fn.numberInput = function (callback, quantity = 1) {
  const $this = $(this);
  let current = quantity;
    const handleClick = (number) => {
      if (current + number < 1)
          return;
      current += number;
      $number.text(current);
      callback(current);
    };
  $this.html('');
  $('<div>', {class: 'btn-minus', on: {click: ()=>handleClick(-1)}}).prependTo($this);
  const $number = $('<div>', {text: current}).appendTo($this);
  $('<div>', {class: 'btn-plus', on: {click: ()=>handleClick(1)}}).appendTo($this);
};



$.fn.pagination = function (pages) {
    const $this = $(this);
    const $pages = $(pages);
    let page = 1;
    const numberOfPages = $pages.length;
    const clickHandler = (number) => {
      if (page + number < 1 || page + number > numberOfPages)
          return;
      page += number;
      $this.children().eq(0).text(page);
      $pages.removeClass('selected');
      $pages.eq(page - 1).addClass('selected');


    };

    if (numberOfPages === 1)
        $this.hide();
    $this.children().eq(1).text(numberOfPages).on('click', ()=>clickHandler(1));
    $this.children().eq(0).text(page).on('click', ()=>clickHandler(-1));
};



$.fn.openModal = function () {
    return $(this)
        .show(0)
        .css({opacity: 0,})
        .animate({opacity: 1}, {duration: 250})
        .children()
        .css('transform', 'translateX(-100%)')
        .animate({display: 'block'},
            {
                duration: 250,
                progress: function (_, progress){
                    $(this).css('transform', `translateX(-${100*(1-progress)}%)`);
                }
            });
}

$.fn.closeModal = function () {
    return $(this)
        .css('opacity', 1)
        .animate({opacity: 0}, {duration: 250, complete: ()=> $(this).hide(0)})
        .children()
        .css('transform', 'translateX(-100%)')
        .animate({display: 'block'},
            {
                duration: 250,
                progress: function (_, progress){
                    $(this).css('transform', `translateX(-${100*(progress)}%)`);
                }
            });

}

$.fn.modal = function ($triggerSelector) {
    let isOpen = false;
    const $modal = $(this).hide(0);
    const $dom = $('html, body');
    const $closeObj = $modal
        .find('.side-menu, .side-menu__cross, .btn_look')
        .add($triggerSelector);

    let wasNoScroll = false;


    $closeObj.on('click', (e)=>{

        if (e.target !== e.currentTarget) return;
        isOpen =! isOpen;
        if (isOpen) {
            wasNoScroll = $dom.hasClass('no-scroll');

            if (!wasNoScroll)
                $dom.addClass('no-scroll');
            $modal.openModal();
        } else {

            if (!wasNoScroll)
                $dom.removeClass('no-scroll');
            $modal.closeModal();

        }
    });

    return $modal;

};



$.fn.view = function () {

    const $this = $(this);
    const $window = $(window);
    let $modal;


    const $img = (function(){
        let zoom = 1;
        let endPosition;
        let startPosition;
        let isDrag = false;
        let position = {x: 0, y: 0};

        function mousedown(event) {
            event.preventDefault();
            isDrag = true;
            startPosition = {x: event.screenX, y: event.screenY};
        }
        function dblclick(event) {
            if (zoom === 2) {
                zoom = 1;
                position = {x: 0, y: 0};
            }
            else
                zoom += 0.5;

            $(this).css('transform', `translate(${position.x}px, ${position.y}px) scale(${zoom})`)
        }
        function mousemove(event) {
            if (isDrag && zoom !== 1) {
                let delta = {x: (event.screenX - startPosition.x)*0.5, y: (event.screenY - startPosition.y)*0.5};
                $img.css('transform', `translate(${position.x + delta.x}px, ${position.y + delta.y}px) scale(${zoom})`);
            }
        }
        function mouseup(event) {
            if (zoom !== 1 && isDrag) {
                endPosition = {x: event.screenX, y: event.screenY};
                let delta = {x: (endPosition.x - startPosition.x)*0.5, y: (endPosition.y - startPosition.y)*0.5};
                position = {x: position.x + delta.x, y: position.y + delta.y};
                $img.css('transform', `translate(${position.x}px, ${position.y}px) scale(${zoom})`);
            }
            isDrag = false;
        }


        $window.on('mousemove', mousemove);
        $window.on('mouseup', mouseup);


        return  $('<div>', {
            class: 'modal-img',
            style: `background-image: url("${$this.attr('href')}")`,
            on: {mousedown, dblclick}
        });
    })();


    function close (event, isOnly = false)  {
        if (isOnly || event.currentTarget === event.target) {
            $modal.animate(
                {opacity: 0},
                {duration: 200, complete: ()=>{
                    $modal.remove();
                }});
            $('html, body').removeClass('no-scroll');
        }
    }



    function open (e) {
        e.preventDefault();
        $('html, body').addClass('no-scroll');
        $modal = $('<div>', {class: 'modal', on: {mousedown: close}});
        const $content = $('<div>', {class: 'modal-content'}).append($img);
        const $cross = $('<div>', {class: 'modal-cross-round-wrapper', on: {click: (e)=>close(e, true)}}).append($('<div>', {class: 'modal-cross-round'}));


        $modal
            .append($content, $cross)
            .appendTo($(document.body)).css('opacity', 0)
            .animate({opacity: 1}, {duration: 200});

    }

    $this.click(open);
};

$.fn.doorSelector = function (params = ['id'], callback) {
    const $materialSelectors = $(this);

    $materialSelectors.click(function () {
        $materialSelectors.removeClass('selected');
        const $this = $(this);
        let _params = params.reduce((params, el)=>({...params, [el]: $this.data(el)}), {});
        $materialSelectors.filter(`[data-id="${_params.id || $this.data('id')}"]`).addClass('selected');
        callback(_params);
    });

    return $materialSelectors;
}

$.fn.doorPagination = function (desktop, table, mobile) {
    const $this = $(this);
    const $pageSelector = $this.find('.page-selector');
    const $next = $pageSelector.children().last();
    const $prev = $pageSelector.children().first();
    const $count = $pageSelector.find('.page-selector__count');
    const $number = $pageSelector.find('.page-selector__number');
    const $content = $this.find('.js-content');
    let $items = $content.children().filter(":visible");
    let count = $items.length;

    let pages = 0;
    let page = 0;
    let itemsPerPage = 0;


    function onChange() {
        $items = $content.children().filter(":visible");
        count = $items.length;
    }

    function setPage(index, pageNum) {
        return function () {
            page += index ;
            if (!!pageNum)
                page = pageNum;

            if (page >= pages)
                page = 0;
            if (page < 0)
                page = pages - 1;

            $number
                .text(page+1);



            $content.css('transform', `translateX(-${$items.outerWidth()*(itemsPerPage*page) + $items.css('margin-left').slice(0, - 2)*(itemsPerPage*page)}px)`);

        }
    }

    function onResize() {
        if (window.innerWidth > 1024) {
            itemsPerPage = desktop;
        } else if (window.innerWidth > 768) {
            itemsPerPage = table;
        } else {
            itemsPerPage = mobile;
        }


        pages = Math.ceil(count / itemsPerPage);



        $count
            .text(pages.length > 1 ? pages : '0'+pages);

        $number
            .text((page + 1).length > 1 ? (page + 1) : '0'+(page + 1));


        if (pages <= 1)
            $pageSelector.hide();
        else
            $pageSelector.removeAttr('style');



        if (itemsPerPage === 0)
            $pageSelector.hide();



        setPage(0, 0);


    }


    $this.on('change', onChange);

    $(window).on('resize', onResize);

    onResize();


    $next.click(setPage(1));

    $prev.click(setPage(-1));

}


Cart = (function (){
    function _getCart() {
        const cart = JSON.parse(localStorage.getItem('cart'));
        if (Array.isArray(cart))
            return cart;
        else
            return [];
    }

    function _saveCart() {
        const stringifiedCart = JSON.stringify(cart);
        localStorage.setItem('cart', stringifiedCart);
    }

    function get(id) {
        if (!id)
            return cart;
        else
            return cart.find(el => el.id === id);
    }

    function add(item) {
        if (item.hasOwnProperty('id') && item.hasOwnProperty('quantity'))  {
            const indexOf = cart.indexOf(el => el.id === item.id);
            if (indexOf >= 0)
                cart[indexOf].quantity += item.quantity;
            else
                cart.push(item);
            _saveCart();
            return true;
        } else {
            return false;
        }

    }

    function update(id, quantity) {
        const indexOf = cart.findIndex(el => el.id === id);
        if (indexOf >= 0) {
            cart[indexOf].quantity = quantity;
            _saveCart();
            return true;
        } else {
            return  false;
        }

    }

    function remove(id) {
        cart = cart.filter(el => el.id !== id);
        _saveCart();
    }

    function clear() {
        cart = [];
        _saveCart();
    }


    let cart = _getCart();

    return {
        get, remove, clear, add, update
    };
})();

