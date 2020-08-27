var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
jQuery(document).ready(function () {

    var frame_value = jQuery('.wc-pao-addon-custom-text').data('price');
    jQuery('.wc-pao-addon-custom-text').val(frame_value);
    jQuery('.wc-pao-addon-custom-text').hide();
    jQuery('.wc-pao-addon-container').hide();

    var getUrl = window.location;
    var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    jQuery('.customize-cart-btn').click(function () {
        var ajax_url = baseUrl + '/wp-content/themes/flatsome-child/ajax/product_adons_session.php';
        var qty = jQuery('.qty').val();
        var product_slug = jQuery('.product-slug').val();
        jQuery.ajax({
            type: "post",
            url: ajax_url,
            data: { frame_value: frame_value },
            success: function (response) {
                //location.href = baseUrl + '/lens-thinkness';
            },
            error: function (response) {
                //jQuery('#cover-spin').hide(0);
            }
        });
        location.href = baseUrl + '/product-customizer/?p=' + product_slug;
    });

    jQuery('.prescription-btn').click(function () {
        jQuery('#cover-spin').show(0);
        jQuery('.prescription-btn').text('Loading...');
        jQuery('.prescription-btn').attr('disabled', true);
        var right_sph = jQuery('.right-sph').val();
        var right_cyl = jQuery('.right-cyl').val();
        var right_axis = jQuery('.right-axis').val();
        var right_add = jQuery('.right-add').val();
        var left_sph = jQuery('.left-sph').val();
        var left_cyl = jQuery('.left-cyl').val();
        var left_axis = jQuery('.left-axis').val();
        var left_add = jQuery('.left-add').val();
        var pd_one_select = jQuery('.pd-one-select').val();
        var pd_two_display = jQuery('#dual-pd').css('display');
        var dual_pd_two_select = jQuery('.dual-pd-two-select').val();
        var dual_pd_one_select = jQuery('.dual-pd-one-select').val();
        var data = {
            right_sph: right_sph,
            right_cyl: right_cyl,
            right_axis: right_axis,
            right_add: right_add,
            left_sph: left_sph,
            left_cyl: left_cyl,
            left_axis: left_axis,
            left_add: left_add,
            pd_one_select: pd_one_select,
            dual_pd_two_select: dual_pd_two_select,
            dual_pd_one_select: dual_pd_one_select,
            pd_two_display: pd_two_display
        };
        var ajax_url = baseUrl + '/wp-content/themes/flatsome-child/ajax/update_lens_prescription.php';
        if (right_cyl !== '0.00' && left_cyl !== '0.00' && (right_axis === '0' || left_axis === '0')) {
            jQuery('.right-axis').css('border', '1px solid red');
            jQuery('.right-cyl').addClass('prescription-error');
            jQuery('.left-axis').css('border', '1px solid red');
            jQuery('.left-cyl').addClass('prescription-error');
            jQuery('#cover-spin').hide(0);
            jQuery('.prescription-btn').text('Next');
            jQuery('.prescription-btn').attr('disabled', false);
            if (right_axis !== '0') {
                jQuery('.right-axis').css('border', '1px solid #d6d6d6');
                jQuery('.right-cyl').removeClass('prescription-error');
            }
            if (left_axis !== '0') {
                jQuery('.left-axis').css('border', '1px solid #d6d6d6');
                jQuery('.left-cyl').removeClass('prescription-error');
            }
            return false;
        } else if (right_cyl !== '0.00' && right_axis === '0') {
            jQuery('.right-axis').css('border', '1px solid red');
            jQuery('.right-cyl').addClass('prescription-error');
            jQuery('#cover-spin').hide(0);
            jQuery('.prescription-btn').text('Next');
            jQuery('.prescription-btn').attr('disabled', false);
            return false;
        } else if (left_cyl !== '0.00' && left_axis === '0') {
            jQuery('.left-axis').css('border', '1px solid red');
            jQuery('.left-cyl').addClass('prescription-error');
            jQuery('#cover-spin').hide(0);
            jQuery('.prescription-btn').text('Next');
            jQuery('.prescription-btn').attr('disabled', false);
            return false;
        } else {
            jQuery('.right-axis').css('border', '1px solid #d6d6d6');
            jQuery('.right-cyl').removeClass('prescription-error');
            jQuery('.left-axis').css('border', '1px solid #d6d6d6');
            jQuery('.left-cyl').removeClass('prescription-error');
            jQuery.ajax({
                type: "post",
                url: ajax_url,
                data: data,
                success: function (response) {
                    location.href = baseUrl + '/lens-thinkness';
                },
                error: function (response) {
                    jQuery('#cover-spin').hide(0);
                }
            });
        }
    });
});

