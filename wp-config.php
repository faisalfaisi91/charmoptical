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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'charmoptical');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '12345');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         'a;$ixFN6s/#dQJPs1Mlrzc?(-^8k.%72RHrj x2P.EMe6Fs<m8;1S!?W)2`vX#o=');
define('SECURE_AUTH_KEY',  'gJ]/35HWM0Kj(;&B=%g$3sSM5C6jk^&qA1O|&q$}y%*kY @+iH2rKntUwhkfw7kY');
define('LOGGED_IN_KEY',    'W #P-j(`;a<qv%*2;vlxWKUHuy6P[.~eAC,;d&4D9(qBn`b1wA$XE-[J#Nq^W/,T');
define('NONCE_KEY',        'ci6s9KM27rJsl,RUDi75WkS@9RVcX(@I)W^1#e!u@U; 9q:GvN:6f9`C$m5uHMYi');
define('AUTH_SALT',        't8c``98;`bLC]6Mb2tG+X:Y,;dA5)v4HN#~0&o/W$]ge(|y0]rbAF$dqi18fi7N|');
define('SECURE_AUTH_SALT', '?^7E#@jHd;C4z?{GDSoOU.meN!#/f!=I$c*8)?o72ovh},tPP|6J$xRy$5 vMP%<');
define('LOGGED_IN_SALT',   '-pI?QE+[#w81Y^E%T$59@w]J1IIN,~tyRY+?GXX.B6E}:%uqgLeDd5zZ86ZN[`cW');
define('NONCE_SALT',       'R)ZHf=Af5P8?sQ`Km2~DXDD@-~X9$;6DKItLxAX)2)P;dV3eT2+y2Dx!Z0&8ad((');

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);
define('FS_METHOD', 'direct');
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
