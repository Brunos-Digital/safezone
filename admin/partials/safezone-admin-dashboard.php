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


$url = wp_parse_url(home_url());
echo $domain = $url['host'];

$keywords = [
    'base64',
    'eval',
    'gzinflate',
    'str_rot13',
    'file_get'
];

echo '<pre>';
$a = new Safezone_Scanner(ABSPATH, $keywords);
print_r($a->scan());
echo '</pre>';

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
                                        <span class="sz-card-info__value-text">8</span>
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
                                        <span class="sz-card-info__value-text">6</span>
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
                                        <span class="sz-card-info__value-text">4.5<span
                                                    class="fw-light">/5</span></span>
                                        <span>
                                          <svg class="icon">
                                            <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#yes-alt"></use>
                                          </svg>
                                        </span>
                                    </div>
                                    <div class="sz-card-info__content">
                                        <div class="sz-card-info__content-title">Scan report</div>
                                        <div class="sz-card-info__content-text">Last scan: 14:57</div>
                                    </div>
                                </div>

                                <div class="sz-card-info__actions">

                                    <a href="/">

                                        <span class="badge badge--blue" title="See Results">

                                          <span class="badge__text">See Results</span>
                                        </span>

                                    </a>

                                </div>

                            </div>

                            <div class="sz-card sz-card-info">
                                <div class="sz-card-info__main">
                                    <div class="sz-card-info__value">
                                        <span class="sz-card-info__value-text">1</span>
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

                                    <a href="/">

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

                <div class="bottom-bar">
                    <div class="bottom-bar__list">
                        <div class="bottom-bar__item">
                            <div class="bottom-bar__item-content">
                                <span class="bottom-bar__item-text">
                                  Cloud Protection:
                                </span>
                                <a href="/" class="bottom-bar__item-badge">
                                    pro
                                </a>
                            </div>
                        </div>

                        <div class="bottom-bar__item">
                            <div class="bottom-bar__item-content">
                                <span class="bottom-bar__item-text">
                                  Firewall:
                                </span>
                                <a href="/" class="bottom-bar__item-badge">
                                    pro
                                </a>
                            </div>
                        </div>

                        <div class="bottom-bar__item">
                            <div class="bottom-bar__item-content">
                                <span class="bottom-bar__item-text">
                                  Anti-Spam Engine:
                                </span>
                                <a href="/foundation-spam.html"
                                   class="form-check form-switch form-switch-sm form-check-reverse">
                                    <span class="form-check-label">Active</span>
                                    <input disabled="disabled" class="form-check-input" type="checkbox"
                                           aria-label="state" role="switch" checked="checked">
                                </a>
                            </div>
                        </div>

                    </div>
                    <a href="/" class="bottom-bar__version">Free Version</a>
                </div>

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
