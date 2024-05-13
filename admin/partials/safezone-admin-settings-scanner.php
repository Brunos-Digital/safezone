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
                            <div class="settings-heading__title">Malware Scanner Settings</div>
                            <div class="settings-heading__text">Brute-force attack migitation and user authentication settings</div>
                        </div>
                    </div>

                    <div class="settings-form">
                        <div class="settings-form__list">
                            <?php
                                foreach(SAFEZONE_SETTINGS as $value){
                                    if ($value['group'] === 'malware'){
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
                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Schedule Autoscanning

                                    </div>
                                    <div class="settings-form__item-description">Select an interval for automatic scanning</div>
                                </div>

                                <div class="settings-form__item-radios">

                                    <label class="form-check">
                                        <input checked="checked" class="form-check-input" type="radio" name="settings-scheduleRadio">
                                        <span class="form-check-label">
                          Monthly
                        </span>
                                    </label>

                                    <label class="form-check">
                                        <input class="form-check-input" type="radio" name="settings-scheduleRadio">
                                        <span class="form-check-label">
                          Weekly
                        </span>
                                    </label>

                                    <label class="form-check">
                                        <input class="form-check-input" type="radio" name="settings-scheduleRadio">
                                        <span class="form-check-label">
                          Daily
                        </span>
                                    </label>

                                </div>

                                <select class="form-select ms-xl-14 ms-md-5" aria-label="Settings select">
                                    <option selected="selected" disabled="disabled">Select scan time</option>

                                    <option value="1">10:00</option>

                                    <option value="2">18:00</option>

                                    <option value="3">03:00</option>

                                </select>

                            </div>

                        </div>
                        <div class="settings-form__actions">
                            <a href="<?php echo admin_url('admin.php?page=safezone-malware-scanner')?>" class="btn btn-white">Cancel</a>
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