(()=> {
    $(document).ready(()=>{
        animate(slider);
    });


    const $section = $('.welcome-section');
    const $steps = $section.find('.welcome-section__step');
    if (window.screen.width < 768) {
        $stepImages = $section.find('.welcome-section__image-mobile');
    }else{
        $stepImages = $section.find('.welcome-section__image');
    }
    const $stepDescription = $section.find('.welcome-section__description-wrapper');

    const numOfSteps = $steps.length;
    let currentStep = -1;



    const animate = (callback) => {


        const handleFlashAnim = (() => {

            const handleTitleAnim = (() => {
                let isCallbackHasInitialized = false;

                return function () {
                    const handleStepWrapperAnim = (()=>{
                        return function () {
                            const handleStepsAnim = (()=>{
                                if (isCallbackHasInitialized === false) {
                                    callback();
                                    isCallbackHasInitialized = true;
                                }
                            })();

                            $steps.animate({opacity: 1},{duration: 'slow', complete: handleStepsAnim});
                        }
                    })();

                    $description.animate({opacity: 1}, {duration: 'slow'});
                    $link.animate({opacity: 1}, {duration: 'slow'});
                    $stepWrapper.animate({bottom: 0},{duration: 'slow', complete: handleStepWrapperAnim});
                }
            })();

            return function () {
                $titleContent.show({duration: 'slow', complete: handleTitleAnim});
            }
        })();



        $('.flash').fadeOut('slow', handleFlashAnim);


        $stepImages.not(':eq(0)').hide();
        const $selectedDescription =  $stepDescription.eq(0);
        const $titleContent = $selectedDescription.find('.welcome-section__title-content').hide(0);
        const $link = $selectedDescription.find('.welcome-section__link').css('opacity', 0);
        const $description = $selectedDescription.find('.welcome-section__description').css('opacity', 0);
        $steps.css('opacity', 0);
        const $stepWrapper = $('.welcome-section__step-wrapper');
        const stepWrapperHeight = $stepWrapper.outerHeight();
        $stepWrapper.css('bottom', -stepWrapperHeight);



    };

    const slider = (delay = 30000)=>{
        const animations = [

            {
                from: 'scale(1)',
                to: (progress) =>
                    `scale(${1+progress*0.05})`,
            },
            {
                from: 'scale(1.4)',
                to: (progress) =>
                    `translateY(${progress*5}%) scale(1.4)`,
            },
            {
                from:  'translateX(1.5%) scale(1.4)',
                to: (progress) =>
                    `translateX(${1.5-progress*5}%) scale(1.4)`,
            }

        ];


        const setSlide = (step) => {
            if (step >= numOfSteps)
                step = 0;
            else if(step < 0)
                step = numOfSteps -1;

            const $currentImage = $stepImages.eq(currentStep);
            const $currentStep = $steps.eq(currentStep);
            const $currentDescription = $stepDescription.eq(currentStep);
            const $nextStep = $steps.eq(step);
            const $nextImage = $stepImages.eq(step);
            const $nextDescription = $stepDescription.eq(step);

            if (currentStep!==step ) {
                $currentImage.fadeOut({duration: 'slow', queue: false});
                $currentDescription.animate({opacity: 0}, {duration: 'slow', queue: false});
                $nextImage.css('transform', animations[step].from).stop().fadeIn({duration: 'slow', queue: false,
                    complete: ()=> $nextImage.removeAttr('style').animate({width: '100%'}, {duration: delay,
                        progress: function (animation, progress) {
                            $(this).css('transform', animations[step].to(progress));
                        }
                    })});
                $nextDescription.animate({opacity: 1}, {duration: 'slow', queue: false});
            }

            currentStep = step;
            $currentStep
                .removeClass('selected')
                .find('.progress-bar__indicator')
                .css('width', 0)
                .stop();


            $nextStep
                .addClass('selected')
                .find('.progress-bar__indicator')
                .css('width', 0)
                .animate(
                    {width: '100%'},
                    {
                            duration: delay,
                            easing: 'linear',
                            done: ()=>{
                                setTimeout( ()=> {
                                    currentStep = step;

                                    setSlide(step + 1)
                                },0);
                            }
                    }
            );


        };

        const clickHandler = (index) => ()=> {
                if (index === currentStep)
                return;
            setSlide(index);
        };

        const next = () => {
            setSlide(currentStep + 1);

        };
        const prev = () => {
            setSlide(currentStep - 1);

        };

        const init = () => {
            $steps.each((index, element)=>{
                $(element).click(clickHandler(index))
            });
            $section.find('.js-back').click(prev);
            $section.find('.js-next').click(next);
            $section.swipe({
                swipe: (event, direction, distance, duration, fingerCount)=>{
                    if (distance / duration >= 0.7) {
                        if (direction === 'left')
                            next();
                        else if (direction === 'right')
                            prev();
                    }},
                    allowPageScroll: 'vertical'
                });
            setSlide(0);
        };

        init();

    };
})();
