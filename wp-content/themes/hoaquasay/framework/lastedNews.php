<?php 
	$arg = array(
		'posts_per_page'	=>6
	);
	$query = new WP_query( $arg );
	$i = 0;
	if( $query->have_posts() ) :
	while( $query->have_posts() ) : $query->the_post(); $i++;
	if($i==1):
?>

	<li class="first-lastest">
		<div class="thumb-lastest pull-left">
		<?php if( is_home() ) : ?>
			<a href="<?php the_permalink()?>" rel="" title="<?php the_title(); ?>">
			<?php if (has_post_thumbnail()) {
					the_post_thumbnail('category_thubnail');
			} else { echo '<img width="133px" height="100px" src="http://placehold.it/155x105">'; }
			?></a>
		<?php else : ?>
			<a href="<?php the_permalink()?>" rel="" title="<?php the_title(); ?>"> <?php if (has_post_thumbnail()) {
							the_post_thumbnail('post_thumbnail');
							} else { echo '<img src="http://placehold.it/115x86">'; }
				?></a>
		<?php endif; ?>
		</div>
		<div class="tit-intro">
			<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<p><?php excerpt_home(); ?></p>
		</div>
	</li>
	<?php else : ?>
	
	<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
	
	<?php endif; ?>
<?php endwhile; ?>	
<?php wp_reset_postdata(); ?>
<?php else :?>
		
<p><?php _e( 'Xin lỗi.!, Không có bài viết nào được hiển thị.' ); ?></p>

<?php endif; ?>