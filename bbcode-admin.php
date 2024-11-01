<?php

function bbcode_deluxe_plugin_menu()
{
	add_options_page('BBCode Deluxe', 'BBCode Deluxe', 'manage_options', 'bbcode-deluxe', 'bbcode_deluxe_plugin_options');
}

add_action('admin_menu', 'bbcode_deluxe_plugin_menu');

function bbcode_deluxe_plugin_options()
{
	global $bbp_sc_whitelist;
	if (is_admin() && current_user_can('manage_options')) {
		$bbcodes_active = true;
		$whitelist_enabled = is_plugin_active('bbpress2-shortcode-whitelist/bbpress2-shortcode-whitelist.php');
		if ($whitelist_enabled) {
			$enabled_plugins = get_option('bbpscwl_enabled_plugins');
			if ($enabled_plugins) {
				$enabled_plugins = unserialize($enabled_plugins);
			} else {
				$enabled_plugins = [];
			}
			$bbcodes_active = false;
			foreach ($enabled_plugins as $plugin_tag) {
				if ($plugin_tag === 'bbpress-bbcode') {
					$bbcodes_active = true;
					break;
				}
			}
		}
		require dirname(__FILE__) . '/options-form-template.php';
	} else {
		echo '<div><p>No options currently available.</p></div>';
	}
}
