<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'lpbc');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'lesgrappes');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N'y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

define( 'WP_DEFAULT_THEME', 'default' );

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ')`:|l5FZr6aFwfF`<-5-p.|~# c6uaTV+)CHW3_lynfAO344.JtV:PAS.=%;/eVk');
define('SECURE_AUTH_KEY',  '2&Kd6lSFqLPQZ&L.RH^`MvB-<;DMJ0Lx-dxeq6x,::xB/_]wD-}VjO8hMZnLw.{)');
define('LOGGED_IN_KEY',    '4W48?fKa(NXClW<%aMS9h3|B$L}$$Qar7UqP`TQ-jR9 ]K:P-[]M1,T9?l1~G{K/');
define('NONCE_KEY',        '^xF&aX94k84]{rCc9LF@]:L+$kOq{[K8-p!eM}|T-AU|q? ;NP0v1n|@[!-mL+U$');
define('AUTH_SALT',        '8d6>I<|K1r >#,##i]N|U@JhmgS/InA{)4mp`mTnyABI^<(),`;o]]ey^.#IH4Qi');
define('SECURE_AUTH_SALT', '9-=<0U+UE))ToD73{[q#xy&{I9G]|mb-rV-|ZCQ9XE/FNP8`CQ)c^#M_5e1l-tg}');
define('LOGGED_IN_SALT',   ';eCWymsR{Wd2z@suj$7~67>y+*nVo_T[8MgCbs/;>]G9mwc0lJc[UkdC=is0U#^K');
define('NONCE_SALT',       'm}+8Qz_CE7<f=x<8kb&^v 7-q Q45[1o3,acKF6lj{==-}xhNu1=:gre@BXd|aq}');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'lpbc_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 */
define('WP_DEBUG', false);

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');