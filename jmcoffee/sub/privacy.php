<?php
/**
 * Template Name: 개인정보처리방침
 */

defined('ABSPATH') || die(http_response_code(404));
?>

<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()):
        the_post(); ?>

        <div class="article">
            <?php echo do_shortcode('[privacy]'); ?>
        </div><!-- .article -->
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>