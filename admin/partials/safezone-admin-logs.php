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
                        <use xlink:href="images/icons.svg#search"></use>
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
                                    <use xlink:href="images/icons.svg#filter"></use>
                                </svg>

                                Filters
                            </button>
                            <button class="btn btn-icon btn-blue-5 ms-sm-auto">

                                <svg class="icon">
                                    <use xlink:href="images/icons.svg#download"></use>
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

                                <th class="" style="width: 112px; min-width: ; max-width:">

                                    <span>User</span>

                                </th>

                                <th class="" style="width: ; min-width: 175px; max-width:">

                                    <span>Category</span>

                                </th>

                                <th class="" style="width: ; min-width: 145px; max-width:">

                                    <span>Date</span>

                                </th>

                                <th class="" style="width: auto; min-width: ; max-width:">

                                    <span>Activity</span>

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

                        <span class="table-main__type table-main__type--black">
                          <span class="table-main__type-icon">

                            <svg class="icon">
                              <use xlink:href="images/icons.svg#admin-users"></use>
                            </svg>

                          </span>
                          <span class="table-main__type-text">
                            Admin
                          </span>
                        </span>

                                </td>

                                <td>

                        <span class="badge badge--error" title="IP Blocked">

                          <span class="badge__dot"></span>

                          <span class="badge__text">IP Blocked</span>
                        </span>

                                </td>

                                <td>

                                    <span class="text-gray-100">09 March 2023, 6:34:24 PM</span>

                                </td>

                                <td>

                                    <span class="text-gray-40">IP 185.119.721.40 has been added to the whitelist.</span>

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

                        <span class="table-main__type table-main__type--black">
                          <span class="table-main__type-icon">

                            <svg class="icon">
                              <use xlink:href="images/icons.svg#admin-users"></use>
                            </svg>

                          </span>
                          <span class="table-main__type-text">
                            Admin
                          </span>
                        </span>

                                </td>

                                <td>

                        <span class="badge badge--error" title="IP Blocked">

                          <span class="badge__dot"></span>

                          <span class="badge__text">IP Blocked</span>
                        </span>

                                </td>

                                <td>

                                    <span class="text-gray-100">09 March 2023, 6:34:24 PM</span>

                                </td>

                                <td>

                                    <span class="text-gray-40">IP 185.119.721.40 has been added to the whitelist.</span>

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

                        <span class="table-main__type table-main__type--black">
                          <span class="table-main__type-icon">

                            <svg class="icon">
                              <use xlink:href="images/icons.svg#admin-users"></use>
                            </svg>

                          </span>
                          <span class="table-main__type-text">
                            Admin
                          </span>
                        </span>

                                </td>

                                <td>

                        <span class="badge badge--error" title="IP Blocked">

                          <span class="badge__dot"></span>

                          <span class="badge__text">IP Blocked</span>
                        </span>

                                </td>

                                <td>

                                    <span class="text-gray-100">09 March 2023, 6:34:24 PM</span>

                                </td>

                                <td>

                                    <span class="text-gray-40">IP 185.119.721.40 has been added to the whitelist.</span>

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

                        <span class="table-main__type table-main__type--black">
                          <span class="table-main__type-icon">

                            <svg class="icon">
                              <use xlink:href="images/icons.svg#admin-users"></use>
                            </svg>

                          </span>
                          <span class="table-main__type-text">
                            Admin
                          </span>
                        </span>

                                </td>

                                <td>

                        <span class="badge badge--error" title="IP Blocked">

                          <span class="badge__dot"></span>

                          <span class="badge__text">IP Blocked</span>
                        </span>

                                </td>

                                <td>

                                    <span class="text-gray-100">09 March 2023, 6:34:24 PM</span>

                                </td>

                                <td>

                                    <span class="text-gray-40">IP 185.119.721.40 has been added to the whitelist.</span>

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

                        <span class="table-main__type table-main__type--black">
                          <span class="table-main__type-icon">

                            <svg class="icon">
                              <use xlink:href="images/icons.svg#admin-users"></use>
                            </svg>

                          </span>
                          <span class="table-main__type-text">
                            Admin
                          </span>
                        </span>

                                </td>

                                <td>

                        <span class="badge badge--gray" title="Change Settings">

                          <span class="badge__text">Change Settings</span>
                        </span>

                                </td>

                                <td>

                                    <span class="text-gray-100">09 March 2023, 6:34:24 PM</span>

                                </td>

                                <td>

                                    <span class="text-gray-40">IP 185.119.721.40 has been added to the whitelist.</span>

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

                        <span class="table-main__type table-main__type--black">
                          <span class="table-main__type-icon">

                            <svg class="icon">
                              <use xlink:href="images/icons.svg#admin-users"></use>
                            </svg>

                          </span>
                          <span class="table-main__type-text">
                            Admin
                          </span>
                        </span>

                                </td>

                                <td>

                        <span class="badge badge--error" title="IP Blocked">

                          <span class="badge__dot"></span>

                          <span class="badge__text">IP Blocked</span>
                        </span>

                                </td>

                                <td>

                                    <span class="text-gray-100">09 March 2023, 6:34:24 PM</span>

                                </td>

                                <td>

                                    <span class="text-gray-40">IP 185.119.721.40 has been added to the whitelist.</span>

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
                <?php include_once SAFEZONE_PLUGIN_PATH. '/admin/components/safezone-admin-sidebar-subscription.php';?>
                <?php include_once SAFEZONE_PLUGIN_PATH. '/admin/components/safezone-admin-sidebar-documentation.php';?>
                <?php include_once SAFEZONE_PLUGIN_PATH. '/admin/components/safezone-admin-sidebar-guidance.php';?>
            </div>
        </div>
    </div>
</div>