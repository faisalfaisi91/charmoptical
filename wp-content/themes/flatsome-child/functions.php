<?php
// Add custom Theme Functions here


add_action('init', 'myStartSession', 1);
function myStartSession()
{
    if (!session_id()) {
        session_start();
    }
}

// Load Custom scripts

add_action('init', 'script_enqueuer');
function script_enqueuer()
{

    // Register the JS file with a unique handle, file location, and an array of dependencies
    wp_register_script("custom-script", get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'));

    // localize the script to your domain name, so that you can reference the url to admin-ajax.php file easily
    wp_localize_script('custom-script', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));

    // enqueue jQuery library and the script you registered above
    wp_enqueue_script('jquery');
    wp_enqueue_script('custom-script');
}

function style_enqueuer()
{
    // enqueue parent styles
    wp_enqueue_style('child-theme', get_stylesheet_directory_uri() . '/css/custom.css');
}

add_action('wp_enqueue_scripts', 'style_enqueuer');

// Update quantity on product page and redirect user to customizer page
add_action("wp_ajax_update_product_qty", "update_product_qty");

function update_product_qty()
{
    session_start();
    $qty = $_POST['qty'];
    $_SESSION['product_qty'] = $qty;
    die();
}

add_action("wp_ajax_update_product_lens", "update_product_lens");
function update_product_lens()
{
    $lens_id = $_POST['lense_id'];
    $lens_name = $_POST['lense_name'];
    $product_id = $_POST['product_id'];
    $_SESSION['custom-lens-id'] = $lens_id;
    $_SESSION['custom-lens-name'] = $lens_name;
    $_SESSION['custom-product-id'] = $product_id;
    echo 'success';
    die();
}

remove_filter('the_content', 'wpautop');

//function custom_remove_all_quantity_fields( $return, $product ) {return true;}
//add_filter( 'woocommerce_is_sold_individually','custom_remove_all_quantity_fields', 10, 2 );

function custom_formatted_cart_item_data($cart_item, $flat = false)
{
    $item_data = array();

    // Variation values are shown only if they are not found in the title as of 3.0.
    // This is because variation titles display the attributes.
    if ($cart_item['data']->is_type('variation') && is_array($cart_item['variation'])) {
        foreach ($cart_item['variation'] as $name => $value) {
            $taxonomy = wc_attribute_taxonomy_name(str_replace('attribute_pa_', '', urldecode($name)));

            if (taxonomy_exists($taxonomy)) {
                // If this is a term slug, get the term's nice name.
                $term = get_term_by('slug', $value, $taxonomy);
                if (!is_wp_error($term) && $term && $term->name) {
                    $value = $term->name;
                }
                $label = wc_attribute_label($taxonomy);
            } else {
                // If this is a custom option slug, get the options name.
                $value = apply_filters('woocommerce_variation_option_name', $value, null, $taxonomy, $cart_item['data']);
                $label = wc_attribute_label(str_replace('attribute_', '', $name), $cart_item['data']);
            }

            // Check the nicename against the title.
            if ('' === $value || wc_is_attribute_in_product_name($value, $cart_item['data']->get_name())) {
                continue;
            }

            $item_data[] = array(
                'key' => $label,
                'value' => $value,
            );
        }
    }

    // Filter item data to allow 3rd parties to add more to the array.
    $item_data = apply_filters('woocommerce_get_item_data', $item_data, $cart_item);

    // Format item data ready to display.
    foreach ($item_data as $key => $data) {
        // Set hidden to true to not display meta on cart.
        if (!empty($data['hidden'])) {
            unset($item_data[$key]);
            continue;
        }
        if ($data['key'] == 'Lens Name') {
            unset($item_data[$key]);
            continue;
        }
        if ($data['key'] == 'Lens Usage') {
            unset($item_data[$key]);
            continue;
        }
        $item_data[$key]['key'] = !empty($data['key']) ? $data['key'] : $data['name'];
        $item_data[$key]['display'] = !empty($data['display']) ? $data['display'] : $data['value'];
    }

    return $item_data;
}

