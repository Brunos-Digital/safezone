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
 * @subpackage Safezone/admin/partials
 */

?>

<div class="app">
    <?php include_once SAFEZONE_PLUGIN_PATH. '/admin/components/safezone-admin-heading.php';?>
    <div class="app__body">
        <div class="app__body-main">
            <div class="settings">
                <?php include_once SAFEZONE_PLUGIN_PATH. '/admin/components/safezone-admin-tab-menu.php';?>
                <div class="settings-main">
                    <div class="settings-heading">
                        <div class="settings-heading__icon">
                            <svg class="icon">
                                <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#email-close"></use>
                            </svg>
                        </div>
                        <div class="settings-heading__content">
                            <div class="settings-heading__title">Firewall Settings</div>
                            <div class="settings-heading__text">Edit firewall settings and authorization</div>
                        </div>
                    </div>
                    <div class="settings-form">
                        <div class="settings-form__list">
                            <?php
                                foreach(SAFEZONE_SETTINGS as $value){
                                    if ($value['group'] === 'firewall'){
                            ?>
                                <div class="settings-form__item">
                                    <div class="settings-form__item-content">
                                        <div class="settings-form__item-title">
                                            <?php echo $value['title'];?>
                                            <?php echo $value['package'] === 'pro' ? '<a href="/" class="settings-form__item-badge">pro</a>' : ''?>
                                        </div>
                                        <div class="settings-form__item-description"><?php echo $value['description'];?></div>
                                    </div>
                                    <label class="form-switch">
                                        <input <?php echo $value['package'] === 'pro' ? 'disabled="disabled"' : '';?> class="form-check-input" type="<?php echo $value['type'];?>" role="switch" name="<?php echo $value['key']?>" <?php echo get_option($value['key']) === "0" ? '' : 'checked="checked"' ?>>
                                    </label>
                                </div>
                            <?php } } ?>
                        </div>
                        <div class="settings-form__actions">
                            <a href="<?php echo admin_url('admin.php?page=safezone-firewall');?>" class="btn btn-white">Cancel</a>
                            <button type="button" class="btn btn-blue-40 save_button">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app__body-sidebar">
            <div class="sidebar">
                <?php include_once SAFEZONE_PLUGIN_PATH. '/admin/components/safezone-admin-sidebar-subscription.php';?>
                <?php include_once SAFEZONE_PLUGIN_PATH. '/admin/components/safezone-admin-sidebar-documentation.php';?>
                <?php include_once SAFEZONE_PLUGIN_PATH. '/admin/components/safezone-admin-sidebar-guidance.php';?>
            </div>
        </div>
    </div>
</div>