(function ($) {
    'use strict';

    $(function () {
        $('.addWhitelist').on('click', function (e) {
            e.preventDefault();
            let $this = $(this);
            $post(ajaxurl, 'add_whitelist', {
                ip: $this.closest('.whitelist-panel__form-entry').find('input').val()
            });
        });

        $('.deleteWhitelist').on('click', function (e) {
            e.preventDefault();
            let $this = $(this);
            $post(ajaxurl, 'delete_whitelist', {
                id: $this.data('id')
            });
        });

        $('.addLicence').on('click', function (e) {
            e.preventDefault();
            const $this = $(this);
            $post(ajaxurl, 'add_licence', {
                licence: $this.closest('.license-panel__form-entry').find('input').val()
            });
        });

        $(".save_button").on("click", function (e) {
            e.preventDefault();
            let dataObject = {};
            $(this).closest(".settings-form").find("input[type=checkbox]").each(function () {
                let name = $(this).attr("name");
                let checked = $(this).is(":checked");
                dataObject[name] = checked ? "1" : "0";
            })
            $post(ajaxurl, 'save_settings', dataObject);
        });

        $('.buyPro').on('click', function (e) {
            e.preventDefault();
            let dataObject = {
                name: 'Bercan',
                email: 'asd@asd.com',
                website: location.hostname,
            };
            $.post(ajaxurl, {action : 'subscribe', payload : dataObject}, function (response) {
                if (response.success) {
                    toastify('success', response.message);
                    window.location.href = response.data?.redirect_url;
                } else {
                    toastify('error', response.message);
                }
            }).fail(function (xhr, status, error) {
                toastify('error', status + " : " + error);
            }).always(function () {
                console.log("Processing...");
            });
        });

    });

    const $post = (url, action, payload) => {
        $.post(url, {action, payload}, function (response) {
            if (response.success) {
                toastify('success', response.message);
            } else {
                toastify('error', response.message);
            }
        }).fail(function (xhr, status, error) {
            toastify('error', status + " : " + error);
        }).always(function () {
            console.log("Processing...");
        });
    }

    const toastify = (status, response) => {
        Toastify({
            text: response,
            duration: 2000,
            newWindow: true,
            gravity: "bottom", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: status === "success" ? "#389547" : "red",
            },
            offset: {
                x: 0,
                y: 30,
            },
            onClick: function () {
            } // Callback after click
        }).showToast();
    }

})(jQuery);
