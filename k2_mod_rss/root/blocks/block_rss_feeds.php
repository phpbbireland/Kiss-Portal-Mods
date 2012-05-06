<?php
/**
* Simple yet powerfull PHP class to parse RSS files.
* copyright (c) 2007 Jiri Smika (Smix) http://phpbb3.smika.net
* (c) 2003-2004 original lastRSS by Vojtech Semecky http://lastrss.oslab.net/
*
* Ported and rewritten for PhpBB3 and Kiss Portal Engine & Stargate Portal by: NeXur
*
* @package Kiss Portal Engine
* @author  Martin Larsson - aka NeXur
* @begin   Mars 2008
* @copyright (c) 2008 Martin Larsson - aka NeXur
* @home    http://www.phpbbireland.com
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @note: Do not remove this copyright. Just append yours if you have modified it,
*        this is part of the Stargate Portal copyright agreement...
*
* @version $Id$
*
* @updated: 06 May 2012 Mike & prosk8er
*
*/

/**
* @ignore
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

$queries = $cached_queries = 0;

define('LEFT_SIDE', 0);
define('RIGHT_SIDE', 1);

global $k_config, $phpbb_root_path;

if ($k_config['rss_feeds_enabled'])
{
	$template->assign_var('S_RSS_ENABLED', true);
}
else
{
	$template->assign_var('S_RSS_ENABLED', false);
}

$cache_dir      = $phpbb_root_path . 'cache';
$cp             = 'UTF-8';
$rsscp          = 'UTF-8';
$rss_type       = $k_config['rss_feeds_type'];
$cache_time     = $k_config['rss_feeds_cache_time'];
$items_limit    = $k_config['rss_feeds_items_limit'];
$con = '';
$rsleft = $rsright = array();

$sql = 'SELECT *
	FROM ' . K_NEWSFEEDS_TABLE . '
	ORDER BY feed_title ASC, feed_url ASC';
$result = $db->sql_query($sql);

while ($row = $db->sql_fetchrow($result))
{
	if($row['feed_position'] == LEFT_SIDE)
	{
		$rsleft = get_contents(1, $row['feed_url']);

		$dis = ($row['feed_description'] == 1) ? sgp_checksize($rsleft['description'], 58) : '';

		$msg = '<span class="gensmall"><strong>' . $dis . "</strong></span><br />";

		if (function_exists('curl_init') == false && $rss_type == 'curl')
		{
			$msg.= '<li class="gensmall">' . $user->lang['NO_CURL'] . '</li>';
		}
		else if (ini_get("allow_url_fopen") == false && $rss_type == 'fopen')
		{
			$msg.= '<li class="gensmall">' . $user->lang['NO_FOPEN'] . '</li>';
		}

		if (ini_get('allow_url_fopen') == '1' && $rss_type == 'fopen' or function_exists('curl_init') && $rss_type == 'curl')
		{
			if ($rsleft['items_count'] <= 0)
			{
				$msg.= '<li class="gensmall">' . $user->lang['RSS_CACHE_ERROR'] . '</li>';
				$msg.= '<li class="gensmall">' . $user->lang['RSS_FEED_ERROR'] . '</li>';
			}
			else
			{
				foreach ($rsleft['items'] as $item)
				{
					$msg.= '<span class="gensmall"><img src="' . $phpbb_root_path . 'images/rss.png" title="" alt="" /> <a href="' . $item['link'] . '" rel="external">' . $item['title'] . '</a></span><br />';
				}
			}
			$msg .= "<br />";
		}

		$template->assign_block_vars('rss_left_column', array(
			'FEEDS_TITLE' => '<a href="' . $row['feed_url'] . '" rel="external">' . $row['feed_title'] . "</a>",
			'LEFT_SYNDICATION' => $msg,
		));
	}

	if($row['feed_position'] == RIGHT_SIDE)
	{
		$rsright = get_contents(2, $row['feed_url']);

		$dis = ($row['feed_description'] == 1) ? sgp_checksize($rsright['description'], 58) : '';

		$msg= '<span class="gensmall"><strong>' . $dis . "</strong></span><br />";

		if (function_exists('curl_init') == false && $rss_type == 'curl')
		{
			$msg.= '<li class="gensmall">' . $user->lang['NO_CURL'] . '</li>';
		}
		else if (ini_get("allow_url_fopen") == false && $rss_type == 'fopen')
		{
			$msg.= '<li class="gensmall">' . $user->lang['NO_FOPEN'] . '</li>';
		}
		if (ini_get('allow_url_fopen') == '1' && $rss_type == 'fopen' or function_exists('curl_init') && $rss_type == 'curl')
		{
			if ($rsright['items_count'] <= 0)
			{
				$msg.= '<li class="gensmall">' . $user->lang['RSS_CACHE_ERROR'] . '</li>';
				$msg.= '<li class="gensmall">' . $user->lang['RSS_FEED_ERROR'] . '</li>';
			}
			else
			{
				foreach ($rsright['items'] as $item)
				{
					$msg.= '<span class="gensmall"><img src="' . $phpbb_root_path . 'images/rss.png" title="" alt="" /> <a href="' . $item['link'] . '" rel="external">' . $item['title'] . '</a></span><br />';
				}
			}
			$msg .= "<br />";
		}

		$template->assign_block_vars('rss_right_column', array(

			'FEEDS_TITLE' => '<a href="' . $row['feed_url'] . '" rel="external">' . $row['feed_title'] . "</a>",
			'RIGHT_SYNDICATION' => $msg,
		));
	}

	$template->assign_vars(array(
		'RSS_DEBUG'	=> sprintf($user->lang['PORTAL_DEBUG_QUERIES'], ($queries) ? $queries : '0', ($cached_queries) ? $cached_queries : '0', ($total_queries) ? $total_queries : '0'),
	));
}

$db->sql_freeresult($result);

function get_contents($position, $url)
{
	$data = '';

	switch($position)
	{
		case 1:
			$data = curl_get_rss($url);
			$data = parse($data);
			return($data);
		break;

		case 2:
			$data = curl_get_rss($url);
			$data = parse($data);
			return($data);
		break;

		default:
			return('');
		break;
	}
	return $data;
}

function curl_get_rss($url)
{
	global$user, $k_config;
	$rss_type = $k_config['rss_feeds_type'];
	$ch = curl_init($url);

	if (isset($ch))
	{
		@curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
		@curl_setopt( $ch, CURLOPT_FAILONERROR, 1);
		@curl_setopt( $ch, CURLOPT_NOPROGRESS, 0);
		@curl_setopt( $ch, CURLOPT_HEADER, 0);
		@curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
		@curl_setopt( $ch, CURLOPT_ENCODING, '');
		@curl_setopt( $ch, CURLOPT_USERAGENT, 'lastRSS');

		// initial connection timeout
		@curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 5);

		// setting this to higher means longer time for loading the page for user!
		@curl_setopt( $ch, CURLOPT_TIMEOUT, 60);
		@curl_setopt( $ch, CURLOPT_MAXREDIRS, 0);

		// get content
		$content = @curl_exec($ch);
		$err = @curl_errno($ch);
		$errmsg = @curl_error($ch);
		$header = @curl_getinfo($ch);

		if(curl_errno($ch))
		{
			return $items = array();
		}
		else
		{
			return $content;
		}
		@curl_close($ch);
	}
}

function parse($rss_content)
{
	global $rss, $user, $k_config;
	$channeltags = array ('title', 'link', 'description', 'language', 'copyright', 'managingEditor', 'webMaster', 'lastBuildDate', 'rating', 'docs');
	$date_format = 'U';
	$itemtags = array('title', 'link', 'author', 'category', 'comments', 'enclosure', 'guid', 'pubDate', 'source');
	$imagetags = array('title', 'url', 'link', 'width', 'height');
	$textinputtags = array('title', 'description', 'name', 'link');


	$default_cp = 'UTF-8';
	$CDATA = 'strip';
	$cp = 'UTF-8';
	$rsscp = 'UTF-8';
	$items_limit = $k_config['rss_feeds_items_limit'];
	$stripHTML = true;

	$rss_type = $k_config['rss_feeds_type'];


	//if download was succesfull
	if (isset($rss_content) && (sizeof($rss_content) > 0))
	{
		// parse document encoding
		$result['encoding'] = my_preg_match("'encoding=[\'\"](.*?)[\'\"]'si", $rss_content);

		// if document encoding is specified, use it
		if (isset($result['encoding']) && ($result['encoding'] != ''))
		{
			$rsscp = $result['encoding'];
		}
		else
		{
			// otherwise use the default encoding
			$rsscp = $default_cp;
		}
		// parse channel info
		preg_match("'<channel.*?>(.*?)</channel>'si", $rss_content, $out_channel);

		foreach ($channeltags as $channeltag)
		{
			$temp = @my_preg_match("'<$channeltag.*?>(.*?)</$channeltag>'si", $out_channel[1]);
			if (isset($temp))
			{
				$result[$channeltag] = $temp;
			}
		}

		// If date_format is specified and lastBuildDate is valid
		if ($date_format != '' && ($timestamp = strtotime($result['lastBuildDate'])) !== -1)
		{
			// convert lastBuildDate to specified date format
			$result['lastBuildDate'] = date($date_format, $timestamp);
		}


		// parse textinput info
		// This a little strange regexp means:
		// Look for tag <textinput> with or without any attributes, but skip truncated version <textinput /> (it's not beggining tag)
		preg_match("'<textinput(|[^>]*[^/])>(.*?)</textinput>'si", $rss_content, $out_textinfo);
		if (isset($out_textinfo[2]))
		{
			foreach ($textinputtags as $textinputtag)
			{
				$temp = my_preg_match("'<$textinputtag.*?>(.*?)</$textinputtag>'si", $out_textinfo[2]);
				if (isset($temp))
				{
					$result['textinput_'.$textinputtag] = $temp;
				}
			}
		}
		// parse images
		preg_match("'<image.*?>(.*?)</image>'si", $rss_content, $out_imageinfo);
		if (isset($out_imageinfo[1]))
		{
			foreach ($imagetags as $imagetag)
			{
				$temp = my_preg_match("'<$imagetag.*?>(.*?)</$imagetag>'si", $out_imageinfo[1]);
				if ($temp != '')
				{
					$result['image_'.$imagetag] = $temp;
				}
			}
		}
		// parse items
		preg_match_all("'<item(| .*?)>(.*?)</item>'si", $rss_content, $items);

		//Added to read entry if format changed Ref: http://www.phpbbireland.com/phpBB3/viewtopic.php?p=16993#p16993
		 if (empty($items[2]))
		 {
			preg_match_all("'<entry(| .*?)>(.*?)</entry>'si", $rss_content, $items);
		 }


		$rss_items = $items[2];
		$i = 0;
		$result['items'] = array(); // create array even if there are no items

		foreach ($rss_items as $rss_item)
		{
			// If number of items is lower then limit: parse one item
			if ($i < $items_limit || $items_limit == 0)
			{
				foreach ($itemtags as $itemtag)
				{
					$temp = my_preg_match("'<$itemtag.*?>(.*?)</$itemtag>'si", $rss_item);
					if (isset($temp))
					{
						$result['items'][$i][$itemtag] = $temp;
					}
				}
				// item title
				if ($stripHTML && isset($result['items'][$i]['title']))
				{
					$result['items'][$i]['title'] = strip_tags(unhtmlentities(strip_tags($result['items'][$i]['title'])));
				}

				// item description
				if ($stripHTML && isset($result['items'][$i]['description']))
				{
					$result['items'][$i]['description'] = strip_tags(unhtmlentities(strip_tags($result['items'][$i]['description'])));
				}

				// If pubDate exists
				if ((isset($result['items'][$i]['pubDate']) && ($result['items'][$i]['pubDate'] != '') ))
				{
					// ... and is valid
					if ((($timestamp = strtotime($result['items'][$i]['pubDate'])) !== -1) && (($timestamp = strtotime($result['items'][$i]['pubDate'])) === false))
					{
						// convert pubDate to specified date format
						$result['items'][$i]['pubDate'] = date($date_format, $timestamp);
					}
					else
					{
						$result['items'][$i]['pubDate'] = time();
					}
				}
				else
				{
					$result['items'][$i]['pubDate'] = time();
				}
				// item counter
				$i++;
			}
		}
		$result['items_count'] = $i;

		//echo '<pre>';print_r($result);echo '</pre>';

		return ($result);
	}
	else
	{
		// error in getting content return error
		$result['items'] = array();
		$result['description'] = $user->lang['RSS_ERROR'];
		$result['title'] = '{L_RSS_ERROR}';
		$result['items_count'] = '{L_RSS_ERROR}';
		return ($result);
	}
}



function my_preg_match($pattern, $subject)
{
	// start regullar expression
	preg_match($pattern, $subject, $out);
	// if there is some result... process it and return it
	if (isset($out[1]))
	{
		// cdata
		$out[1] = strtr($out[1], array('<![CDATA['=>'', ']]>'=>''));
		if ((isset($rsscp))&&($rsscp != 'UTF-8'))
		{
			// recode with phpBB´s functions
			$out[1] = utf8_recode($out[1],$rsscp);
		}

		// Return result
		return trim($out[1]);
	}
	else
	{
		// if there is NO result, return empty string
		return('');
	}
}

function unhtmlentities ($string)
{
	// Get HTML entities table
	$trans_tbl = get_html_translation_table (HTML_ENTITIES, ENT_QUOTES);

	// Flip keys<==>values
	$trans_tbl = array_flip ($trans_tbl);

	// Add support for &apos; entity (missing in HTML_ENTITIES)
	$trans_tbl += array('&apos;' => "'");

	// Replace entities by values
	return strtr($string, $trans_tbl);
}

?>