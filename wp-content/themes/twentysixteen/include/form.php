<?php 
global $post;
global $wpdb;


var_dump($_POST);
if(isset($_POST['wishlist'])){
// on est dans la partie wishlist
	
	if(isset($_POST['id_wishlist'])){
		// on est dans ajouter a une wishlist
		if(isset($_POST['id_user'], $_POST['id_chateau'], $_POST['name_wishlist']) && (!empty($_POST['id_user']) && !empty($_POST['id_chateau']) && !empty($_POST['id_wishlist']) && !empty($_POST['name_wishlist']))){
			// on test la validation des champs
			
			$user_id = $_POST['id_user'];
			$chateau_id = $_POST['id_chateau'];
			$wishlist_id = $_POST['id_wishlist'];
			$wishlist_name = $_POST['name_wishlist'];

			$my_post = array(
				'post_title' => $wishlist_name . $wishlist_id. $chateau_id,
				'post_date' => date('Y-m-d H:i:s'),
				'post_status' => 'publish',
				'post_author' => get_current_user_id(),
				'post_type' => 'wishlist');
			$post_id = wp_insert_post($my_post);
			var_dump($post_id);



			update_field('id_wishlist', $wishlist_id, $post_id);
			update_field('name_wishlist', $wishlist_name, $post_id);
			update_field('id_chateau', $chateau_id, $post_id);
			update_field('id_user', $user_id, $post_id);
		}
	}
	else{
	// on est dans crer une wishlist
		if(isset($_POST['id_user'], $_POST['id_chateau'], $_POST['name_wishlist']) && (!empty($_POST['id_user']) && !empty($_POST['id_chateau']) && !empty($_POST['name_wishlist']))){

			$user_id = $_POST['id_user'];
			$chateau_id = $_POST['id_chateau'];
			$wishlist_id = nextIdWishlist();
			$wishlist_name = $_POST['name_wishlist'];

			$my_post = array(
				'post_title' => $wishlist_name . $wishlist_id. $chateau_id,
				'post_date' => date('Y-m-d H:i:s'),
				'post_status' => 'publish',
				'post_author' => get_current_user_id(),
				'post_type' => 'wishlist');
			$post_id = wp_insert_post($my_post);


			update_field('id_wishlist', $wishlist_id, $post_id);
			update_field('name_wishlist', $wishlist_name, $post_id);
			update_field('id_chateau', $chateau_id, $post_id);
			update_field('id_user', $user_id, $post_id);
		}
	}
} 
// on est dans les fav
else{

}
?>
