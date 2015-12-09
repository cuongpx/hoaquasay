<!-- sidebar -->
<aside class="sidebar">
<?php if( !is_home() ) : ?>
	<div class="sidebar-menu bar">
		<?php get_template_part('framework/categorySidebar'); ?>
	</div>
<?php endif; ?>	

	<div class="clearfix"></div>
	<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>

</aside>
<!-- /sidebar -->
