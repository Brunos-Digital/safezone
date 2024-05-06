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
            <div class="whitelist">
                <?php include_once SAFEZONE_PLUGIN_PATH. '/admin/components/safezone-admin-tab-menu.php';?>
                <div class="whitelist-panel">
                    <div class="whitelist-panel__heading">
                        <div class="whitelist-panel__heading-icon">
                            <svg class="icon">
                                <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#admin-site"></use>
                            </svg>
                        </div>
                        <div class="whitelist-panel__heading-content">
                            <div class="whitelist-panel__heading-title">Allowed IP</div>
                            <div class="whitelist-panel__heading-text">Add the IP addresses you allow to pass through the firewall.</div>
                        </div>
                    </div>
                    <div class="whitelist-panel__form">
                        <div class="whitelist-panel__form-title">IP Address</div>
                        <div class="whitelist-panel__form-entry">
                            <div class="whitelist-panel__form-input">
                                <label class="input-group">
                                    <span class="input-group-icon">
                                        <svg class="icon">
                                            <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#admin-site-alt2"></use>
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control whitelist" aria-label="search" value="<?php echo $this->get_ip_address();?>">
                                </label>
                                <div class="whitelist-panel__form-help">
                                    <svg class="icon">
                                        <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#info"></use>
                                    </svg>
                                    IPv4 and IPv6 are acceptable.
                                </div>
                            </div>
                            <button class="btn btn-blue-40 addWhitelist" type="button">Add to Whitelist</button>
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
                                    <th class="" style="width: 64px; min-width: ; max-width:"><input type="checkbox" class="form-check-input" aria-label="select all" data-table-checkbox></th>
                                    <th class="" style="width: 152px; min-width: ; max-width:"><span>IP Address</span></th>
                                    <th class="" style="width: ; min-width: 118px; max-width:"><span>Country</span></th>
                                    <th class="" style="width: ; min-width: 256px; max-width:"><span>Hostname</span></th>
                                    <th class="" style="width: ; min-width: 142px; max-width:"><span>IP Version</span></th>
                                    <th class="" style="width: 142px; min-width: ; max-width:"><span>Timezone</span></th>
                                    <th class="" style="width: 142px; min-width: ; max-width:"><span>Location</span></th>
                                    <th class="" style="width: auto; min-width: 176px; max-width:"><span>Date Added</span></th>
                                    <th class="" style="width: 64px; min-width: ; max-width:"></th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                <?php
                                    foreach($this->get_whitelist()['data'] as $value){
                                ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input" aria-label="select item" data-table-checkbox>
                                    </td>
                                    <td>
                                        <a href="89.1.34.149" class="text-blue-40 shadow-none"><?php echo $value["ip_address"];?></a>
                                    </td>
                                    <td>
                                        <span class="table-main__lang">
                                          <img class="table-main__lang-flag" src="<?php echo SAFEZONE_PLUGIN_URL . '/admin/images/flags/'. $value["country_code"] . '.svg'; ?>" alt="flag">
                                          <span class="table-main__lang-name">
                                            <?php echo $value["country_name"];?>
                                          </span>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <div class="text-gray-40"><?php echo $value["hostname"];?></div>
                                            <div class="text-gray-40"><?php echo $value["org"];?></div>
                                        </div>
                                    </td>
                                    <td><span><?php echo $value["ip_version"];?></span></td>
                                    <td><span class="text-gray-40"><?php echo $value["timezone"];?></span></td>
                                    <td><a target="_blank" href="https://www.google.com/maps/search/<?php echo $value["location"]?>?sa=X"><span class="text-gray-40"><?php echo $value["location"];?></span><a/></td>
                                    <td><span><?php echo date('j M Y, h:i:s', strtotime($value["created_at"]));?></span></td>
                                    <td>
                                        <div class="table-dropdown dropdown">
                                            <button class="table-dropdown__toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="6,14" aria-label="open table menu">
                                                <svg class="icon">
                                                    <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#kebab-menu"></use>
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><button class="dropdown-item deleteWhitelist" type="button" data-id="<?php echo $value['id'];?>">Delete</button></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-pagination">
                        <nav class="pagination-left">
                            <?php
                            $current_page = $this->get_whitelist()['meta']['current_page'];
                            $total_pages = $this->get_whitelist()['meta']['total_pages'];

                            $output = '<span class="page-numbers">Page ' . $current_page . ' of ' . $total_pages . '</span>';
                            $output .= '<ul class="pagination">';

                            if ($total_pages > 1) {
                                $output .= '<li class="page-item"><a class="page-link" href="' . esc_url(add_query_arg('p', max(1, $current_page - 1))) . '">&laquo; Prev</a></li>';

                                // Show page numbers with ellipsis
                                $num_pages_to_show = 5;

                                // Calculate start and end page numbers
                                $start_page = max(1, $current_page - floor($num_pages_to_show / 2));
                                $end_page = min($total_pages, $start_page + $num_pages_to_show - 1);

                                // Show ellipsis if necessary
                                if ($start_page > 1) {
                                    $output .= '<li class="page-item disabled"><span class="page-link">...</span></li>';
                                }

                                // Show page numbers
                                for ($i = $start_page; $i <= $end_page; $i++) {
                                    $output .= '<li class="page-item"><a class="page-link ' . ($i == $current_page ? 'active' : '') . '" href="' . esc_url(add_query_arg('p', $i)) . '">'.$i.'</a></li>';
                                }

                                // Show ellipsis if necessary
                                if ($end_page < $total_pages) {
                                    $output .= '<li class="page-item disabled"><span class="page-link">...</span></li>';
                                }

                                $output .= '<li class="page-item"><a class="page-link" href="' . esc_url(add_query_arg('p', min($total_pages, $current_page + 1))) . '">Next &raquo;</a></li>';
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
                            <div class="sz-card-order__heading-title">Most recently added IPs</div>
                            <div class="sz-card-order__heading-text">Based on the entire year</div>
                        </div>
                        <div class="sz-card-order__list">
                            <?php
                                if(count($this->latest_5_whitelist()) > 0){
                                    foreach($this->latest_5_whitelist() as $value) {
                                        echo '<div class="sz-card-order__item">';
                                            echo '<a href="/" class="sz-card-order__item-value shadow-none">'.$value['ip_address'].'</a>';
                                            echo '<span class="sz-card-order__item-text"><span class="text-gray-40">'.date('j M Y H:i', strtotime($value['created_at'])).'</span></span>';
                                        echo '</div>';
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="sz-card sz-card-info">
                    <div class="sz-card-info__main">
                        <div class="sz-card-info__value">
                            <span class="sz-card-info__value-text"><?php echo $this->total_whitelist();?></span>
                            <span>
                                <svg class="icon">
                                  <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#admin-network"></use>
                                </svg>
                            </span>
                        </div>
                        <div class="sz-card-info__content">
                            <div class="sz-card-info__content-title">Allowed IPs</div>
                            <div class="sz-card-info__content-text">Last update: 23:45</div>
                        </div>
                    </div>

<!--                    <div class="sz-card-info__actions">-->
<!---->
<!--                        <select class="form-select form-select-sm" aria-label="info select">-->
<!---->
<!--                            <option value="1" selected="selected">Today</option>-->
<!---->
<!--                            <option value="2">Today</option>-->
<!---->
<!--                        </select>-->
<!---->
<!--                    </div>-->

                </div>

            </div>

        </div>

    </div>

</div>
