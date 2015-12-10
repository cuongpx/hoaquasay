<?php get_header(); ?>
	<main role="main">
		<div class="container">
			<div class="pull-left main-container">
				<div class="main-product">
					<h2 class="pro-title">Hoa quả sấy giòn</h2>
					<?php echo do_shortcode("[product_category category='hoa-qua-say-gion' per_page='6' columns='3' orderby='date' order='desc']"); ?>
				</div>
				<div class="main-product">
					<h2 class="pro-title">Hoa quả sấy dẻo</h2>
					<?php echo do_shortcode("[product_category category='hoa-qua-say-deo' per_page='6' columns='3' orderby='date' order='desc']"); ?>
				</div>
			</div>

			<?php get_sidebar(); ?>
		</div>
		<div class="clear"></div>
	</main>
<?php get_footer(); ?>
