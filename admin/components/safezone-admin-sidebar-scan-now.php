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
    <div class="sz-card-scan">
        <div class="sz-card-scan__main">
            <div class="sz-card-scan__icon">

                <svg class="icon">
                    <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#shield-alt"></use>
                </svg>

            </div>
            <div class="sz-card-scan__content">
                <div class="sz-card-scan__content-title">Everything looks great!</div>
                <div class="sz-card-scan__content-text">Everything was perfect at your last scan.</div>
            </div>
            <div class="sz-card-scan__actions">
                <a href="#" class="btn btn-blue-40 btn-icon">
                    Scan Now

                    <svg class="icon">
                        <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#loading"></use>
                    </svg>

                </a>
                <span>Last scan: <b>08:52 AM</b></span>
            </div>
        </div>
    </div>
</div>
