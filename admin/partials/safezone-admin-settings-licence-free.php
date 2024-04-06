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
        <div class="page">
            <div class="tab-menu">
                <?php include_once SAFEZONE_PLUGIN_PATH. '/admin/components/safezone-admin-tab-menu.php';?>
            </div>
            <?php include_once SAFEZONE_PLUGIN_PATH. '/admin/components/safezone-admin-get-pro.php';?>
            <div class="license-panel">
                <div class="license-panel__heading">
                    <div class="license-panel__heading-icon">

                        <svg class="icon">
                            <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#admin-network"></use>
                        </svg>

                    </div>
                    <div class="license-panel__heading-content">
                        <div class="license-panel__heading-title">License Key</div>
                        <div class="license-panel__heading-text">If you have the key you can activate your Safe Zone Pro license manually.</div>
                    </div>
                </div>

                <div class="license-panel__form">
                    <div class="license-panel__form-title">License Key</div>
                    <div class="license-panel__form-entry">
                        <div class="license-panel__form-input">
                            <label class="input-group">
                                <span class="input-group-icon">
                                  <svg class="icon">
                                    <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#admin-network"></use>
                                  </svg>
                                </span>
                                <input type="text" class="form-control" aria-label="search">
                            </label>
                            <div class="license-panel__form-help">

                                <svg class="icon">
                                    <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#info"></use>
                                </svg>

                                Enter plugin’s license key to proceed.
                            </div>
                        </div>
                        <button class="btn btn-blue-40 addLicence" type="button">Active License</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>