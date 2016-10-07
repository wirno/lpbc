<?php get_header(); ?>
<?php 
if (have_posts()) :
	while (have_posts()) : the_post();
?>
<main id="main" role="main">
	<!-- Recherche châteaux -->
	<section id="castle-search-header" class="search-result-header header-global blog-header">
		<div class="home-main" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/main_castle.jpg');">
			<div class="overlay"></div>
			<div class="discover-content">
				<h1><?php the_title(); ?></h1>
				<?php 
				$get_description = get_the_content();
				$description = get_short_description($get_description, 60, 80);

				?>
				<p><?php print($description); ?></p>
			</div>
		</div>
		<div class="link">
			<span>
				<svg version="1.1" width="18" height="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				viewBox="-199 188 100 100" xml:space="preserve">
				<g class="st0">
					<path fill="none" class="st1" d="M-149,220c9.9,0,18,8.1,18,18c0,9.9-8.1,18-18,18c-9.9,0-18-8.1-18-18C-167,228.1-158.9,220-149,220 M-149,202
					c-19.9,0-36,16.1-36,36s16.1,36,36,36c19.9,0,36-16.1,36-36S-129.1,202-149,202L-149,202z"/>
				</g>
				<g class="st0">
					<path fill="none" class="st1" d="M-148.5,210c-19.9,0-36,11-36,24.7c0,6.5,3.7,12.3,9.6,16.7l-4,14.6l20.5-7.6c3.1,0.6,6.4,1,9.9,1
					c19.9,0,36-11.1,36-24.7C-112.6,221.1-128.7,210-148.5,210z"/>
				</g>
				<g class="st0">
					<rect fill="none" x="-183.8" y="220.1" transform="matrix(0.7071 0.7071 -0.7071 0.7071 121.7817 176.2556)" class="st1" width="63.8" height="30"/>
					<polygon class="st1" points="-134.2,274 -134.2,274 -113,274 -113,252.8 -113,252.8 	"/>
				</g>
				<path  fill="#edcd89" d="M-108.5,188.1h-35.7c-2.5,0-4.9,1-6.7,2.8l-45.2,45.2c-3.7,3.7-3.7,9.7,0,13.5l35.6,35.6c1.9,1.9,4.3,2.8,6.7,2.8
				c2.4,0,4.9-0.9,6.7-2.8l45.3-45.2c1.8-1.8,2.8-4.2,2.8-6.7v-35.6C-99,192.3-103.3,188.1-108.5,188.1z M-127.7,228.8
				c-6.6,0-12-5.4-12-12c0-6.6,5.4-12,12-12c6.6,0,12,5.4,12,12C-115.7,223.4-121.1,228.8-127.7,228.8z"/>
			</svg>
			<p>
				<a href="#">Louis VIX</a>,
				<a href="#">Baroque</a>,
				<a href="#">Jardin</a>,
				<a href="#">Soleil</a>
			</p>
		</span>
	</div>
</section>
<!-- /Recherche châteaux -->

<!-- Article -->
<section id="blog-article">
	<div class="container">
		<div class="author">
			<p><?php print(get_the_author()); ?>, <?php the_date(); ?></p>
		</div>
		<div class="main-part">
			<h2>Lorem Ipsum</h2>
			<?php $explode_description = explode("============", $get_description); ?>
			<p><?php print($explode_description[0]); ?></p>
		</div>
		<div class="second-part">
			<h3>Lorem Ipsum</h3>
			<p><?php print($explode_description[1]); ?></p>
		</div>
		<div class="quotation">
			<?php 
			$description = get_short_description($get_description, 20, 45); ?>
			<p>«<?php print($description); ?>»</p>
		</div>
		<div class="picture">
			<img src="<?php echo get_template_directory_uri(); ?>/img/main_castle.jpg" alt="">
			<p></p>
		</div>
		<div class="main-part">
			<h2>Lorem Ipsum</h2>
			<p><?php print($explode_description[2]); ?></p>
			<p><?php print($explode_description[3]); ?></p>
		</div>
	</section>
	<!-- /Article -->
	<?php
	endwhile;
	endif;
	?>

	<!-- Article -->
	<section id="castle-region" class="banner-bottom" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/main_castle.jpg');">
		<div class="clear"></div>
		<div class="overlay"></div>
		<div class="content">
			<h2>Article suivant</h2>
			<div class="cta-discover">
				<?php if(get_adjacent_post(false, '', false)) {
					next_post_link('%link', 'Lire'); 
				} 
				else{
					previous_post_link('%link', 'Lire'); 
				}
				?>
			</div>
		</div>
	</section>
	<!-- /Article -->
</main>

<?php get_footer(); ?>
s