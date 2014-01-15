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
$k_blocks_config_vars_array[] = array(
	'config_name'	=> 'cloud_max_tags',
	'config_value'	=> '30',
	'is_dynamic'	=> '0',
);
$k_blocks_config_vars_array[] = array(
	'config_name'	=> 'cloud_movie',
	'config_value'	=> 'tagcloud.swf',
	'is_dynamic'	=> '0',
);
$k_blocks_config_vars_array[] = array(
	'config_name'	=> 'cloud_width',
	'config_value'	=> '156',
	'is_dynamic'	=> '0',
);
$k_blocks_config_vars_array[] = array(
	'config_name'	=> 'cloud_height',
	'config_value'	=> '156',
	'is_dynamic'	=> '0',
);
$k_blocks_config_vars_array[] = array(
	'config_name'	=> 'cloud_bg_colour',
	'config_value'	=> '272829',
	'is_dynamic'	=> '0',
);
$k_blocks_config_vars_array[] = array(
	'config_name'	=> 'cloud_speed',
	'config_value'	=> '150',
	'is_dynamic'	=> '0',
);
$k_blocks_config_vars_array[] = array(
	'config_name'	=> 'cloud_mode',
	'config_value'	=> 'both',
	'is_dynamic'	=> '0',
);
$k_blocks_config_vars_array[] = array(
	'config_name'	=> 'cloud_tcolour',
	'config_value'	=> 'FFFFFF',
	'is_dynamic'	=> '0',
);
$k_blocks_config_vars_array[] = array(
	'config_name'	=> 'cloud_tcolour2',
	'config_value'	=> '99ccff',
	'is_dynamic'	=> '0',
);
$k_blocks_config_vars_array[] = array(
	'config_name'	=> 'cloud_hicolour',
	'config_value'	=> '00ff00',
	'is_dynamic'	=> '0',
);
$k_blocks_config_vars_array[] = array(
	'config_name'	=> 'cloud_distr',
	'config_value'	=> '1',
	'is_dynamic'	=> '0',
);
$k_blocks_config_vars_array[] = array(
	'config_name'	=> 'cloud_wmode',
	'config_value'	=> 'transparent',
	'is_dynamic'	=> '0',
);

$k_blocks_table = 'phpbb_k_blocks';
$k_blocks_array[] = array(
	'ndx'			=> '2',
	'title'			=> 'Cloud 9',
	'position'		=> 'R',
	'type'			=> 'H',
	'active'		=> '0',
	'html_file_name'=> 'block_cloud.html',
	'var_file_name'	=> 'k_cloud_vars.html',
	'img_file_name'	=> 'modules.png',
	'view_by'		=> '1',
	'view_all'		=> '1',
	'view_groups'	=> '0',
	'view_pages'	=> '2',
	'groups'		=> '0',
	'scroll'		=> '0',
	'block_height'	=> '0',
	'has_vars'		=> '1',
	'minimod_based'	=> '0',
	'mod_block_id'	=> '0',
	'is_static'		=> '0',
	'block_cache_time'	=> '668',
);


$k_cloud_table = 'phpbb_k_clouds';
$k_cloud_array[] = array(
	'is_active'	=> '1',
	'tag'		=> '1',
	'link'		=> 'http://www.phpbbireland.com',
	'rel'		=> 'external',
	'font_size'	=> '14',
	'colour'	=> '669933',
	'colour2'	=> '333333',
	'hcolour'	=> 'FF0000',
	'text'		=> 'Kiss Portal Engine',
);
$k_cloud_array[] = array(
	'is_active'	=> '1',
	'tag'		=> '1',
	'link'		=> 'http://www.phpbb.com',
	'rel'		=> 'external',
	'font_size'	=> '13',
	'colour'	=> '66CC33',
	'colour2'	=> 'FFCCFF',
	'hcolour'	=> '00CC00',
	'text'		=> 'phpBB',
);


?>