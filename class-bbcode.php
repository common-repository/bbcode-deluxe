<?php

class BBCode
{

	function __construct()
	{
		if (!function_exists('add_shortcode')) {
			return;
		}
		// Shortcode Protection
		add_shortcode('c', 'skip_enclosed_shortcodes');
		add_shortcode('codegroup', 'skip_enclosed_shortcodes');
		add_shortcode('css', 'skip_enclosed_shortcodes');
		add_shortcode('html', 'skip_enclosed_shortcodes');
		add_shortcode('ignore', 'skip_enclosed_shortcodes');
		add_shortcode('ignore-code', 'skip_enclosed_shortcodes');
		add_shortcode('ignore_code', 'skip_enclosed_shortcodes');
		add_shortcode('json', 'skip_enclosed_shortcodes');
		add_shortcode('lua', 'skip_enclosed_shortcodes');
		add_shortcode('matlab', 'skip_enclosed_shortcodes');
		add_shortcode('md', 'skip_enclosed_shortcodes');
		add_shortcode('no-highlight', 'skip_enclosed_shortcodes');
		add_shortcode('raw', 'skip_enclosed_shortcodes');
		add_shortcode('shell', 'skip_enclosed_shortcodes');
		add_shortcode('sql', 'skip_enclosed_shortcodes');
		add_shortcode('xml', 'skip_enclosed_shortcodes');
		if (function_exists('tiny_mce_before_init')) {
			add_action('tiny_mce_before_init', 'tinymce_skip_enclosed_shortcodes');
		}
		// Formatting + Style
		add_shortcode('b', [&$this, 'shortcode_bold']);
		add_shortcode('B', [&$this, 'shortcode_bold']);
		add_shortcode('bold', [&$this, 'shortcode_bold']);
		add_shortcode('BOLD', [&$this, 'shortcode_bold']);
		add_shortcode('strong', [&$this, 'shortcode_bold']);
		add_shortcode('STRONG', [&$this, 'shortcode_bold']);
		add_shortcode('center', [&$this, 'shortcode_center']);
		add_shortcode('CENTER', [&$this, 'shortcode_center']);
		add_shortcode('color', [&$this, 'shortcode_color']);
		add_shortcode('COLOR', [&$this, 'shortcode_color']);
		add_shortcode('del', [&$this, 'shortcode_del']);
		add_shortcode('DEL', [&$this, 'shortcode_del']);
		add_shortcode('i', [&$this, 'shortcode_italics']);
		add_shortcode('I', [&$this, 'shortcode_italics']);
		add_shortcode('italic', [&$this, 'shortcode_italics']);
		add_shortcode('ITALIC', [&$this, 'shortcode_italics']);
		add_shortcode('em', [&$this, 'shortcode_italics']);
		add_shortcode('EM', [&$this, 'shortcode_italics']);
		add_shortcode('justify', [&$this, 'shortcode_justify']);
		add_shortcode('JUSTIFY', [&$this, 'shortcode_justify']);
		add_shortcode('left', [&$this, 'shortcode_left']);
		add_shortcode('LEFT', [&$this, 'shortcode_left']);
		add_shortcode('bdo', [&$this, 'shortcode_reverse']);
		add_shortcode('BDO', [&$this, 'shortcode_reverse']);
		add_shortcode('reverse', [&$this, 'shortcode_reverse']);
		add_shortcode('REVERSE', [&$this, 'shortcode_reverse']);
		add_shortcode('right', [&$this, 'shortcode_right']);
		add_shortcode('RIGHT', [&$this, 'shortcode_right']);
		add_shortcode('size', [&$this, 'shortcode_size']);
		add_shortcode('SIZE', [&$this, 'shortcode_size']);
		add_shortcode('s', [&$this, 'shortcode_strikethrough']);
		add_shortcode('S', [&$this, 'shortcode_strikethrough']);
		add_shortcode('strike', [&$this, 'shortcode_strikethrough']);
		add_shortcode('STRIKE', [&$this, 'shortcode_strikethrough']);
		add_shortcode('sub', [&$this, 'shortcode_subscript']);
		add_shortcode('SUB', [&$this, 'shortcode_subscript']);
		add_shortcode('sup', [&$this, 'shortcode_superscript']);
		add_shortcode('SUP', [&$this, 'shortcode_superscript']);
		add_shortcode('u', [&$this, 'shortcode_underline']);
		add_shortcode('U', [&$this, 'shortcode_underline']);
		add_shortcode('underline', [&$this, 'shortcode_underline']);
		add_shortcode('UNDERLINE', [&$this, 'shortcode_underline']);
		// Quotes
		add_shortcode('q', [&$this, 'shortcode_quote']);
		add_shortcode('q-0', [&$this, 'shortcode_quote']);
		add_shortcode('q-1', [&$this, 'shortcode_quote']);
		add_shortcode('q-2', [&$this, 'shortcode_quote']);
		add_shortcode('q-3', [&$this, 'shortcode_quote']);
		add_shortcode('q-4', [&$this, 'shortcode_quote']);
		add_shortcode('q-5', [&$this, 'shortcode_quote']);
		add_shortcode('q-6', [&$this, 'shortcode_quote']);
		add_shortcode('q-7', [&$this, 'shortcode_quote']);
		add_shortcode('q-8', [&$this, 'shortcode_quote']);
		add_shortcode('q-9', [&$this, 'shortcode_quote']);
		add_shortcode('q-10', [&$this, 'shortcode_quote']);
		add_shortcode('Q', [&$this, 'shortcode_quote']);
		add_shortcode('Q-0', [&$this, 'shortcode_quote']);
		add_shortcode('Q-1', [&$this, 'shortcode_quote']);
		add_shortcode('Q-2', [&$this, 'shortcode_quote']);
		add_shortcode('Q-3', [&$this, 'shortcode_quote']);
		add_shortcode('Q-4', [&$this, 'shortcode_quote']);
		add_shortcode('Q-5', [&$this, 'shortcode_quote']);
		add_shortcode('Q-6', [&$this, 'shortcode_quote']);
		add_shortcode('Q-7', [&$this, 'shortcode_quote']);
		add_shortcode('Q-8', [&$this, 'shortcode_quote']);
		add_shortcode('Q-9', [&$this, 'shortcode_quote']);
		add_shortcode('Q-10', [&$this, 'shortcode_quote']);
		add_shortcode('quote', [&$this, 'shortcode_quote']);
		add_shortcode('quote-0', [&$this, 'shortcode_quote']);
		add_shortcode('quote-1', [&$this, 'shortcode_quote']);
		add_shortcode('quote-2', [&$this, 'shortcode_quote']);
		add_shortcode('quote-3', [&$this, 'shortcode_quote']);
		add_shortcode('quote-4', [&$this, 'shortcode_quote']);
		add_shortcode('quote-5', [&$this, 'shortcode_quote']);
		add_shortcode('quote-6', [&$this, 'shortcode_quote']);
		add_shortcode('quote-7', [&$this, 'shortcode_quote']);
		add_shortcode('quote-8', [&$this, 'shortcode_quote']);
		add_shortcode('quote-9', [&$this, 'shortcode_quote']);
		add_shortcode('quote-10', [&$this, 'shortcode_quote']);
		add_shortcode('quote-11', [&$this, 'shortcode_quote']);
		add_shortcode('quote-12', [&$this, 'shortcode_quote']);
		add_shortcode('quote-13', [&$this, 'shortcode_quote']);
		add_shortcode('quote-14', [&$this, 'shortcode_quote']);
		add_shortcode('quote-15', [&$this, 'shortcode_quote']);
		add_shortcode('quote-16', [&$this, 'shortcode_quote']);
		add_shortcode('quote-17', [&$this, 'shortcode_quote']);
		add_shortcode('quote-18', [&$this, 'shortcode_quote']);
		add_shortcode('quote-19', [&$this, 'shortcode_quote']);
		add_shortcode('quote-20', [&$this, 'shortcode_quote']);
		add_shortcode('quote-21', [&$this, 'shortcode_quote']);
		add_shortcode('quote-22', [&$this, 'shortcode_quote']);
		add_shortcode('quote-23', [&$this, 'shortcode_quote']);
		add_shortcode('quote-24', [&$this, 'shortcode_quote']);
		add_shortcode('quote-25', [&$this, 'shortcode_quote']);
		add_shortcode('quote-26', [&$this, 'shortcode_quote']);
		add_shortcode('quote-27', [&$this, 'shortcode_quote']);
		add_shortcode('quote-28', [&$this, 'shortcode_quote']);
		add_shortcode('quote-29', [&$this, 'shortcode_quote']);
		add_shortcode('quote-30', [&$this, 'shortcode_quote']);
		add_shortcode('quote-31', [&$this, 'shortcode_quote']);
		add_shortcode('quote-32', [&$this, 'shortcode_quote']);
		add_shortcode('quote-33', [&$this, 'shortcode_quote']);
		add_shortcode('quote-34', [&$this, 'shortcode_quote']);
		add_shortcode('quote-35', [&$this, 'shortcode_quote']);
		add_shortcode('quote-36', [&$this, 'shortcode_quote']);
		add_shortcode('quote-37', [&$this, 'shortcode_quote']);
		add_shortcode('quote-38', [&$this, 'shortcode_quote']);
		add_shortcode('quote-39', [&$this, 'shortcode_quote']);
		add_shortcode('quote-40', [&$this, 'shortcode_quote']);
		add_shortcode('quote-41', [&$this, 'shortcode_quote']);
		add_shortcode('quote-42', [&$this, 'shortcode_quote']);
		add_shortcode('quote-43', [&$this, 'shortcode_quote']);
		add_shortcode('quote-44', [&$this, 'shortcode_quote']);
		add_shortcode('quote-45', [&$this, 'shortcode_quote']);
		add_shortcode('quote-46', [&$this, 'shortcode_quote']);
		add_shortcode('quote-47', [&$this, 'shortcode_quote']);
		add_shortcode('quote-48', [&$this, 'shortcode_quote']);
		add_shortcode('quote-49', [&$this, 'shortcode_quote']);
		add_shortcode('QUOTE', [&$this, 'shortcode_quote']);
		add_shortcode('QUOTE-0', [&$this, 'shortcode_quote']);
		add_shortcode('QUOTE-1', [&$this, 'shortcode_quote']);
		add_shortcode('QUOTE-2', [&$this, 'shortcode_quote']);
		add_shortcode('QUOTE-3', [&$this, 'shortcode_quote']);
		add_shortcode('QUOTE-4', [&$this, 'shortcode_quote']);
		add_shortcode('QUOTE-5', [&$this, 'shortcode_quote']);
		add_shortcode('QUOTE-6', [&$this, 'shortcode_quote']);
		add_shortcode('QUOTE-7', [&$this, 'shortcode_quote']);
		add_shortcode('QUOTE-8', [&$this, 'shortcode_quote']);
		add_shortcode('QUOTE-9', [&$this, 'shortcode_quote']);
		add_shortcode('QUOTE-10', [&$this, 'shortcode_quote']);
		add_shortcode('cite', [&$this, 'shortcode_cite']);
		add_shortcode('CITE', [&$this, 'shortcode_cite']);
		// Code
		add_shortcode('code', [&$this, 'shortcode_code']);
		add_shortcode('CODE', [&$this, 'shortcode_code']);
		add_shortcode('kbd', [&$this, 'shortcode_kbd']);
		add_shortcode('KBD', [&$this, 'shortcode_kbd']);
		add_shortcode('key', [&$this, 'shortcode_kbd']);
		add_shortcode('KEY', [&$this, 'shortcode_kbd']);
		add_shortcode('keyboard', [&$this, 'shortcode_kbd']);
		add_shortcode('KEYBOARD', [&$this, 'shortcode_kbd']);
		// Lists
		add_shortcode('ol', [&$this, 'shortcode_orderedlist']);
		add_shortcode('OL', [&$this, 'shortcode_orderedlist']);
		add_shortcode('ul', [&$this, 'shortcode_unorderedlist']);
		add_shortcode('UL', [&$this, 'shortcode_unorderedlist']);
		add_shortcode('list', [&$this, 'shortcode_unorderedlist']);
		add_shortcode('LIST', [&$this, 'shortcode_unorderedlist']);
		add_shortcode('li', [&$this, 'shortcode_listitem']);
		add_shortcode('LI', [&$this, 'shortcode_listitem']);
		// Tables
		add_shortcode('table', [&$this, 'shortcode_table']);
		add_shortcode('TABLE', [&$this, 'shortcode_table']);
		add_shortcode('thead', [&$this, 'shortcode_thead']);
		add_shortcode('THEAD', [&$this, 'shortcode_thead']);
		add_shortcode('tbody', [&$this, 'shortcode_tbody']);
		add_shortcode('TBODY', [&$this, 'shortcode_tbody']);
		add_shortcode('tfoot', [&$this, 'shortcode_tfoot']);
		add_shortcode('TFOOT', [&$this, 'shortcode_tfoot']);
		add_shortcode('th', [&$this, 'shortcode_th']);
		add_shortcode('TH', [&$this, 'shortcode_th']);
		add_shortcode('tr', [&$this, 'shortcode_tr']);
		add_shortcode('TR', [&$this, 'shortcode_tr']);
		add_shortcode('td', [&$this, 'shortcode_td']);
		add_shortcode('TD', [&$this, 'shortcode_td']);
		// Links and Images
		add_shortcode('email', [&$this, 'shortcode_email']);
		add_shortcode('EMAIL', [&$this, 'shortcode_email']);
		add_shortcode('tel', [&$this, 'shortcode_telephone']);
		add_shortcode('TEL', [&$this, 'shortcode_telephone']);
		add_shortcode('img', [&$this, 'shortcode_image']);
		add_shortcode('IMG', [&$this, 'shortcode_image']);
		add_shortcode('url', [&$this, 'shortcode_url']);
		add_shortcode('URL', [&$this, 'shortcode_url']);
		add_shortcode('link', [&$this, 'shortcode_url']);
		add_shortcode('LINK', [&$this, 'shortcode_url']);
		// Videos and Audio
		add_shortcode('bitchute', [&$this, 'shortcode_bitchute']);
		add_shortcode('BITCHUTE', [&$this, 'shortcode_bitchute']);
		add_shortcode('dailymotion', [&$this, 'shortcode_dailymotion']);
		add_shortcode('DAILYMOTION', [&$this, 'shortcode_dailymotion']);
		add_shortcode('freesound', [&$this, 'shortcode_freesound']);
		add_shortcode('FREESOUND', [&$this, 'shortcode_freesound']);
		add_shortcode('gvideo', [&$this, 'shortcode_gvideo']);
		add_shortcode('GVIDEO', [&$this, 'shortcode_gvideo']);
		add_shortcode('vimeo', [&$this, 'shortcode_vimeo']);
		add_shortcode('VIMEO', [&$this, 'shortcode_vimeo']);
		add_shortcode('youtube', [&$this, 'shortcode_youtube']);
		add_shortcode('YOUTUBE', [&$this, 'shortcode_youtube']);
		// Special/Miscellaneous Content
		add_shortcode('abbr', [&$this, 'shortcode_abbr']);
		add_shortcode('ABBR', [&$this, 'shortcode_abbr']);
		add_shortcode('acronym', [&$this, 'shortcode_abbr']);
		add_shortcode('ACRONYM', [&$this, 'shortcode_abbr']);
		add_shortcode('ip', [&$this, 'shortcode_clientip']);
		add_shortcode('IP', [&$this, 'shortcode_clientip']);
		add_shortcode('hr', [&$this, 'shortcode_hr']);
		add_shortcode('HR', [&$this, 'shortcode_hr']);
		add_shortcode('note', [&$this, 'shortcode_note']);
		add_shortcode('NOTE', [&$this, 'shortcode_note']);
		add_shortcode('useragent', [&$this, 'shortcode_useragent']);
		add_shortcode('USERAGENT', [&$this, 'shortcode_useragent']);
		// Hide and Display Content
		add_shortcode('spoiler', [&$this, 'shortcode_spoiler']);
		add_shortcode('SPOILER', [&$this, 'shortcode_spoiler']);
		add_shortcode('user', [&$this, 'shortcode_user']);
		add_shortcode('USER', [&$this, 'shortcode_user']);
		add_shortcode('guest', [&$this, 'shortcode_guest']);
		add_shortcode('GUEST', [&$this, 'shortcode_guest']);
		$this->use_whitelist = false;
		if (function_exists('bbp_whitelist_do_shortcode')) {
			$this->use_whitelist = true;
		}
	}

