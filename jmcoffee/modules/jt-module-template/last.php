<?php if($loop->have_posts()) : ?>

    <div class="jt-last-post jt-last-post--<?php echo $type ?>">

        <ul class="jt-card-list">

            <?php while($loop->have_posts()) : $loop->the_post(); ?>

            <li class="jt-card-list__item">
                <a class="jt-card-list__link" href="<?php the_permalink(); ?>">
                    <div class="jt-card-list__content">
                        <h2 class="jt-card-list__title jt-typo--07"><span><?php echo strip_tags( get_the_title() ); ?></span></h2>
                        <?php if( !empty( get_the_excerpt() ) ) : ?><p class="jt-card-list__desc jt-typo--10"><?php echo strip_tags( get_the_excerpt() ); ?></p><?php endif; ?>
                        <time class="jt-card-list__date jt-typo--en jt-typo-en--02" datetime="<?php echo get_the_time('Y-m-d') ?>"><?php echo get_the_time('Y.m.d'); ?></time>
                    </div><!-- .jt-card-list__content -->
                </a><!-- .jt-card-list__link -->
            </li><!-- .jt-card-list__item -->

            <?php
                endwhile;
                wp_reset_postdata();
            ?>
            
        </ul><!-- .jt-card-list -->

    </div><!-- .jt-last-post -->

<?php else : ?>

    <div class="jt-list-nothing">
        <b class="jt-typo--04"><?php _e( '컨텐츠 준비중 입니다.', 'jt' ); ?></b>
        <p class="jt-typo--10"><?php _e( '현재 컨텐츠를 준비하고 있으니 조금만 기다려 주세요. <br />더욱 나은 모습으로 찾아뵙겠습니다.', 'jt' ); ?></p>
    </div><!-- .jt-list-nothing -->

<?php endif; ?>
