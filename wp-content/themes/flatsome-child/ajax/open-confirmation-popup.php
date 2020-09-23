<?php
include('../../../../wp-load.php');
$usage_id = $_POST['term_id'];
$usage = $_POST['usage'];
$thickness_id = $_SESSION['custom-lens-thickness-id'];
$thickness_name = $_SESSION['custom-lens-thickness-name'];
$lens_type = $_SESSION['custom-lens-name'];
$right_sph = $_SESSION['right-sph'];
$right_cyl = $_SESSION['right_cyl'];
$right_axis = $_SESSION['right_axis'];
$right_add = $_SESSION['right_add'];
$left_sph = $_SESSION['left_sph'];
$left_cyl = $_SESSION['left_cyl'];
$left_axis = $_SESSION['left_axis'];
$left_add = $_SESSION['left_add'];
$pd_one = $_SESSION['pd_one_select'];
$pd_two = $_SESSION['pd_two_select'];
$_SESSION['custom-lens-usage_id'] = $usage_id;
$_SESSION['custom-lens-usage-name'] = $usage;
$frame_price = $_SESSION['frame_price'];
$product = wc_get_product( $_SESSION['custom-product-id'] );
$product_image = get_the_post_thumbnail_url($_SESSION['custom-product-id']);
$total = '';
if (!empty($_SESSION['frame_price'])) {
    $total = $_SESSION['frame_price'];
}
if (!empty($_SESSION['custom-lens-name'])) {
    $term = get_term_meta($_SESSION['custom-lens-id'], 'lens_price');
    $lens_type_price = explode("$",$term[0]);
    $total += $lens_type_price[1];
}
if (!empty($usage)) {
    $term = get_term_meta($usage_id, 'lens_price');
    $usage_price = $term[0];
    $total += $term[0];
}
if (!empty($_SESSION['custom-lens-thickness-name'])) {
    $term = get_term_meta($_SESSION['custom-lens-thickness-id'], 'lens_price');
    $thinkness_total = $term[0];
    $total += $thinkness_total;
}
$array = [
    'attribute_pa_lens-thinkness' => $thickness_name,
    'attribute_pa_lens-type' => $lens_type,
    'attribute_pa_lens-usage' => $usage,
];
$variation_id = find_variation_id_by_term_id($_SESSION['custom-product-id'], $array);
$html = '';
$html .= '<input type="hidden" value="'.$variation_id.'"> <h5>Please review your selections below to make sure everything is correct before
                                    adding to cart!</h5>
                                <div class="modal-info">
                                    <div class="row">
                                        <div class="col medium-6"> 
                                            <img src="'.$product_image.'"/>                                        
                                        </div>
                                        <div class="col medium-6 frame-lens-details">
                                            <p><label>Frame:</label><span>'. $product->get_title() .'</span> <span class="lens-type-price">$'.$_SESSION['frame_price'].'</span></p>
                                            <p><label>Color:</label><span>'.$_SESSION['color'].'</span></p>
                                            <p><label>Lens Type:</label> <span>'.str_replace("-"," ",ucwords($lens_type)).'</span><span class="lens-type-price">$'.$lens_type_price[1].'</span></p>
                                            <p>
                                            <label>Lens Usage:</label> <span>'.str_replace("-"," ",ucwords($usage)).'</span><span class="lens-type-price">$'.$usage_price.'</span></p>
                                            <p>
                                            <label>Lens Thickness:</label> <span>'.str_replace("-"," ", ucwords($thickness_name)).'</span><span class="lens-type-price">$'.$thinkness_total.'</span></p>
                                            <hr>
                                            <span class="lens-type-price"><strong>Total: '.get_woocommerce_currency_symbol() . $total.'</strong></span>
                                        </div>
                                    </div>
                                <hr>
                                <div class="lens-prescription-info">
                                <div class="row">
                                <div class="col medium-6"><h4>Lens Prescription Details:</h4></div>
                                <div class="col medium-6"><a class="lens-type-price prescription-edit-btn" href="'.site_url().'/lens-prescription">Edit Prescription</a></div>                               
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
                                                <td>'.$right_sph.'</td>
                                                <td>'.$right_cyl.'</td>
                                                <td>'.$right_axis.'</td>
                                                <td>'.$right_add.'</td>
                                                <td>'.$pd_one.'</td>
                                            </tr>
                                            <tr>
                                                <td>OS Left</td>
                                                <td>'.$left_sph.'</td>
                                                <td>'.$left_cyl.'</td>
                                                <td>'.$left_axis.'</td>
                                                <td>'.$left_add.'</td>
                                                <td>'.$pd_two.'</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="buttons lens-cart-btn">
                                    <a href="javascript:;" onclick="addItemToCart('.$variation_id.')">
                                        <button class="b2 prescription-btn">Add to Cart</button>
                                    </a>
                                </div>';
echo $html;
die();