function custom_wc_get_formatted_cart_item_data($cart_item, $flat = false)
{
    $item_data = array();

    // Variation values are shown only if they are not found in the title as of 3.0.
    // This is because variation titles display the attributes.
    if ($cart_item['data']->is_type('variation') && is_array($cart_item['variation'])) {
        foreach ($cart_item['variation'] as $name => $value) {
            $taxonomy = wc_attribute_taxonomy_name(str_replace('attribute_pa_', '', urldecode($name)));

            if (taxonomy_exists($taxonomy)) {
                // If this is a term slug, get the term's nice name.
                $term = get_term_by('slug', $value, $taxonomy);
                if (!is_wp_error($term) && $term && $term->name) {
                    $value = $term->name;
                }
                $label = wc_attribute_label($taxonomy);
            } else {
                // If this is a custom option slug, get the options name.
                $value = apply_filters('woocommerce_variation_option_name', $value, null, $taxonomy, $cart_item['data']);
                $label = wc_attribute_label(str_replace('attribute_', '', $name), $cart_item['data']);
            }

            // Check the nicename against the title.
            if ('' === $value || wc_is_attribute_in_product_name($value, $cart_item['data']->get_name())) {
                continue;
            }

            $item_data[] = array(
                'key' => $label,
                'value' => $value,
            );
        }
    }

    // Filter item data to allow 3rd parties to add more to the array.
    $item_data = apply_filters('woocommerce_get_item_data', $item_data, $cart_item);

    // Format item data ready to display.
    foreach ($item_data as $key => $data) {
        // Set hidden to true to not display meta on cart.
        if (!empty($data['hidden'])) {
            unset($item_data[$key]);
            continue;
        }
        $item_data[$key]['key'] = !empty($data['key']) ? $data['key'] : $data['name'];
        $item_data[$key]['display'] = !empty($data['display']) ? $data['display'] : $data['value'];
    }

    // Output flat or in list format.
    if (count($item_data) > 0) {
        ob_start();

        if ($flat) {
            foreach ($item_data as $data) {
                echo esc_html($data['key']) . ': ' . wp_kses_post($data['display']) . "\n";
            }
        } else {
            wc_get_template('cart/cart-item-data.php', array('item_data' => $item_data, 'cart_item_key' => $cart_item));
        }

        return ob_get_clean();
    }

    return '';
}

// Remove the additional information tab
function woo_remove_product_tabs($tabs)
{
    unset( $tabs['description'] );          // Remove the description tab
    unset( $tabs['reviews'] );          // Remove the reviews tab
    unset( $tabs['additional_information'] );   // Remove the additional information tab
    return $tabs;
}

add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);

function find_variation_id_by_term_id($product_id, $attributes)
{
    $product_data_store = new WC_Product_Data_Store_CPT();
    $product = new WC_Product($product_id);

    return $product_data_store->find_matching_product_variation($product, $attributes);
}

add_action('woocommerce_add_order_item_meta', 'wdm_add_values_to_order_item_meta', 1, 2);
if (!function_exists('wdm_add_values_to_order_item_meta')) {
    function wdm_add_values_to_order_item_meta($item_id, $values)
    {
        global $woocommerce, $wpdb;
        $user_custom_values = $_SESSION['localpickup'];
        if (!empty($user_custom_values)) {
            wc_add_order_item_meta($item_id, 'Local Pickup', $user_custom_values);
        }
    }
}

add_action('woocommerce_before_cart_item_quantity_zero', 'wdm_remove_user_custom_data_options_from_cart', 1, 1);
if (!function_exists('wdm_remove_user_custom_data_options_from_cart')) {
    function wdm_remove_user_custom_data_options_from_cart($cart_item_key)
    {
        global $woocommerce;
        // Get cart
        $cart = $woocommerce->cart->get_cart();
        // For each item in cart, if item is upsell of deleted product, delete it
        foreach ($cart as $key => $values) {
            if ($_SESSION['user_localpickup'] == $cart_item_key)
                unset($woocommerce->cart->cart_contents[$key]);
        }
    }
}
/**
* Change text strings
*
* @link http://codex.wordpress.org/Plugin_API/Filter_Reference/gettext
*/
function custom_related_products_text( $translated_text, $text, $domain ) {
  switch ( $translated_text ) {
    case 'Related products' :
      $translated_text = __( 'Other items you might like', 'woocommerce' );
      break;
  }
  return $translated_text;
}
add_filter( 'gettext', 'custom_related_products_text', 20, 3 );

/**
 * Moving the payments
 */
add_action( 'woocommerce_checkout_shipping', 'my_custom_display_payments', 20 );

/**
 * Displaying the Payment Gateways 
 */
function my_custom_display_payments() {
  if ( WC()->cart->needs_payment() ) {
    $available_gateways = WC()->payment_gateways()->get_available_payment_gateways();
    WC()->payment_gateways()->set_current_gateway( $available_gateways );
  } else {
    $available_gateways = array();
  }
  ?>
<div id="payment">
    <div class="order-steps">
        <p>3</p>
    </div>
    <h3><?php esc_html_e( 'Payment', 'woocommerce' ); ?></h3>
    <?php if ( WC()->cart->needs_payment() ) : ?>
    <ul class="wc_payment_methods payment_methods methods">
<?php
    if ( ! empty( $available_gateways ) ) {
      foreach ( $available_gateways as $gateway ) {
        wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
      }
    } else {
      echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ) . '</li>'; // @codingStandardsIgnoreLine
    }
    ?>
    </ul>
    <?php endif; ?>
</div>
<?php
}

/**
 * Adding the payment fragment to the WC order review AJAX response
 */
add_filter( 'woocommerce_update_order_review_fragments', 'my_custom_payment_fragment' );

/**
 * Adding our payment gateways to the fragment #checkout_payments so that this HTML is replaced with the updated one.
 */
