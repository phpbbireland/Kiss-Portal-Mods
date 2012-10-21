<?php
if (!defined('UMIL_AUTO')) // keep mpv happy
{
	exit;
}
if (!defined('IN_PHPBB')) // keep mpv happy
{
	exit;
}

$k_blocks_config_vars_array[] = array(
	'config_name'	=> 'k_youtube_link',
	'config_value'	=> 'http://www.youtube.com/v/',
	'is_dynamic'	=> '0',
);

$k_youtube_table = 'phpbb_k_youtube';
$k_youtube_array[] = array(
	'video_category'	=> 'Guitar Magic',
	'video_who'			=> 'Andy McKee',
	'video_link'		=> 'JsD6uEZsIsU',
	'video_title'		=> 'Rylynn',
	'video_rating'		=> '5',
	'video_comment'		=> '',
	'video_poster_id'	=> '2',
);

?>