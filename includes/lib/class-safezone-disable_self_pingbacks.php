<?php

if (!class_exists('Safezone_Disable_Self_Pingbacks')) {
    class Safezone_Disable_Self_Pingbacks
    {
        public function __construct()
        {
            add_action( 'pre_ping', [$this, 'disable_self_ping']);
        }

        function disable_self_ping( &$links ) {
            foreach ( $links as $l => $link )
                if (str_starts_with($link, get_option('home')))
                    unset($links[$l]);
        }

    }
}