<?php
/**
*
* @author Original Author Michael O'Toole@www.stargate-portal.com
*
* @package {k_newsfeeds.php}
* @version $Id:$ 3.2.0
* @note: Do not remove this copyright. Just append yours if you have modified it,
*        this is part of the Stargate Portal copyright agreement...
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
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'ACP_RSS_MANAGE_FEED'      => 'Add or edit feed(s)',
	'ACP_RSS_RSS_EXPLAIN'      => 'Feed(s) management',

	'RSS_ADD_FEED'             => 'ADD new feed',
	'RSS_RSS_SETTINGS'         => 'General feeds settings',
	'RSS_IN_DB'                => 'Feed’s in database',
	'RSS_ADDED'                => 'Feed successfully added',
	'RSS_CACHE_TIME'           => 'How long time to cache data?',
	'RSS_CACHE_TIME_EXPLAIN'   => 'Maximum age of the cache file for a feed before it is updated, in seconds (default is 1 hour = 60 minutes = 3600 seconds).',
	'RSS_CURL'                 => 'CURL',
	'RSS_DESCRIPTION'          => 'Show Feed Description Yes/No?',
	'RSS_EDIT'                 => 'Edit Feed\'s',
	'RSS_EDIT_EXPLAIN'         => 'Here you can add or edit an existing Feed entry. The Title and version number are required. You will also be able to enter details of where the Feed can be downloaded from and where the Feed itself can be found.',
	'RSS_EXPLAIN'              => 'Text of your Feed goes inhere',
	'RSS_FOPEN'                => 'FOPEN',
	'RSS_ITEMS_LIMIT'          => 'Items limit',
	'RSS_ITEMS_LIMIT_EXPLAIN'  => 'Max Number of shown news from one RSS feed',
	'RSS_POSITIONS'            => 'Position',
	'RSS_POSITION'             => 'Show this feed on which position?',
	'RSS_POSITION_EXPLAIN'     => 'Specify on which side of the RSS block this entry will appear.',
	'RSS_RANDOM_LIMIT'         => 'Random limit',
	'RSS_RANDOM_LIMIT_EXPLAIN' => 'Maximum feeds to randomize in the block.',
	'RSS_REMOVED'              => 'Feed successfully removed',
	'RSS_SHOW_FEED'            => 'Show feed Yes/No?',
	'RSS_TITLE'                => 'Feed Title',
	'RSS_TITLE_EXPLAIN'        => 'Short but descriptive title of the Feed.',
	'RSS_TYPE'                 => 'For downloading RSS use function',
	'RSS_TYPE_EXPLAIN'         => '(FOPEN or CURL is not enabled on every server)',
	'RSS_UPDATED'              => 'Feed successfully edited',
	'RSS_URL'                  => 'URL address of RSS feed',
	'RSS_URL_EXPLAIN'          => 'Input full URL address, starting with http://...',
	'RSS_EDIT_HEADER'          => 'Adding or editing a feed',
	'RSS_ENABLED_EXPLAIN'      => 'Enable/Disable RSS on your site.',
	'RSS_TITLE'                => 'lastRSS configuration &amp; management',
	'RSS_TITLE_EXPLAIN'        => 'Here you can configure basic behavior of lastRSS &amp; manage RSS feeds',
	'RSS_VISIT_FEED'           => 'Subscribe to feed',
));

?>