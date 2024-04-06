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
 * @subpackage Safezone/admin/components
 */

if (!defined('WPINC')) {
    die;
}

?>

<div class="sz-card">
    <div class="sz-card-order">
        <div class="sz-card-order__heading">
            <div class="sz-card-order__heading-title">Most Active IPs</div>
            <div class="sz-card-order__heading-text">Based on last 24 hours</div>
        </div>
        <div class="sz-card-order__list sz-card-order__list--reverse">

            <div class="sz-card-order__item">
                <a href="/" class="sz-card-order__item-value shadow-none">245.252.75.94</a>
                <span class="sz-card-order__item-text"><b class="text-gray-30">1.</b></span>
            </div>

            <div class="sz-card-order__item">
                <a href="/" class="sz-card-order__item-value shadow-none">245.252.75.94</a>
                <span class="sz-card-order__item-text"><b class="text-gray-30">2.</b></span>
            </div>

            <div class="sz-card-order__item">
                <a href="/" class="sz-card-order__item-value shadow-none">245.252.75.94</a>
                <span class="sz-card-order__item-text"><b class="text-gray-30">3.</b></span>
            </div>

            <div class="sz-card-order__item">
                <a href="/" class="sz-card-order__item-value shadow-none">245.252.75.94</a>
                <span class="sz-card-order__item-text"><b class="text-gray-30">4.</b></span>
            </div>

            <div class="sz-card-order__item">
                <a href="/" class="sz-card-order__item-value shadow-none">245.252.75.94</a>
                <span class="sz-card-order__item-text"><b class="text-gray-30">5.</b></span>
            </div>

        </div>
    </div>
</div>