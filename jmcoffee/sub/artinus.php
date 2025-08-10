<?php
/**
 * Template Name: ARTINUS 아티누스
 */

defined('ABSPATH') || die(http_response_code(404));
?>

<?php get_header(); ?>

<?php if (have_posts()): ?>
	<?php while (have_posts()):
		the_post(); ?>
		
		<div class="article artinus">
			<div class="products-logo">
				<h1 class="sr-only"><?php _e('ARTINUS', 'jt'); ?></h1>
				<i class="jt-icon"><?php jt_svg('/images/sub/products/artinus-logo.svg'); ?></i>
			</div><!-- .products-logo -->

			<?php echo do_shortcode('[artinus]'); ?>
		</div><!-- .article -->
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>