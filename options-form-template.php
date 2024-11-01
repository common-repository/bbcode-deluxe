<div class="wrap">
	<h1>BBCode Deluxe</h1>
	<p>BBCode (Bulletin Board Code) is a lightweight markup language used as an alternative to HTML for formatting. <a href="http://www.bbcode.org/reference.php">http://www.bbcode.org/reference.php</a></p>
	<?php if (isset($whitelist_enabled) && $whitelist_enabled) {
		if (isset($bbcodes_active) && $bbcodes_active) { ?>
			<p>BBCodes are enabled and <a href="http://wordpress.org/extend/plugins/bbpress2-shortcode-whitelist/">bbPress shortcode whitelist</a> has been detected as activated. Users should be able to use BBCodes in blogs, comments, and forums.</p>
		<?php } else { ?>
			<p>BBCodes are installed and <a href="http://wordpress.org/extend/plugins/bbpress2-shortcode-whitelist/">bbPress shortcode whitelist</a> has been detected as activated. However, it seems that BBCode Deluxe needs to be added to the whitelist settings. However, if some BBcodes are included in the manual whitelist, then those BBCodes should work.</p>
		<?php } ?>
	<?php } else { ?>
		<p>BBCodes are enabled and working in the forums. However, to be safe, install the <a href="http://wordpress.org/extend/plugins/bbpress2-shortcode-whitelist/">bbPress shortcode whitelist</a> to stop unsafe shortcodes like <code>[bbp-register]</code> from being used.</p>
	<?php } ?>
	<br/>
	<h2 id="extras">Information</h2>
	<div>
		<h3>Your Info</h3>
		<table>
			<tbody>
				<tr><td>User Agent</td><td><?php echo $_SERVER['HTTP_USER_AGENT']; ?></td></tr>
				<tr><td>Referrer</td><td><?php echo ((isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'No referer found.'); ?></td></tr>
				<tr><td>Request Method</td><td><?php echo $_SERVER['REQUEST_METHOD']; ?></td></tr>
				<tr><td>Remote Address</td><td><?php echo $_SERVER['REMOTE_ADDR']; ?></td></tr>
				<tr><td>Remote Host</td><td><?php echo ((isset($_SERVER['REMOTE_HOST'])) ? $_SERVER['REMOTE_HOST'] : 'Your web server must be configured to create this variable. For instance, Apache needs <code>HostnameLookups On</code> in <em>httpd.conf</em>.'); ?></td></tr>
				<tr><td>Remote Port</td><td><?php echo $_SERVER['REMOTE_PORT']; ?></td></tr>
			</tbody>
		</table>
	</div>
	<br/>
	<div>
		<h3>Server's Info</h3>
		<table>
			<tbody>
				<tr><td>Server Name</td><td><?php echo $_SERVER['SERVER_NAME']; ?></td></tr>
				<tr><td>Server Address</td><td><?php echo $_SERVER['SERVER_ADDR']; ?></td></tr>
				<tr><td>Server Port</td><td><?php echo $_SERVER['SERVER_PORT']; ?></td></tr>
				<tr><td>Server Software</td><td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td></tr>
				<tr><td>Server Protocol</td><td><?php echo $_SERVER['SERVER_PROTOCOL']; ?></td></tr>
				<tr><td>OS Family</td><td><?php echo PHP_OS_FAMILY; ?></td></tr>
				<tr><td>OS</td><td><?php echo PHP_OS; ?></td></tr>
				<tr><td>Uname</td><td><?php echo php_uname('a'); ?></td></tr>
				<tr><td>Default Charset</td><td><?php echo ini_get('default_charset'); ?></td></tr>
				<tr><td>PHP Version</td><td><?php echo PHP_VERSION; ?></td></tr>
				<tr><td>PHP Version ID</td><td><?php echo PHP_VERSION_ID; ?></td></tr>
				<tr><td>PHP Release Version</td><td><?php echo PHP_RELEASE_VERSION; ?></td></tr>
				<tr><td>PHP SAPI Name</td><td><?php echo php_sapi_name(); ?></td></tr>
				<tr><td>Memory Usage</td><td><?php echo memory_get_usage(true); ?></td></tr>
				<tr><td>Peak Memory Usage</td><td><?php echo memory_get_peak_usage(true); ?></td></tr>
				<tr><td>Debug</td><td><?php echo PHP_DEBUG; ?></td></tr>
				<tr><td>File Descriptor Size</td><td><?php echo PHP_FD_SETSIZE; ?></td></tr>
				<tr><td>Register Globals</td><td><?php echo ini_get('register_globals'); ?></td></tr>
				<tr><td>EOL</td><td><?php echo PHP_EOL; ?></td></tr>
				<tr><td>Directory Separator</td><td><?php echo DIRECTORY_SEPARATOR; ?></td></tr>
				<tr><td>Path Separator</td><td><?php echo PATH_SEPARATOR; ?></td></tr>
				<tr><td>Shared Library Suffix</td><td><?php echo PHP_SHLIB_SUFFIX; ?></td></tr>
				<tr><td>INT Max</td><td><?php echo PHP_INT_MAX; ?></td></tr>
				<tr><td>PHP Binary Directory</td><td><?php echo PHP_BINDIR ; ?></td></tr>
				<tr><td>Current Directory Name</td><td><?php echo dirname(__FILE__); ?></td></tr>
			</tbody>
		</table>
	</div>
	<div>
		<h3>Loaded Extensions</h3>
		<ul><?php
		$conf_array = get_loaded_extensions();
		foreach ($conf_array as $val_pair) {
			echo '<li>' . strval($val_pair) . '</li>';
		}
		?></ul>
	</div>
</div>
