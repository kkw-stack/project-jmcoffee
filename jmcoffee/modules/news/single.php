<?php
/**
 * Modules 뉴스 리스트
 */

defined('ABSPATH') || die(http_response_code(404));
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <?php global $jt_module; ?>

        <?php
        // Categories
        $taxonomy_name = $jt_module->_namespace.'_categories';
        
        if( $jt_module->_support_cat ) {
            $terms = get_the_terms( get_the_ID() , $taxonomy_name );
        }

        // post pagenation
        $link = get_permalink($jt_module->_pageid);
        $cate = isset($_GET['cate']) ? sanitize_text_field($_GET['cate']) : '';

        $prev_post_id = get_adjacent_post(false, '', false);
        $next_post_id  = get_adjacent_post(false, '', true);
        $prev_link = get_permalink( $prev_post_id );
        $next_link = get_permalink( $next_post_id ) ;

        if (!empty($terms) && !empty($cate)) {
            $prev_post_id = get_adjacent_post(true, '', false, $taxonomy_name);
            $next_post_id  = get_adjacent_post(true, '', true, $taxonomy_name);

            $link = get_permalink($jt_module->_pageid) . '?cate=' .$cate;
            $prev_link = get_permalink( $prev_post_id ) . '?cate=' .$cate;
            $next_link = get_permalink( $next_post_id ) . '?cate=' .$cate;
        }

        //$url = get_permalink($jt_module->_pageid) . '?cate=' . $terms[0]->slug;
        ?>

        <div class="jt-single">
            <div class="wrap-small">
                <div class="jt-single__header">
                    <h1 class="jt-single__title jt-typo--03"><?php echo get_the_title(); ?></h1>
                    
                    <div class="jt-single__meta">
                        <?php if ( !empty( $terms ) ) : ?>
                            <span class="jt-single__cat jt-typo--en jt-typo-en--08"><?php echo $terms[0]->name; ?></span>
                        <?php endif; ?>
                        <time class="jt-single__date jt-typo--en jt-typo-en--08" datetime="<?php echo get_the_time( 'Y-m-d' ); ?>"><?php echo get_the_time( 'Y.m.d' ); ?></time>
                    </div><!-- .jt-single__meta -->
                </div><!-- .jt-single__header -->

                <div class="jt-single__body">
                    <div class="jt-single__content">
                        <div class="jt-blocks">
                            <?php the_content(); ?>
                        </div><!-- .jt-blocks -->
                    </div><!-- .jt-single__content -->

                    <div class="jt-single__pagination">
                        <?php if ( ! empty( $prev_post_id ) ) : ?>
                            <a class="jt-single__pagination-link jt-single__pagination-link--prev" href="<?php echo $prev_link; ?>">
                                <b class="jt-typo--en jt-typo-en--09" lang="en">PREV</b>
                                <span class="jt-typo--06"><?php echo get_the_title( $prev_post_id ); ?></span>
                            </a>
                        <?php else : ?>
                            <span class="jt-single__pagination-title jt-typo--06"><b class="jt-typo--en jt-typo-en--09" lang="en">PREV</b><?php _e( '이전 글이 없습니다.', 'jt' ); ?></span>
                        <?php endif; ?>

                        <?php if ( ! empty( $next_post_id ) ) : ?>
                            <a class="jt-single__pagination-link jt-single__pagination-link--next" href="<?php echo $next_link; ?>">
                                <b class="jt-typo--en jt-typo-en--09" lang="en">NEXT</b>
                                <span class="jt-typo--06"><?php echo get_the_title( $next_post_id ); ?></span>
                            </a>
                        <?php else : ?>
                            <span class="jt-single__pagination-title jt-typo--06"><b class="jt-typo--en jt-typo-en--09" lang="en">NEXT</b><?php _e( '다음 글이 없습니다.', 'jt' ); ?></span>
                        <?php endif; ?>
                    </div><!-- .jt-single__pagination -->
                        
                    <div class="jt-single__control">
                        <a class="jt-btn__underline" href="<?php echo $link; ?>"><span><?php _e( 'Go to list', 'jt' ); ?></span></a>
                    </div><!-- .jt-single__control -->
                </div><!-- .jt-single__body -->
            </div><!-- .wrap-small -->
        </div><!-- .jt-single -->

    <?php endwhile; ?>

<?php endif; ?>

<?php
/*
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) :
    comments_template();
endif;
*/
?>

<?php get_footer(); ?>
