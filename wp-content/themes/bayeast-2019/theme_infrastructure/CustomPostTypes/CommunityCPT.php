<?php
namespace ThemeInfrastructure\CustomPostTypes;

class CommunityCPT
{
    public static function setupCommunities()
	{
        self::createCommunityPostType();
        self::addCommunityACF();
    }

    public static function createCommunityPostType()
    {
        register_post_type( 'community',
        array(
          'labels' => array(
            'name' => __( 'Communities' ),
            'singular_name' => __( 'Community' )
          ),
          'public' => true,
          'show_ui' => true,
          'hierarchical' => false,
          'show_in_rest' => true,
          'supports' => array( 'title'),
          'menu_icon' => 'dashicons-location-alt',
        )
      );
    }

    public static function addCommunityACF()
    {
      if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array (
          'key' => 'group_community_fields',
          'title' => 'Community Information',
          'fields' => array (
            array(
        			'key' => 'field_5c58be16dbac7',
        			'label' => 'Location',
        			'name' => '',
        			'type' => 'tab',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '',
        				'class' => '',
        				'id' => '',
        			),
        			'placement' => 'top',
        			'endpoint' => 0,
        		),
            array(
        			'key' => 'field_5c8fce0ed5400',
        			'label' => 'Address',
        			'name' => 'address',
        			'type' => 'google_map',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '',
        				'class' => '',
        				'id' => '',
        			),
        			'center_lat' => '',
        			'center_lng' => '',
        			'zoom' => '',
        			'height' => '',
        		),
        		array(
        			'key' => 'field_5c58be97dbaca',
        			'label' => 'Quick Stats',
        			'name' => '',
        			'type' => 'tab',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '',
        				'class' => '',
        				'id' => '',
        			),
        			'placement' => 'top',
        			'endpoint' => 0,
        		),
        		array(
        			'key' => 'field_5c58bea1dbacb',
        			'label' => 'Statistic',
        			'name' => 'statistic',
        			'type' => 'repeater',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '',
        				'class' => '',
        				'id' => '',
        			),
        			'collapsed' => '',
        			'min' => 0,
        			'max' => 0,
        			'layout' => 'table',
        			'button_label' => '',
        			'sub_fields' => array(
        				array(
        					'key' => 'field_5c58beb5dbacc',
        					'label' => 'Number',
        					'name' => 'number',
        					'type' => 'text',
        					'instructions' => '',
        					'required' => 0,
        					'conditional_logic' => 0,
        					'wrapper' => array(
        						'width' => '',
        						'class' => '',
        						'id' => '',
        					),
        					'default_value' => '',
        					'placeholder' => '',
        					'prepend' => '',
        					'append' => '',
        					'maxlength' => '',
        				),
        				array(
        					'key' => 'field_5c58bebbdbacd',
        					'label' => 'Title',
        					'name' => 'title',
        					'type' => 'text',
        					'instructions' => '',
        					'required' => 0,
        					'conditional_logic' => 0,
        					'wrapper' => array(
        						'width' => '',
        						'class' => '',
        						'id' => '',
        					),
        					'default_value' => '',
        					'placeholder' => '',
        					'prepend' => '',
        					'append' => '',
        					'maxlength' => '',
        				),
        			),
        		),
        		array(
        			'key' => 'field_5c58bec6dbace',
        			'label' => 'PDFs',
        			'name' => '',
        			'type' => 'tab',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '',
        				'class' => '',
        				'id' => '',
        			),
        			'placement' => 'top',
        			'endpoint' => 0,
        		),
        		array(
        			'key' => 'field_5c58bedbdbacf',
        			'label' => 'Files',
        			'name' => 'pdf_files',
        			'type' => 'repeater',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '',
        				'class' => '',
        				'id' => '',
        			),
        			'collapsed' => '',
        			'min' => 0,
        			'max' => 0,
        			'layout' => 'table',
        			'button_label' => '',
        			'sub_fields' => array(
        				array(
        					'key' => 'field_5c58bef2dbad0',
        					'label' => 'PDF Title',
        					'name' => 'pdf_title',
        					'type' => 'text',
        					'instructions' => '',
        					'required' => 0,
        					'conditional_logic' => 0,
        					'wrapper' => array(
        						'width' => '',
        						'class' => '',
        						'id' => '',
        					),
        					'default_value' => '',
        					'placeholder' => '',
        					'prepend' => '',
        					'append' => '',
        					'maxlength' => '',
        				),
        				array(
        					'key' => 'field_5c58befadbad1',
        					'label' => 'PDF File',
        					'name' => 'pdf_file',
        					'type' => 'file',
        					'instructions' => '',
        					'required' => 0,
        					'conditional_logic' => 0,
        					'wrapper' => array(
        						'width' => '',
        						'class' => '',
        						'id' => '',
        					),
        					'return_format' => 'array',
        					'library' => 'all',
        					'min_size' => '',
        					'max_size' => '',
        					'mime_types' => '',
        				),
        			),
        		),
        		array(
        			'key' => 'field_5c58bf3cdbad2',
        			'label' => 'Additional Content',
        			'name' => '',
        			'type' => 'tab',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '',
        				'class' => '',
        				'id' => '',
        			),
        			'placement' => 'top',
        			'endpoint' => 0,
        		),
        		array(
        			'key' => 'field_5c58bf59dbad3',
        			'label' => 'Tabbed Content',
        			'name' => 'tabbed_content',
        			'type' => 'repeater',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '',
        				'class' => '',
        				'id' => '',
        			),
        			'collapsed' => '',
        			'min' => 0,
        			'max' => 0,
        			'layout' => 'row',
        			'button_label' => '',
        			'sub_fields' => array(
        				array(
        					'key' => 'field_5c58bf62dbad4',
        					'label' => 'Tab Label',
        					'name' => 'tab_label',
        					'type' => 'text',
        					'instructions' => '',
        					'required' => 0,
        					'conditional_logic' => 0,
        					'wrapper' => array(
        						'width' => '',
        						'class' => '',
        						'id' => '',
        					),
        					'default_value' => '',
        					'placeholder' => '',
        					'prepend' => '',
        					'append' => '',
        					'maxlength' => '',
        				),
        				array(
        					'key' => 'field_5c58bf68dbad5',
        					'label' => 'Tab Content',
        					'name' => 'tab_content',
        					'type' => 'wysiwyg',
        					'instructions' => '',
        					'required' => 0,
        					'conditional_logic' => 0,
        					'wrapper' => array(
        						'width' => '',
        						'class' => '',
        						'id' => '',
        					),
        					'default_value' => '',
        					'tabs' => 'all',
        					'toolbar' => 'full',
        					'media_upload' => 1,
        					'delay' => 0,
        				),
        			),
        		),
          ),
          'location' => array (
        		array (
        			array (
        				'param' => 'post_type',
        				'operator' => '==',
        				'value' => 'community',
        			),
        		),
        	),
          'menu_order' => 0,
          'position' => 'normal',
          'style' => 'default',
          'label_placement' => 'top',
          'instruction_placement' => 'label',
          'hide_on_screen' => array(
        		0 => 'the_content',
        	),
          'active' => 1,
          'description' => '',
        ));

        endif;
    }
}

?>
