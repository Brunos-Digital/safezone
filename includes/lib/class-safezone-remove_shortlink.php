<?php

if (!class_exists('Safezone_Remove_Shortlink')) {
    class Safezone_Remove_Shortlink
    {
        public function __construct()
        {
            remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
        }
    }
}