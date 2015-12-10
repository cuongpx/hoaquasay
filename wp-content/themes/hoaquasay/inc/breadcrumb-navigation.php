<?php
function get_breadcrumb_navigation() {
	$delimiter = '/';
	$home = '<i class="fa fa-home"></i> Trang chủ';
	$before = '<span>';
	$after = '</span>';
	echo '<div id="breadcrumb">';
	global $post;
	$homeLink = get_bloginfo('url');
	echo '<a rel="nofollow" href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
	if ( is_category() ) {
		
		global $wp_query;
		$cat_obj = $wp_query->get_queried_object();
		$thisCat = $cat_obj->term_id;
		$thisCat = get_category($thisCat);
		$parentCat = get_category($thisCat->parent);
		if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
		echo $before . single_cat_title('', false). $after;
		
	} elseif ( is_day() ) {
		
		echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
		echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
		echo $before . 'Archive by date "' . get_the_time('d') . '"' . $after;
		
	} elseif ( is_month() ) {
		
		echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
		echo $before . 'Archive by month "' . get_the_time('F') . '"' . $after;
		
	} elseif ( is_year() ) {
		
		echo $before . 'Archive by year "' . get_the_time('Y') . '"' . $after;
		
	} elseif ( is_single() && !is_attachment() ) {
		if ( get_post_type() != 'post' ) {
			
			$post_type = get_post_type_object(get_post_type());
			$slug = $post_type->rewrite;
			echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
			
		} else {
			
			$cat = get_the_category(); $cat = $cat[0];
			echo ' ' . get_category_parents($cat, TRUE, ' ' . $delimiter . ' ') . ' ';
			echo $before .  get_the_title() . $after;
		}
	} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
		
		$post_type = get_post_type_object(get_post_type());
		echo $before . $post_type->labels->singular_name . $after;
		
	} elseif ( is_attachment() ) {
		
		$parent_id  = $post->post_parent;
		$breadcrumbs = array();
		
	while ($parent_id) {
		
		$page = get_page($parent_id);
		$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
		$parent_id    = $page->post_parent;
		
	}
	$breadcrumbs = array_reverse($breadcrumbs);
	foreach ($breadcrumbs as $crumb) echo ' ' . $crumb . ' ' . $delimiter . ' ';
	
		echo $before . get_the_title() . $after;
		
	} elseif ( is_page() && !$post->post_parent ) {
		
		echo $before . get_the_title() . $after;
		
	} elseif ( is_page() && $post->post_parent ) {
		
		$parent_id  = $post->post_parent;
		$breadcrumbs = array();
		
	while ($parent_id) {
		
		$page = get_page($parent_id);
		$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
		$parent_id    = $page->post_parent;
	}
	$breadcrumbs = array_reverse($breadcrumbs);
	foreach ($breadcrumbs as $crumb) echo ' ' . $crumb . ' ' . $delimiter . ' ';
	echo $before . get_the_title() . $after;
	} elseif ( is_search() ) {
		
		echo $before . 'Từ khóa tìm kiếm: "' . get_search_query() . '"' . $after;
		
	} elseif ( is_tag() ) {
		
		echo $before . 'Bài viết theo từ khóa "' . single_tag_title('', false) . '"' . $after;
		
	} elseif ( is_author() ) {
		
		global $author;
		$userdata = get_userdata($author);
		echo $before . 'Các bài viết đăng bởi "' . $userdata->display_name . '"' . $after;
		
	} elseif ( is_404() ) {
		
		echo $before .'Lỗi 404 không tìm thấy trang' . '"&nbsp;' . $after;
		
	}
	//if ( get_query_var('paged') ) {
		
	//	if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
	//	echo ('Page') . ' ' . get_query_var('paged');
	//	if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
	//	
	//}
	echo '</div><!-- / Bloglow breadcrumb navigation without a plugin -->';
}





