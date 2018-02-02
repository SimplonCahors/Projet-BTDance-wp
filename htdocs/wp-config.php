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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'btdanceproject');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'sqlroot');

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
define('AUTH_KEY',         'W mtj{lfF7H$>?ts}=DT;:N$Q3;Zigr#Pm/C(UeU-PQEcQ`bPNz,A?Xr6%8gFTZo');
define('SECURE_AUTH_KEY',  '|@t #qNR!?wG1pERW>BLDo7ggOUCuauG[TO-gQ5Q,74xlq><2zsc:2B@PA BaLiz');
define('LOGGED_IN_KEY',    '!4DK5tML#8.Hh5m$)lnquFJQX?,O$f,c|kD)KWED%-dH`zhThD8Xt@fHwaoKf:m)');
define('NONCE_KEY',        '?F),&2{z*DTz=W|.UB[+71v=-HrGmRXKjWxnnkXOw|l)FVd2nm%0,@v!l0hPDy3a');
define('AUTH_SALT',        'OuB^:7Rh*cmisi5@CWJSoJW))5`fNU0F0GO&B1Zdh(]R*T^20L1!<2V:U%(F*J*j');
define('SECURE_AUTH_SALT', '084l]d T(Nu?>*[,*~Lox?Bq9ACV=4j3KXpz.8<7[G)vJ5LS~1:2zXU%#9[$At1E');
define('LOGGED_IN_SALT',   'c]F&~=S!DT^ih6kq?aqbH J1pJXW}vyAofoZvh@D8hH)I&xC?*cxJ6N,~n]U4{)]');
define('NONCE_SALT',       'fy#[dwQEUV/`(YNpaRnS~v)~-.yP8^b&ntqquHee;3;wD`CMS?>T=8%&zwDal!En');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
error_reporting(E_ALL); ini_set('display_errors', 1);
 
define( 'WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
