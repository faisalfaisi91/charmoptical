<?php
include('../../../../wp-load.php');
if ($_POST['has_active_class'] == 'yes') {
    $_SESSION['localpickup'] = 'Yes';
} else {
    $_SESSION['localpickup'] = '';
}