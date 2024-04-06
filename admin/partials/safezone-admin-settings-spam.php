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
                            <div class="settings-heading__title">Anti-Spam Settings</div>
                            <div class="settings-heading__text">Edit anti-spam settings and authorization</div>
                        </div>
                    </div>

                    <div class="settings-form">
                        <div class="settings-form__list">

                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Disable Comments

                                    </div>
                                    <div class="settings-form__item-description">The setting removes all comment fields and disables the comment feature on your website.</div>
                                </div>

                                <label class="form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="disable_comments" <?php echo $this->plugin_settings['sz_disable_comments'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>

                            </div>

                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Disable Heartbeat

                                    </div>
                                    <div class="settings-form__item-description">WordPress Heartbeat should be disabled (or limited) since it increases CPU usage. (Read on Docs)</div>
                                </div>

                                <label class="form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="disable_heartbeat" <?php echo $this->plugin_settings['sz_disable_heartbeat'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>
                            </div>

                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Protect Woocommerce Payment Forms
                                        <a href="/" class="settings-form__item-badge">pro</a>
                                    </div>
                                    <div class="settings-form__item-description">Prevents spam and attacks on WooCommerce's payment, registration and login areas.</div>
                                </div>

                                <label class="form-switch">
                                    <input disabled="disabled" class="form-check-input" type="checkbox" role="switch" name="protect_woocommerce_payment_forms" <?php echo $this->plugin_settings['sz_protect_woocommerce_payment_forms'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>

                            </div>

                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Protect Contact Forms
                                        <a href="/" class="settings-form__item-badge">pro</a>
                                    </div>
                                    <div class="settings-form__item-description">Prevents spam and attacks on all contact forms.</div>
                                </div>

                                <label class="form-switch">
                                    <input disabled="disabled" class="form-check-input" type="checkbox" role="switch" name="protect_contact_forms" <?php echo $this->plugin_settings['sz_protect_contact_forms'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>

                            </div>

                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Remove RSD/WLW Link

                                    </div>
                                    <div class="settings-form__item-description">RSD/WLW are used if you plan on using Windows Live Writer to write to your wordpress site. (Read on Docs)</div>
                                </div>

                                <label class="form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="remove_rsd_link" <?php echo $this->plugin_settings['sz_remove_rsd_link'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>

                            </div>

                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Remove Shortlink

                                    </div>
                                    <div class="settings-form__item-description">If you are using permalinks, such as domain.com/example, it is just unnecessary code.</div>
                                </div>

                                <label class="form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="remove_shortlink" <?php echo $this->plugin_settings['sz_remove_shortlink'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>

                            </div>

                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Disable RSS Feeds

                                    </div>
                                    <div class="settings-form__item-description">By default WordPress creates all kinds of RSS feeds built-in. (Read on Docs)</div>
                                </div>

                                <label class="form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="disable_rss_feeds" <?php echo $this->plugin_settings['sz_disable_rss_feeds'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>

                            </div>

                        </div>
                        <div class="settings-form__actions">
                            <a href="<?php echo admin_url('admin.php?page=safezone-anti-spam-engine');?>" class="btn btn-white">Cancel</a>
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