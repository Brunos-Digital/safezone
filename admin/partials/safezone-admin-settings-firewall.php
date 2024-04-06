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
                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Disable Embeds
                                    </div>
                                    <div class="settings-form__item-description">If you don’t need the oEmbed feature for the site, you can disable the feature to improve the site’s load time. (Read on Docs)</div>
                                </div>
                                <label class="form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="disable_embeds" <?php echo $this->plugin_settings['sz_disable_embeds'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>
                            </div>
                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Disable XML/RPC

                                    </div>
                                    <div class="settings-form__item-description">The file, which can be helpful for certain functions, can also pose security risks if not managed correctly. (Read on Docs)</div>
                                </div>
                                <label class="form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="disable_xml" <?php echo $this->plugin_settings['sz_disable_xml'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>
                            </div>
                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Hide WP Version

                                    </div>
                                    <div class="settings-form__item-description">If you leave the WordPress version publicly available, you will give this information to attackers.</div>
                                </div>
                                <label class="form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="hide_wp_version" <?php echo $this->plugin_settings['sz_hide_wp_version'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>
                            </div>
                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Disable Self Pingbacks

                                    </div>
                                    <div class="settings-form__item-description">Self Pingbacks are nothing but a waste of resources. (Read on Docs)</div>
                                </div>
                                <label class="form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="disable_self_pingbacks" <?php echo $this->plugin_settings['sz_disable_self_pingbacks'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>
                            </div>
                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Disable REST API

                                    </div>
                                    <div class="settings-form__item-description">It poses a security risk, as some data is accessible by going to certain REST API paths.</div>
                                </div>
                                <label class="form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="disable_rest_api" <?php echo $this->plugin_settings['sz_disable_rest_api'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>
                            </div>

                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Ignore Logged in Users

                                    </div>
                                    <div class="settings-form__item-description">Disables the Firewall feature for all logged in users. (For better site performance)</div>
                                </div>
                                <label class="form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="ignore_logged" <?php echo $this->plugin_settings['sz_ignore_logged'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>
                            </div>
                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        SQL-Injection Check
                                        <a href="/" class="settings-form__item-badge">pro</a>
                                    </div>
                                    <div class="settings-form__item-description">Checks whether it is possible to inject malicious data into the site database.</div>
                                </div>
                                <label class="form-switch">
                                    <input disabled="disabled" class="form-check-input" type="checkbox" role="switch" name="ignore_logged" <?php echo $this->plugin_settings['sz_ignore_logged'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>
                            </div>
                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        XSS Check

                                    </div>
                                    <div class="settings-form__item-description">Cross-site scripting attacks are one of the more common types of website attacks. (Read on Docs)</div>
                                </div>
                                <label class="form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="xss_check" <?php echo $this->plugin_settings['sz_xss_check'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>
                            </div>
                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Login Protection

                                    </div>
                                    <div class="settings-form__item-description"></div>
                                </div>
                                <label class="form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="login_protection" <?php echo $this->plugin_settings['sz_login_protection'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>
                            </div>
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