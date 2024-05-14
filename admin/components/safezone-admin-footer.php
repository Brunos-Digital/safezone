<div class="bottom-bar">
    <div class="bottom-bar__list">
        <div class="bottom-bar__item">
            <div class="bottom-bar__item-content">
                                <span class="bottom-bar__item-text">
                                  Cloud Protection:
                                </span>
                <a href="javascript:void(0);"
                   class="form-check form-switch form-switch-sm form-check-reverse">
                                  <span class="form-check-label">
                                    Active
                                  </span>
                    <input disabled="disabled" class="form-check-input" type="checkbox" aria-label="state" role="switch" checked="checked">
                </a>
            </div>
        </div>

        <div class="bottom-bar__item">
            <div class="bottom-bar__item-content">
                                <span class="bottom-bar__item-text">
                                  Firewall:
                                </span>
                <div class="form-check form-switch form-switch-sm form-check-reverse">
                    <span class="form-check-label"><?php echo get_option('sz_firewall') === "0" ? 'Disabled' : 'Active'?></span>
                    <input class="form-check-input protection_change" aria-label="state" data-type="firewall" type="checkbox" role="switch" <?php echo get_option('sz_firewall') === "0" ? '' : 'checked="true"'?>>
                </div>
            </div>
        </div>

        <div class="bottom-bar__item">
            <div class="bottom-bar__item-content">
                                <span class="bottom-bar__item-text">
                                  Anti-Spam Engine:
                                </span>
                <div class="form-check form-switch form-switch-sm form-check-reverse">
                    <span class="form-check-label"><?php echo get_option('sz_anti_spam') === "0" ? 'Disabled' : 'Active'?></span>
                    <input class="form-check-input protection_change" aria-label="state" data-type="anti_spam" type="checkbox" role="switch" <?php echo get_option('sz_anti_spam') === "0" ? '' : 'checked="true"'?>>
                </div>
            </div>
        </div>
    </div>
    <a href="/" class="bottom-bar__version">
        Pro Version
    </a>
</div>