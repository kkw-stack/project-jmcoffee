<?php
/**
 * Template Name: 브랜드
 */

defined('ABSPATH') || die(http_response_code(404));
?>

<?php get_header(); ?>

<?php if(have_posts()) : ?>
	<?php while( have_posts()) : the_post(); ?>
        <?php
		$brand_data = get_field( 'brand', 'options' );
		?>
        <div class="article brand">
			<div class="article__header article__header--visual">
                <div class="article__bg">
                    <div class="article__bg--3d">
                        <div class="article__bg--3d-pc">
							<div class="jt-spline">
                                <canvas id="jt-spline-visual" data-url="https://prod.spline.design/iX-KieJ72VxYtx5x/scene.splinecode"></canvas>
							</div><!-- .jt-spline -->
						</div><!-- .article__bg--3d-pc -->

                        <div class="article__bg--3d-mo">
                            <div class="article__bg--3d-mo-large">
                                <video autoplay muted playsinline loop 
                                    poster="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/business/brand-poster-l.jpg" 
                                    src="https://player.vimeo.com/progressive_redirect/playback/994950762/rendition/1080p/file.mp4?loc=external&signature=6288b90f554619c336c728a14a0a7ef04fc6d94ce1fc68faa6065e6f694ed0b0"></video>
							</div><!-- .article__bg--3d-mo-large -->

							<div class="article__bg--3d-mo-small">
                                <video autoplay muted playsinline loop 
                                    poster="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/business/brand-poster-s.jpg" 
                                    src="https://player.vimeo.com/progressive_redirect/playback/994920259/rendition/1080p/file.mp4?loc=external&signature=a077db3ed6de6b1aced578140ae8f82c2110c023555fb2ee3e7fac8e1c14eb12"></video>
							</div><!-- .article__bg--3d-mo-small -->
						</div><!-- .article__bg--3d-mo -->
                    </div><!-- .article__bg--3d -->
                        
                    <div class="article__bg--dark" data-motion-offset="top bottom" data-motion-duration=".6"></div>
                </div><!-- .article__bg -->

				<div class="article__visual-content">
                    <div class="article__visual-content-inner">
					    <h1 class="article__visual-title jt-typo--en jt-typo-en--01 jt-motion--split"><?php _e( 'Brand', 'jt' ); ?></h1>
					    <p class="article__visual-desc jt-typo--05 jt-motion--split" data-motion-duration="0.7" data-motion-delay="0.1"><?php _e( '체계적으로, 더 멀리 있는 곳까지', 'jt' ); ?></p>
                    </div><!-- .article__visual-content-inner -->
                    
                    <div class="article__visual-scroll-down">
                        <span class="jt-typo--en jt-typo-en--09">Scroll</span>
                        <i class="jt-icon"><?php jt_icon('jt-chevron-bottom-smaller-1px-square'); ?></i>
                    </div><!-- .article__visual-scroll-down -->
                </div><!-- .article__visual-content -->
			</div><!-- .article__visual -->

			<div class="article__body">
                <div class="brand-inner">
                    <div class="brand-jm">
                        <div class="article__section-title">
                            <div class="wrap">
                                <h2 class="jt-typo--en jt-typo-en--02 jt-motion--title"><?php _e( 'JMCOFFEE ROASTERS', 'jt' ); ?></h2>
                                <p class="jt-typo--06 jt-motion--title">
                                    <?php _e( '제이엠의 노하우와 헤리티지가 담긴 공간으로써, 다양한 원두 라인업으로 새로운 커피를 경험하고 <br />로스팅과 추출 과정을 직접 확인할 수 있는 복합 커피 공간입니다.', 'jt' ); ?>
                                </p>

                                <div class="article__section-title-btn jt-motion--title-btn">
                                    <a href="https://www.jmcoffeemall.com/" class="jt-btn__basic" target="_blank" rel="noopener noreferrer">
                                        <span><?php _e( 'Go to JMmall', 'jt' ); ?></span>
                                        <i class="jt-icon"><?php jt_svg('/images/icon/jt-icon/jt-outlink.svg'); ?></i>
                                    </a><!-- .jt-btn__basic -->
                                </div><!-- .article__section-title-btn -->
                            </div><!-- .wrap -->
                        </div><!-- .article__section-title -->

                        <div class="brand-jm__contents jt-motion--open" data-motion-delay="0.3">
                            <div class="article__auto-slider swiper">
                                <div class="swiper-wrapper">
                                    <?php foreach ($brand_data['jmcoffee_image'] as $data) : ?>
                                        <div class="article__auto-slider-item swiper-slide article__auto-slider-item--first">
                                            <div 
                                                class="article__auto-slider-item-figure swiper-lazy" 
                                                data-background="<?php echo (wp_is_mobile()) ? jt_get_image_src($data['mobile'], 'jt_thumbnail_780x1000') : jt_get_image_src($data['pc'], 'jt_thumbnail_1903x954');?>">
                                            </div>
                                        </div><!-- .article__auto-slider-item -->
                                    <?php endforeach; ?>
                                </div><!-- .swiper-wrapper -->

                                <div class="swiper-navigation">
                                    <div class="swiper-button swiper-button-prev">
                                        <i class="jt-icon"><?php jt_icon('jt-chevron-left-tiny-3px-square'); ?></i>
                                        <span class="sr-only"><?php _e( '이전', 'jt' ); ?></span>
                                    </div><!-- .swiper-button-prev -->

                                    <div class="swiper-pagination"></div>

                                    <div class="swiper-button swiper-button-next">
                                        <i class="jt-icon"><?php jt_icon('jt-chevron-right-tiny-3px-square'); ?></i>
                                        <span class="sr-only"><?php _e( '다음', 'jt' ); ?></span>
                                    </div><!-- .swiper-button-next -->
                                </div><!-- .swiper_navigation -->

                                <div class="swiper-control">
                                    <div class="swiper-state swiper-state--play">
                                        <button class="swiper-state__btn swiper-state__btn--play">
                                            <span class="jt-typo--en jt-typo-en--09"><?php _e( 'Pause', 'jt' ); ?></span>
                                            <i class="jt-icon"><?php jt_icon('jt-pause'); ?></i>
                                        </button><!-- .swiper-state__btn -->

                                        <button class="swiper-state__btn swiper-state__btn--pause">
                                            <span class="jt-typo--en jt-typo-en--09"><?php _e( 'Play', 'jt' ); ?></span>
                                            <i class="jt-icon"><?php jt_icon('jt-play'); ?></i>
                                        </button><!-- .swiper-state__btn -->
                                    </div><!-- .swiper-state -->
                                </div><!-- .swiper-control -->
                            </div><!-- .article__auto-slider -->
                        </div><!-- .brand-jm__contents -->
                    </div><!-- .brand-jm -->

                    <div class="brand-compose">
                        <div class="article__section-title">
                            <div class="wrap">
                                <h2 class="jt-typo--en jt-typo-en--02 jt-motion--title"><?php _e( 'COMPOSE COFFEE', 'jt' ); ?></h2>
                                <p class="jt-typo--06 jt-motion--title">
                                    <?php _e( '검증된 파트너사와의 협업으로 양질의 B2B시장을 개척하고 지속적인 협력과 <br />트렌드에 맞춘 상품 출시로 고객, 점주, 파트너사 모두 상생하는 국민브랜드입니다.', 'jt' ); ?>
                                </p>

                                <div class="article__section-title-btn jt-motion--title-btn">
                                    <a href="https://composecoffee.com/" class="jt-btn__basic" target="_blank" rel="noopener noreferrer">
                                        <span><?php _e( 'Go to site', 'jt' ); ?></span>
                                        <i class="jt-icon"><?php jt_svg('/images/icon/jt-icon/jt-outlink.svg'); ?></i>
                                    </a><!-- .jt-btn__basic -->
                                </div><!-- .article__section-title-btn -->
                            </div><!-- .wrap -->
                        </div><!-- .article__section-title -->

                        <div class="brand-compose__contents jt-motion--open" data-motion-delay="0.3">
                            <div class="article__auto-slider swiper">
                                <div class="swiper-wrapper">
                                    <?php foreach ($brand_data['compose_image'] as $data) : ?>
                                        <div class="article__auto-slider-item swiper-slide">
                                            <div 
                                                class="article__auto-slider-item-figure swiper-lazy" 
                                                data-background="<?php echo (wp_is_mobile()) ? jt_get_image_src($data['mobile'], 'jt_thumbnail_780x1000') : jt_get_image_src($data['pc'], 'jt_thumbnail_1903x954');?>">
                                            </div>
                                        </div><!-- .article__auto-slider-item -->
                                    <?php endforeach; ?>
                                </div><!-- .swiper-wrapper -->

                                <div class="swiper-navigation">
                                    <div class="swiper-button swiper-button-prev">
                                        <i class="jt-icon"><?php jt_icon('jt-chevron-left-tiny-3px-square'); ?></i>
                                        <span class="sr-only"><?php _e( '이전', 'jt' ); ?></span>
                                    </div><!-- .swiper-button-prev -->

                                    <div class="swiper-pagination"></div>

                                    <div class="swiper-button swiper-button-next">
                                        <i class="jt-icon"><?php jt_icon('jt-chevron-right-tiny-3px-square'); ?></i>
                                        <span class="sr-only"><?php _e( '다음', 'jt' ); ?></span>
                                    </div><!-- .swiper-button-next -->
                                </div><!-- .swiper_navigation -->

                                <div class="swiper-control">
                                    <div class="swiper-state swiper-state--play">
                                        <button class="swiper-state__btn swiper-state__btn--play">
                                            <span class="jt-typo--en jt-typo-en--09"><?php _e( 'Pause', 'jt' ); ?></span>
                                            <i class="jt-icon"><?php jt_icon('jt-pause'); ?></i>
                                        </button><!-- .swiper-state__btn -->

                                        <button class="swiper-state__btn swiper-state__btn--pause">
                                            <span class="jt-typo--en jt-typo-en--09"><?php _e( 'Play', 'jt' ); ?></span>
                                            <i class="jt-icon"><?php jt_icon('jt-play'); ?></i>
                                        </button><!-- .swiper-state__btn -->
                                    </div><!-- .swiper-state -->
                                </div><!-- .swiper-control -->
                            </div><!-- .article__auto-slider -->
                        </div><!-- .brand-compose__contents -->
                    </div><!-- .brand-compose -->
                </div><!-- .brand-inner -->
			</div><!-- .article__body -->
		</div><!-- .article -->
        
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>