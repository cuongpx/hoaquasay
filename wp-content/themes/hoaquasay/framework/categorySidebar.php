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
	
	<?php $args = array(
		'style'              	=> 'list',
		'orderby'            	=> 'name',
		'show_count'         	=> 0,
		'use_desc_for_title' 	=> 0,
		'child_of'           	=> 0,
		'exclude'				=> '',
		'title_li'           	=> __( '' ),
		'show_option_none'   	=> __('No Menu Items'),
		'number'             	=> 6,
		'echo'               	=> 1,
		'depth'              	=> 2,
		'taxonomy'           	=> 'product_cat',
	); ?>
	<ul class="categoryList">   
		<?php wp_list_categories( $args ); ?>
	</ul>