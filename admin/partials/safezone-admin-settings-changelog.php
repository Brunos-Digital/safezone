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

            <div class="changelog-banner">
                <div class="changelog-banner__container">
                    <div class="changelog-banner__icon">

                        <svg class="icon">
                            <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#update-alt"></use>
                        </svg>

                    </div>
                    <div class="changelog-banner__content">
                        <div class="changelog-banner__content-title">Changelog</div>
                        <div class="changelog-banner__content-text">See the latest updates and fixes</div>
                    </div>
                </div>
                <div class="changelog-banner__badge">

              <span class="badge badge--blue" title="Current Version: 1.0.3">

                <span class="badge__dot"></span>

                <span class="badge__text">Current Version: <?php echo $this->version;?></span>
              </span>

                </div>
            </div>
            <div class="changelog-versions">

                <div class="changelog-versions__item">
                    <div class="changelog-versions__item-heading">
                        <div class="changelog-versions__item-version">1.0.3</div>
                        <div class="changelog-versions__item-line"></div>
                        <div class="changelog-versions__item-date">June 30, 2024</div>
                    </div>
                    <ul class="changelog-versions__item-list">

                        <li>Added a comprehensive security dashboard for quick overview and management.</li>

                        <li>Implemented IP whitelisting feature for secure access control.</li>

                        <li>Ensured full compatibility with the latest WordPress version.</li>

                    </ul>
                </div>

                <div class="changelog-versions__item">
                    <div class="changelog-versions__item-heading">
                        <div class="changelog-versions__item-version">1.0.2</div>
                        <div class="changelog-versions__item-line"></div>
                        <div class="changelog-versions__item-date">June 30, 2024</div>
                    </div>
                    <ul class="changelog-versions__item-list">

                        <li>Added a comprehensive security dashboard for quick overview and management.</li>

                        <li>Implemented IP whitelisting feature for secure access control.</li>

                    </ul>
                </div>

                <div class="changelog-versions__item">
                    <div class="changelog-versions__item-heading">
                        <div class="changelog-versions__item-version">1.0.1</div>
                        <div class="changelog-versions__item-line"></div>
                        <div class="changelog-versions__item-date">June 30, 2024</div>
                    </div>
                    <ul class="changelog-versions__item-list">

                        <li>Added a comprehensive security dashboard for quick overview and management.</li>

                        <li>Implemented IP whitelisting feature for secure access control.</li>

                        <li>Ensured full compatibility with the latest WordPress version.</li>

                        <li>Launched WP Safe Zone, the ultimate security plugin for WordPress.</li>

                    </ul>
                </div>

            </div>
        </div>

    </div>

</div>