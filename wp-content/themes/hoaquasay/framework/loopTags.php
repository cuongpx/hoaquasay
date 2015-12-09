	<?php 
	$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;			
	$catname = $_GET['names'];
	$tagslug = $_GET['tags'];
	
		$args = array( 'category_name' => $catname, 'tag' => $tagslug, 'paged' => $paged );

		$query = new WP_Query( $args );
		if( $query->have_posts() ) :
			while ($query->have_posts()) : $query->the_post();?>
			
			<section class="list-post">
					<div class="pull-left">
						<?php 
							if (has_post_thumbnail()) {
								the_post_thumbnail('category_thubnail');
							} else { echo '<img src="http://placehold.it/155x105">'; } 
						?>
					</div>
					<article  class="pull-right post-intro">
						<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
						<p><?php the_excerpt();?></p>
					</article>
			</section>
			
			<?php  endwhile; ?>
			
			<?php else :?>
				
			<p><?php _e( 'Xin lỗi.!, Không có bài viết nào được hiển thị.' ); ?></p>

			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		<div class="pull-right pagination">	
			<?php 
			$big = 999999999; 
			//echo "<div class='pull-right pagination'";
				echo paginate_links( array(
					//'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $query->max_num_pages,
					'prev_text'          => __('« Trang trước'),
					'next_text'          => __('Tiếp theo »'),

				) );
			///echo "</div>";
			?>
			</div>