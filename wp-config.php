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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'kochi-hung' );

/** Database username */
define( 'DB_USER', 'pvqhtrick2311' );

/** Database password */
define( 'DB_PASSWORD', 'phanvanquocHung2311' );

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
define( 'AUTH_KEY',         'C$2arY!1s2W]N,G8mw$&2:}sv;.^=fK!mW@c@e9`CraD//eTum(khKho 15iFL?(' );
define( 'SECURE_AUTH_KEY',  'J$j0@=X5/gL51ZbEt^[:P>EuAa>DZJp.90RZu#Y5k|Ci]lb^B-,awPp`H-e%*}>[' );
define( 'LOGGED_IN_KEY',    'uEJaCcq^l<F+X21Xw?2Z?5V?;*d?J$O0nMSPt>dXqr@-sDTZb41Ck#] X,uJr_I&' );
define( 'NONCE_KEY',        'w0|L.ho_YU+-0SO[*_oy$[dngbjFlR_P{&5bu!R)3@e!V}h];rH1*9zC?E0z{ j8' );
define( 'AUTH_SALT',        'Y@zNb d+Vo6.bj5~hz$AZD]5tJ-U2@~]KUaKpEVP(*SMbe}Pzz,R6?H`{L1~u8O`' );
define( 'SECURE_AUTH_SALT', 'D.;F/_}Y]Q[[8+_;:q-p[L&=;@xHo_(WMnSgj4Capxz9b?R }LhM7+|3 9Y7bwfa' );
define( 'LOGGED_IN_SALT',   '__9P _uC[>ztH8`-@~~7<01vEke%Ss*9%iAWTZu<=56)5:T!<(<&w(T6Hit4zV>D' );
define( 'NONCE_SALT',       's1R_FpvKkNu}L5q6Mid[;hF(}mZ]F;rqn12A6=DCLpu}9ie6^:xkDJzB!Bz#A?li' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
