<?php get_header(); ?>
<?php 
$current_user_id = get_current_user_id();
$unique_users_wishlist = array();

$args = array(
	'numberposts'   => -1,
	'post_type'     => 'wishlist',
	'meta_query'    => array(
		'relation'      => 'AND',
		array(
			'key'       => 'fav_wishlist',
			'value'     => false,
			'compare'   => '='
			),
		array(
			'key'       => 'id_auteur',
			'value'     => $current_user_id,
			'compare'   => '='
			)
		)
	);
$the_query = new WP_Query( $args );
if( $the_query->have_posts() ) {
	while ($the_query->have_posts() ) : $the_query->the_post();
	$get_num_wishlist = get_post_custom_values('num_wishlist');
	if(isset($get_num_wishlist) && !empty($get_num_wishlist)){
		$num_wishlist = $get_num_wishlist[0];
	}
	$get_post_id = get_post_custom_values('post_id');
	if(isset($get_post_id) && !empty($get_post_id)){
		$post_id = $get_post_id[0];
	}

	if($post_id && $num_wishlist){
		if(!isset($unique_users_wishlist['favoris'][$num_wishlist])){
			$unique_users_wishlist['favoris'][$num_wishlist] = array();
		}
		if(!in_array($post_id, $unique_users_wishlist['favoris'][$num_wishlist])){
			$unique_users_wishlist['favoris'][$num_wishlist] = $post_id;
		}
	}
	endwhile;
}





$args = array(
	'numberposts'   => -1,
	'post_type'     => 'wishlist',
	'meta_query'    => array(
		'relation'      => 'AND',
		array(
			'key'       => 'fav_wishlist',
			'value'     => true,
			'compare'   => '='
			),
		array(
			'key'       => 'id_auteur',
			'value'     => $current_user_id,
			'compare'   => '='
			)
		)
	);
$the_query = new WP_Query( $args );
if( $the_query->have_posts() ) {
	while ($the_query->have_posts() ) : $the_query->the_post();

	$get_num_wishlist = get_post_custom_values('num_wishlist');
	if(isset($get_num_wishlist) && !empty($get_num_wishlist)){
		$num_wishlist = $get_num_wishlist[0];
	}
	$get_post_id = get_post_custom_values('post_id');
	if(isset($get_post_id) && !empty($get_post_id)){
		$post_id = $get_post_id[0];
	}

	$get_name_wishlist = get_post_custom_values('nom_wishlist');
	if(isset($get_name_wishlist) && !empty($get_name_wishlist)){
		$name_wishlist = $get_name_wishlist[0];
	}
	if($post_id && $num_wishlist && $name_wishlist){
		if(!isset($unique_users_wishlist['wishlist'][$num_wishlist])){
			$unique_users_wishlist['wishlist'][$num_wishlist] = array();
		}
		if(!in_array($post_id, $unique_users_wishlist['wishlist'][$num_wishlist])){
			echo 'a';
			$unique_users_wishlist['wishlist'][$num_wishlist]['posts'][] = $post_id;
			$unique_users_wishlist['wishlist'][$num_wishlist]['name'] = $name_wishlist;
		}
	}
	endwhile;
}


$favoris_different_posttype = array();
foreach ($unique_users_wishlist['favoris'] as $key => $value) {
	$post_identifier = $value;
	$post = get_post($post_identifier);
	if($post){
		$fav_posttype = $post->post_type;
		if(!in_array($fav_posttype, $favoris_different_posttype)){
			$favoris_different_posttype[$fav_posttype] = 1;
		} else {
			$favoris_different_posttype[$fav_posttype] += 1;
		}
	}
}


if($unique_users_wishlist){
	$arrayPostData = array();
	foreach ($unique_users_wishlist['favoris'] as $key => $value) {
		$post_identifier = $value;
		$post = get_post($post_identifier);
		if($post){
    		//$description = get_post_custom_values('description');
			$post_permalink = get_permalink($post->ID);
		}
	}	
}

