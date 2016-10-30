<?php get_header(); ?>

<?php


$terms = get_terms('style', array('hide_empty' => false));
$count_style_post = [];
if($terms){
	foreach ($terms as $key => $value) {
		$args = array(
			'post_type' => 'chateaux',
			'tax_query' => array(
				array(
					'taxonomy' => 'style',
					'field'    => 'slug',
					'terms'    => $value->slug
				)
			)
		);
		$chateau_query = new WP_Query($args);
		$count_style_post[$value->slug] = array(
			'chateau'=>$chateau_query->post_count
		);
	}
}
$total_style = 0;
foreach ($count_style_post as $key => $value) {
	$total_style += $value['chateau'];
}



    $args = array(
		'post_type' => 'chateaux',
		'orderby'=>'asc',
		'tax_query' => array(
			array(
				'taxonomy' => 'tag',
				'field'    => 'slug',
				'terms'    => 'a-la-une'
			)
		)
	);

	$the_query = new WP_Query( $args );
	if ($the_query->have_posts() ) :
		while ($the_query->have_posts() ) : $the_query->the_post();
			if ( has_post_thumbnail() ) {
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
				if ( ! empty( $large_image_url[0] ) ) {
					$imageurl = $large_image_url[0];
				}
			}
			$description = get_post_custom_values('description');
			$short_description = get_short_description($description[0], 60, 80);




