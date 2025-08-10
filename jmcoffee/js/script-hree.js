/*
 * File    : script-hree.js
 * Author  : STUDIO-JT
 *
 * SUMMARY :
 * GLOBAL VARIABLE
 * FUNCTIONS INIT
 * FUNCTIONS
 */



(function(){



/* **************************************** *
 * GLOBAL VARIABLE
 * **************************************** */




/* **************************************** *
 * FUNCTIONS INIT
 * **************************************** */
auto_slider();

// product
product_menu();
products_slide();
coffee_bar_motion();

// contact
jt_category_swip();



/* **************************************** *
 * FUNCTIONS
 * **************************************** */
// About us Gallery Slider
function auto_slider(){

    if( !document.querySelector('.article__auto-slider') ) return;

    const sliders = document.querySelectorAll('.article__auto-slider');

    sliders.forEach((slider) => {

        const state  = slider.querySelector('.swiper-state');

        // slider init
        let gallerySlider = new Swiper(slider, {
            loop: true,
            speed: 600,
            preventInteractionOnTransition: true,
            followFinger: false,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            preloadImages: false,
            lazy: {
                loadPrevNext: true,
                loadOnTransitionStart: true
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: slider.querySelector('.swiper-button-next'),
                prevEl: slider.querySelector('.swiper-button-prev')
            },
            pagination: {
                el: slider.querySelector('.swiper-pagination'),
                type: 'fraction',
                clickable: true,
            },
            on: {
                init: function() {
                    this.autoplay.stop();
                }
            }
        });

        // slider play
        ScrollTrigger.create({
            trigger: slider,
            start: 'top bottom',
            once: true,
            onEnter: function(){
                gallerySlider.autoplay.start();
            }
        })

        // Toggle autoplay
        state.addEventListener('click', function(){
            if( state.classList.contains('swiper-state--play') ){
                state.classList.remove('swiper-state--play');
                state.classList.add('swiper-state--pause');
                gallerySlider.autoplay.stop();
            } else {
                state.classList.remove('swiper-state--pause');
                state.classList.add('swiper-state--play');
                gallerySlider.autoplay.start();
            };
        });

    });

}



// product menu open motion
function product_menu(){

    if( !document.querySelector('.products-menu') ) return;

    // open
    const title = document.querySelector('.products-menu__title h2');
    const list = document.querySelectorAll('.products-menu__list-item');

    document.querySelector('.products-visual__btn').addEventListener('click', () => {

        gsap.fromTo(title, {
            y: 10,
            rotation: 0.1
        }, {
            y: 0,
            autoAlpha: 1,
            rotation: 0,
            force3D: true,
            ease: 'power1.out',
            duration: 0.6,
        });
        
        list.forEach((item, index)=>{

            // lazyload debug
            if( !item.querySelector('.jt-lazyload').classList.contains('jt-lazyload--loaded') ){
                const image = item.querySelector('img');
                const url = image.getAttribute('data-unveil');

                image.style.opacity = '1';
                image.style.backgroundImage = `url(${url})`;
                image.classList.add('background-image');
            };

            gsap.fromTo(item, {
                y: 10, 
                opacity: 0
            }, {
                y: 0, 
                opacity: 1, 
                duration: 0.6, 
                ease: 'power1.out', 
                delay: 0.2 + (index * 0.05),
            });

        });

    });

}






// Product Slider
function products_slide(){

    if( !document.querySelector('.products-visual__slider') ) return;

    // hash find index
    const array = [];
    const sliderItem = document.querySelectorAll('.products-visual__slider-item');
    const sliderHash = window.location.hash.replace('#','');

    sliderItem.forEach((item)=>{
        const data = item.getAttribute('data-hash');
        array.push(data);
    });
    
    let sliderIndex = array.findIndex(array => array.includes(sliderHash));

    // 404 hash
    if( sliderIndex == -1 ){
        sliderIndex = 0;
    };

    // init
    const slider = document.querySelector('.products-visual__slider');
    let speed = JT.isScreen('860') ? 650 : 1000;

    const swiper = new Swiper(slider, {
        loop: true,
        speed: speed,
        initialSlide: sliderIndex,
        pagination: {
            el: slider.querySelector('.swiper-pagination'),
            clickable: true,
            dynamicBullets: (slider.querySelectorAll('.swiper-slide').length > 5) ? true : false,
            dynamicMainBullets: 5,
        },
        preloadImages: false,
        lazy: {
            loadPrevNext: true,
            loadOnTransitionStart: true
        },
        navigation: {
            nextEl: slider.querySelector('.swiper-button-next'),
			prevEl: slider.querySelector('.swiper-button-prev')
        },
        on: {
            init: function(){
                visual_transition(true);
            },
        }
    });

    swiper.on('realIndexChange', () => visual_transition(false));

    // parallax
    if( JT.browser('desktop') && !JT.isScreen('860') ){

        const target = document.querySelectorAll('.products-visual__slider-item-figure');
        
        target.forEach((item)=>{
            const parallaxInit = new Parallax(item, {
                pointerEvents: true,
            });

            // disable
            document.querySelector('.products-visual__btn').addEventListener('click', ()=>{
                parallaxInit.disable();
            });

            // enable
            document.querySelector('.menu-controller').addEventListener('click', ()=>{
                if( !document.body.classList.contains('open-product-menu') ) {
                    parallaxInit.enable();
                };
            });

            document.querySelector('.products-overlay').addEventListener('click', ()=>{
                if( !document.body.classList.contains('open-product-menu') ) {
                    parallaxInit.enable();
                };
            });
        })
    };

    function visual_transition(isInit){

        const slider = document.querySelector('.products-visual__slider').swiper;
        const sliderItem = document.querySelectorAll('.products-visual__slider-item');
        const title = document.querySelectorAll('.products-visual__title-item');
        
        let prev = null;
        let curr = null;
        let isSingle = false;
    
        if( typeof slider == 'undefined' ) { // If only child
            curr = document.querySelector('.products-visual .swiper-slide');
            isSingle = true;
        } else {
            prev = slider.previousIndex - 1;
            curr = slider.realIndex;
        }

        // title split motion
        title.forEach((item)=>{

            const text = item.querySelector('span');

            if( !text.classList.contains('jt-split-text--complete') ){

                new SplitText(text, {type: 'lines', linesClass: 'jt-split-text--line'});

                // wrap
                const lineItems = document.querySelectorAll('.products-visual__title-item .jt-split-text--line');

                lineItems.forEach((item) => {
                    if ( !item.parentElement.classList.contains('jt-split-text--line-wrap') ){
                        const wrap = document.createElement('div');
                        wrap.classList.add('jt-split-text--line-wrap');

                        item.parentNode.insertBefore(wrap, item);
                        wrap.appendChild(item);
                    }
                });
            }

        });

        // Previous item
        if( !isInit ) {
            
            if( !JT.isScreen('1200') ){
                const prevItem = title[prev].querySelectorAll('.jt-split-text--line');

                // title
                gsap.killTweensOf(title[prev], prevItem);
                gsap.fromTo(prevItem, {
                    y: '0%',
                    rotation: 0.1
                }, {
                    y: '-110%',
                    opacity: 1,
                    rotation: 0,
                    force3D: true,
                    ease: 'power1.in',
                    duration: 0.8,
                    stagger: 0.15, 
                });

            } else {
                const prevItemCont = title[prev];
                
                gsap.killTweensOf(prevItemCont);
                gsap.to(prevItemCont, {
                    autoAlpha: 0,
                    rotation: 0,
                    force3D: true,
                    ease: 'power1.out',
                    duration: 0.3, 
                });

            }
        }

        // Current item
        if( !JT.isScreen('1200') ){
            const currItem = title[curr].querySelectorAll('.jt-split-text--line');

            // title
            gsap.killTweensOf(title[curr], currItem);
            gsap.set(title[curr], { autoAlpha: 1 });

            gsap.fromTo(currItem, {
                y: '100%',
                rotation: 0.1
            }, {
                y: '0%',
                opacity: 1,
                rotation: 0,
                force3D: true,
                ease: 'power1.out',
                duration: 0.8,
                stagger: 0.15,
                delay: (isInit) ? -0.8 : 0.8,
                onStart: () => {
                    title.forEach((item, index)=>{
                        if( index !== curr ){
                            item.removeAttribute('style');
                        };
                        
                        const span = item.querySelector('span');
                        span.classList.add('jt-split-text--complete');
                    });
                },
            });

        } else {

            const currItemCont = title[curr];
            
            gsap.killTweensOf(currItemCont);
            gsap.set(title[curr], { autoAlpha: 0 });
            gsap.to(title[curr], {
                autoAlpha: 1,
                rotation: 0,
                force3D: true,
                ease: 'power1.out',
                duration: 0.4, 
                delay: (isInit) ? 0 : 0.3,
                onStart: () => {
                    title.forEach((item, index)=>{
                        if( index !== curr ){
                            item.removeAttribute('style');
                        };
                    });
                },
            });
        }
        
    }

}



// Coffee note bar motion
function coffee_bar_motion(){
    
    if( !document.querySelector('.products-single-contents__info-note') ) return;

    const cont = document.querySelector('.products-single-contents__info-note');
    const bar = document.querySelectorAll('.products-single-contents__info-note-percent-bar span');

    ScrollTrigger.create({
        trigger: cont,
        start: 'top 80%',
        once: true,
        onEnter: function(){
            bar.forEach((item) => {
                const parent = item.getAttribute('data-parent');
                gsap.to(item, { width: `${parent}%`, ease: 'power1.out', duration: 1})
            });
        }
    });

}



// category tab focus
function jt_category_swip(){

    if( !document.querySelector('.jt-category') ) return;
    if( !JT.isScreen(540) ) return;

    const activeItem = document.querySelector('.jt-category--active');

    activeItem.scrollIntoView({
        behavior: 'instant',
        block: 'center',
        inline: 'center'
    });

}


})();