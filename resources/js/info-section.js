infoSection =  (() => {
    $(document).ready(()=>{
        animateInfoSecion();
    });

    const $section =  $('.info-section');

    const $title = $section.find('.info-section__title').hide(0);
    const $contentWrapper =  $section.find('.info-section__info-wrapper');
    const $statisticBackground =  $section.find('.info-section__statistic-background');
    const $stats = $section.find('.info-section__stat').hide(0);
    const $infoTitle = $section.find('.info-section__info-title-wrapper').hide(0);
    $infoTitle.css('min-width', '100%');

    const $infos = $section.find('.info-section__info-content-column, .info-section__partner-section-title, .partner-section__logo-column > *').each(function () {
        const $this = $(this);
        $this.fadeOut(0);
    });
    const contentWidth = ()=> $contentWrapper.outerWidth();
    const statisticHeight = ()=> $contentWrapper.outerHeight();
    $contentWrapper.css({clip: `rect(0px, 0px, auto, 0px)`});
    $statisticBackground.css({clip: `rect(auto, auto, 0, 0px)`});
    const animateInfoSecion = ()=>{
        $title.show('slow', ()=>{
            $contentWrapper.animate({width: '100%'}, {duration: 'slow',
                progress: function (animation, progress) {
                    $(this).css({clip:`rect(0, ${contentWidth()*progress}px, auto, 0px)`});
            },
                complete: function () {
                    $(this).css({clip: 'rect(0, auto, auto, 0px)'});
                    $infoTitle.show('slow', ()=>{
                        $infoTitle.removeAttr('style');
                        let $clones = $();
                        $infos.each(function () {
                            const $this = $(this);
                            const $clone = $this.clone();
                            $clone.css({opacity: 0}).show(0).appendTo($this.parent());
                            $clones = $clones.add($clone);
                        }).toArray().reverse().reduce((callback, elem, index)=>{
                            return () => {
                                $clones.eq($clones.length-1-index).remove();
                                $(elem).fadeIn('slow', ()=>{$(elem).removeAttr('style');callback()});
                            };
                        }, ()=>{})();
                    });
                    $statisticBackground.animate({width: '100%'}, {duration: 'slow',
                        progress: function (animation, progress) {
                            $(this).css({clip: `rect(${statisticHeight()*(1-progress)}px, auto, auto, 0px)`})
                    },
                        complete: function () {
                            $(this).css({clip: 'rect(0, auto, auto, 0px)'});
                            const $clones = $stats.clone();
                            $clones.css({opacity: 0}).show(0).appendTo($stats.parent());
                            $stats.toArray().reverse().reduce((callback, elem, index)=>{
                                return () => {
                                    $clones.eq($clones.length-1-index).remove();
                                    $(elem).show('slow', callback)
                                };
                            }, ()=>{})();
                        }
                    })
                }
            })
        });
    };


})();
