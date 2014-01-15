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
$mod_name = 'DONATIONS_MOD';

$version_config_name = 'k2_clouds_version';
$language_file = 'mods/k2_clouds_umil';
$logo_img = 'portal/k2_mods/k2_clouds/mod_install.png';

include($phpbb_root_path . '/portal/k2_mods/k2_clouds/sql_data.' . $phpEx);

$versions = array(

	// Version 1.0.0
	'1.0.0'	=> array(

		'permission_add' => array(
			'Portal' => array(
				'a_k_cloud', 1),
		),
		'permission_set' => array(
			array('ROLE_ADMIN_FULL', 'a_k_clouds'),
		),

		'table_add' => array(
			array('phpbb_k_clouds', array(
				'COLUMNS'	=> array(
					'tag_id'	=> array('UINT', NULL, 'auto_increment'),
					'is_active'	=> array('BOOL', '1'),
					'tag'		=> array('USINT', '1'),
					'link'		=> array('VCHAR', 'portal.php'),
					'rel'		=> array('VCHAR:20', 'external'),
					'font_size'	=> array('VCHAR:10', '9'),
					'colour'	=> array('VCHAR:10', '000000'),
					'colour2'	=> array('VCHAR:10', '333333'),
					'hcolour'	=> array('VCHAR:10', '00ff00'),
					'text'		=> array('VCHAR:50', 'empty'),
					),
					'PRIMARY_KEY'	=> 'tag_id',
				),
			),
		),

		'module_add' => array(
			array('acp', 'ACP_CAT_PORTAL', 'ACP_K_CLOUDS'),

			array('acp', 'ACP_K_CLOUDS',		array(
					'module_basename' => 'k_clouds',
				),
			),
		),

		'table_insert' => array(
			array($k_cloud_table, $k_cloud_array),
		),
	),

);//version

include($phpbb_root_path . 'umil/umil_auto.' . $phpEx);

?>