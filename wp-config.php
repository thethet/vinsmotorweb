<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */
ob_start();
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'vinsmoto_db');

/** MySQL database username */
define('DB_USER', 'vinsmoto_usr');

/** MySQL database password */
define('DB_PASSWORD', '%CVQ)hv4?]HP');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'eor2wCu6DEq~|TbYGbeL+V:1<xLL)rVLf38.L{IewcL=UXh!3|EgV$d6kpQ&Q UJ');
define('SECURE_AUTH_KEY',  'Vzr4HA$x(x5:f(_$.%|-;fAsa1c)=HE2Zj]73 nP}176#Jeox.D^8l.pPj))T2h=');
define('LOGGED_IN_KEY',    'X$ mu:{oVnq/@`P0wi.DMe2e)uJQEaEK/rA=-S9A7y@:,x:H?e*zqEXaasKYGGKU');
define('NONCE_KEY',        'iG{hD]CJwzo?hIcL<bsmxwUA(:1=?_j7Y/yKOW0,(;QoQ7C> w`2XkKuqkLX$2$e');
define('AUTH_SALT',        'x`PeA9 pY( 45X{}3(lu-R<.Y&5$pCPK6%:nWax 8%2>)Fg(GM>5=s7vP=<A=8O*');
define('SECURE_AUTH_SALT', '`Zb2$ IQHD@+JKppoyW:qGkOA28[71g!]|amOy-puEZ}iT#u6(0;Z01;JbIl3n6~');
define('LOGGED_IN_SALT',   '38;`rknjFY^@V:s),Y92$5mpVs}i;S*m%%`JJ9a,|sYh/FI08oh^ <s]eq&cj|%^');
define('NONCE_SALT',       'eP8JV4x?w!G;]##|Q92HbZYlhsRl>9yK{c.O%kd$WzNX!D,gpJl[42reVD3oRuoC');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'vc_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
