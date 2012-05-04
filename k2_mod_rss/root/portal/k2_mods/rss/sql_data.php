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
  'config_name'  => 'rss_feeds_cache_time',
  'config_value' => '3600',
  'is_dynamic'   => '0',
);
$k_blocks_config_vars_array[] = array(
  'config_name'  => 'rss_feeds_items_limit',
  'config_value' => '5',
  'is_dynamic'   => '0',
);
$k_blocks_config_vars_array[] = array(
  'config_name'  => 'rss_feeds_random_limit',
  'config_value' => '4',
  'is_dynamic'   => '0',
);
$k_blocks_config_vars_array[] = array(
  'config_name'  => 'rss_feeds_type',
  'config_value' => 'fopen',
  'is_dynamic'   => '0',
);
$k_blocks_config_vars_array[] = array(
  'config_name'  => 'rss_feeds_enabled',
  'config_value' => '1',
  'is_dynamic'   => '0',
);

$k_newsfeeds_table = 'phpbb_k_newsfeeds';
$k_newsfeeds_array = array();
$k_newsfeeds_array[] = array(
  'feed_title'    => 'phpBB.com',
  'feed_show'     => '1',
  'feed_url'      => 'http://www.phpbb.com/feeds/rss/',
  'feed_position'     => '1',
  'feed_description'  => '1'
);

// Finished tables and data ... A schema file is so much easier ;) 23 September 2010
?>