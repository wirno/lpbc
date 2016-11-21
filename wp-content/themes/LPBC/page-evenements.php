<?php get_header(); ?>

    <main id="main" role="main">
        <!-- Recherche châteaux -->
        <section id="castle-search-header" class="search-result-header header-global">
            <div class="home-main" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/evenement.jpg');">
                <div class="overlay"></div>
                <div class="discover-content">
                    <h1>Découvrez les évenements des region de France</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse iaculis ante non eros convallis imperdiet
                        sed eu felis.
                    </p>
                </div>
            </div>
            <div class="link">
			<span>
				<p>Image : évenements de la tour</p>
				<div class="cta">
					<a href="http://lpbc.dev/chateaux/chateau-desclimont/">Voir</a>
				</div>
			</span>
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
                            <p class="left">Régions</p>

                            <?php
                            $terms = get_terms('regions', array('hide_empty' => false));
                            $count_regions_post = [];
                            if($terms){
                                foreach ($terms as $key => $value) {
                                    $args = array(
                                        'post_type' => 'evenement',
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
                    </div>
                </div>


                <div class="content">
                    <div id="Container">
                        <?php
                        $args= array(
                            'post_type' =>'evenement',
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
                            </p>

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
    </main>

<?php
get_footer();
