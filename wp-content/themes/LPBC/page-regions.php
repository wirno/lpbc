<?php get_header(); ?>

<main id="main" role="main" class="main-regions-map">
	<!-- Map -->





	<!-- EXEMPLE POUR DEUX REGIONS, PAS TOUTES FAITES POUR TEVITER DE TROP SCROLLER :D 
	Il y a seulement la classe dans le header qui permet d'assigner une carte d'une région -->





	<section class="regions-map">
		<div class="title">
			<h1>Décrouvez le patrimoine des régions de France.</h1>
		</div>
		<?php echo file_get_contents(get_template_directory_uri()."/img/regions-france.svg"); ?>
		<div class="clear"></div>



		<?php 
		$terms = get_terms('regions', array('hide_empty' => false));
		foreach ($terms as $key => $value) {
			$args = array(
				'post_type' => 'evenements',
				'posts_per_page' => 1,
				'tax_query' => array(
					array(
						'taxonomy' => 'regions',
						'field'    => 'slug',
						'terms'    => $value->slug

						)
					)
				);
			$the_query = new WP_Query($args);
			if ($the_query->have_posts() ) : 
				while ($the_query->have_posts() ) : $the_query->the_post();
			?>
			<div class="swiper-slide-map swiper-slide <?php print($value->slug); ?>" data-link="<?= get_permalink( get_page_by_title( 'un-evenement' ) ) ?>" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/chateau-une.png'); opacity: 1;">
				<div class="overlay"></div>
				<div class="main">
					<div class="content">
						<div class="main">
							<h4><?php the_title(); ?></h4>
							<span class="location">
								<svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
									<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
									<path d="M0 0h24v24H0z" fill="none"/></svg>
									<p><?php print($value->name); ?></p>
								</span>
							</div>
							<div class="hover active">
								<?php 
								$get_description = get_post_custom_values('description');
								$description = get_short_description($get_description[0], 60, 80);

								?>
								<p><?php print($description); ?></p>

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
												<polygon class="st1" points="-134.2,274 -134.2,274 -113,274 -113,252.8 -113,252.8 	"/>
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

			}

			?>
		</section>
		<div class="clear"></div>
		<!-- /Map -->
		
		<!-- Evenements -->
		<section id="castle-events-map" class="home-events">
			<div class="header-cards">
				<span>
					<h2>Événements à venir</h2>
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
						'posts_per_page' => -1
						);
					$the_query = new WP_Query($args);
					if ($the_query->have_posts() ) : 
						while ($the_query->have_posts() ) : $the_query->the_post();
					$terms_region = wp_get_post_terms($post->ID, 'regions', array("fields" => "all"));
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
										<?php 
										$get_description = get_post_custom_values('description');
										$description = get_short_description($get_description[0], 60, 80);

										?>
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
														<polygon class="st1" points="-134.2,274 -134.2,274 -113,274 -113,252.8 -113,252.8 	"/>
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
			<div class="clear"></div>
			<!-- /Événements -->




			<!-- event par régions -->
			<section id="castles-une">
				<div class="header-cards">
					<span>
						<h2>Les événements par régions</h2>
						<div class="cta">
							<a href="#">Tout voir</a>
						</div>
					</span>
				</div>
				<div class="swiper-container">
					<div class="swiper-wrapper">

						<?php 
						$terms = get_terms('regions', array('hide_empty' => false));
						foreach ($terms as $key => $value) {
							$args = array(
								'post_type' => 'evenements',
								'posts_per_page' =>-1,
								'tax_query' => array(
									array(
										'taxonomy' => 'regions',
										'field'    => 'slug',
										'terms'    => $value->slug

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
											<h4><?php print($value->name); ?></h4>
											<span class="location">
												<svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
													<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
													<path d="M0 0h24v24H0z" fill="none"/></svg>
													<p><?php the_title(); ?></p>
												</span>
											</div>
											<div class="hover">
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
																<polygon class="st1" points="-134.2,274 -134.2,274 -113,274 -113,252.8 -113,252.8 	"/>
															</g>
															<path d="M-108.5,188.1h-35.7c-2.5,0-4.9,1-6.7,2.8l-45.2,45.2c-3.7,3.7-3.7,9.7,0,13.5l35.6,35.6c1.9,1.9,4.3,2.8,6.7,2.8
															c2.4,0,4.9-0.9,6.7-2.8l45.3-45.2c1.8-1.8,2.8-4.2,2.8-6.7v-35.6C-99,192.3-103.3,188.1-108.5,188.1z M-127.7,228.8
															c-6.6,0-12-5.4-12-12c0-6.6,5.4-12,12-12c6.6,0,12,5.4,12,12C-115.7,223.4-121.1,228.8-127.7,228.8z"/>
														</svg>
														<p><a href="">Médiéval</a>, <a href="">Moyen-Age</a></p>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php

								endwhile;
								endif;
							}
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
				</section>
				<div class="clear"></div>
				<!-- /Chateaux similaires -->
			</main>

			<?php get_footer(); ?>

			<script>
				window.onload = function () {
					$(document).ready(function() {
						$("#svg-map path").mouseover(function(){
							var $id = $(".swiper-slide-map." + $(this).attr('class'));

							if ($id.css("opacity") == 1) {
								console.log('vrai');
							} else {
								$('.swiper-slide-map').stop().fadeTo(100, 0, function() {
									$id.stop().fadeTo(300, 1);
								});
							}
						});

						$("#svg-map path").click(function() {
							var $id = $(".swiper-slide-map." + $(this).attr('class'));

							var $link = $id.data('link');
							console.log($link);
							window.location.href = $link;
						});

						var swiper3 = new Swiper('#castle-events-map .swiper-container', {
							slidesPerView: 3,
							centeredSlides: true,
							nextButton: '#castle-events-map .button-next',
							slidesOffsetBefore: -330,
							prevButton: '#castle-events-map .button-prev',
							spaceBetween: 43
						});

						var swiper4 = new Swiper('#castles-une .swiper-container', {
							slidesPerView: 3,
							centeredSlides: true,
							nextButton: '#castles-une .button-next',
							slidesOffsetBefore: -330,
							prevButton: '#castles-une .button-prev',
							spaceBetween: 43
						});

						$('.event-slide').hover(
							function() {
								event.preventDefault();
								$(this).find($('.main')).stop().addClass('active');
								$(this).find($('.hover')).stop().fadeIn(500);
							}, function() {
								event.preventDefault();
								$(this).find($('.main')).stop().removeClass('active');
								$(this).find($('.hover')).stop().fadeOut(150);
							});

					});
				}
			</script>