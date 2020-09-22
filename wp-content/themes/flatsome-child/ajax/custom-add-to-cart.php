<?php
include('../../../../wp-load.php');
global $woocommerce;
$quantity = 1;
$product = $_SESSION['custom-product-id'];
$variation = $_POST['variation_id'];
$data = array(
    'Lens Thickness' => $_SESSION['custom-lens-thickness-name'],
    'Lens Name' => $_SESSION['custom-lens-name'],
    'Lens Usage' => $_SESSION['custom-lens-usage-name'],
    'Right SPH' => $_SESSION['right-sph'],
    'Right CYL' => $_SESSION['right_cyl'],
    'Right AXIS' => $_SESSION['right_axis'],
    'Right ADD' => $_SESSION['right_add'],
    'Left SPH' => $_SESSION['left_sph'],
    'Left CYL' => $_SESSION['left_cyl'],
    'Left AXIS' => $_SESSION['left_axis'],
    'Left ADD' => $_SESSION['left_add'],
    'PD One' => $_SESSION['pd_one_select'],
    'PD Two' => $_SESSION['pd_two_select']

);
$woocommerce->cart->add_to_cart($product, $quantity, $variation, $data);
unset($_SESSION['custom-lens-id']);
unset($_SESSION['custom-lens-name']);
unset($_SESSION['custom-product-id']);
unset($_SESSION['right-sph']);
unset($_SESSION['right_cyl']);
unset($_SESSION['right_axis']);
unset($_SESSION['right_add']);
unset($_SESSION['left_sph']);
unset($_SESSION['left_cyl']);
unset($_SESSION['left_axis']);
unset($_SESSION['left_add']);
unset($_SESSION['pd_one_select']);
unset($_SESSION['pd_two_select']);
unset($_SESSION['custom-lens-usage-id']);
unset($_SESSION['custom-lens-usage-name']);
unset($_SESSION['thickness_name']);
unset($_SESSION['thickness_term_id']);
unset($_SESSION['custom-lens-thickness-name']);
unset($_SESSION['frame_price']);
echo 'success';
die();