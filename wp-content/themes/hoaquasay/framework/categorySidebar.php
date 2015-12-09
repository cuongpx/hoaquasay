<h3>Sản phẩm</h3>
<?php
	if ( is_single() ) :
	global $post;
	$category_detail=get_the_category( $post->ID );
	$cat_curent = $category_detail['0']->term_id;
?>
<script>
	jQuery(function () {
		var cat_current = <?php echo $cat_curent; ?>;
		if(cat_current){
			var currentCat = '.categoryList li.cat-item-'+cat_current;
			jQuery(currentCat).addClass('current-cat');
		}
	});
</script>

<?php endif; ?>
	
	<?php 
	$args = array(
		//'orderby'	=> 'name',
		//'exclude'	=> '',
		'taxonomy'  => 'product_cat'
	);
	$categories = get_terms( $args,'' );
	
	?>
	<ul class="categoryList">  
		
		<?php foreach( $categories  as $cate) : ?>
		
			<li class="cat-item-<?php echo $cate->term_id; ?>"><a href="<?php echo get_term_link($cate) ?>" title="<?php echo $cate->name;  ?>"><?php echo $cate->name;  ?></a></li>
		
		<?php endforeach; ?>
		
	</ul>