<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress1' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '00^N<2<m;o8ELdF QBfgG;BW:Lw,nai^sVUKGj4-+fK$}<b=$jd:)P^E)WjN3?FJ' );
define( 'SECURE_AUTH_KEY',  'A+)puvVN{`/{9?07?SXUcag)NpT<qQGsS1Z; Yt/1<&qkb.!=GyfA%.<Mtj1cjKr' );
define( 'LOGGED_IN_KEY',    'R6Y-=P~7&9D!?-KN=ustupS>-|<Zv@hBnvzuN^> 0qG(8c^*ThXg%~,8}J4|K-,Y' );
define( 'NONCE_KEY',        'Cul#b$+=2V4WG~(Y$My*8bORQyT-8}`aL~[[]KH0N$w Q]R0#le8H)X$>qO6DSJi' );
define( 'AUTH_SALT',        'F>bQ!wl?wuYHF/3PXm24m]OHv|v$#nuT&[<N?C,n?<WlrZI2jo$zvdg)%NsF*qfA' );
define( 'SECURE_AUTH_SALT', '?A[%p]alf%N?wW+48pV~&5;B&T,m`{=c&j1me EVr4GD: kCRD=ipEu80TWos(Q9' );
define( 'LOGGED_IN_SALT',   'b0$v)CYi8`7H9[_r*@mFJ*S0s_s*2CF)jSkq#1$Ve{1|/L&@`?iDAogv6wt{u|u0' );
define( 'NONCE_SALT',       'T`p3`}A7Ur%Z,Y)MeN&(S*-biEP/9G`G2q.%d}(FSPdOL.u.7`3<0kXbf:Y;Itbg' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
