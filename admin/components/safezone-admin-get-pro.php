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

if ( ! defined( 'WPINC' ) ) {
    die;
}

?>

<div class="get-pro">
    <div class="get-pro__content">
        <div class="get-pro__heading">
            <div class="get-pro__heading-icon">
                <img draggable="false" src="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/shield-plus.svg" alt="shield plus">
            </div>
            <div class="get-pro__heading-content">
                <div class="get-pro__heading-title">Go Safe Zone Pro</div>
                <div class="get-pro__heading-text">Upgrade your plugin to unlock all features.</div>
            </div>
        </div>
        <div class="get-pro__list">

            <div class="get-pro__list-item">
                  <span>
                    <svg class="icon">
                      <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#saved"></use>
                    </svg>
                  </span>
                DDoS Protection
            </div>

            <div class="get-pro__list-item">
                  <span>
                    <svg class="icon">
                      <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#saved"></use>
                    </svg>
                  </span>
                Enhanced Monitoring
            </div>

            <div class="get-pro__list-item">
                  <span>
                    <svg class="icon">
                      <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#saved"></use>
                    </svg>
                  </span>
                Advanced Firewall
            </div>

        </div>
    </div>
    <div class="get-pro__license">
        <a href="javascript:void(0);" class="btn btn-blue-40 btn-icon">
            Upgrade to Pro

            <svg class="icon">
                <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#arrow-right-alt2"></use>
            </svg>

        </a>
        <div class="get-pro__license-text">One-year license for <b>$4.99</b></div>
    </div>
    <div class="get-pro__effect">
        <img draggable="false" src="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/circle-effect.svg" alt="effect">
    </div>
</div>