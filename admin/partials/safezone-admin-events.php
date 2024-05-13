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

$get_reports = $this->reports('Firewall');


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
<!--                            <label class="input-group">-->
<!--                                <span class="input-group-icon">-->
<!---->
<!--                                  <svg class="icon">-->
<!--                                    <use xlink:href="--><?php //echo SAFEZONE_PLUGIN_URL; ?><!--/admin/images/icons.svg#search"></use>-->
<!--                                  </svg>-->
<!---->
<!--                                </span>-->
<!--                                <input type="text" class="form-control" placeholder="Search for IP or hostname" aria-label="search">-->
<!--                            </label>-->
<!--                            <select class="actions-select" aria-label="actives">-->
<!--                                <option value="1" selected="selected">All activites</option>-->
<!--                                <option value="2">All activites</option>-->
<!--                            </select>-->
<!--                            <button class="btn btn-icon btn-blue-40">-->
<!---->
<!--                                <svg class="icon">-->
<!--                                    <use xlink:href="--><?php //echo SAFEZONE_PLUGIN_URL; ?><!--/admin/images/icons.svg#filter"></use>-->
<!--                                </svg>-->
<!---->
<!--                                Filters-->
<!--                            </button>-->
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

                                    <input type="checkbox" class="form-check-input" aria-label="select all" data-table-checkbox>

                                </th>

                                <th class="" style="width: 152px; min-width: ; max-width:">

                                    <span>IP Address</span>

                                </th>

                                <th class="" style="width: ; min-width: 118px; max-width:">

                                    <span>Country</span>

                                </th>

                                <th class="" style="width: ; min-width: 150px; max-width:">

                                    <span>Hostname</span>

                                </th>

                                <th class="" style="width: auto; min-width: ; max-width:">

                                    <span>Event</span>

                                </th>

                                <th class="" style="width: ; min-width: 145px; max-width:">
                                    <span>Created At</span>
                                </th>

                                <th class="" style="width: 64px; min-width: ; max-width:">

                                </th>

                            </tr>

                            </thead>

                            <tbody class="table-body">

                            <?php
                                if(count($get_reports) > 0){
                                    foreach($get_reports['data'] as $key=>$value){
                            ?>

                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input" aria-label="select item" data-table-checkbox>
                                </td>
                                <td>
                                    <div class="text-blue-40 shadow-none"><?php echo $value['ip_address'];?></div>
                                </td>
                                <td>
                                    <span class="table-main__lang">
                                      <img class="table-main__lang-flag" src="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/flags/<?php echo $value['country_code'];?>.svg" alt="flag">
                                      <span class="table-main__lang-name">
                                        <?php echo $value['country_code'];?>
                                      </span>
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <div class="text-gray-40"><?php echo $value['ip_address'];?></div>
                                        <div class="text-gray-40">-</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 flex-wrap align-items-center">
                                        <span class="badge badge--error" title="IP Blocked">
                                            <span class="badge__dot"></span>
                                            <span class="badge__text"><?php echo $value['state'];?></span>
                                        </span>
                                        <span class="badge badge--gray" title="Attemp to access proh...">
                                            <span class="badge__text"><?php echo $value['message'];?></span>
                                      </span>
                                    </div>
                                </td>
                                <td><span><?php echo date('j M Y H:i:s', strtotime($value['created_at']));?></span></td>
                                <td>
                                    <div class="table-dropdown dropdown">
                                        <button class="table-dropdown__toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="6,14" aria-label="open table menu">

                                            <svg class="icon">
                                                <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#kebab-menu"></use>
                                            </svg>

                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><button class="dropdown-item" type="button">Action</button></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <?php } } ?>

                            </tbody>

                        </table>

                    </div>
                    <div class="table-pagination">
                        <nav aria-label="Table navigation">
                            <?php
                            $output = '<span class="page-numbers">Page ' . $get_reports['meta']['current_page'] . ' of ' . $get_reports['meta']['total_pages'] . '</span>';
                            $output .= '<ul class="pagination">';
                            if ($get_reports['meta']['total_pages'] > 1) {
                                $output .= '<li class="page-item"><a class="page-link" href="' . esc_url(add_query_arg('p', max(1, $this->get_whitelist()['meta']['current_page'] - 1))) . '">&laquo; Prev</a></li>';

                                // Show page numbers with ellipsis
                                $num_pages_to_show = 5;
                                $current_page = $get_reports['meta']['current_page'];
                                $total_pages = $get_reports['meta']['total_pages'];

                                // Calculate start and end page numbers
                                $start_page = max(1, $current_page - 2);
                                $end_page = min($total_pages, $current_page + 2);

                                // Show ellipsis if necessary
                                if ($start_page > 1) {
                                    $output .= '<li class="page-item disabled"><span class="page-link">...</span></li>';
                                }

                                // Show page numbers
                                for ($i = $start_page; $i <= $end_page; $i++) {
                                    $output .= '<li class="page-item"><a class="page-link ' . ($i == $get_reports['meta']['current_page'] ? 'active' : '') . '" href="' . esc_url(add_query_arg('p', $i)) . '">'.$i.'</a></li>';
                                }

                                // Show ellipsis if necessary
                                if ($end_page < $total_pages) {
                                    $output .= '<li class="page-item disabled"><span class="page-link">...</span></li>';
                                }

                                $output .= '<li class="page-item"><a class="page-link" href="' . esc_url(add_query_arg('p', min($get_reports['meta']['total_pages'], $get_reports['meta']['current_page'] + 1))) . '">Next &raquo;</a></li>';
                            }
                            $output .= '</ul>';
                            echo $output;
                            ?>
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
                            <div class="sz-card-order__heading-title">IPs with the most activity</div>
                            <div class="sz-card-order__heading-text">Based on last 24 hours</div>
                        </div>
                        <div class="sz-card-order__list">

                            <div class="sz-card-order__item">
                                <a href="/" class="sz-card-order__item-value shadow-none">245.252.75.94</a>
                                <span class="sz-card-order__item-text">9 Actions</span>
                            </div>

                            <div class="sz-card-order__item">
                                <a href="/" class="sz-card-order__item-value shadow-none">245.252.75.94</a>
                                <span class="sz-card-order__item-text">4 Actions</span>
                            </div>

                            <div class="sz-card-order__item">
                                <a href="/" class="sz-card-order__item-value shadow-none">245.252.75.94</a>
                                <span class="sz-card-order__item-text">4 Actions</span>
                            </div>

                            <div class="sz-card-order__item">
                                <a href="/" class="sz-card-order__item-value shadow-none">245.252.75.94</a>
                                <span class="sz-card-order__item-text">3 Actions</span>
                            </div>

                            <div class="sz-card-order__item">
                                <a href="/" class="sz-card-order__item-value shadow-none">245.252.75.94</a>
                                <span class="sz-card-order__item-text">2 Actions</span>
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
                      <use xlink:href="images/icons.svg#lock"></use>
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
                      <use xlink:href="images/icons.svg#lock"></use>
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
