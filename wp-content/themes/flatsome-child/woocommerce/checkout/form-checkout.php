<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
    exit;
}

$wrapper_classes = array();
$row_classes     = array();
$main_classes    = array();
$sidebar_classes = array();

$layout = get_theme_mod('checkout_layout');

if (!$layout) {
    $sidebar_classes[] = 'has-border';
}

if ($layout == 'simple') {
    $sidebar_classes[] = 'is-well';
}

$wrapper_classes = implode(' ', $wrapper_classes);
$row_classes     = implode(' ', $row_classes);
$main_classes    = implode(' ', $main_classes);
$sidebar_classes = implode(' ', $sidebar_classes);


if (!fl_woocommerce_version_check('3.5.0')) {
    wc_print_notices();
}

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
    echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
    return;
}

// Social login.
if (flatsome_option('facebook_login_checkout') && get_option('woocommerce_enable_myaccount_registration') == 'yes' && !is_user_logged_in()) {
    wc_get_template('checkout/social-login.php');
}
?>

<form name="checkout" method="post" class="checkout woocommerce-checkout <?php echo esc_attr($wrapper_classes); ?>"
    action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

    <div class="row pt-0 <?php echo esc_attr($row_classes); ?>">
        <div class="large-12 col">
            <?php if (get_theme_mod('checkout_sticky_sidebar', 0)) { ?>
            <div class="is-sticky-column">
                <div class="is-sticky-column__inner">
                    <?php } ?>

                    <div class="col-inner">
                        <div class="checkout-sidebar sm-touch-scroll">
                            <div class="order-steps">
                                <p>1</p>
                            </div>
                            <h2 id="order_review_heading"><?php esc_html_e('Your order', 'woocommerce'); ?></h2>

                            <?php do_action('woocommerce_checkout_before_order_review'); ?>
                            <div class="woocommerce-checkout-review-order" id="order_review">
                                <div class="checkout-details-block">
                                    <?php
                                    do_action('woocommerce_review_order_before_cart_contents');
                                    $lens_name = '';
                                    $lens_usage = '';
                                    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                                        $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

                                        if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
                                            foreach ($cart_item['variation'] as $key => $variation) {
                                                if ($key == 'Lens Name') {
                                                    $lens_name = $variation;
                                                }
                                                if ($key == 'Lens Usage') {
                                                    $lens_usage = $variation;
                                                }
                                            }
                                    ?>
                                    <div
                                        class="order-detail <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
                                        <div class="order-detail-img">
                                            <?php echo $_product->get_image(); ?><?php echo apply_filters('woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf('&times;&nbsp;%s', $cart_item['quantity']) . '</strong>', $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                                                                            ?>
                                            <!-- <img src="<?php //echo site_url().'/wp-content/themes/flatsome-child/images/glasses-icon.svg' 
                                                                    ?>"> -->
                                        </div>
                                        <div class="order-detail-description product-name">
                                            <h2><?php echo apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                                        ?>
                                            </h2>
                                            <?php
                                                    if ($lens_name) {
                                                    ?>
                                            <div>
                                                <div class="bold-text">Prescription Type</div>
                                                <div class="grey-text">
                                                    <?php echo ucwords(str_replace("-", " ", $variation)) ?></div>
                                            </div>
                                            <?php }
                                                    if ($lens_usage) { ?>
                                            <div>
                                                <div class="bold-text">Lens Usage</div>
                                                <div class="grey-text">
                                                    <?php echo ucwords(str_replace("-", " ", $variation)) ?></div>
                                            </div>
                                            <?php }
                                                } ?>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <?php do_action('woocommerce_checkout_order_review'); ?>
                            </div>
                            <?php do_action('woocommerce_checkout_after_order_review'); ?>
                        </div>
                    </div>

                    <?php if (get_theme_mod('checkout_sticky_sidebar', 0)) { ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="large-12 col  <?php echo esc_attr($main_classes); ?>">
            <?php if ($checkout->get_checkout_fields()) : ?>

            <?php do_action('woocommerce_checkout_before_customer_details'); ?>

            <div id="customer_details">
                <div class="clear">
                    <?php do_action('woocommerce_checkout_billing'); ?>
                </div>

                <div class="clear">
                    <?php do_action('woocommerce_checkout_shipping'); ?>
                </div>
            </div>

            <?php do_action('woocommerce_checkout_after_customer_details'); ?>

            <?php endif; ?>

        </div>
    </div>
</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>