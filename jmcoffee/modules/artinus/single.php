<?php
/**
 * ARTINUS SINGLE 아티누스 상세
 */

defined('ABSPATH') || die(http_response_code(404));
?>

<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()):
        the_post(); ?>
        <?php
        $artinus_data = get_field('artinus');
        $hash = strtolower(preg_replace('/\s+/', '', str_replace(['<br>', '<br/>', '<br />'], '', $artinus_data['en_name'])));
        $all_posts = get_posts([
            'post_type' => 'artinus',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
        ]);

        $prev_post_id = ($prev_post = get_adjacent_post(false, '', false)) ? $prev_post->ID : end($all_posts)->ID;
        $next_post_id = ($next_post = get_adjacent_post(false, '', true)) ? $next_post->ID : $all_posts[0]->ID;
        ?>
        <div class="article artinus-single">
            <div class="products-single-contents">
                <div class="products-single-contents__model">
                    <div class="products-single-contents__figure">
                        <!-- .video -->
                        <?php if ($artinus_data['visual']['video_use']): ?>
                            <?php
                            $artinus_video_link = add_query_arg(
                                array(
                                    'quality' => '1080p',
                                    'muted' => 1,
                                    'autoplay' => 1,
                                    'autopause' => 0,
                                    'loop' => 1,
                                    'background' => 1,
                                    'controls' => 0,
                                ),
                                $artinus_data['visual']['video']
                            )
                                ?>
                            <div class="jt-fullvid-container jt-autoplay-inview">
                                <iframe class="jt-fullvid" src="https://player.vimeo.com/video/<?php echo $artinus_video_link; ?>" width="875" height="492" allowfullscreen></iframe>

                                <span class="jt-fullvid__poster">
                                    <span class="jt-fullvid__poster-bg" data-unveil="<?php echo jt_get_image_src($artinus_data['visual']['image'], 'jt_thumbnail_875x492'); ?>"></span>
                                </span><!-- .jt-fullvid__poster -->
                            </div><!-- .jt-fullvid-container -->
                        <?php else: ?>
                            <!-- .images -->
                            <figure class="jt-lazyload">
                                <img width="875" height="492" data-unveil="<?php echo jt_get_image_src($artinus_data['visual']['image'], 'jt_thumbnail_875x492'); ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                                <noscript><img src="<?php echo jt_get_image_src($artinus_data['visual']['image'], 'jt_thumbnail_875x492'); ?>" alt="" /></noscript>
                            </figure><!-- .jt-lazyload -->
                        <?php endif; ?>
                    </div><!-- .products-single-contents__figure -->
                </div><!-- .products-single-contents__model -->

                <div class="products-single-contents__info">
                    <div class="products-single-contents__info-title">
                        <div class="products-single-contents__info-title-icon">
                            <i class="jt-icon"><?php jt_svg('/images/sub/products/artinus-icon.svg'); ?></i>
                        </div><!-- .products-single-contents__info-title-icon -->

                        <h1 class="jt-typo--en jt-typo-en--02"><?php echo $artinus_data['en_name']; ?></h1>

                        <b class="jt-typo--04"><?php echo $artinus_data['ko_name']; ?></b>
                        <?php if (!empty($artinus_data['description'])): ?>
                            <p class="jt-typo--06"><?php echo $artinus_data['description']; ?></p>
                        <?php endif; ?>
                    </div><!-- .products-single-contents__info-title -->

                    <div class="products-single-contents__info-table">
                        <?php foreach ($artinus_data['info'] as $info): ?>
                            <div class="products-single-contents__info-table-item">
                                <b class="jt-typo--en jt-typo-en--07"><?php echo $info['item']; ?></b>
                                <span class="jt-typo--en jt-typo-en--07"><?php echo $info['content']; ?></span>
                            </div><!-- .products-single-contents__info-table-item -->
                        <?php endforeach; ?>
                    </div><!-- .products-single-contents__info-table -->

                    <div class="products-single-contents__info-tech">
                        <h2 class="jt-typo--en jt-typo-en--05"><?php _e('Core technology', 'jt'); ?></h2>

                        <ul class="products-single-contents__info-tech-list">
                            <?php echo do_shortcode($artinus_data['characteristic']); ?>
                        </ul><!-- .products-single-contents__info-tech-list -->
                    </div><!-- .products-single-contents__info-tech -->

                    <?php if (!empty($artinus_data['link'])): ?>
                        <div class="products-single-contents__info-link">
                            <h2 class="jt-typo--en jt-typo-en--05"><?php _e('Find out more', 'jt'); ?></h2>

                            <ul class="products-single-contents__info-link-list">
                                <?php foreach ($artinus_data['link'] as $link): ?>
                                    <li class="products-single-contents__info-link-list-item">
                                        <a href="<?php echo $link['url']; ?>" <?php echo (!empty($link['target'])) ? 'target="_blank"' : '' ?> rel="noopener">
                                            <span class="jt-typo--06"><?php echo $link['name']; ?></span>
                                            <i class="jt-icon"><?php jt_svg('/images/icon/jt-icon/jt-outlink.svg'); ?></i>
                                        </a>
                                    </li><!-- .products-single-contents__info-link-list-item -->
                                <?php endforeach; ?>
                            </ul><!-- .products-single-contents__info-link-list -->
                        </div><!-- .products-single-contents__info-link -->
                    <?php endif; ?>

                    <div class="products-single-contents__info-btn">
                        <a href="<?php echo get_permalink(37); ?>" class="jt-btn__basic jt-btn--full"><span><?php _e('Contact us', 'jt'); ?></span></a>
                    </div><!-- .products-single-contents__info-btn -->

                    <?php /*
                       <div class="products-single-contents__back-btn">
                           <?php 
                           //$hash = strtolower(str_replace(array('<br>', '<br/>', '<br />'), '', preg_replace('/\s+/', '', $artinus_data['en_name'])));
                           $hash = strtolower(preg_replace('/\s+/', '', str_replace(['<br>', '<br/>', '<br />'], '', $artinus_data['en_name'])));
                           ?>
                           <a href="<?php echo get_permalink(27); ?>#<?php echo $hash; ?>" class="jt-btn__underline"><span><?php _e('Go to list', 'jt'); ?></span></a>
                       </div><!-- .products-single-contents__back-btn -->
                       */ ?>
                </div><!-- .products-single-contents__info -->
            </div><!-- .products-single-contents -->

            <div class="products-single-nav">
                <nav class="products-single-nav__pagenation">
                    <a href="<?php echo get_permalink($prev_post_id); ?>" class="products-single-nav__pagenation--prev">
                        <i class="jt-icon"><?php jt_svg('/images/icon/jt-icon/jt-chevron-left-tiny-3px-square.svg'); ?></i>
                        <span class="jt-typo--en jt-typo-en--07">PREV</span>
                    </a><!-- .products-single-nav__pagenation--prev -->

                    <a href="<?php echo get_permalink(27); ?>#<?php echo $hash; ?>" class="products-single-nav__pagenation--current">
                        <span class="sr-only"><?php _e('Go to list', 'jt'); ?></span>
                        <div class="products-single-nav__pagenation--current-btn"></div>
                    </a><!-- .products-single-nav__pagenation--current -->

                    <a href="<?php echo get_permalink($next_post_id); ?>" class="products-single-nav__pagenation--next">
                        <span class="jt-typo--en jt-typo-en--07">NEXT</span>
                        <i class="jt-icon"><?php jt_svg('/images/icon/jt-icon/jt-chevron-right-tiny-3px-square.svg'); ?></i>
                    </a><!-- .products-single-nav__pagenation--next -->
                </nav><!-- .products-single-nav__pagenation -->
            </div><!-- .products-single-nav -->
        </div><!-- .article -->
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>