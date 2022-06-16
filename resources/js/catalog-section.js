$(document).ready(()=>{

    $('.js-filters').modal($(`.js-filters-button`));


    (()=>{
        const perPage = () => window.innerWidth > 1024 ? 8 : 6;
        const offset = () => $('.product-card').length;
        const initQuery = {
            min_price: false,
            max_price: false,
            category: false,
            attribute_term: [false, false],
            per_page: perPage,
            offset: offset
        };







        const Query = (()=>{
            let query = {...initQuery};

            const eventTarget = new EventTarget();

            const _setQuery = (obj) => {
                query = obj;
                eventTarget.dispatchEvent(new Event('changed'));
            };

            const addEventListener = callback => {
                eventTarget.addEventListener('changed', ()=>callback(query));
            };

            const set = (callback) => {
                if (typeof callback === 'function') {
                    const _query = callback(query);
                    _setQuery(_query);
                }
                else query = callback;
            };

            const get = () => query;

            const getQuery = () => Object.keys(query).reduce((arr, key, i)=>{
                let el = query[key];
                if (el === false)
                    return arr;
                if (typeof el === 'function')
                    el = el();
                if (Array.isArray(el)) {
                    el = el.reduce((str, el) => {
                        if (el === false || el.value === false)
                            return str;
                        let _el = `attribute_term=${el.value}&attribute=${el.name}`;
                        if (str !== '')
                            _el = '&' + _el;
                        return str + _el;
                    }, '');
                    if (el === '')
                        return arr;
                } else {
                    el = `${key}=${el}`;
                }
                return `${arr}${arr === '' ? '?' : '&'}${el}`;
            }, '');



            return {
                getQuery, set, get, addEventListener,
            }

        })();


        (()=>{
            const $categorySelectors = $('.tab-selector');
            $categorySelectors.click(function () {
                const $this = $(this);
                const id = $this.data('id');
                const isSelected = $this.hasClass('selected');
                $categorySelectors.removeClass('selected');
                if (!isSelected) {
                    $categorySelectors.filter(`[data-id="${id}"]`).addClass('selected');
                    Query.set((query)=>({...query, category: id, offset: 0}));
                } else  {
                    Query.set((query)=>({...query, category: false, offset: 0}));
                }
                if ($this.hasClass('js-desktop'))
                    fetchProducts(Items.setItems);
            });
        })();




        const $dProducerSelect = $('select.js-d-producer');
        const $dPriceSelect = $('select.js-d-price');
        const $dStyleSelect = $('select.js-d-style');
        const $mProducerSelect = $('.js-m-producer');
        const $mPriceSelect = $('.js-m-price');
        const $mStyleSelect = $('.js-m-style');
        const $filtersReset = $('.js-filters-reset');
        const $filtersApply = $('.js-filters-apply');
        const $loader = $('<div class="loader"></div>');


        (()=>{
            const query = Query.get();
            if (Object.keys(initQuery).reduce((isEqual, key) => isEqual && (initQuery[key] === query[key]), true)) {
                $filtersReset.hide();
                $filtersApply.show();
            } else {
                $filtersReset.show();
                $filtersApply.hide();
            }
            $filtersReset.click(()=>{
                Query.set(initQuery);
                $filtersApply.show();
                $filtersReset.hide()
            })
            $filtersApply.click(()=>{
                $filtersApply.hide();
                $filtersReset.show()
                fetchProducts(Items.setItems);
            })
        })();

        const $templateItem = $(`<div class="product-card catalog-section__product-card">
                    <a href="" class="product-card__link">
                        <img
                                src=""
                                alt=""
                                class="product-card__image"
                        >
                        <div class="product-card__text">
                            <h2 class="product-card__name title4">
                               
                            </h2>
                            <h3 class="button-text product-card__price">
                                
                            </h3>
                        </div>
                        <div class="product-card__sale-label">
                        </div>
                    </a>
                </div>`);

        const $grid = $('.catalog-section__grid');
        const $gridWrapper = $grid.parent();


        const selector =  (()=>{

            const getValue = ($this) => {
                let value = $this.val();
                const maxValue = $this.data('max');
                if (value < 0)
                    value = false;

                if (maxValue)
                    value = [value, maxValue];


                return value;
            };

            return (mobileSelector, desktopSelector, callback) => {

                const mobileLi = mobileSelector.find('li');

                desktopSelector.on('change', function () {
                    const value = getValue($(this));
                    const _value = Array.isArray(value) ? value[0] : value;
                    mobileLi.removeClass('selected');
                    if (value !== false)
                        mobileLi.filter(`[value="${_value}"]`).addClass('selected');
                    callback(value);
                    fetchProducts(Items.setItems);
                });

                mobileLi.click(function () {
                    const $this = $(this);
                    const isSelected = $this.hasClass('selected');
                    const value = getValue($this);


                    if (isSelected) {
                        $this.removeClass('selected');
                        callback(false);
                    } else {
                        mobileLi.removeClass('selected');
                        $this.addClass('selected');

                        callback(value);
                    }
                });
            };
        })();


        (()=>{
            selector($mProducerSelect, $dProducerSelect, value => {
                let obj = value
                if (value === -1)
                    obj = false;
                else
                    obj = {name: 'pa_manufacturer', value: obj};
                Query.set(query=>({...query, attribute_term: [obj, query.attribute_term[1]], offset: 0}));
            });
            selector($mStyleSelect, $dStyleSelect, value => {
                let obj = value
                if (value === -1)
                    obj = false;
                else
                    obj = {name: 'pa_style', value: obj};
                Query.set(query=>({...query, attribute_term: [query.attribute_term[0], obj], offset: 0}));
            });
            selector($mPriceSelect, $dPriceSelect, value => {
                const max_price = value[1];
                const min_price = value[0];
                if (min_price < 0)
                    Query.set((query)=>({...query, max_price, min_price, offset: 0}));
                else
                    Query.set((query)=>({...query, max_price: false, min_price: false, offset: 0}));
            });
        })();







        const Items = (()=>{
            const Item = (item) => {
                const $item = $templateItem.clone();
                const $img = $item.find('.product-card__image');
                const $link = $item.find('.product-card__link');
                const $name = $item.find('.product-card__name');
                const $price = $item.find('.js-price');
                const $sale = $item.find('.product-card__sale-label');


                const link = item.permalink;
                const name = item.name;
                const price = item.price;
                const sale = item.on_sale;
                const image = item.images[0].src;


                $img.attr('src', image);
                $link.attr('href', link);
                $price.text(price);
                if (!price)
                    $price.parent().remove();
                if (!sale)
                    $sale.remove();
                $name.text(name);

                return $item;
            };
            const fetchMore = () => {
                fetchProducts(Items.addItems)
            };


            const addItems = (items) => {
                const $items = items.map(item => Item(item).appendTo($grid));
                $items[$items.length-1].one('inview', fetchMore);
                return $items;
            };
            const setItems = (items) => {
              $grid.children().remove();
              Query.set(query => ({...query, offset}));
              addItems(items);
            };

            return {setItems, addItems, fetchMore};
        })();

        (()=>{
            $('.product-card').last().one('view', Items.fetchMore);
        })();


        const fetchProducts = (() => {
            let xhr;
            return ((callback)=>{
                $loader.appendTo($gridWrapper);
                if (xhr) xhr.abort();
                xhr = $.get('/wp-json/wc/v3/products'+Query.getQuery())
                    .done((res) => {
                        $loader.detach();
                        if (res.status)
                            answerModal(res.status);
                        else
                            (typeof callback === 'function') && callback(res);
                    })


            });
        })();

    })();




});


