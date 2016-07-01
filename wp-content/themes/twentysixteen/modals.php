<!-- Choix wishlist/fav -->
<div class="remodal" data-remodal-id="modal-choice">
	<button data-remodal-action="close" class="remodal-close"></button>
	
	<a href="#modal-validation" class="remodal-button">Ajouter aux favoris</a>
	<a href="#modal-wishlist" class="remodal-button" style="margin-top: 55px;">Créer une wishlist</a>
</div>

<!-- Validation  -->
<div class="remodal" data-remodal-id="modal-validation">
	<button data-remodal-action="close" class="remodal-close"></button>
	<span class="basic">Château ajouté <i class="fa fa-check" aria-hidden="true" style="color:#eece84;"></i></span>
</div>

<!-- Choix wishlist -->
<div class="remodal remodal-wish" data-remodal-id="modal-wishlist">
	<button data-remodal-action="close" class="remodal-close"></button>
	<h3>Choisir une wishlist</h3>
	<div class="content">
		<form action=""><input type="text" placeholder="RECHERCHER"></form>
		<p class="title">Toutes les wishlists</p>
		<div class="line"></div>
		<ul>
			<?php for($i = 1; $i <= 3; $i++): ?>
				<li>
					<p class="left">Toussaint</p>
					<p class="right"><a href="#modal-validation" class="remodal-button">Ajouter</a></p>
				</li>
				<li class="clear"></li>
				<div class="line"></div>
			<?php endfor; ?>
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
		<form action=""><input type="text" placeholder="Nom de la wishlist"></form>
		<div class="cta-button">
			<a href="#modal-validation" class="remodal-button remodal-create">Créer et ajouter</a>
		</div>
	</div>
</div>

<!-- Connexion -->
<div class="remodal remodal-connection" data-remodal-id="modal-connection">
	<button data-remodal-action="close" class="remodal-close"></button>
	<h3>Connexion</h3>
	<form method="GET" action="<?= get_permalink( get_page_by_title( 'dashboard' ) ) ?>" class="connection-form">
		<div class="group">
			<input class="input-connection" type="text"><span class="highlight"></span><span class="bar"></span>
			<label>ADRESSE E-MAIL</label>
		</div>
		<div class="group">
			<input class="input-connection" type="password"><span class="highlight"></span><span class="bar"></span>
			<label>MOT DE PASSE</label>
		</div>
		<input type="submit" style="display:none;" class="button-hidden">
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
	<form class="connection-form">
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
		<button type="button" hidden class="button-hidden">Subscribe</button>
	</form>
	<div class="cta-button">
		<a href="#" class="remodal-button remodal-create button-form">Inscription</a>
	</div>
	<p class="no-account parag">Déjà un compte ?</p>
	<div class="cta-button">
		<a href="#modal-connection" class="remodal-button remodal-create button-form button-inscription">Connexion</a>
	</div>
</div>