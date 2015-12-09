<?php 
	$args = array(
		'parent' =>0,
		'orderby' => 'ID',
		'number' =>6
	);	
	$categories = get_categories( $args );
	if(!empty( $categories ) && ! is_wp_error( $categories ) ) :
		foreach($categories as $cats) :
			$Cat_ID = $cats->term_id;
			$j = 0;
			
			$sticky = get_option('sticky_posts');
			$args_post = array(
				'cat'				=>$Cat_ID,
				'no_found_rows'		=>1,
				'posts_per_page'	=>4,
				'post__in'			=> $sticky
			
			);
			
			$cat_query = new WP_Query( $args_post ); 
			$cat_title = get_the_category_by_ID($Cat_ID);
?>

	<div class="col-md-6 box-disease-item">
	<?php if( $cats->parent == 0 ) :  ?>
		<h2 class="title-box"><a href="<?php echo esc_url( get_category_link( $Cat_ID ) ); ?>"><?php echo $cat_title ; ?></a></h2>
	<?php endif; ?>	
		<ul>
		<?php if($cat_query->have_posts()) : ?>
			<?php while($cat_query->have_posts() ) : $cat_query->the_post(); $j++; ?>
				<?php if( $j == 1 ) :  ?>
					<li class="first-box">
						<div class="first-thumb pull-left">
							<a href="<?php the_permalink(); ?>">
								<?php if (has_post_thumbnail()) { the_post_thumbnail('category_thubnail');
							  } else { echo '<img src="http://placehold.it/155x105">'; } ?>
							</a>
						</div>
						<div class="first-header">
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<p><?php tie_excerpt_home(); ?></p>
						</div>
					</li>
					<?php else : ?>
					<li>
						<div class="thumb-box pull-left">
						<a href="<?php the_permalink(); ?>">
							<?php if (has_post_thumbnail()) { the_post_thumbnail('most_thumbnail');
							  } else { echo '<img src="http://placehold.it/62x42">'; } ?>
						</a></div>
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					</li>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
		</ul>
	</div>
	<?php endforeach; ?>
<?php endif; ?>