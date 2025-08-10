<?php
/**
 * Template Name: 컨설팅
 */

defined('ABSPATH') || die(http_response_code(404));
?>

<?php get_header(); ?>

<?php if(have_posts()) : ?>
	<?php while( have_posts()) : the_post(); ?>
		<?php
		$consulting_data = get_field( 'consulting', 'options' );
		?>
		<div class="article consulting">
			<div class="article__header article__header--visual">
				<div class="article__bg">
					<div class="article__bg--3d">
                        <div class="article__bg--3d-pc">
							<div class="jt-spline">
								<canvas id="jt-spline-visual" data-url="https://prod.spline.design/nfLG5HLBd1Ul7Kky/scene.splinecode"></canvas>
							</div><!-- .jt-spline -->
						</div><!-- .article__bg--3d-pc -->

						<div class="article__bg--3d-mo">
							<div class="article__bg--3d-mo-large">
								<video autoplay muted playsinline loop 
                                    poster="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/business/consulting-poster-l.jpg" 
                                    src="https://player.vimeo.com/progressive_redirect/playback/1012253708/rendition/1080p/file.mp4?loc=external&signature=179a9524a097f426792a531fac3b86c1b1cc9f583805ae95f8639004cec3e183"></video>
							</div><!-- .article__bg--3d-mo-large -->

							<div class="article__bg--3d-mo-small">
								<video autoplay muted playsinline loop 
                                    poster="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/business/consulting-poster-s.jpg" 
                                    src="https://player.vimeo.com/progressive_redirect/playback/1012260174/rendition/1080p/file.mp4?loc=external&signature=fa1de47a185e05bcc5420ad37d4e771c87bcf1eaefd21b9c9e0867fe39b388d4"></video>
							</div><!-- .article__bg--3d-mo-small -->
						</div><!-- .article__bg--3d-mo -->
					</div><!-- .article__bg--3d -->
						
					<div class="article__bg--dark" data-motion-scroll="true"></div>
				</div><!-- .article__bg -->

				<div class="article__visual-content">
                    <div class="article__visual-content-inner">
					    <h1 class="article__visual-title jt-typo--en jt-typo-en--01 jt-motion--split"><?php _e( 'Consulting', 'jt' ); ?></h1>
					    <p class="article__visual-desc jt-typo--05 jt-motion--split" data-motion-duration="0.7" data-motion-delay="0.1"><?php _e( '비즈니스도 일상도 특별한 순간으로', 'jt' ); ?></p>
                    </div><!-- .article__visual-content-inner -->
                    
                    <div class="article__visual-scroll-down">
                        <span class="jt-typo--en jt-typo-en--09">Scroll</span>
                        <i class="jt-icon"><?php jt_icon('jt-chevron-bottom-smaller-1px-square'); ?></i>
                    </div><!-- .article__visual-scroll-down -->
                </div><!-- .article__visual-content -->
			</div><!-- .article__visual -->
			
			<div class="article__body">
				<div class="consulting-inner">
					<div class="consulting-cafe">
						<div class="wrap-middle">
							<div class="article__section-title">
								<h2 class="jt-typo--en jt-typo-en--02 jt-motion--title"><?php _e( 'Cafe operation system', 'jt' ); ?></h2>
								<p class="jt-typo--06 jt-motion--title">
									<?php _e( '기획부터 완성까지 고객의 니즈에 맞는 카페통합운영시스템으로 성장합니다.', 'jt' ); ?>
								</p>
							</div><!-- .article__section-title -->

							<ul class="article__card-list article__card-list--three jt-motion--stagger">
								<?php foreach ($consulting_data['content'] as $key => $data) : ?>
									<li class="article__card-list-item jt-motion--stagger-item">
										<div class="article__card-list-item-title"> 
											<span class="jt-typo--en jt-typo-en--09">Step. <?php echo $key + 1; ?></span>
											<b class="jt-typo--en jt-typo-en--05"><?php echo $data['title']; ?></b>
											<?php if (!empty($data['description'])) : ?>
												<p class="jt-typo--07"><?php echo $data['description']; ?></p>
											<?php endif; ?>
										</div><!-- .article__card-list-item-title -->
										
										<div class="article__card-list-item-figure">
											<figure class="jt-lazyload">
												<img width="449" height="350" data-unveil="<?php echo jt_get_image_src($data['image']['pc'], 'jt_thumbnail_449x350'); ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
												<noscript><img src="<?php echo jt_get_image_src($data['image']['pc'], 'jt_thumbnail_449x350'); ?>" alt="" /></noscript>
											</figure><!-- .jt-lazyload -->
										</div><!-- .article__card-list-item-figure -->
									</li><!-- .article__card-list-item -->
								<?php endforeach?>
							</ul><!-- .article__card-list -->
						</div><!-- .wrap-middle -->
					</div><!-- .consulting-cafe -->

					<div class="consulting-figure jt-motion--open">
						<div class="consulting-figure__inner" style="background-image: url('<?php echo (wp_is_mobile()) ? jt_get_image_src($consulting_data['bottom_image']['mobile'], 'jt_thumbnail_780x1000') : jt_get_image_src($consulting_data['bottom_image']['pc'], 'jt_thumbnail_1903x954');?>')"></div>
					</div><!-- .consulting-figure -->

					<div class="consulting-frc">
						<div class="wrap">
							<div class="consulting-frc__inner">
								<div class="consulting-frc__figure jt-motion--scale">
									<figure class="jt-lazyload">
										<img width="772" height="766" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/business/consulting-frc.jpg" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
										<noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub/business/consulting-frc.jpg" alt="" /></noscript>
									</figure><!-- .jt-lazyload -->
								</div><!-- .consulting-frc__figure -->

								<div class="consulting-frc__desc">
									<h2 class="jt-typo--en jt-typo-en--02 jt-motion--title" data-motion-delay="0.4"><?php _e( 'FRC system', 'jt' ); ?></h2>
									
									<div class="jt-motion--title">
										<p class="jt-typo--06"><?php _e( '원두커피 정기구독 시 전자동 커피머신 렌탈서비스와 커피 관련 장비에 특화된 <br />엔지니어팀이 무상 A/S서비스, 추출량 점검, 청소 관리, 정기 점검 등의 토탈 케어 서비스를 제공합니다.', 'jt' ); ?></p>
										<p class="jt-typo--06"><?php _e( '문의 1899-0820', 'jt' ); ?></p>
									</div><!-- .jt-motion--title -->
									
									<div class="consulting-frc__desc-btn jt-motion--title-btn">
										<a href="<?php the_permalink(37); ?>" class="jt-btn__basic"><span><?php _e( 'FRC <strong>신청하기</strong>', 'jt' ); ?></span></a>
									</div><!-- .consulting-frc__desc-btn -->
								</div><!-- .consulting-frc__desc -->
							</div><!-- .article__center -->
						</div><!-- .wrap -->
					</div><!-- .consulting-frc -->
				</div><!-- .consulting-inner -->
			</div><!-- .article__body -->
		</div><!-- .article -->
        
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>