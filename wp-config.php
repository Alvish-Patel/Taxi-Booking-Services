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
define( 'DB_NAME', 'taxi' );

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
define( 'AUTH_KEY',         ':aHz[t<8_J.E}dyC9Q:vH0urQMj#7J8[S^OJ6C&fzTn;4p!PoDL{i0WO](/;lou_' );
define( 'SECURE_AUTH_KEY',  '8:NHv&@CE(W1fa(Q@!!2p]Lox(vs7-j*2L|SWzzCB_}yvdRtO(P>6A4tX-$ASR0M' );
define( 'LOGGED_IN_KEY',    ']ATP0XkWSE2g5k*#{PRrh9_({kQTEL[>^,vqD>AYwqYX=lVh$Ln0j0<-O^Jm->#l' );
define( 'NONCE_KEY',        'q&g|x8UIcR`#NsG+nDVk_uf1FYsWOf/B2*Ttq`{bt,8^wno$yS Nv_RBOH;tuQz ' );
define( 'AUTH_SALT',        'eDq3x^Pl>V rRCb:g-H_ZEa^=a}auP<p+1RcH#2hDG`^6I!!MKs%x9313MC>hoia' );
define( 'SECURE_AUTH_SALT', '_)V@zs`=S*<IN:w*9#z<RNL^VAS%SYlEK1IrfaYG$BI?;q)|Ggjpx/YZfOEm$IVh' );
define( 'LOGGED_IN_SALT',   ']0>p@S0ezNByUehS7h{_/IM@YAU#*)_2uCB0giErX.1=wGUVyF.v{}*.;ePfjrDG' );
define( 'NONCE_SALT',       'nwtc_T EXDO~;N2L[LUq,QsmUg ~9aqDNf4E2s0H37,Tb^ajPOV~yS_!![Ze78(F' );

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
