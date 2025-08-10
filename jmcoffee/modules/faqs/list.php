<?php
/**
 * Modules Faqs 리스트
 */

defined('ABSPATH') || die(http_response_code(404));
?>

<div id="jt-<?php echo $namespace; ?>-list-wrap" class="jt-<?php echo $namespace; ?>-list-wrap">

	<div class="jt-category">
		<?php echo $this->category_menu(); ?>
	</div><!-- .jt-category-nav -->

	<?php if ($loop->have_posts()): ?>
		<ul class="jt-accordion">
			<?php
			while ($loop->have_posts()):
				$loop->the_post();

                if ($this->_support_cat) {
					$terms = wp_get_post_terms(get_the_ID(), $this->_namespace . '_categories');
				}

				$faqs_data = get_field('faqs');
				?>
				<li class="jt-accordion__item">
					<div class="jt-accordion__head">
                        <?php if (!empty($terms)): ?>
                            <span class="jt-accordion__cat">
                                <span class="jt-typo--en jt-typo-en--08"><?php echo $terms[0]->name; ?></span>
                            </span>
                        <?php endif; ?>
						<h2 class="jt-accordion__title jt-typo--05"><?php echo strip_tags(get_the_title()); ?></h2>
						<div class="jt-accordion__control">
                            <span class="sr-only"><?php _e('아코디언 토글', 'jt'); ?></span><i></i>
						</div><!-- .jt-accordion__control -->
					</div><!-- .jt-accordion__head -->

					<div class="jt-accordion__content">
						<div class="jt-accordion__content-inner">
							<p class="jt-accordion__title jt-typo--06"><?php echo $faqs_data['answer']; ?></p>
							<!-- .jt-blocks -->
						</div><!-- .jt-accordion__content_inner -->
					</div><!-- .jt-accordion__content -->
				</li><!-- .jt-accordion__item -->
			<?php endwhile; ?>
		</ul><!-- .jt-accordion -->

		<?php wp_reset_postdata(); ?>
	<?php else: ?>
		<div class="jt-list-nothing">
			<?php if (!empty($_REQUEST['search'])): ?>
				<b class="jt-typo--04"><?php _e('일치하는 게시물이 없습니다.', 'jt'); ?></b>
				<p class="jt-typo--07">
					<?php printf(__('<span>&ldquo;%s&rdquo;</span>에 대한 검색결과가 없습니다.', 'jt'), esc_attr($_REQUEST['search'])); ?>
				</p>
			<?php else: ?>
				<b class="jt-typo--04"><?php _e('컨텐츠 준비중 입니다.', 'jt'); ?></b>
				<p class="jt-typo--07"><?php _e('현재 컨텐츠를 준비하고 있으니 조금만 기다려 주세요. <br />더욱 나은 모습으로 찾아뵙겠습니다.', 'jt'); ?></p>
			<?php endif; ?>
		</div><!-- .jt-list-nothing -->
	<?php endif; ?>

	<?php echo $this->loadmore($loop, '<span lang="en">View more</span>', '.jt-accordion', '.jt-accordion'); ?>
</div><!-- #jt-<?php echo $namespace; ?>-list-wrap -->