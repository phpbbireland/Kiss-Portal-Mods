<?php
if (!defined('UMIL_AUTO')) // keep mpv happy
{
	exit;
}
if (!defined('IN_PHPBB')) // keep mpv happy
{
	exit;
}

$k_blocks_config_vars_table = 'phpbb_k_blocks_config_vars';
$k_blocks_config_vars_array = array();
$k_blocks_config_vars_array[] = array(
	'config_name'  => 'k_referrals_to_display',
	'config_value' => '5',
	'is_dynamic'   => '0',
);
$k_blocks_config_vars_array[] = array(
	'config_name'  => 'k_referrals_enabled',
	'config_value' => '1',
	'is_dynamic'   => '0',
);

$k_referrals_table = 'phpbb_k_referrals';
$k_refereals_array = array();
$k_referrals_array[] = array(
	'host'        => 'phpbbireland.com',
	'hits'        => '1',
	'firstvisit'  => '1220665580',
	'lastvisit'   => '1220665604',
	'enabled'     => '1'
);

// Finished tables and data ... A schema file is so much easier ;) 23 September 2010
?>