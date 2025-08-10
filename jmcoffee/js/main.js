/*
 * File    : main.js
 * Author  : STUDIO-JT
 *
 * SUMMARY :
 * GLOBAL VARIABLE
 * JT DEFAULT FUNCTIONS INIT
 * OTHER FUNCTIONS INIT
 * ON LOAD
 * ON RESIZE
 * JT DEFAULT FUNCTIONS
 * OTHER FUNCTIONS
 */



(function(){



/* **************************************** *
 * GLOBAL VARIABLE
 * **************************************** */
JT.smoothscroll.init();



/* **************************************** *
 * JT DEFAULT FUNCTIONS INIT
 * **************************************** */
gsap_config();

minimize_header();
global_navigation();

jt_fullvid();

screen_nav_a11y();



/* **************************************** *
 * OTHER FUNCTIONS INIT
 * **************************************** */
jt_background_video();
custom_cursor();

// footer
wave_marquee();
jt_marquee();
quick_menu();

// 404
trail_effects();

// about
about_history_more();



/* **************************************** *
 * ON LOAD
 * **************************************** */
window.addEventListener('load', function(){

    // Refresh bug fix
    if( window.scrollY > 0 ) {
        document.body.classList.add('jt-minimize-layout');
        document.getElementById('header').classList.add('minimize');
        document.querySelector('.menu-controller').classList.add('minimize');
    }

});



/* **************************************** *
 * ON RESIZE
 * **************************************** */
// INITIALIZE RESIZE
function handleResize(){

    // setTimeout to fix IOS animation on rotate issue
    setTimeout(function(){

    }, 100);

}

// Init resize on reisize
if( JT.browser('mobile') ) {
    window.addEventListener('orientationchange', handleResize);
} else {
    window.addEventListener('resize', handleResize);
}



/* **************************************** *
 * JT DEFAULT FUNCTIONS
 * **************************************** */
/**
 * CUSTOM GSAP CONFIG ( Remove gsap warning from console )
 *
 * @version 1.0.0
 * @author STUDIO-JT (Nico)
 * @requires gsap.min.js
 */
function gsap_config(){

    gsap.config({
        nullTargetWarn: false,
        trialWarn: false
    });

    // Mobile scroll layout shift fix
    if( typeof ScrollTrigger !== 'undefined' && JT.browser('kakao') ){

        ScrollTrigger.config({
            autoRefreshEvents: 'visibilitychange,DOMContentLoaded,load'
        });
        
    }

}


    
/**
 * FIX HEADER ANIMATION
 *
 * @version 1.0.0
 * @author STUDIO-JT (KMS, Nico)
 * @requires gsap.min.js
 */
function minimize_header(){

    const header      = document.getElementById('header');
    const menu        = document.querySelector('.menu-controller'); // menu button 중복 사용
    const body        = document.body;
    let currentScroll = 0
    let lastScroll    = 0
    let moveScroll    = 10
    let didScroll     = null;

    window.addEventListener('scroll', function(){

        didScroll = true;

		if ( window.scrollY > header.offsetHeight ) {
            body.classList.add('jt-minimize-layout');
			header.classList.add('minimize');
			menu.classList.add('minimize');
		} else {
            if( document.body.classList.contains('open-menu') ) return;

            body.classList.remove('jt-minimize-layout');
			header.classList.remove('minimize');
			menu.classList.remove('minimize');
		}

    });

    setInterval(function(){

        if( didScroll && !body.classList.contains('open-menu') ) {
            has_scrolled();
            didScroll = false;
        }

    }, 50);

    function has_scrolled(){

        currentScroll = window.scrollY;

        // Make sure they scroll more than move scroll
        if( Math.abs(lastScroll - currentScroll) <= moveScroll ) return;

        if( currentScroll > lastScroll ){ // ScrollDown
            // Base
            if( currentScroll > window.innerHeight ){
                gsap.to(header, { duration: .4, autoAlpha: 0, y: -header.offsetHeight, ease: 'power3.out' });
                gsap.to(menu, { duration: .4, autoAlpha: 0, y: -header.offsetHeight, ease: 'power3.out' });
            }
        }
        else { // ScrollUp
            // Base
            gsap.to( header, {duration: .4, autoAlpha:1, y: 0, ease: 'power3.out' });
            gsap.to( menu, {duration: .4, autoAlpha:1, y: 0, ease: 'power3.out' });
        }

        lastScroll = currentScroll;

    }

}



/**
 * global_navigation
 *
 * @version 1.0.0
 * @author STUDIO-JT (KMS)
 * @requires gsap.min.js
 * @requires jt.js
 */
function global_navigation(){

    const body          = document.body,
          menuBtn       = document.querySelector('.menu-controller'),
          menuBtnLine01 = document.querySelector('.menu-controller__line--01'),
          menuBtnLine02 = document.querySelector('.menu-controller__line--02'),
          menuContainer = document.querySelector('#global-navigation');
    let   isLoading     = false,
          isSliding     = false;

    // 2댑스 메뉴 아코디언 기능 추가
    menuContainer.querySelectorAll('#menu > li.menu-item-has-children > a').forEach((item) => {
        item.addEventListener('click', function(e){
            
            if( JT.isScreen('860') ){ 
                e.preventDefault();
            };

            if( isSliding || !JT.isScreen('860') ) return;
            isSliding = true;
            
            
            const currList = item.closest('li');
            const currChild = currList.querySelector(':scope > ul');

            if( window.getComputedStyle(currChild).display == 'none' ) {
                menuContainer.querySelectorAll('#menu > li').forEach( ( item ) => item.classList.remove('menu-item--open') );
                currList.classList.add('menu-item--open');

                menuContainer.querySelectorAll('#menu > li:not(.menu-item--open) ul.sub-menu').forEach( ( item ) => JT.slide.up(item) );
                JT.slide.down(currChild, 500, () => { isSliding = false; });
            } else {
                currList.classList.remove('menu-item--open');
                JT.slide.up(currChild, 500, () => { isSliding = false; });
            }
        });
    });

    // 메뉴 열기/닫기
    menuBtn.addEventListener('click', function(e){
        e.preventDefault();

        if( isLoading ) return;
        isLoading = true;

        // Device rotation fix
        if( !JT.isScreen('860') ){
            menuContainer.querySelectorAll('#menu > li > ul.sub-menu').forEach( ( item ) => item.removeAttribute('style') );
        } else {
            menuContainer.querySelectorAll('#menu > li').forEach( ( item ) => item.classList.remove('menu-item--open') );
        }

        // product 메뉴 닫기
        if( body.classList.contains('open-product-menu') && !JT.isScreen('860') ){
            close_product_menu();

            return;
        }

        if( !body.classList.contains('open-menu') ){
            open_menu();
        } else {
            close_menu();
        }
        
    });

    // 메뉴 열기
    function open_menu(){

        body.classList.add('open-menu', 'open-menu--motion');

		// Scroll
        const scrollStorage = window.scrollY;
        body.setAttribute('data-scrolltop', scrollStorage);

        if( JT.browser('mobile') && JT.isScreen('540') ) {
            setTimeout(function(){
                body.style.overflow = 'hidden';
            }, 300);
        }

        // Active menu check   
        menuContainer.querySelectorAll('#menu > li').forEach((item) => {
            if( !JT.isScreen('860') ) return;

            menuContainer.querySelectorAll('#menu > li:not(.current-menu-ancestor) ul.sub-menu').forEach( ( item ) => {
                item.style.display = 'none';
            } );

            if( item.classList.contains('current-menu-ancestor') || item.classList.contains('current-menu-item') ){
                item.classList.add('menu-item--open');

                if( !!item.querySelector(':scope > ul') ) {
                    item.querySelector(':scope > ul').style.display = 'block';
                }

                return false;
            }
        });
        

        // Show
		gsap.fromTo(menuContainer, {
		    autoAlpha: 0
		}, {
		    autoAlpha: 1,
		    duration: .3,
		    ease: 'power3.out',
		    onStart: function () {
		        JT.scroll.destroy(true);

		        menuContainer.style.display = 'block';
		    },
            onComplete: function() {
                isLoading = false;
            }
		});
        
        const divideNum = JT.isScreen('540') ? 5.7 : 6.5;
        const positionY = menuBtn.getBoundingClientRect().width / divideNum; // Rem fix
		gsap.to(menuBtnLine01, { y: positionY, rotation: 45, duration: .3, ease: 'power2.inOut' });
		gsap.to(menuBtnLine02, { y: -positionY, rotation: -45, duration: .3, ease: 'power2.inOut' });

    }

    // 메뉴 닫기
    function close_menu(){

		gsap.to(menuContainer, {
			autoAlpha:0,
            duration: .2,
			ease: 'power3.out',
			onStart: function(){
                if( JT.browser('mobile') && JT.isScreen('540') ) { body.style.removeProperty('overflow'); }
				window.scrollTo(0, body.getAttribute('data-scrolltop'));
			},
            onComplete: function() {
				JT.scroll.restore(true);

                menuContainer.style.display = 'none';
                body.classList.remove('open-menu');

                isLoading = false;
            }
        });
		gsap.to(menuBtnLine01, { y: 0, rotation: 0, duration: .3, ease: 'power2.inOut' });
		gsap.to(menuBtnLine02, { y: 0, rotation: 0, duration: .3, ease: 'power2.inOut' });

    }

    // product 메뉴 열기/닫기
    if( document.querySelector('.products-menu') ) {

        const prodMenu = document.querySelector('.products-menu');
        const prodBtn = document.querySelector('.products-visual__btn');
        const prodOverlay = document.querySelector('.products-overlay');
        
        // product 메뉴 열기
        prodBtn.addEventListener('click', () => {
            document.body.classList.add('open-product-menu');
            document.querySelector('.products-menu__inner').scrollTo(0, 0);

            gsap.to(prodMenu, { autoAlpha: 1, duration: .6, ease: 'power3.out', 
                onStart: function() {
                    if( JT.browser('mobile') ) {
                        JT.scroll.destroy( true );
                    } else {
                        JT.smoothscroll.destroy();
                    }
                }, 
                onComplete: function() {
                    isLoading = false;
                }}
            );

            gsap.to(prodOverlay, { autoAlpha: 1, duration: .6, ease: 'power3.out' });
    
            if( !JT.isScreen('860') ){
                const positionY = menuBtn.getBoundingClientRect().width / 6.5; // Rem fix
                gsap.to(menuBtnLine01, { y: positionY, rotation: 45, duration: .3, ease: 'power2.inOut' });
                gsap.to(menuBtnLine02, { y: -positionY, rotation: -45, duration: .3, ease: 'power2.inOut' });
            };
        });
        
        // product 메뉴 닫기
        prodOverlay.addEventListener('click', function(){
            close_product_menu();
        });

        function close_product_menu(){

            document.body.classList.remove('open-product-menu');
    
            gsap.to(prodMenu, { autoAlpha: 0, duration: .6, ease: 'power3.out', onComplete: function() {
                if( JT.browser('mobile') ) {
                    JT.scroll.restore( true );
                } else {
                    JT.smoothscroll.init();
                }
    
                isLoading = false;
            }});

            gsap.to(prodOverlay, { autoAlpha: 0, duration: .6, ease: 'power3.out' });
    
            if( !JT.isScreen('860') ){
                gsap.to(menuBtnLine01, { y: 0, rotation: 0, duration: .3, ease: 'power2.inOut' });
                gsap.to(menuBtnLine02, { y: 0, rotation: 0, duration: .3, ease: 'power2.inOut' });
            };

        }

    }; 

	// Device rotation fix
    function small_screen_nav_resize(){

        if( body.classList.contains('open-menu') ){
            menuContainer.style.display = 'none';
            close_menu();
        }

        if( JT.isScreen('860') ){
            menuContainer.querySelectorAll('#menu > li > ul.sub-menu').forEach( ( item ) => item.removeAttribute('style') );
        } 

    }

    if( JT.browser('mobile') ) {
        window.addEventListener('orientationchange', small_screen_nav_resize);
    } else {
        window.addEventListener('resize', small_screen_nav_resize);
    }

}



/**
 * JT embed fullvid
 *
 * @version 1.0.0
 * @author STUDIO-JT (Nico)
 */
function jt_fullvid(){

    if( document.querySelectorAll('iframe.jt-fullvid').length < 1 ) { return; }

    document.querySelectorAll('iframe.jt-fullvid').forEach((iframe) => {

        const iframeWidth = iframe.getBoundingClientRect().width,
              iframeHeight = iframe.getBoundingClientRect().height,
              ratio = iframeHeight / iframeWidth;

        const vidContainer       = iframe.parentElement.closest('.jt-fullvid-container'),
              vidContainerWidth  = vidContainer.getBoundingClientRect().width,
              vidContainerHeight = vidContainer.getBoundingClientRect().height;

        let newIframeWidth = vidContainerWidth,
            newIframeHeight = vidContainerHeight * ratio;

        // Get ratio
        if( newIframeHeight < vidContainerHeight ){
            newIframeHeight = vidContainerHeight;
            newIframeWidth = vidContainerHeight / ratio;
        }

        // Build markup
        iframe.setAttribute('data-ratio', ratio);
        iframe.style.width     = newIframeWidth + 'px';
        iframe.style.height    = newIframeHeight + 'px';
        iframe.style.display   = 'block';
        iframe.style.position  = 'absolute';
        iframe.style.top       = '50%';
        iframe.style.left      = '50%';
        iframe.style.transform = 'translate(-50%,-50%)';

    });

    // Resize
    window.addEventListener('resize', function(){

        document.querySelectorAll('iframe.jt-fullvid').forEach((iframe) => {

            const vidContainer       = iframe.parentElement.closest('.jt-fullvid-container'),
                  vidContainerWidth  = vidContainer.getBoundingClientRect().width,
                  vidContainerHeight = vidContainer.getBoundingClientRect().height;

            let newIframeWidth = vidContainerWidth,
                newIframeHeight = vidContainerWidth * iframe.getAttribute('data-ratio');

            if( newIframeHeight < vidContainerHeight ){
                newIframeHeight = vidContainerHeight;
                newIframeWidth = vidContainerHeight / iframe.getAttribute('data-ratio');
            }

            iframe.style.width  = newIframeWidth + 'px';
            iframe.style.height = newIframeHeight + 'px';

        });

    });

}



/**
 * GNB menu ally setting
 *
 * @version 1.0.0
 * @author STUDIO-JT (sumi)
 */
function screen_nav_a11y() {

    document.querySelectorAll('#menu .menu-item').forEach((item) => {
        item.addEventListener('focusin', function(){
            item.classList.add('focusin');
        });
        item.addEventListener('focusout', function(){
            item.classList.remove('focusin');
        });
    });

}


   
/* **************************************** *
 * OTHER FUNCTIONS
 * **************************************** */
// Scroll to video play/stop 
function jt_background_video(){

    const fullvid = document.querySelectorAll('.jt-fullvid-container');

	if( !fullvid.length ) return;

    fullvid.forEach((item) => {
        const video = item.querySelector('iframe');

        if (video) {
            JT.globals.jt_vimeo_ready(() => {
                
                const player = new Vimeo.Player(video);
                const poster = item.querySelector('.jt-fullvid__poster-bg');
                let triggerTarget = video;
                
                player.setCurrentTime(0);
                player.play();

                player.on('timeupdate', function (data) {
                    
                    if (data.seconds > 0) {
                        player.off('timeupdate');
                        
                        if (poster.style.display !== 'none') {
                            gsap.to(poster, .2, { autoAlpha: 0, onComplete: () => { poster.style.display = 'none'; } });
                        }

                        // pause
                        if (!item.classList.contains('jt-autoplay-inview--play')) {
                            player.pause();
                        } else {
                            if (poster.style.display !== 'none') {
                                player.pause();
                                player.setCurrentTime(0);

                                gsap.to(poster, {
                                    duration: .2,
                                    autoAlpha: 0,
                                    delay: .05,
                                    onStart: () => {
                                        setTimeout(() => {
                                            player.play();
                                        }, 50);
                                    },
                                    onComplete: () => {
                                        poster.style.display = 'none';
                                    }
                                });
                            }
                        }
                    }
                });

                // check trigger target
                const dataInViewTarget = video.parentElement.closest('.jt-autoplay-inview').getAttribute('data-inview-target');

                if (dataInViewTarget != undefined) {
                    triggerTarget = document.querySelector(dataInViewTarget);
                }

                // create scroll trigger
                ScrollTrigger.create({
                    trigger: triggerTarget,
                    once: false,
                    onEnter: () => {
                        video.parentElement.closest('.jt-autoplay-inview').classList.remove('jt-autoplay-inview--paused');
                        video.parentElement.closest('.jt-autoplay-inview').classList.add('jt-autoplay-inview--play');
            
                        player.play();
                    }
                });
            });
        }
    });

}



// Custom Cursor
function custom_cursor(){

	const cursorMorph = document.querySelectorAll('.custom-hover-morph__item');
    const cursorText = document.querySelector('.custom-hover-text');

    if ( JT.browser('mobile') ) return;

	let cursorFirst = true;

    // default moving
	document.body.addEventListener('mousemove', (e) => {

		if( cursorFirst ){
            gsap.to('#custom-cursor', .3, {autoAlpha: 1});
            cursorFirst = false;
        }

		gsap.to(cursorMorph, 0.8, {x: e.clientX, y: e.clientY, ease: 'power3.out'});
		gsap.to(cursorText, 0.8, {x: e.clientX, y: e.clientY, ease: 'power3.out'});
        
	});

	// circle motion
	gsap.to(cursorMorph[0], 15, {rotation: 360, repeat: -1, ease: 'none'});
	gsap.to(cursorMorph[1], 15, {rotation: -360, repeat: -1, ease: 'none'});

    // circle size
    let cursorSize = JT.isScreen('1480') ? 150 : 200;

    // hover event
	document.querySelectorAll('.custom-hover').forEach((element) => {

        if( document.body.classList.contains('home') ) {
            cursorText.querySelector('span').innerText = 'TOP BRANDS';
        }

		// mouseenter
		element.addEventListener('mouseenter', () => {
			gsap.killTweensOf(cursorMorph, cursorText);
			gsap.to(cursorMorph, .3, {width: `${cursorSize}rem`, height: `${cursorSize}rem`, autoAlpha: 1, ease: 'power3.out'});
			gsap.to(cursorText, .3, {width: '100%', height: '100%', autoAlpha: 1, ease: 'power3.out'});
		});
	
		// mouseleave
		element.addEventListener('mouseleave', () => {
			gsap.killTweensOf(cursorMorph, cursorText);
			gsap.to(cursorMorph, .3, {width: '12rem', height: '12rem', autoAlpha: 0, ease: 'power3.out'});
			gsap.to(cursorText, .3, {width: '0%', height: '0%', autoAlpha: 0, ease: 'power3.out'});
		});
	});

}



// Footer Wave Marquee
function wave_marquee(){

    if( !document.querySelector('.footer__marquee-wave') ) return;
    
    const wave = document.querySelector('.footer__marquee-wave');
    const waveItem = wave.querySelector('.footer__marquee-wave-inner');
    const containerWidth = wave.getBoundingClientRect().width;
    const itemWidth = waveItem.getBoundingClientRect().width;
    const itemLength = Math.ceil(containerWidth / itemWidth) + 1;

    // Clone item
    for( let i = 0; i < itemLength; i++ ){
        let clone = waveItem.cloneNode(true);
        wave.appendChild(clone);
    }

}



// Footer Text Marquee
function jt_marquee(){

    const marquee = document.querySelectorAll('.jt-marquee');

	if( !marquee.length ) return;

    // resize
	function marquee_resize(){

		marquee.forEach((item, index) => {

			const thisId = 'st-marquee-' + index;

			if ( item.style.display === 'none' ) { return true; }

			let wrap = item.querySelector('.jt-marquee__inner');
			let divNum = JT.isScreen('768') ? 45 : 120;

            const spans = wrap.querySelectorAll('span');
			const speed = spans[0].getBoundingClientRect().width / divNum;

            spans.forEach((spanItem) => {

                spanItem.style.animationDuration = speed + 's';
                spanItem.style.animationPlayState = 'running';

                if( ScrollTrigger.getById( thisId ) == undefined ) {
                    ScrollTrigger.create({
                        trigger: item,
                        id: thisId,
                        once: false,
                        onEnter: () => {
                            spanItem.style.animationPlayState = 'running';
                        },
                        onEnterBack: () => {
                            spanItem.style.animationPlayState = 'running';
                        },
                        onLeave: () => {
                            item.style.animationPlayState = 'paused';
                        },
                        onLeaveBack: () => {
                            item.style.animationPlayState = 'paused';
                        }
                    });
                };

            });

		});
	};

	// init
	marquee.forEach((item, index) => {

		if ( item.style.display === 'none' ) { return true; }

		const conWidth = item.getBoundingClientRect().width;
		let wrap = null;

		item.innerHTML = '';

		item.insertAdjacentHTML('beforeend', '<div class="jt-marquee__inner"><span class="sample">' + item.getAttribute('data-label') + '</span></div>');
		wrap = item.querySelector('.jt-marquee__inner');

		const charWidth = wrap.querySelector('.sample').getBoundingClientRect().width;
		const count = Math.ceil(conWidth / charWidth) + 1;

		wrap.innerHTML = ''; // delete sample

		let html = '';

		for( i = 0; i < 2; i++ ) {

			html += '<span>';

			for(j = 0; j < count; j++) {
				html += '<i>' + item.getAttribute('data-label') + '</i>';
			}

			html += '</span>'

		};

		wrap.insertAdjacentHTML('beforeend', html);

		if( index + 1 == marquee.length ){
			marquee_resize();
			window.addEventListener('resize', marquee_resize());
		};

	});
}



// Footer quick menu
function quick_menu(){

    if( !document.querySelector('.quick-menu') ) return;

    const quickMenu = document.querySelector('.quick-menu');
    const quickBtn = quickMenu.querySelector('.quick-menu__btn');
    const youtube = quickMenu.querySelector('.quick-menu__list--youtube');
    const instagram = quickMenu.querySelector('.quick-menu__list--instagram');
    const mall = quickMenu.querySelector('.quick-menu--mall');

    function quick_menu_open(){
        quickMenu.classList.add('open-menu');
        gsap.to(youtube, {y: '-120rem', autoAlpha: 1, duration: 0.6, ease: 'power3.out' });
        gsap.to(instagram, {y: '-60rem', autoAlpha: 1, duration: 0.6, ease: 'power3.out'});
        gsap.to(mall, {y: '-120rem', duration: 0.6, ease: 'power3.out'});
    }

    function quick_menu_close(){
        quickMenu.classList.remove('open-menu');
        gsap.to(youtube, {y: 0, autoAlpha: 0, duration: 0.6, ease: 'power3.out' });
        gsap.to(instagram, {y: 0, autoAlpha: 0, duration: 0.6, ease: 'power3.out' });
        gsap.to(mall, {y: 0, duration: 0.6, ease: 'power3.out' });
    }

    // load event
    setTimeout(()=>{
        quick_menu_close();
    }, 1800)

    // click event
    quickBtn.addEventListener('click', (e) => {
        e.preventDefault();

        if( !quickMenu.classList.contains('open-menu') ){
            quick_menu_open();
        } else {
            quick_menu_close();
        }
    });

}



// 404 trail effects
function trail_effects(){

    if( !document.body.classList.contains('error404') ) return;
    if( JT.browser('mobile') ) return;

    const MathUtils = {
        lerp: (a, b, n) => (1 - n) * a + n * b,
        distance: (x1, y1, x2, y2) => Math.hypot(x2 - x1, y2 - y1)
    };

    // get mouse position
    const getMousePos = function(e) {
        let positionX = 0;
        let positionY = 0;

        if (!e) e = window.event;

        if (e.pageX || e.pageY) {

            positionX = e.pageX;
            positionY = e.pageY;

        } else if (e.clientX || e.clientY) {

            positionX = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
            positionY = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;

        }

        return { x: positionX, y: positionY };
    };

    let mousePos = { x: 0, y: 0 };
    let lastMousePos = { x: 0, y: 0 };
    let prevMousePos = { x: 0, y: 0 };

    // mouse position update
    document.querySelector('.error-404').addEventListener('mousemove', function(e) {
        mousePos = getMousePos(e);
    });

    // mousePos to lastMousePos distance
    const getMouseDistance = () => MathUtils.distance(mousePos.x, mousePos.y, lastMousePos.x, lastMousePos.y);

    class jtImage {
        constructor(el) {
            this.DOM = { el: el };
            this.defaultStyle = {
                scale: 1,
                x: 0,
                y: 0,
                opacity: 0
            };
            this.getRect();
            this.initEvents();
        }
        initEvents() {
            window.addEventListener('resize', () => {
                this.resize();
            });
        }
        resize() {
            gsap.set(this.DOM.el, this.defaultStyle); // reset styles
            this.getRect();
        }
        getRect() {
            this.rect = this.DOM.el.getBoundingClientRect();
        }
        isActive() { // images check
            return this.DOM.el.style.opacity != 0;
        }
    }

    class jtImageTrail {
        constructor() {
            this.DOM = { content: document.querySelector('.error-404__img-tail') };

            this.images = [];
            [...this.DOM.content.querySelectorAll('.error-404__img-tail img')].forEach((img) => {
                this.images.push( new jtImage(img) );
            });

            this.imagesTotal = this.images.length;
            this.imgPosition = 0; // next image index
            this.zIndexVal = 1; // next image z-index
            this.threshold = 100; // next image mouse distance

            requestAnimationFrame(() => this.render());
        }
        render() {
            let distance = getMouseDistance(); // prevMousePos - mousePos

            // prevMousePos cache
            prevMousePos.x = MathUtils.lerp(prevMousePos.x || mousePos.x, mousePos.x, 0.1);
            prevMousePos.y = MathUtils.lerp(prevMousePos.y || mousePos.y, mousePos.y, 0.1);

            if (distance > this.threshold) {
                this.showNextImage();

                ++this.zIndexVal;
                this.imgPosition = this.imgPosition < this.imagesTotal - 1 ? this.imgPosition + 1 : 0;

                lastMousePos = mousePos;
            }

            // stop motion check
            let motionStart = true;
            for (let jtImage of this.images) {
                if (jtImage.isActive()) {
                    motionStart = false;
                    break;
                }
            }

            if (motionStart && this.zIndexVal !== 1) {
                this.zIndexVal = 1; // z-index reset
            }

            requestAnimationFrame(() => this.render()); // loop
        }
        showNextImage() {
            const jtImage = this.images[this.imgPosition];
            const jtImageItem = jtImage.DOM.el;

            gsap.killTweensOf(jtImageItem); // tween delete

            const tl = gsap.timeline();

            // show image
            tl.set(jtImageItem, { 
                startAt: { opacity: 0, scale: 1 },
                opacity: 1,
                scale: 1,
                zIndex: this.zIndexVal,
                x: prevMousePos.x - jtImage.rect.width / 2,
                y: prevMousePos.y - jtImage.rect.height / 2
            }, 0);

            // animate position
            tl.to(jtImageItem, { 
                duration: 0.9,
                ease: 'expo.out',
                x: mousePos.x - jtImage.rect.width / 2,
                y: mousePos.y - jtImage.rect.height / 2
            }, 0);

            // image disappear
            tl.to(jtImageItem, { duration: 1, ease: 'power1.out', opacity: 0 }, 0.4);

            // image scale
            tl.to(jtImageItem, { duration: 1, ease: 'quint.out', scale: 0.2 }, 0.4);

            // break point
            if (JT.isScreen('1600')) {
                tl.set(jtImageItem, { scale: 0.8 }, 0);
            }
        }
    }

    //preload Images
    const preload_images = function () {
        return new Promise(function (resolve) {
            imagesLoaded(document.querySelectorAll('.error-404__img-tail img'), resolve);
        });
    };

    preload_images().then(function () {
        // Remove the loader
        document.body.classList.remove('loading');
        new jtImageTrail();
    });

}



// About us History More
function about_history_more(){

    if( !document.body.classList.contains('page-template-about-us') ) return;

    const history = document.querySelector('.aboutus-history');
    const year = history.querySelectorAll('.aboutus-history__year');
    const button = history.querySelector('.aboutus-history__btn');
    const maxItem = 6;

    const centuryNum = document.querySelectorAll('.aboutus-history__century-num');
    const yearNum = document.querySelectorAll('.aboutus-history__year-num');

    new SplitText(centuryNum, { type: 'chars', charsClass: 'jt-split-text--char'});
    new SplitText(yearNum, { type: 'chars', charsClass: 'jt-split-text--char'});

    // setting
    year.forEach((item, index) => {
        if(index < maxItem){
            item.style.display = 'flex';
            item.classList.add('view');
        };

        if(index == maxItem - 1){
            item.classList.add('view-last');
        };
    });

    history_motion();
    
    // open
    button.addEventListener('click', (e) => {
        e.preventDefault();
        
        if( !history.classList.contains('history-open') ){
            year.forEach((item) => {
                item.style.display = 'flex';
                item.classList.add('view');
            });

            history.classList.add('history-open');
            button.style.display = 'none';

            // open year scrollTo
            if( !JT.isScreen('860') ){
                const target = document.querySelector('.view-last');
                const scrollPos = (target.getBoundingClientRect().top + window.pageYOffset) - (window.innerHeight * 0.4);

                gsap.to(window, { duration: .6, scrollTo: scrollPos, ease: 'power3.out' });
            } else {
                document.querySelector('.aboutus-history__contents').classList.add('aboutus-history__contents--reload');
            };
            
            history_motion();

        } else {

            //close
            year.forEach((item, index) => {
                if(index >= maxItem){
                    item.style.display = 'none';
                }
            })

            history.classList.remove('history-open');
            button.querySelector('span').innerHTML = 'History more';
            
            gsap.to(window, { duration: 1.2, scrollTo: JT.offset.top('.aboutus-history') + ( document.getElementById('header').offsetHeight * 2 ), ease: 'power3.out' });

        }
    });

    // motion
    function history_motion(){

        const content = document.querySelector('.aboutus-history__contents');

        if( JT.isScreen('860') ){

            if( !content.classList.contains('aboutus-history__contents--reload') ) {
                gsap.set(content, { y: 30, autoAlpha: 0 });
                ScrollTrigger.create({
                    trigger: content,
                    start: 'top 80%',
                    once: true,
                    onEnter: function(){
                        gsap.to(content, { y: 0, autoAlpha: 1, duration: 0.6, delay: 0.3, ease: 'power1.inOut' });
                    }
                });
            };

        } else {

            yearNum.forEach((item, index)=>{
                const year = item.closest('.aboutus-history__year');
                const century = item.closest('.aboutus-history__century-list').previousElementSibling;
                const centuryTarget = century.querySelectorAll('.jt-split-text--char');
                const yearTarget = item.querySelectorAll('.jt-split-text--char');

                let historyTl = gsap.timeline({
                    scrollTrigger: {
                        trigger: year,
                        start: 'top 80%',
                    }
                });
    
                if( !year.classList.contains('complete') && year.classList.contains('view') ){
                    if( index === 0 || index === yearNum.length - 1 ){
                        historyTl.fromTo(centuryTarget, {y: 8, opacity: 0, rotation: 0.1}, { y: 0, opacity: 1, rotation: 0, force3D: true, ease: 'power1.inOut', stagger: .05, duration: 0.6 });
                    }

                    historyTl.fromTo(yearTarget, {y: 8, opacity: 0, rotation: 0.1}, { y: 0, opacity: 1, rotation: 0, force3D: true, ease: 'power1.inOut', stagger: .05, duration: 0.6, delay: -0.6, onComplete: ()=>{
                        year.classList.add('complete');
                    }});
                };
            });

        };
    }

}



})();