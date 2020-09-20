<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get sections instead of tabs if set.
if ( get_theme_mod( 'product_display' ) == 'sections' ) {
	wc_get_template_part( 'single-product/tabs/sections' );

	return;
}

// Get accordion instead of tabs if set.
if ( get_theme_mod( 'product_display' ) == 'accordian' ) {
	wc_get_template_part( 'single-product/tabs/accordian' );

	return;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

$tab_count   = 0;
$panel_count = 0;
/**
 * Custom Information section
 */
?>
<div class="information-block">
	<h1>Information</h1>
	<div class="d-flex">
		<div>
			<div class="mb-2 d-inline">
				<div class="w-120">Model Code</div>
				<div><strong><?php echo get_field('model_code', $product_id); ?></strong></div>
			</div>
			<div class="mb-2 d-inline">
				<div class="w-120">Frame Shape</div>
				<div><strong><?php echo get_field('frame_shape', $product_id); ?></strong></div>
			</div>
			<div class="d-inline">
				<div class="w-120">Front Color</div>
				<div><strong><?php echo get_field('front_color', $product_id); ?></strong></div>
			</div>
		</div>
		<div>
			<div class="mb-2 d-inline">
				<div class="w-120">Fitting</div>
				<div><strong><?php echo get_field('fitting', $product_id); ?></strong></div>
			</div>
			<div class="d-inline">
				<div class="w-120">Frame Material</div>
				<div><strong><?php echo get_field('frame_material', $product_id); ?></strong></div>
			</div>
		</div>
	</div>
</div>
<div class="product-description">
	<div class="product-feature">
		<h3>Product features
			<img src="<?php echo site_url().'/wp-content/themes/flatsome-child/images/arrow-up.svg' ?>">
		</h3>
		<?php echo get_field('product_features', $product_id); ?>
	</div>
	<div class="description">
		<h3>Description
			<img src="<?php echo site_url().'/wp-content/themes/flatsome-child/images/arrow-up.svg' ?>">
		</h3>
		<?php echo get_field('product_description', $product_id); ?>
	</div>
	<div class="lenses">
		<h3>Our lenses
			<img src="<?php echo site_url().'/wp-content/themes/flatsome-child/images/arrow-up.svg' ?>">
		</h3>
			<?php echo get_field('our_lenses', $product_id); ?>
	</div>
</div>
<?php
if ( ! empty( $product_tabs ) ) : ?>

	<div class="woocommerce-tabs wc-tabs-wrapper container tabbed-content">
		<ul class="tabs wc-tabs product-tabs small-nav-collapse <?php flatsome_product_tabs_classes(); ?>" role="tablist">
			<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
				<li class="<?php echo esc_attr( $key ); ?>_tab <?php if ( $tab_count == 0 ) echo 'active'; ?>" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
					<a href="#tab-<?php echo esc_attr( $key ); ?>">
						<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
					</a>
				</li>
				<?php $tab_count++; ?>
			<?php endforeach; ?>
		</ul>
		<div class="tab-panels">
			<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
				<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content <?php if ( $panel_count == 0 ) echo 'active'; ?>" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
					<?php if ( $key == 'description' && ux_builder_is_active() ) echo flatsome_dummy_text(); // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped ?>
					<?php
					if ( isset( $product_tab['callback'] ) ) {
						call_user_func( $product_tab['callback'], $key, $product_tab );
					}
					?>
				</div>
				<?php $panel_count++; ?>
			<?php endforeach; ?>

			<?php do_action( 'woocommerce_product_after_tabs' ); ?>
		</div>
	</div>

<?php endif; ?>
