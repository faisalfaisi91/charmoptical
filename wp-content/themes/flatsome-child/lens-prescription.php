<?php
/*
 * Template Name: Lens Prescription
 * @file
 * */
get_header();
global $post;
$product = wc_get_product($_SESSION['custom-product-id']);
// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
// Check stock status.
$out_of_stock = !$product->is_in_stock();

// Extra post classes.
$classes = array();
$classes[] = 'product-small';
$classes[] = 'col';
$classes[] = 'has-hover';

if ($out_of_stock) $classes[] = 'out-of-stock';
query_posts(array(
    'post_type' => 'lenses',
    'showposts' => -1,
    'orderby' => 'id',
    'order' => 'ASC'
));
$productID = $product->get_ID();
$product_title = $product->get_title();
$product_url = $product->get_permalink();
$product_slug = $product->get_slug();
?>
<div class="shop-container">
    <div id="cover-spin"></div>
    <div class="container">
        <div class="woocommerce-notices-wrapper"></div>
    </div>
    <div id="product-<?php echo $product->get_ID() ?>" <?php fl_woocommerce_version_check('3.4.0') ? wc_product_class($classes, $product) : post_class($classes); ?>>
        <div class="Prescription-form">
            <nav class="woocommerce-breadcrumb breadcrumbs uppercase">
                <a href="<?php echo site_url() ?>">Home</a>
                <span class="divider">/</span>
                <a href="<?php echo site_url() . '/product-customizer/?p=' . $product_slug ?>">Product Customizer</a>
                <span class="divider">/</span>
                <a href="javascript:;"><?php echo $post->post_title; ?></a>
            </nav>
            <div class="details">
                <h2>Enter Your Prescription </h2>
                <p>Please enter your prescription details below</p>
            </div>
            <div class="row">
                <div class="col medium-8">
                    <div class="form-container">
                        <!--=================================================COLOUMN TWO==========================================================-->
                        <form class="col-2">
                            <!--=================================================FORM ROW ONE==========================================================-->
                            <div class="row-one">
                                <div class="od-right">
                                    <label class="label-1">OD <br> (Right)</label>
                                    <div class="Label-row">
                                        <label>SPH</label>
                                        <select id="dropdown-one" class="d-one right-sph">
                                            <option value="+8.00">+8.00</option>
                                            <option value="+7.75">+7.75</option>
                                            <option value="+7.50">+7.50</option>
                                            <option value="+7.25">+7.25</option>
                                            <option value="+7.00">+7.00</option>
                                            <option value="+6.75">+6.75</option>
                                            <option value="+6.50">+6.50</option>
                                            <option value="+6.25">+6.25</option>
                                            <option value="+6.00">+6.00</option>
                                            <option value="+5.75">+5.75</option>
                                            <option value="+5.50">+5.50</option>
                                            <option value="+5.25">+5.25</option>
                                            <option value="+5.00">+5.00</option>
                                            <option value="+4.75">+4.75</option>
                                            <option value="+4.50">+4.50</option>
                                            <option value="+4.25">+4.25</option>
                                            <option value="+4.00">+4.00</option>
                                            <option value="+3.75">+3.75</option>
                                            <option value="+3.50">+3.50</option>
                                            <option value="+3.25">+3.25</option>
                                            <option value="+3.00">+3.00</option>
                                            <option value="+2.75">+2.75</option>
                                            <option value="+2.50">+2.50</option>
                                            <option value="+2.25">+2.25</option>
                                            <option value="+2.00">+2.00</option>
                                            <option value="+1.75">+1.75</option>
                                            <option value="+1.50">+1.50</option>
                                            <option value="+1.25">+1.25</option>
                                            <option value="+1.00">+1.00</option>
                                            <option value="+0.75">+0.75</option>
                                            <option value="+0.50">+0.50</option>
                                            <option value="+0.25">+0.25</option>
                                            <option value="0.00" selected>0.00</option>
                                            <option value="-0.25">-0.25</option>
                                            <option value="-0.50">-0.50</option>
                                            <option value="-0.75">-0.75</option>
                                            <option value="-1.00">-1.00</option>
                                            <option value="-1.25">-1.25</option>
                                            <option value="-1.50">-1.50</option>
                                            <option value="-1.75">-1.75</option>
                                            <option value="-2.00">-2.00</option>
                                            <option value="-2.25">-2.25</option>
                                            <option value="-2.50">-2.50</option>
                                            <option value="-2.75">-2.75</option>
                                            <option value="-3.00">-3.00</option>
                                            <option value="-3.25">-3.25</option>
                                            <option value="-3.50">-3.50</option>
                                            <option value="-3.75">-3.75</option>
                                            <option value="-4.00">-4.00</option>
                                            <option value="-4.25">-4.25</option>
                                            <option value="-4.50">-4.50</option>
                                            <option value="-4.75">-4.75</option>
                                            <option value="-5.00">-5.00</option>
                                            <option value="-5.25">-5.25</option>
                                            <option value="-5.50">-5.50</option>
                                            <option value="-5.75">-5.75</option>
                                            <option value="-6.00">-6.00</option>
                                            <option value="-6.25">-6.25</option>
                                            <option value="-6.50">-6.50</option>
                                            <option value="-6.75">-6.75</option>
                                            <option value="-7.00">-7.00</option>
                                            <option value="-7.25">-7.25</option>
                                            <option value="-7.50">-7.50</option>
                                            <option value="-7.75">-7.75</option>
                                            <option value="-8.00">-8.00</option>
                                            <option value="-8.25">-8.25</option>
                                            <option value="-8.50">-8.50</option>
                                            <option value="-8.75">-8.75</option>
                                            <option value="-9.00">-9.00</option>
                                            <option value="-9.25">-9.25</option>
                                            <option value="-9.50">-9.50</option>
                                            <option value="-9.75">-9.75</option>
                                            <option value="-10.00">-10.00</option>
                                            <option value="-10.25">-10.25</option>
                                            <option value="-10.50">-10.50</option>
                                            <option value="-10.75">-10.75</option>
                                            <option value="-11.00">-11.00</option>
                                            <option value="-11.25">-11.25</option>
                                            <option value="-11.50">-11.50</option>
                                            <option value="-11.75">-11.75</option>
                                            <option value="-12.00">-12.00</option>
                                            <option value="-12.25">-12.25</option>
                                            <option value="-12.50">-12.50</option>
                                            <option value="-12.75">-12.75</option>
                                            <option value="-13.00">-13.00</option>
                                            <option value="-13.25">-13.25</option>
                                            <option value="-13.50">-13.50</option>
                                            <option value="-13.75">-13.75</option>
                                            <option value="-14.00">-14.00</option>
                                            <option value="-14.25">-14.25</option>
                                            <option value="-14.50">-14.50</option>
                                            <option value="-14.75">-14.75</option>
                                            <option value="-15.00">-15.00</option>
                                        </select>
                                    </div>
                                    <div class="Label-row">
                                        <label>CYL</label>
                                        <select id="dropdown-one" class="d-two right-cyl">
                                            <option value="+6.00">+6.00</option>
                                            <option value="+5.75">+5.75</option>
                                            <option value="+5.50">+5.50</option>
                                            <option value="+5.25">+5.25</option>
                                            <option value="+5.00">+5.00</option>
                                            <option value="+4.75">+4.75</option>
                                            <option value="+4.50">+4.50</option>
                                            <option value="+4.25">+4.25</option>
                                            <option value="+4.00">+4.00</option>
                                            <option value="+3.75">+3.75</option>
                                            <option value="+3.50">+3.50</option>
                                            <option value="+3.25">+3.25</option>
                                            <option value="+3.00">+3.00</option>
                                            <option value="+2.75">+2.75</option>
                                            <option value="+2.50">+2.50</option>
                                            <option value="+2.25">+2.25</option>
                                            <option value="+2.00">+2.00</option>
                                            <option value="+1.75">+1.75</option>
                                            <option value="+1.50">+1.50</option>
                                            <option value="+1.25">+1.25</option>
                                            <option value="+1.00">+1.00</option>
                                            <option value="+0.75">+0.75</option>
                                            <option value="+0.50">+0.50</option>
                                            <option value="+0.25">+0.25</option>
                                            <option value="0.00" selected>0.00</option>
                                            <option value="-0.25">-0.25</option>
                                            <option value="-0.50">-0.50</option>
                                            <option value="-0.75">-0.75</option>
                                            <option value="-1.00">-1.00</option>
                                            <option value="-1.25">-1.25</option>
                                            <option value="-1.50">-1.50</option>
                                            <option value="-1.75">-1.75</option>
                                            <option value="-2.00">-2.00</option>
                                            <option value="-2.25">-2.25</option>
                                            <option value="-2.50">-2.50</option>
                                            <option value="-2.75">-2.75</option>
                                            <option value="-3.00">-3.00</option>
                                            <option value="-3.25">-3.25</option>
                                            <option value="-3.50">-3.50</option>
                                            <option value="-3.75">-3.75</option>
                                            <option value="-4.00">-4.00</option>
                                            <option value="-4.25">-4.25</option>
                                            <option value="-4.50">-4.50</option>
                                            <option value="-4.75">-4.75</option>
                                            <option value="-5.00">-5.00</option>
                                            <option value="-5.25">-5.25</option>
                                            <option value="-5.50">-5.50</option>
                                            <option value="-5.75">-5.75</option>
                                            <option value="-6.00">-6.00</option>
                                        </select>
                                    </div>
                                    <div class="Label-row">
                                        <label>AXIS</label>
                                        <select id="dropdown-one" class="d-three right-axis">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>
                                            <option value="36">36</option>
                                            <option value="37">37</option>
                                            <option value="38">38</option>
                                            <option value="39">39</option>
                                            <option value="40">40</option>
                                            <option value="41">41</option>
                                            <option value="42">42</option>
                                            <option value="43">43</option>
                                            <option value="44">44</option>
                                            <option value="45">45</option>
                                            <option value="46">46</option>
                                            <option value="47">47</option>
                                            <option value="48">48</option>
                                            <option value="49">49</option>
                                            <option value="50">50</option>
                                            <option value="51">51</option>
                                            <option value="52">52</option>
                                            <option value="53">53</option>
                                            <option value="54">54</option>
                                            <option value="55">55</option>
                                            <option value="56">56</option>
                                            <option value="57">57</option>
                                            <option value="58">58</option>
                                            <option value="59">59</option>
                                            <option value="60">60</option>
                                            <option value="61">61</option>
                                            <option value="62">62</option>
                                            <option value="63">63</option>
                                            <option value="64">64</option>
                                            <option value="65">65</option>
                                            <option value="66">66</option>
                                            <option value="67">67</option>
                                            <option value="68">68</option>
                                            <option value="69">69</option>
                                            <option value="70">70</option>
                                            <option value="71">71</option>
                                            <option value="72">72</option>
                                            <option value="73">73</option>
                                            <option value="74">74</option>
                                            <option value="75">75</option>
                                            <option value="76">76</option>
                                            <option value="77">77</option>
                                            <option value="78">78</option>
                                            <option value="79">79</option>
                                            <option value="80">80</option>
                                            <option value="81">81</option>
                                            <option value="82">82</option>
                                            <option value="83">83</option>
                                            <option value="84">84</option>
                                            <option value="85">85</option>
                                            <option value="86">86</option>
                                            <option value="87">87</option>
                                            <option value="88">88</option>
                                            <option value="89">89</option>
                                            <option value="90">90</option>
                                            <option value="91">91</option>
                                            <option value="92">92</option>
                                            <option value="93">93</option>
                                            <option value="94">94</option>
                                            <option value="95">95</option>
                                            <option value="96">96</option>
                                            <option value="97">97</option>
                                            <option value="98">98</option>
                                            <option value="99">99</option>
                                            <option value="100">100</option>
                                            <option value="101">101</option>
                                            <option value="102">102</option>
                                            <option value="103">103</option>
                                            <option value="104">104</option>
                                            <option value="105">105</option>
                                            <option value="106">106</option>
                                            <option value="107">107</option>
                                            <option value="108">108</option>
                                            <option value="109">109</option>
                                            <option value="110">110</option>
                                            <option value="111">111</option>
                                            <option value="112">112</option>
                                            <option value="113">113</option>
                                            <option value="114">114</option>
                                            <option value="115">115</option>
                                            <option value="116">116</option>
                                            <option value="117">117</option>
                                            <option value="118">118</option>
                                            <option value="119">119</option>
                                            <option value="120">120</option>
                                            <option value="121">121</option>
                                            <option value="122">122</option>
                                            <option value="123">123</option>
                                            <option value="124">124</option>
                                            <option value="125">125</option>
                                            <option value="126">126</option>
                                            <option value="127">127</option>
                                            <option value="128">128</option>
                                            <option value="129">129</option>
                                            <option value="130">130</option>
                                            <option value="131">131</option>
                                            <option value="132">132</option>
                                            <option value="133">133</option>
                                            <option value="134">134</option>
                                            <option value="135">135</option>
                                            <option value="136">136</option>
                                            <option value="137">137</option>
                                            <option value="138">138</option>
                                            <option value="139">139</option>
                                            <option value="140">140</option>
                                            <option value="141">141</option>
                                            <option value="142">142</option>
                                            <option value="143">143</option>
                                            <option value="144">144</option>
                                            <option value="145">145</option>
                                            <option value="146">146</option>
                                            <option value="147">147</option>
                                            <option value="148">148</option>
                                            <option value="149">149</option>
                                            <option value="150">150</option>
                                            <option value="151">151</option>
                                            <option value="152">152</option>
                                            <option value="153">153</option>
                                            <option value="154">154</option>
                                            <option value="155">155</option>
                                            <option value="156">156</option>
                                            <option value="157">157</option>
                                            <option value="158">158</option>
                                            <option value="159">159</option>
                                            <option value="160">160</option>
                                            <option value="161">161</option>
                                            <option value="162">162</option>
                                            <option value="163">163</option>
                                            <option value="164">164</option>
                                            <option value="165">165</option>
                                            <option value="166">166</option>
                                            <option value="167">167</option>
                                            <option value="168">168</option>
                                            <option value="169">169</option>
                                            <option value="170">170</option>
                                            <option value="171">171</option>
                                            <option value="172">172</option>
                                            <option value="173">173</option>
                                            <option value="174">174</option>
                                            <option value="175">175</option>
                                            <option value="176">176</option>
                                            <option value="177">177</option>
                                            <option value="178">178</option>
                                            <option value="179">179</option>
                                            <option value="180">180</option>
                                        </select>
                                    </div>
                                    <div class="Label-row l-four">
                                        <label>ADD</label>
                                        <select id="dropdown-one" class="d-four right-add">
                                            <option value="0.00">0.00</option>
                                            <option value="+1.00">+1.00</option>
                                            <option value="+1.25">+1.25</option>
                                            <option value="+1.50">+1.50</option>
                                            <option value="+1.75">+1.75</option>
                                            <option value="+2.00">+2.00</option>
                                            <option value="+2.25">+2.25</option>
                                            <option value="+2.50">+2.50</option>
                                            <option value="+2.75">+2.75</option>
                                            <option value="+3.00">+3.00</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--=================================================FORM ROW TWO==========================================================-->
                            <div class="row-two">
                                <div class="os-left">
                                    <label class="label-2">OS <br> (Left)</label>
                                    <div class="Label-row-2">
                                        <select id="dropdown-one" class="d-one left-sph">
                                            <option value="+8.00">+8.00</option>
                                            <option value="+7.75">+7.75</option>
                                            <option value="+7.50">+7.50</option>
                                            <option value="+7.25">+7.25</option>
                                            <option value="+7.00">+7.00</option>
                                            <option value="+6.75">+6.75</option>
                                            <option value="+6.50">+6.50</option>
                                            <option value="+6.25">+6.25</option>
                                            <option value="+6.00">+6.00</option>
                                            <option value="+5.75">+5.75</option>
                                            <option value="+5.50">+5.50</option>
                                            <option value="+5.25">+5.25</option>
                                            <option value="+5.00">+5.00</option>
                                            <option value="+4.75">+4.75</option>
                                            <option value="+4.50">+4.50</option>
                                            <option value="+4.25">+4.25</option>
                                            <option value="+4.00">+4.00</option>
                                            <option value="+3.75">+3.75</option>
                                            <option value="+3.50">+3.50</option>
                                            <option value="+3.25">+3.25</option>
                                            <option value="+3.00">+3.00</option>
                                            <option value="+2.75">+2.75</option>
                                            <option value="+2.50">+2.50</option>
                                            <option value="+2.25">+2.25</option>
                                            <option value="+2.00">+2.00</option>
                                            <option value="+1.75">+1.75</option>
                                            <option value="+1.50">+1.50</option>
                                            <option value="+1.25">+1.25</option>
                                            <option value="+1.00">+1.00</option>
                                            <option value="+0.75">+0.75</option>
                                            <option value="+0.50">+0.50</option>
                                            <option value="+0.25">+0.25</option>
                                            <option value="0.00" selected>0.00</option>
                                            <option value="-0.25">-0.25</option>
                                            <option value="-0.50">-0.50</option>
                                            <option value="-0.75">-0.75</option>
                                            <option value="-1.00">-1.00</option>
                                            <option value="-1.25">-1.25</option>
                                            <option value="-1.50">-1.50</option>
                                            <option value="-1.75">-1.75</option>
                                            <option value="-2.00">-2.00</option>
                                            <option value="-2.25">-2.25</option>
                                            <option value="-2.50">-2.50</option>
                                            <option value="-2.75">-2.75</option>
                                            <option value="-3.00">-3.00</option>
                                            <option value="-3.25">-3.25</option>
                                            <option value="-3.50">-3.50</option>
                                            <option value="-3.75">-3.75</option>
                                            <option value="-4.00">-4.00</option>
                                            <option value="-4.25">-4.25</option>
                                            <option value="-4.50">-4.50</option>
                                            <option value="-4.75">-4.75</option>
                                            <option value="-5.00">-5.00</option>
                                            <option value="-5.25">-5.25</option>
                                            <option value="-5.50">-5.50</option>
                                            <option value="-5.75">-5.75</option>
                                            <option value="-6.00">-6.00</option>
                                            <option value="-6.25">-6.25</option>
                                            <option value="-6.50">-6.50</option>
                                            <option value="-6.75">-6.75</option>
                                            <option value="-7.00">-7.00</option>
                                            <option value="-7.25">-7.25</option>
                                            <option value="-7.50">-7.50</option>
                                            <option value="-7.75">-7.75</option>
                                            <option value="-8.00">-8.00</option>
                                            <option value="-8.25">-8.25</option>
                                            <option value="-8.50">-8.50</option>
                                            <option value="-8.75">-8.75</option>
                                            <option value="-9.00">-9.00</option>
                                            <option value="-9.25">-9.25</option>
                                            <option value="-9.50">-9.50</option>
                                            <option value="-9.75">-9.75</option>
                                            <option value="-10.00">-10.00</option>
                                            <option value="-10.25">-10.25</option>
                                            <option value="-10.50">-10.50</option>
                                            <option value="-10.75">-10.75</option>
                                            <option value="-11.00">-11.00</option>
                                            <option value="-11.25">-11.25</option>
                                            <option value="-11.50">-11.50</option>
                                            <option value="-11.75">-11.75</option>
                                            <option value="-12.00">-12.00</option>
                                            <option value="-12.25">-12.25</option>
                                            <option value="-12.50">-12.50</option>
                                            <option value="-12.75">-12.75</option>
                                            <option value="-13.00">-13.00</option>
                                            <option value="-13.25">-13.25</option>
                                            <option value="-13.50">-13.50</option>
                                            <option value="-13.75">-13.75</option>
                                            <option value="-14.00">-14.00</option>
                                            <option value="-14.25">-14.25</option>
                                            <option value="-14.50">-14.50</option>
                                            <option value="-14.75">-14.75</option>
                                            <option value="-15.00">-15.00</option>
                                        </select>
                                    </div>
                                    <div class="Label-row-2">
                                        <select id="dropdown-one" class="d-two left-cyl">
                                            <option value="+6.00">+6.00</option>
                                            <option value="+5.75">+5.75</option>
                                            <option value="+5.50">+5.50</option>
                                            <option value="+5.25">+5.25</option>
                                            <option value="+5.00">+5.00</option>
                                            <option value="+4.75">+4.75</option>
                                            <option value="+4.50">+4.50</option>
                                            <option value="+4.25">+4.25</option>
                                            <option value="+4.00">+4.00</option>
                                            <option value="+3.75">+3.75</option>
                                            <option value="+3.50">+3.50</option>
                                            <option value="+3.25">+3.25</option>
                                            <option value="+3.00">+3.00</option>
                                            <option value="+2.75">+2.75</option>
                                            <option value="+2.50">+2.50</option>
                                            <option value="+2.25">+2.25</option>
                                            <option value="+2.00">+2.00</option>
                                            <option value="+1.75">+1.75</option>
                                            <option value="+1.50">+1.50</option>
                                            <option value="+1.25">+1.25</option>
                                            <option value="+1.00">+1.00</option>
                                            <option value="+0.75">+0.75</option>
                                            <option value="+0.50">+0.50</option>
                                            <option value="+0.25">+0.25</option>
                                            <option value="0.00" selected>0.00</option>
                                            <option value="-0.25">-0.25</option>
                                            <option value="-0.50">-0.50</option>
                                            <option value="-0.75">-0.75</option>
                                            <option value="-1.00">-1.00</option>
                                            <option value="-1.25">-1.25</option>
                                            <option value="-1.50">-1.50</option>
                                            <option value="-1.75">-1.75</option>
                                            <option value="-2.00">-2.00</option>
                                            <option value="-2.25">-2.25</option>
                                            <option value="-2.50">-2.50</option>
                                            <option value="-2.75">-2.75</option>
                                            <option value="-3.00">-3.00</option>
                                            <option value="-3.25">-3.25</option>
                                            <option value="-3.50">-3.50</option>
                                            <option value="-3.75">-3.75</option>
                                            <option value="-4.00">-4.00</option>
                                            <option value="-4.25">-4.25</option>
                                            <option value="-4.50">-4.50</option>
                                            <option value="-4.75">-4.75</option>
                                            <option value="-5.00">-5.00</option>
                                            <option value="-5.25">-5.25</option>
                                            <option value="-5.50">-5.50</option>
                                            <option value="-5.75">-5.75</option>
                                            <option value="-6.00">-6.00</option>
                                        </select>
                                    </div>
                                    <div class="Label-row-2">
                                        <select id="dropdown-one" class="d-three left-axis">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>
                                            <option value="36">36</option>
                                            <option value="37">37</option>
                                            <option value="38">38</option>
                                            <option value="39">39</option>
                                            <option value="40">40</option>
                                            <option value="41">41</option>
                                            <option value="42">42</option>
                                            <option value="43">43</option>
                                            <option value="44">44</option>
                                            <option value="45">45</option>
                                            <option value="46">46</option>
                                            <option value="47">47</option>
                                            <option value="48">48</option>
                                            <option value="49">49</option>
                                            <option value="50">50</option>
                                            <option value="51">51</option>
                                            <option value="52">52</option>
                                            <option value="53">53</option>
                                            <option value="54">54</option>
                                            <option value="55">55</option>
                                            <option value="56">56</option>
                                            <option value="57">57</option>
                                            <option value="58">58</option>
                                            <option value="59">59</option>
                                            <option value="60">60</option>
                                            <option value="61">61</option>
                                            <option value="62">62</option>
                                            <option value="63">63</option>
                                            <option value="64">64</option>
                                            <option value="65">65</option>
                                            <option value="66">66</option>
                                            <option value="67">67</option>
                                            <option value="68">68</option>
                                            <option value="69">69</option>
                                            <option value="70">70</option>
                                            <option value="71">71</option>
                                            <option value="72">72</option>
                                            <option value="73">73</option>
                                            <option value="74">74</option>
                                            <option value="75">75</option>
                                            <option value="76">76</option>
                                            <option value="77">77</option>
                                            <option value="78">78</option>
                                            <option value="79">79</option>
                                            <option value="80">80</option>
                                            <option value="81">81</option>
                                            <option value="82">82</option>
                                            <option value="83">83</option>
                                            <option value="84">84</option>
                                            <option value="85">85</option>
                                            <option value="86">86</option>
                                            <option value="87">87</option>
                                            <option value="88">88</option>
                                            <option value="89">89</option>
                                            <option value="90">90</option>
                                            <option value="91">91</option>
                                            <option value="92">92</option>
                                            <option value="93">93</option>
                                            <option value="94">94</option>
                                            <option value="95">95</option>
                                            <option value="96">96</option>
                                            <option value="97">97</option>
                                            <option value="98">98</option>
                                            <option value="99">99</option>
                                            <option value="100">100</option>
                                            <option value="101">101</option>
                                            <option value="102">102</option>
                                            <option value="103">103</option>
                                            <option value="104">104</option>
                                            <option value="105">105</option>
                                            <option value="106">106</option>
                                            <option value="107">107</option>
                                            <option value="108">108</option>
                                            <option value="109">109</option>
                                            <option value="110">110</option>
                                            <option value="111">111</option>
                                            <option value="112">112</option>
                                            <option value="113">113</option>
                                            <option value="114">114</option>
                                            <option value="115">115</option>
                                            <option value="116">116</option>
                                            <option value="117">117</option>
                                            <option value="118">118</option>
                                            <option value="119">119</option>
                                            <option value="120">120</option>
                                            <option value="121">121</option>
                                            <option value="122">122</option>
                                            <option value="123">123</option>
                                            <option value="124">124</option>
                                            <option value="125">125</option>
                                            <option value="126">126</option>
                                            <option value="127">127</option>
                                            <option value="128">128</option>
                                            <option value="129">129</option>
                                            <option value="130">130</option>
                                            <option value="131">131</option>
                                            <option value="132">132</option>
                                            <option value="133">133</option>
                                            <option value="134">134</option>
                                            <option value="135">135</option>
                                            <option value="136">136</option>
                                            <option value="137">137</option>
                                            <option value="138">138</option>
                                            <option value="139">139</option>
                                            <option value="140">140</option>
                                            <option value="141">141</option>
                                            <option value="142">142</option>
                                            <option value="143">143</option>
                                            <option value="144">144</option>
                                            <option value="145">145</option>
                                            <option value="146">146</option>
                                            <option value="147">147</option>
                                            <option value="148">148</option>
                                            <option value="149">149</option>
                                            <option value="150">150</option>
                                            <option value="151">151</option>
                                            <option value="152">152</option>
                                            <option value="153">153</option>
                                            <option value="154">154</option>
                                            <option value="155">155</option>
                                            <option value="156">156</option>
                                            <option value="157">157</option>
                                            <option value="158">158</option>
                                            <option value="159">159</option>
                                            <option value="160">160</option>
                                            <option value="161">161</option>
                                            <option value="162">162</option>
                                            <option value="163">163</option>
                                            <option value="164">164</option>
                                            <option value="165">165</option>
                                            <option value="166">166</option>
                                            <option value="167">167</option>
                                            <option value="168">168</option>
                                            <option value="169">169</option>
                                            <option value="170">170</option>
                                            <option value="171">171</option>
                                            <option value="172">172</option>
                                            <option value="173">173</option>
                                            <option value="174">174</option>
                                            <option value="175">175</option>
                                            <option value="176">176</option>
                                            <option value="177">177</option>
                                            <option value="178">178</option>
                                            <option value="179">179</option>
                                            <option value="180">180</option>
                                        </select>
                                    </div>
                                    <div class="Label-row-2 l-four">
                                        <select id="dropdown-one" class="d-four left-add">
                                            <option value="0.00">0.00</option>
                                            <option value="+1.00">+1.00</option>
                                            <option value="+1.25">+1.25</option>
                                            <option value="+1.50">+1.50</option>
                                            <option value="+1.75">+1.75</option>
                                            <option value="+2.00">+2.00</option>
                                            <option value="+2.25">+2.25</option>
                                            <option value="+2.50">+2.50</option>
                                            <option value="+2.75">+2.75</option>
                                            <option value="+3.00">+3.00</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--=================================================COLOUMN THREE==========================================================-->
                        <div class="col-3">
                            <div class="box">
                                <form>
                                    <div id="single-pd">
                                        <div class="Label-row l-four pd-one">
                                            <label>PD</label>
                                            <select id="dropdown-one" class="d-four pd-one-select">
                                                <option value="46.0">46.0</option>
                                                <option value="46.5">46.5</option>
                                                <option value="47.0">47.0</option>
                                                <option value="47.5">47.5</option>
                                                <option value="48.0">48.0</option>
                                                <option value="48.5">48.5</option>
                                                <option value="49.0">49.0</option>
                                                <option value="49.5">49.5</option>
                                                <option value="50.0">50.0</option>
                                                <option value="50.5">50.5</option>
                                                <option value="51.0">51.0</option>
                                                <option value="51.5">51.5</option>
                                                <option value="52.0">52.0</option>
                                                <option value="52.5">52.5</option>
                                                <option value="53.0">53.0</option>
                                                <option value="53.5">53.5</option>
                                                <option value="54.0">54.0</option>
                                                <option value="54.5">54.5</option>
                                                <option value="55.0">55.0</option>
                                                <option value="55.5">55.5</option>
                                                <option value="56.0">56.0</option>
                                                <option value="56.5">56.5</option>
                                                <option value="57.0">57.0</option>
                                                <option value="57.5">57.5</option>
                                                <option value="58.0">58.0</option>
                                                <option value="58.5">58.5</option>
                                                <option value="59.0">59.0</option>
                                                <option value="59.5">59.5</option>
                                                <option value="60.0">60.0</option>
                                                <option value="60.5">60.5</option>
                                                <option value="61.0">61.0</option>
                                                <option value="61.5">61.5</option>
                                                <option value="62.0">62.0</option>
                                                <option value="62.5">62.5</option>
                                                <option value="63.0" selected>63.0</option>
                                                <option value="63.5">63.5</option>
                                                <option value="64.0">64.0</option>
                                                <option value="64.5">64.5</option>
                                                <option value="65.0">65.0</option>
                                                <option value="65.5">65.5</option>
                                                <option value="66.0">66.0</option>
                                                <option value="66.5">66.5</option>
                                                <option value="67.0">67.0</option>
                                                <option value="67.5">67.5</option>
                                                <option value="68.0">68.0</option>
                                                <option value="68.5">68.5</option>
                                                <option value="69.0">69.0</option>
                                                <option value="69.5">69.5</option>
                                                <option value="70.0">70.0</option>
                                                <option value="70.5">70.5</option>
                                                <option value="71.0">71.0</option>
                                                <option value="71.5">71.5</option>
                                                <option value="72.0">72.0</option>
                                                <option value="72.5">72.5</option>
                                                <option value="73.0">73.0</option>
                                                <option value="73.5">73.5</option>
                                                <option value="74.0">74.0</option>
                                                <option value="74.5">74.5</option>
                                                <option value="75.0">75.0</option>
                                            </select>
                                        </div>
                                        <div class="Label-row l-four pd-two" style="display: none;">
                                            <select id="dropdown-one" class="d-four pd-two-select">
                                                <option value="46.0">46.0</option>
                                                <option value="46.5">46.5</option>
                                                <option value="47.0">47.0</option>
                                                <option value="47.5">47.5</option>
                                                <option value="48.0">48.0</option>
                                                <option value="48.5">48.5</option>
                                                <option value="49.0">49.0</option>
                                                <option value="49.5">49.5</option>
                                                <option value="50.0">50.0</option>
                                                <option value="50.5">50.5</option>
                                                <option value="51.0">51.0</option>
                                                <option value="51.5">51.5</option>
                                                <option value="52.0">52.0</option>
                                                <option value="52.5">52.5</option>
                                                <option value="53.0">53.0</option>
                                                <option value="53.5">53.5</option>
                                                <option value="54.0">54.0</option>
                                                <option value="54.5">54.5</option>
                                                <option value="55.0">55.0</option>
                                                <option value="55.5">55.5</option>
                                                <option value="56.0">56.0</option>
                                                <option value="56.5">56.5</option>
                                                <option value="57.0">57.0</option>
                                                <option value="57.5">57.5</option>
                                                <option value="58.0">58.0</option>
                                                <option value="58.5">58.5</option>
                                                <option value="59.0">59.0</option>
                                                <option value="59.5">59.5</option>
                                                <option value="60.0">60.0</option>
                                                <option value="60.5">60.5</option>
                                                <option value="61.0">61.0</option>
                                                <option value="61.5">61.5</option>
                                                <option value="62.0">62.0</option>
                                                <option value="62.5">62.5</option>
                                                <option value="63.0" selected>63.0</option>
                                                <option value="63.5">63.5</option>
                                                <option value="64.0">64.0</option>
                                                <option value="64.5">64.5</option>
                                                <option value="65.0">65.0</option>
                                                <option value="65.5">65.5</option>
                                                <option value="66.0">66.0</option>
                                                <option value="66.5">66.5</option>
                                                <option value="67.0">67.0</option>
                                                <option value="67.5">67.5</option>
                                                <option value="68.0">68.0</option>
                                                <option value="68.5">68.5</option>
                                                <option value="69.0">69.0</option>
                                                <option value="69.5">69.5</option>
                                                <option value="70.0">70.0</option>
                                                <option value="70.5">70.5</option>
                                                <option value="71.0">71.0</option>
                                                <option value="71.5">71.5</option>
                                                <option value="72.0">72.0</option>
                                                <option value="72.5">72.5</option>
                                                <option value="73.0">73.0</option>
                                                <option value="73.5">73.5</option>
                                                <option value="74.0">74.0</option>
                                                <option value="74.5">74.5</option>
                                                <option value="75.0">75.0</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="dual-pd" style="display: none;">
                                        <div class="Label-row l-four pd-one">
                                            <label>PD</label>
                                            <select id="dropdown-one" class="d-four dual-pd-one-select">
                                                <option value="20.0">20.0</option>
                                                <option value="20.5">20.5</option>
                                                <option value="21.0">21.0</option>
                                                <option value="21.5">21.5</option>
                                                <option value="22.0">22.0</option>
                                                <option value="22.5">22.5</option>
                                                <option value="23.0">23.0</option>
                                                <option value="23.5">23.5</option>
                                                <option value="24.0">24.0</option>
                                                <option value="24.5">24.5</option>
                                                <option value="25.0">25.0</option>
                                                <option value="25.5">25.5</option>
                                                <option value="26.0">26.0</option>
                                                <option value="26.5">26.5</option>
                                                <option value="27.0">27.0</option>
                                                <option value="27.5">27.5</option>
                                                <option value="28.0">28.0</option>
                                                <option value="28.5">28.5</option>
                                                <option value="29.0">29.0</option>
                                                <option value="29.5">29.5</option>
                                                <option value="30.0">30.0</option>
                                                <option value="0.0">--</option>
                                                <option value="30.5">30.5</option>
                                                <option value="31.0">31.0</option>
                                                <option value="31.5">31.5</option>
                                                <option value="32.0">32.0</option>
                                                <option value="32.5">32.5</option>
                                                <option value="33.0">33.0</option>
                                                <option value="33.5">33.5</option>
                                                <option value="34.0">34.0</option>
                                                <option value="34.5">34.5</option>
                                                <option value="35.0">35.0</option>
                                                <option value="35.5">35.5</option>
                                                <option value="36.0">36.0</option>
                                                <option value="36.5">36.5</option>
                                                <option value="37.0">37.0</option>
                                                <option value="37.5">37.5</option>
                                                <option value="38.0">38.0</option>
                                                <option value="38.5">38.5</option>
                                                <option value="39.0">39.0</option>
                                                <option value="39.5">39.5</option>
                                                <option value="40.0">40.5</option>
                                                <option value="40.5">40.5</option>
                                                <option value="41.0">41.0</option>
                                                <option value="41.5">41.5</option>
                                                <option value="42.0">42.0</option>
                                                <option value="42.5">42.5</option>
                                                <option value="43.0">43.0</option>
                                                <option value="43.5">43.5</option>
                                                <option value="44.0">44.0</option>
                                                <option value="44.5">44.5</option>
                                                <option value="45.0">45.0</option>
                                            </select>
                                        </div>
                                        <div class="Label-row l-four pd-two">
                                            <select id="dropdown-one" class="d-four dual-pd-two-select">
                                                <option value="20.0">20.0</option>
                                                <option value="20.5">20.5</option>
                                                <option value="21.0">21.0</option>
                                                <option value="21.5">21.5</option>
                                                <option value="22.0">22.0</option>
                                                <option value="22.5">22.5</option>
                                                <option value="23.0">23.0</option>
                                                <option value="23.5">23.5</option>
                                                <option value="24.0">24.0</option>
                                                <option value="24.5">24.5</option>
                                                <option value="25.0">25.0</option>
                                                <option value="25.5">25.5</option>
                                                <option value="26.0">26.0</option>
                                                <option value="26.5">26.5</option>
                                                <option value="27.0">27.0</option>
                                                <option value="27.5">27.5</option>
                                                <option value="28.0">28.0</option>
                                                <option value="28.5">28.5</option>
                                                <option value="29.0">29.0</option>
                                                <option value="29.5">29.5</option>
                                                <option value="30.0">30.0</option>
                                                <option value="0.0">--</option>
                                                <option value="30.5">30.5</option>
                                                <option value="31.0">31.0</option>
                                                <option value="31.5">31.5</option>
                                                <option value="32.0">32.0</option>
                                                <option value="32.5">32.5</option>
                                                <option value="33.0">33.0</option>
                                                <option value="33.5">33.5</option>
                                                <option value="34.0">34.0</option>
                                                <option value="34.5">34.5</option>
                                                <option value="35.0">35.0</option>
                                                <option value="35.5">35.5</option>
                                                <option value="36.0">36.0</option>
                                                <option value="36.5">36.5</option>
                                                <option value="37.0">37.0</option>
                                                <option value="37.5">37.5</option>
                                                <option value="38.0">38.0</option>
                                                <option value="38.5">38.5</option>
                                                <option value="39.0">39.0</option>
                                                <option value="39.5">39.5</option>
                                                <option value="40.0">40.5</option>
                                                <option value="40.5">40.5</option>
                                                <option value="41.0">41.0</option>
                                                <option value="41.5">41.5</option>
                                                <option value="42.0">42.0</option>
                                                <option value="42.5">42.5</option>
                                                <option value="43.0">43.0</option>
                                                <option value="43.5">43.5</option>
                                                <option value="44.0">44.0</option>
                                                <option value="44.5">44.5</option>
                                                <option value="45.0">45.0</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                                <br/>
                                <br/>
                                <p id="pd-one-num"><a href="javascript:;">I have two PD numbers</a></p>
                                <p id="pd-two-num" style="display: none;"><a href="javascript:;">I have one PD
                                        number</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="buttons">
                        <a href="javascript:;">
                            <button class="b2 prescription-btn">Next</button>
                        </a>
                    </div>
                </div>
                <!-- Custom Sidebar -->
                <?php include('custom-sidebar.php'); ?>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function () {
        var right_sph = '<?php echo $_SESSION['right-sph'] ?>';
        var right_cyl = '<?php echo $_SESSION['right_cyl'] ?>';
        var right_axis = '<?php echo $_SESSION['right_axis'] ?>';
        var right_add = '<?php echo $_SESSION['right_add'] ?>';
        var left_sph = '<?php echo $_SESSION['left_sph'] ?>';
        var left_cyl = '<?php echo $_SESSION['left_cyl'] ?>';
        var left_axis = '<?php echo $_SESSION['left_axis'] ?>';
        var left_add = '<?php echo $_SESSION['left_add'] ?>';
        var pd_one_select = '<?php echo $_SESSION['pd_one_select'] ?>';
        jQuery(".right-sph option").each(function () {
            if (jQuery(this).val() === right_sph) {
                jQuery(this).attr("selected", "selected");
            }
        });
        jQuery(".right-cyl option").each(function () {
            if (jQuery(this).val() === right_cyl) {
                jQuery(this).attr("selected", "selected");
            }
        });
        jQuery(".right-axis option").each(function () {
            if (jQuery(this).val() === right_axis) {
                jQuery(this).attr("selected", "selected");
            }
        });
        jQuery(".right-add option").each(function () {
            if (jQuery(this).val() === right_add) {
                jQuery(this).attr("selected", "selected");
            }
        });
        jQuery(".left-sph option").each(function () {
            if (jQuery(this).val() === left_sph) {
                jQuery(this).attr("selected", "selected");
            }
        });
        jQuery(".left-cyl option").each(function () {
            if (jQuery(this).val() === left_cyl) {
                jQuery(this).attr("selected", "selected");
            }
        });
        jQuery(".left-axis option").each(function () {
            if (jQuery(this).val() === left_axis) {
                jQuery(this).attr("selected", "selected");
            }
        });
        jQuery(".left-add option").each(function () {
            if (jQuery(this).val() === left_add) {
                jQuery(this).attr("selected", "selected");
            }
        });
        jQuery(".pd-one-select option").each(function () {
            if (jQuery(this).val() === pd_one_select) {
                jQuery(this).attr("selected", "selected");
            }
        });
        jQuery('#pd-one-num').click(function () {
            jQuery('#single-pd').hide();
            jQuery('#dual-pd').show();
            jQuery('#pd-two-num').show();
            jQuery('#pd-one-num').hide();
        });
        jQuery('#pd-two-num').click(function () {
            jQuery('#dual-pd').hide();
            jQuery('#single-pd').show();
            jQuery('#pd-two-num').hide();
            jQuery('#pd-one-num').show();
        });

    });
</script>
<?php get_footer(); ?>
