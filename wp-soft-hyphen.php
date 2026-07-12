<?php
/**
 * WP Soft Hyphen
 *
 * Voegt een "Soft hyphen" optie toe aan de Gutenberg formatting toolbar,
 * zodat je een &shy; (zacht afbreekstreepje) kunt invoegen zonder naar
 * de HTML-weergave te schakelen.
 *
 * @package     DP_Soft_Hyphen
 * @author      Dutch Portfolio
 * @copyright   2026 Dutch Portfolio
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: WP Soft Hyphen
 * Plugin URI:  https://github.com/joostadams/wp-soft-hyphen/
 * Description: Voegt een soft hyphen (&amp;shy;) knop toe aan de Gutenberg toolbar voor controle over woordafbrekingen. Sneltoets: Ctrl/Cmd+Shift+-.
 * Version:     1.0.1
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Author:      Dutch Portfolio
 * Author URI:  https://dutchportfolio.com
 * Text Domain: wp-soft-hyphen
 * License:     GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

defined( 'ABSPATH' ) || exit;

define( 'WP_SOFT_HYPHEN_VERSION', '1.0.1' );
define( 'WP_SOFT_HYPHEN_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'WP_SOFT_HYPHEN_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Enqueue the editor script that registers the soft hyphen format.
 */
function wp_soft_hyphen_enqueue_editor_assets(): void {
	wp_enqueue_script(
		'wp-soft-hyphen-editor',
		WP_SOFT_HYPHEN_PLUGIN_URL . 'js/editor.js',
		array( 'wp-rich-text', 'wp-block-editor', 'wp-element', 'wp-i18n' ),
		WP_SOFT_HYPHEN_VERSION,
		true
	);

	wp_set_script_translations( 'wp-soft-hyphen-editor', 'wp-soft-hyphen' );
}
add_action( 'enqueue_block_editor_assets', 'wp_soft_hyphen_enqueue_editor_assets' );

/**
 * Plugin Update Checker integration.
 *
 * Uses YahnisElsts/plugin-update-checker to enable automatic
 * updates from GitHub releases on every environment.
 *
 * Loaded unconditionally (not behind is_admin()) so scheduled
 * update checks via wp-cron also work.
 */
if ( file_exists( WP_SOFT_HYPHEN_PLUGIN_DIR . 'plugin-update-checker/plugin-update-checker.php' ) ) {
	require_once WP_SOFT_HYPHEN_PLUGIN_DIR . 'plugin-update-checker/plugin-update-checker.php';

	$wp_soft_hyphen_update_checker = YahnisElsts\PluginUpdateChecker\v5\PucFactory::buildUpdateChecker(
		'https://github.com/joostadams/wp-soft-hyphen/',
		__FILE__,
		'wp-soft-hyphen'
	);

	// Use GitHub releases as the source for updates.
	$wp_soft_hyphen_update_checker->getVcsApi()->enableReleaseAssets();
}
