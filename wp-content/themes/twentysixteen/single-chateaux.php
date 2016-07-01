  <?php get_header();
if (have_posts()) :
  while (have_posts()) : the_post();
    $terms_region = wp_get_post_terms($post->ID, 'regions', array("fields" => "all"));
    $terms_style = wp_get_post_terms($post->ID, 'style', array("fields" => "all"));
    $terms_epoque = wp_get_post_terms($post->ID, 'epoque', array("fields" => "all"));
?>
<main id="main" role="main">
<!-- Header -->
<section class="header-global" id="castle-header">
<div class="home-main" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/main_castle.jpg');">
<div class="overlay"></div>
<div class="discover-content">
<span>
<h1><?php the_title(); ?></h1>
<a href="#modal-choice" class="like">
  <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="28" width="28">
    <title>add-favorite</title>
    <path class="filler" d="M16.5,3A6,6,0,0,0,12,5.09,6,6,0,0,0,7.5,3,5.45,5.45,0,0,0,2,8.5C2,12.28,5.4,15.36,10.55,20L12,21.35,13.45,20C18.6,15.36,22,12.28,22,8.5A5.45,5.45,0,0,0,16.5,3Z"/>
    <path fill="#e6e6e6" d="M16.5,3A6,6,0,0,0,12,5.09,6,6,0,0,0,7.5,3,5.45,5.45,0,0,0,2,8.5C2,12.28,5.4,15.36,10.55,20L12,21.35,13.45,20C18.6,15.36,22,12.28,22,8.5A5.45,5.45,0,0,0,16.5,3ZM12.1,18.55l-0.1.1-0.1-.1C7.14,14.24,4,11.39,4,8.5A3.42,3.42,0,0,1,7.5,5a3.91,3.91,0,0,1,3.57,2.36h1.87A3.88,3.88,0,0,1,16.5,5,3.42,3.42,0,0,1,20,8.5C20,11.39,16.86,14.24,12.1,18.55Z"/>
  </svg>
</a>
</span>
<?php $description = get_post_custom_values('description'); 
$short_description = get_short_description($description[0], 60, 80);?>
<p><?php print($short_description); ?>
</p>
</div>
</div>
</section>
<!-- /Header -->

<!-- Infos -->
<section id="castle-infos">
<div class="general">
<h2>General</h2>
<ul>
<li>
<h3>Région</h3>
<p><?php print($terms_region[0]->slug); ?></p>
</li>
<li>
<h3>Style</h3>
<p><?php print($terms_style[0]->slug); ?></p>
</li>
<li>
<h3>Époque</h3>
<p><?php print($terms_epoque[0]->slug); ?></p>
</li>
<li>
<h3>Tags</h3>
<p>Louis XIV, Baroque, Jardin, Soleil</p>
</li>
</ul>
<a href="#">Signaler une erreur</a>
</div>
<div class="pratique">
<h2>Pratique</h2>
<div>
<h3>Adresse</h3>
<p><?php the_field('adresse'); ?></p>
</div>
<div>
<h3>Horaires</h3>
<p><?php the_field('horaire'); ?></p>
</div>
<div class="tarifs">
<h3>Tarifs</h3>
<?php the_field(tarif); ?>
</div>
<div>
<h3>Info pratique</h3>
<p>Parking :<?php $handi = get_post_custom_values('access_handicape'); if($handi[0]){print('oui');}else{print('non');}?>- Famille : <?php $famille = get_post_custom_values('family_friendly'); if($famille[0]){print('oui');}else{print('non');}
?></p>
</div>
</div>
</section>
<!-- /Infos -->

