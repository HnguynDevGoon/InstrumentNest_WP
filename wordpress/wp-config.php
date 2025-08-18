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
define( 'DB_NAME', 'instrumentnest' );

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
define( 'AUTH_KEY',         '&3H3L0e6Xq:77Heu.2qO:Q,5B>(Gfp4)n]Bw;zK~wV![pzTrG8#n>ncoY,<];sP*' );
define( 'SECURE_AUTH_KEY',  '^eV[eJqS>NKSK[#Px}%zM[63r35q`||O5D-Jkez8L^l_I5sw&?0}< Dbr1M~vk<M' );
define( 'LOGGED_IN_KEY',    'YqODG=mG!iK~JbFqKHd}`79K}I6w%b.aDPY=;pEz3_gCR?GjRz{:+J45je)PZ|6(' );
define( 'NONCE_KEY',        'A{$/GRLQfhSZTM*Lw&+hyV(_8$E:7+;%Ywch%]crJ0n2p[M=Z:=?UvFw&,tXy^b1' );
define( 'AUTH_SALT',        '}JhwYS.MfsLard 7NEbK/z|;IgJuO6bRbdaO)5`iP>rDchn>mzk@:v{GsQNw P..' );
define( 'SECURE_AUTH_SALT', '>7|+>M#W!35*20vEQpn)@213J`tGO?N:)&8*;)Djd5u&e8jtx/Em?`ycJE}pWbxv' );
define( 'LOGGED_IN_SALT',   'YqjPldi)f,=VV`759qM~J~&*}N (b{j(C+2c/G@Z4LRJXC_>[Z*xe{[-ay`n8*tX' );
define( 'NONCE_SALT',       'UGi3Dvqx[v?2?qZdY7iJ?@7O?XE =37>v.N?^rOQk<g=Ter5FGy[wi4f4X#.v8uZ' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
