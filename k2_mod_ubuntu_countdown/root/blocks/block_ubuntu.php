<?php
/**
*
* @package Kiss Portal
* @author  Tyler (Prosk8er)
* @begin   Monday, Jan 09, 2012
* @copyright (c) 2005-2012 Got Skills Lounge
* @home    http://www.gotskillslounge.com
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @note: Do not remove this copyright. Just append yours if you have modified it,
*        this is part of the Stargate Portal copyright agreement...
*
* @version $Id: block_ubuntu.php 0 2013-06-01 20:39:30Z Prosk8er $
*
*/

/**
* @ignore
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';

// assign some data to variables //
//$ubuntu_countdown = '<a href="http://www.ubuntu.com/"><img src="http://www.ubuntu.com/countdown/banner2.png" border="0" width="180" height="150" alt="The next version of Ubuntu is coming soon" /></a>';
$ubuntu_countdown = '<iframe src="http://djazz.mine.nu/files/ubuntucountdown/" width="180" height="150" scrolling="no" frameborder="0">Ubuntu countdown</iframe>';
$ubuntu_text = "Click a image below to download";
$ubuntu_desktop = '<a href="http://www.ubuntu.com/desktop">' . '<img src="' . $phpbb_root_path . 'images/ubuntu_desktop.png' . '" alt="Get Ubuntu desktop" /></a>';
$ubuntu_server = '<a href="http://www.ubuntu.com/server">' . '<img src="' . $phpbb_root_path . 'images/ubuntu_server.png' . '" alt="Get Ubuntu server" /></a>';

	$template->assign_vars(array(
		'UBUNTU_COUNTDOWN'	=> $ubuntu_countdown,
		'UBUNTU_TEXT'		=> $ubuntu_text,
		'UBUNTU_DESKTOP'	=> $ubuntu_desktop,
		'UBUNTU_SERVER'		=> $ubuntu_server,
	));


?>