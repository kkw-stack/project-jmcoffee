<?php
/**
 * Template Name: COFFEE BEANS 원두
 */

defined('ABSPATH') || die(http_response_code(404));
?>

<?php get_header(); ?>

<?php if (have_posts()): ?>
	<?php while (have_posts()):
		the_post(); ?>
		
		<div class="article coffee-beans">
			<div class="products-logo">
				<h1 class="sr-only"><?php _e('COFFEE BEANS', 'jt'); ?></h1>
				<i class="jt-icon"><?php jt_svg('/images/sub/products/coffee-beans-logo.svg'); ?></i>
			</div><!-- .products-logo -->

			<?php echo do_shortcode('[coffee_beans]'); ?>
		</div><!-- .article -->
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>