<?php
/*
 * Template Name: Lens Thinkness
*/
if (empty($_SESSION)) {
    wp_redirect(site_url() . '/shop');
}
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
$lens_thinkness = get_terms('pa_lens-thinkness');
$right_sph = abs($_SESSION['right-sph']);
$right_cyl = abs($_SESSION['right_cyl']);
$left_sph = abs($_SESSION['left_sph']);
$left_cyl = abs($_SESSION['left_cyl']);
$right_sph_cyl = $right_sph + $right_cyl;
$left_sph_cyl = $left_sph + $left_cyl;

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
                            <p>Lens Thinkness</p>
                            <span><i class="fa fa-circle"></i></span>
                            <span><i class="fa fa-circle"></i></span>
                            <span class="active"><i class="fa fa-circle"></i></span>
                            <span><i class="fa fa-circle"></i></span>
                        </div>
                    </div>
                    <div id="myModal" class="modal">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <span class="close">&times;</span>
                            </div>
                            <div class="modal-body">
                                <h4>Unfortunately, the prescription you have entered is not available in Basic
                                    Thickness.</h4>
                                <h6>We recommend you to select</h6>
                                <h6>Thin Lenses(1.6)</h6>
                                <h6>Extra Thin(1.67)</h6>
                                <h6>Ultra-Thin(1.74)</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="details">
                            <h2>Choose the Thinkness of your lens </h2>
                        </div>
                    </div>
                    <div class="row product-lenses-block">
                        <div class="col medium-8">
                            <section class="section product-lenses">
                                <div class="section-content relative">
                                    <div class="row align-middle product-row" id="row-809642893">
                                        <?php
                                        foreach ($lens_thinkness as $thinkness) {
                                        $term = get_term_meta($thinkness->term_id, 'lens_price');
                                        if (function_exists('get_wp_term_image'))
                                            {
                                                $meta_image = get_wp_term_image($thinkness->term_id); 
                                            }
                                        if ($thinkness->name == 'Basic Thinkness' && ($right_sph_cyl >= 5 || $left_sph_cyl >= 5)) {
                                        ?>
                                        <div class="col medium-6 small-12 large-6 product-card">
                                            <?php } else { ?>
                                            <div class="col medium-6 small-12 large-6 product-card"
                                                 onclick="selectLensUsage('<?php echo $thinkness->term_id ?>','<?php echo $thinkness->slug ?>')">
                                                <?php } ?>
                                                <?php if ($thinkness->name == 'Basic Thinkness' && ($right_sph_cyl >= 5 || $left_sph_cyl >= 5)) {
                                                    ?>
                                                    <div class="disabled-text">Standard lens unavailable your
                                                        prescription requires lighter, thiner lenses
                                                    </div>
                                                <?php }
                                                if ($thinkness->name == 'Basic Thinkness' && ($right_sph_cyl >= 5 || $left_sph_cyl >= 5)) {
                                                    $basic_thin_disable = 'disabled-inner-card';
                                                } else {
                                                    $basic_thin_disable = '';
                                                }
                                                ?>
                                                <div class="col-inner box-shadow-3 box-shadow-5-hover product-card-inner <?php echo $basic_thin_disable ?>">
                                                <div class="image-block">
                                                        <img src="<?php echo $meta_image; ?>">
                                                </div>
                                                    <h3><?php echo ucwords($thinkness->name); ?></h3>
                                                    <p><?php echo $thinkness->description ?></p>
                                                    <p>
                                                        <strong><?php echo get_woocommerce_currency_symbol() . $term[0] ?></strong>
                                                    </p>
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
        jQuery(document).ready(function () {
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            var right_sph_cyl = '<?php echo $right_sph_cyl ?>';
            var left_sph_cyl = '<?php echo $left_sph_cyl  ?>';
            if (right_sph_cyl >= 5 || left_sph_cyl >= 5) {
                // When the user clicks on <span> (x), close the modal
                modal.style.display = "block";
            }
            span.onclick = function () {
                modal.style.display = "none";
            }
        });
    </script>
<?php
get_footer();