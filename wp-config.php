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
define('DB_NAME', 'medical-project');

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
define('AUTH_KEY',         '(z{5wG6!KtoD6:Rg[9<hB4&eS<u~D{?Po8SJ>gl;tF>- jo*JcHu/}%,q|Kn~:!y');
define('SECURE_AUTH_KEY',  'eTO>fr}b!`BV<KyZ@g$s~n<(GIBKOO*|=_F#pIU,}=N?N@,q&D!NO_zXkh+XF>* ');
define('LOGGED_IN_KEY',    'YPeWeKwm)ayppq~ahCEo>.1esRQj`t1=M~K%Giq;WCH09>n3:(=^~TNi+vG_Iuft');
define('NONCE_KEY',        'x7+VtqlH#nIAlonJ)Z={x$/c>rO1jwOtw_W+1%PI|{laKGVtC`pFCs>G.xpE5~O4');
define('AUTH_SALT',        'ovnz=B*M?6&d&`1S:+7=O&]=BOq4_Z:/@|WcS1nfgGq;t~Q:n0n@L6qPJ:i/gd6h');
define('SECURE_AUTH_SALT', 'eAxYrRwt0{fZ^`h~<N1D2}1uS={&Sy3o}QZuX]cC}55XZ:OwN;9%y:q#%-jG{7<0');
define('LOGGED_IN_SALT',   'qW;M[gp?M0q(Z2Dj-i|@J.yq*hX}HM}!?V:X~]:?j4ZpnkI1N$aGL:hpIR*n4l&.');
define('NONCE_SALT',       '9E1O%Lb$;~1z&0u%_/yLdbw7IwRzb;:fiUmXjW0M2rV!G?>hcUm0h~z~)RDY in&');

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
