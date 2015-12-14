	<div class="entry-posts">
	<?php
					while ( have_posts() ) : the_post();

				?>
					<section class="list-post">
						<div class="pull-left">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php 
								if (has_post_thumbnail()) {
									the_post_thumbnail('category_thubnail');
								} else { echo '<img src="http://placehold.it/185x125">'; } 
							?>
							</a>
						</div>
						<article  class="pull-right post-intro">
							<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
							<p><?php the_excerpt();?></p>
						</article>
					</section>
				<?php
				endwhile;
				?>
	</div>
	
	<?php
		kriesi_pagination();
	?>