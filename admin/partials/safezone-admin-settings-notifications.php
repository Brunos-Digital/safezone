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


if ( ! defined( 'WPINC' ) ) {
    die;
}

?>

<div class="app">

    <?php include_once SAFEZONE_PLUGIN_PATH. '/admin/components/safezone-admin-heading.php';?>

    <div class="app__body">

        <div class="app__body-main">

            <div class="settings">

                <div class="tab-menu">
                    <?php include_once SAFEZONE_PLUGIN_PATH. '/admin/components/safezone-admin-tab-menu.php';?>
                </div>

                <div class="settings-main">

                    <div class="settings-heading">
                        <div class="settings-heading__icon">

                            <svg class="icon">
                                <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#email-close"></use>
                            </svg>

                        </div>
                        <div class="settings-heading__content">
                            <div class="settings-heading__title">Notifications</div>
                            <div class="settings-heading__text">Edit firewall settings and authorization</div>
                        </div>
                    </div>

                    <form action="#" class="settings-form">
                        <div class="settings-form__list">

                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Enable Firewall

                                    </div>
                                    <div class="settings-form__item-description">Curabitur viverra volutpat quam et tempus.</div>
                                </div>

                                <label class="form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" checked="checked">
                                </label>

                            </div>

                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Block Bad Bots

                                    </div>
                                    <div class="settings-form__item-description">Curabitur viverra volutpat quam et tempus.</div>
                                </div>

                                <label class="form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" checked="checked">
                                </label>

                                <div class="settings-form__item-text">Ban bad bots from IP automatically</div>

                            </div>

                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Login Protection

                                    </div>
                                    <div class="settings-form__item-description">Curabitur viverra volutpat quam et tempus.</div>
                                </div>

                                <label class="form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" checked="checked">
                                </label>

                                <div class="settings-form__item-text">Secure <a href="/" class="shadow-none">wp-admin.php</a></div>

                            </div>

                        </div>
                        <div class="settings-form__actions">
                            <a href="<?php echo admin_url('admin.php?page=safezone-dashboard');?>" class="btn btn-white">Cancel</a>
                            <button type="submit" class="btn btn-blue-40">Save Changes</button>
                        </div>
                    </form>

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