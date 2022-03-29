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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'k}|GBw{t:8s(9L;oNkxm5J7A7DZh(+FwqjU (9ly*cz/ao+fkdBm>PNhBy(~s1d~' );
define( 'SECURE_AUTH_KEY',  'y>z{m_BY#pAI|DiMp^FPPf`{1{BHS!KOfUN}yb,GrcojXr/aoQ`aYFM%IfTJR/!l' );
define( 'LOGGED_IN_KEY',    'Xo[ 8/]~2n6vz$G*{f}!/j_r#hL*:qLXok&UD~=8*B OhF^Rh8FM<b^Y@Ay3#1*+' );
define( 'NONCE_KEY',        '}A%`Yf JAP.cWO-4k  x/R1=V(E)~t:qO$2+oe*D;_$;{sL`x/scAb1j0x0{0M= ' );
define( 'AUTH_SALT',        '2vf#?n=.)vI1VEH0k vjxWQLV_`JB1Stdk~svZmP,C#G4Juj^+:bf=z$T)XH8AUx' );
define( 'SECURE_AUTH_SALT', '&3H_4h0y7I:oPLVYdKXSCJ/H3ZZf,)e}Zvn]q3Q|?y_Y.,uJ~kkHIoN;u*ss<ugI' );
define( 'LOGGED_IN_SALT',   'c!K9Tgwnd7r]w2},kdaS@5<`b}Y;h&dm(qtl?yaA+GK&#/&:LM3==WUa+Nt$e}`_' );
define( 'NONCE_SALT',       '`uke>TP<Mrb a{{mYXidvf/eM;y9Sfhn%nBB;itLPxx`>sgWPn%:nJfYZ()~~N5t' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
