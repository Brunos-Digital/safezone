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
            <div class="foundation">
                <div class="foundation-panel">
                    <div class="foundation-panel__heading">
                        <div class="foundation-panel__avatar">
                            <svg class="icon">
                                <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#email-close"></use>
                            </svg>
                        </div>
                        <div class="foundation-panel__content">
                            <div class="foundation-panel__content-title">
                                Anti-Spam Engine

                            </div>
                            <div class="foundation-panel__content-text">Your website is protected live</div>
                        </div>
                    </div>

                    <div class="foundation-panel__actions">

                        <div class="foundation-panel__actions-switch">
                            <label class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" checked="checked">
                                <span class="form-check-label">Anti-Spam Protection</span>
                            </label>
                            <a href="<?php echo admin_url('admin.php?page=safezone-settings&tab=spam');?>" class="btn btn-white btn-icon">
                                Settings

                                <svg class="icon">
                                    <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#admin-tools"></use>
                                </svg>

                            </a>
                        </div>

                    </div>

                </div>

                <div class="foundation-cards">

                    <div class="sz-card sz-card-info">
                        <div class="sz-card-info__main">
                            <div class="sz-card-info__value">
                                <span class="sz-card-info__value-text">12</span>
                                <span>
                      <svg class="icon">
                        <use xlink:href="images/icons.svg#welcome-comments"></use>
                      </svg>
                    </span>
                            </div>
                            <div class="sz-card-info__content">
                                <div class="sz-card-info__content-title">Blocked Spams</div>
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
                                <span class="sz-card-info__value-text">4</span>
                                <span>
                      <svg class="icon">
                        <use xlink:href="images/icons.svg#lock"></use>
                      </svg>
                    </span>
                            </div>
                            <div class="sz-card-info__content">
                                <div class="sz-card-info__content-title">Blocked IPs</div>
                                <div class="sz-card-info__content-text">Last update: 22:17</div>
                            </div>
                        </div>

                        <div class="sz-card-info__actions">

                            <select class="form-select form-select-sm" aria-label="info select">

                                <option value="1" selected="selected">Today</option>

                                <option value="2">Today</option>

                            </select>

                        </div>

                    </div>

                    <div class="foundation-card">
                        <div class="foundation-card__main">

                  <span class="foundation-card__badge foundation-card__badge--warning">

                    <svg class="icon">
                      <use xlink:href="images/icons.svg#info-outline"></use>
                    </svg>

                    Update required
                  </span>

                            <div class="foundation-card__content">
                                <div class="foundation-card__content-title">Specific Settings</div>
                                <a href="/" class="foundation-card__content-link shadow-none">
                                    View All

                                    <svg class="icon">
                                        <use xlink:href="images/icons.svg#arrow-right-alt2"></use>
                                    </svg>

                                </a>
                            </div>
                        </div>
                        <div class="foundation-card__list">

                            <div class="foundation-card__switch">
                                <label class="form-check form-switch form-check-reverse">
                                    <span class="form-check-label">Comments</span>
                                    <input class="form-check-input" type="checkbox" role="switch">
                                </label>
                            </div>

                            <div class="foundation-card__switch">
                                <label class="form-check form-switch form-check-reverse">
                                    <span class="form-check-label">Payments</span>
                                    <input class="form-check-input" type="checkbox" role="switch" checked="checked">
                                </label>
                            </div>

                            <div class="foundation-card__switch">
                                <label class="form-check form-switch form-check-reverse">
                                    <span class="form-check-label">Contact Form</span>
                                    <input class="form-check-input" type="checkbox" role="switch" checked="checked">
                                </label>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="foundation-table">

                    <div class="table">
                        <div class="table-actions">
                            <div class="table-actions__container">
                                <button class="btn btn-white btn-icon me-auto">

                                    <svg class="icon">
                                        <use xlink:href="images/icons.svg#lock"></use>
                                    </svg>

                                    Manage Permissions
                                </button>
                                <button class="btn btn-blue-5 btn-icon">

                                    <svg class="icon">
                                        <use xlink:href="images/icons.svg#download"></use>
                                    </svg>

                                    Export Selected
                                </button>
                                <button class="btn btn-error-500">
                                    Delete All
                                </button>
                            </div>
                        </div>
                        <div class="table-container">

                            <table class="table-main">

                                <thead class="table-head">

                                <tr>

                                    <th class="" style="width: 64px; min-width: ; max-width:">

                                        <input type="checkbox" class="form-check-input" aria-label="select all" data-table-checkbox>

                                    </th>

                                    <th class="" style="width: auto; min-width: ; max-width:">

                                        <span>Content <span class="text-gray-30">(49 spams)</span></span>

                                    </th>

                                    <th class="" style="width: ; min-width: 156px; max-width:">

                                        <span>IP Address</span>

                                    </th>

                                    <th class="" style="width: ; min-width: 156px; max-width:">

                                        <span>Type</span>

                                    </th>

                                    <th class="" style="width: ; min-width: 156px; max-width:">

                                        <span>Country</span>

                                    </th>

                                    <th class="" style="width: ; min-width: 156px; max-width:">

                                        <span>Blocked Date</span>

                                    </th>

                                    <th class="" style="width: 64px; min-width: ; max-width:">

                                    </th>

                                </tr>

                                </thead>

                                <tbody class="table-body">

                                <tr>

                                    <td>

                                        <input type="checkbox" class="form-check-input" aria-label="select item" data-table-checkbox>

                                    </td>

                                    <td>

                                        <span>Come and join my crypto journey: https://www.domain.com/crypto</span>

                                    </td>

                                    <td>

                                        <a href="#" class="text-blue-40 shadow-none">185.119.71.104</a>

                                    </td>

                                    <td>

                          <span class="table-main__type">
                            <span class="table-main__type-icon">

                              <svg class="icon">
                                <use xlink:href="images/icons.svg#wordpress"></use>
                              </svg>

                            </span>
                            <span class="table-main__type-text">
                              Comment
                            </span>
                          </span>

                                    </td>

                                    <td>

                          <span class="table-main__lang">
                            <img class="table-main__lang-flag" src="/images/flags/TR.svg" alt="flag">
                            <span class="table-main__lang-name">
                              Turkey
                            </span>
                          </span>

                                    </td>

                                    <td>

                                        <span class="text-gray-40">09 March 2023, 6:34:24 PM</span>

                                    </td>

                                    <td>

                                        <div class="table-dropdown dropdown">
                                            <button class="table-dropdown__toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="6,14" aria-label="open table menu">

                                                <svg class="icon">
                                                    <use xlink:href="images/icons.svg#kebab-menu"></use>
                                                </svg>

                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><button class="dropdown-item" type="button">Action</button></li>
                                                <li><button class="dropdown-item" type="button">Another action</button></li>
                                                <li><button class="dropdown-item" type="button">Something</button></li>
                                            </ul>
                                        </div>

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <input type="checkbox" class="form-check-input" aria-label="select item" data-table-checkbox>

                                    </td>

                                    <td>

                                        <span>blacklist</span>

                                    </td>

                                    <td>

                                        <a href="#" class="text-blue-40 shadow-none">185.119.71.104</a>

                                    </td>

                                    <td>

                          <span class="table-main__type">
                            <span class="table-main__type-icon">

                              <svg class="icon">
                                <use xlink:href="images/icons.svg#wordpress"></use>
                              </svg>

                            </span>
                            <span class="table-main__type-text">
                              Comment
                            </span>
                          </span>

                                    </td>

                                    <td>

                          <span class="table-main__lang">
                            <img class="table-main__lang-flag" src="/images/flags/TR.svg" alt="flag">
                            <span class="table-main__lang-name">
                              Turkey
                            </span>
                          </span>

                                    </td>

                                    <td>

                                        <span class="text-gray-40">09 March 2023, 6:34:24 PM</span>

                                    </td>

                                    <td>

                                        <div class="table-dropdown dropdown">
                                            <button class="table-dropdown__toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="6,14" aria-label="open table menu">

                                                <svg class="icon">
                                                    <use xlink:href="images/icons.svg#kebab-menu"></use>
                                                </svg>

                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><button class="dropdown-item" type="button">Action</button></li>
                                                <li><button class="dropdown-item" type="button">Another action</button></li>
                                                <li><button class="dropdown-item" type="button">Something</button></li>
                                            </ul>
                                        </div>

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <input type="checkbox" class="form-check-input" aria-label="select item" data-table-checkbox>

                                    </td>

                                    <td>

                                        <span>Come and join my crypto journey: https://www.domain.com/crypto</span>

                                    </td>

                                    <td>

                                        <a href="#" class="text-blue-40 shadow-none">185.119.71.104</a>

                                    </td>

                                    <td>

                          <span class="table-main__type">
                            <span class="table-main__type-icon">

                              <svg class="icon">
                                <use xlink:href="images/icons.svg#wordpress"></use>
                              </svg>

                            </span>
                            <span class="table-main__type-text">
                              Comment
                            </span>
                          </span>

                                    </td>

                                    <td>

                          <span class="table-main__lang">
                            <img class="table-main__lang-flag" src="/images/flags/TR.svg" alt="flag">
                            <span class="table-main__lang-name">
                              Turkey
                            </span>
                          </span>

                                    </td>

                                    <td>

                                        <span class="text-gray-40">09 March 2023, 6:34:24 PM</span>

                                    </td>

                                    <td>

                                        <div class="table-dropdown dropdown">
                                            <button class="table-dropdown__toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="6,14" aria-label="open table menu">

                                                <svg class="icon">
                                                    <use xlink:href="images/icons.svg#kebab-menu"></use>
                                                </svg>

                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><button class="dropdown-item" type="button">Action</button></li>
                                                <li><button class="dropdown-item" type="button">Another action</button></li>
                                                <li><button class="dropdown-item" type="button">Something</button></li>
                                            </ul>
                                        </div>

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <input type="checkbox" class="form-check-input" aria-label="select item" data-table-checkbox>

                                    </td>

                                    <td>

                                        <span>Come and join my crypto journey: https://www.domain.com/crypto</span>

                                    </td>

                                    <td>

                                        <a href="#" class="text-blue-40 shadow-none">185.119.71.104</a>

                                    </td>

                                    <td>

                          <span class="table-main__type">
                            <span class="table-main__type-icon">

                              <svg class="icon">
                                <use xlink:href="images/icons.svg#wordpress"></use>
                              </svg>

                            </span>
                            <span class="table-main__type-text">
                              Comment
                            </span>
                          </span>

                                    </td>

                                    <td>

                          <span class="table-main__lang">
                            <img class="table-main__lang-flag" src="/images/flags/TR.svg" alt="flag">
                            <span class="table-main__lang-name">
                              Turkey
                            </span>
                          </span>

                                    </td>

                                    <td>

                                        <span class="text-gray-40">09 March 2023, 6:34:24 PM</span>

                                    </td>

                                    <td>

                                        <div class="table-dropdown dropdown">
                                            <button class="table-dropdown__toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="6,14" aria-label="open table menu">

                                                <svg class="icon">
                                                    <use xlink:href="images/icons.svg#kebab-menu"></use>
                                                </svg>

                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><button class="dropdown-item" type="button">Action</button></li>
                                                <li><button class="dropdown-item" type="button">Another action</button></li>
                                                <li><button class="dropdown-item" type="button">Something</button></li>
                                            </ul>
                                        </div>

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <input type="checkbox" class="form-check-input" aria-label="select item" data-table-checkbox>

                                    </td>

                                    <td>

                                        <span>Come and join my crypto journey: https://www.domain.com/crypto</span>

                                    </td>

                                    <td>

                                        <a href="#" class="text-blue-40 shadow-none">185.119.71.104</a>

                                    </td>

                                    <td>

                          <span class="table-main__type">
                            <span class="table-main__type-icon">

                              <svg class="icon">
                                <use xlink:href="images/icons.svg#wordpress"></use>
                              </svg>

                            </span>
                            <span class="table-main__type-text">
                              Comment
                            </span>
                          </span>

                                    </td>

                                    <td>

                          <span class="table-main__lang">
                            <img class="table-main__lang-flag" src="/images/flags/TR.svg" alt="flag">
                            <span class="table-main__lang-name">
                              Turkey
                            </span>
                          </span>

                                    </td>

                                    <td>

                                        <span class="text-gray-40">09 March 2023, 6:34:24 PM</span>

                                    </td>

                                    <td>

                                        <div class="table-dropdown dropdown">
                                            <button class="table-dropdown__toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="6,14" aria-label="open table menu">

                                                <svg class="icon">
                                                    <use xlink:href="images/icons.svg#kebab-menu"></use>
                                                </svg>

                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><button class="dropdown-item" type="button">Action</button></li>
                                                <li><button class="dropdown-item" type="button">Another action</button></li>
                                                <li><button class="dropdown-item" type="button">Something</button></li>
                                            </ul>
                                        </div>

                                    </td>

                                </tr>

                                </tbody>

                            </table>

                        </div>
                        <div class="table-pagination">
                            <nav aria-label="Table navigation">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><span class="page-link disabled">...</span></li>
                                    <li class="page-item"><a class="page-link" href="#">8</a></li>
                                    <li class="page-item"><a class="page-link" href="#">9</a></li>
                                    <li class="page-item"><a class="page-link" href="#">10</a></li>
                                </ul>
                            </nav>
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
                <?php include_once SAFEZONE_PLUGIN_PATH. '/admin/components/safezone-admin-sidebar-scan-now.php';?>
            </div>
        </div>
    </div>
</div>
