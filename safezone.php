<?php

/**
 * The plugin bootstrap file
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
const API_URL = 'https://api.wpsafezone.com/api';
const CLIENT_URL = 'https://wpsafezone.com';

define("SAFEZONE_PLUGIN_URL", plugin_dir_url(__FILE__));
define("SAFEZONE_PLUGIN_PATH", plugin_dir_path(__FILE__));
const SAFEZONE_PLUGIN_PRO_PATH = SAFEZONE_PLUGIN_PATH . 'includes/class-safezone-pro.php';

const SAFEZONE_SETTINGS = [
    [
        'key' => 'sz_disable_embeds',
        'title' => 'Disable Embeds',
        'description' => 'If you don’t need the oEmbed feature for the site, you can disable the feature to improve the site’s load time. (Read on Docs)',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'firewall',
        'package' => 'free'
    ],
    [
        'key' => 'sz_disable_xml',
        'title' => 'Disable XML-RPC',
        'description' => 'The file, which can be helpful for certain functions, can also pose security risks if not managed correctly. (Read on Docs)',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'firewall',
        'package' => 'free'
    ],
    [
        'key' => 'sz_hide_wp_version',
        'title' => 'Hide WP Version',
        'description' => 'If you leave the WordPress version publicly available, you will give this information to attackers.',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'firewall',
        'package' => 'free'
    ],
    [
        'key' => 'sz_disable_self_pingbacks',
        'title' => 'Disable Self Pingbacks',
        'description' => 'Self Pingbacks are nothing but a waste of resources. (Read on Docs)',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'firewall',
        'package' => 'free'
    ],
    [
        'key' => 'sz_disable_rest_api',
        'title' => 'Disable REST API',
        'description' => 'It poses a security risk, as some data is accessible by going to certain REST API paths.',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'firewall',
        'package' => 'free'
    ],
    [
        'key' => 'sz_ignore_logged',
        'title' => 'Ignore Logged Users',
        'description' => 'Disables the Firewall feature for all logged in users. (For better site performance)',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'firewall',
        'package' => 'free'
    ],
    [
        'key' => 'sz_sql_injection',
        'title' => 'SQL Injection',
        'description' => 'Checks whether it is possible to inject malicious data into the site database.',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'firewall',
        'package' => 'free'
    ],
    [
        'key' => 'sz_xss_check',
        'title' => 'XSS Check',
        'description' => 'Cross-site scripting attacks are one of the more common types of website attacks. (Read on Docs)',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'firewall',
        'package' => 'free'
    ],
    [
        'key' => 'sz_login_protection',
        'title' => 'Login Protection',
        'description' => 'Protects the login page from brute force attacks. (Read on Docs)',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'firewall',
        'package' => 'free'
    ],
    [
        'key' => 'sz_disable_comments',
        'title' => 'Disable Comments',
        'description' => 'The setting removes all comment fields and disables the comment feature on your website.',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'anti-spam',
        'package' => 'free'
    ],
    [
        'key' => 'sz_disable_heartbeat',
        'title' => 'Disable Heartbeat',
        'description' => 'WordPress Heartbeat should be disabled (or limited) since it increases CPU usage. (Read on Docs)',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'anti-spam',
        'package' => 'free'
    ],
    [
        'key' => 'sz_protect_woocommerce_payment_forms',
        'title' => 'Protect WooCommerce Payment Forms',
        'description' => 'Prevents spam and attacks on WooCommerce\'s payment, registration and login areas.',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'anti-spam',
        'package' => 'pro'
    ],
    [
        'key' => 'sz_protect_contact_forms',
        'title' => 'Protect Contact Forms',
        'description' => 'Prevents spam and attacks on all contact forms.',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'anti-spam',
        'package' => 'pro'
    ],
    [
        'key' => 'sz_remove_rsd_link',
        'title' => 'Remove RSD Link',
        'description' => 'RSD/WLW are used if you plan on using Windows Live Writer to write to your wordpress site. (Read on Docs)',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'anti-spam',
        'package' => 'free'
    ],
    [
        'key' => 'sz_remove_shortlink',
        'title' => 'Remove Shortlink',
        'description' => 'If you are using permalinks, such as domain.com/example, it is just unnecessary code.',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'anti-spam',
        'package' => 'free'
    ],
    [
        'key' => 'sz_disable_rss_feeds',
        'title' => 'Disable RSS Feeds',
        'description' => 'By default WordPress creates all kinds of RSS feeds built-in. (Read on Docs)',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'anti-spam',
        'package' => 'free'
    ],
    [
        'key' => 'sz_aggressive_search',
        'title' => 'Aggressive Search',
        'description' => 'Enable it if you are sure that your site has severe attacks. Disable for standard scans.',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'malware',
        'package' => 'free'
    ],
    [
        'key' => 'sz_importing_file_monitoring',
        'title' => 'Importing File Monitoring',
        'description' => 'Scans for changes in critical files such as WordPress core and notifies you of the changes.',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'malware',
        'package' => 'pro'
    ],
    [
        'key' => 'sz_scan_html_code',
        'title' => 'Scan HTML Code',
        'description' => 'Includes additional HTML files and codes in your site files into the scan.',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'malware',
        'package' => 'free'
    ],
    [
        'key' => 'sz_heuristic_analysis',
        'title' => 'Heuristic Analysis',
        'description' => 'Strengthens malicious file scanning by performing intuitive analysis with AI.',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'malware',
        'package' => 'pro'
    ],
    [
        'key' => 'sz_set_custom_scan_path',
        'title' => 'Set Custom Scan Path',
        'description' => 'You can specify the path to scan files in a specific directory.',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'malware',
        'package' => 'free'
    ],
    [
        'key' => 'sz_check_plugin',
        'title' => 'Check Plugin',
        'description' => 'Scans all plugins installed on your site for malware.',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'malware',
        'package' => 'pro'
    ],
    [
        'key' => 'sz_check_theme',
        'title' => 'Check Theme',
        'description' => 'Scans all themes installed on your site for malware.',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'malware',
        'package' => 'pro'
    ],
    [
        'key' => 'sz_check_exploits',
        'title' => 'Check Exploits',
        'description' => 'Scans for known vulnerabilities in your site files.',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'malware',
        'package' => 'pro'
    ],
    [
        'key' => 'sz_enable_autoscanning',
        'title' => 'Enable Autoscanning & Schedule',
        'description' => 'If you want automatic scans on the site, please enable',
        'type' => 'checkbox',
        'default' => '0',
        'group' => 'malware',
        'package' => 'free'
    ]
];

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
