<?php get_header(); ?>
	<div class="container">
		<div class="pull-left main-container">
			<?php get_breadcrumb_navigation(); ?>
			<h1 class="titlePosts"><?php the_title(); ?></h1>

		<?php  while (have_posts()) : the_post(); ?>

			<div class="entry-posts"><!--Start entry-posts-->
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="entry-content">
					<article class="entry-content">
						<?php the_content(); ?>

						<?php edit_post_link(); ?>
					</article>
				</div>
			</div>

		<?php endwhile; ?>
			<div class="clear"></div>
				
		</div>

	<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>
