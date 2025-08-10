<?php
/**
 * COFFEE BEANS 원두
 */

defined('ABSPATH') || die(http_response_code(404));

$coffee_beans = $loop->posts;
$coffee_beans_info = array_map(
    function ($post) {
        return get_field('coffee_beans', $post->ID);
    },
    $coffee_beans
);
?>

<div class="products-visual">
    <div class="products-visual__slider swiper">
        <div class="swiper-wrapper">
            <?php foreach ($coffee_beans as $idx => $item):
                $coffee_beans_data = $coffee_beans_info[$idx];
                $hash = strtolower(str_replace(array('<br>', '<br/>', '<br />'), '', preg_replace('/\s+/', '', $coffee_beans_data['product_name'])));
                ?>
                <div class="products-visual__slider-item swiper-slide" data-hash="<?php echo $hash; ?>">
                    <a href="<?php echo ($coffee_beans_data['use']) ? get_permalink($item->ID) : '#'; ?>" class="products-visual__slider-item-figure <?php echo ($coffee_beans_data['use']) ? 'custom-hover' : ''; ?>">
                        <div class="swiper-lazy" data-depth="0.6"
                            data-background="<?php echo jt_get_image_src($coffee_beans_data['thumbnail']['big'], 'jt_thumbnail_1200x931'); ?>">
                        </div>
                    </a><!-- .products-visual__slider-item-figure -->
                </div><!-- .products-visual__slider-item -->
            <?php endforeach; ?>
        </div><!-- .swiper-wrapper -->

        <div class="products-visual__title-wrap">
            <div class="products-visual__title">
                <?php foreach ($coffee_beans_info as $coffee_beans_data): ?>
                    <div class="products-visual__title-item">
                        <div class="products-visual__title-item-logo">
                            <i class="jt-icon"><?php jt_svg('/images/sub/products/coffee-beans-logo.svg'); ?></i>
                        </div><!-- .products-visual__title-item-logo -->

                        <span class="jt-typo--en jt-typo-en--10">
                            <?php echo $coffee_beans_data['product_name']; ?>
                        </span>
                    </div><!-- .products-visual__title-item -->
                <?php endforeach; ?>
            </div><!-- .products-visual__title -->

            <div class="swiper-navigation">
                <div class="swiper-button swiper-button-prev">
                    <div class="jt-icon"><?php jt_icon('jt-chevron-left-smaller-3px-square'); ?></div>
                    <span class="sr-only"><?php _e('이전', 'jt'); ?></span>
                </div><!-- .swiper-button-prev -->

                <div class="swiper-pagination"></div>

                <div class="swiper-button swiper-button-next">
                    <div class="jt-icon"><?php jt_icon('jt-chevron-right-smaller-3px-square'); ?></div>
                    <span class="sr-only"><?php _e('다음', 'jt'); ?></span>
                </div><!-- .swiper-button-next -->
            </div><!-- .swiper-navigation -->
        </div><!-- .products-visual__title-wrap -->
    </div><!-- .products-visual__slider -->

    <div class="products-visual__btn">
        <div class="jt-btn__underline"><span><?php _e('All Products', 'jt'); ?></span></div>
    </div><!-- .products-visual__btn -->
</div><!-- .products-visual -->

<div class="products-overlay"></div>

<div class="products-menu">
    <div class="products-menu__inner">
        <div class="products-menu__title">
            <h2 class="jt-typo--en jt-typo-en--04"><?php _e('All Products', 'jt'); ?></h2>
        </div><!-- .products-menu__title -->

        <div class="products-menu__list">
            <?php foreach ($coffee_beans as $idx => $item):
                $coffee_beans_data = $coffee_beans_info[$idx];
                ?>
                <a href="<?php echo ($coffee_beans_data['use']) ? get_permalink($item->ID) : '#'; ?>" class="products-menu__list-item <?php echo ($coffee_beans_data['use']) ? '' : 'no-single'; ?>">
                    <div class="products-menu__list-item-desc">
                        <h3 class="jt-typo--en jt-typo-en--06"><?php echo $coffee_beans_data['product_name']; ?></h3>
                        <p class="jt-typo--07"><?php echo $coffee_beans_data['info']['sub_title']; ?></p>
                    </div><!-- .products-menu__list-item-desc -->

                    <div class="products-menu__list-item-figure">
                        <figure class="jt-lazyload">
                            <img width="160" height="120" data-unveil="<?php echo jt_get_image_src($coffee_beans_data['thumbnail']['small'], 'jt_thumbnail_320x240'); ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/blank.gif" alt="" />
                            <noscript><img src="<?php echo jt_get_image_src($coffee_beans_data['thumbnail']['small'], 'jt_thumbnail_320x240'); ?>" alt="" /></noscript>
                        </figure><!-- .jt-lazyload -->
                    </div><!-- .products-menu__list-item-figure -->
                </a><!-- .products-menu__list-item -->
            <?php endforeach; ?>
        </div><!-- .products-menu__list -->
    </div><!-- .products-menu__inner -->
</div><!-- .products-menu -->