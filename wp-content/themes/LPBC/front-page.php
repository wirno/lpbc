<?php get_header(); ?>

<main id="main" role="main">
	<!-- Discover -->
	<?php 

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
			$get_name = get_post_custom_values('nom');
			$test = get_post_custom();
			$name_chateau = $get_name[0];
				?>
					<section class="header-global" id="home-content">
						<?php
						if ( has_post_thumbnail() ) {
							$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
							if ( ! empty( $large_image_url[0] ) ) {
								$imageurl = $large_image_url[0];
							}
						}
						?>
					<div class="home-main" style="background-image: url('<?= esc_url($imageurl); ?>');">
						<div class="overlay"></div>
						<div class="discover-content">
						<h1>Découvrez le <?php the_title(); ?></h1>
				<?php $description = get_post_custom_values('description');
				$short_description = get_short_description($description[0], 60, 80);?>
				<p><?php print($short_description); ?></p>
				<div class="discover-container">
					<a href="<?php the_permalink(); ?>" class="discover">Découvrir</a>
				</div>
				</div>
				</div>
				</section>
	<?php endwhile; endif; ?>













	<?php
	$args = array(
		'post_type' => 'chateaux',
		'orderby'=>'asc',
		'tax_query' => array(
			array(
				'taxonomy' => 'tag',
				'field'    => 'slug',
				'terms'    => 'front-page'
			)
		)
	);
	$the_query = new WP_Query($args);

	if ($the_query->have_posts() ) : ?>


		<section id="castle-events" style = "margin-top: 73px;">
			<div class="header-cards">
    <span>
      <h2>Château a la une</h2>
      <div class="cta">
        <a href="#">Tout voir</a>
      </div>
    </span>
			</div>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<?php while ($the_query->have_posts() ) : $the_query->the_post(); ?>
						<?php
						if ( has_post_thumbnail() ) {
							$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
							if ( ! empty( $large_image_url[0] ) ) {
								$imageurl = $large_image_url[0];
							}
						}
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
					<?php endwhile; ?>
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


















		<!-- Articles -->
		<?php 
		wp_reset_postdata();
		$args= array(
			'post_type' =>'blog',
			'posts_per_page'=>5,
			'orderby'=>'asc'
		);
		$first_actu = true;
		$the_query = new WP_Query( $args );
		if ($the_query->have_posts() ) : 
			while ($the_query->have_posts() ) : $the_query->the_post();
				$title = get_the_title();
				$author = get_the_author();
		if ( has_post_thumbnail() ) {
			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
			if ( ! empty( $large_image_url[0] ) ) {
				$imageurl = $large_image_url[0];
			}
		}
				if($first_actu){
				?> <section id="home-articles">
			<div class="header-cards">
				<span>
					<h2>Article à la une</h2>
					<div class="cta">
						<a href="#">Tout voir</a>
					</div>
				</span>
			</div>
			<div class="content">
				<div class="left">
					<div class="swiper-slide" style="background-image: url('<?= esc_url($imageurl); ?>');">
						<div class="overlay"></div>
						<div class="main">
							<div class="content">
								<div class="main">
									<h4>
										<?php print($title); ?>
									</h4>
									<span class="location">
										<p>									
											<?php print($author); ?>
										</p>
									</span>
								</div>
								<div class="hover active">
									<div class="cta-discover">
										<a href="<?php the_permalink(); ?>">Lire</a>
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
											<p><a href="">Blog</a>, <a href="">Moyen-Age</a></p>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="right">

				<?php
				$first_actu = false;
			}
			else{
			?>
									<div class="banner" style="background-image: url('<?= esc_url($imageurl); ?>');">
							<div class="overlay">
								<div class="content-banner">
									<span>
										<a href="<?php the_permalink() ?>"><p class="title"><?php print($title); ?></p></a>
									</span>

									<div class="tags">
										<span>
											<svg version="1.1" xmlns="http://www.w3.org/2000/svg" height="15" width="15" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-199 188 100 100" style="enable-background:new -199 188 100 100;" xml:space="preserve" fill="#eece84">
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
											<p><a href="">Blog</a>, <a href="">Moyen-Age</a></p>
										</span>
									</div>
								</div>
							</div>
						</div>
			<?php
			}
		endwhile;
	endif;
	?>
	</div>
