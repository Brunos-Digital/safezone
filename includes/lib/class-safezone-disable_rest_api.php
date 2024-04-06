<?php

if (!class_exists('Safezone_Disable_Rest_Api')) {
    class Safezone_Disable_Rest_Api
    {
        public function __construct()
        {
            add_filter('rest_jsonp_enabled', '__return_false');
            add_filter('rest_authentication_errors', [$this, 'authentication_errors']);
        }

        public function authentication_errors($result)
        {
            if (true === $result || is_wp_error($result)) {
                return $result;
            }

            if (!is_user_logged_in()) {
                return new WP_Error(
                    'rest_not_logged_in',
                    'Safe Zone Protection: You are not logged in.',
                    ['status' => 401]
                );
            }

            return $result;
        }
    }
}