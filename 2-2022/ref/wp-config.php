<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'communha' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'communha' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'Kikikiki2001' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'communha.mysql.db' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'shdX~zL>`NRt>s7*:#ipk+b4Kp.dVg29Mh$mQUuMKos+@2WXp0V)2&y}`Lh/`sgY' );
define( 'SECURE_AUTH_KEY',  'x~4Ht8NG3Y l:&(2>2C{tbjLR},mt>XSBMhuIad=v7:iLil>V2U$7]@kR{%2JZ>P' );
define( 'LOGGED_IN_KEY',    '&Uvw6Db8y(/KiWqM&STiVG{1cL t?6sT:5,#m Gc?s`@GCZ)l.w3*;R$OPY52j>q' );
define( 'NONCE_KEY',        '-m/nDsoYlhlQ?Cu;1XY&C5#S:J2*@n%XHP*^?Olc?k0YD(Z{X54h_AS74.:GL[]k' );
define( 'AUTH_SALT',        'm&DgbwMGDv_<CEBcxm[wgb0p]}6^roBN76w?DWYzjxs{S/;^vJ-x+oLi9?Kp)x7t' );
define( 'SECURE_AUTH_SALT', '<q})5_7O&+CJ]5F=YNsQGAf*qG};{:V*Rc5%c b62(5^!E<#8MshC0V<7&k|a]:_' );
define( 'LOGGED_IN_SALT',   'S6)n~mi/Zy2Mc_mJ*)0A%AKc/Tlto!{BB{on5pfR7^,G3(+.fw;2A?IFYj1jFBy8' );
define( 'NONCE_SALT',       '5eB]RBy:-)2+`C!?KxC[x-,L@fi:r`Zc8Q mgKhw+=PW6UXFAL1a8hu#bSKh|G8i' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
