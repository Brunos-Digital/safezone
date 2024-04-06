<?php

if (!class_exists('Safezone_Theme_Updater')) {
    class Safezone_Theme_Updater
    {
        public array $results = [];
        public function __construct()
        {
            add_action('admin_init', [$this, 'check_theme_updates']);
        }

        public function check_theme_updates(): void
        {
            $themes = wp_get_themes();

            foreach ($themes as $theme) {
                $this->check_single_theme_update($theme);
            }
        }

        public function check_single_theme_update($theme): void
        {
            $theme_data = wp_get_theme($theme->get_template());
            $update_check = get_theme_update_available($theme_data);
            if ($update_check) {
                $this->results[] = "Update available for theme: " . $theme_data->get('Name');
            }
        }

        public function run(): array
        {
            return $this->results;
        }
    }
}