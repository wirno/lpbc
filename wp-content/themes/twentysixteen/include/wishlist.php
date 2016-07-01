<?php 
global $post;
global $wpdb;
function createWishList(){

}

function addCastleToWishlist($id_Wishlist){

}

function nextIdWishlist(){
	$args=array(
		'post_type' => 'wishlist',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'caller_get_posts'=> 1
		);
	$query = new WP_Query($args);
	$list = array();

	if( $query->have_posts() ):
		while ( $query->have_posts() ) : $query->the_post();

	$idwishlist = get_post_custom_values('id_wishlist');
	array_push($list, $idwishlist[0]);
	endwhile;
	array_unique($list);
	arsort($list);
	endif;
	$id_wishlist_to_insert = $list[0];

	return $id_wishlist_to_insert+1;
}

function actualIdWishlist(){
	$args=array(
		'post_type' => 'wishlist',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'caller_get_posts'=> 1
		);
	$query = new WP_Query($args);
	$list = array();

	if( $query->have_posts() ):
		while ( $query->have_posts() ) : $query->the_post();

	$idwishlist = get_post_custom_values('id_wishlist');
	array_push($list, $idwishlist[0]);
	endwhile;
	array_unique($list);
	arsort($list);
	endif;
	$id_wishlist_to_insert = $list[0];

	return $id_wishlist_to_insert;
}

function listWishlistNameByInterest(){
	$actualID = actualIdWishlist();
	$i = 1;
	$wishlists=array();

	while ($i <= $actualID) {
		$args=array(
			'post_type' => 'wishlist',
			'post_status' => 'publish',
			'meta_query' => array(
				array(
	      			'key' => 'id_wishlist', // name of custom field
	      			'value' => "$i", 
	      			'compare' => 'LIKE'
	      			)
				)
			);
		$query = new WP_Query($args);
		$bool = true;

		if( $query->have_posts() ):
			while ( $query->have_posts() && $bool ) : $query->the_post();
		$wishlist_Name = get_post_custom_values('name_wishlist');
		$wishlists[$wishlist_Name[0]] = $query->post_count;
		$bool = false;
		endwhile;
		endif;
		$i++;
	}
	return $wishlists;
}
?>

