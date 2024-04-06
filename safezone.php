<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://brunos.digital
 * @since             1.0.0
 * @package           Safezone
 *
 * @wordpress-plugin
 * Plugin Name:       WP Safe Zone
 * Plugin URI:        https://wpsafezone.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0
 * Author:            WP Safe Zone
 * Author URI:        https://wpsafezone.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       safezone
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

const SAFEZONE_VERSION = "1.0";
const SAFEZONE_PLUGIN_NAME = 'WP Safe Zone';
const SAFEZONE_PLUGIN_SLUG = 'safezone';
const API_URL = 'https://api.safezone.test/api';
const CLIENT_URL = 'https://wpsafezone.com';

define("SAFEZONE_PLUGIN_URL", plugin_dir_url(__FILE__));
define("SAFEZONE_PLUGIN_PATH", plugin_dir_path(__FILE__));
const SAFEZONE_PLUGIN_PRO_PATH = SAFEZONE_PLUGIN_PATH . 'includes/class-safezone-pro.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-safezone-activator.php
 */
function activate_safezone(): void
{
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-safezone-activator.php';
    $activator = new Safezone_Activator();
	$activator->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-safezone-deactivator.php
 */
function deactivate_safezone(): void
{
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-safezone-deactivator.php';
    $deactivator = new Safezone_Deactivator();
	$deactivator->deactivate();
}

register_activation_hook( __FILE__, 'activate_safezone' );
register_deactivation_hook( __FILE__, 'deactivate_safezone' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-safezone.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_safezone() {

	$plugin = new Safezone();
	$plugin->run();

}
run_safezone();
