<?php
/**
 * Modules 문의하기 리스트
 */

defined('ABSPATH') || die(http_response_code(404));

$current_url = preg_replace( '/\/en\/(en\/)+/', '/en/', home_url( $_SERVER['REQUEST_URI'] ) );

$service = JT_Inquiry_Service::instance();

$inquiry_type = $service->get_types();
$inquiry_type_options = $service->get_type_values();

$args = [
	'search' => $_GET['search'] ?? '',
	'action' => $_GET['action'] ?? '',
	'type' => $_GET['type'] ?? '',
	'status' => $_GET['status'] ?? '',
];

$paged = max(1, intval($_REQUEST['paged'] ?? 1));

$total = $service->count_search($args);
$list = $service->search($args, $paged);
$total_pages = ceil($total / $service->get_rpp());
$search = $search ?? '';
?>

<style>
	.wp-list-table th,
	.wp-list-table td {
		position: relative;
		text-align: center;
		vertical-align: middle;
	}

	.wp-list-table th:after {
		content: '';
		position: absolute;
		top: 50%;
		right: -1px;
		transform: translateY(-50%);
		height: 50%;
		width: 1px;
		background-color: #ddd;
	}

	.wp-list-table th:last-child:after,
	.wp-list-table td:last-child:after {
		display: none;
	}

	th.jt-column-header-num {
		width: 10px;
	}

	th.jt-column-header-code,
	th.jt-column-header-name,
	th.jt-column-header-phone,
	th.jt-column-header-email,
	th.jt-column-header-company,
	th.jt-column-header-date {
		width: 80px;
	}

	td.jt-column-body-code {
		text-align: left;
		padding-left: 30px;
	}

	.toggle-content {
		display: none;
	}

	.toggle-content table {
		width: 100%;
		max-height: 150px;
	}

	.toggle-content td {
		border: 1px solid #ddd;
		right: -1px;
	}

	.toggle-content td:first-child {
		width: 191px;
		vertical-align: middle;
		text-align: center;
	}

	.toggle-content td:last-child {
		border-right: none;
		text-align: left;
		padding: 20px;
	}

	.accordion-content td {
		padding: 0;
	}

	.accordion-toggle {
		cursor: pointer;
	}

	.accordion-toggle button.button.delete {
		color: #b32d2e;
		border-color: #b32d2e;
	}

	p.nofounds {
		text-align: center;
		line-height: 50px;
	}
</style>

