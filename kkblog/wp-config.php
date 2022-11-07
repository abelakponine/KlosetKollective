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
define('DB_NAME', 'kkblog_wp63');

/** MySQL database username */
define('DB_USER', 'kingabela');

/** MySQL database password */
define('DB_PASSWORD', 'exploxi2');

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
define('AUTH_KEY',         'mymhvbfbdi31rkumlkvsx1egl2cvldly5pdbmbmbc82wzdqgsjc1kaptl6v7phtg');
define('SECURE_AUTH_KEY',  '7juo4sdiamp9qbcmtuwusavjadoolobvhy1kehhkw8gmqnnkeobkpthuomsuq1ks');
define('LOGGED_IN_KEY',    'hjubny2wunkvjdsklb65x0t9ftfzbbdrev1r073sq0rpdebuaogttqse5czqd3s1');
define('NONCE_KEY',        '2n91fvlgkxid6bzralrxykllool0tcco1dc29pexgwanefz35xngbzf7bx7lwwlf');
define('AUTH_SALT',        'y7rh9wrezjyae4wrteeqxtnzrdl4l1rr06hqxqkt4rx0jpbkks93vgmxoqxzulxi');
define('SECURE_AUTH_SALT', 'oeqj779pqz9a679ajtuqcyosenzrz0unj12fbbcx4jmgndm74vzj3v4npiujhe7z');
define('LOGGED_IN_SALT',   'wts8eiagt7igga8bj2tucuq1l6yt4tgglxosmsnbs9uozmnyledoaovv5fqvth5i');
define('NONCE_SALT',       'pb6kghewfh5hztlkfvcy7cxxfvqemubikrkasufhstqwsaurzbofw0yn5r1nvvhf');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'kkblog_';

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
