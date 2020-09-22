<?php
$right_sph = '';
$right_cyl = '';
$right_axis = '';
$right_add = '';
$left_sph = '';
$left_cyl = '';
$left_axis = '';
$left_add = '';
$pd_one = '';
$pd_two = '';
foreach ($item_data as $data) {
    if ($data['key'] == 'Right SPH') {
        $right_sph = $data['display'];
    }
    if ($data['key'] == 'Right CYL') {
        $right_cyl = $data['display'];
    }
    if ($data['key'] == 'Right AXIS') {
        $right_axis = $data['display'];
    }
    if ($data['key'] == 'Right ADD') {
        $right_add = $data['display'];
    }
    if ($data['key'] == 'Left SPH') {
        $left_sph = $data['display'];
    }
    if ($data['key'] == 'Left CYL') {
        $left_cyl = $data['display'];
    }
    if ($data['key'] == 'Left AXIS') {
        $left_axis = $data['display'];
    }
    if ($data['key'] == 'Left ADD') {
        $left_add = $data['display'];
    }
    if ($data['key'] == 'PD One') {
        $pd_one = $data['display'];
    }
    if ($data['key'] == 'PD Two') {
        $pd_two = $data['display'];
    }
}
?>
<td colspan="6" class="actions clear">
    <div class="variation variation-popup">
        <div class="dropdown-details nested-prescription__details" id="<?php echo $cart_item_key ?>">
        </div>
        <div style="overflow-x:auto;">
            <table>
                <tr>
                    <th></th>
                    <th>SPH</th>
                    <th>CYL</th>
                    <th>AXIS</th>
                    <th>ADD</th>
                    <th>PD</th>
                </tr>
                <tr>
                    <td>OD Right</td>
                    <td><?php echo $right_sph ?></td>
                    <td><?php echo $right_cyl ?></td>
                    <td><?php echo $right_axis ?></td>
                    <td><?php echo $right_add ?></td>
                    <td><?php echo $pd_one ?></td>
                </tr>
                <tr>
                    <td>OS Left</td>
                    <td><?php echo $left_sph ?></td>
                    <td><?php echo $left_cyl ?></td>
                    <td><?php echo $left_axis ?></td>
                    <td><?php echo $left_add ?></td>
                    <td><?php echo $pd_two ?></td>
                </tr>
            </table>
        </div>
    </div>
        </div>
    </div>
</td>