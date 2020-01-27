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
define( 'DB_NAME', 'bayeast2019' );

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
define( 'AUTH_KEY',         'kp$qs@Gcb9ksBSz,w]/vvuk5zZU_M1paSiNJF|4g5woKZZX8tOuX>~>HxiU8]n-o' );
define( 'SECURE_AUTH_KEY',  'AJ>>7zJpq;x%o{m$HA&l$z?+(3,4>(yf=oITzFG~f&W?Tsk5[Ld@S?*T)-!T76].' );
define( 'LOGGED_IN_KEY',    '!wJw9DxSJix9~QN#$$}MIU>jK1E[R~.rc9QfZ?>5s:rw.[M#uO=O*=U 52#0e_jC' );
define( 'NONCE_KEY',        'voAlx9kNU+T>Gmud2Mzvf/Tbw<Lvzg0 XZ3Q!enxw+6!&ln7THWR{f;x_Ge@Gz~d' );
define( 'AUTH_SALT',        'e+D8:T6,9QQ4oTo 2w%; w%<lbzq=8qoxzap  ~;@yk}t53!]/w 5It_^97W*N~ ' );
define( 'SECURE_AUTH_SALT', 'T{Le6 g(r{@A3^%+ULkW&n6}4Mb4le#l)B=Mv7~69!^RG}OJ$> 5XZQ5Fp?g=S1d' );
define( 'LOGGED_IN_SALT',   'dGMcr+gO?[&iFP%pAn69uUm`U;[.2e_MsR%Qb8c/wVt7=;otKIkU.c1qg&+t#`(u' );
define( 'NONCE_SALT',       '`fFwBtr->Z94()o$[}ed.MVpmU3{srLD^PLFeRnjx^qkPvb@}xYXKrc`b+DQv~VU' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'be_';

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
