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
    <div class="sz-card-guidance">
        <div class="sz-card-guidance__content">
            <div class="sz-card-guidance__content-title">Do you have a question?</div>
            <div class="sz-card-guidance__content-text">You can always contact our support line</div>
        </div>
        <div class="sz-card-guidance__actions">
            <a href="https://wpsafezone.com/docs/" target="_blank" class="btn btn-gray-2 text-nowrap">See F.A.Q</a>
            <a href="https://wpsafezone.com/docs/" target="_blank" class="btn btn-white btn-icon w-100">
                Get Support

                <svg class="icon">
                    <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#arrow-right-alt"></use>
                </svg>

            </a>
        </div>
    </div>
</div>
