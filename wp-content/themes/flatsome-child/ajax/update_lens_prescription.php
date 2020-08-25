<?php
include('../../../../wp-load.php');
$_SESSION['right-sph'] = $_POST['right_sph'];
$_SESSION['right_cyl'] = $_POST['right_cyl'];
$_SESSION['right_axis'] = $_POST['right_axis'];
$_SESSION['right_add'] = $_POST['right_add'];
$_SESSION['left_sph'] = $_POST['left_sph'];
$_SESSION['left_cyl'] = $_POST['left_cyl'];
$_SESSION['left_axis'] = $_POST['left_axis'];
$_SESSION['left_add'] = $_POST['left_add'];
$pd_two_display = $_POST['pd_two_display'];
if ($pd_two_display != 'none') {
    $_SESSION['pd_two_select'] = $_POST['dual_pd_two_select'];
    $_SESSION['pd_one_select'] = $_POST['dual_pd_one_select'];
} else {
    unset($_SESSION['pd_two_select']);
    $_SESSION['pd_one_select'] = $_POST['pd_one_select'];
}
echo 'success';
die();