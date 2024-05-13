<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://brunos.digital
 * @since      1.0.0
 *
 * @package    Safezone
 * @subpackage Safezone/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Safezone
 * @subpackage Safezone/includes
 * @author     WP Safe Zone <info@safezone.com>
 */
class Safezone
{

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      Safezone_Loader $loader Maintains and registers all hooks for the plugin.
     */
    protected Safezone_Loader $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string $plugin_name The string used to uniquely identify this plugin.
     */
    protected string $plugin_name;
    protected string $plugin_slug;

    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string $version The current version of the plugin.
     */
    protected string $version;

    public bool $is_pro = true;

    public array $plugin_settings;

    public array $ip_details;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function __construct()
    {
        $this->version = SAFEZONE_VERSION;
        $this->plugin_name = SAFEZONE_PLUGIN_NAME;
        $this->plugin_slug = SAFEZONE_PLUGIN_SLUG;

        $this->ip_details = $this->ip_info();

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
        $this->plugin_settings = get_options([
            'sz_licence',
            'sz_firewall',
            'sz_anti_spam',
            'sz_disable_embeds',
            'sz_disable_xml',
            'sz_hide_wp_version',
            'sz_disable_self_pingbacks',
            'sz_disable_rest_api',
            'sz_ignore_logged',
            'sz_sql_injection',
            'sz_xss_check',
            'sz_disable_comments',
            'sz_disable_heartbeat',
            'sz_protect_woocommerce_payment_forms',
            'sz_protect_contact_forms',
            'sz_remove_rsd_link',
            'sz_remove_shortlink',
            'sz_disable_rss_feeds',
            'sz_aggressive_search',
            'sz_enable_autoscanning',
            'sz_schedule_autoscanning',
            'sz_importing_file_monitoring',
            'sz_scan_html_code',
            'sz_heuristic_analysis',
            'sz_set_custom_scan_path',
            'sz_check_plugin',
            'sz_check_theme',
            'sz_check_exploits',
            'sz_login_protection',
        ]);
        $this->initial();
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Safezone_Loader. Orchestrates the hooks of the plugin.
     * - Safezone_i18n. Defines internationalization functionality.
     * - Safezone_Admin. Defines all hooks for the admin area.
     * - Safezone_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies(): void
    {

        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-safezone-scanner.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-safezone-theme-updater.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/lib/class-safezone-login_protection.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/lib/class-safezone-disable_embeds.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/lib/class-safezone-disable_xml.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/lib/class-safezone-hide_wp_version.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/lib/class-safezone-disable_rest_api.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/lib/class-safezone-disable_rss_feeds.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/lib/class-safezone-disable_comments.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/lib/class-safezone-disable_heartbeat.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/lib/class-safezone-remove_shortlink.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/lib/class-safezone-malware_scanner.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/lib/class-safezone-anti_spam.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/lib/class-safezone-firewall.php';

        if (file_exists(plugin_dir_path(dirname(__FILE__)) . 'includes/class-safezone-pro.php')) {
            require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-safezone-pro.php';
        }

        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-safezone-report.php';

        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-safezone-loader.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-safezone-checker.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-safezone-i18n.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-safezone-admin.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-safezone-public.php';
        $this->loader = new Safezone_Loader();

    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the Safezone_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function set_locale(): void
    {

        $plugin_i18n = new Safezone_i18n();

        $this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');

    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_admin_hooks(): void
    {

        $plugin_admin = new Safezone_Admin($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('wp_head', $this,'add_comment_to_header', 1);
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
        $this->loader->add_action('admin_menu', $plugin_admin, 'safezone_menu');
        $this->loader->add_action('wp_ajax_save_settings', $plugin_admin, 'save_settings');
        $this->loader->add_action('wp_ajax_add_whitelist', $plugin_admin, 'add_whitelist');
        $this->loader->add_action('wp_ajax_remove_whitelist', $plugin_admin, 'remove_whitelist');
        $this->loader->add_action('wp_ajax_add_licence', $plugin_admin, 'add_licence');
        $this->loader->add_action('wp_ajax_subscribe', $plugin_admin, 'subscribe');
        $this->loader->add_action('wp_ajax_malware_scanner', $plugin_admin, 'malware_scanner');
        $this->loader->add_action('wp_ajax_malware_report_ignore', $plugin_admin, 'malware_report_ignore');
        $this->loader->add_action('wp_ajax_protection_status', $plugin_admin, 'protection_status');

    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_public_hooks(): void
    {

        $plugin_public = new Safezone_Public($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');

    }

    public function update_checker(): void
    {
        $plugin_public = new Safezone_Update_Checker($this->get_version());
        $this->loader->add_filter('pre_set_site_transient_update_plugins', $plugin_public, 'check_for_plugin_update', 10, 3);
        $this->loader->add_filter('plugins_api', $plugin_public, 'plugin_info', 10, 3);
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run(): void
    {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @return    string    The name of the plugin.
     * @since     1.0.0
     */
    public function get_plugin_name(): string
    {
        return $this->plugin_name;
    }

    public function get_plugin_slug(): string
    {
        return $this->plugin_slug;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @return    Safezone_Loader    Orchestrates the hooks of the plugin.
     * @since     1.0.0
     */
    public function get_loader(): Safezone_Loader
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @return    string    The version number of the plugin.
     * @since     1.0.0
     */
    public function get_version(): string
    {
        return $this->version;
    }

    public function initial(): void
    {
        if ($this->plugin_settings['sz_anti_spam'] === '1') {
            $this->loader->add_action('init', $this, 'check_user_in_door');
        }

        $this->update_checker();

        if ($this->plugin_settings['sz_login_protection'] === '1') {
            new Safezone_Login_Protection();
        }

        if ($this->plugin_settings['sz_disable_embeds'] === '1') {
            new Safezone_Disable_Embeds();
        }

        if ($this->plugin_settings['sz_disable_xml'] === '1') {
            new Safezone_Disable_Xml();
        }

        if ($this->plugin_settings['sz_hide_wp_version'] === '1') {
            new Safezone_Hide_Wp_Version();
        }

        if ($this->plugin_settings['sz_disable_self_pingbacks'] === '1') {
            new Safezone_Disable_Self_Pingbacks();
        }

        if ($this->plugin_settings['sz_disable_rest_api'] === '1') {
            new Safezone_Disable_Rest_Api();
        }

        if ($this->plugin_settings['sz_disable_rss_feeds'] === '1') {
            new Safezone_Disable_Rss_Feeds();
        }

        if ($this->plugin_settings['sz_disable_comments'] === '1') {
            new Safezone_Disable_Comments();
        }

        if ($this->plugin_settings['sz_disable_heartbeat'] === '1') {
            new Safezone_Disable_Heartbeat();
        }

        if ($this->plugin_settings['sz_remove_shortlink'] === '1') {
            new Safezone_Remove_Shortlink();
        }

        if ($this->plugin_settings['sz_firewall'] === '1') {
            Safezone_Firewall::add_htaccess_lines();
        }else{
            Safezone_Firewall::remove_htaccess_lines();
        }

        $this->loader->add_action('transition_comment_status', $this, 'my_comment_spam_detection', 10, 3);
        $this->loader->add_action('manage_users_columns', $this, 'new_modify_user_table');
        $this->loader->add_filter('manage_users_custom_column', $this, 'new_modify_user_table_row');
        $this->loader->add_action('admin_notices', $this, 'sample_admin_notice__success');

        if (file_exists(SAFEZONE_PLUGIN_PRO_PATH)) {
            if (class_exists('Safezone_Pro')) {
                $this->is_pro = Safezone_Pro::licence();
            }
        }
    }

    public function my_comment_spam_detection( $new_status, $old_status, $comment ) {
        if ( $new_status == 'spam' ) {
            Safezone_Report::add("Spam comment blocked: $comment->comment_ID", null, "Comment", "Anti-Spam", null, [
                'ip' => $this->ip_details['ip'],
                'country_code' => $this->ip_details['loc'],
                'country_name' => null
            ]);
        }
    }

    public function is_pro(): bool
    {
        return $this->is_pro;
    }


    public function new_modify_user_table($column)
    {
        $column['login_at'] = 'Login At';
        return $column;
    }

    public function new_modify_user_table_row($val, $column_name, $user_id)
    {
        switch ($column_name) {
            case 'login_at' :
                return get_the_author_meta('login_at', $user_id);
            default:
        }
        return $val;
    }

    public function sample_admin_notice__success(): void
    {
        echo '<div class="notice notice-success is-dismissible">';
        echo "<p>Kullanıcı Safe Zone'u aktif ettiğinde farklı bir güvenlik eklentiside aynı anda aktifse bunu devredışı bırakması gerektiği ile ilgili sürekli uyarı almalıdır. Bu çakışmalara ve eklentinin doğru çalışmamasına sebebiyet verebilir.</p>";
        echo '</div>';
    }

    public function add_comment_to_header(): void
    {
        echo '<!-- Professional Security & Firewall by Wp Safe Zone - https://wpsafezone.com/ -->';
    }

    private function ip_details($ip) : array
    {
        $json = file_get_contents("https://ipinfo.io/{$ip}/geo");
        return json_decode($json, true);
    }

    private static function ip_info() : array
    {
        $api_url = "https://1.1.1.1/cdn-cgi/trace";
        $response = file_get_contents($api_url);
        $lines = explode("\n", $response);
        $details = [];
        $lines = array_filter($lines, 'strlen');
        foreach ($lines as $line) {
            $parts = explode("=", $line);
            $key = trim($parts[0]);
            $value = trim($parts[1]);
            $details[$key] = $value;
        }
        return $details;
    }

    public function check_user_in_door() : void
    {
        $check = Safezone_Firewall::get_user_info_check($this->ip_details['ip']);
        if(!$check){
            Safezone_Report::add('User is blocked.', null, 'Blocked', 'Firewall', '', [
                'ip' => $this->ip_details['ip'],
                'country_code' => $this->ip_details['loc'],
                'country_name' => null
            ]);
            wp_redirect('https://google.com');
            exit();
        }
    }
}
