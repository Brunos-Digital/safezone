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

<div class="heading">
    <div class="heading__top">
        <span class="heading__title"><?php echo $this->plugin_name;?></span>
        <span class="heading__version">(v<?php echo $this->version;?>)</span>
    </div>
    <div class="heading__protection heading__protection--success">

        <svg class="icon">
            <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#shield-alt"></use>
        </svg>

        <span>Providing full protection</span>
    </div>
</div>
