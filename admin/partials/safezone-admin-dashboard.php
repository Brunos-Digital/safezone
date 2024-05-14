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

//$keywords = [
//    'file_get'
//];
//
//echo '<pre>';
//$a = new Safezone_Scanner(ABSPATH, $keywords);
//print_r($a->scan());
//echo '</pre>';



echo $_SERVER['HTTP_USER_AGENT'];
?>

<div class="app">
    <?php include_once SAFEZONE_PLUGIN_PATH . '/admin/components/safezone-admin-heading.php'; ?>
    <div class="app__body">
        <div class="app__body-main">
            <div class="home">
                <div class="tab-menu tab-menu--shadow">
                    <?php include_once SAFEZONE_PLUGIN_PATH . '/admin/components/safezone-admin-tab-menu.php'; ?>
                    <div class="tab-menu__bottom">
                        <div class="home__cards">
                            <div class="sz-card sz-card-info">
                                <div class="sz-card-info__main">
                                    <div class="sz-card-info__value">
                                        <span class="sz-card-info__value-text"><?php echo $this->blocked_activities;?></span>
                                        <span>
                                          <svg class="icon">
                                            <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#lock"></use>
                                          </svg>
                                        </span>
                                    </div>
                                    <div class="sz-card-info__content">
                                        <div class="sz-card-info__content-title">Blocked activities</div>
                                        <div class="sz-card-info__content-text">Last update: 23:45</div>
                                    </div>
                                </div>

                                <div class="sz-card-info__actions">

                                    <select class="form-select form-select-sm" aria-label="info select">

                                        <option value="1" selected="selected">Today</option>

                                        <option value="2">Today</option>

                                    </select>

                                </div>

                            </div>

                            <div class="sz-card sz-card-info">
                                <div class="sz-card-info__main">
                                    <div class="sz-card-info__value">
                                        <span class="sz-card-info__value-text"><?php echo $this->blocked_spams;?></span>
                                        <span>
                                          <svg class="icon">
                                            <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#lock"></use>
                                          </svg>
                                        </span>
                                    </div>
                                    <div class="sz-card-info__content">
                                        <div class="sz-card-info__content-title">Blocked spams</div>
                                        <div class="sz-card-info__content-text">Last update: 23:45</div>
                                    </div>
                                </div>
                                <div class="sz-card-info__actions">
                                    <select class="form-select form-select-sm" aria-label="info select">
                                        <option value="1" selected="selected">Today</option>
                                        <option value="2">Today</option>
                                    </select>
                                </div>
                            </div>

                            <div class="sz-card sz-card-info">
                                <div class="sz-card-info__main">
                                    <div class="sz-card-info__value">
                                        <span class="sz-card-info__value-text"><?php echo $this->get_malware_overview()['score'];?><span class="fw-light">/5</span></span>
                                        <span>
                                          <svg class="icon">
                                            <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#yes-alt"></use>
                                          </svg>
                                        </span>
                                    </div>
                                    <div class="sz-card-info__content">
                                        <div class="sz-card-info__content-title">Scan report</div>
                                        <div class="sz-card-info__content-text">Last scan: <?php echo $this->get_malware_overview()['last_scan'] ? date('j M Y H:i:s', strtotime($this->get_malware_overview()['last_scan'])) : 'Never';?></div>
                                    </div>
                                </div>
                                <div class="sz-card-info__actions">
                                    <a href="<?php echo admin_url('admin.php?page=safezone-malware-scanner');?>">
                                        <span class="badge badge--blue" title="See Results">
                                          <span class="badge__text">See Results</span>
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <div class="sz-card sz-card-info">
                                <div class="sz-card-info__main">
                                    <div class="sz-card-info__value">
                                        <span class="sz-card-info__value-text"><?php echo $this->pending_update;?></span>
                                        <span>
                                          <svg class="icon">
                                            <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#update"></use>
                                          </svg>
                                        </span>
                                    </div>
                                    <div class="sz-card-info__content">
                                        <div class="sz-card-info__content-title">Pending update</div>
                                        <div class="sz-card-info__content-text">New update is available</div>
                                    </div>
                                </div>
                                <div class="sz-card-info__actions">
                                    <a href="<?php echo admin_url('plugins.php?plugin_status=upgrade');?>">
                                        <span class="badge badge--blue" title="Update">
                                          <span class="badge__text">Update</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="home__chart">
                    <div class="home__chart-container"></div>
                </div>
                <?php include_once SAFEZONE_PLUGIN_PATH . '/admin/components/safezone-admin-footer.php'; ?>
            </div>

        </div>
        <div class="app__body-sidebar">
            <div class="sidebar">
                <?php include_once SAFEZONE_PLUGIN_PATH . '/admin/components/safezone-admin-sidebar-subscription.php'; ?>
                <?php include_once SAFEZONE_PLUGIN_PATH . '/admin/components/safezone-admin-sidebar-documentation.php'; ?>
                <?php include_once SAFEZONE_PLUGIN_PATH . '/admin/components/safezone-admin-sidebar-guidance.php'; ?>
            </div>
        </div>
    </div>
</div>
