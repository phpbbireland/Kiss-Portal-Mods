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
	'config_name'	=> 'k_poll_post_id',
	'config_value'	=> '0',
	'is_dynamic'	=> '0',
);
$k_blocks_config_vars_array[] = array(
	'config_name'	=> 'k_poll_view',
	'config_value'	=> '1',
	'is_dynamic'	=> '0',
);

// Finished tables and data ... A schema file is so much easier ;) 23 September 2010
?>