categoryCarouselSection = (()=> {
    $(document).ready(()=>{
        $('.category-carousel-section').each(function () {
            $(this).one('inview', ()=>{
                categoryCarouselSectionFn($(this));

            });
        });
    });

    const categoryCarouselSectionFn = (()=>{
        $('.category-carousel-section').css({'opacity': 0});

        return ($section) => {
            if (+$section.css('opacity') === 1)
                return;
            $section.css('opacity', 1);

            const $description = $section.find('.category-carousel-section__description');
            const $descriptionWrapper = $description.parent();
            const $link  = $section.find('.category-carousel-section__link');
            const $title = $section.find('.category-carousel-section__title');
            const $buttonWrapper = $section.find('.category-carousel-section__button-wrapper');
            const $images = $section.find('.category-carousel-section__image>img');
            const $imagesWrapper = $section.find('.category-carousel-section__image');
            const $buttons = $buttonWrapper.children();

            let step = 0;
            const max = $description.length;

            const changeImage = (direction = 0) => {
                const prev = step;
                step +=  direction;
                if (step >= max)
                    step = 0;
                else if (step < 0)
                    step = max - 1;


                const $images =  $section.find('.category-carousel-section__image>img');

                animateDescription(step, prev, false, (callback)=>{
                    const _callback = ()=>{
                        initButtonHandler();
                        callback();
                    };
                    if (direction > 0) {
                        setImage($images, _callback, true, true);
                    } else if (direction < 0) {
                        setImage($images, _callback, true, false);
                    }
                });


            };

            const clickHandle = (direction) => () => {
                changeImage(direction);
                $buttons.off('click');
            };

            const leftAnimations = [
                {from: {left: '0', opacity: 1}, to: {left: '-100%', opacity: 0.5}},
                {from: {left: '120%', opacity: 0.5}, to: {left: '0', opacity: 1}},
                {from: {left: '207%',  opacity: 0.5}, to: {left: '107%', opacity: 0.5}},
            ];

            const rightAnimations = [
                {from: {left: '0', opacity: 1}, to: {left: '107%', opacity: 0.5}},
                {from: {left: '107%', opacity: 0.5}, to: {left: '207%', opacity: 0.5}},
                {from: {left: '-120%', opacity: 0.5}, to: {left: '0%', opacity: 1}},
            ];


            const setImage = ($images, callback, isNotInit = false, isLeft = true) => {
                $images.slice(2).hide();
                $images.slice(0).css('opacity', '0.5');
                $images.stop();
                if (isNotInit) {
                    if (isLeft) {
                        $images.eq(0).removeAttr('style').css(leftAnimations[0].from).animate(leftAnimations[0].to, {duration: 'slow', complete: ()=>{
                                $images.eq(0).detach().appendTo($imagesWrapper).hide();
                                callback && callback();
                            }});
                        $images.slice(0).css('opacity', '0.5');
                        $images.eq(1).removeAttr('style').css(leftAnimations[1].from).animate(leftAnimations[1].to, {duration: 'slow'});
                        $images.eq(2).removeAttr('style').css(leftAnimations[2].from).animate(leftAnimations[2].to, {duration: 'slow'});
                    } else {
                        $images.eq(0).removeAttr('style').css(rightAnimations[0].from).animate(rightAnimations[0].to, {duration: 'slow', complete: ()=>{
                                $images.last().detach().prependTo($imagesWrapper);
                                callback && callback();
                            }});
                        $images.eq(1).removeAttr('style').css(rightAnimations[1].from).animate(rightAnimations[1].to, {duration: 'slow'});
                        $images.last().removeAttr('style').css(rightAnimations[2].from).animate(rightAnimations[2].to, {duration: 'slow'});
                    }
                } else {
                    $images.eq(0).css(leftAnimations[1].from).animate(leftAnimations[1].to, {duration: 'slow', complete: ()=>{
                            callback && callback();
                        }});
                    $images.eq(1).css(leftAnimations[2].from).animate(leftAnimations[2].to, {duration: 'slow'});
                }

            };

            const animateDescription = (step, prev, isLeft = true, callback = ()=>{}) => {
                const width = (that) => $(that).outerWidth();
                $description.eq(prev).css('clip', `rect(0, auto, auto, 0)`).animate({width: '100%'}, {duration: 250,
                    progress: function (_, progress){
                    $(this).css('clip', `rect(0, auto, auto, ${width(this)*(progress)}px)`);
                    },
                    complete: function () {
                    $(this).css('opacity', 0);
                    callback(()=>{
                        $description.eq(step).css({clip: `rect(0, auto, auto, 0)`, opacity: 1}).animate({width: '100%'}, {duration: 250,
                            progress: function (_, progress){
                            $(this).css('clip', `rect(0, auto, auto,  ${width(this)*(1-progress)}px)`);
                            },
                        });
                    });
                }
                });
            };

            const initButtonHandler = ()=> {
                $buttons.first().on('click', clickHandle(-1));
                $buttons.last().on('click', clickHandle(1));
            };

            const init = () => {
                const width = $description.outerWidth();
                $link.css('opacity',0);
                $description.eq(0).css({opacity: 1,clip: `rect(0, auto, auto, ${width}px)`});
                $title.css('opacity',0);
                setImage($images, ()=>{
                    $title.clone()
                        .removeAttr('style')
                        .prependTo($title.parent())
                        .css({'clip': 'rect(0, auto, 1.2em, 0)', position:'absolute', width: '100%'})
                        .children().css({position: 'absolute', top: '1.2em'})
                        .animate({top: 0},{duration: 'slow', complete: function(){
                                $title.removeAttr('style');
                                $(this).parent().remove();
                                $description.eq(0).animate({'width': '100%'},{duration: 'slow',
                                    progress: function (animation, progress){
                                        $(this).css('clip', `rect(0, auto, auto, ${width*(1-progress)}px)`);
                                    },
                                    complete: ()=>{
                                        initButtonHandler();
                                    }
                                });
                                $link.removeAttr('style');
                            }});
                });
                $buttonWrapper.css('opacity', 0).animate({opacity: 1}, {duration: 'slow'});






            };
            init();
        };
    })()
})();
