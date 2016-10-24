<?php get_header(); ?>
<?php $terms = get_query_var( 'term' ); ?>
<?php $args = array(
    'post_type' => 'chateaux',
    'tax_query' => array(
        array(
            'taxonomy' => 'regions',
            'field'    => 'slug',
            'terms'    => $terms
        )
    )
);
$the_query_castle = new WP_Query($args);
$count_chateau = $the_query_castle->post_count;
wp_reset_query();
?>

<?php $args = array(
    'post_type' => 'evenements',
    'tax_query' => array(
        array(
            'taxonomy' => 'regions',
            'field'    => 'slug',
            'terms'    => $terms
        )
    )
);
$the_query = new WP_Query($args);
$count_event = $the_query->post_count;
wp_reset_query();
?>

<?php $args = array(
    'post_type' => 'monuments-et-musees',
    'tax_query' => array(
        array(
            'taxonomy' => 'regions',
            'field'    => 'slug',
            'terms'    => $terms
        )
    )
);
$the_query = new WP_Query($args);
$count_mm = $the_query->post_count;
wp_reset_query();

$event_list = [];
$mmh_list = [];

?>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>

  <?php $posttype = get_post_type(get_the_ID()); ?>
  <?php if ($posttype == 'region') : ?>
  <?php $region_title = get_the_title(); ?>
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
          <?php
          $coor = get_post_custom_values('coordonnee');
          $str=$coor[0];
          $data = DMStoDD($str);
          $longitude = ConvertDMSToDD($data['long']);
          $lattitude = ConvertDMSToDD($data['lat']);


          $get_description = get_post_custom_values('description');
          $short_description = get_short_description($get_description[0], 60, 80); ?>
          <p><?php print($short_description); ?></p>
        </div>
      </div>
    </section>
    <!-- /Header -->

    <!-- Infos -->
    <section id="castle-infos" class="infos-fiche-event">
      <div class="pratique">
        <h2>Pratique</h2>
        <div>
          <h3>région</h3>
          <p><?php the_title(); ?></p>
        </div>
        <div>
          <h3>Chateau</h3>
          <p><?php print($count_chateau . " chateaux"); ?></p>
        </div>
        <div class="tarifs">
          <h3>Evenements</h3>
          <p><?php print($count_event . " evenements"); ?></p>
        </div>
        <div>
          <h3>Monument et musée</h3>
          <p><?php print($count_mm . " monuments et musées"); ?></p>
        </div>
      </div>
    </section>
    <!-- /Infos -->

    <!-- Description -->
    <section id="castle-description" class="description-fiche-event">
      <h2>Description</h2>
      <div class="main">
        <?php $description_explode = explode("============", $get_description[0]); ?>
        <?php foreach ($description_explode as $value) {
          if(urlencode($value) !== '%0D%0Aimage%0D%0A'){
            print('<p>' . $value . '</p>');
          }
        }
        ?>
    </section>
    <div class="clear"></div>
    <!-- /Description -->
    <?php elseif($posttype == 'evenements') : ?>
      <?php $title = get_the_title(); ?>
      <?php $description = get_post_custom_values('description'); ?>
      <?php $short_description = get_short_description($description[0],60,80); ?>
      <?php $commune = get_post_custom_values('commune'); ?>
      <?php $url = get_permalink(); ?>
      <?php if ( has_post_thumbnail() ) {
        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
        if ( ! empty( $large_image_url[0] ) ) {
          $imageurl = $large_image_url[0];
        }
      }
      $term_list_event = wp_get_post_terms($post->ID, 'tag', array("fields" => "names"));

      ?>

      <?php $event_list[$title] = array(
          'title' => $title,
          'description' => $short_description,
          'commune' => $commune[0],
          'url' => $url,
          'image'=> $imageurl,
          'terms' => $term_list_event,
      ); ?>


    <?php elseif($posttype == 'monuments-et-musees') : ?>
      <?php $title = get_the_title(); ?>
      <?php $description = get_post_custom_values('description'); ?>
      <?php $short_description = get_short_description($description[0],60,80); ?>
      <?php $commune = get_post_custom_values('commune'); ?>
      <?php $url = get_permalink(); ?>
      <?php if ( has_post_thumbnail() ) {
        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
        if ( ! empty( $large_image_url[0] ) ) {
          $imageurl = $large_image_url[0];
        }
      }
      $term_list_mmh = wp_get_post_terms($post->ID, 'tag', array("fields" => "names"));

      ?>

      <?php $mmh_list[$title] = array(
          'title' => $title,
          'description' => $short_description,
          'commune' => $commune[0],
          'url' => $url,
          'image'=> $imageurl,
          'terms' => $term_list_mmh
      ); ?>

    <?php elseif($posttype == 'blog') : ?>
      <?php $blog_title = get_the_title(); ?>
    <?php endif; ?>
    <?php endwhile; ?>


    <?php if ($the_query_castle->have_posts() ) : ?>

      <section id="castle-museums">
        <div class="header-cards">
          <span>
              <h2>Château de la région</h2>
              <div class="cta">
                  <a href="">Tout voir</a>
              </div>
          </span>
        </div>
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <?php while ($the_query_castle->have_posts() ) : $the_query_castle->the_post(); ?>
              <?php
              if ( has_post_thumbnail() ) {
                $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
                if ( ! empty( $large_image_url[0] ) ) {
                  $imageurl = $large_image_url[0];
                }
              }

              $term_list = wp_get_post_terms($post->ID, 'tag', array("fields" => "names"));

              ?>
              <div class="swiper-slide event-slide" style="background-image: url('<?php $imageurl ? print($imageurl) : print(''); ?>');">
                <div class="overlay"></div>
                <div class="main">
                  <div class="content">
                    <div class="main">
                      <h4><?php the_title(); ?></h4>
                        <span class="location">
                            <svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg>
                                <p><?php print($terms); ?></p>
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
                          <?php $count_tag = 0; ?>
                          <p>
                                <?php foreach ($term_list = wp_get_post_terms($post->ID, 'tag', array("fields" => "names")) as $key => $value) {
                                  $count = count($term_list);
                                  if($count_tag == $count -1) {
                                    print($value);
                                  } else {
                                    print($value . ', ');
                                  }
                                  $count_tag++;
                                } ?>
                            </p>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile;?>
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
    <?php endif; ?>






    <section id="castle-similar">
      <div class="header-cards">
        <span>
          <h2>événements de la région</h2>
          <div class="cta">
            <a href="">Tout voir</a>
          </div>
        </span>
      </div>
      <div class="swiper-container">
        <div class="swiper-wrapper">





          <?php foreach ($event_list as $key => $value) {
            ?>
            <div class="swiper-slide event-slide" style="background-image: url('<?= esc_url($value['image']); ?>');">
              <div class="overlay"></div>
              <div class="main">
                <div class="content">
                  <div class="main">
                    <h4><?php print($value['title']); ?></h4>
                      <span class="location">
                          <svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                              <path d="M0 0h24v24H0z" fill="none"/>
                          </svg>
                              <p><?php print($region_title); ?></p>
                      </span>
                  </div>
                  <div class="hover">
                    <p><?php print($value['description']); ?></p>

                    <div class="cta-discover">
                      <a href="<?php print($value['url']); ?>">Découvrir</a>
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
                        <?php $count_tag = 0; ?>
                        <p>
                              <?php foreach ($value['terms'] as $term_value) {
                                $count = count($value['terms']);
                                if($count_tag == $count -1) {
                                  print($term_value);
                                } else {
                                  print($term_value . ', ');
                                }
                                $count_tag++;
                              } ?>
                          </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
          } ?>
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
    </section>











    <section id="castle-similar">
      <div class="header-cards">
        <span>
            <h2>Monument et musée de la région</h2>
            <div class="cta">
                <a href="">Tout voir</a>
            </div>
        </span>
      </div>
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <?php foreach ($mmh_list as $key => $value) {
            ?>
            <div class="swiper-slide event-slide" style="background-image: url('<?= esc_url($value['image']); ?>');">
              <div class="overlay"></div>
              <div class="main">
                <div class="content">
                  <div class="main">
                    <h4><?php print($value['title']); ?></h4>
                      <span class="location">
                          <svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                              <path d="M0 0h24v24H0z" fill="none"/>
                          </svg>
                              <p><?php print($region_title); ?></p>
                      </span>
                  </div>
                  <div class="hover">
                    <p><?php print($value['description']); ?></p>

                    <div class="cta-discover">
                      <a href="<?php print($value['url']); ?>">Découvrir</a>
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
                      <?php $count_tag = 0; ?>
                      <p>
                            <?php foreach ($value['terms'] as $term_value) {
                              $count = count($value['terms']);
                              if($count_tag == $count -1) {
                                print($term_value);
                              } else {
                                print($term_value . ', ');
                              }
                              $count_tag++;
                            } ?>
                        </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
          } ?>
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

















    <!-- Proximité -->

    <style>
      .tab-content{
        display: none;
      }
      .tab-content.active{
        display: block;
      }
    </style>
    <section class="castle-proximity" style="margin-top:85px;">
      <h2>À proximité</h2>
      <div class="left">
        <ul style="position:relative;z-index: 100;" class="tabs">
          <li class="active"><a href="#map1">Hôtel</a></li>
          <li><a class="map-hover" href="#map2">Hebergement</a></li>
          <li><a class="map-hover" href="#map3">Les 2</a></li>
        </ul>
        <div class="tabs-content" style="width:100%;height: 100%;z-index: 10;position:relative;">
          <div class="tab-content active" id="map1" style="height:100%;width:100%;top:-90px;"></div>
          <div class="tab-content" id="map2" style="height:100%;width:100%;top:-90px;"></div>
          <div class="tab-content" id="map3" style="height:100%;width:100%;top:-90px;"></div>
        </div>
      </div><div class="right" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/map-custom.png');">
        <h3 id="adresse_name"><?php print($terms); ?></h3>
        <div class="location">
          <span>
              <p id="vicinity"></p>
          </span>
        </div>
        <div class="notes" id="rating">
          <p id="nb-rating"></p>
        </div>
        <!--
