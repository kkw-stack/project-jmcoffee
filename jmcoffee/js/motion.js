/*
 * File    : motion.js
 * Author  : STUDIO-JT
 *
 * SUMMARY :
 * INIT
 * FUNCTIONS
 */



(function(){



/* **************************************** *
 * GLOBAL VARIABLE
 * **************************************** */
let onLoad = false;



/* **************************************** *
 * INIT
 * **************************************** */
intro_loading_init();
bg_dark_change();
title_motion();
video_motion();
section_open_motion();



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
 * ON LOAD
 * **************************************** */
if( document.querySelector('.jt-spline > canvas') ){

    if( JT.browser('mobile') ) return;

    // spline load
    const bg = document.querySelector('.article__bg');
    const trigger = bg.parentNode.nextElementSibling;
    const canvas = document.getElementById('jt-spline-visual');
    const url = canvas.getAttribute('data-url');
    
    const importApp = import('./vendors/@splinetool/runtime/build/runtime.js')
        .then(module => module.Application);
    
    let app;
    importApp.then(Application => {
        app = new Application(canvas);
    });

    window.addEventListener('load', () => {
        app.load(url)
            .then(() => {
                onLoad = true;
            });
    });

    ScrollTrigger.create({
        trigger: trigger,
        start: 'top top',
        onEnter: () => {
            if(app){
                app.stop();
            }
        },
        onLeaveBack: () => {
            app.play();
        },
    });

} else {

    window.addEventListener('load', function(){
        onLoad = true;
    });

}



/* **************************************** *
 * FUNCTIONS
 * **************************************** */
/*
* TEXT MOTION
*
* example : class="jt-motion--appear" data-motion-offset="top 80%" data-motion-y="20" data-motion-duration="1.2" data-motion-delay="-.4"
*           class="jt-motion--up" data-motion-offset="top 50%" data-motion-y="100" data-motion-duration=".8"
*           class="jt-motion--fade" data-motion-offset="top 50%" data-motion-y="8" data-motion-duration=".6"
*           class="jt-motion--stagger" data-motion-offset="top 80%" data-motion-y="40" data-motion-duration=".9" data-motion-delay=".2" data-column="3"
*           class="jt-motion--scale" 
*           class="jt-motion--split" 
*/
function global_text_motion(){
    
    // 한줄씩 나타나는 모션
    if (!!document.querySelector('.jt-motion--appear')){

        const motionAppear = document.querySelectorAll('.jt-motion--appear');

        motionAppear.forEach((item)=>{

            let offset = item.getAttribute('data-motion-offset');
            let yPos = item.getAttribute('data-motion-y');
            let duration = item.getAttribute('data-motion-duration');
            let delay = item.getAttribute('data-motion-delay');

            if( offset == undefined ) { offset = 'top 80%' };
		    if( yPos == undefined ) { yPos = 20 };
		    if( duration == undefined ) { duration = 1.2 };
		    if( delay == undefined ) { delay = JT.isScreen('860') ? 0 : -0.4 };

            new SplitText(item, { type: 'lines', linesClass: 'jt-split-text--line'});

            const itemLines = item.querySelectorAll('.jt-split-text--line');

            gsap.set(itemLines, { y: yPos, opacity: 0, rotation: 0.1 });

            ScrollTrigger.create({
                trigger: item,
                start: offset,
                once: true,
                onEnter: function(){
                    gsap.to(itemLines, {
                        y: 0, 
                        opacity: 1, 
                        rotation: 0, 
                        force3D: true, 
                        ease: 'power1.inOut', 
                        stagger: 0.05, 
                        duration: duration, 
                        delay: delay
                    });
                }
            });

        })

    };

    // 아래에서 올라오는 모션
    if (!!document.querySelector('.jt-motion--up')){

        const motionUp = document.querySelectorAll('.jt-motion--up');

        motionUp.forEach((item)=>{

            let offset = item.getAttribute('data-motion-offset');
            let yPos = item.getAttribute('data-motion-y');
            let duration = item.getAttribute('data-motion-duration');
            let delay = item.getAttribute('data-motion-delay');

            if( offset == undefined ) { offset = 'top 80%' };
	        if( yPos == undefined ) { yPos = 20; };
		    if( duration == undefined ) { duration = 0.8 };
            if( delay == undefined ) { delay = 0 };

            gsap.set(item, {y: yPos, autoAlpha: 0});
            ScrollTrigger.create({
                trigger: item,
                start: offset,
                once: true,
                onEnter: function(){
                    gsap.to(item, {
                        y: 0, 
                        autoAlpha: 1, 
                        duration: duration,
                        rotation: 0,
                        ease: 'power1.out',
                        delay: delay
                    });
                }
            });

        });
        
    };

    // 한글자씩 페이드되는 모션
    if (!!document.querySelector('.jt-motion--fade')){

        const motionFade = document.querySelectorAll('.jt-motion--fade');

        motionFade.forEach((item)=>{

            let offset = item.getAttribute('data-motion-offset');
            let yPos = item.getAttribute('data-motion-y');
            let duration = item.getAttribute('data-motion-duration');

            if( offset == undefined ) { offset = 'top 80%'; }
		    if( yPos == undefined ) { yPos = 8; }
		    if( duration == undefined ) { duration = 0.6; }

            new SplitText(item, { type: 'chars, lines', charsClass: 'jt-split-text--char', linesClass: 'jt-split-text--line'});

            const itemChar = item.querySelectorAll('.jt-split-text--char');
            const itemLines = item.querySelectorAll('.jt-split-text--line');
            let lineItemChar = null;

            itemLines.forEach((item)=>{             
                lineItemChar = item.querySelectorAll('.jt-split-text--char');
            })

            gsap.set(itemChar, { y: yPos, opacity: 0, rotation: 0.1 });
            gsap.set(lineItemChar, { y: yPos, opacity: 0, rotation: 0.1 });

            ScrollTrigger.create({
                trigger: item,
                start: offset,
                once: true,
                //markers: 1,
                onEnter: function(){
                    if( itemLines.length > 1 ){
                        itemLines.forEach((item)=>{
                            const lineItemChar = item.querySelectorAll('.jt-split-text--char');
    
                            gsap.to(lineItemChar, {
                                y: 0, 
                                opacity: 1, 
                                rotation: 0, 
                                force3D: true, 
                                ease: 'power1.inOut', 
                                stagger: 0.02, 
                                duration: duration
                            });
                        });
                    } else {
                        gsap.to(itemChar, {
                            y: 0, 
                            opacity: 1, 
                            rotation: 0, 
                            force3D: true, 
                            ease: 'power1.inOut', 
                            stagger: 0.02, 
                            duration: duration
                        });
                    };
                }
            });

        });

    };

    // 아이템 하나씩 올라오는 모션
    if (!!document.querySelector('.jt-motion--stagger')){

        const motionStagger = document.querySelectorAll('.jt-motion--stagger');
        
        motionStagger.forEach((stagger)=>{

            const staggerItem = stagger.querySelectorAll('.jt-motion--stagger-item');
            const highlight = stagger.classList.contains('highlight-business__list') && JT.isScreen(1023);
            const business = stagger.classList.contains('article__card-list') && JT.isScreen(540);

            staggerItem.forEach((item, index)=>{

                let offset = item.getAttribute('data-motion-offset');
                let yPos = item.getAttribute('data-motion-y');
                let duration = item.getAttribute('data-motion-duration');
                let delay = item.getAttribute('data-motion-delay');
                let column = item.getAttribute('data-column');

                if( offset == undefined ) { offset = 'top 80%'; }
                if( yPos == undefined ) { yPos = (highlight || business) ? 0 : 40; }
                if( duration == undefined ) { duration = 0.9; }
                if( delay == undefined ) { delay = 0.2; }
                if( column == undefined ) { column = 3; }

                gsap.set(item, {y: yPos, opacity: 0, rotation: 0.1});

                ScrollTrigger.create({
                    trigger: item,
                    start: offset,
                    once: true,
                    onEnter: function(){
                        gsap.to(item, {
                            y: 0, 
                            rotation: 0,
                            opacity: 1, 
                            duration: duration,
                            delay: (highlight || business) ? 0 : (index % column) * delay,
                            ease: 'power1.out'
                        });
                    }
                });

            });

        });
        
    };

    // 커지면서 등장하는 모션
    if (!!document.querySelector('.jt-motion--scale')){

        const motionScale = document.querySelectorAll('.jt-motion--scale');

        motionScale.forEach((item)=>{

            gsap.set(item, { autoAlpha: 0, scale: '0.8' });

            ScrollTrigger.create({
                trigger: item,
                start: 'top 80%',
                once: true,
                //markers: 1,
                onEnter: function(){
                    gsap.to(item, {
                        autoAlpha: 1,
                        scale: '1',
                        duration: 1,
                        ease: 'power3.out'
                    });
                }
            });

        });

    };

    // 한줄씩 아래에서 올라오는 모션 + hidden
    if (!!document.querySelector('.jt-motion--split')){

        const motionSplit = document.querySelectorAll('.jt-motion--split');

        motionSplit.forEach((item)=>{

            if( !item.classList.contains('jt-split-text--complete') ){

                new SplitText(item, {type: 'lines', linesClass: 'jt-split-text--line'});

                // wrap
                const lineItems = item.parentElement.querySelectorAll('.jt-split-text--line');

                lineItems.forEach((item) => {
                    
                    if ( !item.parentElement.classList.contains('jt-split-text--line-wrap') ){
                        const wrap = document.createElement('div');
                        wrap.classList.add('jt-split-text--line-wrap');
                        wrap.style.overflow = 'hidden';
                        item.parentNode.insertBefore(wrap, item);
                        wrap.appendChild(item);
                    };
                });
            };

            let offset = item.closest('.jt-motion--split').getAttribute('data-motion-offset');
            let duration = item.closest('.jt-motion--split').getAttribute('data-motion-duration');
            let delay = item.closest('.jt-motion--split').getAttribute('data-motion-delay');

            if( offset == undefined ) { offset = 'top 80%' };
            if( duration == undefined ) { duration = 0.8 };
            if( delay == undefined ) { delay = 0 };

            ScrollTrigger.create({
                trigger: item,
                start: offset,
                once: true,
                onEnter: function(){
                    const motionLine = item.parentElement.querySelectorAll('.jt-split-text--line');
                    const parentItem = item.closest('.jt-motion--split');

                    gsap.set(motionLine, { y: '100%', rotation: 0.1 });
                    gsap.set(parentItem, { autoAlpha: 1 });
                    gsap.to(motionLine, { 
                        y: '0%', 
                        rotation: 0, 
                        force3D: true, 
                        ease: 'power1.out', 
                        duration: duration, 
                        delay: delay,
                        onStart: () => {
                            item.classList.add('jt-split-text--complete');
                        }
                    });
                }
            });

        });

    };

    // 한글자씩 아래에서 올라오는 모션 + hidden
    if (!!document.querySelector('.jt-motion--split-char')){

        const motionSplit = document.querySelectorAll('.jt-motion--split-char');

        motionSplit.forEach((item)=>{

            if( !item.classList.contains('jt-split-text--complete') ){
                new SplitText(item, {type: 'lines, chars', linesClass: 'jt-split-text--line', charsClass: 'jt-split-text--char'});

                // wrap
                const lineItems = item.parentElement.querySelectorAll('.jt-split-text--line');

                lineItems.forEach((lineItem) => {
                    
                    if ( !lineItem.parentElement.classList.contains('jt-split-text--line-wrap') ){
                        const wrap = document.createElement('div');
                        wrap.classList.add('jt-split-text--line-wrap');
                        wrap.style.overflow = 'hidden';
                        lineItem.parentNode.insertBefore(wrap, lineItem);
                        wrap.appendChild(lineItem);
                    };
                });
            };

            const motionLine = item.parentElement.querySelectorAll('.jt-split-text--line');

            let delay = item.closest('.jt-motion--split-char').getAttribute('data-motion-delay');
            if( delay == undefined ) { delay = 0 };

            motionLine.forEach((lineItem, index) => {
                const motionChar = lineItem.querySelectorAll('.jt-split-text--char');

                ScrollTrigger.create({
                    trigger: lineItem,
                    start: 'top 80%',
                    once: true,
                    onEnter: function () {
                        const parentItem = lineItem.closest('.jt-motion--split-char');
                        gsap.to(parentItem, { autoAlpha: 1 });
        
                        gsap.fromTo(motionChar, {
                            y: '110%',
                            rotation: 0.1,
                        }, {
                            y: '0%',
                            autoAlpha: 1,
                            rotation: 0,
                            force3D: true,
                            duration: 0.8,
                            ease: 'power1.out',
                            stagger: 0.05, 
                            delay: index == 1 ? 0.4 : 0,
                        });
                    }
                });

            });

        });

    };

}



// background dark change
function bg_dark_change(){

    if( !document.querySelector('.article__bg') ) return;

    // bg change
    const bg = document.querySelector('.article__bg');
    const darkBg = bg.querySelector('.article__bg--dark');
    const visualBg = bg.querySelector('.article__bg--3d');

    let trigger = bg.parentNode.nextElementSibling;
    let offset = darkBg.getAttribute('data-motion-offset');
    let duration = darkBg.getAttribute('data-motion-duration');
    let splineScroll = darkBg.getAttribute('data-motion-scroll');

    if( offset == undefined ) { offset = 'top bottom' };
    if( duration == undefined ) { duration = 1 };
    if( splineScroll == undefined ) { splineScroll = false; };
    
    if( splineScroll && JT.browser('desktop') ){

        let tl = gsap.timeline({
            scrollTrigger: {
                trigger: trigger,
                start: offset ,
                end: 'top 20%',
                scrub: 1,
            }
        });
    
        tl.to(visualBg, { opacity: '0', duration: duration, ease: 'none' });
        tl.to(darkBg, { autoAlpha: 1, duration: duration, ease: 'none' });

    } else {

        ScrollTrigger.create({
            trigger: trigger,
            start: offset,
            end: JT.isScreen('540') ? '+=500' : '+=800',
            onEnter: () => {
                gsap.killTweensOf(darkBg);
                gsap.to(darkBg, { opacity: '1', duration: duration, ease: 'none', visibility: 'visible' });
            },
            onLeave: () => {
                if( JT.browser('mobile') ){
                    document.querySelectorAll('.article__bg--3d-mo video').forEach((video) => {
                        video.pause();
                    });
                };
            },
            onEnterBack: () => {
                gsap.killTweensOf(darkBg);
                gsap.to(darkBg, { opacity: '1', duration: 0.6, ease: 'none', visibility: 'visible' });
                
            },
            onLeaveBack: () => {
                gsap.killTweensOf(darkBg);
                gsap.to(darkBg, { opacity: '0', duration: 0.6, ease: 'none', onComplete: () => {
                    darkBg.style.visibility = 'hidden';
                }});
                if( JT.browser('mobile') ){
                    document.querySelectorAll('.article__bg--3d-mo video').forEach((video) => {
                        video.play();
                    });
                };
            }
        });

    };

    if( document.querySelector('.article__visual-scroll-down') && JT.isScreen('860') ){

        const scrollDown = document.querySelector('.article__visual-scroll-down');

        ScrollTrigger.create({
            trigger: scrollDown,
            start: 'top 50%',
            once: true,
            onEnter: () => {
                gsap.to(scrollDown, { autoAlpha: 0, duration: 0.6, ease: 'power3.out'});
            },
        });

    };

}



// section title motion
function title_motion(){

    if( !document.querySelector('.jt-motion--title') ) return;

    const motionTitle = document.querySelectorAll('.jt-motion--title');
    const motionButton = document.querySelectorAll('.jt-motion--title-btn');
    const motionTitleVideo = document.querySelectorAll('.jt-motion--title-video');

    // main video + title
    if( motionTitleVideo.length !== 0 ){
        
        motionTitleVideo.forEach((cont)=>{
            const video = cont.querySelector('.jt-motion--video');
            const title = cont.querySelectorAll('.jt-motion--title');
            const button = cont.querySelector('.jt-motion--title-btn');

            gsap.set(video, { y: 40, opacity: 0, rotation: 0.1 });
            gsap.set(title, { y: 40, opacity: 0, rotation: 0.1 });
            gsap.set(button, { y: 40, opacity: 0, rotation: 0.1 });

            ScrollTrigger.create({
                trigger: cont,
                start: 'top bottom',
                once: true,
                //markers: 1,
                onEnter: function(){
                    gsap.to(video, { 
                        y: 0, 
                        opacity: 1, 
                        rotation: 0, 
                        force3D: true, 
                        duration: 1, 
                        delay: 0, 
                        ease: 'power1.out', 
                        onStart: ()=>{
                            setTimeout(() => {
                                video.querySelector('video').play();
                            }, 200);
                        }
                    });
                    title.forEach((item, index)=>{
                        gsap.to(item, { y: 0, opacity: 1, rotation: 0, force3D: true, duration: 1, delay: 0.6 + index*0.2, ease: 'power1.out' });
                    });
                    gsap.to(button, { y: 0, opacity: 1, rotation: 0, force3D: true, duration: 1, delay: 1, ease: 'power1.out' });
                }
            });
        });

    } else {

        // text
        motionTitle.forEach((title) => {
            gsap.set(title, { y: 40, opacity: 0, rotation: 0.1 });
            ScrollTrigger.create({
                trigger: title,
                start: 'top 80%',
                once: true,
                onEnter: function(){
                    gsap.to(title, {
                        y: 0, 
                        opacity: 1, 
                        rotation: 0, 
                        force3D: true, 
                        duration: 1,
                        ease: 'power1.out'
                    });
                }
            });
        })

        // button
        if( motionButton ){
            motionButton.forEach((button) => {
                gsap.set(button, { y: 40, opacity: 0, rotation: 0.1});
                ScrollTrigger.create({
                    trigger: button,
                    start: 'top 80%',
                    once: true,
                    onEnter: function(){
                        gsap.to(button, {
                            y: 0, 
                            opacity: 1, 
                            rotation: 0, 
                            force3D: true, 
                            duration: 0.8,
                            ease: 'power1.out'
                        });
                    }
                });
            })
        };

    };

}



// video appear motion
function video_motion(){

    if( !document.querySelector('.jt-motion--video') ) return;
    if( document.querySelector('.jt-motion--title-video') ) return;

    const video = document.querySelectorAll('.jt-motion--video');

    video.forEach((item) => {
        gsap.set(item, {rotation: 0.1});
        ScrollTrigger.create({
            trigger: item,
            start: 'top 80%',
            once: true,
            onEnter: function(){
                gsap.to(item, {
                    duration: 1,
                    rotation: 0,
                    force3D: true, 
                    ease: 'power1.out',
                    onStart: ()=>{
                        item.classList.add('video-active');
                        item.querySelector('video').play();
                    }
                });
            }
        });

    });

}



// section open motion
function section_open_motion(){

    if( !document.querySelector('.jt-motion--open') ) return;

    // setting
    const container = document.querySelectorAll('.jt-motion--open');

    container.forEach((item)=>{

        const hideLeft = document.createElement('div');
        const hideRight = document.createElement('div');

        let delay = item.getAttribute('data-motion-delay');
        if( delay == undefined ) { delay = 0 };

        if( JT.browser('desktop') ){

            gsap.set(item, { width: '50%', ease: 'power2.out' })

            // open
            ScrollTrigger.create({
                trigger: item,
                start: 'top 100%',
                once: true,
                onEnter: function(){
                    gsap.to(item, { width: '100%', duration: 1.6, ease: 'power2.out' });
                }
            })

        } else {

            hideLeft.classList.add('article__section-hide', 'article__section-hide--left');
            hideRight.classList.add('article__section-hide', 'article__section-hide--right');

            item.appendChild(hideLeft);
            item.appendChild(hideRight);

            // open
            ScrollTrigger.create({
                trigger: item,
                start: 'top 100%',
                once: true,
                onEnter: function(){
                    gsap.to(hideLeft, { x: '-100%', duration: 1.6, delay: delay, ease: 'power2.out' });
                    gsap.to(hideRight, { x: '100%', duration: 1.6, delay: delay, ease: 'power2.out' });
                }
            })

        }

    })
    

}



// intro, loading
function intro_loading_init(){

    const intro = document.querySelector('.intro-container');
    const loading = document.querySelector('.loading-container');
    const text = intro.querySelector('.intro-text');
    const percent = intro.querySelector('.intro-percent');
    const percentValue = intro.querySelector('.intro-percent-value');
    const isInit = { percentInit: false, textInit: false };

    // mobile 예외
    if ( JT.browser('mobile') ) {
        intro_close_after();
        return;
    };

    // contact 예외
    if( document.body.classList.contains('page-template-news') || document.body.classList.contains('page-template-faqs') || document.body.classList.contains('page-template-inquire') ) {
        intro_close_after();
        return;
    };

    JT.scroll.destroy(true);

    if( true || ( sessionStorage.getItem('jt-intro-session') && sessionStorage.getItem('jt-intro-session') == '1' ) ) {

        // loading
        document.querySelector('.loading-container__logo svg').style.display = 'block';

        if( document.querySelector('.jt-spline') ){ // spline 사용

            let duration = document.body.classList.contains('home') ? 1.4 : 1;

            gsap.to('.loading-container__overlay', { 
                x: '100%', 
                ease: 'power2.inOut', 
                duration: duration,
            });

            // load 완료
            const onLoadCheck = setInterval(() => {
                if(onLoad){
                    gsap.to('.loading-container', {y: '100%', duration: 1, ease: 'power2.inOut', onComplete: () => {
                        loading.remove();
                        intro_close_after();
                    }});
                    clearInterval(onLoadCheck);
                }
            }, 50);

        } else { // spline 미사용

            gsap.to('.loading-container__overlay', { 
                x: '100%', 
                ease: 'power2.inOut', 
                duration: 0.4,
                onComplete: ()=>{
                    gsap.to('.loading-container', {y: '100%', duration: 1, delay: 0.3, ease: 'power2.inOut', onComplete: () => {
                        loading.remove();
                        intro_close_after();
                    }});
                }
            });

        }

    } else {

        // intro
        intro.style.display = 'block';
        loading.style.display = 'none';
        
        gsap.to(text, { 
            opacity: 1, 
            duration: 1,
            onComplete: function() {
                isInit.textInit = true;
                intro_close();
            }
        });

        // progress motion
        let maxPercent = 100;
        let currPercent = 0;
        let progressTimer = null;

        function increaseProgress(currPercent){
            percent.style.setProperty('--value', currPercent);
            percentValue.textContent = `${currPercent}%`;

            if (currPercent === maxPercent) {
                isInit.percentInit = true;
                progressTimer = null;
                intro_close();
                return;
            }

            const delay = 50 * (1 - (maxPercent - currPercent) / maxPercent);
            clearTimeout(progressTimer);

            progressTimer = setTimeout(() => increaseProgress(currPercent + 1), delay);
        };

        progressTimer = setTimeout(() => increaseProgress(currPercent + 1), 50);

        // close
        function intro_close() {

            if (!(isInit.percentInit && isInit.textInit)) return ;
            
            const onIntroCheck = setInterval(() => {
                if(onLoad){
                    gsap.to(text, {y: '-110%', duration: 0.4, ease: 'power2.inOut'});
                    gsap.to(percent, {y: '-110%', duration: 0.4, ease: 'power2.inOut', delay: .2});
                    gsap.to(intro, {
                        y: '-100%', 
                        ease: 'power2.inOut',
                        delay: .8, 
                        onComplete: function() {
                            intro_close_after();
                            sessionStorage.setItem('jt-intro-session', '1');
                        }
                    });
    
                    clearInterval(onIntroCheck);
                }
            }, 50);
        };

    }

    function intro_close_after(){

        loading.remove();
        intro.remove();

        JT.scroll.restore(true);
        global_text_motion();

        // business
        if( document.body.classList.contains('parent-pageid-13') ) {
            title_motion();
            video_motion();
        };

    }
}



})();