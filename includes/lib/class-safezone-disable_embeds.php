<?php

if (!class_exists('Safezone_Disable_Embeds')) {
    class Safezone_Disable_Embeds
    {
        public function __construct()
        {
            add_action('init', [$this,'disable_embeds_code_init'], 9999);
            add_action( 'wp_footer', [$this,'my_deregister_scripts']);
        }
        public function disable_embeds_code_init(): void
        {
            remove_action( 'rest_api_init', 'wp_oembed_register_route' );
            add_filter( 'embed_oembed_discover', '__return_false' );
            remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
            remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
            remove_action( 'wp_head', 'wp_oembed_add_host_js' );
            add_filter( 'tiny_mce_plugins', [$this,'disable_embeds_tiny_mce_plugin']);
            add_filter( 'rewrite_rules_array', [$this, 'disable_embeds_rewrites']);
            remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result', 10 );
        }

        public function disable_embeds_tiny_mce_plugin($plugins): array
        {
            return array_diff($plugins, array('wpembed'));
        }
        public function disable_embeds_rewrites($rules) {
            foreach($rules as $rule => $rewrite) {
                if(str_contains($rewrite, 'embed=true')) {
                    unset($rules[$rule]);
                }
            }
            return $rules;
        }
        public function my_deregister_scripts(): void
        {
            wp_dequeue_script( 'wp-embed' );
        }


    }
}