	public function do_shortcode($content)
	{
		if (function_exists('bbp_whitelist_do_shortcode')) {
			return bbp_whitelist_do_shortcode($content);
		}
		return do_shortcode($content);
	}

	public function attributefix($atts = [])
	{
		if (empty($atts[0])) {
			return $atts;
		}
		$match = [];
		if (preg_match('#=("|\')(.*?)("|\')#u', $atts[0], $match) !== 0) {
			$atts[0] = $match[2];
		}
		return $atts;
	}


	/* SHORTCODES */


	// Shortcode Protection

	public function skip_enclosed_shortcodes($atts, $content = null)
	{
		return $content;
	}

	public function tinymce_skip_enclosed_shortcodes($datainput)
	{
		$datainput['protect'] = "[/\<\?php[\s\S]*?\?\>/g, /\[insert_php\][\s\S]*?\[\/insert_php\]/g, /\[ignore_code\][\s\S]*?\[\/ignore_code\]/g]";
		return $datainput;
	}

	// Formatting + Style

	public function shortcode_bold($atts = [], $content = null)
	{
		return $content ? '<strong>' . $this->do_shortcode($content) . '</strong>' : '';
	}

	public function shortcode_center($atts = [], $content = null)
	{
		return $content ? '<span style="text-align:center">' . $this->do_shortcode($content) . '</span>' : '';
	}

