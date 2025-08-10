/*
 * File    : script-hee.js
 * Author  : STUDIO-JT
 *
 * SUMMARY :
 * 
 */



(function(){



/* **************************************** *
 * Global
 * **************************************** */
let windowWidth = window.innerWidth;



/* **************************************** *
 * FUNCTIONS INIT
 * **************************************** */
JT.ui.add( news_list_hover, true );
highlight_slideshow();
manufacturing_bg_motion();
manufacturing_horiz_scroll();

full_visual_height();



/* **************************************** *
 * ON RESIZE
 * **************************************** */
// INITIALIZE RESIZE
function handleResize(){

    // setTimeout to fix IOS animation on rotate issue
    setTimeout(function(){

        // only width resize check not height ( minimize address bar debugging )
        if (window.innerWidth !== windowWidth) {
            if ( document.querySelector('body').classList.contains('page-template-manufacturing') ){
                window.location.reload();
            }

            full_visual_height();
        }

    }, 100);

}

// Init resize on reisize
if( JT.browser('mobile') ) {
    window.addEventListener('orientationchange', handleResize);
} else {
    window.addEventListener('resize', handleResize);
}



/* **************************************** *
 * FUNCTIONS
 * **************************************** */
// News list hover thumbnail
function news_list_hover(){

    if ( !!!document.querySelector('.jt-news-list')) { return; }

    document.querySelectorAll('.jt-news-list__link').forEach((link) => {

        link.addEventListener('mouseenter',()=>{
            const thumb = link.querySelector('.jt-news-list__thumb');
            const img = link.querySelector('.jt-news-list__thumb > .jt-lazyload');
            
            if (thumb) {
                gsap.to(thumb, {duration: .4, autoAlpha: 1, ease: 'none'});

                var mouseMoveHandler = function(e) {
                    var center_x = thumb.getBoundingClientRect().left + window.scrollX;
                    var center_y = thumb.getBoundingClientRect().top + window.scrollY;
                    var tween_x = e.pageX - center_x;
                    var tween_y = e.pageY - center_y;

                    gsap.to(img, {
						duration: 1.3,
						x: tween_x / 2.5,
						y: tween_y / 5,
						ease: 'power3.out'
					});
                }

                link.addEventListener('mousemove', mouseMoveHandler);

                link.addEventListener('mouseleave', ()=>{
                    gsap.to(thumb, {duration: .4, autoAlpha: 0, ease: 'none'});
                    link.removeEventListener('mousemove', mouseMoveHandler);
                }, { once: true });
            }
        })
    })
}



function highlight_slideshow(){

    const hlSlider = document.querySelectorAll('.highlight-slider');
    
    if ( hlSlider.length === 0 ) { return; }

    hlSlider.forEach((slider) => {

        // slider
        let depthSetting = 600;
        let spaceBetweenSetting = 0;
        let slidesPerViewSetting = 'auto';
        let stretchSetting = JT.isScreen(1200)? -120 : -230;

        if ( slider.parentElement.classList.contains('highlight-artinus__slideshow')){
            depthSetting = 1000;
            spaceBetweenSetting = 400;
            slidesPerViewSetting = 'auto';
            stretchSetting = 0;
        }
        
        new Swiper(slider, {
            loop: true,
            speed: 900,
            slidesPerView: 'auto',
            spaceBetween: 300,
            preventInteractionOnTransition: true,
            followFinger: false,
            centeredSlides: true,
            effect: 'coverflow',
            coverflowEffect: {
                rotate: 0,
                depth: 500,
                modifier: 1,
                slideShadows: false,
                stretch: stretchSetting
            },
            navigation: {
                nextEl: slider.querySelector('.swiper-button-next'),
                prevEl: slider.querySelector('.swiper-button-prev')
            },
            pagination: {
                el: slider.querySelector('.swiper-pagination'),
                clickable: true,
                dynamicBullets: (slider.querySelectorAll('.swiper-slide').length > 5) ? true : false,
                dynamicMainBullets: 5,
            },
            breakpoints: {
                861: {
                    slidesPerView: slidesPerViewSetting,
                    spaceBetween: spaceBetweenSetting,
                    coverflowEffect: {
                        depth: depthSetting,
                    },
                }
            },
            on: {
                beforeTransitionStart: function(){
                    JT.ui.call( 'lazyload_init' );
                }
            }
        })

        // full click event
        const wrapper = slider.querySelector('.swiper-wrapper');
        
        wrapper.addEventListener('click', () => {
            const link = slider.querySelector('.highlight-slider__link')?.getAttribute('href');
        
            if (link) {
                window.location.href = link;
            }
        });
    })
}



function manufacturing_bg_motion(){

    const container = document.querySelector('.manufacturing__system');
    const containerInner = document.querySelector('.manufacturing__system-inner');
    const pic = document.querySelector('.manufacturing__system-bg');
    const txtPrimary = document.querySelector('.manufacturing__system-txt--primary');
    const txtSecondary = document.querySelector('.manufacturing__system-txt--secondary');
    
    if ( !pic) { return; }

    const paths = pic.querySelectorAll('path');
    const count = paths.length;


    paths.forEach((path, index) => {
        const xPos = (index - count/2) * 15 + "rem";
        const yPos = (index - count/2) * -15 + "rem";
        const rocationSet = index / count * 180;

        ScrollTrigger.create({
            trigger: container,
            pin: pic,
            start: "top top",
            end: "bottom bottom",
        })

        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: container,
                pin: containerInner,
                start: "top top",
                end: "bottom bottom",
                scrub: true,
            }
        })

        tl.fromTo(path, { opacity: 0 }, { opacity: 1, x: xPos, y: yPos, duration: .6, transformOrigin: "50% 50%"});
        tl.to(txtPrimary, { autoAlpha: 0, duration: .6 }, '+=.6');
        tl.to(path, { x: 0, y: 0, duration: .6, ease: Power1.easeout }, '-=.6');
        tl.to(path, { rotate: rocationSet, transformOrigin: "50% 50%", duration: .6, ease: Power1.easeout })
        tl.to(txtSecondary, { autoAlpha: 1, duration: .6 }, '-=.6');
        tl.to({},{ duration: .6 });
    });
}



