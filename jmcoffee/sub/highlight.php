<?php
/**
 * Template Name: HIGHLIGHT
 */

defined('ABSPATH') || die(http_response_code(404));
?>

<?php get_header(); ?>

<?php if(have_posts()) : ?>
	<?php while( have_posts()) : the_post(); ?>

        <div class="article">
			<h1 class="sr-only"><?php echo get_the_title(); ?></h1>

			<div class="article__body">
				
				<div class="highlight-artinus">
					<div class="wrap-wide">
						<h2 class="highlight-section__title jt-typo--en jt-typo-en--02 jt-motion--split"><?php _e( 'ARTINUS', 'jt' ); ?></h2>

						<div class="highlight-artinus__slideshow jt-motion--up" data-motion-y="0" data-motion-delay="0.4" data-motion-duration="0.6">
							<div class="highlight-slider swiper">
								<div class="swiper-wrapper custom-hover">
									<div class="highlight-slider__item swiper-slide">
                                        <figure class="highlight-slider__img jt-lazyload">
                                            <img width="892" height="520" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-coffee-machine.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="">
                                            <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-coffee-machine.png" alt="" /></noscript>
                                        </figure><!-- .jt-lazyload -->
									</div><!-- .highlight-slider__item -->
                                    
									<div class="highlight-slider__item swiper-slide">
                                        <figure class="highlight-slider__img jt-lazyload">
                                            <img width="892" height="520" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-portafilter.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="">
                                            <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-portafilter.png" alt="" /></noscript>
                                        </figure><!-- .jt-lazyload -->
									</div><!-- .highlight-slider__item -->

                                    <div class="highlight-slider__item swiper-slide">
                                        <figure class="highlight-slider__img jt-lazyload">
                                            <img width="892" height="520" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-teming.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="">
                                            <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-teming.png" alt="" /></noscript>
                                        </figure><!-- .jt-lazyload -->
                                    </div><!-- .highlight-slider__item -->

                                    <div class="highlight-slider__item swiper-slide">
                                        <figure class="highlight-slider__img jt-lazyload">
                                            <img width="892" height="520" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-water-heater.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="">
                                            <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-water-heater.png" alt="" /></noscript>
                                        </figure><!-- .jt-lazyload -->
                                    </div><!-- .highlight-slider__item -->
                                    
                                    <div class="highlight-slider__item swiper-slide">
                                        <figure class="highlight-slider__img jt-lazyload">
                                            <img width="892" height="520" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-scale.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="">
                                            <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-scale.png" alt="" /></noscript>
                                        </figure><!-- .jt-lazyload -->
                                    </div><!-- .highlight-slider__item -->
								</div><!-- .swiper-wrapper -->
								
                                <a class="highlight-slider__link" href="<?php the_permalink(27); ?>"><span class="sr-only"><?php _e( 'VIEW MORE', 'jt' ); ?></span></a>

								<div class="swiper-navigation">
									<div class="swiper-button swiper-button-prev">
										<div class="jt-icon"><?php jt_svg( '/images/icon/jt-arrow-left.svg' ); ?></div>
										<span class="sr-only"><?php _e( 'PREV', 'jt' ); ?></span>
									</div><!-- .swiper-button-prev -->
									
									<div class="swiper-button swiper-button-next">
										<div class="jt-icon"><?php jt_svg( '/images/icon/jt-arrow-right.svg' ); ?></div>
										<span class="sr-only"><?php _e( 'NEXT', 'jt' ); ?></span>
									</div><!-- .swiper-button-next -->
								</div><!-- .swiper_navigation -->

                                <div class="swiper-pagination"></div>
							</div><!-- .highlight-slider -->
						</div><!-- .highlight-artinus__slideshow -->
						
                        <a class="highlight-section__more jt-btn__underline jt-motion--up" href="<?php the_permalink(27); ?>" data-motion-y="0" data-motion-delay="0.7" data-motion-duration="0.6" data-motion-offset="top bottom">
                            <span><?php _e('Go to List', 'jt'); ?></span>
                        </a><!-- .highlight-section__more -->
					</div><!-- .wrap-wide -->
				</div><!-- .highlight-artinus -->
				
				<div class="highlight-beans">
					<div class="wrap-middle">
						<h2 class="highlight-section__title jt-typo--en jt-typo-en--02 jt-motion--split" data-motion-delay="0.1" data-motion-duration="0.7" data-motion-offset="top bottom"><?php _e( 'COFFEE BEANS', 'jt' ); ?></h2>

						<div class="highlight-beans__slideshow jt-motion--up" data-motion-y="0" data-motion-delay="0.4" data-motion-offset="top bottom">
							<div class="highlight-slider swiper">
								<div class="swiper-wrapper custom-hover">
									<div class="highlight-slider__item swiper-slide">
                                        <figure class="highlight-slider__img jt-lazyload">
                                            <img width="520" height="520" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-coffee-beans-01.png?v1.1" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="">
                                            <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-coffee-beans-01.png?v1.1" alt="" /></noscript>
                                        </figure><!-- .jt-lazyload -->
									</div><!-- .highlight-slider__item -->

									<div class="highlight-slider__item swiper-slide">
                                        <figure class="highlight-slider__img jt-lazyload">
                                            <img width="520" height="520" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-coffee-beans-02.png?v1.1" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="">
                                            <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-coffee-beans-02.png?v1.1" alt="" /></noscript>
                                        </figure><!-- .jt-lazyload -->
									</div><!-- .highlight-slider__item -->

									<div class="highlight-slider__item swiper-slide">
                                        <figure class="highlight-slider__img jt-lazyload">
                                            <img width="520" height="520" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-coffee-beans-03.png?v1.1" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="">
                                            <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-coffee-beans-03.png?v1.1" alt="" /></noscript>
                                        </figure><!-- .jt-lazyload -->
									</div><!-- .highlight-slider__item -->

									<div class="highlight-slider__item swiper-slide">
                                        <figure class="highlight-slider__img jt-lazyload">
                                            <img width="520" height="520" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-coffee-beans-04.png?v1.1" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="">
                                            <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-coffee-beans-04.png?v1.1" alt="" /></noscript>
                                        </figure><!-- .jt-lazyload -->
									</div><!-- .highlight-slider__item -->

									<div class="highlight-slider__item swiper-slide">
                                        <figure class="highlight-slider__img jt-lazyload">
                                            <img width="520" height="520" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-coffee-beans-05.png?v1.1" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="">
                                            <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-coffee-beans-05.png?v1.1" alt="" /></noscript>
                                        </figure><!-- .jt-lazyload -->
									</div><!-- .highlight-slider__item -->

									<div class="highlight-slider__item swiper-slide">
                                        <figure class="highlight-slider__img jt-lazyload">
                                            <img width="520" height="520" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-coffee-beans-06.png?v1.1" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="">
                                            <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-coffee-beans-06.png?v1.1" alt="" /></noscript>
                                        </figure><!-- .jt-lazyload -->
									</div><!-- .highlight-slider__item -->

									<div class="highlight-slider__item swiper-slide">
                                        <figure class="highlight-slider__img jt-lazyload">
                                            <img width="520" height="520" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-coffee-beans-07.png?v1.1" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="">
                                            <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-coffee-beans-07.png?v1.1" alt="" /></noscript>
                                        </figure><!-- .jt-lazyload -->
									</div><!-- .highlight-slider__item -->

									<div class="highlight-slider__item swiper-slide">
                                        <figure class="highlight-slider__img jt-lazyload">
                                            <img width="520" height="520" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-coffee-beans-08.png?v1.1" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="">
                                            <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-coffee-beans-08.png?v1.1" alt="" /></noscript>
                                        </figure><!-- .jt-lazyload -->
									</div><!-- .highlight-slider__item -->

                                    <div class="highlight-slider__item swiper-slide">
                                        <figure class="highlight-slider__img jt-lazyload">
                                            <img width="520" height="520" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-coffee-beans-09.png?v1.1" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="">
                                            <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-coffee-beans-09.png?v1.1" alt="" /></noscript>
                                        </figure><!-- .jt-lazyload -->
									</div><!-- .highlight-slider__item -->
								</div><!-- .swiper-wrapper -->
								
                                <a class="highlight-slider__link" href="<?php the_permalink(65); ?>"><span class="sr-only"><?php _e( 'VIEW MORE', 'jt' ); ?></span></a>

								<div class="swiper-navigation">
									<div class="swiper-button swiper-button-prev">
										<div class="jt-icon"><?php jt_svg( '/images/icon/jt-arrow-left.svg' ); ?></div>
										<span class="sr-only"><?php _e( 'PREV', 'jt' ); ?></span>
									</div><!-- .swiper-button-prev -->
									
									<div class="swiper-button swiper-button-next">
										<div class="jt-icon"><?php jt_svg( '/images/icon/jt-arrow-right.svg' ); ?></div>
										<span class="sr-only"><?php _e( 'NEXT', 'jt' ); ?></span>
									</div><!-- .swiper-button-next -->
								</div><!-- .swiper_navigation -->

                                <div class="swiper-pagination"></div>
							</div><!-- .highlight-slider -->
						</div><!-- .highlight-artinus__slideshow -->
						
                        <a class="highlight-section__more jt-btn__underline jt-motion--up" href="<?php the_permalink(65); ?>" data-motion-y="0"  data-motion-duration="0.6" data-motion-offset="top bottom">
                            <span><?php _e('Go to List', 'jt'); ?></span>
                        </a><!-- .highlight-section__more -->
					</div><!-- .wrap-middle -->
				</div><!-- .highlight-beans -->

				<div class="highlight-business">
					<div class="wrap-wide">
						<ul class="highlight-business__list jt-motion--stagger">
							<li class="jt-motion--stagger-item" data-column="4">
								<a href="<?php the_permalink(21); ?>">
									<figure class="jt-lazyload">
										<img width="240" height="240" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-business-manufacturing.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="">
										<noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-business-manufacturing.png" alt="" /></noscript>
									</figure><!-- .jt-lazyload -->
									<b class="jt-typo--en jt-typo-en--06"><?php _e( 'Manufacturing', 'jt' ); ?><i class="jt-icon"><?php jt_svg( '/images/icon/jt-arrow-right.svg' ); ?></i></b>
									<p class="jt-typo--07"><?php _e('안정적인 생산을 보장하며 차별화된 품질을 <br />보장하기 위해 전자동화 시스템으로 스마트한 플랜트 <br />구현하는 것을 목표로합니다.', 'jt' ); ?></p>
								</a>
							</li><!-- .jt-motion--stagger-item -->

							<li class="jt-motion--stagger-item" data-column="4">
								<a href="<?php the_permalink(23); ?>">
									<figure class="jt-lazyload">
										<img width="240" height="240" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-business-consulting.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="">
										<noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-business-consulting.png" alt="" /></noscript>
									</figure><!-- .jt-lazyload -->
									<b class="jt-typo--en jt-typo-en--06"><?php _e( 'Consulting', 'jt' ); ?><i class="jt-icon"><?php jt_svg( '/images/icon/jt-arrow-right.svg' ); ?></i></b>
									<p class="jt-typo--07"><?php _e('파트너의 목표를 위해 무한한 가능성을 탐구하며 <br />기획부터 완성까지 파트너의 관점에서 완성도 높은 <br />솔루션을 제공합니다.', 'jt' ); ?></p>
								</a>
							</li><!-- .jt-motion--stagger-item -->

							<li class="jt-motion--stagger-item" data-column="4">
								<a href="<?php the_permalink(25); ?>">
									<figure class="jt-lazyload">
										<img width="240" height="240" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-business-brand.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="">
										<noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-business-brand.png" alt="" /></noscript>
									</figure><!-- .jt-lazyload -->
									<b class="jt-typo--en jt-typo-en--06"><?php _e( 'Brand', 'jt' ); ?><i class="jt-icon"><?php jt_svg( '/images/icon/jt-arrow-right.svg' ); ?></i></b>
									<p class="jt-typo--07"><?php _e('검증된 파트너사와 협업해 다양한 스페셜티 <br />커피 경험을 제공하며 모두가 상생하는 B2B 시장을 <br />JMCOFFEE만의 노하우로 개척합니다.', 'jt' ); ?></p>
								</a>
							</li><!-- .jt-motion--stagger-item -->

							<li class="jt-motion--stagger-item" data-column="4">
								<a href="<?php the_permalink(37); ?>">
									<figure class="jt-lazyload">
										<img width="240" height="240" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-business-contact.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="">
										<noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/highlight/highlight-business-contact.png" alt="" /></noscript>
									</figure><!-- .jt-lazyload -->
									<b class="jt-typo--en jt-typo-en--06"><?php _e( 'Contact', 'jt' ); ?><i class="jt-icon"><?php jt_svg( '/images/icon/jt-arrow-right.svg' ); ?></i></b>
									<p class="jt-typo--07"><?php _e('커피 사업에 대해 문의사항을 남겨주세요. <br />다양한 분야의 전문가들이 모든 단계에서 깊이 있고 <br />정확한 정보를 제공해드립니다.', 'jt' ); ?></p>
								</a>
							</li><!-- .jt-motion--stagger-item -->
						</ul><!-- .highlight-business__list -->
					</div><!-- .wrap-wide -->
				</div><!-- .highlight-business -->
			</div><!-- .article__body -->
		</div><!-- .article -->
        
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>