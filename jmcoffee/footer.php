	</main><!-- .main_container -->

	<div id="custom-cursor">
		<div class="custom-hover-morph">
			<div class="custom-hover-morph__item circle-morph-01">
				<?php jt_svg('/images/layout/circle-morph-02.svg'); ?>
			</div><!-- .custom-hover-morph__item -->

			<div class="custom-hover-morph__item circle-morph-02">	
				<?php jt_svg('/images/layout/circle-morph-02.svg'); ?>
			</div><!-- .custom-hover-morph__item -->
		</div><!-- .custom-hover-morph -->	

		<div class="custom-hover-text">
			<span class="jt-typo--en jt-typo-en--09"><?php _e( 'MORE', 'jt' ); ?></span>
		</div><!-- .custom-hover-text -->	
	</div><!-- #custom-cursor -->
	
	<?php if( is_page_template(array('sub/highlight.php')) || is_404() ) { ?>

		<footer id="footer" class="footer--simple">
			<div class="footer__inner">
				<p class="jt-typo--en jt-typo-en--07 footer__copyright">&copy; 2024 JMCOFFEE. All rights reserved.</p>
			</div><!-- .footer__inner -->
		</footer>

	<?php } else { ?>
		
		<footer id="footer">
			<div class="footer__inner">
				<div class="footer__bg"></div>
				
				<div class="footer__marquee">
					<div class="footer__marquee-wave">
						<div class="footer__marquee-wave-inner">
							<div class="footer__marquee-wave-item"></div>
						</div><!-- .footer__marquee-wave-inner -->
					</div><!-- .footer__marquee--wave -->

					<div class="footer__marquee-text jt-marquee-wrap">
						<div class="jt-marquee jt-typo--en" data-label="CROSS THE BORDER">
							CROSS THE BORDER
						</div><!-- .jt-marquee -->
					</div><!-- .footer__marquee-text -->
				</div><!-- .footer__marquee -->

				<p class="jt-typo--en jt-typo-en--07 footer__copyright">&copy; 2024 JMCOFFEE. All rights reserved.</p>
			</div><!-- .footer__inner -->

			<?php if( is_home() ) { ?>
                <div class="quick-menu open-menu quick-menu--fix">
					<a class="quick-menu--mall" href="https://www.jmcoffeemall.com/" target="_blank" rel="noopener">
						<i class="jt-icon"><?php jt_svg('/images/icon/jt-icon/jt-mall-color.svg'); ?></i>
					</a><!-- .quick-menu--mall -->

                    <div class="quick-menu__list">
                        <a class="quick-menu__list--youtube" href="https://www.youtube.com/channel/UCsyEkDqNdCaH29DHvLAiRHg" target="_blank" rel="noopener">
                            <i class="jt-icon"><?php jt_svg('/images/icon/jt-icon/jt-youtube-color-quick.svg'); ?></i>
                        </a>
                        <a class="quick-menu__list--instagram" href="https://www.instagram.com/jmcoffee.official/" target="_blank" rel="noopener">
                            <i class="jt-icon"><?php jt_svg('/images/icon/jt-icon/jt-instagram-color-quick.svg'); ?></i>
                        </a>
						<a class="quick-menu__btn" href="#">
							<span class="jt-typo--en jt-typo-en--09"><?php _e( 'SNS', 'jt' ); ?></span>
						</a><!-- .quick-menu__btn -->
                    </div><!-- .quick-menu--list -->
                </div><!-- .quick-menu -->
            <?php } ?>
		</footer>
		
	<?php } ?>

	<div class="intro-container">
        <div class="intro">
            <div class="intro-text-wrap">
                <div class="intro-text">
                    <p class="jt-typo--en jt-typo-en--07">
						We are a corporate coffee company <br />
						that has led and responded to changes in the market. <br />
						We growth by exploring new possibilities.
					</p>
                </div><!-- .intro-text -->
            </div><!-- .intro-text-wrap -->

            <div class="intro-percent-wrap">
                <div class="intro-percent">
                    <span class="intro-percent-value jt-typo--en jt-typo-en--01">0%</span>
                </div><!-- .intro-percent -->
            </div><!-- .intro-percent-wrap -->
        </div><!-- .intro -->
    </div><!-- .intro-container -->

    <div class="loading-container">
		<div class="loading-container__logo">
			<?php jt_svg('/images/layout/logo.svg'); ?>
		</div><!-- .loading-container__logo -->
		
		<div class="loading-container__overlay"></div>
	</div><!-- .loading-container -->

    <?php wp_footer(); ?>

</body>
</html>