function manufacturing_horiz_scroll(){

    const container = document.querySelector('.manufacturing__process-view');
    const containerInner = document.querySelector('.manufacturing__process-view-inner');
    const progressBar = document.querySelector('.manufacturing__process-bar');
    const progress = document.querySelector('.manufacturing__process-bar i');
    
    if ( !container) { return; }

    const endValue = containerInner.offsetWidth;
    const xPercentValue = -100 + document.documentElement.clientWidth / containerInner.offsetWidth * 100;

    gsap.set('.manufacturing__process-view-label', { y: '18rem' });

    // horiz scroll
    gsap.to( containerInner, {
        xPercent: xPercentValue,
        ease: "none",
        scrollTrigger: {
            trigger: containerInner,
            scrub: true,
            pin: container,
            start: "0% 0%",
            end: () => "bottom+=" + endValue + " top",
            anticipatePin: 1,
            onUpdate: self => {
                const containerRect = container.getBoundingClientRect();
                const screenMiddle = window.innerWidth / 4 * 3;
                const screenMiddle02 = window.innerWidth / 100;

                if ( !JT.isScreen(860) ) {
                    document.querySelectorAll('.manufacturing__process-view-item').forEach(item => {
                        const itemRect = item.getBoundingClientRect();
                        if (itemRect.left <= containerRect.left + screenMiddle && itemRect.left > containerRect.left + screenMiddle02) {
                            gsap.to(item, { opacity: 1, duration: 0.6 });
                        } else {
                            gsap.to(item, { opacity: 0.35, duration: 0.6 });
                        }
                    });
                }
                
                document.querySelectorAll('.manufacturing__process-view-label').forEach(label => {
                    const labelRect = label.getBoundingClientRect();
                    if (labelRect.left <= containerRect.left + screenMiddle && labelRect.left > containerRect.left + screenMiddle02) {
                        gsap.to(label, { y: 0, opacity: 1, duration: 1, ease: Power3.easeout });
                    } else {
                        gsap.to(label, { y: '18rem', opacity: 0, duration: 0.6 });
                    }
                });
            },
            onEnterBack: () => {
                gsap.to( progressBar, { duration: .3, autoAlpha: 1 } );
            },
            onLeave: () => {
                gsap.to( progressBar, { duration: .2, autoAlpha: 0 } );
            },
            onLeaveBack: () => {
                if ( !JT.isScreen(860) ) {
                    gsap.to('.manufacturing__process-view-item', { opacity: 0.35, duration: 1 });
                }
                gsap.to('.manufacturing__process-view-label', { y: 0, opacity: 0, duration: 1 });
            }
        }
    });

    // progress bar
    gsap.fromTo( progress, {
        width: 0
    }, {
        width: '100%',
        scrollTrigger: {
            trigger: containerInner,
            scrub: true,
            start: "0% 0%",
            end: () => "bottom+=" + endValue + " top",
        }
    });

}



// Full Visual Height (for device status bar)
function full_visual_height(){

    // Kakao browser scrolltrigger pin issue fix + Naver browser issue
    if( (JT.browser('kakao') && document.body.classList.contains('page-template-manufacturing')) || (JT.browser('naver') && document.body.classList.contains('page-template-manufacturing'))){
        document.documentElement.style.setProperty('--fit-height', `${ window.innerHeight }px`);
        document.documentElement.style.setProperty('--full-height', `${ screen.height }px`);
    }

    // height size
    document.querySelectorAll('.jt-full-h').forEach((visual)=> {    

        if(window.screen.height === window.innerHeight){
            winHeight = window.screen.height;
        }else{
            winHeight = window.innerHeight;
        }
        visual.style.height = winHeight + 'px';
    });

}



})();