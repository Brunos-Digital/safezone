<?php

if (!class_exists('Safezone_Hide_Wp_Version')) {
    class Safezone_Hide_Wp_Version
    {
        public function __construct()
        {
            remove_action('wp_head', 'wp_generator');
        }
    }
}