</div>
</section>






<div class="clear"></div>




		<!-- Événements -->
		<section id="castle-events" class="home-events">
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
					wp_reset_postdata();
					$args= array(
						'post_type' =>'evenements',
						'posts_per_page'=>5,
						'orderby'=>'asc'
					);
					$the_query = new WP_Query( $args );
							if ($the_query->have_posts() ) : 
								while ($the_query->have_posts() ) : $the_query->the_post();
									$title = get_the_title();
									$author = get_the_author();
									$description =  get_post_custom_values('description');
									$short_description = get_short_description($description[0], 60,80);
									$terms = get_the_terms($post->id, 'regions');
        							$region = $terms[0]->slug;
									if ( has_post_thumbnail() ) {
										$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
										if ( ! empty( $large_image_url[0] ) ) {
											$imageurl = $large_image_url[0];
										}
									}
				?>
							<div class="swiper-slide event-slide" style="background-image: url('<?= esc_url($imageurl); ?>');">
							<div class="overlay"></div>
							<div class="main">
								<div class="content">
									<div class="main">
										<h4><?php print($title); ?></h4>
										<span class="location">
											<svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
												<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
												<path d="M0 0h24v24H0z" fill="none"/></svg>
												<p><?php print($region); ?></p>
											</span>
										</div>
										<div class="hover">
											<p><?php print($short_description); ?></p>

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
													<p>Evenements, Moyen-Age</p>
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
			<!-- /Événements -->



			<!-- Monuments et musées  -->
			<?php 
				wp_reset_postdata();
				$args= array(
					'post_type' =>'monuments-et-musees',
					'posts_per_page'=>5,
					'orderby'=>'asc'
				);
				$first_mm = true;
			$the_query = new WP_Query( $args );
			if ($the_query->have_posts() ) : 
				while ($the_query->have_posts() ) : $the_query->the_post();
			if ( has_post_thumbnail() ) {
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
				if ( ! empty( $large_image_url[0] ) ) {
					$imageurl = $large_image_url[0];
				}
			}

					$title = get_the_title();
					$get_commune = get_post_custom_values('commune');
					$commune = $get_commune[0];
					$terms = get_the_terms($post->id, 'regions');
					$region = $terms[0]->slug; 
					if($first_mm){
					?>
					<section id="home-articles">
				<div class="header-cards">
					<span>
						<h2>Monuments & musées à la une</h2>
						<div class="cta">
							<a href="#">Tout voir</a>
						</div>
					</span>
				</div>
				<div class="content">
					<div class="left">
						<div class="swiper-slide" style="background-image: url('<?= esc_url($imageurl); ?>');">
							<div class="overlay"></div>
							<div class="main">
								<div class="content">
									<div class="main">
										<h4><?php print($title); ?></h4>
										<span class="location">
											<svg fill="#f2d374" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
												<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
												<path d="M0 0h24v24H0z" fill="none"/></svg>

												<p><?php print($commune);
        										if(isset($region)){
        										print(' - ' . $region);
        										}
        										?></p>

											</span>
										</div>
										<div class="hover active">
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
													<p><a href="">Monument & Musée</a>, <a href="">Moyen-Age</a></p>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="right">
					<?php
					$first_mm = false;
					}
					else{
					?> <div class="banner" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/main_castle.jpg');">
							<div class="overlay">
								<div class="content-banner">
									<span>
										<a href="<?php the_permalink(); ?>"><p class="title"><?php print($title); ?></p></a>
									</span>

									<div class="tags">
										<span>
											<svg version="1.1" xmlns="http://www.w3.org/2000/svg" height="15" width="15" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-199 188 100 100" style="enable-background:new -199 188 100 100;" xml:space="preserve" fill="#eece84">
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
											<p><a href="">Monument & Musée</a>, <a href="">Moyen-Age</a></p>
										</span>
									</div>
								</div>
							</div>
						</div>
					<?php 
					}
				endwhile;
			endif;
			 ?>
					</div>
				</div>
			</section>
			<div class="clear"></div>
				<!-- /Monuments et musées  -->


				<!-- Région à la une -->
				<section class="castle-proximity region-map region-home">
					<div class="left" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/map.png');">
						<div class="overlay"></div>
						<div class="header-cards">
							<span>
								<h2>Régions à la une</h2>
								<div class="cta">
									<a href="">Tout voir</a>
								</div>
							</span>
						</div>
						<?php for($i = 1; $i <= 3; $i++): ?>
							<div class="locations location-<?= $i ?>">
								<svg fill="#edcd89" height="50" viewBox="0 0 24 24" width="50" xmlns="http://www.w3.org/2000/svg">
									<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
									<path d="M0 0h24v24H0z" fill="none"/>
								</svg>
							</div>
						<?php endfor; ?>
					</div><div class="right location-description location-1-description active" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/map-custom.png');">
					<h3>Île-de-France</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse iaculis ante non eros convallis imperdiet sed eu felis.</p>
					<ul>
						<li>30 châteaux</li>
						<li>21 monuments</li>
						<li>27 musées</li>
						<li>4 événements</li>
					</ul>
					<div class="cta-discover">
						<a href="#">Découvrir</a>
					</div>	
				</div><div class="right location-description location-2-description" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/map-custom.png');">
				<h3>Région 2</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse iaculis ante non eros convallis imperdiet sed eu felis.</p>
				<ul>
					<li>30 châteaux</li>
					<li>21 monuments</li>
					<li>27 musées</li>
					<li>4 événements</li>
				</ul>
				<div class="cta-discover">
					<a href="#">Découvrir</a>
				</div>	
			</div><div class="right location-description location-3-description" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/map-custom.png');">
			<h3>Région 3</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse iaculis ante non eros convallis imperdiet sed eu felis.</p>
			<ul>
				<li>30 châteaux</li>
				<li>21 monuments</li>
				<li>27 musées</li>
				<li>4 événements</li>
			</ul>
			<div class="cta-discover">
				<a href="#">Découvrir</a>
			</div>	
		</div>
	</section>
	<!-- /Région à la une -->

	<!-- Libre -->
	<section id="bloc-libre">
		<h2>Bloc libre</h2>
		<div class="container">
			<div class="left">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non enim nec enim auctor tincidunt. Nulla auctor varius ex. Curabitur sit amet nulla ut diam porttitor tristique. Etiam sit amet porta tellus. Nullam sit amet tellus turpis. Fusce ipsum turpis, congue ac vehicula non, gravida sit amet ligula. Etiam sollicitudin finibus neque, ut viverra felis suscipit vel. Vivamus maximus, est eget bibendum blandit, lacus purus sodales ex, in sagittis mauris massa sit amet arcu. Praesent condimentum metus lectus, rutrum tempor metus vulputate ac. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam mattis tellus id lorem tempus, quis convallis sem imperdiet.
					<br>
					<br>
					Sed vestibulum felis risus, ac ultricies mauris mattis in. Etiam vel massa sit amet nisi consectetur feugiat. Phasellus sed odio nec felis ornare interdum. Proin nisl lacus, vestibulum vitae nulla pretium, malesuada maximus turpis.</p>
				</div>
				<div class="right">
					<img src="<?php echo get_template_directory_uri(); ?>/img/description-article.png" alt="">
				</div>
			</div>
			<div class="clear"></div>
			<div class="container container2">
				<div class="left">
					<img src="<?php echo get_template_directory_uri(); ?>/img/description-article.png" alt="">
				</div>
				<div class="right">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non enim nec enim auctor tincidunt. Nulla auctor varius ex. Curabitur sit amet nulla ut diam porttitor tristique. Etiam sit amet porta tellus. Nullam sit amet tellus turpis. Fusce ipsum turpis, congue ac vehicula non, gravida sit amet ligula. Etiam sollicitudin finibus neque, ut viverra felis suscipit vel. Vivamus maximus, est eget bibendum blandit, lacus purus sodales ex, in sagittis mauris massa sit amet arcu. Praesent condimentum metus lectus, rutrum tempor metus vulputate ac. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam mattis tellus id lorem tempus, quis convallis sem imperdiet.
						<br>
						<br>
						Sed vestibulum felis risus, ac ultricies mauris mattis in. Etiam vel massa sit amet nisi consectetur feugiat. Phasellus sed odio nec felis ornare interdum. Proin nisl lacus, vestibulum vitae nulla pretium, malesuada maximus turpis.</p>
					</div>
				</div>
				<div class="clear"></div>
			</section>
			<!-- /Libre -->
			<!-- Newsletter -->
			<section id="castle-region" class="banner-bottom" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/main_castle.jpg');">
				<div class="clear"></div>
				<div class="overlay"></div>
				<div class="content">
					<h2>Abonnez-vous à notre newsletter</h2>
					<div class="cta-discover">
						<a href="">S'abonner</a>
					</div>
				</div>
			</section>
			<!-- /Newsletter -->
			<!-- Social -->
			<section id="home-social">
				<div class="container">
					<ul>
						<li style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/main_castle.jpg');">
							<a href="#"></a>
							<div class="social">
								<svg height="25px" id="Layer_1" style="enable-background:new 0 0 67 67;" version="1.1" viewBox="0 0 67 67" width="25px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M29.765,50.32h6.744V33.998h4.499l0.596-5.624h-5.095  l0.007-2.816c0-1.466,0.14-2.253,2.244-2.253h2.812V17.68h-4.5c-5.405,0-7.307,2.729-7.307,7.317v3.377h-3.369v5.625h3.369V50.32z   M34,64C17.432,64,4,50.568,4,34C4,17.431,17.432,4,34,4s30,13.431,30,30C64,50.568,50.568,64,34,64z" style="fill-rule:evenodd;clip-rule:evenodd;fill:#f2d374;"/></svg>
							</div>
						</li><li style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/description-article.png');">
							<a href="#"></a>
							<div class="social">
								<svg height="25px" id="Layer_1" style="enable-background:new 0 0 67 67;" version="1.1" viewBox="0 0 67 67" width="25px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M29.765,50.32h6.744V33.998h4.499l0.596-5.624h-5.095  l0.007-2.816c0-1.466,0.14-2.253,2.244-2.253h2.812V17.68h-4.5c-5.405,0-7.307,2.729-7.307,7.317v3.377h-3.369v5.625h3.369V50.32z   M34,64C17.432,64,4,50.568,4,34C4,17.431,17.432,4,34,4s30,13.431,30,30C64,50.568,50.568,64,34,64z" style="fill-rule:evenodd;clip-rule:evenodd;fill:#f2d374;"/></svg>
							</div>
							
						</li><li style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/main_castle.jpg');">
							<a href="#"></a>
							<div class="social">
								<svg height="25px" id="Layer_1" style="enable-background:new 0 0 67 67;" version="1.1" viewBox="0 0 67 67" width="25px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M29.765,50.32h6.744V33.998h4.499l0.596-5.624h-5.095  l0.007-2.816c0-1.466,0.14-2.253,2.244-2.253h2.812V17.68h-4.5c-5.405,0-7.307,2.729-7.307,7.317v3.377h-3.369v5.625h3.369V50.32z   M34,64C17.432,64,4,50.568,4,34C4,17.431,17.432,4,34,4s30,13.431,30,30C64,50.568,50.568,64,34,64z" style="fill-rule:evenodd;clip-rule:evenodd;fill:#f2d374;"/></svg>
							</div>

						</li><li style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/description-article.png');">
							<a href="#"></a>
							<div class="social">
								<svg height="25px" id="Layer_1" style="enable-background:new 0 0 67 67;" version="1.1" viewBox="0 0 67 67" width="25px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M29.765,50.32h6.744V33.998h4.499l0.596-5.624h-5.095  l0.007-2.816c0-1.466,0.14-2.253,2.244-2.253h2.812V17.68h-4.5c-5.405,0-7.307,2.729-7.307,7.317v3.377h-3.369v5.625h3.369V50.32z   M34,64C17.432,64,4,50.568,4,34C4,17.431,17.432,4,34,4s30,13.431,30,30C64,50.568,50.568,64,34,64z" style="fill-rule:evenodd;clip-rule:evenodd;fill:#f2d374;"/></svg>
							</div>

						</li><li style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/main_castle.jpg');">
							<a href="#"></a>
							<div class="social">
								<svg height="25px" id="Layer_1" style="enable-background:new 0 0 67 67;" version="1.1" viewBox="0 0 67 67" width="25px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M29.765,50.32h6.744V33.998h4.499l0.596-5.624h-5.095  l0.007-2.816c0-1.466,0.14-2.253,2.244-2.253h2.812V17.68h-4.5c-5.405,0-7.307,2.729-7.307,7.317v3.377h-3.369v5.625h3.369V50.32z   M34,64C17.432,64,4,50.568,4,34C4,17.431,17.432,4,34,4s30,13.431,30,30C64,50.568,50.568,64,34,64z" style="fill-rule:evenodd;clip-rule:evenodd;fill:#f2d374;"/></svg>
							</div>

						</li><li style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/description-article.png');">
							<a href="#"></a>
							<div class="social">
								<svg height="25px" id="Layer_1" style="enable-background:new 0 0 67 67;" version="1.1" viewBox="0 0 67 67" width="25px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M29.765,50.32h6.744V33.998h4.499l0.596-5.624h-5.095  l0.007-2.816c0-1.466,0.14-2.253,2.244-2.253h2.812V17.68h-4.5c-5.405,0-7.307,2.729-7.307,7.317v3.377h-3.369v5.625h3.369V50.32z   M34,64C17.432,64,4,50.568,4,34C4,17.431,17.432,4,34,4s30,13.431,30,30C64,50.568,50.568,64,34,64z" style="fill-rule:evenodd;clip-rule:evenodd;fill:#f2d374;"/></svg>
							</div>

						</li><li>
							<div class="clear"></div>
							<h4>Suivez-nous</h4>
							<div class="links">
								<ul>
								<li><svg height="75px" class="Layer_1" style="enable-background:new 0 0 67 67;" version="1.1" viewBox="0 0 67 67" width="75px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path class="path" d="M38.167,22.283c-2.619,0.953-4.274,3.411-4.086,6.101  l0.063,1.038l-1.048-0.127c-3.813-0.487-7.145-2.139-9.974-4.915l-1.383-1.377l-0.356,1.017c-0.754,2.267-0.272,4.661,1.299,6.271  c0.838,0.89,0.649,1.017-0.796,0.487c-0.503-0.169-0.943-0.296-0.985-0.233c-0.146,0.149,0.356,2.076,0.754,2.839  c0.545,1.06,1.655,2.097,2.871,2.712l1.027,0.487l-1.215,0.021c-1.173,0-1.215,0.021-1.089,0.467  c0.419,1.377,2.074,2.839,3.918,3.475l1.299,0.444l-1.131,0.678c-1.676,0.976-3.646,1.526-5.616,1.567  C20.775,43.256,20,43.341,20,43.405c0,0.211,2.557,1.397,4.044,1.864c4.463,1.377,9.765,0.783,13.746-1.568  c2.829-1.674,5.657-5,6.978-8.221c0.713-1.715,1.425-4.851,1.425-6.354c0-0.975,0.063-1.102,1.236-2.267  c0.692-0.678,1.341-1.419,1.467-1.631c0.21-0.403,0.188-0.403-0.88-0.043c-1.781,0.636-2.033,0.551-1.152-0.402  c0.649-0.678,1.425-1.907,1.425-2.267c0-0.063-0.314,0.042-0.671,0.233c-0.377,0.212-1.215,0.53-1.844,0.72l-1.131,0.361l-1.027-0.7  c-0.566-0.381-1.361-0.805-1.781-0.932C40.766,21.902,39.131,21.944,38.167,22.283z M34,64C17.432,64,4,50.568,4,34  C4,17.431,17.432,4,34,4s30,13.431,30,30C64,50.568,50.568,64,34,64z" style="fill-rule:evenodd;clip-rule:evenodd;fill:#373737;"/></svg></li>
								<li><svg height="75px" class="Layer_1" style="enable-background:new 0 0 67 67;" version="1.1" viewBox="0 0 67 67" width="75px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path class="path" d="M29.765,50.32h6.744V33.998h4.499l0.596-5.624h-5.095  l0.007-2.816c0-1.466,0.14-2.253,2.244-2.253h2.812V17.68h-4.5c-5.405,0-7.307,2.729-7.307,7.317v3.377h-3.369v5.625h3.369V50.32z   M34,64C17.432,64,4,50.568,4,34C4,17.431,17.432,4,34,4s30,13.431,30,30C64,50.568,50.568,64,34,64z" style="fill-rule:evenodd;clip-rule:evenodd;fill:#373737;"/></svg></li>
								<li><svg height="75px" class="Layer_1" style="enable-background:new 0 0 67 67;" version="1.1" viewBox="0 0 67 67" width="75px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path class="path" d="M43.271,26.578v-0.006c0.502,0,1.005,0.01,1.508-0.002  c0.646-0.016,1.172-0.57,1.172-1.217c0-0.963,0-1.927,0-2.89c0-0.691-0.547-1.24-1.236-1.241c-0.961,0-1.922-0.001-2.883,0  c-0.688,0.001-1.236,0.552-1.236,1.243c-0.001,0.955-0.004,1.91,0.003,2.865c0.001,0.143,0.028,0.291,0.073,0.426  c0.173,0.508,0.639,0.82,1.209,0.823C42.344,26.579,42.808,26.578,43.271,26.578z M34,27.817c-3.384-0.002-6.135,2.721-6.182,6.089  c-0.049,3.46,2.72,6.201,6.04,6.272c3.454,0.074,6.248-2.686,6.321-6.043C40.254,30.675,37.462,27.815,34,27.817z M22.046,31.116  v0.082c0,4.515-0.001,9.03,0,13.545c0,0.649,0.562,1.208,1.212,1.208c7.16,0.001,14.319,0.001,21.479,0  c0.656,0,1.215-0.557,1.215-1.212c0.001-4.509,0-9.02,0-13.528v-0.094h-2.912c0.411,1.314,0.537,2.651,0.376,4.014  c-0.161,1.363-0.601,2.631-1.316,3.803s-1.644,2.145-2.779,2.918c-2.944,2.006-6.821,2.182-9.946,0.428  c-1.579-0.885-2.819-2.12-3.685-3.713c-1.289-2.373-1.495-4.865-0.739-7.451C23.983,31.116,23.021,31.116,22.046,31.116z   M46.205,49.255c0.159-0.026,0.318-0.049,0.475-0.083c1.246-0.265,2.264-1.304,2.508-2.557c0.025-0.137,0.045-0.273,0.067-0.409  V21.794c-0.021-0.133-0.04-0.268-0.065-0.401c-0.268-1.367-1.396-2.428-2.78-2.618c-0.058-0.007-0.113-0.02-0.17-0.03H21.761  c-0.147,0.027-0.296,0.047-0.441,0.08c-1.352,0.308-2.352,1.396-2.545,2.766c-0.008,0.057-0.02,0.114-0.029,0.171V46.24  c0.028,0.154,0.05,0.311,0.085,0.465c0.299,1.322,1.427,2.347,2.77,2.52c0.064,0.008,0.13,0.021,0.195,0.03H46.205z M34,64  C17.432,64,4,50.568,4,34C4,17.431,17.432,4,34,4s30,13.431,30,30C64,50.568,50.568,64,34,64z" style="fill-rule:evenodd;clip-rule:evenodd;fill:#373737;"/></svg></li>
							</ul>
							</div>
						</li>
					</ul>
				</div>
			</section>
			<div class="clear"></div>
			<!-- /Social -->
		</main>

		<?php get_footer(); ?>