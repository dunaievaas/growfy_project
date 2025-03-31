<?php
// Walker modification
require_once get_stylesheet_directory() . '/inc/class-wp-bootstrap-navwalker.php';

if (! function_exists('custom_theme_setup')) {
	function custom_theme_setup()
	{
		add_theme_support('custom-logo', [
			'height'      => 70,
			'width'       => 300,
			'flex-width'  => false,
			'flex-height' => false,
			'header-text' => '',
			'unlink-homepage-logo' => false,
		]);
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support('post_excerpt');

		//add menu location
		$locations =  array(
			'header_menu'  => __('Header Menu', 'growfy'),
			'footer_menu'  => __('Footer Menu', 'growfy'),

		);
		register_nav_menus($locations);
	}
	add_action('after_setup_theme', 'custom_theme_setup');
}

// Disable gutenberg
add_filter('use_block_editor_for_post_type', '__return_false');
add_filter('use_widgets_block_editor', '__return_false');

// include styles and scripts
add_action('wp_enqueue_scripts', function () {
	wp_enqueue_style('main_style', get_stylesheet_uri());
	wp_enqueue_style('style.css', get_template_directory_uri() . '/build/css/style.css');

	wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/9a00d6b11d.js', false, '6.5.2');
	wp_enqueue_script('script.js', get_template_directory_uri() . '/build/js/script.js', false, '1.0.0');
});

if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title'    => 'Theme General Settings',
		'menu_title'    => 'Theme Settings',
		'menu_slug'     => 'theme-general-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false
	));
}

function convert_url_to_path($url)
{
	if (! $url) {
		return false;
	}
	$url       = str_replace(array('https://', 'http://'), '', $url);
	$home_url  = str_replace(array('https://', 'http://'), '', site_url());
	$file_part = ABSPATH . str_replace($home_url, '', $url);
	$file_part = str_replace('//', '/', $file_part);
	if (file_exists($file_part)) {
		return $file_part;
	}

	return false;
}

/**
 * Return/Output SVG as html
 *
 * @param array|string $img Image link or array
 * @param string $class Additional class attribute for img tag
 * @param string $size Image size if $img is array
 *
 * @return void
 */
function display_svg($img, $class = '', $size = 'medium')
{
	echo return_svg($img, $class, $size);
}

function return_svg($img, $class = '', $size = 'medium')
{
	if (! $img) {
		return '';
	}

	$file_url = is_array($img) ? $img['url'] : $img;

	$file_info = pathinfo($file_url);
	if ($file_info['extension'] == 'svg') {
		$file_path         = convert_url_to_path($file_url);

		if (! $file_path) {
			return '';
		}

		$arrContextOptions = array(
			"ssl" => array(
				"verify_peer"      => false,
				"verify_peer_name" => false,
			),
		);
		$image             = file_get_contents($file_path, false, stream_context_create($arrContextOptions));
		if ($class) {
			$image = str_replace('<svg ', '<svg class="' . esc_attr($class) . '" ', $image);
		}
		$image = preg_replace('/^(.*)?(<svg.*<\/svg>)(.*)?$/is', '$2', $image);
	} elseif (is_array($img)) {
		$image = wp_get_attachment_image($img['id'], $size, false, array('class' => $class));
	} else {
		$image = '<img class="' . esc_attr($class) . '" src="' . esc_url($img) . '" alt="' . esc_attr($file_info['filename']) . '"/>';
	};

	return $image;
}

add_action('admin_init', 'disable_content_editor');

function disable_content_editor()
{
	if (isset($_GET['post']) && is_admin()) {
		$post_id = $_GET['post'];

		if ($post_id == 22) {
			remove_post_type_support('page', 'editor');
		}
	}
}
