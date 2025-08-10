/*
 * File    : jt-strap.js
 * Author  : STUDIO-JT
 *
 * SUMMARY :
 * JT FUNCTIONS INIT
 * ON LOAD
 * ON RESIZE
 * JT FUNCTIONS
 * HELPERS
 */



(function(){



/* **************************************** *
 * JT FUNCTIONS INIT
 * **************************************** */
// INPUT
JT.ui.add( select_init, true );
JT.ui.add( custom_input_email, true );
JT.ui.add( input_validation, true );

// LAZYLOAD
JT.ui.add( lazyload_init, true );

// LOADMORE
JT.ui.add( loadmore, true );

// VIDEO
JT.ui.add( vimeo_play, true );
JT.ui.add( youtube_play, true );

// SINGLE
JT.ui.add( blocks_spacer, true );

JT.ui.add( jt_accordion, true );



/* **************************************** *
 * ON LOAD
 * **************************************** */
window.addEventListener('load', function(){

    // add

});



/* **************************************** *
 * ON RESIZE
 * **************************************** */
// INITIALIZE RESIZE
function handleResize(){

    // setTimeout to fix IOS animation on rotate issue
    setTimeout(function(){

        JT.ui.call( 'blocks_spacer' );

    }, 100);

}

// Init resize on reisize
if( JT.browser('mobile') ) {
    window.addEventListener('orientationchange', handleResize);
} else {
    window.addEventListener('resize', handleResize);
}



/* **************************************** *
 * JT FUNCTIONS
 * **************************************** */
/**
 * select 커스텀 스타일을 설정합니다.
 *
 * @version 1.0.0
 * @author STUDIO-JT (KMS)
 * @see {@link https://github.com/Choices-js/Choices|Choices API}
 * @requires choices.min.js
 * @requires choices.min.css
 * @requires jt-strap.css
 * @requires rwd-strap.css
 *
 * @example
 * <div class="jt-choices__wrap">
 *     <select class="jt-choices">
 *         <option value="op1">OP1</option>
 *         <option value="op2">OP2</option>
 *         <option value="op3">OP3</option>
 *     </select>
 * </div>
 */
function select_init() {

    if( !JT.browser('mobile') ) {

        document.querySelectorAll('.jt-choices').forEach((select) => {

            new Choices(select, {
                searchEnabled  : false,
                itemSelectText : '',
                shouldSort     : false
            });

        });

    }

}



/**
 * Email타입 Input의 자동완성 기능을 설정합니다.
 *
 * @version 1.0.0
 * @author STUDIO-JT (KMS)
 * @requires jt-autocomplete.js
 * @requires jt-strap.css
 * @requires rwd-strap.css
 *
 * @example
 * <input id="email" type="email" placeholder="이메일을 입력하세요." />
 */
function custom_input_email(){

    document.querySelectorAll('input[type="email"]').forEach((input) => {

        new JtAutocomplete(input);

    });

}



/**
 * Input validation
 *
 * @version 1.0.0
 * @author STUDIO-JT (KMS)
 * @requires jt.js
 */
function input_validation(){

    if( !document.getElementsByClassName('jt-form').length ) return;

    // 필수입력 메세지
    const requiredMsg = ( document.documentElement.lang == 'ko-KR' ) ? '필수입력 항목입니다.' : 'Required field.';
    const successTitle = ( document.documentElement.lang == 'ko-KR' ) ? '문의가 접수되었습니다.' : 'Your inquiry has been received.';
    const successMsg = ( document.documentElement.lang == 'ko-KR' ) ? '문의하신 내용이 정상적으로 접수되었습니다. <br />담당자 확인 후 신속히 답변드리겠습니다.' : 'Your inquiry has been received successfully. <br />We will promptly respond after checking with the person in charge.';
    const successBtn = ( document.documentElement.lang == 'ko-KR' ) ? '확인' : 'OK';

    // Submit 중복클릭 방지를 위한 loading 변수
    let isLoading = false;

    // Validation on typing
    document.querySelectorAll('.jt-form__field--valid').forEach((element) => { // Default input fields
        element.addEventListener('input', function(){
            if( element.name == 'name' || element.name == 'content' ) {
                if( element.value.replace(/\s+/g, '').length < 1 ) {
                    element.closest('.jt-form__data').classList.add('jt-form__data--error');
                    element.closest('.jt-form__data').querySelector('.jt-form__valid').textContent = requiredMsg;
                } else {
                    JT.validation( element );
                }
            } else {
                JT.validation( element );
            }
        });
    });

    document.getElementById('inquire-email').closest('.jt-form__data').addEventListener('click', function(e){ // JT autocomplete email
        if( e.target.tagName == 'LI' ) {
            JT.validation( document.getElementById('inquire-email') );
        }
    });

    // Validation on submit
    document.querySelector('.jt-form').addEventListener('submit', async function(e){

        // Check loading
        if( isLoading ) {
            e.preventDefault();
            return;
        }
        isLoading = true;

        const form = this;
        let isError = false;

        // Input
        form.querySelectorAll('.jt-form__field--valid').forEach((el) => {
            if( el.name == 'name' || el.name == 'content' ) {
                if( el.value.replace(/\s+/g, '').length < 1 ) {
                    el.closest('.jt-form__data').classList.add('jt-form__data--error');
                    el.closest('.jt-form__data').querySelector('.jt-form__valid').textContent = requiredMsg;
                    
                    isError = true;
                } else {
                    if( !JT.validation( el ) ) isError = true;
                }
            } else {
                if( !JT.validation( el ) ) isError = true;
            }
        });

        // Agree
        const agree      = form.querySelector('.jt-agreement__choice');
        const agreeInput = agree.querySelector('input[type=checkbox]:checked');
        const agreeValid = agree.querySelector('.jt-form__valid');

        if( !!!agreeInput || agreeInput.value == 'N' ) {
            agreeValid.textContent = document.body.classList.contains('lang-ko') ? '개인정보 수집 및 이용에 대한 동의를 해주세요.' : 'Please agree to the privacy policy.';
            agree.classList.add('jt-form__data--error');

            isError = true;
        } else {
            agreeValid.textContent = '';
            agree.classList.remove('jt-form__data--error');
        }

        // Action
        if( isError ) {

            e.preventDefault();
            e.stopPropagation();

            gsap.to(window, { duration: .6, scrollTo: JT.offset.top('.jt-form__data--error') - ( document.getElementById('header').offsetHeight * 2 ), ease: 'power3.out' });

            // loading update
            isLoading = false;

        } else {

            e.preventDefault();
            e.stopPropagation();

            const formData = new FormData(e.currentTarget);
            const ajaxUrl = e.currentTarget.dataset?.ajax || '/wp-admin/admin-ajax.php';

            const result = await fetch(ajaxUrl, {
                method: 'post',
                body: formData,
            }).then(res => res.json());

            if (result.success) {
                JT.alert({
                    title   : successTitle,
                    message : successMsg,
                    confirm : successBtn,
                    onConfirm : function(){
                        location.reload();
                    }
                })
            } else {
                JT.alert({
                    title   : '문의를 접수하지 못했습니다. 관리자에게 문의해 주세요.',
                    message : result.data.message,
                    confirm : '확인',
                    onConfirm : function(){
                        location.reload();
                    }
                })
            }

            // loading update
            isLoading = false;

            return false;
        }

    });

}



/**
 * Image Lazyload
 *
 * @version 1.0.0
 * @author STUDIO-JT (KMS)
 * @requires jt-unveil.js
 * @description masonry UI의 경우 jt-lazyload 컨테이너에 jt-lazyload--masonry class를 추가로 붙여서 사용하는 것을 권장합니다.
 *
 * @example
 * <figure class="jt-lazyload">
 * 	 <span class="jt-lazyload__color-preview"></span>
 * 	 <img width="120" height="120" data-unveil="some_img_url.jpg" src="blank.gif" alt="" />
 * 	 <noscript><img src="some_img_url.jpg" alt="" /></noscript>
 * </figure>
 */
function lazyload_init(){

    // lazyload
    document.querySelectorAll('[data-unveil]').forEach(( image ) => {
        new JtLazyload( image, 300, function(){
            image.addEventListener('load', function(){
                if( image.closest('.jt-lazyload') != null ) {
                    image.closest('.jt-lazyload').classList.add('jt-lazyload--loaded');
                } else {
                    image.classList.add('jt-lazyload--loaded');
                }
            });
        });
    });

}



/**
 * Ajax loadmore function
 *
 * @version 1.0.0
 * @author STUDIO-JT (NICO)
 */
function loadmore(){

    if( !!!document.getElementById('jt-loadmore') ) return;

    let isLoading = false;

    document.querySelector('#jt-loadmore a').addEventListener('click', function(e){

        e.preventDefault();

        if( isLoading ) return;
        isLoading = true;

        const _this        = this;
        const loadmoreBtn  = _this.parentNode;
        const listSelector = _this.getAttribute('data-loadmore-list');
        const list         = document.querySelector(listSelector);
        const url          = _this.getAttribute('href');

        loadmoreBtn.classList.add('jt-loadmore--loading');

        fetch(url).then(( response ) => {
            return response.text();
        })
        .then(( html ) => {

            // DOM parser
            const parser = new DOMParser();
            const response = parser.parseFromString(html, 'text/html');

            // Get data
            let nextUrl = ( !!response.getElementById('jt-loadmore') ) ? response.querySelector('#jt-loadmore a').getAttribute('href') : undefined;
            let moreItems = null;

            if( response.getElementsByClassName('jt-accordion').length > 0 ) { // Accordion

                moreItems = response.querySelectorAll('.jt-accordion__item');

                gsap.set( moreItems, { autoAlpha: 0, scale: 0.9 } );
                moreItems.forEach( (item) => { list.appendChild( item ) });
                gsap.to( moreItems, { autoAlpha: 1, scale: 1, duration: .3, stagger: .1 } );

            } else if (response.getElementsByClassName('jt-news-list').length > 0 ){

                moreItems = response.querySelectorAll('.jt-news-list__item');

                gsap.set( moreItems, { autoAlpha: 0 } );
                moreItems.forEach( (item) => { list.appendChild( item ) });
                gsap.to( moreItems, { autoAlpha: 1, duration: .3, stagger: .1 } );
                lazyload_init();
                JT.ui.call( 'news_list_hover' );

            }

            // Update URL
            /*
            if ('history' in window && 'pushState' in history) {
                window.history.pushState(null, null, url);
            }
            */

            // Refresh scrolltrigger offset
            if( typeof ScrollTrigger != 'undefined' ) {
                ScrollTrigger.refresh();
            }

            // Remove loading class after some delay to avoid
            setTimeout(function(){
                loadmoreBtn.classList.remove('jt-loadmore--loading');
            },300);

            if(nextUrl !== undefined){
                // Update url
                _this.setAttribute('href', nextUrl);

                // Update flag
                isLoading = false;
            } else {
                _this.remove();
                return;
            }

        })
        .catch(( error ) => {
            console.error(error);
        });

    });

}



/**
 * Vimeo custom play
 *
 * @version 1.0.0
 * @author STUDIO-JT (KMS, NICO)
 * @see {@link https://developer.vimeo.com/|API}
 * @requires https://player.vimeo.com/api/player.js
 */
function vimeo_play(){

    if( !document.getElementsByClassName('jt-embed-video--vimeo').length ) return;

    // play if click on the poster
    document.querySelectorAll('.jt-embed-video--vimeo .jt-embed-video__poster').forEach((element) => {
        const poster = element;
		const parent = poster.closest('.jt-embed-video__inner');
		const iframe = parent.querySelector('iframe');

        poster.addEventListener('click', function(e){
            e.preventDefault();

            JT.globals.jt_vimeo_ready(function(){
				const video = new Vimeo.Player(iframe);
				gsap.set(iframe, { autoAlpha: 1 });
				gsap.to(poster, { autoAlpha: 0, duration: .6, onStart: function () { video.play(); } });
            });
        });
    });

}



/**
 * Youtube custom play
 *
 * @version 1.0.0
 * @author STUDIO-JT (NICO)
 * @see {@link https://developers.google.com/youtube/iframe_api_reference}
 */
function youtube_play(){

    if( !document.getElementsByClassName('jt-embed-video--youtube').length ) return;

	const tag = document.createElement('script');
	tag.src = 'https://www.youtube.com/iframe_api';

	const firstScriptTag = document.getElementsByTagName('script')[0];
	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

	// if youtube api ready do your stuff
	window.onYouTubeIframeAPIReady = function() {

		// play if click on the poster
        document.querySelectorAll('.jt-embed-video--youtube .jt-embed-video__poster').forEach((element) => {

			const poster = element;
			const parent = poster.closest('.jt-embed-video__inner');
			const iframe = parent.querySelector('iframe');
			const iframeId = iframe.getAttribute('id');

			new YT.Player(iframeId,{
				events: {
					'onReady': function(event){
						poster.addEventListener('click', function(e){
                            e.preventDefault();

							event.target.playVideo();
                            gsap.to(poster, { autoAlpha: 0, duration: .6, onComplete: function () { poster.remove(); } });
						});
					}
				}
			});

		});

	}

}



/**
 * Video lazyload + inview autoplay
 *
 * @version 1.0.0
 * @author STUDIO-JT (KMS)
 * @requires gsap.min.js
 * @requires ScrollTrigger.min.js
 * @see {@link https://greensock.com/docs/|GreenSock Docs}
 */
function autoplay_inview(){

    const targets = document.querySelectorAll('.jt-autoplay-inview');

    targets.forEach( ( target ) => {

        ScrollTrigger.create({
            trigger: target,
            start: 'top 200%',
            once: true,
            onEnter: function() {
                const video = target.querySelector('.jt-background-video__vod');
                const poster = target.querySelector('.jt-background-video__poster');

                video.innerHTML = '<video playsinline loop muted preload><source src="' + video.getAttribute('data-video') + '" type="video/mp4"></video>';

                const vid = video.querySelector('video');

                if( vid ) {
                    vid.load();
                    vid.oncanplaythrough = function(){
                        gsap.to(poster, { duration: 0.2, autoAlpha: 0, onComplete: function () { poster.style.display = 'none'; } });
                        vid.play();
                        target.classList.add('jt-autoplay--loaded');
                    }

                    // Autoplay trigger
                    const observer = new IntersectionObserver(function( entries ){

                        entries.forEach(function( entry ){
                            if( entry.isIntersecting ){
                                if( vid.readyState === 4 && vid.paused && target.classList.contains('jt-autoplay--loaded') ) {
                                    target.classList.remove('jt-autoplay-inview--paused');
                                    target.classList.add('jt-autoplay-inview--play');
                                    vid.play();
                                }
                            } else {
                                if( vid.readyState === 4 && !vid.paused && target.classList.contains('jt-autoplay--loaded') ) {
                                    target.classList.remove('jt-autoplay-inview--play');
                                    target.classList.add('jt-autoplay-inview--paused');
                                    vid.pause();
                                }
                            }
                        });

                    });

                    observer.observe( target );
                }
            }
        });

    });

}



/**
 * Gutenberg editor spacer block converter
 *
 * @version 1.0.0
 * @author STUDIO-JT (KMS)
 */
function blocks_spacer(){

    document.querySelectorAll('.wp-block-spacer').forEach((space) => {

        if( space.getAttribute('data-space') == null ) {
            space.setAttribute('data-space', space.style.height);
        }

        const heightOrigin = space.getAttribute('data-space');
        let heightConvert = heightOrigin.replace('px','');

        if( JT.isScreen(860) ){
            heightConvert = heightConvert/2;
        }

        space.style.height = `${heightConvert}rem`;

    });

}



/**
 * JT ACCORDION
 *
 * @version 2.0.0
 * @since 2023-04-06
 * @author STUDIO-JT (KMS, NICO)
 *
 * @example
 * Markup sample
 * <ul class="jt-accordion">
 *     <li class="jt-accordion__item">
 *         <div class="jt-accordion__head">
 *             <h2 class="jt-accordion__title">제목</h2>
 *             <div class="jt-accordion__control"><span class="sr-only">아코디언 토글</span></div>
 *         </div><!-- .jt-accordion__head -->
 *         <div class="jt-accordion__content">
 *             <div class="jt-accordion__content-inner">
 *                 ...
 *             </div><!-- .jt-accordion__content_inner -->
 *         </div><!-- .jt-accordion__content -->
 *     </li><!-- .jt-accordion__item -->
 *     .....
 * </ul>
 */
function jt_accordion() {

    const container = document.querySelector('.jt-accordion');

    if( !!!container ){ return; }

	// 첫 게시물에 active 클래스 추가
    // container.querySelector('.jt-accordion__item').classList.add('jt-accordion--active');

	// Toggle the accordion
	// Delegate click event to keep alive after adding content via ajax
    container.addEventListener('click', function(e){

        if( !!e.target.closest('.jt-accordion__head') ) {

            const item = e.target.closest('.jt-accordion__item');

            if( item.classList.contains('jt-accordion--loading') ) return;
            item.classList.add('jt-accordion--loading');

            item.classList.toggle('jt-accordion--active');
            JT.slide.toggle( item.querySelector('.jt-accordion__content-inner'), 500, function(){
                item.classList.remove('jt-accordion--loading');
                item.removeAttribute('style');
            });

        }

        return false;

    });

}



/* **************************************** *
 * HELPERS
 * **************************************** */
/**
 * Vimeo script on demand
 *
 * @version 1.0.0
 * @author STUDIO-JT (KMS)
 */
JT.globals.jt_vimeo_ready = function( callback ){

	if( typeof callback != 'function' ) return;

	if( typeof Vimeo == 'undefined' ){

        const prior = document.getElementsByTagName('script')[0];

        let script = document.createElement('script');
        script.async = 1;

        script.onload = script.onreadystatechange = function( _, isAbort ) {
            if( isAbort || !script.readyState || /loaded|complete/.test(script.readyState) ) {
                script.onload = script.onreadystatechange = null;
                script = undefined;

                if( !isAbort ) return callback();
            }
        };

        script.src = 'https://player.vimeo.com/api/player.js';
        prior.parentNode.insertBefore(script, prior);

	} else {

		return callback();

	}

}



})();
