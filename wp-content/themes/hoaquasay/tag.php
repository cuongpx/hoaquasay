<?php get_header(); ?>
<div class="container">
		<div class="pull-right main-container">
		
			<?php get_breadcrumb_navigation(); ?>
			
			<h1 class="titlePosts"><?php _e( 'Từ khóa: ', 'html5blank' ); echo single_tag_title('', false); ?></h1>
		<div class="entry-posts">
			<?php get_template_part('framework/loopTags'); ?>
		</div>

		</div>

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