	public function shortcode_color($atts = [], $content = null)
	{
		if (!$content || !$atts) {
			return '';
		}
		$color = mb_substr(implode('', $atts), 1);
		if (ctype_xdigit($color)) {
			$color = '#' . $color;
		}
		return '<span style="color:' . $color . '">' . $this->do_shortcode($content) . '</span>';
	}

	public function shortcode_del($atts = [], $content = null)
	{
		return $content ? '<del>' . $this->do_shortcode($content) . '</del>' : '';
	}

	public function shortcode_italics($atts = [], $content = null)
	{
		return $content ? '<em>' . $this->do_shortcode($content) . '</em>' : '';
	}

	public function shortcode_justify($atts = [], $content = null)
	{
		return $content ? '<span style="text-align:justify">' . $this->do_shortcode($content) . '</span>' : '';
	}

	public function shortcode_left($atts = [], $content = null)
	{
		return $content ? '<span style="text-align:left">' . $this->do_shortcode($content) . '</span>' : '';
	}

	public function shortcode_reverse($atts = [], $content = null)
	{
		return $content ? '<bdo dir="rtl">' . $this->do_shortcode($content) . '</bdo>' : '';
	}

	public function shortcode_right($atts = [], $content = null)
	{
		return $content ? '<span style="text-align:right">' . $this->do_shortcode($content) . '</span>' : '';
	}

