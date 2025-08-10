<?php
/**
 * Template Name: About us
 */

defined('ABSPATH') || die(http_response_code(404));
?>

<?php get_header(); ?>

<?php if (have_posts()): ?>
	<?php while (have_posts()):
		the_post(); ?>
		<?php
		$about_us_visual = get_field('about_us_visual', 'option');
		$history_data = get_field('history_year_data', 'option');
		?>
		<div class="article aboutus">
			<h1 class="sr-only"><?php _e('About us', 'jt'); ?></h1>

			<div class="article__header article__header--visual">
				<div class="article__bg">
					<div class="article__bg--3d">
						<div class="article__bg--3d-pc">
							<div class="jt-spline">
								<canvas id="jt-spline-visual" data-url="https://prod.spline.design/7rZnyM9-qb3pI9Yb/scene.splinecode"></canvas>
							</div><!-- .jt-spline -->
						</div><!-- .article__bg--3d-pc -->

						<div class="article__bg--3d-mo">
                            <div class="article__bg--3d-mo-large">
								<video autoplay muted playsinline loop 
                                    poster="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/aboutus/about-us-poster-l.jpg" 
                                    src="https://player.vimeo.com/progressive_redirect/playback/994950711/rendition/1080p/file.mp4?loc=external&signature=57e8571cf0dd93adb943800c2bd8b780816c5b5dd4169b496821c4ed6cb043d8"></video>
							</div><!-- .article__bg--3d-mo-large -->

							<div class="article__bg--3d-mo-small">
								<video autoplay muted playsinline loop 
                                    poster="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/aboutus/about-us-poster-s.jpg" 
                                    src="https://player.vimeo.com/progressive_redirect/playback/994920218/rendition/1080p/file.mp4?loc=external&signature=83aa24e07adcd54bd7e8d3d64ab181dc17e84c8bd50a0cde2c52be43082fbaba"></video>
							</div><!-- .article__bg--3d-mo-small -->
						</div><!-- .article__bg--3d-mo -->
					</div><!-- .article__bg--3d -->

					<div class="article__bg--dark"></div>
				</div><!-- .article__bg -->

				<div class="article__visual-content">
					<div class="article__visual-content-inner">
						<h2 class="article__visual-title jt-typo--en jt-typo-en--01 jt-motion--split">
							<?php _e('Start of Specialty', 'jt'); ?>
						</h2>
						<p class="article__visual-desc jt-typo--05 jt-motion--split" data-motion-duration="0.7" data-motion-delay="0.1">
							<?php _e('JMCOFFEE는 글로벌 커피 컴퍼니를 향해 카페 브랜드를 넘어선 <br />커피 전문 기업으로 도약합니다.', 'jt'); ?>
						</p>
					</div><!-- .article__visual-content-inner -->
					
					<div class="article__visual-scroll-down">
						<span class="jt-typo--en jt-typo-en--09">Scroll</span>
						<i class="jt-icon"><?php jt_icon('jt-chevron-bottom-smaller-1px-square'); ?></i>
					</div><!-- .article__visual-scroll-down -->
				</div><!-- .article__visual-content -->
			</div><!-- .article__visual -->
			
			<div class="article__body">
				<div class="aboutus-brand">
					<div class="wrap-middle">
						<div class="aboutus-brand__intro">
							<div class="aboutus-brand__intro-inner">
								<div class="aboutus-brand__intro-desc">
									<p class="jt-typo--04 jt-motion--appear">
										<?php _e('JMCOFFEE는 새로운 커피문화와 수년간 축적된 <br />경험의 조합으로 우리만의 기술을 개인과 기업 모두에게 <br />닿을 수 있도록 나아갑니다.', 'jt'); ?>
									</p>
									<p class="jt-typo--04 jt-motion--appear">
										<?php _e('JMCOFFEE는 25년간 성장하여 국내 최고의 <br />테이크아웃커피 브랜드인 컴포즈커피를 포함 국내 커피 역사를 <br />이끌어가며 퀄리티와 헤리티지에 자부심을 가진 <br />브랜드로 자리매김했습니다.', 'jt'); ?>
									</p>
								</div><!-- .aboutus-brand__intro-desc -->
							</div><!-- .aboutus-brand__intro-inner -->
						</div><!-- .aboutus-brand__intro -->

						<div class="aboutus-brand__vision">
							<div class="aboutus-brand__vision-inner">
								<div class="aboutus-brand__vision-list">
									<div class="aboutus-brand__vision-item">
										<span class="jt-typo--06 jt-motion--up"><?php _e('브랜드 비전', 'jt'); ?></span>
										<p class="jt-typo--en jt-typo-en--02 jt-motion--fade">
											<?php _e('Passion to pride', 'jt'); ?>
										</p>
									</div><!-- .aboutus-brand__vision-item -->

									<div class="aboutus-brand__vision-item">
										<span class="jt-typo--06 jt-motion--up"><?php _e('고객에게 제공하는 가치', 'jt'); ?></span>
										<p class="jt-typo--en jt-typo-en--02 jt-motion--fade">
											<?php _e('Specialty for all <br />Specialty for everyone', 'jt'); ?>
										</p>
									</div><!-- .aboutus-brand__vision-item -->

									<div class="aboutus-brand__vision-item">
										<span class="jt-typo--06 jt-motion--up"><?php _e('브랜드 미션', 'jt'); ?></span>
										<p class="jt-typo--en jt-typo-en--02 jt-motion--fade">
											<?php _e('Seed to cup', 'jt'); ?>
										</p>
									</div><!-- .aboutus-brand__vision-item -->
								</div><!-- .aboutus-brand__vision-list -->
							</div><!-- .aboutus-brand__vision-inner -->
						</div><!-- .aboutus-brand__vision -->
					</div><!-- .wrap-middle -->
				</div><!-- .aboutus-brand -->

				<div class="aboutus-objective">
					<div class="wrap-middle">
						<div class="article__section-title">
							<h2 class="jt-typo--en jt-typo-en--02 jt-motion--title"><?php _e('JM’s objective', 'jt'); ?>
							</h2>
							<p class="jt-typo--06 jt-motion--title">
								<?php _e('JMCOFFEE는 모든 사람이 다양한 환경에서 훌륭한 커피 문화를 즐길 수 있도록 그 어느 때보다 집중하고 있습니다. <br />Q-grader & 수석 로스터와 Q-grader & 총괄 Q.C 까지 <br />다양한 전문가들이 함께하는 곳에서 더 많은 경험을 통해 커피의 진정한 맛을 발견합니다.', 'jt'); ?>
							</p>
						</div><!-- .article__section-title -->

						<ul class="article__card-list article__card-list--three jt-motion--stagger">
							<li class="article__card-list-item jt-motion--stagger-item">
								<div class="article__card-list-item-title">
									<b class="jt-typo--en jt-typo-en--05"><?php _e('Import', 'jt'); ?></b>
									<p class="jt-typo--07"><?php _e('NEW CROP 생두 소싱', 'jt'); ?></p>
								</div><!-- .article__card-list-item-title -->

								<div class="article__card-list-item-figure">
									<figure class="jt-lazyload">
										<img width="360" height="360"
											data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/aboutus/aboutus-objective-import.webp"
											src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif"
											alt="" />
										<noscript><img
												src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/aboutus/aboutus-objective-import.webp"
												alt="" /></noscript>
									</figure><!-- .jt-lazyload -->
								</div><!-- .article__card-list-item-figure -->
							</li><!-- .article__card-list-item -->

							<li class="article__card-list-item jt-motion--stagger-item">
								<div class="article__card-list-item-title">
									<b class="jt-typo--en jt-typo-en--05"><?php _e('Profile', 'jt'); ?></b>
									<p class="jt-typo--07"><?php _e('산지를 고려한 프로파일 개발', 'jt'); ?></p>
								</div><!-- .article__card-list-item-title -->

								<div class="article__card-list-item-figure">
									<figure class="jt-lazyload">
										<img width="360" height="360"
											data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/aboutus/aboutus-objective-profile.webp"
											src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif"
											alt="" />
										<noscript><img
												src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/aboutus/aboutus-objective-profile.webp"
												alt="" /></noscript>
									</figure><!-- .jt-lazyload -->
								</div><!-- .article__card-list-item-figure -->
							</li><!-- .article__card-list-item -->

							<li class="article__card-list-item jt-motion--stagger-item">
								<div class="article__card-list-item-title">
									<b class="jt-typo--en jt-typo-en--05"><?php _e('R&D', 'jt'); ?></b>
									<p class="jt-typo--07"><?php _e('연구 개발', 'jt'); ?></p>
								</div><!-- .article__card-list-item-title -->

								<div class="article__card-list-item-figure">
									<figure class="jt-lazyload">
										<img width="" height=""
											data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/aboutus/aboutus-objective-rnd.webp"
											src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif"
											alt="" />
										<noscript><img
												src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/aboutus/aboutus-objective-rnd.webp"
												alt="" /></noscript>
									</figure><!-- .jt-lazyload -->
								</div><!-- .article__card-list-item-figure -->
							</li><!-- .article__card-list-item -->

							<li class="article__card-list-item jt-motion--stagger-item">
								<div class="article__card-list-item-title">
									<b class="jt-typo--en jt-typo-en--05"><?php _e('Roasting Q.C', 'jt'); ?></b>
									<p class="jt-typo--07"><?php _e('생산 설비의 효율성과 생두의 품질 유지', 'jt'); ?></p>
								</div><!-- .article__card-list-item-title -->

								<div class="article__card-list-item-figure">
									<figure class="jt-lazyload">
										<img width="360" height="360"
											data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/aboutus/aboutus-objective-roasting.webp"
											src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif"
											alt="" />
										<noscript><img
												src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/aboutus/aboutus-objective-roasting.webp"
												alt="" /></noscript>
									</figure><!-- .jt-lazyload -->
								</div><!-- .article__card-list-item-figure -->
							</li><!-- .article__card-list-item -->

							<li class="article__card-list-item jt-motion--stagger-item">
								<div class="article__card-list-item-title">
									<b class="jt-typo--en jt-typo-en--05"><?php _e('OEM/ODM', 'jt'); ?></b>
									<p class="jt-typo--07"><?php _e('대량 생산', 'jt'); ?></p>
								</div><!-- .article__card-list-item-title -->

								<div class="article__card-list-item-figure">
									<figure class="jt-lazyload">
										<img width="360" height="360"
											data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/aboutus/aboutus-objective-oemodm.webp"
											src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif"
											alt="" />
										<noscript><img
												src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/aboutus/aboutus-objective-oemodm.webp"
												alt="" /></noscript>
									</figure><!-- .jt-lazyload -->
								</div><!-- .article__card-list-item-figure -->
							</li><!-- .article__card-list-item -->

							<li class="article__card-list-item jt-motion--stagger-item">
								<div class="article__card-list-item-title">
									<b class="jt-typo--en jt-typo-en--05"><?php _e('Distribution', 'jt'); ?></b>
									<p class="jt-typo--07"><?php _e('WMS를 기반으로 운영', 'jt'); ?></p>
								</div><!-- .article__card-list-item-title -->

								<div class="article__card-list-item-figure">
									<figure class="jt-lazyload">
										<img width="360" height="360"
											data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/aboutus/aboutus-objective-distribution.webp"
											src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif"
											alt="" />
										<noscript><img
												src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/aboutus/aboutus-objective-distribution.webp"
												alt="" /></noscript>
									</figure><!-- .jt-lazyload -->
								</div><!-- .article__card-list-item-figure -->
							</li><!-- .article__card-list-item -->
						</ul><!-- .article__card-list -->
					</div><!-- .wrap-middle -->
				</div><!-- .aboutus-objective -->

				<?php if (!empty($about_us_visual)): ?>
					<div class="aboutus-gallery jt-motion--open">
						<div class="article__auto-slider swiper">
							<div class="swiper-wrapper">
								<?php foreach ($about_us_visual as $item): ?>
									<div class="article__auto-slider-item swiper-slide">
										<div class="article__auto-slider-item-figure swiper-lazy"
											data-background="<?php echo (wp_is_mobile() ? jt_get_image_src($item['image_mobile'], 'jt_thumbnail_780x1000') : jt_get_image_src($item['image_pc'], 'jt_thumbnail_1903x953')); ?>">
										</div>
									</div><!-- .article__auto-slider-item -->
								<?php endforeach; ?>
							</div><!-- .swiper-wrapper -->

							<div class="swiper-navigation">
								<div class="swiper-button swiper-button-prev">
									<i class="jt-icon"><?php jt_icon('jt-chevron-left-tiny-3px-square'); ?></i>
									<span class="sr-only"><?php _e('이전', 'jt'); ?></span>
								</div><!-- .swiper-button-prev -->

								<div class="swiper-pagination"></div>

								<div class="swiper-button swiper-button-next">
									<i class="jt-icon"><?php jt_icon('jt-chevron-right-tiny-3px-square'); ?></i>
									<span class="sr-only"><?php _e('다음', 'jt'); ?></span>
								</div><!-- .swiper-button-next -->
							</div><!-- .swiper_navigation -->

							<div class="swiper-control">
								<div class="swiper-state swiper-state--play">
									<button class="swiper-state__btn swiper-state__btn--play">
										<span class="jt-typo--en jt-typo-en--09"><?php _e('Pause', 'jt'); ?></span>
										<i class="jt-icon"><?php jt_icon('jt-pause'); ?></i>
									</button><!-- .swiper-state__btn -->

									<button class="swiper-state__btn swiper-state__btn--pause">
										<span class="jt-typo--en jt-typo-en--09"><?php _e('Play', 'jt'); ?></span>
										<i class="jt-icon"><?php jt_icon('jt-play'); ?></i>
									</button><!-- .swiper-state__btn -->
								</div><!-- .swiper-state -->
							</div><!-- .swiper-control -->
						</div><!-- .main-visual__slider -->
					</div><!-- .aboutus-gallery -->
				<?php endif; ?>

				<?php if (!empty($history_data)): ?>
					<div class="aboutus-history">
						<div class="wrap">
							<div class="article__section-title">
								<h2 class="jt-typo--en jt-typo-en--02 jt-motion--title"><?php _e('JM’s beginning', 'jt'); ?>
								</h2>
								<p class="jt-typo--06 jt-motion--title">
									<?php _e('스페셜티 커피 문화를 펼치기 위한 JMCOFFEE의 첫걸음은 1999년부터 시작되었습니다.', 'jt'); ?>
								</p>
							</div><!-- .article__section-title -->

							<div class="aboutus-history__contents">
								<?php foreach ($history_data as $item): ?>
									<div class="aboutus-history__century">
										<div class="aboutus-history__century-num aboutus-history--sticky">
											<span class="jt-typo--en"><?php echo $item['front_number']; ?></span>
										</div><!-- .aboutus-history__century-num -->

										<div class="aboutus-history__century-list">
											<?php foreach ($item['data'] as $child): ?>
												<div class="aboutus-history__year">
													<div class="aboutus-history__year-num aboutus-history--sticky">
														<!-- .aboutus-history--sticky -->
														<span class="jt-typo--en front-number"><?php echo $item['front_number']; ?></span>
														<span class="jt-typo--en"><?php echo $child['back_number']; ?></span>
													</div><!-- .aboutus-history__year-num -->

													<div class="aboutus-history__year-list">
														<ul class="aboutus-history__year-list-highlight">
															<?php echo do_shortcode($child['main_contents']); ?>
														</ul><!-- .aboutus-history__year-list-highlight -->

														<ul class="aboutus-history__year-list-desc">
															<?php echo do_shortcode($child['contents']); ?>
														</ul><!-- .aboutus-history__year-list-desc -->
													</div><!-- .aboutus-history__year-list -->
												</div><!-- .aboutus-history__year -->
											<?php endforeach; ?>
										</div><!-- .aboutus-history__century-list -->
									</div><!-- .aboutus-history__century -->
								<?php endforeach; ?>
							</div><!-- .aboutus-history__contents -->

							<div class="aboutus-history__btn">
								<button class="jt-btn__underline"><span><?php _e('History more', 'jt'); ?></span></button>
							</div><!-- .aboutus-history__btn -->
						</div><!-- .wrap -->
					</div><!-- .aboutus-history -->
				<?php endif; ?>
			</div><!-- .article__body -->
		</div><!-- .article -->

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>