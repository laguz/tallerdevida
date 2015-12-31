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
define('DB_NAME', 'laguzcor_wordpress1e6');

/** MySQL database username */
define('DB_USER', 'laguzcor_word1e6');

/** MySQL database password */
define('DB_PASSWORD', 'U6Nhxu877bJ4');

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
define('AUTH_KEY', ')?<pRKdWK@GhskUut)KF%{j|]t@i%&S|VqeT&*gDL(cGa[*]HubAm(inVnJD@*MZ@lMKIg=r%<-Hv{Iiw|$])UyHU&ivgD]vd]OXn@NFCBBY@QKoycE/G>=^yqPa*yRy');
define('SECURE_AUTH_KEY', 'jlWUPJV=*p%Sa)LL%s<fTF[NOTevpr(-W;v?yavHbMa(TLBVADDJpKPM?}|Y$@C/K};LiCkeU@n*W)DAgvy?G]H?)FCyAzJ/;bvveNh;|N(]AVU+)eez>!uqxU{a]o}W');
define('LOGGED_IN_KEY', 'ycAztefw|OZDNAO*!Pb}PVS+dZRmghUInxQ[rQb/ZN<nL)dEj?L}lhh|jS_VhH))BhDj+LH)nF>oxcQFV*(DNT]d_h^N%=eFXZkX=mfcGOeLlTYuoZsMOCa/v!F_ZTJS');
define('NONCE_KEY', 'l^w>Xe)dhyT(sQuQ|&S_pabBfLQuC>lCZ(GsnvDmBSm_^OuC^|GKP]Z@|*RLWjuN&uLX*QAj&[}]OsEQ{;@<HzEalCErQVPvff;JZ;+EK<YZqIb^T?FBhSej;>{liQXl');
define('AUTH_SALT', 'Co_;!EI_U}H!^elvZ_ngxF!znSvph;[z)r$;$dVC{|wk!x-({WTaYoCLoCI}S!z}YEIgI!qTJQVrnMXTE|[$!(N]@Gt^Q$oWXPtHUCY[d-XvBkx])O&BzRnVMDBnaiKF');
define('SECURE_AUTH_SALT', '<QopL<+BL+%GDPVzgMkL(y}jTHikf=Yg}]Ac<PVGkNC;^xXwA}RTlW^T-TizyE!zwa+Qe&gNqTmoF^kk^NVD[E|+CHuPWPaE=%+N;IO|jN$evXS<AJzepms-&qZWTwiY');
define('LOGGED_IN_SALT', 'DmxMw{WjnMKMmLv>Jaol*mwxeq|g}(Dofb?Xht-Chsl!Gu>Z*T;X%gsoeNxtMi&jgtK]Np*mLUu;-qGW@tYn^c[X!VTz|Esb+d+vgCb=][{X&S=-r*A@E}GFgeS(LLQs');
define('NONCE_SALT', 'Duc>m)aGzujK>@+c]=t[<UFLsxN;LDo{QlJ*[_hAyu*o;S+uk*C;t_/[Xo}wP*_+P>?Gypa}yK*W&WFT&|y<s){Wu+z}D]PJqvBGKAzix_jKd?OW%cwbJdQ-Wpd/otIR');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_zzqr_';

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
