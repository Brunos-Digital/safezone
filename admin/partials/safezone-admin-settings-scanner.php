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

                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Aggressive Search

                                    </div>
                                    <div class="settings-form__item-description">Enable it if you are sure that your site has severe attacks. Disable for standard scans.</div>
                                </div>

                                <label class="form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="aggressive_search" <?php echo $this->plugin_settings['sz_aggressive_search'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>

                                <div class="settings-form__item-text">Toggle off to return to normal scanning</div>

                            </div>

                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Enable Autoscanning &amp; Schedule

                                    </div>
                                    <div class="settings-form__item-description">If you want automatic scans on the site, please enable.</div>
                                </div>

                                <label class="form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="enable_autoscanning" <?php echo $this->plugin_settings['sz_enable_autoscanning'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>

                            </div>

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

                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Set the Time When the Autoscanning Starts

                                    </div>
                                    <div class="settings-form__item-description">Curabitur viverra volutpat quam et tempus.</div>
                                </div>

                                <label class="form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="schedule_autoscanning" <?php echo $this->plugin_settings['sz_schedule_autoscanning'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>

                            </div>

                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Important File Monitoring
                                        <a href="/" class="settings-form__item-badge">pro</a>
                                    </div>
                                    <div class="settings-form__item-description">Scans for changes in critical files such as WordPress core and notifies you of the changes.</div>
                                </div>

                                <label class="form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="importing_file_monitoring" <?php echo $this->plugin_settings['sz_importing_file_monitoring'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>

                            </div>

                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Scan HTML Code

                                    </div>
                                    <div class="settings-form__item-description">Includes additional HTML files and codes in your site files into the scan.</div>
                                </div>

                                <label class="form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="scan_html_code" <?php echo $this->plugin_settings['sz_scan_html_code'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>

                            </div>

                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Heuristic Analysis
                                        <a href="/" class="settings-form__item-badge">pro</a>
                                    </div>
                                    <div class="settings-form__item-description">Strengthens malicious file scanning by performing intuitive analysis with AI.</div>
                                </div>

                                <label class="form-switch">
                                    <input disabled="disabled" class="form-check-input" name="heuristic_analysis" type="checkbox" role="switch" <?php echo $this->plugin_settings['sz_heuristic_analysis'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>

                            </div>

                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Set Custom Scan Pat

                                    </div>
                                    <div class="settings-form__item-description">One-time custom path scanning. After scanning, the setting turns off and does not repeat.</div>
                                </div>

                                <label class="form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="set_custom_scan_path" <?php echo $this->plugin_settings['sz_set_custom_scan_path'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>

                            </div>

                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Check Plugin While Uploading
                                        <a href="/" class="settings-form__item-badge">pro</a>
                                    </div>
                                    <div class="settings-form__item-description">When uploading plug-ins from your computer, the files are scanned.</div>
                                </div>

                                <label class="form-switch">
                                    <input disabled="disabled" class="form-check-input" type="checkbox" role="switch" name="check_plugin" <?php echo $this->plugin_settings['sz_check_plugin'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>

                            </div>

                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Check Theme While Uploading
                                        <a href="/" class="settings-form__item-badge">pro</a>
                                    </div>
                                    <div class="settings-form__item-description">When uploading themes from your computer, the files are scanned.</div>
                                </div>

                                <label class="form-switch">
                                    <input disabled="disabled" class="form-check-input" type="checkbox" role="switch" name="check_theme" <?php echo $this->plugin_settings['sz_check_theme'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>

                            </div>

                            <div class="settings-form__item">
                                <div class="settings-form__item-content">
                                    <div class="settings-form__item-title">
                                        Check for Known Exploits
                                        <a href="/" class="settings-form__item-badge">pro</a>
                                    </div>
                                    <div class="settings-form__item-description">Your site will be scanned for all known exploits in our blacklist database.</div>
                                </div>

                                <label class="form-switch">
                                    <input disabled="disabled" class="form-check-input" type="checkbox" role="switch" name="check_exploits" <?php echo $this->plugin_settings['sz_check_exploits'] === "0" ? '' : 'checked="checked"' ?>>
                                </label>

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