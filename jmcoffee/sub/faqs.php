<?php
/**
 * Template Name: FAQs
 */

defined('ABSPATH') || die(http_response_code(404));
?>

<?php get_header(); ?>

<?php if(have_posts()) : ?>
	<?php while( have_posts()) : the_post(); ?>
        <div class="article">
			<div class="article__header">
				<div class="wrap">
					<h1 class="article__title jt-typo--en jt-typo-en--01 jt-motion--split"><?php echo get_the_title(); ?></h1>
				</div><!-- .wrap -->
			</div><!-- .article__header -->

			<div class="article__body">
				<div class="wrap jt-motion--up" data-motion-delay="0.4">
					<?php the_content(); ?>
				</div><!-- .wrap -->
			</div><!-- .article__body -->
		</div><!-- .article -->
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>