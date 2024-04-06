<?php

if (!class_exists('Safezone_Disable_Xml')) {
    class Safezone_Disable_Xml
    {
        public function __construct()
        {
            add_filter( 'xmlrpc_enabled', [$this, '__return_false']);
            add_filter( 'wp_headers', [$this, 'disable_x_pingback']);
        }

        public function disable_x_pingback( $headers ) {
            unset( $headers['X-Pingback'] );
            return $headers;
        }
    }
}