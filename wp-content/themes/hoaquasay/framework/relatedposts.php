		<?php 
			 $orig_post = $post;
			global $post;
			$categories = get_the_category($post->ID);

			if ($categories) {
			$cate_ids = array();
			foreach($categories as $individual_tag) $cate_ids[] = $individual_tag->term_id;
				
			$args=array(
			'category__in' => $cate_ids,
			'post__not_in' => array($post->ID),
			'posts_per_page'=>8,
			'caller_get_posts'=>1
			);
			
			$my_query = new wp_query( $args );
			
			//var_dump($my_query);
			$i = 0;
			if( $my_query->have_posts() ) {
			echo '<div id="relatedposts" class="posts-related"><h3>Bài viết cùng chủ đề</h3>';
			while( $my_query->have_posts() ) : $my_query->the_post(); $i++; ?>
			
				<div class="col-related col-md-3 col-sm-4 col-xs-12">
					<div class="related-title">
						<h4><a href="<?php the_permalink()?>" rel="" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
					</div>
					<div class="thumb-related"><a href="<?php the_permalink()?>" rel="" title="<?php the_title(); ?>"> <?php if (has_post_thumbnail()) {
								the_post_thumbnail('post_thumbnail');
								} else { echo '<img src="http://placehold.it/216x146">'; }
							?></a>
					</div>
					<div class="intro-related">
						
						<p><?php the_excerpt();?></p>
					</div>
				</div>
				
			<?php endwhile;
			echo '</div>';
			}
			}
			$post = $orig_post;
			wp_reset_postdata(); 
			?>