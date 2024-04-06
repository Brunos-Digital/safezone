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
            <div class="page">
                <div class="tab-menu tab-menu--shadow">
                    <?php include_once SAFEZONE_PLUGIN_PATH. '/admin/components/safezone-admin-tab-menu.php';?>
                    <div class="tab-menu__bottom">

                        <div class="actions">
                            <label class="input-group">
                                <span class="input-group-icon">

                                  <svg class="icon">
                                    <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#search"></use>
                                  </svg>

                                </span>
                                <input type="text" class="form-control" placeholder="Search for IP or hostname" aria-label="search">
                            </label>
                            <select class="actions-select" aria-label="actives">
                                <option value="1" selected="selected">All activites</option>
                                <option value="2">All activites</option>
                            </select>
                            <button class="btn btn-icon btn-blue-40">

                                <svg class="icon">
                                    <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#filter"></use>
                                </svg>

                                Filters
                            </button>
                            <button class="btn btn-icon btn-blue-5 ms-sm-auto">

                                <svg class="icon">
                                    <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#download"></use>
                                </svg>

                                Export
                            </button>
                        </div>

                    </div>

                </div>

                <div class="table">
                    <div class="table-actions">
                        <div class="table-actions__container">
                            <button class="btn btn-white btn-icon me-auto">

                                <svg class="icon">
                                    <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#lock"></use>
                                </svg>

                                Manage Permissions
                            </button>
                            <button class="btn btn-blue-5 btn-icon">

                                <svg class="icon">
                                    <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#download"></use>
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

                                    <input type="checkbox" class="form-check-input" aria-label="select all" checked="checked" data-table-checkbox>

                                </th>

                                <th class="" style="width: 152px; min-width: ; max-width:">

                                    <span>IP Address</span>

                                </th>

                                <th class="" style="width: ; min-width: ; max-width: 118px">

                                    <span>Country</span>

                                </th>

                                <th class="" style="width: ; min-width: ; max-width: 150px">

                                    <span>Hostname</span>

                                </th>

                                <th class="" style="width: ; min-width: ; max-width: 145px">

                                    <span>Expires</span>

                                </th>

                                <th class="" style="width: auto; min-width: ; max-width:">

                                    <span>Reason</span>

                                </th>

                                <th class="" style="width: 64px; min-width: ; max-width:">

                                </th>

                            </tr>

                            </thead>

                            <tbody class="table-body">

                            <tr>

                                <td>

                                    <input type="checkbox" class="form-check-input" aria-label="select item" checked="checked" data-table-checkbox>

                                </td>

                                <td>

                                    <a href="#" class="text-blue-40 shadow-none">89.1.34.149</a>

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

                                    <div class="d-flex flex-column">

                                        <div class="text-gray-40">185.119.721.40.</div>

                                        <div class="text-gray-40">ip.godaddy.com</div>

                                    </div>

                                </td>

                                <td>

                                    <span>09 March 2023, 6:34:24 PM</span>

                                </td>

                                <td>

                                    <div class="d-flex gap-2 flex-wrap align-items-center">

                          <span class="badge badge--error" title="Multiple failed login attempts">

                            <span class="badge__text">Multiple failed login attempts</span>
                          </span>

                                    </div>

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

                                    <input type="checkbox" class="form-check-input" aria-label="select item" checked="checked" data-table-checkbox>

                                </td>

                                <td>

                                    <a href="#" class="text-blue-40 shadow-none">72.146.130.60</a>

                                </td>

                                <td>

                        <span class="table-main__lang">
                          <img class="table-main__lang-flag" src="/images/flags/TO.svg" alt="flag">
                          <span class="table-main__lang-name">
                            Tonga
                          </span>
                        </span>

                                </td>

                                <td>

                                    <div class="d-flex flex-column">

                                        <div class="text-gray-40">185.119.721.40.</div>

                                        <div class="text-gray-40">ip.godaddy.com</div>

                                    </div>

                                </td>

                                <td>

                                    <span>07 March 2023, 6:32:24 PM</span>

                                </td>

                                <td>

                                    <div class="d-flex gap-2 flex-wrap align-items-center">

                          <span class="badge badge--gray" title="Unusual activity detected">

                            <span class="badge__text">Unusual activity detected</span>
                          </span>

                                    </div>

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

                                    <input type="checkbox" class="form-check-input" aria-label="select item" checked="checked" data-table-checkbox>

                                </td>

                                <td>

                                    <a href="#" class="text-blue-40 shadow-none">219.187.172.157</a>

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

                                    <div class="d-flex flex-column">

                                        <div class="text-gray-40">185.119.721.40.</div>

                                        <div class="text-gray-40">ip.godaddy.com</div>

                                    </div>

                                </td>

                                <td>

                                    <span>07 March 2023, 5:32:15 PM</span>

                                </td>

                                <td>

                                    <div class="d-flex gap-2 flex-wrap align-items-center">

                          <span class="badge badge--gray" title="Malicious file upload detected">

                            <span class="badge__text">Malicious file upload detected</span>
                          </span>

                                    </div>

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

                                    <input type="checkbox" class="form-check-input" aria-label="select item" checked="checked" data-table-checkbox>

                                </td>

                                <td>

                                    <a href="#" class="text-blue-40 shadow-none">204.174.44.245</a>

                                </td>

                                <td>

                        <span class="table-main__lang">
                          <img class="table-main__lang-flag" src="/images/flags/QA.svg" alt="flag">
                          <span class="table-main__lang-name">
                            Qatar
                          </span>
                        </span>

                                </td>

                                <td>

                                    <div class="d-flex flex-column">

                                        <div class="text-gray-40">185.119.721.40.</div>

                                        <div class="text-gray-40">ip.godaddy.com</div>

                                    </div>

                                </td>

                                <td>

                                    <span>09 March 2023, 6:34:24 PM</span>

                                </td>

                                <td>

                                    <div class="d-flex gap-2 flex-wrap align-items-center">

                          <span class="badge badge--gray" title="Server resource limits exceeded">

                            <span class="badge__text">Server resource limits exceeded</span>
                          </span>

                                    </div>

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

                                    <input type="checkbox" class="form-check-input" aria-label="select item" checked="checked" data-table-checkbox>

                                </td>

                                <td>

                                    <a href="#" class="text-blue-40 shadow-none">245.252.75.94</a>

                                </td>

                                <td>

                        <span class="table-main__lang">
                          <img class="table-main__lang-flag" src="/images/flags/NP.svg" alt="flag">
                          <span class="table-main__lang-name">
                            Nepal
                          </span>
                        </span>

                                </td>

                                <td>

                                    <div class="d-flex flex-column">

                                        <div class="text-gray-40">185.119.721.40.</div>

                                        <div class="text-gray-40">ip.godaddy.com</div>

                                    </div>

                                </td>

                                <td>

                                    <span>09 March 2023, 6:34:24 PM</span>

                                </td>

                                <td>

                                    <div class="d-flex gap-2 flex-wrap align-items-center">

                          <span class="badge badge--gray" title="Unusual activity detected">

                            <span class="badge__text">Unusual activity detected</span>
                          </span>

                                    </div>

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

                                    <input type="checkbox" class="form-check-input" aria-label="select item" checked="checked" data-table-checkbox>

                                </td>

                                <td>

                                    <a href="#" class="text-blue-40 shadow-none">135.67.222.3</a>

                                </td>

                                <td>

                        <span class="table-main__lang">
                          <img class="table-main__lang-flag" src="/images/flags/GR.svg" alt="flag">
                          <span class="table-main__lang-name">
                            Greece
                          </span>
                        </span>

                                </td>

                                <td>

                                    <div class="d-flex flex-column">

                                        <div class="text-gray-40">185.119.721.40.</div>

                                        <div class="text-gray-40">ip.godaddy.com</div>

                                    </div>

                                </td>

                                <td>

                                    <span>09 March 2023, 6:34:24 PM</span>

                                </td>

                                <td>

                                    <div class="d-flex gap-2 flex-wrap align-items-center">

                          <span class="badge badge--gray" title="Unusual activity detected">

                            <span class="badge__text">Unusual activity detected</span>
                          </span>

                                    </div>

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
        <div class="app__body-sidebar">

            <div class="sidebar">

                <div class="sz-card">
                    <div class="sz-card-order">
                        <div class="sz-card-order__heading">
                            <div class="sz-card-order__heading-title">IPs with the most lockouts</div>
                            <div class="sz-card-order__heading-text">Based on last 24 hours</div>
                        </div>
                        <div class="sz-card-order__list">

                            <div class="sz-card-order__item">
                                <a href="/" class="sz-card-order__item-value shadow-none">245.252.75.94</a>
                                <span class="sz-card-order__item-text">9 Lockouts</span>
                            </div>

                            <div class="sz-card-order__item">
                                <a href="/" class="sz-card-order__item-value shadow-none">245.252.75.94</a>
                                <span class="sz-card-order__item-text">4 Lockouts</span>
                            </div>

                            <div class="sz-card-order__item">
                                <a href="/" class="sz-card-order__item-value shadow-none">245.252.75.94</a>
                                <span class="sz-card-order__item-text">4 Lockouts</span>
                            </div>

                            <div class="sz-card-order__item">
                                <a href="/" class="sz-card-order__item-value shadow-none">245.252.75.94</a>
                                <span class="sz-card-order__item-text">3 Lockouts</span>
                            </div>

                            <div class="sz-card-order__item">
                                <a href="/" class="sz-card-order__item-value shadow-none">245.252.75.94</a>
                                <span class="sz-card-order__item-text">2 Lockouts</span>
                            </div>

                        </div>
                    </div>
                </div>

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
                            <span class="sz-card-info__value-text">4</span>
                            <span>
                    <svg class="icon">
                      <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#lock"></use>
                    </svg>
                  </span>
                        </div>
                        <div class="sz-card-info__content">
                            <div class="sz-card-info__content-title">Blocked attemps</div>
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

            </div>

        </div>

    </div>

</div>
