<?php

/**
 * Fired during plugin activation
 *
 * @link       https://brunos.digital
 * @since      1.0.0
 *
 * @package    Safezone
 * @subpackage Safezone/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Safezone
 * @subpackage Safezone/includes
 * @author     WP Safe Zone <info@safezone.com>
 */
class Safezone_Activator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */

    public static function activate(): void
    {
        add_option('sz_licence', null);

        add_option('sz_firewall', "0");
        add_option('sz_anti_spam', "0");

        // last malware scan
        add_option('sz_last_malware_scan', null);

        add_option('sz_disable_embeds', "0");
        add_option('sz_disable_xml', "0");
        add_option('sz_hide_wp_version', "0");
        add_option('sz_disable_self_pingbacks', "0");
        add_option('sz_disable_rest_api', "0");
        add_option('sz_ignore_logged', "0");
        add_option('sz_sql_injection', "0");
        add_option('sz_xss_check', "0");

        add_option('sz_disable_comments', "0");
        add_option('sz_disable_heartbeat', "0");
        add_option('sz_protect_woocommerce_payment_forms', "0");
        add_option('sz_protect_contact_forms', "0");
        add_option('sz_remove_rsd_link', "0");
        add_option('sz_remove_shortlink', "0");
        add_option('sz_disable_rss_feeds', "0");

        add_option('sz_aggressive_search', "0");
        add_option('sz_enable_autoscanning', "0");
        add_option('sz_schedule_autoscanning', "0");
        add_option('sz_importing_file_monitoring', "0");
        add_option('sz_scan_html_code', "0");
        add_option('sz_heuristic_analysis', "0");
        add_option('sz_set_custom_scan_path', "0");
        add_option('sz_check_plugin', "0");
        add_option('sz_check_theme', "0");
        add_option('sz_check_exploits', "0");
        add_option('sz_login_protection', "0");

        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        $sz_whitelist = $wpdb->prefix . "sz_whitelist";
        $sql = "CREATE TABLE `" . $sz_whitelist . "` (
                      `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
                      `ip_address` varchar(255) NOT NULL,
                      `country_code` varchar(255) DEFAULT NULL,
                      `country_name` varchar(255) DEFAULT NULL,
                      `hostname` varchar(255) DEFAULT NULL,
                      `location` varchar(255) DEFAULT NULL,
                      `org` varchar(255) DEFAULT NULL,
                      `ip_version` varchar(255) DEFAULT NULL,
                      `timezone` varchar(255) DEFAULT NULL,
                      `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                      PRIMARY KEY (`id`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
        dbDelta($sql);

        $sz_report = $wpdb->prefix . "sz_reports";
        $sql = "CREATE TABLE `" . $sz_report . "` (
                      `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
                      `path` varchar(255) DEFAULT NULL,
                      `step` varchar(255) DEFAULT NULL,
                      `message` varchar(255) NOT NULL,
                      `state` varchar(255) NOT NULL,
                      `scan_type` varchar(255) NOT NULL,
                      `ip_address` varchar(255) DEFAULT NULL,
                      `user_agent` varchar(255) DEFAULT NULL,
                      `country_code` varchar(255) DEFAULT NULL,
                      `country_name` varchar(255) DEFAULT NULL,
                      `status` varchar(255) NOT NULL DEFAULT 'Pending',
                      `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                      PRIMARY KEY (`id`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
        dbDelta($sql);
    }
}
