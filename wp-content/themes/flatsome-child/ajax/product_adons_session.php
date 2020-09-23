<?php
include('../../../../wp-load.php');
$frame_value = $_POST['frame_value'];
$color = $_POST['color_chosen'];
$_SESSION['frame_price'] = $frame_value;
$_SESSION['color'] = $color;
die();
?>