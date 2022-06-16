servicesSection = (()=> {
    $(document).ready(()=>{
        $('.services-section')
            .each(function () {
                $(this).one('inview', e => {
                    servicesSectionFn($(e.currentTarget));
                })
            })
    });

    const servicesSectionFn = (()=>{
        $('.services-section').css({'opacity': 0});

        return ($section) => {
            if (+$section.css('opacity') === 1)
                return;
            $section.css('opacity', 1);

            const $title = $section.find('.services-section__title');
            const $description = $section.find('.services-section__paragraph');
            const $images = $section.find('.two-halves__img');
            const $imgDescriptions = $section.find('.two-halves__description-wrapper');

            const height = (that) => $(that).outerHeight();
            const width = (that) => $(that).outerWidth();



            const animateDescription = ($description, callback = () => {}) => {
                const $parent = $description.parent();

                const animateDescription = (top = 0, left = 0) =>{
                    $description
                        .clone()
                        .appendTo($parent)
                        .css({
                            minHeight: height($description),
                            clip: `rect(0, auto, auto, 0)`,
                            opacity: 1,
                            position: 'absolute',
                            top,
                            left,
                            right: 0
                        })
                        .animate(
                            {width: '100%'},
                        {
                                duration: 350,
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

                if (window.innerWidth <= 768) {
                    const offset = $description.offset();
                    const parentOffset = $parent.offset();
                    const topOffset =  offset.top - parentOffset.top;
                    const leftOffset =   offset.left - parentOffset.left;
                    animateDescription(topOffset, leftOffset);
                } else {
                    animateDescription();
                }

            };
            const animateImage = ($image, $description, callback = () => {}) => {
                const $parent = $image.parent();

                const animateImage = (top = 0, left = 0) => {
                    $image
                        .clone()
                        .appendTo($parent)
                        .css({
                            minHeight: height($image),
                            clip: `rect(0, auto, auto, 0)`,
                            opacity: 1,
                            position: 'absolute',
                            top,
                            left,
                            right: 0

                        })
                        .animate(
                            {width: '100%'},
                            {
                                duration: 350,
                                progress: function (_, progress) {
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

                if (window.innerWidth <= 768) {
                    const offset = $image.offset();
                    const parentOffset = $parent.offset();
                    const topOffset =  offset.top - parentOffset.top;
                    const leftOffset =   offset.left - parentOffset.left;
                    animateImage(topOffset, leftOffset);
                } else {
                    animateImage();
                }


            };
            const animateImages = () => {
                const $descriptions = $imgDescriptions.toArray().reverse();
                $images.toArray().reverse().reduce((callback, el, i)=>{
                    return () => animateImage($(el), $($descriptions[i]), callback);
                }, ()=>{})();
            };
            const init = () => {
                $description.css('opacity', 0);
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
                        if ($description.length > 0)
                            $description.animate({opacity: 1}, {duration: 250, complete: ()=>{
                                animateImages();
                            }});
                        else
                            animateImages();
                    }
                })
            };
            init();


            (()=>{
                const $modal = $('.js-service-menu');
                const $services = $('.js-service');
                let id = 0;
                $modal.find('.side-menu, .side-menu__cross')
                    .click(()=>{
                        $('html, body').removeClass('no-scroll');
                        $modal.closeModal();
                    });

                $('.js-service-order-menu').modal($modal.find('.js-service-button'))
                    .find('form').on('submit', e => {
                        e.preventDefault();

                        const form = e.target;

                        const close = () => {
                            $(form).siblings('.side-menu__cross').click();
                            $('.side-menu').not('[id]').closeModal();
                        };


                        const $name = $(form.name);
                        const $telephone = $(form.phone);

                        const name = form.name.value;
                        const phone = form.phone.value.replace(/\D/g, '');

                        let error = false;


                        if (name.trim().length === 0) {
                            error = true;
                            $name.addClass('invalid');
                        } else {
                            $name.removeClass('invalid');
                        }


                        if (phone.length === 11) {
                            $telephone.removeClass('invalid');
                        } else {
                            $telephone.addClass('invalid');
                            error = true;
                        }

                        if (error) return;

                        const data = {name, phone, service: id};

                        $.ajax('/wp-json/v1/services', {
                            type: 'POST',
                            data: JSON.stringify(data),
                            dataType: 'json'
                        })
                            .done((res) => {
                                close();
                                answerModal(res.status);
                            })
                            .fail(()=>{
                                close();
                                answerModal(false);
                            });

                });

                $services.each(function () {
                    const $this = $(this);
                    $this.find('a').click((e)=>{
                        e.preventDefault();
                        id = $this.data('id');

                        const doneHandler = (data) =>{
                            const title = data.title.rendered;
                            const content = $(data.content.rendered).addClass('paragraph');

                            $modal.find('.js-title').text(title);
                            $modal.find('.js-content').html(content);
                            $modal.openModal();
                            $('html, body').addClass('no-scroll');
                        };

                        $.get('/wp-json/wp/v2/services/'+id).done(doneHandler);

                    });
                })
            })();
        };
    })()
})();
