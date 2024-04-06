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

<div class="license-banner">
    <div class="license-banner__content">
        <div class="license-banner__icon">

            <svg class="icon">
                <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#saved"></use>
            </svg>

        </div>
        <div class="license-banner__title">License Successfully Activated</div>
        <div class="license-banner__text">Thank you for the purchase, you can start using Safe Zone with all its features.</div>
    </div>
    <button class="license-banner__close" data-license-banner-close aria-label="close banner">

        <svg class="icon">
            <use xlink:href="images/icons.svg#no"></use>
        </svg>

    </button>
    <div class="license-banner__effect">
        <img draggable="false" src="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/circle-effect.svg" alt="effect">
    </div>
</div>