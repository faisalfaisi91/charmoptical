<?php
/*
 * Template Name: Product Customizer
 * @file
 * */
get_header();
global $post;
$slug = $_GET['p'];
$product = get_page_by_path($slug, OBJECT, 'product');
$product = wc_get_product($product);
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
query_posts(array(
    'post_type' => 'lenses',
    'showposts' => -1,
    'orderby' => 'id',
    'order' => 'ASC'
));
$productID = $product->get_ID();
$product_title = $product->get_title();
$product_url = $product->get_permalink();
$lens_types = get_terms('pa_lens-type');
?>
    <div class="shop-container">
        <div id="cover-spin"></div>
        <div class="container">
            <div class="woocommerce-notices-wrapper"></div>
        </div>
        <div id="product-<?php echo $product->get_ID() ?>" <?php fl_woocommerce_version_check('3.4.0') ? wc_product_class($classes, $product) : post_class($classes); ?>>
            <div class="product-container">
                <nav class="woocommerce-breadcrumb breadcrumbs uppercase">
                    <a href="<?php echo site_url() ?>">Home</a>
                    <span class="divider">/</span>
                    <a href="<?php echo $product_url; ?>"><?php echo $product_title ?></a>
                    <span class="divider">/</span>
                    <a href="javascript:;"><?php echo $post->post_title; ?></a>
                </nav>
                <div class="product-main">
                    <div class="container">
                        <div class="sub-heading">
                            <p>Prescription Type</p>
                            <span><i class="fa fa-chevron-left"></i></span>
                            <span class="active"><i class="fa fa-circle"></i></span>
                            <span><i class="fa fa-circle"></i></span>
                            <span><i class="fa fa-circle"></i></span>
                            <span><i class="fa fa-circle"></i></span>
                        </div>
                    </div>
                    <div class="row product-lenses-block">
                        <div class="col medium-8">
                            <section class="section product-lenses">
                                <div class="section-content relative">
                                    <div class="row align-middle product-row" id="row-809642893">
                                        <?php foreach ($lens_types as $type) {                                            
                                            $term = get_term_meta($type->term_id, 'lens_price');
                                            if (function_exists('get_wp_term_image'))
                                                {
                                                    $meta_image = get_wp_term_image($type->term_id); 
                                                    //It will give category/term image url 
                                                }
                                            ?>
                                            <div class="col medium-6 small-12 large-6 product-card"
                                                 onclick="selectLensType('<?php echo $type->term_id ?>','<?php echo $type->slug; ?>','<?php echo $productID; ?>')">
                                                <div class="col-inner box-shadow-3 box-shadow-5-hover product-card-inner">
                                                    <div class="image-block">
                                                        <img src="<?php echo $meta_image; ?>">
                                                    </div>
                                                    <h3><?php echo $type->name; ?></h3>
                                                    <p class="product-detail"><?php echo $type->description; ?></p>
                                                    <p class="product-price"><?php echo $term[0] ?></p>
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
<?php
get_footer();
