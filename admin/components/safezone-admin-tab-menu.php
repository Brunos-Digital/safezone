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

<div class="tab-menu__main">
    <div class="tab-menu__list">
        <?php foreach($this->menu as $key => $value){ ?>
            <a href="<?php echo $value['path'];?>" class="tab-menu__item <?php echo $value["is_active"] ? 'active' : '';?>"><?php echo $value["name"];?></a>
        <?php } ?>
    </div>
    <a href="<?php echo admin_url('admin.php?page=safezone')?>" class="tab-menu__logo" aria-label="route home">
        <img draggable="false" src="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/logo.webp" alt="logo">
    </a>
</div>
