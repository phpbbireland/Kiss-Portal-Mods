<?php
/**
*
* @author michaelo phpbbireland@gmail.com - http://www.phpbbireland.com
*
* @package sgp
* @version 1.0.2
* @copyright (c) 2005-2014 Michael O'Toole (phpbbireland.com)
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
$mod_name = 'COUNTRY_FLAG_MOD';

$version_config_name = 'k2_country_flag_version';
$language_file = 'mods/k2_country_flags_umil';
$logo_img = 'portal/k2_mods/k2_country_flags/mod_install.png';

$versions = array(

	// Version 1.0.0
	'1.0.0'	=> array(

		'table_column_add' => array(
			array('phpbb_users', 'user_country_flag', array('VCHAR', '100')),
		),
	),
	// Version 1.0.1
	'1.0.1' => array(
		//'config_update' => array(
		//	array('k2_country_flag_version', '1.0.1'),
		//),
	),
	// Version 1.0.2
	'1.0.2' => array(
		//'config_update' => array(
		//	array('k2_country_flag_version', '1.0.2'),
		//),
	),


);//version

include($phpbb_root_path . 'umil/umil_auto.' . $phpEx);

?>