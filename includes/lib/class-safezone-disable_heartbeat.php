<?php

if (!class_exists('Safezone_Disable_Heartbeat')) {
    class Safezone_Disable_Heartbeat
    {
        public function __construct()
        {
            add_action( 'init', [$this, 'stop_heartbeat'], 1);
        }

        public function stop_heartbeat(): void
        {
            wp_deregister_script('heartbeat');
        }
    }
}