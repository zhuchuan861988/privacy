<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define( 'DB_NAME', "ioforthc_mysql" );

/** MySQL database username */
define( 'DB_USER', "admin.db.653e485" );

/** MySQL database password */
define( 'DB_PASSWORD', "rJ:8nR^4lM;4" );

/** MySQL hostname */
define( 'DB_HOST', "localhost" );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'SnNnNWr!X:<vvwg&ld7:1_@.M:@-d2lwk*-DnNgioE[gcfu&uai]drm!ks<aDTRA');
define('SECURE_AUTH_KEY',  'i^pwF{L^VbVibW:LjAO(*Kua!e;3SiO(%MujA3tNrD8J[R7?00Bj,3H?{@8L+};b');
define('LOGGED_IN_KEY',    'ClW=i!FvnIjM@Bl|J&44khH(w*:JI`=qk}1Xz[guDxU0}( Ev8HsDk^p/v3we#^t');
define('NONCE_KEY',        '?jNp;%XK<AjgJ!cCwhR+$i1mOtsS[DHkqX=5*ZnLiOzyC[%d M6%oCC,H7VYV2vV');
define('AUTH_SALT',        'Jw!-vj1z;Spk9E)xq[sBAbtI5eH/3VMwz>HulMwDDHr7pP<Zq]2BdtQS+!z6BQ!J');
define('SECURE_AUTH_SALT', 'qufSnce$o<=@p{UE)gV2/sh_R&JSR>hp~zher&z&6`CX[9}r@rP-w(S)- k#M2jX');
define('LOGGED_IN_SALT',   '*}/{/:FaG9swH^R) e*~LRP6x,46RNuJr=%Wc9wgq1ZH.#O0;B-nX?R;aE$xeHCw');
define('NONCE_SALT',       'g,QA!&Rh2rW,;<[&2dCc%yRR.W[ w jw)A8fF5>RtxLubNJ-DSyDn/rR.9v3,?TA');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_inforth';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