<div class="price">
<?php //for($i = 1; $i <= 3; $i++): ?>
<img src="<?php //echo get_template_directory_uri(); ?>/img/euro.png" alt="Euro">
<?php //endfor; ?>
</div>
-->

        <div class="cta-discover">
          <a href="<?= get_permalink( get_page_by_title('regions')) ?>">Découvrir</a>
        </div>
      </div>
    </section>

    <script>
      var tabs = document.querySelectorAll('.tabs a');

      for(var i=0; i< tabs.length; i++) {
        tabs[i].addEventListener('click',function (e) {
          var li = this.parentNode;
          var div = this.parentNode.parentNode.parentNode;

          if(li.classList.contains('active')){
            return false;
          }
// on retire la classe active de l'onglet actif
          div.querySelector('.tabs .active').classList.remove('active');

// j'ajoute la class active a l'onglet actuel
          li.classList.add('active');

// on retire la classe active du contenu actif
          div.querySelector('.tab-content.active').classList.remove('active');

// j'ajoute la class active sur le contenu correspondant a mon clic
          console.log(div.querySelector(this.getAttribute('href')));
          div.querySelector(this.getAttribute('href')).classList.add('active');
        });
      }
    </script>

    <div class="clear"></div>
    <!-- /Proximité -->
    <?php endif; ?>



  </main>

  <script type="text/javascript"
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdvOlziA7luvB_ViQePNMTuPIMIWVaTms&libraries=places">
  </script>
  <script>
    function initialize_map_1() {
      var castle = new google.maps.LatLng(<?php print($lattitude); ?>, <?php print($longitude); ?>);

      var map = new google.maps.Map(document.getElementById('map1'), {
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
            attachSecretMessage(marker, place);
          }
        }
      });
    }

    function initialize_map_2() {
      var castle = new google.maps.LatLng(<?php print($lattitude); ?>, <?php print($longitude); ?>);

      var map = new google.maps.Map(document.getElementById('map2'), {
        center: castle,
        zoom: 15,
        scrollwheel: false
      });

// Specify location, radius and place types for your Places API search.
      var request = {
        location: castle,
        radius: '1500',
        types: ['restaurant']
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
            attachSecretMessage(marker, place);
          }
        }
      });
    }

    function initialize_map_3() {
      var castle = new google.maps.LatLng(<?php print($lattitude); ?>, <?php print($longitude); ?>);

      var map = new google.maps.Map(document.getElementById('map3'), {
        center: castle,
        zoom: 15,
        scrollwheel: false
      });

// Specify location, radius and place types for your Places API search.
      var request = {
        location: castle,
        radius: '1500',
        types: ['lodging','restaurant']
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
            attachSecretMessage(marker, place);
          }
        }
      });
    }


    function attachSecretMessage(marker, place) {
      marker.addListener('click', function() {
        console.log(place);
        var ajaxurl = '<?php
            echo admin_url('placemap.php'); ?>';
        $.ajax({
          url: ajaxurl,
          type: 'POST',
          data: {placeid: place.place_id},
          dataType: 'JSON',
          success:function(data){
            console.log('success to load ajax');
            console.log(data);

            var data_adresse_name;
            var data_adresse_rating;
            var data_adresse_location;
            if(data.status == "OK"){
              if('vicinity' in data.result){
                data_adresse_location = data.result.vicinity;
                var vici_svg = '<svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg"> <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/> <path d="M0 0h24v24H0z" fill="none"/></svg>';

                $('#vicinity').html(vici_svg + data_adresse_location);
              }
              else{
                $('#vicinity').html('');
              }

              if('name' in data.result){
                data_adresse_name = data.result.name;
                $('#adresse_name').html(data_adresse_name);
              }
              else{
                $('#adresse_name').html('');
              }

              if('rating' in data.result){
                data_adresse_rating = data.result.rating;
                console.log(Math.floor(data_adresse_rating));
                var round = Math.floor(data_adresse_rating);
                var svg = '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 51 48"> <title>Five Pointed Star</title> <path fill="#f2d374" stroke="#f2d374" stroke-width="3" d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/> </svg>';
                var svg_empty = '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 51 48"> <title>Five Pointed Star</title> <path fill="" stroke="#f2d374" stroke-width="3" d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/> </svg>';
                var str = "";
                var i;
                for(i=0; i<5;i++){
                  if(i >= round){
                    str= str + svg_empty;
                  }
                  else{
                    str= str + svg;
                  }
                }
                $('#rating').html(str);
              }
              else{
                $('#rating').html('');
              }
            }
          },
          error:function(){
            console.log('failed to load ajax');
          }
        });
      });
    }

    initialize_map_1();
    initialize_map_2();
    initialize_map_3();
    // Run the initialize function when the window has finished loading.
    google.maps.event.addDomListener(window, 'load', initialize_map_1);
    google.maps.event.addDomListener(window, 'load', initialize_map_2);
    google.maps.event.addDomListener(window, 'load', initialize_map_3);
  </script>
<?php get_footer(); ?>