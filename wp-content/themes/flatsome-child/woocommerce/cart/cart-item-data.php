<?php
/**
 * Cart item data (when outputting non-flat)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-item-data.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     2.4.0
 */
if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="variation">
    <?php foreach ($item_data as $data) : ?>
        <?php if (($data['key'] != 'Right SPH') && ($data['key'] != 'Right CYL') && ($data['key'] != 'Right AXIS') && ($data['key'] != 'Right ADD') && ($data['key'] != 'Left SPH') && ($data['key'] != 'Left CYL') && ($data['key'] != 'Left AXIS') && ($data['key'] != 'Left ADD') && ($data['key'] != 'PD One') && ($data['key'] != 'PD Two') && ($data['key'] != 'Lens Name')) { ?>
            <p class="variation-<?php echo sanitize_html_class($data['key']); ?>">
                <!--                    <strong>--><?php //echo wp_kses_post($data['key']); ?><!--:</strong>-->
                <span><?php echo wp_kses_post(wpautop($data['display'])); ?>
            </p>
        <?php } ?>
    <?php endforeach; ?>
    <?php if (is_cart()) { ?>
        <div class="row-prescription">
            <div class="dropdown-trigger no-padding-top nested-prescription__trigger-panel"
                 data-clyauto-prop="trigger-dropdown">
                <span class="nested-prescription__title" onclick="showHidePopup('<?php echo $cart_item_key['key'] ?>')">View prescription</span>
            </div>
        </div>
    <?php } ?>
</div>