	public function shortcode_size($atts = [], $content = null)
	{
		if (!$content || !$atts) {
			return '';
		}
		$subattribs = mb_substr(implode('', $atts), 1);
		return '<span style="font-size:' . $subattribs . 'px">' . $this->do_shortcode($content) . '</span>';
	}

	public function shortcode_strikethrough($atts = [], $content = null)
	{
		return $content ? '<s>' . $this->do_shortcode($content) . '</s>' : '';
	}

	public function shortcode_subscript($atts = [], $content = null)
	{
		return $content ? '<sub>' . $this->do_shortcode($content) . '</sub>' : '';
	}

	public function shortcode_superscript($atts = [], $content = null)
	{
		return $content ? '<sup>' . $this->do_shortcode($content) . '</sup>' : '';
	}

	public function shortcode_underline($atts = [], $content = null)
	{
		return $content ? '<span style="text-decoration:underline">' . $this->do_shortcode($content) . '</span>' : '';
	}


	// Quotes

	public function shortcode_quote($atts = [], $content = null)
	{
		global $bp;
		global $bbp;
		if (!$content) {
			return '';
		}
		$css_classes = ['bbcode-quote'];
		if (empty($atts)){
			return '<div class="' . implode(' ', $css_classes) . '"><blockquote>' . $this->do_shortcode($content) . '</blockquote></div>';
		}
		$name = trim(array_shift($atts), '="');
		$css_classes[] = 'bbcode-quote-' . $name;
		$user = get_user_by('login', $name);
		if ($user) {
			$css_classes[] = 'bbcode-quote-user';
			if (function_exists('bp_is_active')) {
				$name = '<a href="' . site_url() . '/members/' . $user->user_login . '">' . $user->display_name . '</a>';
			} elseif (get_class($bbp) === 'bbPress') {
				$name = '<a href="' . site_url() . '?bbp_user=' . $user->ID . '">' . $user->display_name . '</a>';
			} elseif ($user->display_name) {
				$name = $user->display_name;
			}
		}
		return '<div class="' . implode(' ', $css_classes) . '"><strong>' . $name . ' wrote: </strong><blockquote>' . $this->do_shortcode($content) . '</blockquote></div>';
	}

