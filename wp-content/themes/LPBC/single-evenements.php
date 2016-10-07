<?php get_header(); ?>
<?php 
if (have_posts()) :
  while (have_posts()) : the_post();
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
        </div>
      </div>
    </section>
    <!-- /Header -->

    <!-- Infos -->
    <section id="castle-infos" class="infos-fiche-event">
      <div class="pratique">
        <h2>Pratique</h2>
        <div>
          <h3>Debut</h3>
          <p><?php the_field('date_debut'); ?></p>
        </div>
        <div>
          <h3>Fin</h3>
          <p><?php the_field('date_fin'); ?></p>
        </div>
        <div class="tarifs">
          <h3>Tarifs</h3>
          <p>Adulte : 17 €</p>
          <p>Enfant : 9 €</p>
          <p>Gratuit pour les -5 ans</p>
        </div>
        <div>
          <h3>Parking</h3>
          <p>Oui</p>
        </div>
      </div>
    </section>
    <!-- /Infos -->

    <!-- Description -->
    <section id="castle-description" class="description-fiche-event">
      <h2>Description</h2>
      <div class="main">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non enim nec enim auctor tincidunt. Nulla auctor varius ex. Curabitur sit amet nulla ut diam porttitor tristique. Etiam sit amet porta tellus. Nullam sit amet tellus turpis. Fusce ipsum turpis, congue ac vehicula non, gravida sit amet ligula. Etiam sollicitudin finibus neque, ut viverra felis suscipit vel. Vivamus maximus, est eget bibendum blandit, lacus purus sodales ex, in sagittis mauris massa sit amet arcu. Praesent condimentum metus lectus, rutrum tempor metus vulputate ac. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam mattis tellus id lorem tempus, quis convallis sem imperdiet.
        </p>
        <p>
          Sed vestibulum felis risus, ac ultricies mauris mattis in. Etiam vel massa sit amet nisi consectetur feugiat. Phasellus sed odio nec felis ornare interdum. Proin nisl lacus, vestibulum vitae nulla pretium, malesuada maximus turpis. Duis leo mauris, mollis nec mi eu, vehicula condimentum lectus. Quisque gravida, elit nec pharetra aliquet, sapien ipsum vulputate dolor, non dapibus arcu orci at sem. Pellentesque et enim augue. Ut vestibulum risus in vulputate aliquet. Donec cursus leo vel dui interdum, at posuere quam pretium. Curabitur elit justo, aliquam ac pulvinar eget, malesuada vitae sapien. In tempus dui ut elit ultrices, in malesuada dolor aliquam. Cras ut hendrerit nibh.
        </p>
      </div>
    </section>
    <div class="clear"></div>
    <!-- /Description -->

    <?php
    endwhile;
    endif;
    ?>
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
          <div class="swiper-slide event-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/chateau-une.png');">
            <div class="overlay"></div>
            <div class="main">
              <div class="content">
                <div class="main">
                  <h4>Fête des Pommes</h4>
                  <span class="location">
                    <svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                      <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                      <path d="M0 0h24v24H0z" fill="none"/></svg>
                      <p>Vizille</p>
                    </span>
                  </div>
                  <div class="hover">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum tellus.</p>

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
            <div class="swiper-slide event-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/chateau-une.png');">
              <div class="overlay"></div>
              <div class="main">
                <div class="content">
                  <div class="main">
                    <h4>Fête des Pommes</h4>
                    <span class="location">
                      <svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        <path d="M0 0h24v24H0z" fill="none"/></svg>
                        <p>Vizille</p>
                      </span>
                    </div>
                    <div class="hover">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum tellus.</p>

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
              <div class="swiper-slide event-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/chateau-une.png');">
                <div class="overlay"></div>
                <div class="main">
                  <div class="content">
                    <div class="main">
                      <h4>Fête des Pommes</h4>
                      <span class="location">
                        <svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                          <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                          <path d="M0 0h24v24H0z" fill="none"/></svg>
                          <p>Vizille</p>
                        </span>
                      </div>
                      <div class="hover">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum tellus.</p>

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
                <div class="swiper-slide event-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/chateau-une.png');">
                  <div class="overlay"></div>
                  <div class="main">
                    <div class="content">
                      <div class="main">
                        <h4>Fête des Pommes</h4>
                        <span class="location">
                          <svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            <path d="M0 0h24v24H0z" fill="none"/></svg>
                            <p>Vizille</p>
                          </span>
                        </div>
                        <div class="hover">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum tellus.</p>

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
                  <div class="swiper-slide event-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/chateau-une.png');">
                    <div class="overlay"></div>
                    <div class="main">
                      <div class="content">
                        <div class="main">
                          <h4>Fête des Pommes</h4>
                          <span class="location">
                            <svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                              <path d="M0 0h24v24H0z" fill="none"/></svg>
                              <p>Vizille</p>
                            </span>
                          </div>
                          <div class="hover">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum tellus.</p>

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
                    <div class="swiper-slide event-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/chateau-une.png');">
                      <div class="overlay"></div>
                      <div class="main">
                        <div class="content">
                          <div class="main">
                            <h4>Fête des Pommes</h4>
                            <span class="location">
                              <svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                <path d="M0 0h24v24H0z" fill="none"/></svg>
                                <p>Vizille</p>
                              </span>
                            </div>
                            <div class="hover">
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum tellus.</p>

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
                      <div class="swiper-slide event-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/chateau-une.png');">
                        <div class="overlay"></div>
                        <div class="main">
                          <div class="content">
                            <div class="main">
                              <h4>Fête des Pommes</h4>
                              <span class="location">
                                <svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                  <path d="M0 0h24v24H0z" fill="none"/></svg>
                                  <p>Vizille</p>
                                </span>
                              </div>
                              <div class="hover">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum tellus.</p>

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
                        <div class="swiper-slide event-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/chateau-une.png');">
                          <div class="overlay"></div>
                          <div class="main">
                            <div class="content">
                              <div class="main">
                                <h4>Fête des Pommes</h4>
                                <span class="location">
                                  <svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                    <path d="M0 0h24v24H0z" fill="none"/></svg>
                                    <p>Vizille</p>
                                  </span>
                                </div>
                                <div class="hover">
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum tellus.</p>

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
                    <!-- /Événements -->

                    <!-- Chateaux similaires -->
                    <section id="castle-similar">
                      <div class="header-cards">
                        <span>
                          <h2>Château similaires</h2>
                          <div class="cta">
                            <a href="">Tout voir</a>
                          </div>
                        </span>
                      </div>
                      <div class="swiper-container">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide event-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/chateau-une.png');">
                            <div class="overlay"></div>
                            <div class="main">
                              <div class="content">
                                <div class="main">
                                  <h4>Fête des Pommes</h4>
                                  <span class="location">
                                    <svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                      <path d="M0 0h24v24H0z" fill="none"/></svg>
                                      <p>Vizille</p>
                                    </span>
                                  </div>
                                  <div class="hover">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum tellus.</p>

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
                            <div class="swiper-slide event-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/chateau-une.png');">
                              <div class="overlay"></div>
                              <div class="main">
                                <div class="content">
                                  <div class="main">
                                    <h4>Fête des Pommes</h4>
                                    <span class="location">
                                      <svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                        <path d="M0 0h24v24H0z" fill="none"/></svg>
                                        <p>Vizille</p>
                                      </span>
                                    </div>
                                    <div class="hover">
                                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum tellus.</p>

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
                              <div class="swiper-slide event-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/chateau-une.png');">
                                <div class="overlay"></div>
                                <div class="main">
                                  <div class="content">
                                    <div class="main">
                                      <h4>Fête des Pommes</h4>
                                      <span class="location">
                                        <svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                          <path d="M0 0h24v24H0z" fill="none"/></svg>
                                          <p>Vizille</p>
                                        </span>
                                      </div>
                                      <div class="hover">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum tellus.</p>

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
                                <div class="swiper-slide event-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/chateau-une.png');">
                                  <div class="overlay"></div>
                                  <div class="main">
                                    <div class="content">
                                      <div class="main">
                                        <h4>Fête des Pommes</h4>
                                        <span class="location">
                                          <svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                            <path d="M0 0h24v24H0z" fill="none"/></svg>
                                            <p>Vizille</p>
                                          </span>
                                        </div>
                                        <div class="hover">
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum tellus.</p>

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
                                  <div class="swiper-slide event-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/chateau-une.png');">
                                    <div class="overlay"></div>
                                    <div class="main">
                                      <div class="content">
                                        <div class="main">
                                          <h4>Fête des Pommes</h4>
                                          <span class="location">
                                            <svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                              <path d="M0 0h24v24H0z" fill="none"/></svg>
                                              <p>Vizille</p>
                                            </span>
                                          </div>
                                          <div class="hover">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum tellus.</p>

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
                                    <div class="swiper-slide event-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/chateau-une.png');">
                                      <div class="overlay"></div>
                                      <div class="main">
                                        <div class="content">
                                          <div class="main">
                                            <h4>Fête des Pommes</h4>
                                            <span class="location">
                                              <svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                                <path d="M0 0h24v24H0z" fill="none"/></svg>
                                                <p>Vizille</p>
                                              </span>
                                            </div>
                                            <div class="hover">
                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum tellus.</p>

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
                                      <div class="swiper-slide event-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/chateau-une.png');">
                                        <div class="overlay"></div>
                                        <div class="main">
                                          <div class="content">
                                            <div class="main">
                                              <h4>Fête des Pommes</h4>
                                              <span class="location">
                                                <svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                                  <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                                  <path d="M0 0h24v24H0z" fill="none"/></svg>
                                                  <p>Vizille</p>
                                                </span>
                                              </div>
                                              <div class="hover">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum tellus.</p>

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
                                        <div class="swiper-slide event-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/chateau-une.png');">
                                          <div class="overlay"></div>
                                          <div class="main">
                                            <div class="content">
                                              <div class="main">
                                                <h4>Fête des Pommes</h4>
                                                <span class="location">
                                                  <svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                                    <path d="M0 0h24v24H0z" fill="none"/></svg>
                                                    <p>Vizille</p>
                                                  </span>
                                                </div>
                                                <div class="hover">
                                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum tellus.</p>

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




                          </main>
                          <?php get_footer(); ?>