<?php
/**
*
* @author michaelo phpbbireland@gmail.com - http://www.phpbbireland.com
*
* @package Kiss Portal
* @version 1.0.20
* @copyright (c) 2005-2013 Michael O'Toole (phpbbireland.com)
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
define('UMIL_AUTO', true);
define('IN_PHPBB', true);

// correct root for poral as we install using root/portal_install/index.php //

$phpbb_root_path = './../../../';

$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

$user->session_begin();
$auth->acl($user->data);
$user->setup();

if (!file_exists($phpbb_root_path . 'umil/umil_auto.' . $phpEx))
{
	trigger_error('Please download the latest UMIL (Unified MOD Install Library) from: <a href="http://www.phpbb.com/mods/umil/">phpBB.com/mods/umil</a>', E_USER_ERROR);
}

// The name of the mod to be displayed during installation.
$mod_name = 'Rss for Kiss Portal';

$version_config_name = 'kiss_rss_version';
$language_file = 'portal_install_umil';
$logo_img = $phpbb_root_path . 'portal_install/k2_mods/rss/portal_install.png';

include($phpbb_root_path . 'portal_install/k2_mods/rss/sql_data.' . $phpEx);

$versions = array(
	// New version
	'1.0.0'	=> array(
		'table_add' => array(
			array('phpbb_k_newsfeeds', array(
				'COLUMNS'	=> array(
					'feed_id'          => array('UINT', NULL, 'auto_increment'),
					'feed_title'       => array('STEXT_UNI', ''),
					'feed_show'        => array('BOOL', '1'),
					'feed_url'         => array('STEXT_UNI', ''),
					'feed_position'    => array('UINT:1', '1'),
					'feed_description' => array('UINT:1', '1'),
					),
					'PRIMARY_KEY'	=> 'feed_id',
				),
			),
		),

		'module_add' => array(
			array('acp', 'ACP_K_TOOLS',		array(
					'module_basename' => 'k_newsfeeds',
				),
			),
		),

		'table_insert' => array(
			array($k_newsfeeds_table, $k_newsfeeds_array),
			array($k_blocks_config_vars_table, $k_blocks_config_vars_array),
		),
	),
);//version

include($phpbb_root_path . 'umil/umil_auto.' . $phpEx);

?>