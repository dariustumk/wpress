<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'wpress' );

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
define( 'AUTH_KEY',         '7XZ#d=MB!_!HVq/W(BfHfCFUfEu}8:Ox}^0tYA`2v7;-zNhk<Za9%Fd:n$^+YVM2' );
define( 'SECURE_AUTH_KEY',  ': Kb3LnqZ_-[ajz[ #FKa0vXaH%KUaP6AWMSZ/)zz(6h=3a@<{7Oxx.4Snv|[d`|' );
define( 'LOGGED_IN_KEY',    'GJGP:M8zlhD#SY[}y7IMC~v423o6Y@o0/NZs(^sr}=}r1WyWT<LIll5{0xvNOU%k' );
define( 'NONCE_KEY',        'b ?wa<H*y+Hb+Iam+pYxcw=y)B@k<p~>P]|mne_J?Z[Av5I2lSwYPAdM7_vP=/v<' );
define( 'AUTH_SALT',        'f;|7biRU+:Nwloavh(lCbz`ag,1(uba?[OQI_&TI/505MQj45SW9Sg[M>=T@HBWz' );
define( 'SECURE_AUTH_SALT', 'lC-oir.={0.)p(w~0QJT$C~Z|>lX6*U1O+Qz[l}A5}jl6q$EO?^1[<PP16w3h_Mt' );
define( 'LOGGED_IN_SALT',   ')xq!oi2~qbm@MY;fxZm]#3GI]]uyU9I9T:|J}U./5)rWWGHj]`_<Lj]Z0j,1I6k*' );
define( 'NONCE_SALT',       'M*;p3Eoc+6K4oe ,McY)m@ZhvTYu@<rd[f5P5};_(u;3~e1>TiuKS4JENs-0k%]`' );

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
define('FS_METHOD' , 'direct');

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
