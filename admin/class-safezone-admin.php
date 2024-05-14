<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://brunos.digital
 * @since      1.0.0
 *
 * @package    Safezone
 * @subpackage Safezone/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Safezone
 * @subpackage Safezone/admin
 * @author     WP Safe Zone <info@safezone.com>
 */
class Safezone_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private string $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */

    private string $version;

    public array $plugin_settings;

    /**
     * @var array|array[]
     */
    public array $menu;

    public int $blocked_spams;

    public int $blocked_ips;

    public int $blocked_activities;

    public int $pending_update;

    public int $bad_bots;

    public int $login_protection;


    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name The name of this plugin.
     * @param string $version The version of this plugin.
     * @since    1.0.0
     */
    public function __construct(string $plugin_name, string $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->menu = [];

        $this->blocked_spams = 0;
        $this->blocked_ips = 0;
        $this->blocked_activities = 0;
        $this->pending_update = 0;
        $this->bad_bots = 0;
        $this->login_protection = 0;

        $this->stats();

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

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles(): void
    {
        wp_enqueue_style($this->plugin_name . '-toastify', plugin_dir_url(__FILE__) . 'css/toastify.css', [], $this->version, 'all');
        wp_enqueue_style($this->plugin_name . '-main', plugin_dir_url(__FILE__) . 'css/main.css', [], $this->version, 'all');
        wp_enqueue_style($this->plugin_name . '-custom', plugin_dir_url(__FILE__) . 'css/safezone-admin.css', [], $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts(): void
    {
        wp_enqueue_script($this->plugin_name . '-main', plugin_dir_url(__FILE__) . 'js/vendor.js', ['jquery'], $this->version, false);
        wp_enqueue_script($this->plugin_name . '-toastify', plugin_dir_url(__FILE__) . 'js/toastify.js', ['jquery'], $this->version, false);
        wp_enqueue_script($this->plugin_name . '-vendor', plugin_dir_url(__FILE__) . 'js/main.js', ['jquery'], $this->version, false);
        wp_enqueue_script($this->plugin_name . '-custom', plugin_dir_url(__FILE__) . 'js/safezone-admin.js', ['jquery'], $this->version, false);
    }

    public function safezone_menu(): void
    {
        add_menu_page(
            'Safe Zone',
            'Safe Zone',
            'manage_options',
            'safezone-dashboard',
            [$this, 'safezone_router'],
            SAFEZONE_PLUGIN_URL.'/admin/images/favicon.svg',
            61
        );

        add_submenu_page('safezone-dashboard', 'Dashboard', 'Dashboard', 'manage_options', 'safezone-dashboard', [$this, 'safezone_router']);


        if ((new Safezone)->is_pro()) {
            add_submenu_page('safezone-dashboard', 'Firewall', 'Firewall', 'manage_options', 'safezone-firewall', [$this, 'safezone_router']);
        } else {
            add_submenu_page('safezone-dashboard', 'Firewall (Free)', 'Firewall (Free)', 'manage_options', 'safezone-firewall-free', [$this, 'safezone_router']);
        }

        add_submenu_page('safezone-dashboard', 'Anti-Spam Engine', 'Anti-Spam Engine', 'manage_options', 'safezone-anti-spam-engine', [$this, 'safezone_router']);
        add_submenu_page('safezone-dashboard', 'Malware Scanner', 'Malware Scanner', 'manage_options', 'safezone-malware-scanner', [$this, 'safezone_router']);


        add_submenu_page('safezone-dashboard', 'Events', 'Events', 'manage_options', 'safezone-events', [$this, 'safezone_router']);
        add_submenu_page('safezone-dashboard', 'Lockouts', 'Lockouts', 'manage_options', 'safezone-lockouts', [$this, 'safezone_router']);
        add_submenu_page('safezone-dashboard', 'Whitelist', 'Whitelist', 'manage_options', 'safezone-whitelist', [$this, 'safezone_router']);
        add_submenu_page('safezone-dashboard', 'Logs', 'Logs', 'manage_options', 'safezone-logs', [$this, 'safezone_router']);

        add_submenu_page('safezone-dashboard', 'Settings', 'Settings', 'manage_options', 'safezone-settings', [$this, 'safezone_settings_router']);
    }

    public function safezone_router(): void
    {
        ob_start();
        $validPages = ['safezone-firewall', 'safezone-firewall-free', 'safezone-malware-scanner', 'safezone-anti-spam-engine', 'safezone-events', 'safezone-lockouts', 'safezone-whitelist', 'safezone-logs', 'safezone-settings'];
        $page = 'dashboard';
        if (isset($_GET["page"]) && in_array($_GET["page"], $validPages)) {
            $page = str_replace('safezone-', '', $_GET["page"]);
        }

        $this->menu[] = [
            'name' => 'Dashboard',
            'slug' => 'dashboard',
            'path' => admin_url('admin.php?page=safezone-dashboard'),
            'is_active' => $page === 'dashboard',
        ];

        $this->menu[] = [
            'name' => 'Events',
            'slug' => 'events',
            'path' => admin_url('admin.php?page=safezone-events'),
            'is_active' => $page === 'events',
        ];

        $this->menu[] = [
            'name' => 'Lockouts',
            'slug' => 'lockouts',
            'path' => admin_url('admin.php?page=safezone-lockouts'),
            'is_active' => $page === 'lockouts',
        ];

        $this->menu[] = [
            'name' => 'Whitelist',
            'slug' => 'whitelist',
            'path' => admin_url('admin.php?page=safezone-whitelist'),
            'is_active' => $page === 'whitelist',
        ];

        $this->menu[] = [
            'name' => 'Logs',
            'slug' => 'logs',
            'path' => admin_url('admin.php?page=safezone-logs'),
            'is_active' => $page === 'logs',
        ];

        include_once(SAFEZONE_PLUGIN_PATH . 'admin/partials/safezone-admin-' . $page . '.php');
        $template = ob_get_contents();
        ob_end_clean();
        echo $template;
    }

    public function safezone_settings_router(): void
    {
        ob_start();
        $validPages = ['firewall', 'scanner', 'spam', 'notifications', 'changelog', 'licence', 'licence-free'];
        $tab = 'firewall';
        if (isset($_GET["tab"]) && in_array($_GET["tab"], $validPages)) {
            $tab = $_GET["tab"];
        }

        $this->menu[] = [
            'name' => 'Firewall',
            'slug' => 'firewall',
            'path' => admin_url('admin.php?page=safezone-settings&tab=firewall'),
            'is_active' => $tab === 'firewall',
        ];

        $this->menu[] = [
            'name' => 'Anti-Spam',
            'slug' => 'spam',
            'path' => admin_url('admin.php?page=safezone-settings&tab=spam'),
            'is_active' => $tab === 'spam',
        ];

        $this->menu[] = [
            'name' => 'Malware Scanner',
            'slug' => 'scanner',
            'path' => admin_url('admin.php?page=safezone-settings&tab=scanner'),
            'is_active' => $tab === 'scanner',
        ];

        $this->menu[] = [
            'name' => 'Notifications',
            'slug' => 'notifications',
            'path' => admin_url('admin.php?page=safezone-settings&tab=notifications'),
            'is_active' => $tab === 'notifications',
        ];

        if ((new Safezone)->is_pro()) {
            $this->menu[] = [
                'name' => 'Licence',
                'slug' => 'licence',
                'path' => admin_url('admin.php?page=safezone-settings&tab=licence'),
                'is_active' => $tab === 'licence',
            ];
        } else {
            $this->menu[] = [
                'name' => 'Licence (Free)',
                'slug' => 'licence-free',
                'path' => admin_url('admin.php?page=safezone-settings&tab=licence-free'),
                'is_active' => $tab === 'licence-free',
            ];
        }

        $this->menu[] = [
            'name' => 'Changelog',
            'slug' => 'changelog',
            'path' => admin_url('admin.php?page=safezone-settings&tab=changelog'),
            'is_active' => $tab === 'changelog',
        ];

        include_once(SAFEZONE_PLUGIN_PATH . 'admin/partials/safezone-admin-settings-' . $tab . '.php');
        $template = ob_get_contents();
        ob_end_clean();
        echo $template;
    }

    public function get_ip_address()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function save_settings(): void
    {
        global $wpdb;
        $settings = $_POST;
        $i = 0;
        foreach ($settings['payload'] as $key => $value) {
            if(get_option($key) != $value){

                $group = "";
                $message = "";
                foreach(SAFEZONE_SETTINGS as $setting){
                    if($setting['key'] == $key){
                        $group = $setting['group'];
                        $message = $setting['title'];
                    }
                }

                $message .= " setting updated to ";
                $message .= ($value === "1") ? "enabled" : "disabled";
                $message .= ".";

                Safezone_Report::add($message, null, $group, 'Settings', null, null);
            }
            update_option($key, $value);
        }
        wp_send_json([
            'success' => true,
            'message' => 'Settings saved successfully.',
            'data' => []
        ]);
    }

    public function ip_details($ip)
    {
        $json = file_get_contents("https://ipinfo.io/{$ip}/geo");
        return json_decode($json, true);
    }

    public function logs(): array|null|object
    {
        $page_number = isset($_GET['p']) ? absint($_GET['p']) : 1;
        $items_per_page = 24;

        global $wpdb;

        $offset = ($page_number - 1) * $items_per_page;
        $total_count = $wpdb->get_var("SELECT COUNT(*) FROM wp_sz_logs");
        $query = $wpdb->prepare("SELECT * FROM wp_sz_logs ORDER BY created_at DESC LIMIT %d, %d", $offset, $items_per_page);
        return [
            'data' => $wpdb->get_results($query, ARRAY_A),
            'meta' => [
                'total_count' => $total_count,
                'total_pages' => ceil($total_count / $items_per_page),
                'current_page' => $page_number
            ]
        ];
    }

    public function get_whitelist(): array|null|object
    {
        $page_number = isset($_GET['p']) ? absint($_GET['p']) : 1;
        $items_per_page = 10;

        global $wpdb;

        $offset = ($page_number - 1) * $items_per_page;
        $total_count = $wpdb->get_var("SELECT COUNT(*) FROM wp_sz_whitelist");
        $query = $wpdb->prepare("SELECT * FROM wp_sz_whitelist ORDER BY created_at DESC LIMIT %d, %d", $offset, $items_per_page);

        return [
            'data' => $wpdb->get_results($query, ARRAY_A),
            'meta' => [
                'total_count' => $total_count,
                'total_pages' => ceil($total_count / $items_per_page),
                'current_page' => $page_number
            ]
        ];

    }

    public function add_whitelist(): void
    {
        $whitelist = $_POST['payload'] ?? '';

        if (empty($whitelist['ip'])) {
            wp_send_json([
                'message' => 'IP is required.',
                'success' => false,
                'data' => []
            ]);
        }

        $response = $this->ip_details($whitelist['ip']);

        if (!$response) {
            wp_send_json([
                'success' => false,
                'message' => 'Invalid IP.',
                'data' => []
            ]);
        }

        $ip_version = "";

        if (filter_var($response['ip'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $ip_version = "IPv4";
        } else if (filter_var($response['ip'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $ip_version = "IPv6";
        }

        if ($response['ip'] == "") {
            wp_send_json([
                'success' => false,
                'message' => 'Invalid IP.',
                'data' => []
            ]);
        }

        if ($response['country'] == "") {
            wp_send_json([
                'success' => false,
                'message' => 'Invalid Country.',
                'data' => []
            ]);
        }

        global $wpdb;
        // check wp_sz_whitelist
        $check = $wpdb->get_row("SELECT * FROM wp_sz_whitelist WHERE ip_address = '{$response['ip']}'");
        if ($check) {
            wp_send_json([
                'success' => false,
                'message' => 'IP already exists in whitelist.',
                'data' => []
            ]);
        }

        $insert = $wpdb->insert('wp_sz_whitelist', [
            'ip_address' => $response['ip'],
            'country_code' => $response['country'],
            'country_name' => $response['region'],
            'hostname' => $response['hostname'],
            'location' => $response['loc'],
            'org' => $response['org'],
            'timezone' => $response['timezone'],
            'ip_version' => $ip_version,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        if (!$insert) {
            wp_send_json([
                'success' => false,
                'message' => 'Failed to add IP to whitelist.',
                'data' => []
            ]);
        }

        wp_send_json([
            'success' => true,
            'message' => 'IP added to whitelist successfully.',
            'data' => []
        ]);
    }

    // Delete Whitelist
    public function remove_whitelist(): void
    {
        $whitelist = $_POST['payload'] ?? '';
        if (empty($whitelist['id'])) {
            wp_send_json([
                'message' => 'ID is required.',
                'success' => false,
                'data' => []
            ]);
        }

        global $wpdb;
        $delete = $wpdb->delete('wp_sz_whitelist', ['id' => $whitelist['id']]);
        if (!$delete) {
            wp_send_json([
                'success' => false,
                'message' => 'Failed to delete IP from whitelist.',
                'data' => []
            ]);
        }

        wp_send_json([
            'success' => true,
            'message' => 'IP deleted from whitelist successfully.',
            'data' => []
        ]);
    }

    public function add_licence(): void
    {
        $licence = $_POST['payload'] ?? '';
        $licence_key = $licence['licence'] ?? '';
        $response = wp_remote_post(API_URL . '/licence/check', [
            'body' => json_encode([
                'licence' => $licence_key
            ]),
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ]
        ]);
        $response_body = json_decode($response['body'], true);
        if ($response['response']['code'] != 200 || !$response_body['success']) {
            wp_send_json([
                'success' => false,
                'message' => 'Invalid Licence',
                'data' => []
            ]);
        }
        update_option('sz_licence', $licence_key);
        file_put_contents(SAFEZONE_PLUGIN_PRO_PATH, base64_decode($response_body['data']['encrypted']));
        wp_send_json([
            'success' => true,
            'message' => 'Licence added successfully',
            'data' => []
        ]);
    }

    public function subscribe(): void
    {
        $email = $_POST['payload']['email'] ?? '';
        if ($email == "") {
            wp_send_json([
                'success' => false,
                'message' => 'Email is required',
                'data' => []
            ]);
        }
        $name = $_POST['payload']['name'] ?? '';
        if ($name == "") {
            wp_send_json([
                'success' => false,
                'message' => 'Name is required',
                'data' => []
            ]);
        }

        $website = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . '://' . wp_parse_url(home_url())['host'];

        $response = wp_remote_post(API_URL . '/subscription/subscribe', [
            'body' => [
                'email' => $email,
                'name' => $name,
                'website' => $website
            ],
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json'
                ]
            ]
        ]);

        $response_body = json_decode($response['body'], true);
        if ($response['response']['code'] != 200 || !$response_body['success']) {
            wp_send_json([
                'success' => false,
                'message' => $response_body['message'],
                'data' => []
            ]);
        }
        wp_send_json([
            'success' => true,
            'message' => $response_body['message'],
            'data' => $response_body['data']
        ]);
    }

    public function total_whitelist(): int
    {
        global $wpdb;
        return $wpdb->get_var("SELECT COUNT(*) FROM wp_sz_whitelist") ?? 0;
    }

    public function latest_5_whitelist(): array
    {
        global $wpdb;
        return $wpdb->get_results("SELECT * FROM wp_sz_whitelist ORDER BY created_at DESC LIMIT 5", ARRAY_A) ?? [];
    }

    public function reports($scan_type) : array
    {
        global $wpdb;
        $page_number = isset($_GET['p']) ? absint($_GET['p']) : 1;
        $items_per_page = 24;
        $offset = ($page_number - 1) * $items_per_page;
        $total_count = $wpdb->get_var("SELECT COUNT(*) FROM wp_sz_reports WHERE status = 'Pending' AND scan_type = '$scan_type'");
        $query = $wpdb->prepare("SELECT * FROM wp_sz_reports WHERE status != 'Ignored' AND scan_type = '$scan_type' ORDER BY created_at DESC LIMIT %d, %d", $offset, $items_per_page);
        return [
            'data' => $wpdb->get_results($query, ARRAY_A),
            'meta' => [
                'total_count' => $total_count,
                'total_pages' => ceil($total_count / $items_per_page),
                'current_page' => $page_number
            ]
        ];
    }

    public function get_logs(): array
    {
        global $wpdb;
        $page_number = isset($_GET['p']) ? absint($_GET['p']) : 1;
        $items_per_page = 24;
        $offset = ($page_number - 1) * $items_per_page;
        $total_count = $wpdb->get_var("SELECT COUNT(*) FROM wp_sz_logs");
        $query = $wpdb->prepare("SELECT * FROM wp_sz_logs ORDER BY created_at DESC LIMIT %d, %d", $offset, $items_per_page);
        return [
            'data' => $wpdb->get_results($query, ARRAY_A),
            'meta' => [
                'total_count' => $total_count,
                'total_pages' => ceil($total_count / $items_per_page),
                'current_page' => $page_number
            ]
        ];
    }

    public function state_badge($par): array
    {
        $statuses = [
            'Critical' => ['error', 'Critical'],
            'Suspicious' => ['warning', 'Warning'],
            'Fixed' => ['success', 'Fixed'],
            'Low' => ['info', 'Low'],
            'Medium' => ['warning', 'Medium'],
            'Comment' => ['error', 'Comment']
        ];
        return $statuses[$par] ?? ['error', 'High'];
    }

    public function malware_report_details($id): array
    {
        global $wpdb;
        return $wpdb->get_row("SELECT * FROM wp_sz_reports WHERE id = {$id}", ARRAY_A) ?? [];
    }

    public function malware_report_ignore(): void
    {
        $malware = $_POST['payload'] ?? '';
        if (empty($malware['id'])) {
            wp_send_json([
                'message' => 'ID is required.',
                'success' => false,
                'data' => []
            ]);
        }

        global $wpdb;
        $update = $wpdb->update('wp_sz_reports', ['status' => 'Ignored'], ['id' => $malware['id']]);
        if (!$update) {
            wp_send_json([
                'success' => false,
                'message' => 'Failed to ignore malware report.',
                'data' => []
            ]);
        }

        wp_send_json([
            'success' => true,
            'message' => 'Malware report ignored successfully.',
            'data' => []
        ]);
    }

    public function malware_scanner(): void
    {
        (new Safezone_Malware_Scanner())->scanner();
        wp_send_json([
            'success' => true,
            'message' => 'Malware scanner completed.',
            'data' => []
        ]);
    }

    public function protection_status(): void
    {
        if(isset($_POST['payload']['status']) && in_array($_POST['payload']['status'], ['1', '0'])){
            if ($_POST['payload']['type'] == 'firewall') {
                $status = $_POST['payload']['status'];
                update_option('sz_firewall', $status);
                wp_send_json([
                    'success' => true,
                    'message' => 'Protection status updated successfully.',
                    'data' => []
                ]);
            } else if ($_POST['payload']['type'] == 'anti_spam') {
                $status = $_POST['payload']['status'];
                update_option('sz_anti_spam', $status);
                wp_send_json([
                    'success' => true,
                    'message' => 'Protection status updated successfully.',
                    'data' => []
                ]);
            }
        }
    }

    public function get_malware_overview(): array
    {
        global $wpdb;
        $reports = $wpdb->get_results("SELECT * FROM wp_sz_reports WHERE status != 'Ignored' AND scan_type = 'Malware' ORDER BY created_at DESC", ARRAY_A);
        $overview = [
            'step_1' => false,
            'step_2' => false,
            'step_3' => false,
            'step_4' => false,
            'step_5' => false,
            'step_6' => false,
            'step_7' => false
        ];
        foreach ($reports as $report) {
            if($report['step'] === "1"){
                $overview['step_1'] = true;
            }
            if($report['step'] === "2"){
                $overview['step_2'] = true;
            }
            if($report['step'] === "3"){
                $overview['step_3'] = true;
            }
            if($report['step'] === "4"){
                $overview['step_4'] = true;
            }
            if($report['step'] === "5"){
                $overview['step_5'] = true;
            }
            if($report['step'] === "6"){
                $overview['step_6'] = true;
            }
            if($report['step'] === "7"){
                $overview['step_7'] = true;
            }
        }

        $completedSteps = 0;
        foreach ($overview as $step) {
            if ($step === true) {
                $completedSteps++;
            }
        }
        $maxScore = 5;
        $percentComplete = ($completedSteps / count($overview)) * 100;
        $score = ($percentComplete / 100) * $maxScore;
        $roundedScore = round($score, 1);

        return [
            'last_scan' => get_option('sz_last_malware_scan', 'Never'),
            'score' => $roundedScore == 0 ? 5 : $roundedScore,
            'steps' => [
                [
                    'name' => 'Spamvertising Check',
                    'step' => '1',
                    'status' => $overview['step_1'] ? 'failed' : 'succsess',
                    'icon' => $overview['step_1'] ? 'info-outline' : 'yes'
                ],
                [
                    'name' => 'Blacklist Check',
                    'step' => '2',
                    'status' => $overview['step_2'] ? 'failed' : 'succsess',
                    'icon' => $overview['step_2'] ? 'info-outline' : 'yes'
                ],
                [
                    'name' => 'Spam Check',
                    'step' => '3',
                    'status' => $overview['step_3'] ? 'failed' : 'succsess',
                    'icon' => $overview['step_3'] ? 'info-outline' : 'yes'
                ],
                [
                    'name' => 'Vulnerability Scan',
                    'step' => '4',
                    'status' => $overview['step_4'] ? 'failed' : 'succsess',
                    'icon' => $overview['step_4'] ? 'info-outline' : 'yes'
                ],
                [
                    'name' => 'Malware Scan',
                    'step' => '5',
                    'status' => $overview['step_5'] ? 'failed' : 'succsess',
                    'icon' => $overview['step_5'] ? 'info-outline' : 'yes'
                ],
                [
                    'name' => 'Public Files',
                    'step' => '6',
                    'status' => $overview['step_6'] ? 'failed' : 'succsess',
                    'icon' => $overview['step_6'] ? 'info-outline' : 'yes'
                ],
                [
                    'name' => 'Content Safety',
                    'step' => '7',
                    'status' => $overview['step_7'] ? 'failed' : 'succsess',
                    'icon' => $overview['step_7'] ? 'info-outline' : 'yes'
                ]
            ]
        ];
    }

    public function check_all_plugins_updates(): void
    {
        $update_plugins = get_site_transient( 'update_plugins' );
        if ( ! empty( $update_plugins->response ) )
            $this->pending_update = count($update_plugins->response);
    }

    public function blocked_activities(): void
    {
        global $wpdb;
        $total_count = $wpdb->get_var("SELECT COUNT(*) FROM wp_sz_reports WHERE status = 'Pending' AND state = 'Blocked' AND scan_type = 'Firewall'");
        $this->blocked_activities = $total_count;
    }

    public function blocked_spams(): void
    {
        global $wpdb;
        $total_count = $wpdb->get_var("SELECT COUNT(*) FROM wp_sz_reports WHERE status = 'Pending' AND scan_type = 'Anti-Spam'");
        $this->blocked_spams = $total_count;
    }

    public function bad_bots(): void
    {
        global $wpdb;
        $total_count = $wpdb->get_var("SELECT COUNT(*) FROM wp_sz_reports WHERE status = 'Pending' AND state = 'Blocked' AND scan_type = 'Firewall' AND category = 'Bad Bots'");
        $this->bad_bots = $total_count;
    }

    public function stats(): void
    {
        $this->blocked_activities();
        $this->blocked_spams();
        $this->check_all_plugins_updates();
    }
}