<?php get_header(); ?>
<div class="container">
	<div class="pull-left main-container">
	
	<?php get_breadcrumb_navigation(); ?>
	
		<h1 class="titlePosts"><?php single_cat_title();?></h1>
		
			<div id="descript-taxonomy">
					<?php echo term_description( $term_id, $taxonomy )?>
				</div>
			<!--<img src="<?php //bloginfo('template_directory'); ?>/image/benh-xa-hoi-danh-muc.jpg" alt="Bệnh xã hội danh mục bệnh"/>-->
			
			<!--Hien thi tag theo danh muc-->	
				<?php  //showalltags(); ?>

			<!--Hien thi danh sach bai viet theo danh muc-->
			<?php
				get_template_part('template','category' );
			?>

	</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
