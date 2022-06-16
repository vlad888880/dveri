stocksSection = (()=> {
    $(document).ready(()=>{
        $('.stock-section').one('inview', function () {
            stocksSectionFn($(this));

        })
    });

    const stocksSectionFn = (()=>{
        $('.stock-section').css({'opacity': 0});

        return ($section) => {
            $section.css('opacity', 1);

            const $title = $section.find('.title1');
            const $images = $section.find('img');
            const $imgDescriptions = $section.find('.stock-section_thumb');

            const height = (that) => $(that).outerHeight();
            const width = (that) => $(that).outerWidth();



            const animateDescription = ($description, callback = () => {}) => {
                $description.clone().appendTo($description.parent()).css({clip: `rect(0, auto, auto, 0)`, opacity: 1, position: 'absolute'}).animate({width: '100%'}, {duration: 250,
                    progress: function (_, progress){
                        $(this).css('clip', `rect(0, auto, auto,  ${width(this)*(1-progress)}px)`);
                    },
                    complete: function () {
                        $(this).remove();
                        $description.css('opacity', 1);
                        callback();
                    }
                });
            };
            const animateImage = ($image, $description, callback = () => {}) => {
                $image.clone().appendTo($image.parent()).css({clip: `rect(0, auto, auto, 0)`, opacity: 1, position: 'absolute'}).animate({width: '100%'}, {duration: 250,
                    progress: function (_, progress){
                        $(this).css('clip', `rect(0, auto, auto, ${width(this)*(1-progress)}px)`);
                    },
                    complete: function () {
                        $(this).remove();
                        $image.css('opacity', 1);
                        setTimeout(callback, 10);
                        animateDescription($description);
                    }
                });

            };

            const animateImages = () => {
                const $descriptions = $imgDescriptions.toArray().reverse();
                $images.toArray().reverse().reduce((callback, el, i)=>{
                    return () => animateImage($(el), $($descriptions[i]), callback);
                }, ()=>{})();
            };

            const init = () => {
                $images.css('opacity', 0);
                $imgDescriptions.css('opacity', 0);
                $title.css('opacity', 0).css({
                    opacity: 1,
                    position: 'absolute',
                    clip: `rect(${height($title)}px, auto, auto, 0)`
                }).animate({opacity: 1}, {
                    duration: 250,
                    progress: function (_, progress) {
                        $(this).css('clip', `rect(${height($title)*(1-progress)}px, auto, auto, 0)`)
                    },
                    complete: function () {
                        $(this).css('position', 'relative');
                        animateImages();

                    }
                })
            };
            init();


            const $stocks =  $('.stock-section').find('.stock-section__image, .stock-section__thumb');
            const $modal = $('.js-stock-modal');
            $modal.modal($stocks);
            const $modalTitle = $('.js-stock-title');
            const $modalText = $('.js-stock-description');

            $stocks.click(function () {
                const id = $(this).data('id');
                const $description = $('.stock-section').find(`.stock-section__description[data-id="${id}"]`);
                const $title = $description.find('.stock-section__description-title');
                const $text = $description.find('.paragraph');
                $modalTitle.text($title.text());
                $modalText.text($text.text());

            });
        };
    })()
})();
