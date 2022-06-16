ourDoorsSection = (()=> {
    $(document).ready(()=>{
        $('.our-doors-section').each(function () {
            const $this = $(this);
            $this.one('inview', ()=> {
                ourDoorSectionFn($this);
            })
        })
    });

    const ourDoorSectionFn = (()=>{
        $('.our-doors-section').css({'opacity': 0});

        return ($section) => {
            if (+$section.css('opacity') === 1)
                return;
            $section.css('opacity', 1);
			
			const $link = $section.find('.our-doors-section__images>span');
			const $desript = $section.find('.our-doors-section__images>h3');
			const $coll = $section.find('.our-doors-section__images>h1');
            const $images = $section.find('.our-doors-section__images>img');
            const $descriptionWrapper = $section.find('.our-doors-section__descriptions');
            const $descriptions = $section.find('.our-doors-section__description');
            const $mainImageWrapper = $section.find('.our-doors-section__image');
            const $sectionText = $section.find('.our-doors-section__text');
            const $buttonsWrapper = $section.find('.our-doors-section__buttons-wrapper');
            const $imagesWrapper = $section.find('.our-doors-section__images');

            const $next = $section.find('.js-next');
            const $prev = $section.find('.js-prev');

            let current = 0;
            let prev = 0;
            const max = $images.length;
				$('.js--shop-magazin').attr('href', $link[current].innerText);
				$('.js--paragraph').text($desript[current].innerText);
 				$('.our-doors-section__title').text($coll[current].innerText);
            const animations = [
                {from: {left: 0, opacity: 1}, to: {opacity: 0}},
                {from: {left: '55.38%'}, to: {left: 0}},
                {from: {opacity: 0.5, left: '120%'}, to: {left: '55.38%', opacity: 1}},
                {from: {opacity: 0.5, left: '180%'}, to: {left: '120%'}},
            ];
            const animationsSM = [
                {from: {left: 0, opacity: 1}, to: {opacity: 0}},
                {from: {left: '49.58%'}, to: {left: 0}},
                {from: {opacity: 0.5, left: '140%'}, to: {left: '49.58%', opacity: 1}},
                {from: {opacity: 0.5, left: '200%'}, to: {left: '120%'}},
            ];
            const changeImage = (dir = 1) => {
                prev = current;
                if (current + dir >= max )
                    current = 0;
                else if (current + dir < 0)
                    current = max - 1;
                else
                    current += dir;
				$('.js--shop-magazin').attr('href', $link[current].innerText);
				$('.js--paragraph').text($desript[current].innerText);
 				$('.our-doors-section__title').text($coll[current].innerText);
                const $images = $section.find('.our-doors-section__images>img');
                setMainImage(dir > 0 ? $images.eq(0) : $images.eq($images.length-2), true, null, dir > 0);
                setImages($images, true, dir > 0);
            };

            const setImages = ($images, animate = false, isRight = true) => {
                const _animations = window.innerWidth > 1024 ? animations : animationsSM;

                $images.removeAttr('style');
                if (animate) {
                    if (isRight) {
                        $images.eq(0).css(_animations[0].from);
                        $images.eq(1).css(_animations[1].from);
                        $images.eq(2).css(_animations[2].from);
                        $images.eq(3).css(_animations[3].from);
                        $images.slice(4).hide();

                        $images.eq(0).css(_animations[0].from).animate(_animations[0].to, {duration: 'slow', complete: function (){
                                $next.on('click', (e)=>clickHandle(e, 1));
                                $prev.on('click', (e)=>clickHandle(e, -1));
                                $(this).detach().appendTo($imagesWrapper).hide();
                            }});
                        $images.eq(1).animate(_animations[1].to, {duration: 'slow'});
                        $images.eq(2).animate(_animations[2].to, {duration: 'slow'});
                        $images.eq(3).animate(_animations[3].to, {duration: 'slow'});
                    } else {
                        $images.last().css(_animations[0].to);
                        $images.eq(0).css(_animations[1].to);
                        $images.eq(1).css(_animations[2].to);
                        $images.eq(2).css(_animations[3].to);
                        $images.slice(4).hide();

                        $images.last().css(_animations[0].to).animate(_animations[0].from, {duration: 'slow', complete: function (){
                                $next.on('click', (e)=>clickHandle(e, 1));
                                $prev.on('click', (e)=>clickHandle(e, -1));
                                $(this).detach().prependTo($imagesWrapper).hide();
                            }});
                        $images.eq(1).animate(_animations[1].from, {duration: 'slow'});
                        $images.eq(2).animate(_animations[2].from, {duration: 'slow'});
                        $images.eq(3).animate(_animations[3].from, {duration: 'slow'});
                    }

                } else {
                    $images.eq(0).detach().appendTo($imagesWrapper).hide();
                    $images.eq(1).css(_animations[0].from);
                    $images.eq(2).css(_animations[1].from);
                    $images.eq(3).css(_animations[2].from);
                    $images.eq(4).css(_animations[3].from);
                    $images.slice(5).hide();

                }
            };



            const setMainImage = ($image, animate = false, callback, isRight = true) => {
                const image = $image.clone();
                image.removeAttr('style').appendTo($mainImageWrapper);
                if (animate) {
                    $descriptions.eq(prev).animate({opacity: 0}, {duration: 'slow'});
                    const width = image.outerWidth();
                    image.animate({width: '100%'},{
                        duration: 'slow',
                        progress: function (animation, progress){
                            if (isRight)
                                $(this).css('clip', `rect(0, auto, auto, ${width*(1-progress)}px)`)
                            else
                                $(this).css('clip', `rect(0, ${width*(progress)}px, auto, 0)`)

                        },
                        complete: function () {
                            $mainImageWrapper.children().not(this).remove();
                            $descriptions.eq(current).animate({opacity: 1}, {duration: 'slow'});
                            callback && callback();
                        }});
                }
                else {
                    callback && callback();
                    $descriptions.eq(current).css('opacity',1);
                }
            };




            const clickHandle = ({currentTarget}, dir) => {
                changeImage(dir);
                $next.off('click');
                $prev.off('click');
            };


            const init = () => {
                $mainImageWrapper.css('width', '0');
                setMainImage($images.eq(0), false, ()=>{
                    $sectionText.css({opacity: 0, marginTop: '50%'}).animate({opacity: 1, marginTop: 0}, {duration: 'slow', complete: () => {
                            $mainImageWrapper.animate({width: "100%"}, {duration: 'slow', complete: () => {
                                    $descriptionWrapper.animate({opacity: 1}, {duration: 'slow', complete: () => {
                                            $buttonsWrapper.animate({opacity: 1}, {duration: 'slow', complete: () => {
                                                    $imagesWrapper.parent().animate({opacity: 1}, {duration: 'slow', complete: () => {
                                                            $next.on('click', (e)=>clickHandle(e, 1));
                                                            $prev.on('click', (e)=>clickHandle(e, -1));
                                                            $section.swipe({
                                                                swipe: (event, direction, distance, duration, fingerCount)=>{
                                                                    if (window.innerWidth <= 1024)
                                                                        if (distance / duration >= 0.7) {
                                                                            if (direction === 'left')
                                                                                $next.click();
                                                                            else if (direction === 'right')
                                                                                $prev.click();
                                                                        }},
                                                                allowPageScroll: 'vertical'
                                                            });
                                                        }});
                                                }});
                                        }});
                                }});
                        }});
                });
                setImages($images);
                $buttonsWrapper.css('opacity', 0);
                $imagesWrapper.parent().css('opacity', 0);
                $descriptionWrapper.css('opacity', 0);
            };
            init();
        };
    })()
})();