	public function shortcode_cite($atts = [], $content = null)
	{
		return $content ? '<cite>' . $this->do_shortcode($content) . '</cite>' : '';
	}

	// Code

	public function shortcode_code($atts = [], $content = null)
	{
		return $content ? '<code>' . $this->do_shortcode($content) . '</code>' : '';
	}

	public function shortcode_kbd($atts = [], $content = null)
	{
		return $content ? '<kbd>' . $this->do_shortcode($content) . '</kbd>' : '';
	}

	// Lists

	public function shortcode_orderedlist($atts = [], $content = null)
	{
		return $content ? '<ol>' . $this->do_shortcode($content) . '</ol>' : '';
	}

	public function shortcode_unorderedlist($atts = [], $content = null)
	{
		return $content ? '<ul>' . $this->do_shortcode($content) . '</ul>' : '';
	}

	public function shortcode_listitem($atts = [], $content = null)
	{
		return $content ? '<li>' . $this->do_shortcode($content) . '</li>' : '';
	}

	// Tables

	public function shortcode_table($atts = [], $content = null)
	{
		return $content ? '<table>' . $this->do_shortcode($content) . '</table>' : '';
	}

	public function shortcode_thead($atts = [], $content = null)
	{
		return $content ? '<thead>' . $this->do_shortcode($content) . '</thead>' : '';
	}

