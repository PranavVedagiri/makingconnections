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
define('DB_NAME', 'exampleDBqew6v');

/** MySQL database username */
define('DB_USER', 'exampleDBqew6v');

/** MySQL database password */
define('DB_PASSWORD', 'RuG7rUJDUa');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'hOw|l]Dp~9Z#[Oe]Kx#Sh#5ixDS~;Ti;Dm+HW.Te]Am#LX.*;bq6Hm$IX.2quEU^');
define('SECURE_AUTH_KEY',  'K#1h-G5O_1[Oh1]DphxGW*2#Wp9;Dt#PDW#9matDWLu<XLe;H6ixAT.2<Xq6PEm$M');
define('LOGGED_IN_KEY',    'fBjvB>7Yo4Fr!JY8kzBRz>JZGs!JZ@[Vh:z[KZ!1ZoV-[Sh[9hwW_:al1Ghxe#5h');
define('NONCE_KEY',        'BvY^{Q7Mz,Qf!0cn4J0Vg}8kzBRwcs8Jo~l1Co-9Ow|s8Op~KW_1ZpO-]Sh]9ep5L');
define('AUTH_SALT',        'jFgvBU^3>Unr,@R70cvo80N@s!Nkco|-Kd[C1hw9SGw[ZOh1K9hxHaO_5:hWtl;Dt');
define('SECURE_AUTH_SALT', 'c8>sdJ0C[vcoV4!:-gNZG:z|lS8K1~kwhK[-#wdKS9|s~dK1D]wdOZG#t~lS9K1~l');
define('LOGGED_IN_SALT',   'P+Q{fb<fX{<UM^XQ$vMF$JF@QJzrF8rk0[cV>ZR[!VCwoC4hZO_-O9ph51eW]_WOx');
define('NONCE_SALT',       'SK1~#lOWDK;5_pWhO;*lxeL1D]xWiP6.;+mSD.;+iTAL2*mxXI;+<yeL2E.ubITA<');

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
define('WP_DEBUG', false);define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
