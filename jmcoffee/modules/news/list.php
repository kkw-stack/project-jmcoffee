<?php
/**
 * Modules 뉴스 리스트
 */

defined('ABSPATH') || die(http_response_code(404));
?>

<div id="jt-<?php echo $namespace; ?>-list-wrap" class="jt-<?php echo $namespace; ?>-list-wrap">

	<div class="jt-category">
		<?php echo $this->category_menu(); ?>
	</div><!-- .jt-category-nav -->

	<?php if ($loop->have_posts()): ?>
		<ul class="jt-news-list">
			<?php
			while ($loop->have_posts()):
				$loop->the_post();

				if ($this->_support_cat) {
					$terms = wp_get_post_terms(get_the_ID(), $this->_namespace . '_categories');
				}

				$news = get_field('news');
				$news_thumbnail = jt_get_image_src($news['thumbnail'], 'jt_thumbnail_433x433');
				$cate = (!empty($_GET['cate'])) ? $_GET['cate'] : '';
				?>
				<li class="jt-news-list__item">
					<a class="jt-news-list__link" href="<?php echo (!empty($_GET['cate'])) ? add_query_arg( 'cate', $_GET['cate'], the_permalink() ) : the_permalink(); ?>">
						<div class="jt-news-list__content">
							<div class="jt-news-list__title-wrap">
								<?php if (!empty($terms)): ?>
									<span class="jt-news-list__cat">
										<span class="jt-typo--en jt-typo-en--08"><?php echo $terms[0]->name; ?></span>
									</span>
								<?php endif; ?>
								<h2 class="jt-news-list__title jt-typo--05">
									<span><?php echo strip_tags(get_the_title()); ?></span>
								</h2>
							</div><!-- .jt-news-list__title-wrap -->

							<time class="jt-news-list__date jt-typo--en jt-typo-en--08" datetime="<?php echo get_the_time('Y-m-d'); ?>"><?php echo get_the_time('Y.m.d'); ?></time>
						</div><!-- .jt-news-list__content -->

						<?php if (!empty($news_thumbnail)): ?>
							<div class="jt-news-list__thumb">
								<figure class="jt-lazyload">
									<span class="jt-lazyload__color-preview"></span>
									<img width="280" height="193" data-unveil="<?php echo $news_thumbnail; ?>" src="<?php bloginfo('template_directory'); ?>/images/layout/blank.gif" alt="" />
									<noscript><img src="<?php echo $news_thumbnail; ?>" alt="" /></noscript>
								</figure>
							</div><!-- .jt-news-list__thumb -->
						<?php endif; ?>
					</a><!-- .jt-news-list__link -->
				</li><!-- .jt-news-list__item -->
			<?php endwhile; ?>
		</ul><!-- .jt-news-list -->

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

	<?php /* <div class="jt-pagination"><?php echo $this->pagination( $loop ); ?></div> */ ?>
	<?php echo $this->loadmore($loop, '<span lang="en">View more</span>', '.jt-news-list', 'jt-news-list'); ?>
</div><!-- #jt-<?php echo $namespace; ?>-list-wrap -->