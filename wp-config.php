<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'anthill');

/** MySQL database username */
define('DB_USER', 'ahuser');

/** MySQL database password */
define('DB_PASSWORD', 'secure');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'DRtj&fexQ>dEYmpLc3K=}%EX0dPAzqaUk*6]o4Qu#02J@(+<i zPl?jJBic6yyU1');
define('SECURE_AUTH_KEY',  'ZfQA%^~+Cozqb6EN}}J^6H.*49,)X.33F3YgoUrx#E;`3|?ad1*{_anQ&|aldB8<');
define('LOGGED_IN_KEY',    '08?c}Yd7M#KU6f}I2VDzzJ;`yHbxU{DABA0busW=@d9EUVC@E}:IBW, FK0<{.0(');
define('NONCE_KEY',        '?=mJw](Qv*NW2MIj;*`} ;^(pDialRA<VFSc(i->%Y-Kov7?CLiY4/W%|pO}8MbD');
define('AUTH_SALT',        '_45/FX41st-ZY5Bu>A(Uu;+Av~pVS]Rvl9+Pb-#C:Ai8gAcI9pUhg<^d-9Vem8=H');
define('SECURE_AUTH_SALT', 'gk>_|oFusZpXeA1tI([`^TP]u?IexvL,_.0W-[2hqbRsj3HBdkq$T+?&6g!(NDiQ');
define('LOGGED_IN_SALT',   'k|IdV*Fob(<Tq+r*~wPB=(W.%I=?:e;v%[bnm84h!>r Erj.!-3!Wn-t:$[yR5ZA');
define('NONCE_SALT',       'E1Id0TW|#wt<!#4%RKW^m]&uVjT_*I{6Zo|,n@f./FL>J!kHGqUs3T=uJ(r=]:N-');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
