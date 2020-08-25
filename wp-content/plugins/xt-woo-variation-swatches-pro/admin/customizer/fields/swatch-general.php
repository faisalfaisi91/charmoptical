<?php
/** @global $type */
/** @global $element_prefix */
/** @global $page_prefix */

if (($type === 'archives' && $this->core->access_manager()->can_use_premium_code__premium_only()) || ($type === 'single')) {

    $fields[] = array(
        'id' => $type . '_swatches_enabled',
        'section' => $type . '-swatch-general',
        'label' => esc_html__('Enable Swatches.', 'xt-woo-variation-swatches'),
        'type' => 'toggle',
        'default' => self::types_default_values($type, '1', '0')
    );

    $fields[] = array(
        'id' => $type . '_other_to_label',
        'section' => $type . '-swatch-general',
        'label' => esc_html__('Automatically convert Dropdowns to Label Swatch by default.', 'xt-woo-variation-swatches'),
        'type' => 'toggle',
        'default' => '1'
    );

    $fields[] = array(
        'id' => $type . '_color_to_image',
        'section' => $type . '-swatch-general',
        'label' => esc_html__('Automatically convert Dropdowns to Image Swatch if variation has an image.', 'xt-woo-variation-swatches'),
        'type' => 'toggle',
        'default' => '1'
    );

    $fields[] = array(
        'id' => $type . '_color_to_image_custom_attributes',
        'section' => $type . '-swatch-general',
        'label' => esc_html__('Select Custom Attributes', 'xt-woo-variation-swatches'),
        'description' => esc_html__('Enter attribute names that will be converted to image swatches. If more than one attribute is available, only the first one will be converted. Note: this will only work if each variation has an image assigned.', 'xt-woo-variation-swatches'),
        'type' => 'repeater',
        'row_label' => array(
            'type' => 'text',
            'value' => esc_html__('Custom attribute', 'xt-woo-variation-swatches'),
        ),
        'default' => array(
            array(
                'attribute' => 'color'
            ),
            array(
                'attribute' => 'image'
            )
        ),
        'fields' => array(
            'attribute' => array(
                'type' => 'text',
                'label' => esc_html__('Custom Attribute', 'xt-woo-variation-swatches'),
                'default' => '',
            )
        ),
        'active_callback' => array(
            array(
                'setting' => $type . '_color_to_image',
                'operator' => '==',
                'value' => '1',
            ),
        )
    );

    $fields[] = array(
        'id' => $type . '_swatches_align',
        'section' => $type . '-swatch-general',
        'label' => esc_html__('Swatches Alignment', 'xt-woo-variation-swatches'),
        'type' => 'radio-buttonset',
        'choices' => array(
            'left' => esc_attr__('Left', 'xt-woo-variation-swatches'),
            'center' => esc_attr__('Center', 'xt-woo-variation-swatches'),
            'right' => esc_attr__('Right', 'xt-woo-variation-swatches')
        ),
        'default' => self::types_default_values($type, 'left', 'center'),
        'transport' => 'postMessage',
        'js_vars' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap',
                'function' => 'class',
                'prefix' => 'xt_woovs-align-'
            ),
            array(
                'element' => '.xt_woovs-archives-product .variations_form.xt_woovs-support',
                'property' => 'text-align'
            )
        ),
        'output' => array(
            array(
                'element' => '.xt_woovs-archives-product .variations_form.xt_woovs-support',
                'property' => 'text-align'
            )
        )
    );
}

