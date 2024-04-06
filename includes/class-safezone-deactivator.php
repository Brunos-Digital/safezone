<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://brunos.digital
 * @since      1.0.0
 *
 * @package    Safezone
 * @subpackage Safezone/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Safezone
 * @subpackage Safezone/includes
 * @author     WP Safe Zone <info@safezone.com>
 */
class Safezone_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate(): void
    {
        delete_option('sz_licence');

        delete_option('sz_disable_embeds');
        delete_option('sz_disable_xml');
        delete_option('sz_hide_wp_version');
        delete_option('sz_disable_self_pingbacks');
        delete_option('sz_disable_rest_api');
        delete_option('sz_ignore_logged');
        delete_option('sz_sql_injection');
        delete_option('sz_xss_check');

        delete_option('sz_disable_comments');
        delete_option('sz_disable_heartbeat');
        delete_option('sz_protect_woocommerce_payment_forms');
        delete_option('sz_protect_contact_forms');
        delete_option('sz_remove_rsd_link');
        delete_option('sz_remove_shortlink');
        delete_option('sz_disable_rss_feeds');

        delete_option('sz_aggressive_search');
        delete_option('sz_enable_autoscanning');
        delete_option('sz_schedule_autoscanning');
        delete_option('sz_importing_file_monitoring');
        delete_option('sz_scan_html_code');
        delete_option('sz_heuristic_analysis');
        delete_option('sz_set_custom_scan_path');
        delete_option('sz_check_plugin');
        delete_option('sz_check_theme');
        delete_option('sz_check_exploits');
        delete_option('sz_login_protection');

        global $wpdb;
        $wpdb->query("DROP TABLE IF EXISTS wp_sz_whitelist");

        $response = wp_remote_post(API_URL . '/plugins/deactivate');
	}

}