function selectLensType(lense_id, lense_name, product_id) {
    jQuery('#cover-spin').show(0);
    var ajax_url = baseUrl + '/wp-content/themes/flatsome-child/ajax/update_product_lens.php';
    jQuery.ajax({
        type: "post",
        url: ajax_url,
        data: { lense_id: lense_id, lense_name: lense_name, product_id: product_id },
        success: function (response) {
            location.href = baseUrl + '/lens-prescription';
        },
        error: function (response) {
            jQuery('#cover-spin').hide(0);
        }
    });
}

function selectLensUsage(lens_id, lens_name) {
    jQuery('#cover-spin').show(0);
    var ajax_url = baseUrl + '/wp-content/themes/flatsome-child/ajax/update_lens_usage.php';
    jQuery.ajax({
        type: "post",
        url: ajax_url,
        data: { lens_id: lens_id, lens_name: lens_name },
        success: function (response) {
            location.href = baseUrl + '/lens-usage';
        },
        error: function (response) {
            jQuery('#cover-spin').hide(0);
        }
    });
}

function addItemToCart(variation_id) {
    jQuery('#cover-spin').show(0);
    var ajax_url = baseUrl + '/wp-content/themes/flatsome-child/ajax/custom-add-to-cart.php';
    jQuery.ajax({
        type: "post",
        url: ajax_url,
        data: { variation_id: variation_id },
        success: function (response) {
            location.href = baseUrl + '/cart';
        },
        error: function (response) {
            jQuery('#cover-spin').hide(0);
        }
    });
}

function showHidePopup(cartItemID) {
    jQuery('#' + cartItemID).slideToggle('slow');
}

function getConfirmationPopup(term_id, usage) {
    var ajax_url = baseUrl + '/wp-content/themes/flatsome-child/ajax/open-confirmation-popup.php';
    var modal = document.getElementById("myModal");
    jQuery('#cover-spin').show(0);
    jQuery.ajax({
        type: "post",
        url: ajax_url,
        data: { term_id: term_id, usage: usage },
        success: function (response) {
            jQuery('#cover-spin').hide(0);
            jQuery('.modal-body').html(response);
            modal.style.display = "block";
            //location.href = baseUrl + '/cart';
        },
        error: function (response) {
            jQuery('#cover-spin').hide(0);
        }
    });
}

jQuery(document).ready(function () {
    jQuery('.xt_woovs-swatches-wrap table.variations tr td').each(function () {
        $this = jQuery(this);
        $label_thinkness = jQuery('label[for="pa_lens-thinkness"]');
        $label_lens_type = jQuery('label[for="pa_lens-type"]');
        $label_lens_usage = jQuery('label[for="pa_lens-usage"]');

        if ($label_thinkness.length > 0) {
            //this input has a label associated with it, lets do something!
            jQuery($label_thinkness).closest("tr").remove();
        }
        if ($label_lens_type.length > 0) {
            //this input has a label associated with it, lets do something!
            jQuery($label_lens_type).closest("tr").remove();
        }
        if ($label_lens_usage.length > 0) {
            //this input has a label associated with it, lets do something!
            jQuery($label_lens_usage).closest("tr").remove();
        }
    });
});