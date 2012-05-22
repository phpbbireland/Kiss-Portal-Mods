<?php
/**
*
* @author michaelo phpbbireland@gmail.com - http://www.phpbbireland.com
*
* @package sgp
* @version 3.2.0
* @copyright (c) 2005-2011 Michael O'Toole (phpbbireland.com)
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
define('UMIL_AUTO', true);
define('IN_PHPBB', true);

// correct root for poral as we install using root/portal/index.php //

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
$mod_name = 'YOUTUBE_MOD';

$version_config_name = 'k2_youtube_version';
$language_file = 'mods/k2_youtube_umil';
$logo_img = 'portal/k2_mods/k2_youtube/mod_install.png';

include($phpbb_root_path . '/portal/k2_mods/k2_youtube/sql_data.' . $phpEx);

$versions = array(

	// Version 1.0.0
	'1.0.0a'	=> array(

		'permission_add' => array(
			'Portal' => array(
				'a_k_youtube', 1),
		),
		'permission_set' => array(
			array('ROLE_ADMIN_FULL', 'a_k_youtube'),
		),

		'table_row_insert' => array(
			array('phpbb_k_blocks_config_vars', array(
			array('config_name' => 'k_yourtube_link', 'config_value' => 'http://www.youtube.com/v/'),
			array('config_name' => 'k_yourtube_link_limit', 'config_value' => '5'),
			array('config_name' => 'k_yourtube_auto', 'config_value' => '1'),
		    )),
		),

		'table_add' => array(
			array('phpbb_k_youtube', array(
				'COLUMNS'	=> array(
					'video_id'		=> array('UINT', NULL, 'auto_increment'),
					'video_category'	=> array('XSTEXT_UNI', ''),
					'video_who'		=> array('XSTEXT_UNI', ''),
					'video_link'		=> array('VCHAR', '12'),
					'video_title'		=> array('XSTEXT_UNI', ''),
					'video_rating'		=> array('UINT', '4'),
					'video_comment'		=> array('STEXT_UNI', NULL),
					'video_poster_id'	=> array('UINT', '0'),
					),
						'PRIMARY_KEY'	=> 'video_id',
						'KEYS'		=> array('video_category'	=> array('INDEX', 'video_category'),
					),
				),
			),
		),

		'module_add' => array(
			array('acp', 'ACP_CAT_PORTAL', 'ACP_K_YOUTUBE'),

			array('acp', 'ACP_K_YOUTUBE',	array(
					'module_basename' => 'k_youtube',
				),
			),
		),

		'table_insert' => array(
			array($k_youtube_table, $k_youtube_array),
		),

	),

);//version





include($phpbb_root_path . 'umil/umil_auto.' . $phpEx);

?>