if ($this->core->access_manager()->can_use_premium_code__premium_only()) {

    $fields[] = array(
        'id' => $type . '_variation_reset',
        'section' => $type . '-swatch-general',
        'label' => esc_html__('Hide Variation Reset Link', 'xt-woo-variation-swatches'),
        'type' => 'radio-buttonset',
        'choices' => array(
            'visible' => esc_attr__('No', 'xt-woo-variation-swatches'),
            'hide' => esc_attr__('Yes', 'xt-woo-variation-swatches'),
        ),
        'default' => 'visible',
        'transport' => 'postMessage',
        'js_vars' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap',
                'function' => 'class',
                'prefix' => 'xt_woovs-reset-'
            )
        )
    );

    if ($type === 'single') {

        $fields[] = array(
            'id' => $type . '_attr_label_position',
            'section' => $type . '-swatch-general',
            'label' => esc_html__('Attribute Label Position', 'xt-woo-variation-swatches'),
            'type' => 'radio-buttonset',
            'choices' => array(
                'inherit' => esc_attr__('Inherit', 'xt-woo-variation-swatches'),
                'above' => esc_attr__('Above Swatches', 'xt-woo-variation-swatches'),
                'hidden' => esc_attr__('Hidden', 'xt-woo-variation-swatches'),
            ),
            'default' => 'inherit',
            'transport' => 'postMessage',
            'js_vars' => array(
                array(
                    'element' => $element_prefix . ' .xt_woovs-swatches-wrap',
                    'function' => 'class',
                    'prefix' => 'xt_woovs-attr-label-'
                )
            )
        );

        $fields[] = array(
            'id' => $type . '_attr_label_margin_bottom',
            'section' => $type . '-swatch-general',
            'label' => esc_html__('Attribute Label Bottom Margin', 'xt-woo-variation-swatches'),
            'default' => 0,
            'type' => 'slider',
            'choices' => array(
                'min' => '0',
                'max' => '15',
                'step' => '1',
            ),
            'transport' => 'auto',
	        'active_callback' => array(
		        array(
			        'setting' => $type . '_attr_label_position',
			        'operator' => '==',
			        'value' => 'above',
		        ),
	        ),
            'output' => array(
                array(
                    'element' => $element_prefix . ' .xt_woovs-swatches-wrap.xt_woovs-attr-label-above .variations .label',
                    'property' => 'margin-bottom',
                    'value_pattern' => '$px!important'
                )
            )
        );
    }

    $fields[] = array(
        'id' => $type . '_swatch_behavior',
        'section' => $type . '-swatch-general',
        'label' => esc_html__('Disabled Attribute Behavior', 'xt-woo-variation-swatches'),
        'description' => esc_html__('Only works for variations not loaded via ajax.', 'xt-woo-variation-swatches') . '<br><a target="_blank" href="https://docs.xplodedthemes.com/article/119-woocommerce-modify-ajax-variation-threshold">' . esc_html__('More Info.') . '</a><br><br>',
        'type' => 'radio',
        'choices' => array(
            'hide' => esc_attr__('Hide', 'xt-woo-variation-swatches'),
            'blur' => esc_attr__('Blur', 'xt-woo-variation-swatches'),
            'blur-cross' => esc_attr__('Blur + Cross', 'xt-woo-variation-swatches'),
        ),
        'default' => 'blur-cross',
        'transport' => 'postMessage',
        'js_vars' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap',
                'function' => 'class',
                'prefix' => 'xt_woovs-behavior-'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_swatch_spacing_settings',
        'section' => $type . '-swatch-general',
        'label' => esc_html__('Swatch Spacing', 'xt-woo-variation-swatches'),
        'type' => 'custom'
    );

    $fields[] = array(
        'id' => $type . '_swatches_container_spacing',
        'section' => $type . '-swatch-general',
        'label' => esc_html__('Swatches Container Spacing', 'xt-woo-variation-swatches'),
        'type' => 'dimensions',
        'default' => array(
            'padding-top' => self::types_default_values($type, '0px', '10px'),
            'padding-bottom' => '0px',
            'padding-left' => '0px',
            'padding-right' => '0px',
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .variations',
                'property' => 'padding-top',
                'choice' => 'padding-top',
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .variations',
                'property' => 'padding-bottom',
                'choice' => 'padding-bottom',
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .variations',
                'property' => 'padding-left',
                'choice' => 'padding-left',
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .variations',
                'property' => 'padding-right',
                'choice' => 'padding-right',
            ),
        )
    );

    $fields[] = array(
        'id' => $type . '_horizontal_gap',
        'section' => $type . '-swatch-general',
        'label' => esc_html__('Horizontal Gap Between Swatches', 'xt-woo-variation-swatches'),
        'default' => 10,
        'type' => 'slider',
        'choices' => array(
            'min' => '5',
            'max' => '80',
            'step' => '1',
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap.xt_woovs-align-left .swatch',
                'property' => 'margin-right',
                'value_pattern' => '$px!important'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap.xt_woovs-align-center .swatch',
                'property' => 'margin-right',
                'value_pattern' => '$px!important'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap.xt_woovs-align-right .swatch',
                'property' => 'margin-left',
                'value_pattern' => '$px!important'
            ),
        )
    );

    $fields[] = array(
        'id' => $type . '_vertical_gap',
        'section' => $type . '-swatch-general',
        'label' => esc_html__('Vertical Gap Between Swatches', 'xt-woo-variation-swatches'),
        'default' => self::types_default_values($type, 10, 5),
        'type' => 'slider',
        'choices' => array(
            'min' => '0',
            'max' => '30',
            'step' => '1',
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .swatch',
                'property' => 'margin-bottom',
                'value_pattern' => '$px!important'
            ),
        )
    );

    $fields[] = array(
        'id' => $type . '_attr_vertical_gap',
        'section' => $type . '-swatch-general',
        'label' => esc_html__('Vertical Gap Between Attributes', 'xt-woo-variation-swatches'),
        'default' => 20,
        'type' => 'slider',
        'choices' => array(
            'min' => '0',
            'max' => '80',
            'step' => '1',
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .xt_woovs-swatches',
                'property' => 'margin-bottom',
                'value_pattern' => '$px!important'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .xt_woovs-swatches:last-of-type',
                'property' => 'margin-bottom',
                'value_pattern' => '0px!important'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap td.value',
                'property' => 'padding-bottom',
                'value_pattern' => '$px!important'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap tr:last-child td.value',
                'property' => 'padding-bottom',
                'value_pattern' => '0px!important'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_swatch_tooltip_settings',
        'section' => $type . '-swatch-general',
        'label' => esc_html__('Swatch Tooltip', 'xt-woo-variation-swatches'),
        'type' => 'custom'
    );

    $fields[] = array(
        'id' => $type . '_swatch_tooltip_image_size',
        'section' => $type . '-swatch-general',
        'label' => esc_html__('Swatch Image Tooltip Size', 'xt-woo-variation-swatches'),
        'default' => 50,
        'type' => 'slider',
        'choices' => array(
            'min' => '40',
            'max' => '200',
            'step' => '1',
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $page_prefix . ' .xt_woovs-tooltip img',
                'property' => 'max-width',
                'value_pattern' => '$px!important'
            ),
        )
    );

	$fields[] = array(
		'id' => $type . '_swatch_tooltip_image_padding',
		'section' => $type . '-swatch-general',
		'label' => esc_html__('Swatch Image Tooltip Padding', 'xt-woo-variation-swatches'),
		'default' => '2',
		'type' => 'slider',
		'choices' => array(
			'min' => '0',
			'max' => '10',
			'step' => '1',
		),
		'transport' => 'auto',
		'output' => array(
			array(
				'element' => $page_prefix . ' .xt_woovs-tooltip.tooltip-image',
				'property' => 'border-width',
				'value_pattern' => '$px'
			),
			array(
				'element' => $page_prefix . ' .xt_woovs-tooltip.tooltip-image:after',
				'property' => 'top',
				'value_pattern' => 'calc(100% + $px - 1px)'
			),
		)
	);

    $fields[] = array(
        'id' => $type . '_swatch_tooltip_radius',
        'section' => $type . '-swatch-general',
        'label' => esc_html__('Swatch Tooltip Border Radius', 'xt-woo-variation-swatches'),
        'default' => '5',
        'type' => 'slider',
        'choices' => array(
            'min' => '0',
            'max' => '100',
            'step' => '1',
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => array($page_prefix . ' .xt_woovs-tooltip', $page_prefix . ' .xt_woovs-tooltip img'),
                'property' => 'border-radius',
                'value_pattern' => '$%'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_swatch_tooltip_bg',
        'section' => $type . '-swatch-general',
        'label' => esc_html__('Swatch Tooltip Background', 'xt-woo-variation-swatches'),
        'type' => 'color-alpha',
        'default' => '#161616',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $page_prefix . ' .xt_woovs-tooltip',
                'property' => 'background-color'
            ),
            array(
                'element' => $page_prefix . ' .xt_woovs-tooltip',
                'property' => 'border-color'
            ),
            array(
                'element' => $page_prefix . ' .xt_woovs-tooltip:after',
                'property' => 'border-top-color'
            ),
        )
    );

    $fields[] = array(
        'id' => $type . '_swatch_tooltip_text_color',
        'section' => $type . '-swatch-general',
        'label' => esc_html__('Swatch Tooltip Text Color', 'xt-woo-variation-swatches'),
        'type' => 'color-alpha',
        'default' => '#fff',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $page_prefix . ' .xt_woovs-tooltip',
                'property' => 'color'
            )
        )
    );

    if ($type === 'archives') {

        $fields[] = array(
            'id' => $type . '_catalog_mode_settings',
            'section' => $type . '-swatch-general',
            'label' => esc_html__('Catalog Mode', 'xt-woo-variation-swatches'),
            'type' => 'custom'
        );

        $fields[] = array(
            'id' => $type . '_catalog_mode',
            'section' => $type . '-swatch-general',
            'label' => esc_html__('Enable Catalog Mode', 'xt-woo-variation-swatches'),
            'type' => 'radio-buttonset',
            'choices' => array(
                '0' => esc_attr__('No', 'xt-woo-variation-swatches'),
                '1' => esc_attr__('Yes', 'xt-woo-variation-swatches')
            ),
            'default' => '0'
        );

        $fields[] = array(
            'id' => $type . '_catalog_mode_attributes',
            'section' => $type . '-swatch-general',
            'label' => esc_html__('Select Attributes', 'xt-woo-variation-swatches'),
            'description' => esc_html__('Select attributes that will be used as catalog mode. If more than one attribute is available, only the first one will be shown.', 'xt-woo-variation-swatches'),
            'type' => 'repeater',
            'row_label' => array(
                'type' => 'text',
                'value' => esc_html__('Custom attribute', 'xt-woo-variation-swatches'),
            ),
            'default' => array(),
            'fields' => array(
                'attribute' => array(
                    'type' => 'select',
                    'choices' => $this->get_product_attributes_options(),
                    'label' => esc_html__('Custom Attribute', 'xt-woo-variation-swatches'),
                    'default' => 'color',
                )
            ),
            'active_callback' => array(
                array(
                    'setting' => $type . '_catalog_mode',
                    'operator' => '==',
                    'value' => '1',
                ),
            )
        );

        $fields[] = array(
            'id' => $type . '_catalog_mode_custom_attributes',
            'section' => $type . '-swatch-general',
            'label' => esc_html__('Select Custom Attributes', 'xt-woo-variation-swatches'),
            'description' => esc_html__('Enter custom attribute names that will be used as catalog mode. If more than one attribute is available, only the first one will be shown.', 'xt-woo-variation-swatches'),
            'type' => 'repeater',
            'row_label' => array(
                'type' => 'text',
                'value' => esc_html__('Custom attribute', 'xt-woo-variation-swatches'),
            ),
            'default' => array(),
            'fields' => array(
                'attribute' => array(
                    'type' => 'text',
                    'label' => esc_html__('Custom Attribute', 'xt-woo-variation-swatches'),
                    'default' => '',
                )
            ),
            'active_callback' => array(
                array(
                    'setting' => $type . '_catalog_mode',
                    'operator' => '==',
                    'value' => '1',
                ),
            ),
        );
    }

} else {

    $fields[] = array(
        'id' => $type . '_general_features',
        'section' => $type . '-swatch-general',
        'type' => 'xt-premium',
        'default' => array(
            'type' => 'image',
            'value' => $this->core->plugin_url() . 'admin/customizer/assets/images/' . $type . '-general.png',
            'link' => $this->core->plugin_upgrade_url()
        )
    );
}