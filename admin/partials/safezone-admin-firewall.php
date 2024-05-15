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

$get_reports = $this->reports('Firewall');
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
                                <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#shield"></use>
                            </svg>

                        </div>
                        <div class="foundation-panel__content">
                            <div class="foundation-panel__content-title">
                                Firewall enabled

                            </div>
                            <div class="foundation-panel__content-text">Your website is protected live</div>
                        </div>
                    </div>

                    <div class="foundation-panel__actions">

                        <div class="foundation-panel__actions-switch">
                            <label class="form-check form-switch">
                                <input class="form-check-input protection_change" data-type="firewall" type="checkbox" role="switch" <?php echo get_option('sz_firewall') === "0" ? '' : 'checked="true"'?>>
                                <span class="form-check-label">Firewall</span>
                            </label>
                            <a href="<?php echo admin_url('admin.php?page=safezone-settings&tab=firewall');?>" class="btn btn-white btn-icon">
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
                                <span class="sz-card-info__value-text"><?php echo $this->bad_bots;?></span>
                                <span>
                      <svg class="icon">
                        <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#admin-users"></use>
                      </svg>
                    </span>
                            </div>
                            <div class="sz-card-info__content">
                                <div class="sz-card-info__content-title">Bad Bots</div>
                                <div class="sz-card-info__content-text">Last update: 23:45</div>
                            </div>
                        </div>

<!--                        <div class="sz-card-info__actions">-->
<!---->
<!--                            <select class="form-select form-select-sm" aria-label="info select">-->
<!---->
<!--                                <option value="1" selected="selected">Today</option>-->
<!---->
<!--                                <option value="2">Today</option>-->
<!---->
<!--                            </select>-->
<!---->
<!--                        </div>-->

                    </div>

                    <div class="sz-card sz-card-info">
                        <div class="sz-card-info__main">
                            <div class="sz-card-info__value">
                                <span class="sz-card-info__value-text"><?php echo $this->login_protection;?></span>
                                <span>
                                  <svg class="icon">
                                    <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#admin-network"></use>
                                  </svg>
                                </span>
                            </div>
                            <div class="sz-card-info__content">
                                <div class="sz-card-info__content-title">Login Protection</div>
                                <div class="sz-card-info__content-text">Last update: 22:17</div>
                            </div>
                        </div>

<!--                        <div class="sz-card-info__actions">-->
<!--                            <select class="form-select form-select-sm" aria-label="info select">-->
<!--                                <option value="1" selected="selected">Today</option>-->
<!--                                <option value="2">Today</option>-->
<!--                            </select>-->
<!--                        </div>-->

                    </div>

                    <div class="foundation-card">
                        <div class="foundation-card__main">

                  <span class="foundation-card__badge foundation-card__badge--error">

                    <svg class="icon">
                      <use xlink:href="<?php echo SAFEZONE_PLUGIN_URL; ?>/admin/images/icons.svg#info-outline"></use>
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
                                    <span class="form-check-label">XML-RPC</span>
                                    <input class="form-check-input" type="checkbox" role="switch" <?php echo get_option('sz_disable_xml') === "1" ? 'checked="checked"' : '';?>>
                                </label>
                            </div>

                            <div class="foundation-card__switch">
                                <label class="form-check form-switch form-check-reverse">
                                    <span class="form-check-label">Rest API</span>
                                    <input class="form-check-input" type="checkbox" role="switch" <?php echo get_option('sz_disable_rest_api') === "1" ? 'checked="checked"' : '';?>>
                                </label>
                            </div>

                            <div class="foundation-card__switch">
                                <label class="form-check form-switch form-check-reverse">
                                    <span class="form-check-label">Disable RSS</span>
                                    <input class="form-check-input" type="checkbox" role="switch" <?php echo get_option('sz_disable_rss_feeds') === "1" ? 'checked="checked"' : '';?>>
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

                                        <span>Results <span class="text-gray-30">(<?php echo $get_reports['meta']['total_count'];?> files scanned)</span></span>

                                    </th>

                                    <th class="" style="width: 156px; min-width: ; max-width:">

                                        <span>State</span>

                                    </th>

                                    <th class="" style="width: 156px; min-width: ; max-width:">

                                        <span>Found Date</span>

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
                                                <span><?php echo $value['message'];?></span><br /><small><?php echo $value['path'];?></small>
                                            </td>
                                            <td>
                                              <span class="badge badge--<?php echo $this->state_badge($value['state'])[0];?>" title="Critical">
                                                <span class="badge__dot"></span>
                                                <span class="badge__text"><?php echo $this->state_badge($value['state'])[1];?></span>
                                              </span>
                                            </td>
                                            <td>
                                                <span class="text-gray-40"><?php echo date('j M Y H:i:s', strtotime($value['created_at']));?></span>
                                            </td>
                                            <td>
                                                <div class="foundation-table__actions">
                                                    <a href="javascript:void(0);" class="text-gray-10 malware_report_ignore" data-id="<?php echo $value['id'];?>">Ignore</a>
                                                    <!--                                        <a href="#" class="text-blue-50">Details</a>-->
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

        </div>
        <div class="app__body-sidebar">
            <div class="sidebar">
                <?php include_once SAFEZONE_PLUGIN_PATH. '/admin/components/safezone-admin-sidebar-subscription.php';?>
                <?php include_once SAFEZONE_PLUGIN_PATH. '/admin/components/safezone-admin-sidebar-documentation.php';?>
                <?php include_once SAFEZONE_PLUGIN_PATH. '/admin/components/safezone-admin-sidebar-guidance.php';?>
                <?php include_once SAFEZONE_PLUGIN_PATH. '/admin/components/safezone-admin-sidebar-activities.php';?>
            </div>
        </div>
    </div>
</div>