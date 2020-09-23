<?php
$total = '';
global $post;
$post_slug = $post->post_name;
$class = '';
if($post_slug !== 'lens-prescription') {
    $class = 'col medium-4';
} else {
    $class = '';
}
?>
<div class="<?php echo $class; ?>">
    <div class="custom-sidebar">
        <div class="product-details">
            <h4 class="selected-title">You have Selected</h4>
            <hr>
            <div class="product-image">
                <img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>"/>
                <h3><strong><?php echo $product_title ?></strong></h3>
            </div>
            <hr>
            <div class="selected-items">
                <?php if (!empty($_SESSION['frame_price'])) {
                    $total = $_SESSION['frame_price'];
                    ?>
                    <span class="lens-type-name">Frame:</span>
                    <span class="lens-type-price"><?php echo get_woocommerce_currency_symbol() . $_SESSION['frame_price']; ?></span>
                <?php } ?>
                <div class="clearfix"></div>
                <?php
                if($_SESSION['color']) { ?>
                    <span class="lens-type-name">Color:</span>
                    <span class="lens-type-price"><?php echo ucwords(str_replace("","",$_SESSION['color'])); ?></span>
                <?php } ?>
                <div class="clearfix"></div>
                <?php if (!empty($_SESSION['custom-lens-name'])) {
                    $term = get_term_meta($_SESSION['custom-lens-id'], 'lens_price');
                    $explode_price = explode("$",$term[0]);
                    $total += $explode_price[1];
                    ?>
                    <span class="lens-type-name"><?php echo ucwords($_SESSION['custom-lens-name']); ?>:</span>
                    <span class="lens-type-price"><?php echo ucwords($term[0]); ?></span>
                <?php }
                ?>
                <div class="clearfix"></div>
                <?php
                if (!empty($_SESSION['custom-lens-thickness-name'])) {
                    $term = get_term_meta($_SESSION['custom-lens-thickness-id'], 'lens_price');
                    $thinkness_total = $term[0];
                    $total += $thinkness_total;
                    ?>
                    <span class="lens-type-name"><?php echo str_replace("-", " ", ucwords($_SESSION['custom-lens-thickness-name'])); ?>:</span>
                    <span class="lens-type-price"><?php echo get_woocommerce_currency_symbol() . $term[0]; ?></span>
                <?php } ?>
                <div class="clearfix"></div>
                <?php
                if (!empty($_SESSION['custom-lens-usage-name'])) {
                    $term = get_term_meta($_SESSION['custom-lens-usage_id'], 'lens_price');
                    $usage_total = $term[0];
                    $total += $usage_total;
                    ?>
                    <span class="lens-type-name"><?php echo str_replace("-", " ", ucwords($_SESSION['custom-lens-usage-name'])); ?>:</span>
                    <span class="lens-type-price"><?php echo get_woocommerce_currency_symbol() . $term[0]; ?></span>
                <?php } ?>
                <hr>
                <span class="lens-type-price">Total: <?php echo get_woocommerce_currency_symbol() . $total; ?></span>
            </div>
        </div>
    </div>
</div>
