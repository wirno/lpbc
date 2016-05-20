<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<?php if (have_posts()) : ?>
    <!--  Si j'ai des Posts -->
    <div class="content">
    <?php while (have_posts()) : the_post(); ?>
    	<h1 class="fullType"><?php the_title()?></h1>
    	<div><?php the_field('nom'); ?></div>
    	<div><?php the_field('nom_local'); ?></div>
    	<div><?php the_field('description'); ?></div>
    	<div><?php the_field('pays'); ?></div>
    	<div><?php the_field('departement'); ?></div>
    	<div><?php the_field('commune'); ?></div>
    	<div><?php the_field('coordonnee'); ?></div>
    	<div><?php the_field('adresse'); ?></div>
    	<div><?php the_field('monument_historique'); ?></div>
    	<div><?php the_field('historique'); ?></div>
    	<div><?php the_field('debut_construction'); ?></div>
    	<div><?php the_field('fin_construction'); ?></div>
    	<div><?php the_field('usage_actuel'); ?></div>
    	<div><?php the_field('usage_initial'); ?></div>
    	<div><?php the_field('proprietaire_actuel'); ?></div>
    	<div><?php the_field('proprietaire_initial'); ?></div>
    	<div><?php the_field('duree_visite'); ?></div>
    	<div><?php the_field('family_friendly'); ?></div>
    	<div><?php the_field('access_handicape'); ?></div>
    	<div><?php the_field('site_web'); ?></div>
    	<div><?php the_field('telephone'); ?></div>
    	<div><?php the_field('image_full'); ?></div>
    	<div><?php the_field('image_small'); ?></div>
    	<div><?php the_field('architecte'); ?></div>
    	<div><?php the_field('personnage_celebre'); ?></div>
    	<div><?php the_field('film'); ?></div>
    	<div><?php the_field('coup_de_coeur'); ?></div>
    	<div><?php the_field('spectacle'); ?></div>
    <?php endwhile;endif; ?>
    <div id="map" style="height:500px;width: 500px;"></div>

<?php 
$coor = get_post_custom_values('coordonnee');
$str=$coor[0];
$data = DMStoDD($str);
$longitude = ConvertDMSToDD($data['long']);
$lattitude = ConvertDMSToDD($data['lat']);
 ?>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdvOlziA7luvB_ViQePNMTuPIMIWVaTms&libraries=places"></script>

<script type="text/javascript">
var map;
var infowindow;

function initMap() {
  var pyrmont = {lat: <?php echo $longitude; ?>, lng: <?php echo $lattitude; ?>};

  map = new google.maps.Map(document.getElementById('map'), {
    center: pyrmont,
    zoom: 15
  });

  infowindow = new google.maps.InfoWindow();

  var service = new google.maps.places.PlacesService(map);
  service.nearbySearch({
    location: pyrmont,
    radius: 500,
    types: ['restaurant']
  }, callback);
}

function callback(results, status) {
  if (status === google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      createMarker(results[i]);
    }
  }
}

function createMarker(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location
  });

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
  });
}
initMap();
</script>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
