<!-- Choix wishlist/fav -->
<?php 
if (have_posts()) :
	while (have_posts()) : the_post();
		$current_post_id = $post->ID;
	endwhile;
endif;
?>
<input type="hidden" name="post_id" value="<?php echo $current_post_id; ?>" class="post_id" />
<div class="remodal" data-remodal-id="modal-choice">
	<button data-remodal-action="close" class="remodal-close"></button>
	
	<?php

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
                    'value'     => get_current_user_id(),
                    'compare'   => '='
                ),
                array(
                    'key'       => 'post_id',
                    'value'     => $current_post_id,
                    'compare'   => '='
                )
            )
        );

        $the_query = new WP_Query( $args );

        if( $the_query->have_posts() ) {
            while ($the_query->have_posts() ) : $the_query->the_post(); ?>
            	<a href="#modal-validation" class="remodal-button" id="fav">Retirer des favoris</a>
			<?php
            endwhile;
        } else { ?>
        	<a href="#modal-validation" class="remodal-button" id="fav">Ajouter aux favoris</a>
        <?php } ?>
	<a href="#modal-wishlist" class="remodal-button" style="margin-top: 55px;">Créer une wishlist</a>
</div>

<!-- Validation  -->
<div class="remodal" data-remodal-id="modal-validation">
	<button data-remodal-action="close" class="remodal-close"></button>
	<span class="basic">Ajouter <i class="fa fa-check" aria-hidden="true" style="color:#eece84;"></i></span>
</div>

<!-- Choix wishlist -->
<div class="remodal remodal-wish" data-remodal-id="modal-wishlist">
	<button data-remodal-action="close" class="remodal-close"></button>
	<h3>Choisir une wishlist</h3>
	<div class="content">
		<form action=""><input type="text" placeholder="RECHERCHER"></form>
		<p class="title">Toutes les wishlists</p>
		<div class="line"></div>
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
            		if(!isset($unique_users_wishlist[$num_wishlist])){
            			$unique_users_wishlist[$num_wishlist] = array();
            		}
            		if(!in_array($post_id, $unique_users_wishlist[$num_wishlist])){
            			$unique_users_wishlist[$num_wishlist]['posts'][] = $post_id;
            			$unique_users_wishlist[$num_wishlist]['name'] = $name_wishlist;
            		}
            	}
            endwhile;
        }
		?>
		<ul>
			<?php foreach ($unique_users_wishlist as $key => $value) : 
			if(in_array($current_post_id, $value['posts'])) { ?>
				<li>
					<p class="left"><?= $value['name']; ?></p>
					<p class="right"><a href="#modal-validation" class="remodal-button" id="addtowishlist" data-num_wishlist="<?= $key; ?>">Retirer</a></p>
				</li>
				<li class="clear"></li>
				<div class="line"></div>
				<?php } else{ ?>
				<li>
					<p class="left"><?= $value['name']; ?></p>
					<p class="right"><a href="#modal-validation" class="remodal-button" id="addtowishlist" data-num_wishlist="<?= $key; ?>">Ajouter</a></p>
				</li>
				<li class="clear"></li>
				<div class="line"></div>
				<?php } ?>
				
			<?php endforeach; ?>
		</ul>
		<div class="cta-button">
			<a href="#modal-create" class="remodal-button">Créer une wishlist</a>
		</div>
	</div>
</div>

<!-- Création -->
<div class="remodal remodal-wish" data-remodal-id="modal-create">
	<button data-remodal-action="close" class="remodal-close"></button>
	<h3>Créer une wishlist</h3>
	<div class="content">
		<form class="creation-wishlist">
			<input type="text" placeholder="Nom de la wishlist">
			<input type="submit" style="display:none;" class="button-hidden">
		</form>
		<div class="cta-button">
			<a href="#modal-validation" class="remodal-button remodal-create button-form">Créer et ajouter</a>
		</div>
	</div>
</div>

<!-- Connexion -->
<div class="remodal remodal-connection" data-remodal-id="modal-connection">
	<button data-remodal-action="close" class="remodal-close"></button>
	<h3>Connexion</h3>
	<form class="connection-form">
		<div class="group">
			<input class="input-connection" type="text"><span class="highlight"></span><span class="bar"></span>
			<label>ADRESSE E-MAIL</label>
		</div>
		<div class="group">
			<input class="input-connection" type="password"><span class="highlight"></span><span class="bar"></span>
			<label>MOT DE PASSE</label>
		</div>
		<input type="submit" style="display:none;" class="button-hidden">
		<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
	</form>
	<div class="cta-button">
		<a href="#" class="remodal-button remodal-create button-form">Connexion</a>
	</div>
	<a class="forgot parag" href="">Mot de passe oublié ?</a>
	<p class="no-account parag">Pas de compte ?</p>
	<div class="cta-button">
		<a href="#modal-inscription" class="remodal-button remodal-create button-form button-inscription">Inscription</a>
	</div>
</div>

<!-- Inscription -->
<div class="remodal remodal-connection remodal-inscription" data-remodal-id="modal-inscription">
	<button data-remodal-action="close" class="remodal-close"></button>
	<h3>Inscription</h3>
	<form class="connection-form" id="registerusers">
		<div class="group">
			<input class="input-connection" type="text"><span class="highlight"></span><span class="bar"></span>
			<label>USERNAME</label>
		</div>
		<div class="group">
			<input class="input-connection" type="text"><span class="highlight"></span><span class="bar"></span>
			<label>ADRESSE E-MAIL</label>
		</div>
		<div class="group">
			<input class="input-connection" type="password"><span class="highlight"></span><span class="bar"></span>
			<label>MOT DE PASSE</label>
		</div>
		<div class="group">
			<input class="input-connection verif" type="password"><span class="highlight"></span><span class="bar"></span>
			<label class="verif-mdp">VERIFICATION MOT DE PASSE</label>
		</div>
		<input type="submit" style="display:none;" class="button-hidden">
	</form>
	<div class="cta-button">
		<a href="#" class="remodal-button remodal-create button-form">Inscription</a>
	</div>
	<p class="no-account parag">Déjà un compte ?</p>
	<div class="cta-button">
		<a href="#modal-connection" class="remodal-button remodal-create button-form button-inscription">Connexion</a>
	</div>
</div>