?>
<main id="main" role="main">
	<!-- Recherche châteaux -->
	<section id="castle-search-header" class="search-result-header header-global">
		<div class="home-main" style="background-image: url('<?= esc_url($imageurl); ?>');">
			<div class="overlay"></div>
			<div class="discover-content">
				<h1>Découvrez <?php the_title(); ?></h1>
				<p><?php print($short_description); ?></p>

			</div>
		</div>
		<div class="link">
			<span>
				<p>Image : <?php the_title(); ?></p>
				<div class="cta">
					<a href="http://lpbc.dev/chateaux/chateau-desclimont/">Voir</a>
				</div>
			</span>
		</div>
	</section>
	<?php
		endwhile;
	endif;
	?>
	<!-- /Recherche châteaux -->

	<!-- Populaires -->
	<section id="reknown">
		<div class="container">
			<span>
				<h2>Styles populaires</h2>
				<ul>
					<?php foreach ($count_style_post as $key => $value) {
						if($value['chateau'] != 0) { ?>
					<li><a class="active" href=""><?php print($key); ?></a> <span><?php print($value['chateau']); ?></span></li>
					<?php
						}
					} ?>
				</ul>
			</span>
		</div>
	</section>
	<!-- /Populaires -->
	<div class="clear"></div>
	<!-- Result -->
	<section id="result">
		<div class="container">
			<div class="sidebar filter-sticker">
				<div class="search-menu">
					<div class="filter-button">
						<p class="left">Régions</p>

						<?php 
						$terms = get_terms('regions', array('hide_empty' => false));
						$count_regions_post = [];
						if($terms){
							foreach ($terms as $key => $value) {
								$args = array(
									'post_type' => 'chateaux',
									'tax_query' => array(
										array(
											'taxonomy' => 'regions',
											'field'    => 'slug',
											'terms'    => $value->slug
											)
										)
									);
								$chateau_query = new WP_Query($args);
								$count_regions_post[$value->slug] = array(
									'chateau'=>$chateau_query->post_count
									);
							}
						}
						$total_region = 0;
						foreach ($count_regions_post as $key => $value) {
							$total_region += $value['chateau'];
						}
						?>
						<p class="right"><?php print($total_region); ?></p>
						<div class="clear"></div>
					</div>
					<div id="myDropdown" class="dropdown-content">
						<?php foreach ($count_regions_post as $key => $value) {
							if($value['chateau'] != 0){
								?><div class="filter" data-filter=".category-<?php print($key);?>">
								<p class="left"><?php print($key); ?></p>
								<p class="right"><?php print($value['chateau']); ?></p>
								<div class="clear"></div>
							</div>
							<div class="line"></div>
							<?php
						}
					} 
					?>
				</div>


				<div class="filter-button">
					<p class="left">Styles</p>
					<p class="right"><?php print($total_style); ?></p>
					<div class="clear"></div>
				</div>
				<div id="myDropdown" class="dropdown-content">
					<?php foreach ($count_style_post as $key => $value) {
						if($value['chateau'] != 0){
							?>
							<div class="filter" data-filter=".category-<?php print($key);?>">
								<p class="left"><?php print($key); ?></p>
								<p class="right"><?php print($value['chateau']); ?></p>
								<div class="clear"></div>
							</div>
							<div class="line"></div>
							<?php
						}
					} 
					?>
				</div>










				<?php
				$terms = get_terms('epoque', array('hide_empty' => false));
				$count_epoque_post = [];
				if($terms){
					foreach ($terms as $key => $value) {
						$args = array(
							'post_type' => 'chateaux',
							'tax_query' => array(
								array(
									'taxonomy' => 'epoque',
									'field'    => 'slug',
									'terms'    => $value->slug
									)
								)
							);
						$chateau_query = new WP_Query($args);
						$count_epoque_post[$value->slug] = array(
							'chateau'=>$chateau_query->post_count
							);
					}
				}
				$total_epoque = 0;
				foreach ($count_epoque_post as $key => $value) {
					$total_epoque += $value['chateau'];
				}
				?>
				<div class="filter-button">
					<p class="left">Époque</p>
					<p class="right"><?php print($total_epoque); ?></p>
					<div class="clear"></div>
				</div>
				<div id="myDropdown" class="dropdown-content">
					<?php 
					foreach ($count_epoque_post as $key => $value) {
						if($value['chateau'] != 0){
							?><div class="filter" data-filter=".category-<?php print($key);?>">
							<p class="left"><?php print($key); ?></p>
							<p class="right"><?php print($value['chateau']);?></p>
							<div class="clear"></div>
						</div>
						<div class="line"></div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</div>

	
	<div class="content">
		<div id="Container">
			<?php 
			$args= array(
				'post_type' =>'chateaux',
				'orderby'=>'asc'
				);
			$the_query = new WP_Query( $args );
			if ($the_query->have_posts() ) : 
				while ($the_query->have_posts() ) : $the_query->the_post(); 
			$terms_region = wp_get_post_terms($post->ID, 'regions', array("fields" => "all"));
			$terms_style = wp_get_post_terms($post->ID, 'style', array("fields" => "all"));
			$terms_epoque = wp_get_post_terms($post->ID, 'epoque', array("fields" => "all"));
			if ( has_post_thumbnail() ) {
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
				if ( ! empty( $large_image_url[0] ) ) {
					$imageurl = $large_image_url[0];
				}
			}
			?>
			<div class="mix category-<?php print($terms_region[0]->slug);?> category-<?php print($terms_style[0]->slug);?> category-<?php print($terms_epoque[0]->slug);?>"  style="background-image: url('<?= esc_url($imageurl); ?>');">

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
									<a href="<?= the_permalink(); ?>">Découvrir</a>
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
				<?php endwhile;endif; ?>
				<div class="pager-list">
					<!-- Pagination buttons will be generated here -->
				</div>
			</div>
		</div>
	</div>
</section>
<div class="clear"></div>
<!-- /Result -->

<!-- Article -->
<section id="castle-region" class="banner-bottom" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/main_castle.jpg');">
	<div class="clear"></div>
	<div class="overlay"></div>
	<div class="content">
		<h2>Comment préparer sa visite ?</h2>
		<div class="cta-discover">
			<a href="">Lire</a>
		</div>
	</div>
</section>
<!-- /Article -->

<!-- Région à la une -->
<?php 
$terms_castle_region =array();
    $args = array(
        'post_type' => 'chateaux',
    );
    $the_query = new WP_Query($args);



if ($the_query->have_posts() ) :

    while ($the_query->have_posts() ) : $the_query->the_post();

	$term_list = wp_get_post_terms($post->ID, 'regions', array("fields" => "all"));

	if(array_key_exists($term_list[0]->slug, $terms_castle_region)){
		$terms_castle_region[$term_list[0]->slug] +=1;
	} else {
		$terms_castle_region[$term_list[0]->slug] = 0;
	}
	endwhile;
endif;
arsort($terms_castle_region);
$top_region = array_slice($terms_castle_region,0,3);

$array_coor = array();
foreach ($top_region as $key => $value) {
	$args = array(
        'post_type' => 'region',
        'tax_query' => array(
            array(
                'taxonomy' => 'regions',
                'field'    => 'slug',
                'terms'    => $key
            )
        )
    );
    $the_query = new WP_Query($args);
	if ($the_query->have_posts() ) :
	    while ($the_query->have_posts() ) : $the_query->the_post();
            $coor = get_post_custom_values('coordonnee');
            $array_region_data[$key] = array(
            	'coor'=>$coor[0],
            	'castle' => $value
            	);

        if ( has_post_thumbnail() ) {
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
            if ( ! empty( $large_image_url[0] ) ) {
                $array_region_data[$key]['image'] = $large_image_url[0];
            }
        }

        $description = get_post_custom_values('description');
        $short_description = get_short_description($description[0], 60, 80);
        $array_region_data[$key]['description'] = $short_description;
		endwhile;
	endif;

	$args = array(
        'post_type' => 'evenements',
        'tax_query' => array(
            array(
                'taxonomy' => 'regions',
                'field'    => 'slug',
                'terms'    => $key
            )
        )
    );
    $the_query = new WP_Query($args);
    $array_region_data[$key]['event'] = (int)$the_query->post_count;


	$args = array(
        'post_type' => 'monuments-et-musees',
        'tax_query' => array(
            array(
                'taxonomy' => 'regions',
                'field'    => 'slug',
                'terms'    => $key
            )
        )
    );
    $the_query = new WP_Query($args);
	$array_region_data[$key]['mmh'] = (int)$the_query->post_count;
}
?>
<section class="castle-proximity region-map">
	<div class="left" id="map-region">
		<div class="header-cards">
			<span>
				<h2>Régions à la une</h2>
				<div class="cta">
					<a href="">Tout voir</a>
				</div>
			</span>
		</div>
	</div>
				<?php 
					$active = true;
					foreach ($array_region_data as $key => $value) {
						if($active){
							?><div class="right location-description location-1-description active" style="background-image: url('<?= esc_url($value['image']); ?>');" data-region= <?php print($key); ?>>
							<?php $active = false;
						}
						else{
							?><div class="right location-description location-1-description" style="background-image: url('<?= esc_url($value['image']); ?>');" data-region=<?php print($key); ?>>
							<?php } ?>
					<h3><?php print($key); ?></h3>
					<p><?php print($value['description']); ?></p>
					<ul>
						<li><?php print($value['castle']); ?> châteaux</li>
						<li><?php print($value['mmh']); ?> monuments et musées</li>
						
						<li><?php print($value['event']); ?> événements</li>
					</ul>
					<div class="cta-discover">
						<a href="#">Découvrir</a>
					</div>	
				</div>
					<?php } ?>
	</section>

<!-- /Région à la une -->
</main>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdvOlziA7luvB_ViQePNMTuPIMIWVaTms&libraries=places">
</script>
<script>
    function initialize_map_1() {
        var myLatLng = {lat: 47.211783, lng: 2.508676};

		var map = new google.maps.Map(document.getElementById('map-region'), {
		    zoom: 6,
		    center: myLatLng
		});


		<?php
		foreach ($array_region_data as $key => $value) {
			$data = DMStoDD($value['coor']);
    		$longitude = ConvertDMSToDD($data['long']);
    		$lattitude = ConvertDMSToDD($data['lat']); ?>
    		var regionMarker = new google.maps.LatLng(<?php print($lattitude); ?>, <?php print($longitude); ?>);


		var marker = new google.maps.Marker({
		    position: regionMarker,
		    map: map,
		    title: <?php print('"' . $key . '"');?>
		  });

		attachEventMarker(marker);


		<?php } ?>

		}

		function attachEventMarker(marker) {
        marker.addListener('click', function() {
        	console.log(marker.title);
	    		$('.location-description.active').stop().fadeOut(400, function() {
	    			$(this).removeClass('active');
	    			$('[data-region="' + marker.title +'"]').stop().fadeIn().addClass('active');
	    		});  	
	    });
        }
    
    


    initialize_map_1();
    google.maps.event.addDomListener(window, 'load', initialize_map_1);
</script>
<?php
get_footer();
