<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'busby_quixtec_com');

/** MySQL database username */
define('DB_USER', 'busbyquixteccom');

/** MySQL database password */
define('DB_PASSWORD', 'zf6qJNFv');

/** MySQL hostname */
define('DB_HOST', 'mysql.busby.quixtec.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'x;l~HO"4mH*9cf;iFNII@(yxZ&906xPm_Ba6q5yOqO*uq8^r~;AuoWF/TRaRs%Ui');
define('SECURE_AUTH_KEY',  'QuOJaRtYfzIbo7Q~II@&dJR/2#!qqzYH8M6em/Cej!g2Y910UQe7TD5E:Kv@b#"d');
define('LOGGED_IN_KEY',    'rnj13xeN$`N7At%oiklM4NSZxd:(WZE5C`d~e&:by4E#QUJvoYpZU9(YGkDnid_t');
define('NONCE_KEY',        'jI^)zB)KPautg94ASr~Fomj4q6P)QbvnjJ5FMeBVGaX$HOkt_g8avq7ejE$yTc_7');
define('AUTH_SALT',        'yIXxX5l%;ZkyW$_e^kymoOPt)7cT2?SX9(2"K(Wk8UeuKZM9s*Q^UrwcK%e8YPHP');
define('SECURE_AUTH_SALT', '3!!|FzizLCYEDc`9DndEM@KDTk4E|UsLcz*elvNTaAs*5"i;lIp1h!uP6y6OvIBM');
define('LOGGED_IN_SALT',   'mSxFkaux*m&_2*(T)E@~t!#4(cd"6E2VZ77?~F8zqh#r1gcoL(%Rg^oyJ#A$/wl:');
define('NONCE_SALT',       '`5!(6Ep66?i*eA;2^$~szZYKcG:"U5GE6HMe@N2wxMR^|QkdencuhxwCR%|!DK(S');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_8nsttq_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/**
 * Removing this could cause issues with your experience in the DreamHost panel
 */

if (preg_match("/^(.*)\.dream\.website$/", $_SERVER['HTTP_HOST'])) {
        $proto = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
        define('WP_SITEURL', $proto . '://' . $_SERVER['HTTP_HOST']);
        define('WP_HOME',    $proto . '://' . $_SERVER['HTTP_HOST']);
        define('JETPACK_STAGING_MODE', true);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
