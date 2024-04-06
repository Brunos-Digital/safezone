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
    <div class="sz-card-upgrade">
        <div class="sz-card-upgrade__heading">
            <div class="sz-card-upgrade__title">
                Secure Swiftly, Go <span>Safe Zone Pro</span>
            </div>
            <div class="sz-card-upgrade__icon">
                <img draggable="false" src="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/shield-plus.svg"
                     alt="shield plus">
            </div>
        </div>
        <div class="sz-card-upgrade__list">

            <div class="sz-card-upgrade__feature">
                    <span class="sz-card-upgrade__feature-icon">

                      <svg class="icon">
                        <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#saved"></use>
                      </svg>

                    </span>
                    <span class="sz-card-upgrade__feature-text">
                      DDoS Protection
                    </span>
            </div>

            <div class="sz-card-upgrade__feature">
                    <span class="sz-card-upgrade__feature-icon">

                      <svg class="icon">
                        <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#saved"></use>
                      </svg>

                    </span>
                    <span class="sz-card-upgrade__feature-text">
                      Enhanced Monitoring
                    </span>
            </div>

            <div class="sz-card-upgrade__feature">
                    <span class="sz-card-upgrade__feature-icon">

                      <svg class="icon">
                        <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#saved"></use>
                      </svg>

                    </span>
                    <span class="sz-card-upgrade__feature-text">
                      Advanced Firewall
                    </span>
            </div>

        </div>
        <a href="javascript:void(0);" class="btn btn-blue-40 buyPro">Get Pro for $4.99</a>
    </div>
</div>
