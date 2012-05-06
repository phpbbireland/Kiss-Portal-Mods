<?php
/**
*
* @package install
* @version $Id: portal_install.php 323 2009-01-16 21:55:07Z Michealo $
* @copyright (c) 2005 phpbBB Group
* @copyright (c) 2005 phpbireland
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine


$lang = array_merge($lang, array(

	'INSTALL_IMAGE'			=> '<img src="./../k2_mods/mod_install.png" alt="" border="none">',
	'K2_USER_COUNTRY_FLAG'		=> 'User country flag mod',
	'K2_USER_COUNTRY_FLAG_EXPLAIN'	=> 'Provides country flags for you members...',

	'NONE'				=> 'Not Installed',
	'INSTALL_PANEL'			=> 'User country flag installation Panel',
	'SUB_INTRO'			=> 'Introduction',
	'SELECT_LANG'			=> 'Select language',
	'SUB_SUPPORT'			=> 'Support',
	'REPORT_INSTALLED'		=> 'The mod in already installed',
	'INSTALL_INTRO'			=> 'Welcome to the Country Flag Mod Installation <img src="./../k2_mods/k2_country_flag_install.png" alt="" border="none">',

	'VERSION_NOT_UP_TO_DATE'	=> 'Your version of the mod is not up to date. Please continue the update process.',
	'VERSION_NOT_UP_TO_DATE_X'	=> 'Cannot retrieve version info... code not yet written.',
	'VERSION_CHECK'			=> 'Version check',
	'VERSION_CHECK_EXPLAIN'		=> 'Checks to see if the mod version you are currently running is up to date.',
	'CURRENT_VERSION'		=> 'Current version',
	'LATEST_VERSION'		=> 'Latest version',

	'COUNTRY_FLAG_MOD'		=> 'Kiss II Country Flag Mod',
));

?>