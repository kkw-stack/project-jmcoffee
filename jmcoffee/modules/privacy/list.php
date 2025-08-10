<?php
/**
 * Modules 개인정보 처리방침 리스트
 */

defined('ABSPATH') || die(http_response_code(404));
?>

<?php if ($loop->have_posts()): ?>
    <form class="privacy_form" method="post" data-ajax="<?php echo admin_url('admin-ajax.php'); ?>">

        <div class="article__header">
            <div class="wrap">
                <h1 class="article__title jt-typo--en jt-typo-en--02"><?php echo get_the_title(); ?></h1>
            </div><!-- .wrap -->
        </div><!-- .article__header -->

        <div class="article__body">
            <div class="wrap">
                <div class="privacy-content">
                    <div class="jt-blocks">
                        <?php echo $this->recent_posts(); ?>
                    </div><!-- .jt-blocks -->
                </div><!-- .privacy-content -->

                <?php if ($this->recent_posts_count() > 1) : ?>
                    <div class="privacy-select">
                        <div class="jt-choices__wrap">
                            <select class="jt-choices">
                                <?php while ($loop->have_posts()):
                                    $loop->the_post(); ?>
                                    <?php if ('publish' === get_post_status()): ?>
                                        <option value="<?php echo get_the_ID(); ?>"><?php the_title(); ?></option>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </select><!-- .jt-choices -->
                        </div><!-- .jt-choices__wrap -->
                    </div><!-- .privacy-select -->
                <?php endif; ?>
            </div><!-- .wrap -->
        </div><!-- .article__body -->
    </form>
<?php endif; ?>