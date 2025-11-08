<?php
define( 'WP_CACHE', true );

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
define( 'DB_NAME', 'wordprac' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9`BnxJ<zj-EBf-a5d<BQ$pQ)Z:{Nz~+(jHmf|8D)J{w dL>Il67!b0:j>L>U5xiv' );
define( 'SECURE_AUTH_KEY',  'uAX/6#H|Mk6c[hrf4I>c@mUvUxJk|uZQ#lkM(o+)EWUiA!NLXUJ]e(Y4/5~RcJN3' );
define( 'LOGGED_IN_KEY',    'j(Bd}f{ccqT*0Wl3S3#|f}wbAp&dpm}>@k6_dpi-aH,*u2Q_siV 3p&0(WZiDX%x' );
define( 'NONCE_KEY',        'bgE8T3o2K+$j&#Df:K[Sk1OHJI^V<D/&p3mdM_EnVzX14U0-VJn.~igzx0@:pW2P' );
define( 'AUTH_SALT',        '+FwbyfnND#pO~@x~0ty_LDsgC{nOw/zMa[V_%Q[|jB8dx%.{q>N2%Eo_p1d~J8]w' );
define( 'SECURE_AUTH_SALT', 'WR&4UPseP(cYv2x3I: CvpTGc09E@Eo6B1BMapn,j608$RWxGYm5}`&<w@sRu(=b' );
define( 'LOGGED_IN_SALT',   'hU*+LvZ[TL_+rdhLN@+s[a42(VO3A/4{zF6C[5Ngj$o($YWOUyoddaC=6_1mrZ[;' );
define( 'NONCE_SALT',       'R/b}Cvr#90V#Nf,8|OIzB(_dS!rw}.>HE[(*xYl7xbsiT.-fqM|x_9te~Lve: ID' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
