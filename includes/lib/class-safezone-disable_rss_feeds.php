<?php

if (!class_exists('Safezone_Disable_Rss_Feeds')) {
    class Safezone_Disable_Rss_Feeds
    {
        public function __construct()
        {
            add_action('do_feed', [$this, 'itsme_disable_feed'], 1);
            add_action('do_feed_rdf', [$this, 'itsme_disable_feed'], 1);
            add_action('do_feed_rss', [$this, 'itsme_disable_feed'], 1);
            add_action('do_feed_rss2', [$this, 'itsme_disable_feed'], 1);
            add_action('do_feed_atom', [$this, 'itsme_disable_feed'], 1);
            add_action('do_feed_rss2_comments', [$this, 'itsme_disable_feed'], 1);
            add_action('do_feed_atom_comments', [$this, 'itsme_disable_feed'], 1);

            remove_action( 'wp_head', 'feed_links_extra', 3 );
            remove_action( 'wp_head', 'feed_links', 2 );
        }

        function itsme_disable_feed(): WP_Error
        {
            wp_die('No feed available, please visit the homepage!');
        }
    }
}