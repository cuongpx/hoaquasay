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
define('DB_NAME', 'db_hoaquasay');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '>$75O>x!X_as3aU*&qWpdMyw_ KBP?,_,*9top|D|cwr6>r;Lr2kY|.MOl3eAkO^');
define('SECURE_AUTH_KEY',  '~KqWw)Cm~w1gMx_lf&j-)RO2@jRm{1+|(6>t,hz4p0BdOx@5LH]T{yC*}U~C( XB');
define('LOGGED_IN_KEY',    '+v$vVhkr*iMf3_}}G}hmPP:k:AZOV70Yn[?p4Dz&-cQaX$Mq+bPrL4p<rc;M&o%w');
define('NONCE_KEY',        '_3K$Oj@$iSH(&edx^)h;.prMa=^:tms#:vY+4WtJ/{N|]g+`6cE{o!3]wW;G+u8|');
define('AUTH_SALT',        '?YKyf1wJb$5E}d&O46Ybz?pa+ZlYM!M%Y@?h`GM-tn|OX#2f.<)-U4(R5?P6vRcQ');
define('SECURE_AUTH_SALT', '.%}OM:;t}~Zkdp2MV4}iYIV$tXP(s{mUjDA6SQ6|J~+X(:crcK73 O5,)]ZrAzl(');
define('LOGGED_IN_SALT',   'o[Q<!XioJ;<Ki,C+h:e7$P^7W<L3;u=X]m@gA5Hv7iq`C-Xy??GQ;/cY<a&iBy8o');
define('NONCE_SALT',       'fSI0ebe11Swuw5Fve$~]uj3|4l{pwZ%R]g/%4JQnI`x8j`{H:J:^4hj/mF<-4ICR');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