?>
<main id="main" role="main">
	<!-- Recherche châteaux -->
	<section id="castle-search-header" class="search-result-header header-global">
		<div class="home-main" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/monument-musee.jpg');">
			<div class="overlay"></div>
			<div class="discover-content">
				<h1>Mon espace</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse iaculis ante non eros convallis imperdiet
					sed eu felis.
				</p>
			</div>
		</div>
	</section>
	<!-- /Recherche châteaux -->

	<!-- /Populaires -->
	<div class="clear"></div>
	<!-- Result -->
	<section id="result">
		<div class="container">
			<div class="sidebar filter-sticker">
				<div class="search-menu">
					<div class="filter-button">
						<p class="left">Favoris</p>
						<p class="right"><?= count($unique_users_wishlist['favoris']); ?></p>
						<div class="clear"></div>
					</div>
					<div id="myDropdown" class="dropdown-content">
						<?php foreach ($favoris_different_posttype as $key => $value) {

							?><div class="filter" data-filter=".category-favoris-<?= $key; ?>">
							<p class="left"><?= $key; ?></p>
							<p class="right"><?= $value; ?></p>
							<div class="clear"></div>
						</div>
						<div class="line"></div>
						<?php } ?>
					</div>



					<div class="filter-button">
						<p class="left">Wishlist</p>
						<p class="right"><?= count($unique_users_wishlist['wishlist']); ?></p>
						<div class="clear"></div>
					</div>
					<div id="myDropdown" class="dropdown-content">
						<?php foreach ($unique_users_wishlist['wishlist'] as $key => $value) {
							?><div class="filter" data-filter=".category-wishlist-<?= $value['name']; ?>">
							<p class="left"><?= $value['name']; ?></p>
							<div class="clear"></div>
						</div>
						<div class="line"></div>
						<?php } ?>
					</div>
				</div>
			</div>





			<div class="content">
				<div id="Container">
					<?php
					foreach ($unique_users_wishlist['favoris'] as $key => $value) {
						$post_identifier = $value;
						$post = get_post($post_identifier);
						if($post){
							$large_imageurl = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
							if ( ! empty( $large_imageurl[0] ) ) {
								$imageurl = $large_imageurl[0];
							}
							?>
							<div class="mix category-favoris-<?= $post->post_type; ?> "  style="background-image: url('<?= esc_url($imageurl); ?>');">

								<div class="overlay"></div>
								<div class="card-container">
									<div class="main">
										<p><?php the_title(); ?></p>
									</div>
									<div class="hover">
										<span class="location">
											<svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
												<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
												<path d="M0 0h24v24H0z" fill="none"/></svg>
												<?php $commune = get_post_custom_values('commune'); ?>
												<p><?php print($commune[0]); ?>
													<?php if(isset($terms_region[0])) {
														print(" - " . $terms_region[0]->slug);
													} ?>
												</span>

												<div class="cta-discover">
													<a href="<?= the_permalink(); ?>">Voir</a>
												</div>

												<div class="fav-container">
													<a href="">
														<svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="28" width="28">
															<title>add-favorite</title>
															<path fill="none" class="filler" d="M16.5,3A6,6,0,0,0,12,5.09,6,6,0,0,0,7.5,3,5.45,5.45,0,0,0,2,8.5C2,12.28,5.4,15.36,10.55,20L12,21.35,13.45,20C18.6,15.36,22,12.28,22,8.5A5.45,5.45,0,0,0,16.5,3Z"/>
															<path fill="#f2d374" d="M16.5,3A6,6,0,0,0,12,5.09,6,6,0,0,0,7.5,3,5.45,5.45,0,0,0,2,8.5C2,12.28,5.4,15.36,10.55,20L12,21.35,13.45,20C18.6,15.36,22,12.28,22,8.5A5.45,5.45,0,0,0,16.5,3ZM12.1,18.55l-0.1.1-0.1-.1C7.14,14.24,4,11.39,4,8.5A3.42,3.42,0,0,1,7.5,5a3.91,3.91,0,0,1,3.57,2.36h1.87A3.88,3.88,0,0,1,16.5,5,3.42,3.42,0,0,1,20,8.5C20,11.39,16.86,14.24,12.1,18.55Z"/>
														</svg>
													</a>
												</div>
											</div>
										</div>
									</div>   
									<?php
								}
							}
							?>
							<?php
							foreach ($unique_users_wishlist['wishlist'] as $key => $value) {
								$first_post_identifier = $value['posts'][0];
								$first_post = get_post($first_post_identifier);
								if($post){
									$large_imageurl = wp_get_attachment_image_src( get_post_thumbnail_id( $first_post->ID ), 'large' );
									if ( ! empty( $large_imageurl[0] ) ) {
										$imageurl = $large_imageurl[0];
									}
									?>
									<div class="mix category-wishlist-<?= $value['name']; ?> "  style="background-image: url('<?= esc_url($imageurl); ?>');">
										<div class="overlay"></div>
										<div class="card-container">
											<div class="main">
												<p><?= $value['name']; ?></p>
											</div>
											<div class="hover">
												<span class="location">
													<?php $commune = get_post_custom_values('commune'); ?>
													<?php foreach ($value['posts'] as $k => $v) {
														$post_identifier = $v;
														$post = get_post($post_identifier);
														if($post) { 
															$title = get_the_title(); 
															?>
															<p><?= $title; ?></p>
															<?php }
														} 
														?>
													</span>

													<div class="cta-discover">
														<a href="<?= the_permalink(); ?>">Voir</a>
													</div>

													<div class="fav-container">
														<a href="">
															<svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="28" width="28">
																<title>add-favorite</title>
																<path fill="none" class="filler" d="M16.5,3A6,6,0,0,0,12,5.09,6,6,0,0,0,7.5,3,5.45,5.45,0,0,0,2,8.5C2,12.28,5.4,15.36,10.55,20L12,21.35,13.45,20C18.6,15.36,22,12.28,22,8.5A5.45,5.45,0,0,0,16.5,3Z"/>
																<path fill="#f2d374" d="M16.5,3A6,6,0,0,0,12,5.09,6,6,0,0,0,7.5,3,5.45,5.45,0,0,0,2,8.5C2,12.28,5.4,15.36,10.55,20L12,21.35,13.45,20C18.6,15.36,22,12.28,22,8.5A5.45,5.45,0,0,0,16.5,3ZM12.1,18.55l-0.1.1-0.1-.1C7.14,14.24,4,11.39,4,8.5A3.42,3.42,0,0,1,7.5,5a3.91,3.91,0,0,1,3.57,2.36h1.87A3.88,3.88,0,0,1,16.5,5,3.42,3.42,0,0,1,20,8.5C20,11.39,16.86,14.24,12.1,18.55Z"/>
															</svg>
														</a>
													</div>
												</div>
											</div>
										</div>   
										<?php
									}
								}
								?>

								<div class="pager-list">
									<!-- Pagination buttons will be generated here -->
								</div>
							</div>
						</div>
					</div>
				</section>
				<div class="clear"></div>
				<!-- /Result -->
			</main>
			<?php get_footer(); ?>
