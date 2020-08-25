<?php
include('../../../../wp-load.php');
$frame_value = $_POST['frame_value'];
$_SESSION['frame_price'] = $frame_value;
die();
?>