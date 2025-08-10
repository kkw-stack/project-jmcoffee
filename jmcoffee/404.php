<?php get_header(); ?>

<div class="error-404">
	<div class="error-404__img-tail-wrap">
        <div class="error-404__img-tail">    
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/error-404-01.jpg" alt="">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/error-404-02.jpg" alt="">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/error-404-03.jpg" alt="">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/error-404-04.jpg" alt="">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/error-404-05.jpg" alt="">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/error-404-06.jpg" alt="">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/error-404-07.jpg" alt="">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/error-404-08.jpg" alt="">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/error-404-09.jpg" alt="">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/error-404-10.jpg" alt="">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/error-404-11.jpg" alt="">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/error-404-12.jpg" alt="">
        </div><!-- .error-404__img-tail -->
    </div><!-- .error-404__img-tail-wrap -->

	<div class="error-404__inner">
		<div class="wrap">
			<h1 class="jt-typo--en jt-typo-en--02"><?php _e( '404 ERROR', 'jt' ); ?></h1>
			<p class="jt-typo--06"><?php _e( '죄송합니다. 페이지를 찾을 수 없습니다. <br />존재하지 않는 주소를 입력하셨거나, <br />요청하신 페이지의 주소가 변경, 삭제되어 찾을 수 없습니다.', 'jt' ); ?></p>

			<div class="error-404__controller">
				<a class="jt-btn__basic" href="<?php echo get_bloginfo('url'); ?>/"><span><?php _e( 'Go to home', 'jt' ); ?></span></a>
			</div><!-- .error-404__controller -->
		</div><!-- .wrap -->
	</div><!-- .error-404__inner -->
</div><!-- .error-404 -->

<?php get_footer(); ?>
