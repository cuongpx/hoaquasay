<?php get_header(); ?>
<div class="container">
		
	<div class="pull-left main-container">
	
		<?php get_breadcrumb_navigation(); ?>

			<h1 class="titlePosts"><?php echo sprintf( __( '%s Kết quả tìm kiếm cho từ khóa: ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

			<?php get_template_part('woocommerce/archive-product'); ?>

	</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