<!-- Description -->
<section id="castle-description">
<h2>Description</h2>
<div class="main">
<p>
<?php $get_description = get_post_custom_values('description');
$description = $get_description[0];
$explode_description = explode("============", $description);
print($explode_description[0]);
?>
</p>
<p><?php print($explode_description[1]); ?></p>
<p><?php print($explode_description[2]); ?></p>
</div>
<div class="sided">
<div class="left">
<img src="<?php echo get_template_directory_uri(); ?>/img/description-article.png" alt="">
</div>
<div class="right">
<p><?php print($explode_description[3]); ?></p>
<p><?php print($explode_description[4]); ?></p>
</div>
</div>
<div class="sided text">
<div class="left">
<p><?php print($explode_description[5]); ?></p>
<p><?php print($explode_description[6]); ?></p>
</div>
<div class="right">
<p><?php print($explode_description[7]); ?></p>
<p><?php print($explode_description[8]); ?></p>
</div>
</div>
</section>
<div class="clear"></div>
<!-- /Description -->

<!-- Histoire -->
<section class="castle-timeline">
<h2>L'histoire</h2>
<div class="timeline">
<ul>
<?php $get_historique = get_post_custom_values('historique');
$histoire = $get_historique[0];
$explode_histoire = explode("============", $histoire);
foreach ($explode_histoire as $key => $value) {
 ?>
<li>
<div>
  <h3><?php the_title(); ?></h3>
  <p><?php print($value); ?></p>
  <a href="">
    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 48 48" fill="#edcd89">
      <path d="M0 0h48v48h-48z" fill="none"/>
      <path d="M36 32.17c-1.52 0-2.89.59-3.93 1.54l-14.25-8.31c.11-.45.18-.92.18-1.4s-.07-.95-.18-1.4l14.1-8.23c1.07 1 2.5 1.62 4.08 1.62 3.31 0 6-2.69 6-6s-2.69-6-6-6-6 2.69-6 6c0 .48.07.95.18 1.4l-14.1 8.23c-1.07-1-2.5-1.62-4.08-1.62-3.31 0-6 2.69-6 6s2.69 6 6 6c1.58 0 3.01-.62 4.08-1.62l14.25 8.31c-.1.42-.16.86-.16 1.31 0 3.22 2.61 5.83 5.83 5.83s5.83-2.61 5.83-5.83-2.61-5.83-5.83-5.83z"/>
    </svg>
  </a>
</div>
</li>
<?php
}
?>
</ul>
</div>
</section>
<!-- /Histoire -->
<?php endwhile;endif; ?>
<!-- Architecture -->
<section class="castle-archi">
<div class="sided">
<div class="left">
<h2>L'architecture</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non enim nec enim auctor tincidunt. Nulla auctor varius ex. Curabitur sit amet nulla ut diam porttitor tristique. Etiam sit amet porta tellus. Nullam sit amet tellus turpis. Fusce ipsum turpis, congue ac vehicula non, gravida sit amet ligula. Etiam sollicitudin finibus neque, ut viverra felis suscipit vel. Vivamus maximus, est eget bibendum blandit, lacus purus sodales ex, in sagittis mauris massa sit amet arcu. Praesent condimentum metus lectus, rutrum tempor metus vulputate ac. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam mattis tellus id lorem tempus, quis convallis sem imperdiet.</p>
<p>Sed vestibulum felis risus, ac ultricies mauris mattis in. Etiam vel massa sit amet nisi consectetur feugiat. Phasellus sed odio nec felis ornare interdum proin nisl.</p>
</div><div class="right">
<div class="top">
<img src="<?php echo get_template_directory_uri(); ?>/img/main_castle.jpg" alt="">
</div>
<div class="bottom">
<div class="left" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/description-article.png');">
</div><div class="right" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/description-article.png');">
</div>
</div>
</div>
</div>
</section>
<!-- /Architecture -->
<?php 
$coor = get_post_custom_values('coordonnee');
$str=$coor[0];
$data = DMStoDD($str);
$longitude = ConvertDMSToDD($data['long']);
$lattitude = ConvertDMSToDD($data['lat']);
 ?>

