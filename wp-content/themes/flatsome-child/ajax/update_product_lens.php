<?php
include('../../../../wp-load.php');
$lens_id = $_POST['lense_id'];
$lens_name = $_POST['lense_name'];
$product_id = $_POST['product_id'];
$_SESSION['custom-lens-id'] = $lens_id;
$_SESSION['custom-lens-name'] = $lens_name;
$_SESSION['custom-product-id'] = $product_id;
echo 'success';
die();