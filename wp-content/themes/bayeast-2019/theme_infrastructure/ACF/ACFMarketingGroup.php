<?php
namespace ThemeInfrastructure\ACF;

class ACFMarketingGroup
{

    public static function setup()
    {
        self::setupFields();
    }


    private static function setupFields()
    {
      if( function_exists('acf_add_local_field_group') ):
        acf_add_local_field_group(array(
        	'key' => 'group_5c632b650e2d3',
        	'title' => 'Marketing Groups',
        	'fields' => array(
        		array(
        			'key' => 'field_5c632b6d09fd6',
        			'label' => 'Calendar Image',
        			'name' => 'calendar_image',
        			'type' => 'image',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '',
        				'class' => '',
        				'id' => '',
        			),
        			'return_format' => 'id',
        			'preview_size' => 'thumbnail',
        			'library' => 'all',
        			'min_width' => '',
        			'min_height' => '',
        			'min_size' => '',
        			'max_width' => '',
        			'max_height' => '',
        			'max_size' => '',
        			'mime_types' => '',
        		),
        		array(
        			'key' => 'field_5c632b7d09fd7',
        			'label' => 'Marketing Groups',
        			'name' => 'marketing_groups',
        			'type' => 'relationship',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '',
        				'class' => '',
        				'id' => '',
        			),
        			'post_type' => array(
        				0 => 'marketing-group',
        			),
        			'taxonomy' => '',
        			'filters' => array(
        				0 => 'search',
        			),
        			'elements' => '',
        			'min' => '',
        			'max' => '',
        			'return_format' => 'object',
        		),
        	),
        	'location' => array(
        		array(
        			array(
        				'param' => 'page_template',
        				'operator' => '==',
        				'value' => 'page-marketing-groups.php',
        			),
        		),
        	),
        	'menu_order' => 0,
        	'position' => 'normal',
        	'style' => 'default',
        	'label_placement' => 'top',
        	'instruction_placement' => 'label',
        	'hide_on_screen' => '',
        	'active' => 1,
        	'description' => '',
        ));

        endif;
    }
}