	public function shortcode_tbody($atts = [], $content = null)
	{
		return $content ? '<tbody>' . $this->do_shortcode($content) . '</tbody>' : '';
	}

	public function shortcode_tfoot($atts = [], $content = null)
	{
		return $content ? '<tfoot>' . $this->do_shortcode($content) . '</tfoot>' : '';
	}

	public function shortcode_th($atts = [], $content = null)
	{
		return $content ? '<th>' . $this->do_shortcode($content) . '</th>' : '';
	}

	public function shortcode_tr($atts = [], $content = null)
	{
		return $content ? '<tr>' . $this->do_shortcode($content) . '</tr>' : '';
	}

	public function shortcode_td($atts = [], $content = null)
	{
		return $content ? '<td>' . $this->do_shortcode($content) . '</td>' : '';
	}

	// Links and Images

	public function shortcode_email($atts = [], $content = null)
	{
		$url = $content;  // [email]user@www.example.com[/email]
		if ($atts) {  // [email=user@www.example.com]text[/email] or [email="user@www.example.com"]text[/email]
			$url = trim(array_shift($this->attributefix($atts)), '="');
		}
		if (!$url) {
			return '';
		}
		$url = str_replace(' at ', '@', str_replace('  ', ' ', $url));
		return '<a href="mailto:' . $url . '">' . $this->do_shortcode($content) . '</a>';
	}

	public function shortcode_telephone($atts = [], $content = null)
	{
		if (!$atts) {  // [tel]123-456-7890[/tel]
			$phone = $content;
		} else {  // [tel=123-456-7890]text[/tel] or [tel="123-456-7890"]text[/tel]
			$phone = trim(array_shift($this->attributefix($atts)), '="');
		}
		if (!$phone) {
			return '';
		}
		$phone = $phone.replace('-', '').replace('.', '').replace('+', '');
		return '<a href="tel:' . $phone . '">' . $this->do_shortcode($content) . '</a>';
	}

	public function shortcode_image($atts = [], $content = null)
	{
		if (!$content) {
			return '';
		}
		$alt = '';
		if (!$atts) {  // [img=alttext]imageurl[/img]
			$alt = trim(implode(' ', $atts), '="');
		}
		return '<img src="' . $content . '" alt="' . $alt . '" title="' . $alt . ' />';
	}

	public function shortcode_url($atts = [], $content = null)
	{
		if (!$atts) {  // [url]http://www.example.com/[/url]
			$url = $content;
		} else {  // [url=http://www.example.com/]text[/url] or [url="http://www.example.com/"]text[/url]
			$url = trim(array_shift($this->attributefix($atts)), '="');
		}
		if (!$url) {
			return '';
		}
		return '<a href="' . $url . '">' . $this->do_shortcode($content) . '</a>';
	}

	// Videos and Audio

	public function shortcode_bitchute($atts = [], $content = null)
	{
		if (!$content) {
			return 'No BitChute Video ID Set';
		}
		$vidID = $content;
		$height = '330';
		$width = '400';
		if (!$atts) {
			$match = [];
			$atts = $this->attributefix($atts);
			$autoplay = $atts['autoplay'] === 'yes' ? '&autoplay=1' : '';
			$vidID = (preg_match('%(?:bitchute(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=))([^"&?/ ]{11})%iu', $atts['url'], $match)) ? $match[1] : false;
			$height = (isset($atts['height']) && is_numeric($atts['height'])) ? $atts['height'] : '330';
			$width = (isset($atts['width']) && is_numeric($atts['width'])) ? $atts['width'] : '400';
		}
		return '<iframe width="' . $width . '" height="' . $height . '" src="https://www.bitchute.com/embed/' . $vidID . '?html5=1' . $autoplay . '" frameborder="0" allowfullscreen="true"></iframe>';
	}