<div class="wrap">
	<h1>문의 리스트</h1>

	<form id="posts-filter" method="get">
		<input type="hidden" name="page" value="<?php echo $_REQUEST['page']; ?>">

		<ul class="subsubsub">
			<li>
				<a href="<?php echo remove_query_arg('status', $current_url); ?>" <?php echo 'trash' !== $args['status'] ? 'class="current"' : ''; ?> aria-current="page">
					모두 <span class="count">(<?php echo $service->count_total(); ?>)</span>
				</a> |
			</li>
			<li>
				<a href="<?php echo add_query_arg('status', 'trash', $current_url); ?>" <?php echo 'trash' === $args['status'] ? 'class="current"' : ''; ?>>
					휴지통 <span class="count">(<?php echo $service->count_trashed(); ?>)</span>
				</a>
			</li>
		</ul>

		<p class="search-box">
			<input type="search" id="post-search-input" name="search" value="<?php echo $search; ?>" />
			<input type="submit" id="search-submit" class="button" value="검색" />
		</p><!-- .search-box -->

		<div class="tablenav top">
			<div class="alignleft actions">
				<select name="type">
					<option value="">전체</option>
					<?php if (!empty($inquiry_type)): ?>
						<?php foreach ($inquiry_type_options as $type): ?>
							<option value="<?php echo $type; ?>" <?php selected($args['type'], $type); ?>>
								<?php echo $type; ?>
							</option>
						<?php endforeach; ?>
					<?php endif; ?>
				</select>
				<input type="submit" id="filter_type" class="button" value="조회" />
			</div><!-- .actions -->

			<div class="alignright">
				<div class="tablenav-pages <?php echo $total_pages > 1 ? '' : 'one-page'; ?>">
					<span class="displaying-num"><?php echo $total; ?> 아이템</span>
					<?php if ($total_pages > 1): ?>
						<span class="pagination-links">
							<?php if ($paged > 1): ?>
								<a class="first-page tablenav-pages-navspan button" title="Go to the first page" href="<?php echo remove_query_arg('paged', $current_url); ?>">«</a>
								<a class="prev-page tablenav-pages-navspan button " title="Go to the previous page" href="<?php echo add_query_arg('paged', $paged - 1, $current_url); ?>">‹</a>
							<?php else: ?>
								<span class="tablenav-pages-navspan button disabled" aria-hidden="true">«</span>
								<span class="tablenav-pages-navspan button disabled" aria-hidden="true">‹</span>
							<?php endif; ?>
							<span class="paging-input">
								<span class="total-pages"><?php echo $total_pages; ?></span>의 <?php echo $paged; ?>
							</span>

							<?php if ($paged < $total_pages): ?>
								<a class="next-page button" title="Go to the next page" href="<?php echo add_query_arg('paged', $paged + 1, $current_url); ?>">›</a>
								<a class="last-page button" title="Go to the last page" href="<?php echo add_query_arg('paged', $total_pages, $current_url); ?>">»</a>
							<?php else: ?>
								<span class="tablenav-pages-navspan button disabled" aria-hidden="true">›</span>
								<span class="tablenav-pages-navspan button disabled" aria-hidden="true">»</span>
							<?php endif; ?>
						</span>
					<?php endif; ?>
				</div>
			</div>
			<br class="clear" />
		</div>

		<table class="wp-list-table widefat fixed">
			<thead>
				<tr>
					<th scope="col" class="manage-column column-primary jt-column-header-num">번호</th>
					<th scope="col" class="manage-column column-primary jt-column-header-code">문의유형</th>
					<th scope="col" class="manage-column column-primary jt-column-header-name">이름</th>
					<th scope="col" class="manage-column column-primary jt-column-header-phone">전화번호</th>
					<th scope="col" class="manage-column column-primary jt-column-header-email">이메일</th>
					<th scope="col" class="manage-column column-primary jt-column-header-company">회사명</th>
					<th scope="col" class="manage-column column-primary jt-column-header-date">접수일자</th>
					<th scope="col" class="manage-column column-primary jt-column-header-num">관리</th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($list)): ?>
					<?php foreach ($list as $idx => $item): ?>
						<?php
						$tmp_date = strtotime($item['updated']);
						?>

						<tr class="accordion-toggle" style="<?php echo 0 === $idx % 2 ? 'background-color: #f6f7f7' : ''; ?>" data-id="<?php echo $item['id']; ?>">
							<td><?php echo $total - (($paged - 1) * $service->get_rpp()) - $idx; ?></td>
							<td><?php echo $item['type']; ?></td>
							<td><?php echo $service->escape_text($item['name'], true); ?></td>
							<td><?php echo $item['phone']; ?></td>
							<td><?php echo antispambot($item['email']); ?></td>
							<td><?php echo $service->escape_text($item['company']); ?></td>
							<td><?php echo date('Y년 m월 d일', $tmp_date) . '<br>' . date('H시 i분', $tmp_date); ?></td>
							<td>
								<button type="button" class="button delete" data-status="<?php echo (!empty($_GET['status'])) ? $_GET['status'] : ''; ?>" data-id="<?php echo $item['id']; ?>">삭제</button>
							</td>
						</tr>
						<tr class="accordion-content" data-id="<?php echo $item['id']; ?>">
							<td colspan="8">
								<div class="toggle-content">
									<table>
										<tr>
											<td>내용</td>
											<td><?php echo nl2br($service->escape_text($item['content'])); ?></td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="8">
							<p class="nofounds">등록된 게시물이 없습니다</p>
						</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</form>
</div>

<script>
	jQuery(function ($) {
		$('.accordion-toggle').click(function () {
			var id = $(this).data('id');
			var accordionContent = $(this).next('.accordion-content').find('.toggle-content');

			$('.toggle-content').not(accordionContent).slideUp();
			accordionContent.slideToggle();
		});

		$('.button.delete').on('click', function (e) {
			e.stopPropagation();

			const ajaxUrl = window.location.pathname.includes('/en/')
				? '/en/wp-admin/admin-ajax.php'
				: '/wp-admin/admin-ajax.php';

			var text = '선택된 데이터가 삭제됩니다. 삭제된 데이터는 휴지통으로 이동됩니다.';
			if ($(this).data('status')) {
				var text = '정말로 삭제하시겠습니까? 삭제된 데이터는 다시 복구할 수 없습니다.';
			}

			if (confirm(text)) {
				$.post(ajaxUrl, {
					action: 'jm_inquiry_delete',
					status: $(this).data('status'),
					id: $(this).data('id'),
				}, function (res) {
					if (res.success) {
						alert('삭제되었습니다.');
						location.reload();
					} else {
						alert('오류가 발생했습니다.');
					}
				});
			}
		});
	});
</script>