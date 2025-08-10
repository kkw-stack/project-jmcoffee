<?php
/**
 * COFFEE BEANS 원두 상세
 */
?>

<?php ob_start(); ?>
<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()):
        the_post(); ?>
        <?php
        $coffee_beans = get_field('coffee_beans');
        $hash = strtolower(preg_replace('/\s+/', '', str_replace(['<br>', '<br/>', '<br />'], '', $coffee_beans['product_name'])));
        
        if (!$coffee_beans['use']) {
            echo "<meta name='robots' content='noindex, nofollow' />";

            wp_safe_redirect(get_permalink(65));
            exit;
        }

        $all_posts = get_posts([
            'post_type' => 'coffee_beans',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
        ]);

        $filtered_posts = array_values(array_filter(
            $all_posts,
            fn($post) =>
            ($coffee_beans = get_field('coffee_beans', $post->ID)) && $coffee_beans['use']
        ));

        $prev_post_id = $next_post_id = null;
        if ($filtered_posts) {
            $current_index = array_search(get_the_ID(), array_column($filtered_posts, 'ID'), true);

            $prev_post_id = $filtered_posts[$current_index - 1]->ID ?? end($filtered_posts)->ID;
            $next_post_id = $filtered_posts[$current_index + 1]->ID ?? $filtered_posts[0]->ID;
        }

        $info = $coffee_beans['info'] ?? array();
        $cupping_note = $coffee_beans['cupping_note'] ?? array();
        $product_info = $coffee_beans['product_info'] ?? array();
        $link = $coffee_beans['link'] ?? array();
        ?>
        <div class="article coffee-beans-single">
            <div class="products-single-contents">
                <div class="products-single-contents__model">
                    <div class="products-single-contents__figure">
                        <figure class="jt-lazyload">
                            <img width="2342" height="1908" data-unveil="<?php echo jt_get_image_src($info['image'], 'jt_thumbnail_2342x1908'); ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                            <noscript><img src="<?php echo jt_get_image_src($info['image'], 'jt_thumbnail_2342x1908'); ?>" alt="" /></noscript>
                        </figure><!-- .jt-lazyload -->
                    </div><!-- .products-single-contents__figure -->
                </div><!-- .products-single-contents__model -->

                <div class="products-single-contents__info">
                    <div class="products-single-contents__info-title">
                        <div class="products-single-contents__info-title-icon">
                            <i class="jt-icon"><?php jt_svg('/images/sub/products/coffee-beans-icon.svg'); ?></i>
                        </div><!-- .products-single-contents__info-title-icon -->

                        <h1 class="jt-typo--en jt-typo-en--02"><?php echo $coffee_beans['product_name']; ?></h1>

                        <b class="jt-typo--04"><?php echo $info['sub_title']; ?></b>
						
						<h1 class="jt-typo--09"><?php echo $info['level']; ?></h1>
						
                        <?php if (!empty($info['description'])): ?>
                            <p class="jt-typo--06"><?php echo $info['description']; ?></p>
                        <?php endif; ?>
                    </div><!-- .products-single-contents__info-title -->

                    <?php if (!empty($product_info)): ?>
                        <div class="products-single-contents__info-table">
                            <?php foreach ($product_info as $data): ?>
                                <div class="products-single-contents__info-table-item">
                                    <b class="jt-typo--en jt-typo-en--07"><?php echo $data['item']; ?></b>
                                    <span class="jt-typo--en jt-typo-en--07"><?php echo $data['content']; ?></span>
                                </div><!-- .products-single-contents__info-table-item -->
                            <?php endforeach; ?>
                        </div><!-- .products-single-contents__info-table -->
                    <?php endif; ?>

                    <?php if (!empty($cupping_note)): ?>
                        <div class="products-single-contents__info-note">
                            <h2 class="jt-typo--en jt-typo-en--05"><?php _e('Cupping note', 'jt'); ?></h2>

                            <div class="products-single-contents__info-note-cate">
                                <?php foreach (preg_split('/\s*,\s*/', $cupping_note['representative_note']) as $data): ?>
                                    <span class="jt-typo--en jt-typo-en--07"><?php echo htmlspecialchars($data); ?></span>
                                <?php endforeach; ?>
                            </div><!-- .products-single-contents__info-note-cate -->

                            <?php if (!empty($cupping_note['figure'])): ?>
                                <ul class="products-single-contents__info-note-percent">
                                    <?php foreach ($cupping_note['figure'] as $data): ?>
                                        <?php if (!empty($data)): ?>
                                            <li>
                                                <b class="jt-typo--en jt-typo-en--08"><?php echo $data['name']; ?></b>
                                                <div class="products-single-contents__info-note-percent-bar">
                                                    <span data-parent="<?php echo $data['number']; ?>"></span>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul><!-- .products-single-contents__info-note-percent -->
                            <?php endif; ?>
                        </div><!-- .products-single-contents__info-note -->
                    <?php endif; ?>

                    <?php if (!empty($link)): ?>
                        <div class="products-single-contents__info-link">
                            <h2 class="jt-typo--en jt-typo-en--05"><?php _e('Find out more', 'jt'); ?></h2>

                            <ul class="products-single-contents__info-link-list">
                                <?php foreach ($link as $data): ?>
                                    <li class="products-single-contents__info-link-list-item">
                                        <a href="<?php echo $data['url']; ?>" <?php echo (!empty($data['target'])) ? 'target="_blank"' : '' ?> rel="noopener">
                                            <span class="jt-typo--06"><?php echo $data['name']; ?></span>
                                            <i class="jt-icon"><?php jt_svg('/images/icon/jt-icon/jt-outlink.svg'); ?></i>
                                        </a>
                                    </li><!-- .products-single-contents__info-link-list-item -->
                                <?php endforeach; ?>
                            </ul><!-- .products-single-contents__info-link-list -->
                        </div><!-- .products-single-contents__info-link -->
                    <?php endif; ?>

                    <div class="products-single-contents__info-btn">
                        <a href="https://www.jmcoffeemall.com/" class="jt-btn__basic jt-btn--full" target="_blank" rel="noopener">
                            <span><?php _e('JM mall', 'jt'); ?></span>
                            <i class="jt-icon"><?php jt_svg('/images/icon/jt-icon/jt-outlink.svg'); ?></i>
                        </a>
                    </div><!-- .products-single-contents__info-btn -->
                    <?php /*
                             <div class="products-single-contents__back-btn">
                                 <?php 
                                 //$hash = strtolower(str_replace(array('<br>', '<br/>', '<br />'), '', preg_replace('/\s+/', '', $coffee_beans['product_name'])));
                                 $hash = strtolower(preg_replace('/\s+/', '', str_replace(['<br>', '<br/>', '<br />'], '', $coffee_beans['product_name'])));
                                 ?>
                                 <a href="<?php echo get_permalink(65); ?>#<?php echo $hash; ?>" class="jt-btn__underline"><span><?php _e('Go to list', 'jt'); ?></span></a>
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

                    <a href="<?php echo get_permalink(65); ?>#<?php echo $hash; ?>" class="products-single-nav__pagenation--current">
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
<?php ob_end_flush(); ?>