	public function shortcode_dailymotion($atts = [], $content = null)
	{
		if (!$content) {
			return 'No DailyMotion Video ID Set';
		}
		$vidID = $content;
		$height = '330';
		$width = '400';
		if (!$atts) {
			$match = [];
			$atts = $this->attributefix($atts);
			$autoplay = $atts['autoplay'] === 'yes' ? '&autoplay=1' : '';
			$vidID = (preg_match('%(?:dailymotion(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed/)?|(?:video/)?)/|.*[?&]v=))([^"&?/ ]{11})%iu', $atts['url'], $match)) ? $match[1] : false;
			$height = (isset($atts['height']) && is_numeric($atts['height'])) ? $atts['height'] : '330';
			$width = (isset($atts['width']) && is_numeric($atts['width'])) ? $atts['width'] : '400';
		}
		return '<iframe width="' . $width . '" height="' . $height . '" src="https://www.dailymotion.com/embed/video/' . $vidID . '?html5=1' . $autoplay . '" frameborder="0" allowfullscreen="true"></iframe>';
	}

	public function shortcode_freesound($atts = [], $content = null)
	{
		if (!$content) {
			return 'No Freesound Audio ID Set';
		}
		if (!$atts) {  // [freesound]164929[/freesound]
			$size = 'medium';
		} else {  // [freesound=large]164929[/freesound] or [freesound=small]164929[/freesound]
			$size = strtolower(trim(array_shift($this->attributefix($atts)), '="'));
		}
		switch ($size) {
			case 'big':
			case 'large':
			case 'l':
				return '<iframe frameborder="0" scrolling="no" src="http://www.freesound.org/embed/sound/iframe/' . $content . '/simple/large/" width="920" height="245"></iframe>';
			case 'little':
			case 'short':
			case 'small':
			case 's':
				return '<iframe frameborder="0" scrolling="no" src="http://www.freesound.org/embed/sound/iframe/' . $content . '/simple/small/" width="375" height="30"></iframe>';
			case 'mid':
			case 'medium':
			case 'm':
			default:
				return '<iframe frameborder="0" scrolling="no" src="http://www.freesound.org/embed/sound/iframe/' . $content . '/simple/medium/" width="480" height="86"></iframe>';
		}
	}

	public function shortcode_gvideo($atts = [], $content = null)
	{
		if (!$content) {
			return 'No Google Video ID Set';
		}
		return '<embed style="width:400px;height:330px" id="VideoPlayback" type="application/x-shockwave-flash" src="http://video.google.com/googleplayer.swf?docId=' . $content . '&hl=en"></embed>';
	}

	public function shortcode_vimeo($atts = [], $content = null)
	{
		if (!$content) {
			return 'No Vimeo Video ID Set';
		}
		$vidID = $content;
		$height = '330';
		$width = '400';
		if (!$atts) {
			$match = [];
			$atts = $this->attributefix($atts);
			$autoplay = $atts['autoplay'] === 'yes' ? '&amp;autoplay=1' : '';
			$vidID = (preg_match('~(?:<iframe [^>]*src=")?(?:https?:\/\/(?:[\w]+\.)*vimeo\.com(?:[\/\w]*\/videos?)?\/([0-9]+)[^\s]*)"?(?:[^>]*></iframe>)?(?:<p>.*</p>)?~iux', $atts['url'], $match)) ? $match[1] : false;
			$height = (isset($atts['height']) && is_numeric($atts['height'])) ? $atts['height'] : '330';
			$width = (isset($atts['width']) && is_numeric($atts['width'])) ? $atts['width'] : '400';
		}
		return '<iframe width="' . $width . '" height="' . $height . '" src="//player.vimeo.com/video/' . $vidID . '?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff' . $autoplay . '" frameborder="0" allowfullscreen="true"></iframe>';
	}

