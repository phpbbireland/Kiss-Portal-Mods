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
$mod_name = 'Referrals for Kiss Portal';

$version_config_name = 'kiss_referrals_version';
$language_file = 'portal_install_umil';
$logo_img = $phpbb_root_path . 'portal/k2_mods/referrals/portal_install.png';

include($phpbb_root_path . 'portal/k2_mods/referrals/sql_data.' . $phpEx);

$versions = array(
	// New version
	'1.0.0'	=> array(
		'table_add' => array(
			array('phpbb_k_referrals', array(
				'COLUMNS'  => array(
					'id'         => array('UINT', NULL, 'auto_increment'),
					'host'       => array('STEXT_UNI', ''),
					'hits'       => array('UINT', '0'),
					'firstvisit' => array('TIMESTAMP', NULL),
					'lastvisit'  => array('TIMESTAMP', NULL),
					'enabled'    => array('BOOL', '1'),
					),
					'PRIMARY_KEY' => 'id',
				),
			),
		),

		'module_add' => array(
			array('acp', 'ACP_K_TOOLS',		array(
					'module_basename' => 'k_referrals',
				),
			),
		),

		'table_insert' => array(
			array($k_referrals_table, $k_referrals_array),
			array($k_blocks_config_vars_table, $k_blocks_config_vars_array),
		),
	),
);//version

include($phpbb_root_path . 'umil/umil_auto.' . $phpEx);

?>