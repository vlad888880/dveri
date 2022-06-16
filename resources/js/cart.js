// $(document).ready(()=>{


//     (()=>{
//         const $section = $('.cart-section');
//         const $itemWrapper = $section.find('.cart-section__content-items');
//         const $price = $section.find('.js-control-price');

//         $('.js-cart-order-menu').modal($('.js-cart-order'))
//             .find('form').on('submit', (e)=>{
//                 e.preventDefault();

//                 const form = e.target;

//                 const close = () => {
//                     $(form).siblings('.side-menu__cross').click();
//                 };


//                 const $name = $(form.name);
//                 const $telephone = $(form.phone);

//                 const name = form.name.value;
//                 const phone = form.phone.value.replace(/\D/g, '');

//                 let error = false;


//                 if (name.trim().length === 0) {
//                     error = true;
//                     $name.addClass('invalid');
//                 } else {
//                     $name.removeClass('invalid');
//                 }


//                 if (phone.length === 11) {
//                     $telephone.removeClass('invalid');
//                 } else {
//                     $telephone.addClass('invalid');
//                     error = true;
//                 }

//                 if (error) return;

//                 const data = {name, phone, products: Cart.get().map(el=>{el.product_id = el.id; delete el.id; return el;})};

//                 $.post('/wp-json/v1/checkout/orders', JSON.stringify(data))
//                     .done((res) => {
//                         close();
//                         answerModal(res.status);
//                         if (res.status) {
//                             $description.removeClass('hidden');
//                             $('.cart-section__control-wrapper').hide();
//                             $('.cart-section__cart-item').remove();
//                             Cart.clear();
//                         }
//                     })
//                     .fail(()=>{
//                         close();
//                         answerModal(false);
//                     });

//         });

//         const $templateItem = $(`            
//                 <div class="cart-section__cart-item cart-item">
//                     <a class="cart-item__link js-link" href="">
//                         <img class="cart-item__photo js-photo"
//                                 src="../media/images/recomended-item.png"
//                         >
//                     </a>
//                     <div class="cart-item__name-wrapper">
//                         <div class="title3 cart-item__subtitle js-name">Portalle Toscana</div>
//                         <div class="paragraph cart-item__article js-article">Артикул: 0728 ДКЧ.Б</div>
//                         <div class="cart-item__properties js-properties">
//                             <div class="paragraph cart-item__property js-property"></div>
//                         </div>
//                     </div>
//                     <div class="cart-item__number">
//                         <div class="title3 cart-item__subtitle">Количество:</div>
//                         <div class="paragraph">
//                             <div class="number-input js-quantity  cart-item__number-input"></div>
//                         </div>
//                     </div>
//                     <div class="cart-item__sum">
//                         <div class="title3 cart-item__subtitle">Сумма:</div>
//                         <div class="paragraph cart-item__sum-content js-sum" >от 45 699 Р</div>
//                     </div>
//                     <div class="cart-item__remove js-remove paragraph">
//                         Удалить из корзины
//                     </div>
    
//                 </div>
//             `);
//         const item = (data, cartItem, callback) => {
//             const article = data.sku;
//             const id = cartItem.id;
//             const quantity = cartItem.quantity;
//             const name = data.name;
//             const link = data.link;
//             const attributes = data.attributes;
//             const price = data.price;
//             const photo = data.thumbnail;

//             const $item = $templateItem.clone();

//             const onQuantityChange = (quantity) => {
//                 Cart.update(data.id, quantity);
//                 $item.data('sum', price * quantity);
//                 callback($item, false);
//             };

//             const onCrossClick = () => {
//                 Cart.remove(id);
//                 callback($item, true);
//             };

//             $item.find('.number-input').numberInput(onQuantityChange, quantity);
//             $item.find('.js-article').text(`Артикул: ${article}`);
//             $item.find('.js-photo').text(`Артикул: ${article}`);
//             $item.find('.js-name').text(name);

//             const $propertyTemplate =  $item.find('.js-property').detach();
//             const $propertyWrapper = $item.find('.js-properties');

//             (()=>{
//                 const parse = function (object) {
//                     const key = Object.keys(object)[0];
//                     return {key, value: object[key]};
//                 };
//                 attributes.forEach((el)=>{
//                     const parsedEl = parse(el);
//                     $propertyTemplate.clone().appendTo($propertyWrapper).text(`${parsedEl.key}: ${parsedEl.key}`);
//                 });
//             })();


//             $item.find('.js-photo').attr('src', photo);
//             $item.find('.js-link').attr('href', link).attr('target', '_blank');
//             $item.find('.js-remove').click(onCrossClick);


//             $item.attr('data-sum', price * quantity);



//             return $item;

//         };

//         const items = Cart.get();
//         const $description = $('.cart-section__description')
//         if (items.length > 0) {
//             let $items;
//             $description.addClass('hidden');

//             const query = items.reduce((str, el, i)=> `${str}${i ?  '&' : '?'}products_id[]=${el.id}`, '');



//             const quantityChange = ($item, isDel) => {
//                 let _$items;
//                 if (isDel) {
//                     _$items = $items.filter(el => !el.is($item));
//                     $item.remove();
//                 } else {
//                     _$items = $items;
//                 }
//                 if (_$items.length > 0) {
//                     const sum = _$items.reduce((sum, $el)=>{
//                         return $el.data('sum');
//                     }, 0);
//                     $price.text(sum);
//                 } else {
//                     $description.removeClass('hidden');
//                     $('.cart-section__control-wrapper').hide();
//                 }

//             };


//             const fetchDataHandle = (data) => {
//                 let sum = 0;
//                 $items = data.map((el) => item(el, Cart.get(el.id), quantityChange));

//                 $items.forEach($el=>{
//                     sum += +$el.appendTo($itemWrapper).data('sum');
//                     console.log(sum)

//                 });
//                 $price.text(sum);
//             };


//             $.get('/wp-json/v1/carts' + query)
//                 .done(fetchDataHandle);
//
//         } else {
//             $('.cart-section__control-wrapper').hide();
//         }



//     })();

// });