	public function shortcode_youtube($atts = [], $content = null)
	{
		if (!$content) {
			return 'No YouTube Video ID Set';
		}
		$vidID = $content;
		$height = '330';
		$width = '400';
		if (!$atts) {
			$match = [];
			$atts = $this->attributefix($atts);
			$autoplay = $atts['autoplay'] === 'yes' ? '&autoplay=1' : '';
			$vidID = (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%iu', $atts['url'], $match)) ? $match[1] : false;
			$height = (isset($atts['height']) && is_numeric($atts['height'])) ? $atts['height'] : '330';
			$width = (isset($atts['width']) && is_numeric($atts['width'])) ? $atts['width'] : '400';
		}
		return '<iframe width="' . $width . '" height="' . $height . '" src="https://www.youtube.com/embed/' . $vidID . '?html5=1' . $autoplay . '" frameborder="0" allowfullscreen="true"></iframe>';
	}

	// Special/Miscellaneous Content

	public function shortcode_abbr($atts = [], $content = null)
	{
		if (!$content || !isset($atts['title'])) {
			return '';
		}
		$atts = $this->attributefix($atts);
		return '<abbr title="' . $atts['title'] . '">' . $this->do_shortcode($content) . '</abbr>';
	}

	public function shortcode_clientip($atts = [], $content = null)
	{
		if (!isset($_SERVER['REMOTE_ADDR'])) {
			return '';
		}
		return $_SERVER['REMOTE_ADDR'];
	}

	public function shortcode_hr($atts = [], $content = null)
	{
		return '<hr/>';
	}

	public function shortcode_note($atts = [], $content = null)
	{
		return $content ? '<!--' . $content . '-->' : '';
	}

	public function shortcode_useragent($atts = [], $content = null)
	{
		if (!isset($_SERVER['HTTP_USER_AGENT'])) {
			return '';
		}
		return $_SERVER['HTTP_USER_AGENT'];
	}

	// Hide and Display Content

	public function shortcode_spoiler($atts = [], $content = null)
	{
		if (!$content) {
			return '';
		}
		if (!$atts) {
			return '<div style="margin:20px;margin-top:5px"><div class="smallfont" style="margin-bottom:2px"><strong>Spoiler: </strong><input type="button" value="Show" style="width:45px;font-size:10px;margin:0px;padding:0px" onClick="if (this.parentNode.parentNode.getElementsByTagName(\'div\')[1].getElementsByTagName(\'div\')[0].style.display != \'\') { this.parentNode.parentNode.getElementsByTagName(\'div\')[1].getElementsByTagName(\'div\')[0].style.display = \'\'; this.innerText = \'\'; this.value = \'Hide\'; } else { this.parentNode.parentNode.getElementsByTagName(\'div\')[1].getElementsByTagName(\'div\')[0].style.display = \'none\'; this.innerText = \'\'; this.value = \'Show\'; }"></div><div class="alt2" style="margin: 0px; padding: 4px; border: 1px inset;"><div style="display:none">' . $this->do_shortcode($content) . '</div></div></div>';
		}
		$subattribs = substr(implode(' ', $atts), 1);
		return '<div style="margin:20px;margin-top:5px"><div class="smallfont" style="margin-bottom:2px"><strong>Spoiler</strong> for <em>' . $subattribs . '</em> <input type="button" value="Show" style="width:45px;font-size:10px;margin:0px;padding:0px" onClick="if (this.parentNode.parentNode.getElementsByTagName(\'div\')[1].getElementsByTagName(\'div\')[0].style.display != \'\') { this.parentNode.parentNode.getElementsByTagName(\'div\')[1].getElementsByTagName(\'div\')[0].style.display = \'\'; this.innerText = \'\'; this.value = \'Hide\'; } else { this.parentNode.parentNode.getElementsByTagName(\'div\')[1].getElementsByTagName(\'div\')[0].style.display = \'none\'; this.innerText = \'\'; this.value = \'Show\'; }"></div><div class="alt2" style="margin: 0px; padding: 4px; border: 1px inset;"><div style="display:none">' . $this->do_shortcode($content) . '</div></div></div>';
	}

	public function shortcode_guest($atts = [], $content = null)
	{
		if (!$content || is_user_logged_in()) {
			return '';
		}
		return '<div>' . $this->do_shortcode($content) . '</div>';
	}

	public function shortcode_user($atts = [], $content = null)
	{
		if (!$content || !is_user_logged_in()) {
			return '';
		}
		return '<div>' . $this->do_shortcode($content) . '</div>';
	}
}