<!-- Proximité -->
<section class="castle-proximity">
<h2>À proximité</h2>
<div class="left" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/map.png');">
<ul>
<li class="actual map-container"><a class="active map-hover" href="#">Châteaux</a></li><li class="map-container"><a class="map-hover" href="#">Hébergements</a></li><li class="map-container"><a class="map-hover" href="#">Restaurants</a></li>
</ul>
</div><div class="right" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/map-custom.png');">
<h3>Le petit roi</h3>
<div class="location">
<span>
<svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
<path d="M0 0h24v24H0z" fill="none"/></svg>
<p>Louveciennes (3 km)</p>
</span>
</div>
<div class="notes">
<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 51 48">
<title>Five Pointed Star</title>
<path fill="#f2d374" stroke="#f2d374" stroke-width="3" d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
</svg><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 51 48">
<title>Five Pointed Star</title>  
<path fill="#f2d374" stroke="#f2d374" stroke-width="3" d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
</svg><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 51 48">
<title>Five Pointed Star</title>
<path fill="#f2d374" stroke="#f2d374" stroke-width="3" d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
</svg><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 51 48">
<title>Five Pointed Star</title>
<path fill="#f2d374" stroke="#f2d374" stroke-width="3" d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
</svg><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 51 48">
<title>Five Pointed Star</title>
<path fill="none" stroke="#f2d374" stroke-width="3" d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
</svg>
<p>18 notes</p>
</div>
<div class="price">
<?php for($i = 1; $i <= 3; $i++): ?>
<img src="<?php echo get_template_directory_uri(); ?>/img/euro.png" alt="Euro">
<?php endfor; ?>
</div>
<div class="cta-discover">
<a href="#">Découvrir</a>
</div>  
</div>
</section>
<!-- /Proximité -->







<!-- Événements -->
<section id="castle-events">
<div class="header-cards">
<span>
<h2>Événements</h2>
<div class="cta">
<a href="">Tout voir</a>
</div>
</span>
</div>
<div class="swiper-container">
<div class="swiper-wrapper">
<?php 
$args = array(
  'post_type' => 'evenements',
  'tax_query' => array(
    array(
      'taxonomy' => 'regions',
      'field'    => 'slug',
      'terms'    => $terms_region[0]->slug
      )
    )
  );
$the_query = new WP_Query($args);

  if ($the_query->have_posts() ) : 
    while ($the_query->have_posts() ) : $the_query->the_post();
    ?>
    <div class="swiper-slide event-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/chateau-une.png');">
<div class="overlay"></div>
<div class="main">
<div class="content">
  <div class="main">
    <h4><?php the_title(); ?></h4>
    <span class="location">
      <svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
        <path d="M0 0h24v24H0z" fill="none"/></svg>
        <p><?php print($terms_region[0]->slug); ?></p>
      </span>
    </div>
    <div class="hover">
    <?php $get_description = get_post_custom_values('description'); 
      $description = get_short_description($get_description[0], 60, 80); ?>
      <p><?php print($description); ?></p>

      <div class="cta-discover">
        <a href="<?php the_permalink(); ?>">Découvrir</a>
      </div>

      <div class="tags">
        <span>
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" height="18" width="18" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-199 188 100 100" style="enable-background:new -199 188 100 100;" xml:space="preserve" fill="#eece84">
            <style type="text/css">
              .st0{display:none;}
              .st1{display:inline;}
            </style>
            <g class="st0">
              <path class="st1" d="M-149,220c9.9,0,18,8.1,18,18c0,9.9-8.1,18-18,18c-9.9,0-18-8.1-18-18C-167,228.1-158.9,220-149,220 M-149,202
              c-19.9,0-36,16.1-36,36s16.1,36,36,36c19.9,0,36-16.1,36-36S-129.1,202-149,202L-149,202z"/>
            </g>
            <g class="st0">
              <path class="st1" d="M-148.5,210c-19.9,0-36,11-36,24.7c0,6.5,3.7,12.3,9.6,16.7l-4,14.6l20.5-7.6c3.1,0.6,6.4,1,9.9,1
              c19.9,0,36-11.1,36-24.7C-112.6,221.1-128.7,210-148.5,210z"/>
            </g>
            <g class="st0">
              
              <rect x="-183.8" y="220.1" transform="matrix(0.7071 0.7071 -0.7071 0.7071 121.7817 176.2556)" class="st1" width="63.8" height="30"/>
              <polygon class="st1" points="-134.2,274 -134.2,274 -113,274 -113,252.8 -113,252.8   "/>
            </g>
            <path d="M-108.5,188.1h-35.7c-2.5,0-4.9,1-6.7,2.8l-45.2,45.2c-3.7,3.7-3.7,9.7,0,13.5l35.6,35.6c1.9,1.9,4.3,2.8,6.7,2.8
            c2.4,0,4.9-0.9,6.7-2.8l45.3-45.2c1.8-1.8,2.8-4.2,2.8-6.7v-35.6C-99,192.3-103.3,188.1-108.5,188.1z M-127.7,228.8
            c-6.6,0-12-5.4-12-12c0-6.6,5.4-12,12-12c6.6,0,12,5.4,12,12C-115.7,223.4-121.1,228.8-127.7,228.8z"/>
          </svg>
          <p>Médiéval, Moyen-Age</p>
        </span>
      </div>
    </div>
  </div>
