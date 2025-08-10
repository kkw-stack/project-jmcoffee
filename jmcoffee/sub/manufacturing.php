<?php
/**
 * Template Name: 제조
 */

 defined('ABSPATH') || die(http_response_code(404));
?>

<?php get_header(); ?>

<?php if(have_posts()) : ?>
	<?php while( have_posts()) : the_post(); ?>
        <?php
		$making_data = get_field( 'making', 'options' );
		?>
		<div class="article manufacturing">
			<div class="article__header article__header--visual">
                <div class="article__bg">
                    <div class="article__bg--3d">
                        <div class="article__bg--3d-pc">
							<div class="jt-spline">
                                <canvas id="jt-spline-visual" data-url="https://prod.spline.design/UXY0H7qZnKor5zSp/scene.splinecode"></canvas>
							</div><!-- .jt-spline -->
						</div><!-- .article__bg--3d-pc -->

                        <div class="article__bg--3d-mo">
                            <div class="article__bg--3d-mo-large">
								<video autoplay muted playsinline loop 
                                    poster="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/business/manufacturing-poster-l.jpg" 
                                    src="https://player.vimeo.com/progressive_redirect/playback/994950736/rendition/1080p/file.mp4?loc=external&signature=50bfad87877ad305c998437a3742ee4c1e931f07bc4bfd5f033ad484bad59a3e"></video>
							</div><!-- .article__bg--3d-mo-large -->

							<div class="article__bg--3d-mo-small">
								<video autoplay muted playsinline loop 
                                    poster="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/business/manufacturing-poster-s.jpg" 
                                    src="https://player.vimeo.com/progressive_redirect/playback/994920237/rendition/1080p/file.mp4?loc=external&signature=560a91e4cab947b7eb7c41079dada7690b0d4a8d7af4f2b1c5e81f728300a613"></video>
							</div><!-- .article__bg--3d-mo-small -->
						</div><!-- .article__bg--3d-mo -->
                    </div><!-- .article__bg--3d -->
                        
                    <div class="article__bg--dark"></div>
                </div><!-- .article__bg -->
                
				<div class="article__visual-content">
                    <div class="article__visual-content-inner">
					    <h1 class="article__visual-title jt-typo--en jt-typo-en--01 jt-motion--split"><?php _e( 'Manufacturing', 'jt' ); ?></h1>
					    <p class="article__visual-desc jt-typo--05 jt-motion--split"><?php _e( '정교한 기술력으로 완성되는 한 잔', 'jt' ); ?></p>
                    </div><!-- .article__visual-content-inner -->

                    <div class="article__visual-scroll-down">
						<span class="jt-typo--en jt-typo-en--09">Scroll</span>
						<i class="jt-icon"><?php jt_icon('jt-chevron-bottom-smaller-1px-square'); ?></i>
					</div><!-- .article__visual-scroll-down -->
                </div><!-- .article__visual-content -->
			</div><!-- .article__visual -->

			<div class="article__body">
                <div class="manufacturing__intro">
                    <div class="wrap">
                        <div class="manufacturing__intro-inner">
                            <div class="manufacturing__intro-desc">
                                <p class="jt-typo--04 jt-motion--appear"><?php _e( '최첨단 시스템으로 정확성과 안정성을 유지하며, <br />깊이 있는 전문가들의 정밀하고 체계적인 과정을 거쳐 <br />최상의 품질을 만들어냅니다.', 'jt' ); ?></p>
                            </div><!-- .manufacturing__intro-desc -->
                        </div><!-- .manufacturing__intro-inner -->
                    </div><!-- .wrap -->
                </div><!-- .manufacturing__intro -->
                
                <div class="manufacturing__system">
                    <div class="wrap">
                        <div class="manufacturing__system-inner">
                            <div class="manufacturing__system-txt manufacturing__system-txt--primary">
                                <b class="jt-typo--en jt-typo-en--02 jt-motion--appear">Full-automation<br /> system</b>
                                <p class="jt-typo--06 jt-motion--appear"><?php _e( '스마트팩토리는 이탈리아 IMA 그룹 페트로치니 사업부와의 <br />협업을 통해 안정적으로 생산하고 공급망 유지를 위한 로봇인케이싱을 도입하였습니다.', 'jt' ); ?></p>
                            </div>
                            <div class="manufacturing__system-txt manufacturing__system-txt--secondary">
                                <b class="jt-typo--en jt-typo-en--02">R&amp;D</b>
                                <p class="jt-typo--06"><?php _e( 'NEW CROP 입고 시 다양한 등급의 생두를 <br />컵 테스팅 및 선별과정을 통해 출시합니다.', 'jt' ); ?></p>
                            </div>
                        </div><!-- .manufacturing__system-inner -->
                    </div><!-- .wrap -->
                    
                    <div class="manufacturing__system-bg">
                        <i><?php jt_svg( '/images/sub/manufacturing/manufacturing-circle-bg.svg' ); ?></i>
                    </div><!-- .manufacturing__system-bg -->
                </div><!-- .manufacturing__system -->

                <div class="manufacturing__feature">
                    <div class="wrap">
                        <ul class="article__card-list article__card-list--three jt-motion--stagger">
                            <?php foreach ($making_data['content'] as $data) : ?>
                                <li class="article__card-list-item jt-motion--stagger-item" data-column="3">
                                    <div class="article__card-list-item-title"> 
                                        <b class="jt-typo--en jt-typo-en--05"><?php echo $data['title']; ?></b>
                                        <?php if (!empty($data['description'])) : ?>
                                            <?php if ( jt_get_lang() == 'ko' ) : ?>
                                                <p class="jt-typo--07"><?php echo $data['description']; ?></p>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div><!-- .article__card-list-item-title -->
                                    
                                    <div class="article__card-list-item-figure">
                                        <figure class="jt-lazyload">
                                            <span class="jt-lazyload__color-preview"></span>
                                            <img width="449" height="350" data-unveil="<?php echo jt_get_image_src($data['image']['pc'], 'jt_thumbnail_449x350'); ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                                            <noscript><img src="<?php echo jt_get_image_src($data['image']['pc'], 'jt_thumbnail_449x350'); ?>" alt="" /></noscript>
                                        </figure><!-- .jt-lazyload -->
                                    </div><!-- .article__card-list-item-figure -->
                                </li><!-- .article__card-list-item -->
                            <?php endforeach; ?>
                        </ul><!-- .article__card-list -->
                    </div><!-- .wrap -->
                </div><!-- .manufacturing__feature -->

                <div class="manufacturing__process">
                    <div class="article__section-title">
                        <h2 class="jt-typo--en jt-typo-en--02"><?php _e( 'Plant design process', 'jt' ); ?></h2>
                    </div>

                    <div class="manufacturing__process-view">
                        <div class="manufacturing__process-view-inner">
                            <div class="manufacturing__process-view-item">
                                <figure class="jt-lazyload">
                                    <img width="551" height="690" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-process-01.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                                    <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-process-01.png" alt="" /></noscript>
                                </figure>
                                <div class="manufacturing__process-view-label">
                                    <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-01.svg'); ?>
                                </div><!-- .manufacuring__process-view-label -->
                            </div><!-- .manufacturing__process-view-item -->

                            <div class="manufacturing__process-view-item">
                                <figure class="jt-lazyload">
                                    <img width="472" height="690" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-process-02.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                                    <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-process-02.png" alt="" /></noscript>
                                </figure>

                                <div class="manufacturing__process-view-label">
                                    <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-02.svg'); ?>
                                </div><!-- .manufacuring__process-view-label -->
                                
                                <div class="manufacturing__process-view-label">
                                    <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-03.svg'); ?>
                                </div><!-- .manufacuring__process-view-label -->

                                <div class="manufacturing__process-view-label">
                                    <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-04.svg'); ?>
                                </div><!-- .manufacuring__process-view-label -->
                            </div><!-- .manufacturing__process-view-item -->

                            <div class="manufacturing__process-view-item">
                                <figure class="jt-lazyload">
                                    <img width="317" height="690" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-process-03.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                                    <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-process-03.png" alt="" /></noscript>
                                </figure>

                                <div class="manufacturing__process-view-label">
                                    <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-05.svg'); ?>
                                </div><!-- .manufacuring__process-view-label -->

                                <div class="manufacturing__process-view-title-wrap">
                                    <b class="manufacturing__process-view-title jt-typo--en jt-typo-en--06"><?php _e( 'Probat P60', 'jt' ); ?></b>
                                    <p class="manufacturing__process-view-subtitle jt-typo--08"><?php _e( '120kg 열풍식', 'jt' ); ?></p>
                                </div><!-- .manufacturing__process-view-title-wrap -->
                            </div><!-- .manufacturing__process-view-item -->

                            <div class="manufacturing__process-view-item">
                                <figure class="jt-lazyload">
                                    <img width="755" height="690" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-process-04.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                                    <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-process-04.png" alt="" /></noscript>
                                </figure>

                                <div class="manufacturing__process-view-title-wrap">
                                    <b class="manufacturing__process-view-title jt-typo--en jt-typo-en--06"><?php _e( 'Probat Neptune 500', 'jt' ); ?></b>
                                </div><!-- .manufacturing__process-view-title-wrap -->
                            </div><!-- .manufacturing__process-view-item -->

                            <div class="manufacturing__process-view-item">
                                <figure class="jt-lazyload">
                                    <img width="1354" height="690" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-process-05.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                                    <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-process-05.png" alt="" /></noscript>
                                </figure>

                                <div class="manufacturing__process-view-title-wrap">
                                    <b class="manufacturing__process-view-title jt-typo--en jt-typo-en--06"><?php _e( 'IMA TTA 120', 'jt' ); ?></b>
                                </div><!-- .manufacturing__process-view-title-wrap -->
                            </div><!-- .manufacturing__process-view-item -->

                            <div class="manufacturing__process-view-item">
                                <figure class="jt-lazyload">
                                    <img width="636" height="690" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-process-06.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                                    <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-process-06.png" alt="" /></noscript>
                                </figure>

                                <div class="manufacturing__process-view-label">
                                    <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-06.svg'); ?>
                                </div><!-- .manufacuring__process-view-label -->

                                <div class="manufacturing__process-view-title-wrap">
                                    <b class="manufacturing__process-view-title jt-typo--en jt-typo-en--06"><?php _e( 'IMA TTA 240', 'jt' ); ?></b>
                                </div><!-- .manufacturing__process-view-title-wrap -->
                            </div><!-- .manufacturing__process-view-item -->

                            <div class="manufacturing__process-view-item">
                                <figure class="jt-lazyload">
                                    <img width="328" height="690" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-process-07.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                                    <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-process-07.png" alt="" /></noscript>
                                </figure>

                                <div class="manufacturing__process-view-label">
                                    <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-07.svg'); ?>
                                </div><!-- .manufacuring__process-view-label -->
                            </div><!-- .manufacturing__process-view-item -->

                            <div class="manufacturing__process-view-item">
                                <figure class="jt-lazyload">
                                    <img width="1134" height="690" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-process-08.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                                    <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-process-08.png" alt="" /></noscript>
                                </figure>

                                <div class="manufacturing__process-view-label">
                                    <?php if ( jt_get_lang() == 'ko' ) : ?>
                                        <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-08.svg'); ?>
                                    <?php else : ?>
                                        <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-08-en.svg'); ?>
                                    <?php endif; ?>
                                </div><!-- .manufacuring__process-view-label -->

                                <div class="manufacturing__process-view-label">
                                    <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-09.svg'); ?>
                                </div><!-- .manufacuring__process-view-label -->

                                <div class="manufacturing__process-view-label">
                                    <?php if ( jt_get_lang() == 'ko' ) : ?>
                                        <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-10.svg'); ?>
                                    <?php else : ?>
                                        <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-10-en.svg'); ?>
                                    <?php endif; ?>
                                </div><!-- .manufacuring__process-view-label -->

                                <div class="manufacturing__process-view-label">
                                    <?php if ( jt_get_lang() == 'ko' ) : ?>
                                        <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-11.svg'); ?>
                                    <?php else : ?>
                                        <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-11-en.svg'); ?>
                                    <?php endif; ?>
                                </div><!-- .manufacuring__process-view-label -->
                            </div><!-- .manufacturing__process-view-item -->

                            <div class="manufacturing__process-view-item">
                                <figure class="jt-lazyload">
                                    <img width="558" height="690" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-process-09.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                                    <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-process-09.png" alt="" /></noscript>
                                </figure>

                                <div class="manufacturing__process-view-label">
                                    <?php if ( jt_get_lang() == 'ko' ) : ?>
                                        <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-12.svg'); ?>
                                    <?php else : ?>
                                        <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-12-en.svg'); ?>
                                    <?php endif; ?>
                                </div><!-- .manufacuring__process-view-label -->

                                <div class="manufacturing__process-view-title-wrap">
                                    <b class="manufacturing__process-view-title jt-typo--en jt-typo-en--06"><?php _e( 'Packing Machine', 'jt' ); ?></b>
                                    <p class="manufacturing__process-view-subtitle jt-typo--08"><?php _e( 'Italy ICA / IMA TECMAR', 'jt' ); ?></p>
                                </div><!-- .manufacturing__process-view-title-wrap -->
                            </div><!-- .manufacturing__process-view-item -->

                            <div class="manufacturing__process-view-item">
                                <figure class="jt-lazyload">
                                    <img width="1455" height="690" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-process-10.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                                    <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-process-10.png" alt="" /></noscript>
                                </figure>

                                <div class="manufacturing__process-view-label">
                                    <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-13.svg'); ?>
                                </div><!-- .manufacuring__process-view-label -->

                                <div class="manufacturing__process-view-label">
                                    <?php if ( jt_get_lang() == 'ko' ) : ?>
                                        <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-14.svg'); ?>
                                    <?php else : ?>
                                        <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-14-en.svg'); ?>
                                    <?php endif; ?>
                                </div><!-- .manufacuring__process-view-label -->

                                <div class="manufacturing__process-view-label">
                                    <?php if ( jt_get_lang() == 'ko' ) : ?>
                                        <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-15.svg'); ?>
                                    <?php else : ?>
                                        <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-15-en.svg'); ?>
                                    <?php endif; ?>
                                </div><!-- .manufacuring__process-view-label -->

                                <div class="manufacturing__process-view-label">
                                    <?php if ( jt_get_lang() == 'ko' ) : ?>
                                        <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-16.svg'); ?>
                                    <?php else : ?>
                                        <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-16-en.svg'); ?>
                                    <?php endif; ?>
                                </div><!-- .manufacuring__process-view-label -->

                                <div class="manufacturing__process-view-label">
                                    <?php if ( jt_get_lang() == 'ko' ) : ?>
                                        <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-17.svg'); ?>
                                    <?php else : ?>
                                        <?php jt_svg('/images/sub/manufacturing/manufacturing-process-label-17-en.svg'); ?>
                                    <?php endif; ?>
                                </div><!-- .manufacuring__process-view-label -->
                            </div><!-- .manufacturing__process-view-item -->

                            <div class="manufacturing__process-view-item">
                                <figure class="jt-lazyload">
                                    <img width="1990" height="690" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-process-00.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                                    <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-process-00.png" alt="" /></noscript>
                                </figure>
                            </div><!-- .manufacturing__process-view-item -->
                        </div><!-- .manufacturing__process-view-inner -->
                    </div><!-- .manufacturing__process-view -->
                    
                    <div class="manufacturing__process-bar"><i></i></div>
                </div><!-- .manufacturing__process -->

                <div class="manufacturing__icons">
                    <div class="wrap">
                        <ul class="article__icon-list jt-motion--stagger">
                            <li class="article__icon-list-item jt-motion--stagger-item">
                                <div class="article__icon-list-item-figure">
                                    <figure class="jt-lazyload">
                                        <img width="120" height="120" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-icon-01.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                                        <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-icon-01.png" alt="" /></noscript>
                                    </figure><!-- .jt-lazyload -->
                                </div><!-- .article__icon-list-item-figure -->
    
                                <div class="article__icon-list-item-desc">
                                    <b class="jt-typo--en jt-typo-en--05"><?php _e( 'Full-automation <br />system', 'jt' ); ?></b>
                                    <p class="jt-typo--06"><?php _e( '전자동화 시스템과 <br />스마트한 플랜트 구현 목표', 'jt' ); ?></p>
                                </div><!-- .article__icon-list-item-title -->
                            </li><!-- .article__icon-list-item -->
    
                            <li class="article__icon-list-item jt-motion--stagger-item">
                                <div class="article__icon-list-item-figure">
                                    <figure class="jt-lazyload">
                                        <img width="120" height="120" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-icon-02.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                                        <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-icon-02.png" alt="" /></noscript>
                                    </figure><!-- .jt-lazyload -->
                                </div><!-- .article__icon-list-item-figure -->
    
                                <div class="article__icon-list-item-desc">
                                    <b class="jt-typo--en jt-typo-en--05"><?php _e( '500t', 'jt' ); ?></b>
                                    <p class="jt-typo--06"><?php _e( '월 약 500t 제조 생산 설비 기획', 'jt' ); ?></p>
                                </div><!-- .article__icon-list-item-title -->
                            </li><!-- .article__icon-list-item -->
    
                            <li class="article__icon-list-item jt-motion--stagger-item">
                                <div class="article__icon-list-item-figure">
                                    <figure class="jt-lazyload">
                                        <img width="120" height="120" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-icon-03.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                                        <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/manufacturing/manufacturing-icon-03.png" alt="" /></noscript>
                                    </figure><!-- .jt-lazyload -->
                                </div><!-- .article__icon-list-item-figure -->
    
                                <div class="article__icon-list-item-desc">
                                    <b class="jt-typo--en jt-typo-en--05"><?php _e( 'Auto-control <br />implementation', 'jt' ); ?></b>
                                    <p class="jt-typo--06"><?php _e( '설비, 배관, 밸브, 계기 등 공정상의 <br />세부요소 P&ID의 자동제어구현', 'jt' ); ?></p>
                                </div><!-- .article__icon-list-item-title -->
                            </li><!-- .article__icon-list-item -->
                        </ul><!-- .article__icon-list -->
                    </div><!-- .wrap -->
                </div><!-- .manufacturing__icons -->
			</div><!-- .article__body -->
		</div><!-- .article -->
        
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>