<?php
/** @global $type */
/** @global $element_prefix */
/** @global $page_prefix */

if (($type === 'archives' && $this->core->access_manager()->can_use_premium_code__premium_only()) || ($type === 'single')) {

    $fields[] = array(
        'id' => $type . '_label_swatch_style',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Style', 'xt-woo-variation-swatches'),
        'type' => 'radio',
        'default' => 'xt_woovs-square',
        'choices' => array(
            'xt_woovs-square' => esc_html__('Square', 'xt-woo-variation-swatches'),
            'xt_woovs-round' => esc_html__('Circle', 'xt-woo-variation-swatches'),
            'xt_woovs-round_corner' => esc_html__('Rounded', 'xt-woo-variation-swatches'),
        ),
        'transport' => 'postMessage',
        'js_vars' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .xt_woovs-swatches .swatch.swatch-label',
                'function' => 'class'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_min_width',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Min Width', 'xt-woo-variation-swatches'),
        'default' => self::types_default_values($type, 50, 25),
        'type' => 'slider',
        'choices' => array(
            'min' => '10',
            'max' => '100',
            'step' => '1',
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .xt_woovs-swatches .swatch.swatch-label',
                'property' => 'min-width',
                'value_pattern' => '$px'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .xt_woovs-swatches .swatch.swatch-label',
                'property' => 'min-width',
                'value_pattern' => '$px'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_height',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Height', 'xt-woo-variation-swatches'),
        'default' => self::types_default_values($type, 30, 20),
        'type' => 'slider',
        'choices' => array(
            'min' => '10',
            'max' => '100',
            'step' => '1',
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .xt_woovs-swatches .swatch.swatch-label',
                'property' => 'height',
                'value_pattern' => '$px'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .xt_woovs-swatches .swatch.swatch-label',
                'property' => 'line-height',
                'value_pattern' => '$px'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_size',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Font Size', 'xt-woo-variation-swatches'),
        'default' => self::types_default_values($type, 13, 10),
        'type' => 'slider',
        'choices' => array(
            'min' => '10',
            'max' => '60',
            'step' => '1',
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .xt_woovs-swatches .swatch.swatch-label',
                'property' => 'font-size',
                'value_pattern' => '$px'
            )
        )
    );
}

if ($this->core->access_manager()->can_use_premium_code__premium_only()) {

    $fields[] = array(
        'id' => $type . '_label_swatch_color',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Color', 'xt-woo-variation-swatches'),
        'type' => 'color',
        'default' => '#666',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .xt_woovs-swatches .swatch.swatch-label',
                'property' => 'color'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_color_hover',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Hover Color', 'xt-woo-variation-swatches'),
        'type' => 'color',
        'default' => '#000',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .xt_woovs-swatches .swatch.swatch-label:not(.xt_woovs-selected):not(.xt_woovs-disabled):hover',
                'property' => 'color'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_color_selected',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Selected Color', 'xt-woo-variation-swatches'),
        'type' => 'color',
        'default' => '#fff',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .xt_woovs-swatches .swatch.swatch-label.xt_woovs-selected',
                'property' => 'color'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_background',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Background', 'xt-woo-variation-swatches'),
        'type' => 'color',
        'default' => '#fff',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .xt_woovs-swatches .swatch.swatch-label',
                'property' => 'background-color'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_background_hover',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Hover Background', 'xt-woo-variation-swatches'),
        'type' => 'color',
        'default' => '#c8c8c8',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .xt_woovs-swatches .swatch.swatch-label:not(.xt_woovs-selected):not(.xt_woovs-disabled):hover',
                'property' => 'background-color'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_background_selected',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Selected Background', 'xt-woo-variation-swatches'),
        'type' => 'color',
        'default' => '#000000',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .xt_woovs-swatches .swatch.swatch-label.xt_woovs-selected',
                'property' => 'background-color'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_border',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Border Color', 'xt-woo-variation-swatches'),
        'type' => 'color',
        'default' => '#eaeaea',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .xt_woovs-swatches .swatch.swatch-label',
                'property' => 'box-shadow',
                'value_pattern' => '0 0 0 1px $'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_border_hover',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Hover Border Color', 'xt-woo-variation-swatches'),
        'type' => 'color',
        'default' => '#c8c8c8',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .xt_woovs-swatches .swatch.swatch-label:not(.xt_woovs-selected):not(.xt_woovs-disabled):hover',
                'property' => 'box-shadow',
                'value_pattern' => '0 0 0 2px $'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_border_selected',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Selected Border Color', 'xt-woo-variation-swatches'),
        'type' => 'color',
        'default' => '#000000',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .xt_woovs-swatches .swatch.swatch-label.xt_woovs-selected',
                'property' => 'box-shadow',
                'value_pattern' => '0 0 0 2px $'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_tooltip',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Tooltip', 'xt-woo-variation-swatches'),
        'type' => 'radio',
        'default' => 'text',
        'choices' => array(
            'disabled' => esc_html__('Disabled', 'xt-woo-variation-swatches'),
            'text' => esc_html__('Text', 'xt-woo-variation-swatches'),
            'image' => esc_html__('Image', 'xt-woo-variation-swatches'),
        )
    );

} else {

    $fields[] = array(
        'id' => $type . '_label_features',
        'section' => $type . '-swatch-label',
        'type' => 'xt-premium',
        'default' => array(
            'type' => 'image',
            'value' => $this->core->plugin_url() . 'admin/customizer/assets/images/' . $type . '-label-swatch.png',
            'link' => $this->core->plugin_upgrade_url()
        )
    );
}