</div>
</div>
<?php
    endwhile;
  endif;
?>
</div>
        </div>
        <div class="buttons-slider">
          <div class="button-prev"><svg fill="#f2d374" height="36" viewBox="0 0 24 24" width="36" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
          </svg></div>
          <div class="button-next"><svg fill="#f2d374" height="36" viewBox="0 0 24 24" width="36" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
          </svg></div>
        </div>
        <div class="clear"></div>
      </section>






      <!-- Monuments et musées -->
      <section id="castle-museums">
        <div class="header-cards">
          <span>
            <h2>Monuments & musées</h2>
            <div class="cta">
              <a href="">Tout voir</a>
            </div>
          </span>
        </div>
        <div class="swiper-container">
          <div class="swiper-wrapper">

          <?php 
$args = array(
  'post_type' => 'monuments-et-musees',
  'tax_query' => array(
    array(
      'taxonomy' => 'regions',
      'field'    => 'slug',
      'terms'    => $terms_region[0]->slug
      )
    )
  );
$the_query = new WP_Query($args);

  if ($the_query->have_posts() ) : 
    while ($the_query->have_posts() ) : $the_query->the_post();
    ?>
                <div class="swiper-slide event-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/chateau-une.png');">
              <div class="overlay"></div>
              <div class="main">
                <div class="content">
                  <div class="main">
                    <h4><?php the_title(); ?></h4>
                    <span class="location">
                      <svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        <path d="M0 0h24v24H0z" fill="none"/></svg>
                        <p><?php print($terms_region[0]->slug); ?></p>
                      </span>
                    </div>
                    <div class="hover">
                    <?php $get_description = get_post_custom_values('description'); 
                      $description = get_short_description($get_description[0], 60, 80); ?>
                      <p><?php print($description); ?></p>

                      <div class="cta-discover">
                        <a href="#">Découvrir</a>
                      </div>

                      <div class="tags">
                        <span>
                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" height="18" width="18" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-199 188 100 100" style="enable-background:new -199 188 100 100;" xml:space="preserve" fill="#eece84">
                            <style type="text/css">
                              .st0{display:none;}
                              .st1{display:inline;}
                            </style>
                            <g class="st0">
                              <path class="st1" d="M-149,220c9.9,0,18,8.1,18,18c0,9.9-8.1,18-18,18c-9.9,0-18-8.1-18-18C-167,228.1-158.9,220-149,220 M-149,202
                              c-19.9,0-36,16.1-36,36s16.1,36,36,36c19.9,0,36-16.1,36-36S-129.1,202-149,202L-149,202z"/>
                            </g>
                            <g class="st0">
                              <path class="st1" d="M-148.5,210c-19.9,0-36,11-36,24.7c0,6.5,3.7,12.3,9.6,16.7l-4,14.6l20.5-7.6c3.1,0.6,6.4,1,9.9,1
                              c19.9,0,36-11.1,36-24.7C-112.6,221.1-128.7,210-148.5,210z"/>
                            </g>
                            <g class="st0">
                              
                              <rect x="-183.8" y="220.1" transform="matrix(0.7071 0.7071 -0.7071 0.7071 121.7817 176.2556)" class="st1" width="63.8" height="30"/>
                              <polygon class="st1" points="-134.2,274 -134.2,274 -113,274 -113,252.8 -113,252.8   "/>
                            </g>
                            <path d="M-108.5,188.1h-35.7c-2.5,0-4.9,1-6.7,2.8l-45.2,45.2c-3.7,3.7-3.7,9.7,0,13.5l35.6,35.6c1.9,1.9,4.3,2.8,6.7,2.8
                            c2.4,0,4.9-0.9,6.7-2.8l45.3-45.2c1.8-1.8,2.8-4.2,2.8-6.7v-35.6C-99,192.3-103.3,188.1-108.5,188.1z M-127.7,228.8
                            c-6.6,0-12-5.4-12-12c0-6.6,5.4-12,12-12c6.6,0,12,5.4,12,12C-115.7,223.4-121.1,228.8-127.7,228.8z"/>
                          </svg>
                          <p>Médiéval, Moyen-Age</p>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    <?php
    endwhile;
  endif;
    ?>
              </div>
            </div>
            <div class="buttons-slider">
              <div class="button-prev"><svg fill="#f2d374" height="36" viewBox="0 0 24 24" width="36" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                <path d="M0 0h24v24H0z" fill="none"/>
              </svg></div>
              <div class="button-next"><svg fill="#f2d374" height="36" viewBox="0 0 24 24" width="36" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                <path d="M0 0h24v24H0z" fill="none"/>
              </svg></div>
            </div>
            <div class="clear"></div>
          </section>
          <!-- /Chateaux similaires -->

              <section id="castle-region" class="banner-bottom" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/main_castle.jpg');">
    <div class="clear"></div>
      <div class="overlay"></div>
      <div class="content">
        <h2><?php print($terms_region[0]->slug); ?></h2>
        <div class="cta-discover">
          <a href="<?= get_permalink( get_page_by_title( 'regions' ) ) ?>">Lire</a>
        </div>
      </div>
      <div class="clear"></div>
    </section>

    <div class="map" id="map" style="width:500px;height:500px;"></div>
</main>
<script type="text/javascript"
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdvOlziA7luvB_ViQePNMTuPIMIWVaTms&libraries=places">
</script>
<script>
function initialize() {
  var castle = new google.maps.LatLng(<?php print($lattitude); ?>, <?php print($longitude); ?>);

  var map = new google.maps.Map(document.getElementById('map'), {
    center: castle,
    zoom: 15,
    scrollwheel: false
  });

  // Specify location, radius and place types for your Places API search.
  var request = {
    location: castle,
    radius: '1500',
    types: ['lodging']
  };

  // Create the PlaceService and send the request.
  // Handle the callback with an anonymous function.
  var service = new google.maps.places.PlacesService(map);
  service.nearbySearch(request, function(results, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
      for (var i = 0; i < results.length; i++) {
        var place = results[i];
        // If the request succeeds, draw the place location on
        // the map as a marker, and register an event to handle a
        // click on the marker.
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
        });
      }
    }
  });
}
initialize();
// Run the initialize function when the window has finished loading.
google.maps.event.addDomListener(window, 'load', initialize);
</script>
        <?php get_footer(); ?>