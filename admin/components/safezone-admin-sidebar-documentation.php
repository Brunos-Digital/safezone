<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://brunos.digital
 * @since      1.0.0
 *
 * @package    Safezone
 * @subpackage Safezone/admin/components
 */

if (!defined('WPINC')) {
    die;
}

?>

<div class="sz-card">
    <div class="sz-card-documentations">
        <div class="sz-card-documentations__heading">
            <svg class="icon">
                <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#book-2"></use>
            </svg>
            WP Safe Zone Documentation
        </div>
        <div class="sz-card-documentations__list">

            <a href="https://wpsafezone.com/docs-category/getting-started/" target="_blank" class="sz-card-documentations__item">
                <span class="sz-card-documentations__item-icon">
                  <svg class="icon">
                    <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#arrow-right-alt"></use>
                  </svg>
                </span>
                <span class="sz-card-documentations__item-text">Getting Started</span>
            </a>

            <a href="https://wpsafezone.com/docs-category/features/" target="_blank" class="sz-card-documentations__item">
                <span class="sz-card-documentations__item-icon">
                  <svg class="icon">
                    <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#arrow-right-alt"></use>
                  </svg>
                </span>
                <span class="sz-card-documentations__item-text">Main Features</span>
            </a>

            <a href="https://wpsafezone.com/docs-category/additional-settings/" target="_blank" class="sz-card-documentations__item">
                <span class="sz-card-documentations__item-icon">
                  <svg class="icon">
                    <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#arrow-right-alt"></use>
                  </svg>
                </span>
                <span class="sz-card-documentations__item-text">Additional Settings</span>
            </a>

        </div>
    </div>
</div>
