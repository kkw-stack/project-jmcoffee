<?php
/**
 * Template Name: 무역
 */

defined('ABSPATH') || die(http_response_code(404));
?>

<?php get_header(); ?>

<?php if(have_posts()) : ?>
	<?php while( have_posts()) : the_post(); ?>
		<?php
		$trade_data = get_field( 'trade', 'options' );
		?>
		<div class="article trade">
			<div class="article__header article__header--visual">
				<div class="article__bg">
					<div class="article__bg--3d">
						<div class="article__bg--3d-pc">
							<div class="jt-spline">
								<canvas id="jt-spline-visual" data-url="https://prod.spline.design/DO0vGiii961E2LIf/scene.splinecode"></canvas>
							</div><!-- .jt-spline -->
						</div><!-- .article__bg--3d-pc -->

						<div class="article__bg--3d-mo">
							<div class="article__bg--3d-mo-large">
								<video autoplay muted playsinline loop 
                                    poster="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/business/trade-poster-l.jpg" 
                                    src="https://player.vimeo.com/progressive_redirect/playback/1012253571/rendition/1080p/file.mp4?loc=external&signature=45753e50a897ec3d5adcef5e9a5cbc224cc9ce7ce0c0bb1d1bee814cf02e342b"></video>
							</div><!-- .article__bg--3d-mo-large -->

							<div class="article__bg--3d-mo-small">
								<video autoplay muted playsinline loop 
                                    poster="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/business/trade-poster-s.jpg" 
                                    src="https://player.vimeo.com/progressive_redirect/playback/1012253413/rendition/1080p/file.mp4?loc=external&signature=4f60c9348f334d03e9b721d4a23a6f29d53aec5049df7ffd459715351ec9efae"></video>
							</div><!-- .article__bg--3d-mo-small -->
						</div><!-- .article__bg--3d-mo -->
					</div><!-- .article__bg--3d -->
						
					<div class="article__bg--dark" data-motion-scroll="true"></div>
				</div><!-- .article__bg -->

				<div class="article__visual-content">
					<div class="article__visual-content-inner">
						<h1 class="article__visual-title jt-typo--en jt-typo-en--01 jt-motion--split"><?php _e( 'International trade', 'jt' ); ?></h1>
						<p class="article__visual-desc jt-typo--05 jt-motion--split" data-motion-duration="0.7" data-motion-delay="0.1"><?php _e( '커피를 넘어 세계와 연결되는 글로벌 네트워크', 'jt' ); ?></p>
					</div><!-- .article__visual-content-inner -->

					<div class="article__visual-scroll-down">
						<span class="jt-typo--en jt-typo-en--09">Scroll</span>
						<i class="jt-icon"><?php jt_icon('jt-chevron-bottom-smaller-1px-square'); ?></i>
					</div><!-- .article__visual-scroll-down -->
				</div><!-- .article__visual-content -->
			</div><!-- .article__visual -->

			<div class="article__body">
				<div class="trade-inner">
					<div class="trade-sourcing">
						<div class="wrap-wide">
							<div class="article__section-title">
								<h2 class="jt-typo--en jt-typo-en--02 jt-motion--title"><?php _e( 'Global green bean <br />sourcing', 'jt' ); ?></h2>
								<p class="jt-typo--06 jt-motion--title">
									<?php _e( '자체적인 물류 관리를 통해 안정적인 공급망을 구축합니다. <br />아프리카 및 중남미 중심으로 엄선된 NEW CROP 생두 수입 및 제공합니다.', 'jt' ); ?>
								</p>
							</div><!-- .article__section-title -->

							<ul class="article__card-list article__card-list--four jt-motion--stagger">
								<?php foreach ($trade_data['content'] as $key => $data) : ?>
									<li class="article__card-list-item jt-motion--stagger-item" data-column="4">
										<div class="article__card-list-item-title"> 
											<span class="jt-typo--en jt-typo-en--09">Step. <?php echo $key + 1; ?></span>
											<b class="jt-typo--en jt-typo-en--05"><?php echo $data['title']; ?></b>
											<?php if (!empty($data['description'])) : ?>
												<p class="jt-typo--07"><?php echo $data['description']; ?></p>
											<?php endif; ?>
										</div><!-- .article__card-list-item-title -->
										
										<div class="article__card-list-item-figure">
											<figure class="jt-lazyload">
												<img width="398" height="300" data-unveil="<?php echo jt_get_image_src($data['image']['pc'], 'jt_thumbnail_398x300'); ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
												<noscript><img src="<?php echo jt_get_image_src($data['image']['pc'], 'jt_thumbnail_398x300'); ?>" alt="" /></noscript>
											</figure><!-- .jt-lazyload -->
										</div><!-- .article__card-list-item-figure -->
									</li><!-- .article__card-list-item -->
								<?php endforeach?>
							</ul><!-- .article__card-list -->
						</div><!-- .wrap-wide -->
					</div><!-- .trade-sourcing -->

					<div class="trade-figure jt-motion--open">
						<div class="trade-figure__inner" style="background-image: url('<?php echo (wp_is_mobile()) ? jt_get_image_src($trade_data['bottom_image']['mobile'], 'jt_thumbnail_780x1000') : jt_get_image_src($trade_data['bottom_image']['pc'], 'jt_thumbnail_1903x954');?>')"></div>
					</div><!-- .trade-figure -->

					<div class="trade-machine">
						<div class="wrap">
							<div class="article__section-title">
								<h2 class="jt-typo--en jt-typo-en--02 jt-motion--title"><?php _e( 'Machine equipment', 'jt' ); ?></h2>
								<p class="jt-typo--06 jt-motion--title">
									<?php _e( '최신 WMS(창고관리시스템)를 기반으로 운영되는 <br />물류시스템은 체계적인 재고 관리와 공간활용이 가능합니다. <br />이 시스템을 통해 모든 과정을 효율적으로 관리하여 <br />신속하게 응답할 수 있도록 지원하며 운영 효율성을 극대화합니다.', 'jt' ); ?>
								</p>
							</div><!-- .article__section-title -->

							<ul class="article__icon-list jt-motion--stagger">
								<li class="article__icon-list-item jt-motion--stagger-item">
									<div class="article__icon-list-item-figure">
										<figure class="jt-lazyload">
											<img width="120" height="120" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/business/trade-machine-icon-01.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
											<noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/business/trade-machine-icon-01.png" alt="" /></noscript>
										</figure><!-- .jt-lazyload -->
									</div><!-- .article__icon-list-item-figure -->

									<div class="article__icon-list-item-desc">
										<b class="jt-typo--en jt-typo-en--05"><?php _e( 'Functional', 'jt' ); ?></b>
										<p class="jt-typo--06"><?php _e( '시스템을 효율적으로 관리해 <br />높은 생산성을 보장하는 기능성', 'jt' ); ?></p>
									</div><!-- .article__icon-list-item-title -->
								</li><!-- .article__icon-list-item -->

								<li class="article__icon-list-item jt-motion--stagger-item">
									<div class="article__icon-list-item-figure">
										<figure class="jt-lazyload">
											<img width="120" height="120" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/business/trade-machine-icon-02.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
											<noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/business/trade-machine-icon-02.png" alt="" /></noscript>
										</figure><!-- .jt-lazyload -->
									</div><!-- .article__icon-list-item-figure -->

									<div class="article__icon-list-item-desc">
										<b class="jt-typo--en jt-typo-en--05"><?php _e( 'Aesthetic', 'jt' ); ?></b>
										<p class="jt-typo--06"><?php _e( '세련된 외관과 기능성을 <br />만족시키는 미학적인 특징', 'jt' ); ?></p>
									</div><!-- .article__icon-list-item-title -->
								</li><!-- .article__icon-list-item -->

								<li class="article__icon-list-item jt-motion--stagger-item">
									<div class="article__icon-list-item-figure">
										<figure class="jt-lazyload">
											<img width="120" height="120" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/business/trade-machine-icon-03.png" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
											<noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/business/trade-machine-icon-03.png" alt="" /></noscript>
										</figure><!-- .jt-lazyload -->
									</div><!-- .article__icon-list-item-figure -->

									<div class="article__icon-list-item-desc">
										<b class="jt-typo--en jt-typo-en--05"><?php _e( 'Resonable', 'jt' ); ?></b>
										<p class="jt-typo--06"><?php _e( '효율적인 성능을 제공하고 <br />사용자의 편의를 고려한 합리성', 'jt' ); ?></p>
									</div><!-- .article__icon-list-item-title -->
								</li><!-- .article__icon-list-item -->
							</ul><!-- .article__icon-list -->
						</div><!-- .wrap -->
					</div><!-- .trade-machine -->

					<div class="trade-artinus">
						<div class="wrap">
							<div class="article__section-title">
								<h2 class="jt-typo--en jt-typo-en--02 jt-motion--title"><?php _e( 'ARTINUS', 'jt' ); ?></h2>
								<p class="jt-typo--06 jt-motion--title">
									<?php _e( '‘Art in us’ 우리안의 예술이라는 슬로건으로 미드클래스-하이엔드급 머신을 런칭했습니다. <br />프로 바리스타의 드림머신 기술 집약체로 내구성, 안정성을 최우선으로 설계되었습니다.', 'jt' ); ?>
								</p>

								<div class="article__section-title-btn jt-motion--title-btn">
									<a href="<?php the_permalink(27); ?>" class="jt-btn__basic"><span><?php _e( 'View more', 'jt' ); ?></span></a>
								</div><!-- .article__section-title-btn -->
							</div><!-- .article__section-title -->

							<div class="trade-artinus__video jt-motion--video">
								<video muted playsinline loop poster="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/business/trade-artinus-poster.jpg" src="https://player.vimeo.com/progressive_redirect/playback/972806601/rendition/1080p/file.mp4?loc=external&signature=e6ee80782e0a545607fd1b949b99f984640f70216d822fcde701a6d62ee2f258"></video>	
							</div><!-- .trade-artinus__video -->
						</div><!-- .wrap -->
					</div><!-- .trade-artinus -->
				</div><!-- .trade-inner -->
			</div><!-- .article__body -->
		</div><!-- .article -->
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>