function my_custom_payment_fragment( $fragments ) {
	ob_start();

	my_custom_display_payments();

	$html = ob_get_clean();

	$fragments['#checkout_payments'] = $html;

	return $fragments;
}
add_action( 'woocommerce_after_add_to_cart_button', 'add_content_after_addtocart_button_func' );

function add_content_after_addtocart_button_func() {
global $product;
$product_details = $product->get_data();
$product_full_description = $product_details['description'];

// Echo content.
echo '<div class="second_content">'.$product_full_description.'</div>';
}
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
add_filter( 'woocommerce_checkout_fields' , 'override_billing_checkout_fields', 20, 1 );
function override_billing_checkout_fields( $fields ) {
    $fields['billing']['billing_country']['label'] = '';
    $fields['billing']['billing_address_1']['label'] = '';
    $fields['billing']['billing_state']['label'] = '';
    $fields['billing']['billing_email']['label'] = '';
    $fields['billing']['billing_email']['placeholder'] = 'Email Address';
    $fields['billing']['billing_first_name']['label'] = '';
    $fields['billing']['billing_first_name']['placeholder'] = 'First Name';
    $fields['billing']['billing_last_name']['label'] = '';
    $fields['billing']['billing_last_name']['placeholder'] = 'Last Name';
    $fields['billing']['billing_city']['label'] = '';
    $fields['billing']['billing_city']['placeholder'] = 'Town/City';
    $fields['billing']['billing_postcode']['label'] = '';
    $fields['billing']['billing_postcode']['placeholder'] = 'Postcode/ZIP';
    $fields['billing']['billing_phone']['label'] = '';
    $fields['billing']['billing_phone']['placeholder'] = 'Phone';


    // Shipping fields
    $fields['shipping']['shipping_country']['label'] = '';
    $fields['shipping']['shipping_address_1']['label'] = '';
    $fields['shipping']['shipping_state']['label'] = '';
    $fields['shipping']['shipping_email']['label'] = '';
    $fields['shipping']['shipping_email']['placeholder'] = 'Email Address';
    $fields['shipping']['shipping_first_name']['label'] = '';
    $fields['shipping']['shipping_first_name']['placeholder'] = 'First Name';
    $fields['shipping']['shipping_last_name']['label'] = '';
    $fields['shipping']['shipping_last_name']['placeholder'] = 'Last Name';
    $fields['shipping']['shipping_city']['label'] = '';
    $fields['shipping']['shipping_city']['placeholder'] = 'Town/City';
    $fields['shipping']['shipping_postcode']['label'] = '';
    $fields['shipping']['shipping_postcode']['placeholder'] = 'Postcode/ZIP';
    $fields['shipping']['shipping_phone']['label'] = '';
    $fields['shipping']['shipping_phone']['placeholder'] = 'Phone';
    return $fields;
}
add_filter( 'woocommerce_cart_shipping_method_full_label', 'remove_shipping_label', 10, 2 );

function remove_shipping_label( $label, $method ) {
    $new_label = preg_replace( '/^.+:/', '', $label );

    return $new_label;
}

function orderPrescriptionTable($item_data) {
    $right_sph = '';
    $right_cyl = '';
    $right_axis = '';
    $right_add = '';
    $left_sph = '';
    $left_cyl = '';
    $left_axis = '';
    $left_add = '';
    $pd_one = '';
    $pd_two = '';
    foreach($item_data as $data) {
        if ($data->key == 'Right SPH') {
            $right_sph = $data->value;
        }
        if ($data->key == 'Right CYL') {
            $right_cyl = $data->value;
        }
        if ($data->key == 'Right AXIS') {
            $right_axis = $data->value;
        }
        if ($data->key == 'Right ADD') {
            $right_add = $data->value;
        }
        if ($data->key == 'Left SPH') {
            $left_sph = $data->value;
        }
        if ($data->key == 'Left CYL') {
            $left_cyl = $data->value;
        }
        if ($data->key == 'Left AXIS') {
            $left_axis = $data->value;
        }
        if ($data->key == 'Left ADD') {
            $left_add = $data->value;
        }
        if ($data->key == 'PD One') {
            $pd_one = $data->value;
        }
        if ($data->key == 'PD Two') {
            $pd_two = $data->value;
        }
    }
    ?>
    <table>
        <tbody>
        <tr>
            <th></th>
            <th>SPH</th>
            <th>CYL</th>
            <th>AXIS</th>
            <th>ADD</th>
            <th>PD</th>
        </tr>
        <tr>
            <td>OD Right</td>
            <td><?php echo $right_sph ?></td>
            <td><?php echo $right_cyl ?></td>
            <td><?php echo $right_axis ?></td>
            <td><?php echo $right_add ?></td>
            <td><?php echo $pd_one ?></td>
        </tr>
        <tr>
            <td>OS Left</td>
            <td><?php echo $left_sph ?></td>
            <td><?php echo $left_cyl ?></td>
            <td><?php echo $left_axis ?></td>
            <td><?php echo $left_add ?></td>
            <td><?php echo $pd_two ?></td>
        </tr>
        </tbody>
    </table>
<?php
}