<?php
/**
*
* @package acp (Kiss Portal)
* @version $Id: acp_k_newsfeeds.php 1022 2012-10-21 13:15:12Z michealo $
* @copyright (c) 2008 Martin Larsson - aka NeXur
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* @package module_install
*/
class acp_k_newsfeeds_info
{
	function module()
	{
		return array(
			'filename' => 'acp_k_newsfeeds',
			'title'    => 'ACP_K_NEWSFEEDS',
			'version'  => '1.0.1',
			'modes'    => array(
				'select' => array('title' => 'ACP_K_NEWSFEEDS', 'auth' => 'acl_a_k_tools', 'cat' => array('ACP_K_TOOLS')),
			),
		);
	}

	function install()
	{
	}

	function uninstall()
	{
	}
}

?>