<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

$order = wc_get_order( $order_id ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited

if ( ! $order ) {
	return;
}

$order_items           = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads             = $order->get_downloadable_items();
$show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();

if ( $show_downloads ) {
	wc_get_template(
		'order/order-downloads.php',
		array(
			'downloads'  => $downloads,
			'show_title' => true,
		)
	);
}
?>
<section class="woocommerce-order-details">
	<?php do_action( 'woocommerce_order_details_before_order_table', $order ); ?>
    <div class="basic-info large-10 col-center">
        <h2>Hi <?php echo $order->get_billing_first_name() ?>!</h2>
        <h2>Thanks for your purchase!</h2>
    </div>

    <h2 class="woocommerce-order-details__title"><?php esc_html_e( 'Order Confirmation', 'woocommerce' ); ?></h2>
    <div class="order-info col-center large-10">
        <p class="order-no">Order No.</strong> #<?php echo $order->get_id() ?></p>
        <p class="date"><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
    </div>
    <?php
        if ( $show_customer_details ) {
            wc_get_template( 'order/order-details-customer.php', array( 'order' => $order ) );
        }
    ?>
    <div class="checkout-details-block">
        <h2>Order Summary</h2>
        <?php
        do_action( 'woocommerce_order_details_before_order_table_items', $order );
        $lens_name = '';
        $lens_usage = '';
        foreach ($order_items as $item_id => $item) {
            $product = $item->get_product();
            if ($product && $product->exists() && $item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $item, $item_id)) {
                foreach ($item->get_formatted_meta_data() as $key => $variation) {
                    if ($variation->key == 'Lens Name') {
                        $lens_name = $variation->display_value;
                    }
                    if ($variation->key == 'Lens Usage') {
                        $lens_usage = $variation->display_value;
                    }
                }
                ?>
                <div
                class="order-detail <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $item, $item_id)); ?>">
                <div class="order-detail-img">
                    <?php echo $product->get_image(); ?><?php echo apply_filters('woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf('&times;&nbsp;%s', $item['quantity']) . '</strong>', $item, $item_id); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    ?>
                    <!-- <img src="<?php //echo site_url().'/wp-content/themes/flatsome-child/images/glasses-icon.svg'
                    ?>"> -->
                </div>
                <div class="order-detail-description product-name">
                <h2><?php echo apply_filters('woocommerce_cart_item_name', $product->get_name(), $item, $item_id) . '&nbsp;'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    ?>
                </h2>
                <?php
                if ($lens_name) {
                    ?>
                    <div>
                        <div class="bold-text">Prescription Type</div>
                        <div class="grey-text">
                            <?php echo ucwords(str_replace("-", " ", $lens_name)) ?></div>
                    </div>
                <?php }
                if ($lens_usage) { ?>
                    <div>
                        <div class="bold-text">Lens Usage</div>
                        <div class="grey-text">
                            <?php echo ucwords(str_replace("-", " ", $lens_usage)) ?></div>
                    </div>
                <?php }
                ?>
                <?php echo orderPrescriptionTable($item->get_formatted_meta_data()); ?>
            <?php } ?>
            </div>
            </div>
        <?php } ?>
    </div>
	<table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

<!--		<thead>-->
<!--			<tr>-->
<!--				<th class="woocommerce-table__product-name product-name">--><?php //esc_html_e( 'Product', 'woocommerce' ); ?><!--</th>-->
<!--				<th class="woocommerce-table__product-table product-total">--><?php //esc_html_e( 'Total', 'woocommerce' ); ?><!--</th>-->
<!--			</tr>-->
<!--		</thead>-->
<!---->
<!--		<tbody>-->
<!--			--><?php
//			do_action( 'woocommerce_order_details_before_order_table_items', $order );
//
//			foreach ( $order_items as $item_id => $item ) {
//				$product = $item->get_product();
//
//				wc_get_template(
//					'order/order-details-item.php',
//					array(
//						'order'              => $order,
//						'item_id'            => $item_id,
//						'item'               => $item,
//						'show_purchase_note' => $show_purchase_note,
//						'purchase_note'      => $product ? $product->get_purchase_note() : '',
//						'product'            => $product,
//					)
//				);
//			}
//
//			do_action( 'woocommerce_order_details_after_order_table_items', $order );
//			?>
<!--		</tbody>-->

    </table>
    <div class="total">
        <h2>Total: 200</h2>
    </div>
    <div class="row">
        <div class="order-all-status large-7 col-center">
            <p>We're getting your order ready to be shipped.</p>
            <p>We will notify you when it has been sent.</p>
        </div>
    </div>
    <div class="row">
        <div class="order-status-btn large-7 col-center">
            <a href="<?php echo site_url() ?>/my-account/view-order/<?php echo $order->get_id()?>">View Order Status</a>
        </div>
    </div>
	<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
</section>
