<?php /*
Plugin Name: BBCode Deluxe
Plugin URI: http://dcjtech.info/
Description: Adds support for BBCode to Wordpress and BBPress
Version: 2020.08.01.2
Author: Devyn Collier Johnson (DevynCJohnson)
Author URI: http://dcjtech.info/
License: GNU General Public License version 3 (GPL3)
License URI: http://www.gnu.org/licenses/gpl-3.0.html
This plugin includes code from the below listed developers and their plugins.
Copyright (C) 2013 Anton Channing ("Video and Audio BBCodes" and "bbPress2 BBCode")
Copyright (C) 2010 b0ingBall (b0ingBall BBCode plugin)
Copyright (C) 2008 Viper007Bond (the original BBCode plugin)
*** GPL3 ***
"BBCode Deluxe" is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
"BBCode Deluxe" is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with "BBCode Deluxe". If not, see <http://www.gnu.org/licenses/>.
*/


defined('ABSPATH') or die('Invalid entrance into the plugin BBCode Deluxe!');


function quote_exempt_from_wptexturize($shortcodes)
{
	return ['quote', 'q', 'QUOTE', 'Q'];
}


function code_exempt_from_wptexturize($shortcodes)
{
	return ['no-highlight', 'pre', 'raw'];
}


function caption_exempt_from_wptexturize($shortcodes)
{
	return ['caption'];
}


function nested_quotes($content, $not_used = false)
{
	if (!mb_strpos($content, '[quote')) {
		return $content;
	}
	$counter = 0;
	$tag_counter_string = '';
	$content = preg_replace('/[\n\r]/', '', $content);
	$content = str_replace('[quote', '[', $content);
	$content = str_replace('[/quote]', '[/]', $content);
	while (mb_strpos($content, '[/]')) {
		$content = preg_replace('/(?<=\[)([^]*?)(?=\[\/\])/u', '[]$0[/]', $content, 1);
		$tag_counter_string = 'quote-'.strval($counter);
		$content = str_replace('[]', $tag_counter_string, $content);
		$content = str_replace('][/', $tag_counter_string, $content);
		++$counter;
	}
	return str_replace('', "\n", $content);
}


function fix_captions($content, $not_used = false)
{
	if (!mb_strpos($content, '[caption')) {
		return $content;
	}
	$content = preg_replace('/[\n\r]/', '', $content);
	$content = str_replace('[/caption]', '', $content);
	$content = str_replace('[caption', '', $content);
	$content = preg_replace('/<\/a>([^>]*?)/u', '</a><figcaption class="wp-caption-text aligncenter">$0</figcaption></figure>', $content);
	while (mb_strpos($content, '')) {
		$content = preg_replace('/[^\]]*? align="alignleft"[^\]]*?\]/u', '<figure class="wp-caption alignleft">', $content);
		$content = preg_replace('/[^\]]*? align="alignright"[^\]]*?\]/u', '<figure class="wp-caption alignright">', $content);
		$content = preg_replace('/[^\]]*? align="aligncenter"[^\]]*?\]/u', '<figure class="wp-caption aligncenter">', $content);
		$content = preg_replace('/[^\]]*? align="alignnone"[^\]]*?\]/u', '<figure class="wp-caption alignnone">', $content);
		$content = preg_replace('/[^\]]*?\]/u', '<figure class="wp-caption">', $content);
		$content = preg_replace('/size\-([a-z]*?) wp\-image\-/', 'size-$0 aligncenter wp-image-', $content);
		$content = preg_replace('/wp\-image\-([0-9]*?) size\-/', 'size-$0 aligncenter wp-image-', $content);
	}
	$content = str_replace('', '', str_replace('', "\n", $content));
	return str_replace('', '', $content);
}


add_filter('no_texturize_shortcodes', 'caption_exempt_from_wptexturize', 8);
add_filter('no_texturize_shortcodes', 'code_exempt_from_wptexturize');
add_filter('no_texturize_shortcodes', 'quote_exempt_from_wptexturize');
add_filter('the_content', 'nested_quotes', 9);
add_filter('bbp_get_topic_content', 'nested_quotes', 9);
add_filter('bbp_get_reply_content', 'nested_quotes', 9);
add_filter('the_content', 'fix_captions', 9);
add_filter('bbp_get_topic_content', 'fix_captions', 9);
add_filter('bbp_get_reply_content', 'fix_captions', 9);
add_filter('the_content', 'do_shortcode', 11);
add_filter('widget_text', 'do_shortcode', 11);

if (function_exists('get_comment_text')) {
	add_filter('get_comment_text', 'do_shortcode', 11);
}
if (function_exists('bbp_get_topic_content')) {
	add_filter('bbp_get_topic_content', 'do_shortcode', 11);
}
if (function_exists('bbp_get_reply_content')) {
	add_filter('bbp_get_reply_content', 'do_shortcode', 11);
}
if (function_exists('bp_get_activity_content_body')) {
	add_filter('bp_get_activity_content_body', 'do_shortcode', 11);
}
if (function_exists('bp_get_the_topic_post_content')) {
	add_filter('bp_get_the_topic_post_content', 'do_shortcode', 11);
}
if (function_exists('bp_get_the_thread_message_content')) {
	add_filter('bp_get_the_thread_message_content', 'do_shortcode', 11);
}

require_once dirname(__FILE__) . '/bbcode-admin.php';
require_once dirname(__FILE__) . '/class-bbcode.php';

add_action(
	'plugins_loaded',
	function() {
		global $BBCode;
		$BBCode = new BBCode();
	},
	14
);
