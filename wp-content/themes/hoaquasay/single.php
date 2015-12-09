<?php get_header(); ?>
<div class="container">	

	<div class="pull-left main-container">
		<?php get_breadcrumb_navigation(); ?>
		
			 <?php setpostview( get_the_ID() ); ?>	
			<?php $a = getpostviews( get_the_ID() );?>

	<?php  while (have_posts()) : the_post(); ?>
	
			<h1 style="" class="titlePosts"><?php the_title();?></h1>
			<?php edit_post_link();?>
			
			<div style="" class="meta-posts">
				<?php echo "Cập nhật: ".get_the_time('d/m/Y G:i')." - ".$a; ?>
			</div>
			<div class="entry-posts"><!--Start entry-posts-->
				<article class="entry-content">
					<?php the_content();?>
				</article>
			</div><!--End entry-posts-->
			<?php endwhile; ?>
			
			
			<div class="box-data">		
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				<script type="text/javascript">
				  (function() {
					var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
					po.src = 'https://apis.google.com/js/plusone.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
				  })();
				</script>
				<div class="lop2">
						<table width="30%" border="0">
				  <tr>
					<td><fb:like send="true" layout="button_count" width="450" show_faces="true"></fb:like></td>
					<td style="padding-left: 30px; position: relative; top: 8px;"><div class="g-plusone" style="padding-left:20px;"></div></td>
					</table>
				</div>
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
			'posts_per_page'=>10,
			'caller_get_posts'=>1
			);
			
			$my_query = new wp_query( $args );
			
			//var_dump($my_query);
			$i = 0;
			if( $my_query->have_posts() ) {
			echo '<div id="relatedposts" class="posts-related"><h3>Bài viết liên quan</h3><ul>';
			while( $my_query->have_posts() ) {
				$i++;
			$my_query->the_post(); ?>
			<li <?php if($i%2==0){echo "class='liActive'";}else{echo "";} ?>>
				<div class="thumb-related"><a href="<?php the_permalink()?>" rel="" title="<?php the_title(); ?>"> <?php if (has_post_thumbnail()) {
							the_post_thumbnail('post_thumbnail');
							} else { echo '<img src="http://placehold.it/115x86">'; }
						?></a>
				</div>
				<div class="intro-related">
					<h4><a href="<?php the_permalink()?>" rel="" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
					<p><?php the_excerpt();?></p>
				</div>
			</li>
			<?php }
			echo '</ul></div>';
			}
			}
			$post = $orig_post;
			wp_reset_postdata(); 
			?>
			
		</div>
	
	</div>


<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
