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
$html = '
<td colspan="6" class="actions clear">
    <div class="variation variation-popup">
        <div class="dropdown-details nested-prescription__details" id=""
             style="display: none;">
            <div class="row collapse nested-prescription__table co-prescription-table">
                <div class="small-4 small-medium-4 medium-12 columns co-param-col">
                    <span class="co-prod-param co-param-row-label co-param-col-label empty-col">&nbsp;</span>
                    <!--<DynamicAttributeDisplay>-->
                    <span class="co-prod-param co-param-label co-param-col-label">SPH</span>
                    <span class="co-prod-param co-param-label co-param-col-label">CYL</span>
                    <span class="co-prod-param co-param-label co-param-col-label">AXIS</span>
                    <span class="co-prod-param co-param-label co-param-col-label">ADD</span>
                    <span class="co-prod-param co-param-label co-param-col-label">PD</span>
                </div>
                <div class="small-4 small-medium-4 medium-12 columns co-param-col">
                                                    <span class="co-prod-param co-param-row-label"
                                                          data-clyauto-prop="label">OD (Right)</span>
                    <span class="co-prod-param co-prod-param-value"
                          data-clyauto-prop="glassesSphere">'.$right_sph.'</span>
                    <span class="co-prod-param co-prod-param-value"
                          data-clyauto-prop="glassesCylinder">'.$right_cyl.'</span>
                    <span class="co-prod-param co-prod-param-value"
                          data-clyauto-prop="glassesAxis">'.$right_axis.'</span>
                    <span class="co-prod-param co-prod-param-value"
                          data-clyauto-prop="glassesAdd">'.$right_add.'</span>
                    <span class="co-prod-param co-prod-param-value '.$pd_two.'"
                          data-clyauto-prop="glassesMonoPD">'.$pd_one.'</span>
                </div>
                <div class="small-4 small-medium-4 medium-12 columns co-param-col">
                                                    <span class="co-prod-param co-param-row-label"
                                                          data-clyauto-prop="label">OS (Left)</span>
                    <span class="co-prod-param co-prod-param-value"
                          data-clyauto-prop="glassesSphere">'.$left_sph.'</span>
                    <span class="co-prod-param co-prod-param-value"
                          data-clyauto-prop="glassesCylinder">'.$left_cyl.'</span>
                    <span class="co-prod-param co-prod-param-value"
                          data-clyauto-prop="glassesAxis">'.$left_axis.'</span>
                    <span class="co-prod-param co-prod-param-value"
                          data-clyauto-prop="glassesAdd">'.$left_add.'</span>
                    <span class="co-prod-param co-prod-param-value"
                          data-clyauto-prop="glassesMonoPD">'.$pd_two.'</span>
                </div>
            </div>
        </div>
    </div>
</td>';
return $html;