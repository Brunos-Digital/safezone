<?php

if (!class_exists('Safezone_Disable_Comments')) {
    class Safezone_Disable_Comments
    {
        public function __construct()
        {
            add_action('admin_init', [$this, 'redirect']);
            add_filter('comments_open', '__return_false', 20, 2);
            add_filter('pings_open', '__return_false', 20, 2);
            add_filter('comments_array', '__return_empty_array', 10, 2);
            add_action('admin_menu', [$this,'remove_edit_comments']);
            add_action('init', [$this, 'admin_bar_show']);
        }

        public function remove_edit_comments() {
            remove_menu_page('edit-comments.php');
        }

        public function admin_bar_show (): void
        {
            if (is_admin_bar_showing()) {
                remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
            }
        }

        public function redirect(): void
        {
            global $pagenow;

            if ($pagenow === 'edit-comments.php') {
                wp_safe_redirect(admin_url());
                exit;
            }
            remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
            foreach (get_post_types() as $post_type) {
                if (post_type_supports($post_type, 'comments')) {
                    remove_post_type_support($post_type, 'comments');
                    remove_post_type_support($post_type, 'trackbacks');
                }
            }
        }
    }
}