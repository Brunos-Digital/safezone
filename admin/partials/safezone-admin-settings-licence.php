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
            <?php include_once SAFEZONE_PLUGIN_PATH. '/admin/components/safezone-admin-licence-banner.php';?>
            <div class="license-panel">
                <div class="license-panel__heading">
                    <div class="license-panel__heading-icon">

                        <svg class="icon">
                            <use xlink:href="images/icons.svg#admin-network"></use>
                        </svg>

                    </div>
                    <div class="license-panel__heading-content">
                        <div class="license-panel__heading-title">License</div>
                        <div class="license-panel__heading-text">View and manage your license details.</div>
                    </div>
                </div>

                <div class="license-panel__details">

                    <div class="license-panel__detail">
                        <div class="license-panel__detail-title">License Key</div>
                        <div class="license-panel__detail-value"><mark><?php echo get_option('sz_licence');?></mark></div>
                    </div>

                    <div class="license-panel__detail">
                        <div class="license-panel__detail-title">Product</div>
                        <div class="license-panel__detail-value">Safe Zone Plugin – Pro Version</div>
                    </div>

                    <div class="license-panel__detail">
                        <div class="license-panel__detail-title">Status</div>
                        <div class="license-panel__detail-value"><span class="active">Active</span></div>
                    </div>

                    <div class="license-panel__detail">
                        <div class="license-panel__detail-title">Start Date</div>
                        <div class="license-panel__detail-value">April 12th, 2024 – 18:30</div>
                    </div>

                    <div class="license-panel__detail">
                        <div class="license-panel__detail-title">Expiry Date</div>
                        <div class="license-panel__detail-value">April 12th, 2024 – 18:30</div>
                    </div>

                    <div class="license-panel__detail">
                        <div class="license-panel__detail-title">Installs</div>
                        <div class="license-panel__detail-value">1 out of 1</div>
                    </div>

                </div>
                <button class="btn btn-gray-0 mt-3 ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">Cancel License</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered license-modal">
                        <div class="license-modal__container">
                            <div class="license-modal__icon">

                                <svg class="icon">
                                    <use xlink:href="images/icons.svg#info"></use>
                                </svg>

                            </div>
                            <div class="license-modal__content">
                                <div class="license-modal__content-title">License Cancellation</div>
                                <div class="license-modal__content-text">
                                    Are you sure you want to cancel your WP Safe Zone license? <b>This action cannot be undone.</b>
                                </div>
                            </div>
                            <div class="license-modal__actions">
                                <button class="btn btn-white" data-bs-dismiss="modal">Close</button>
                                <a href="/" class="btn btn-error-500">Cancel My License</a>
                            </div>
                            <button class="license-modal__close" data-bs-dismiss="modal" aria-label="modal close">

                                <svg class="icon">
                                    <use xlink:href="images/icons.svg#no"></use>
                                </svg>

                            </button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>