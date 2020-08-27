<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>
<div class="shop-banner">
	 <img src="<?php echo site_url().'/wp-content/themes/flatsome-child/images/banner.svg' ?>">
</div>
<div class="filter-block">
<?php 
echo do_shortcode('[br_filters_group group_id=555]');
?>
</div>
<div class="information-block">
	<h1>Information</h1>
	<div class="d-flex">
		<div>
			<div class="mb-2 d-inline">
				<div class="w-120">Modal Code</div>
				<div><strong>G3239V</strong></div>
			</div>
			<div class="mb-2 d-inline">
				<div class="w-120">Frame Shape</div>
				<div><strong>Round</strong></div>
			</div>
			<div class="d-inline">
				<div class="w-120">Front Color</div>
				<div><strong>Rose</strong></div>
			</div>
		</div>
		<div>
			<div class="mb-2 d-inline">
				<div class="w-120">Fitting</div>
				<div><strong>Standard</strong></div>
			</div>
			<div class="d-inline">
				<div class="w-120">Frame Material</div>
				<div><strong>Acetate</strong></div>
			</div>
		</div>
	</div>
</div>
<?php
// Add Custom Shop Content if set
if(is_shop() && flatsome_option('html_shop_page_content') && ! $wp_query->is_search() && $wp_query->query_vars['paged'] < 1 ){
   	echo do_shortcode('<div class="shop-page-content">'.flatsome_option('html_shop_page_content').'</div>');
} else {
	wc_get_template_part( 'layouts/category', flatsome_option( 'category_sidebar' ) );
}

get_footer( 'shop' );
