<?php
/* Template Name: Lens Usage
*/
get_header();
$product = wc_get_product($_SESSION['custom-product-id']);
// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
// Check stock status.
$out_of_stock = !$product->is_in_stock();

// Extra post classes.
$classes = array();
$classes[] = 'product-small';
$classes[] = 'col';
$classes[] = 'has-hover';

if ($out_of_stock) $classes[] = 'out-of-stock';
$productID = $product->get_ID();
$product_title = $product->get_title();
$lens_usage = get_terms('pa_lens-usage');
?>
    <div class="shop-container">
        <div id="cover-spin"></div>
        <div class="container">
            <div class="woocommerce-notices-wrapper"></div>
        </div>
        <div id="product-<?php echo $product->get_ID() ?>" <?php fl_woocommerce_version_check('3.4.0') ? wc_product_class($classes, $product) : post_class($classes); ?>>
            <div class="product-container">
                <div class="product-main">
                    <div class="container">
                        <div class="sub-heading">
                            <p>Lens Usage</p>
                            <span><i class="fa fa-circle"></i></span>
                            <span><i class="fa fa-circle"></i></span>
                            <span><i class="fa fa-circle"></i></span>
                            <span class="active"><i class="fa fa-circle"></i></span>
                        </div>
                    </div>
                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <span class="close">&times;</span>
                            </div>
                            <div class="modal-body">
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="details">
                            <h2>Choose your lens usage </h2>
                            <p>Almost there! Select your lens based on what you would use them for.</p>
                        </div>
                    </div>
                    <div class="row product-lenses-block">
                        <div class="col medium-8">
                            <section class="section product-lenses">
                                <div class="section-content relative">
                                    <div class="row align-middle product-row" id="row-809642893">
                                        <?php
                                        foreach ($lens_usage as $usage) {
                                            $term = get_term_meta($usage->term_id, 'lens_price');
                                            if (function_exists('get_wp_term_image'))
                                            {
                                                $meta_image = get_wp_term_image($usage->term_id); 
                                            }
                                            ?>
                                            <div class="col medium-6 small-12 large-6 product-card"
                                                 onclick="getConfirmationPopup('<?php echo $usage->term_id ?>','<?php echo $usage->slug ?>')">
                                                <div class="col-inner box-shadow-3 box-shadow-5-hover product-card-inner">
                                                    <div class="image-block">
                                                        <img src="<?php echo $meta_image; ?>">
                                                    </div>
                                                    <h3><?php echo $usage->name ?></h3>
                                                    <p><?php echo get_woocommerce_currency_symbol() . $term[0] ?></p>
                                                    <p><?php echo $usage->description; ?></p>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- Custom Sidebar -->
                        <?php include('custom-sidebar.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }
    </script>
<?php
get_footer();