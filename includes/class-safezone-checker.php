<?php

class Safezone_Update_Checker
{
    public string $plugin_slug;
    public string $version;
    public string $api_url;

    public function __construct($version)
    {
        $this->plugin_slug = 'safezone/safezone.php';
        $this->version = $version;
        $this->api_url = "https://safezone.test/api/plugins/info.json";
    }

    public function check_for_plugin_update($transient)
    {
        if (empty($transient->checked['safezone/safezone.php'])){
            return $transient;
        }
        $plugin_info = $this->get_plugin_info();
        if ($plugin_info && version_compare($this->version, $plugin_info->version, '<')) {
            $transient->response[$this->plugin_slug] = $plugin_info;
        }
        return $transient;
    }

    public function plugin_info($res, $action, $args)
    {
        if ($action !== 'plugin_information' || $args->slug !== $this->plugin_slug) return false;
        $plugin_info = $this->get_plugin_info();
        if (!isset($plugin_info->new_version)) {
            $this->show_message('Error retrieving plugin info: "new_version" property not found in API response.');
            return false;
        }

        if (version_compare($this->version, $plugin_info->new_version, '<')) {
            $message = 'There is a new version of WP Safe Zone available. View version details.';
            $this->show_message($message);
        }
        return $plugin_info;
    }

    public function get_plugin_info()
    {
        $request = wp_remote_get($this->api_url, [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
        if (is_wp_error($request) || 200 !== wp_remote_retrieve_response_code($request)) {
            $this->show_message('Error retrieving plugin info: ' . $request->get_error_message());
            return false;
        }
        $body = wp_remote_retrieve_body($request);
        return json_decode($body);
    }

    public function show_message($message)
    {
        echo '<div class="notice notice-warning"><p>' . $message . '</p></div>';
    }
}