<?php get_header(); ?>
    
    <div class="main-visual">
        <div class="article__bg">
            <div class="article__bg--3d">
                <div class="article__bg--3d-pc">
                    <div class="jt-spline">
                        <canvas id="jt-spline-visual" data-url="https://prod.spline.design/9RDHpMJN5ZRiwsQp/scene.splinecode"></canvas>
                    </div><!-- .jt-spline -->
                </div><!-- .article__bg--3d-pc -->

                <div class="article__bg--3d-mo">
                    <div class="article__bg--3d-mo-large">
                        <video autoplay muted playsinline loop 
                            poster="<?php echo get_stylesheet_directory_uri(); ?>/images/main/main-poster-l.jpg" 
                            src="https://player.vimeo.com/progressive_redirect/playback/994950693/rendition/1080p/file.mp4?loc=external&signature=fb49baca575b2b82aa199ddee5bff52b4444969ff01b807fc24520dc2d89792a"></video>
                    </div><!-- .article__bg--3d-mo-large -->

                    <div class="article__bg--3d-mo-small">
                        <video autoplay muted playsinline loop 
                            poster="<?php echo get_stylesheet_directory_uri(); ?>/images/main/main-poster-s.jpg" 
                            src="https://player.vimeo.com/progressive_redirect/playback/1019300907/rendition/1080p/file.mp4?loc=external&signature=e3fd3df2799c3ac23a766ed434ca1e15faceae00fc110a920b91c01b3250257a"></video>
                    </div><!-- .article__bg--3d-mo-small -->
                </div><!-- .article__bg--3d-mo -->
			</div><!-- .article__bg--3d -->
					
			<div class="article__bg--dark" data-motion-scroll="true" data-motion-offset="top 80%" data-motion-duration="0.3"></div>
        </div><!-- .main-visual__bg -->

        <div class="main-visual__content">
            <div class="wrap">
                <h2 class="main-visual__title jt-typo--en jt-typo-en--01 jt-motion--split-char"><?php _e( 'JMCOFFEE<br class="smbr" />GROUP', 'jt' ); ?></h2>
                <h3 class="jt-typo--05 jt-motion--split" data-motion-duration="0.7" data-motion-delay="1"><?php _e( 'Blend ideas Brew solution', 'jt' ); ?></h3>
                <?php if( jt_get_lang() == 'ko' ) { ?>
                <p class="jt-typo--05 jt-motion--split" data-motion-duration="0.7" data-motion-delay="1.2"><?php _e( '글로벌 스탠다드와 무한한 성장을 통해 <br class="smbr" />커피의 새로운 시대를 열다', 'jt' ); ?></p>
                <?php } ?>
            </div><!-- .wrap -->
        </div><!-- .main-visual__content -->
    </div><!-- .main-visual -->

    <div class="main-section main-aboutus">
        <div class="wrap">
            <div class="main-section__head">
                <h2 class="main-section__title jt-typo--en jt-typo-en--02 jt-motion--title"><?php _e( 'Growing in <br class="smbr" />every <br />direction', 'jt' ); ?></h2>

                <p class="main-section__desc jt-typo--06 jt-motion--title">
                    <?php _e( 'JMCOFFEE는 물류, 컨설팅, 제조, 연구, 브랜드 등 다양한 분야에서 <br />
                    혁신의 길을 걸으며 지속적으로 성장하고 있습니다. <br />
                    전문성과 창의성을 바탕으로 새로운 기준을 세우고, 업계의 변화를 선도합니다.', 'jt' ); ?>
                </p><!-- .main-section__desc -->
            </div><!-- .main-section__head -->

            <div class="main-section__body">
                <ul class="main-aboutus__list jt-motion--stagger">
                    <li class="main-aboutus__list-item jt-motion--stagger-item" data-column="4" data-motion-offset="top bottom">
                        <a href="<?php the_permalink(27); ?>">
                            <div class="main-aboutus__list-item-figure">
                                <figure class="jt-lazyload">
                                    <img width="210" height="210" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/main/main-aboutus-artinus-2x.webp" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                                    <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/main/main-aboutus-artinus-2x.webp" alt="" /></noscript>
                                </figure><!-- .jt-lazyload -->
                            </div><!-- .main-aboutus__list-item-figure -->

                            <h3 class="main-aboutus__list-item-title jt-typo--en jt-typo-en--07"><?php _e( 'ARTINUS', 'jt' ); ?></h3>
                        </a>
                    </li><!-- .main-aboutus__list-item -->

                    <li class="main-aboutus__list-item jt-motion--stagger-item" data-column="4" data-motion-offset="top bottom">
                        <a href="<?php the_permalink(21); ?>">
                            <div class="main-aboutus__list-item-figure">
                                <figure class="jt-lazyload">
                                    <img width="210" height="210" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/main/main-aboutus-manufacturing-2x.webp" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                                    <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/main/main-aboutus-manufacturing-2x.webp" alt="" /></noscript>
                                </figure><!-- .jt-lazyload -->
                            </div><!-- .main-aboutus__list-item-figure -->

                            <h3 class="main-aboutus__list-item-title jt-typo--en jt-typo-en--07"><?php _e( 'Manufacturing', 'jt' ); ?></h3>
                        </a>
                    </li><!-- .main-aboutus__list-item -->

                    <li class="main-aboutus__list-item jt-motion--stagger-item" data-column="4" data-motion-offset="top bottom">
                        <a href="<?php the_permalink(23); ?>">
                            <div class="main-aboutus__list-item-figure">
                                <figure class="jt-lazyload">
                                    <img width="210" height="210" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/main/main-aboutus-consulting-2x.webp" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                                    <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/main/main-aboutus-consulting-2x.webp" alt="" /></noscript>
                                </figure><!-- .jt-lazyload -->
                            </div><!-- .main-aboutus__list-item-figure -->

                            <h3 class="main-aboutus__list-item-title jt-typo--en jt-typo-en--07"><?php _e( 'Consulting', 'jt' ); ?></h3>
                        </a>
                    </li><!-- .main-aboutus__list-item -->

                    <li class="main-aboutus__list-item jt-motion--stagger-item" data-column="4" data-motion-offset="top bottom">
                        <a href="https://www.jmcoffeemall.com/" target="_blank" rel="noopener noreferrer">
                            <div class="main-aboutus__list-item-figure">
                                <figure class="jt-lazyload">
                                    <img width="210" height="210" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/main/main-aboutus-jmmall-2x.webp" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                                    <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/main/main-aboutus-jmmall-2x.webp" alt="" /></noscript>
                                </figure><!-- .jt-lazyload -->
                            </div><!-- .main-aboutus__list-item-figure -->

                            <h3 class="main-aboutus__list-item-title jt-typo--en jt-typo-en--07"><?php _e( 'JM Mall', 'jt' ); ?><i class="jt-icon"><?php jt_svg('/images/icon/jt-icon/jt-outlink.svg'); ?></i></h3>
                        </a>
                    </li><!-- .main-aboutus__list-item -->
                </ul><!-- .main-aboutus__list -->
            </div><!-- .main-section__body -->
        </div><!-- .wrap -->
    </div><!-- .main-aboutus -->

    <div class="main-section main-trade jt-motion--title-video">
        <div class="wrap-middle">
            <div class="main-trade__inner">
                <div class="main-section__head">
                    <h2 class="main-section__title jt-typo--en jt-typo-en--02 jt-motion--title"><?php _e( 'Global network <br />beyond coffee', 'jt' ); ?></h2>
                    
                    <p class="main-section__desc jt-typo--06 jt-motion--title">
                        <?php _e( '전문 설비와 효율적인 프로세스를 통해 세계 각지의 <br />우수한 원두를 직접 수입하여 최고의 품질과 고객 만족을 선사합니다.', 'jt' ); ?>
                    </p><!-- .main-section__desc -->

                    <div class="main-section__btn touch-screen-only jt-motion--title-btn">
                        <a href="<?php the_permalink(71); ?>" class="jt-btn__basic"><span><?php _e( 'Top Brands', 'jt' ); ?></span></a>
                    </div><!-- .main-section__btn -->
                </div><!-- .main-section__head -->

                <div class="main-section__body">
                    <a href="<?php the_permalink(71); ?>" class="main-section__link custom-hover">
                        <div class="main-section__video jt-motion--video">
                            <video autoplay muted playsinline loop poster="<?php echo get_stylesheet_directory_uri(); ?>/images/main/main-trade-poster.jpg" src="https://player.vimeo.com/progressive_redirect/playback/1007506270/rendition/1080p/file.mp4?loc=external&signature=cfa3215902091a0287e5a29f3e58db039932a18beaf4e68f91bedb3164a7cc85"></video>
                        </div><!-- .main-section__video -->
                    </a><!-- ..main-section__link -->
                </div><!-- .main-section__body -->
            </div><!-- .main-trade__inner -->
        </div><!-- .wrap-middle -->
    </div><!-- .main-trade -->

    <div class="main-section main-product">
        <div class="wrap">
            <div class="main-product-inner custom-hover">
                <div class="main-section__head">
                    <a href="<?php the_permalink(71); ?>" class="main-section__link">
                        <h2 class="main-section__title jt-typo--en jt-typo-en--02 jt-motion--title"><?php _e( 'Powered <br class="smbr" />by <br />integrated <br class="smbr" />solutions', 'jt' ); ?></h2>
                        
                        <p class="main-section__desc jt-typo--06 jt-motion--title">
                            <?php _e( '전문 생산 설비를 이용하여 생산성, 품질, 고객만족도를 향상시키는 <br />커피 플랜트를 구현하며 안정적인 생산과 제조를 위한 솔루션을 제공합니다.', 'jt' ); ?>
                        </p><!-- .main-section__desc -->
                    </a><!-- .main-section__link -->

                    <div class="main-section__btn touch-screen-only jt-motion--title-btn">
                        <a href="<?php the_permalink(71); ?>" class="jt-btn__basic"><span><?php _e( 'Top Brands', 'jt' ); ?></span></a>
                    </div><!-- .main-section__btn -->
                </div><!-- .main-section__head -->

                <div class="main-section__body">
                    <div class="main-product__inner jt-motion--up" data-motion-y="0" data-motion-duration="1" data-motion-offset="top bottom">
                        <a href="<?php the_permalink(71); ?>" class="main-section__link">
                            <figure class="jt-lazyload">
                                <img width="710" height="710" data-unveil="<?php echo get_stylesheet_directory_uri(); ?>/images/main/main-product.webp" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                                <noscript><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/main/main-product.webp" alt="" /></noscript>
                            </figure><!-- .jt-lazyload -->
                        </a><!-- .main-section__link -->
                    </div><!-- .main-product__inner -->
                </div><!-- .main-section__body -->
            </div><!-- .main-product-inner -->
        </div><!-- .wrap -->
    </div><!-- .main-product -->

    <div class="main-section main-consulting jt-motion--title-video">
        <div class="wrap-middle">
            <div class="main-consulting__inner">
                <div class="main-section__head">
                    <h2 class="main-section__title jt-typo--en jt-typo-en--02 jt-motion--title"><?php _e( 'Balanced and perfect <br />process', 'jt' ); ?></h2>
                    
                    <p class="main-section__desc jt-typo--06 jt-motion--title">
                        <?php _e( 'JMCOFFEE의 커피 시장에 대한 안목으로 <br />모든 순간의 경험을 확실하게 전달합니다.', 'jt' ); ?>
                    </p><!-- .main-section__desc -->

                    <div class="main-section__btn touch-screen-only jt-motion--title-btn">
                        <a href="<?php the_permalink(71); ?>" class="jt-btn__basic"><span><?php _e( 'Top Brands', 'jt' ); ?></span></a>
                    </div><!-- .main-section__btn -->
                </div><!-- .main-section__head -->

                <div class="main-section__body">
                    <a href="<?php the_permalink(71); ?>" class="main-section__link custom-hover">
                        <div class="main-section__video jt-motion--video">
                            <video muted playsinline loop poster="<?php echo get_stylesheet_directory_uri(); ?>/images/main/main-consulting-poster.jpg" src="https://player.vimeo.com/progressive_redirect/playback/984685554/rendition/1080p/file.mp4?loc=external&signature=524f093fb7183da1a889183b8cb24c243cd384d35ec3462e9b4f7e9b117dd149"></video>
                        </div><!-- .main-section__video -->
                    </a><!-- .main-section__link -->
                </div><!-- .main-section__body -->
            </div><!-- .main-consulting__inner -->
        </div><!-- .wrap-middle -->
    </div><!-- .main-consulting -->

<?php get_footer(); ?>
