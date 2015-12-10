<!-- sidebar -->
<aside class="sidebar">
	<div class="sidebar-menu bar">
		<?php get_template_part('framework/categorySidebar'); ?>
	</div>
	<div class="clearfix"></div>
	<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>

</aside>
<!-- /sidebar -->
