<?php
include('../../../../wp-load.php');
$lens_id = $_POST['lens_id'];
$lens_name = $_POST['lens_name'];
$_SESSION['custom-lens-thickness-id'] = $lens_id;
$_SESSION['custom-lens-thickness-name'] = $lens_name;
echo 'success';
die();