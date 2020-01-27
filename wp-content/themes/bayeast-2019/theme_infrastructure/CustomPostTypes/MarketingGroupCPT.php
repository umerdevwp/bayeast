<?php
namespace ThemeInfrastructure\CustomPostTypes;

class MarketingGroupCPT
{
    public static function setupMarketingGroups()
	{
        self::createMarketinGroupPostType();
		    self::addMarketingGroupACF();
    }

    public static function createMarketinGroupPostType()
    {
        register_post_type( 'marketing-group',
        array(
          'labels' => array(
            'name' => __( 'Marketing Groups' ),
            'singular_name' => __( 'Marketing Group' )
          ),
          'public' => true,
          'show_ui' => true,
          'hierarchical' => false,
          'show_in_rest' => true,
          'supports' => array( 'title', 'thumbnail'),
          'menu_icon' => 'dashicons-groups',
          'rewrite' => array( 'slug' => 'marketing-groups'),
        )

      );
      flush_rewrite_rules();
    }

    public static function addMarketingGroupACF()
    {
      if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array (
          'key' => 'group_marketing_group_fields',
          'title' => 'Marketing Group Details',
          'fields' => array (
            array(
        			'key' => 'field_5c58b7c4e6465',
        			'label' => 'General Details',
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
        			'key' => 'field_5c58b288a5b27',
        			'label' => 'Day',
        			'name' => 'day',
        			'type' => 'text',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '50',
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
        			'key' => 'field_5c58b2c3a5b28',
        			'label' => 'Time',
        			'name' => 'time',
        			'type' => 'text',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '50',
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
        			'key' => 'field_5c58b2d3a5b29',
        			'label' => 'Admission Price',
        			'name' => 'admission_price',
        			'type' => 'text',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '50',
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
        			'key' => 'field_5c58b3c0a5b2c',
        			'label' => 'President',
        			'name' => 'president',
        			'type' => 'text',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '50',
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
        			'key' => 'field_5c58b2eca5b2a',
        			'label' => 'Location Name',
        			'name' => 'location_name',
        			'type' => 'text',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '50',
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
        			'key' => 'field_5c58b2ffa5b2b',
        			'label' => 'Location Address',
        			'name' => 'location_address',
        			'type' => 'textarea',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '50',
        				'class' => '',
        				'id' => '',
        			),
        			'default_value' => '',
        			'placeholder' => '',
        			'maxlength' => '',
        			'rows' => 2,
        			'new_lines' => '',
        		),
        		array(
        			'key' => 'field_5c58b3efa5b2d',
        			'label' => 'Email Address',
        			'name' => 'email_address',
        			'type' => 'text',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '50',
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
        			'key' => 'field_5c58b3f9a5b2e',
        			'label' => 'Phone Number',
        			'name' => 'phone_number',
        			'type' => 'text',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '50',
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
        			'key' => 'field_5c58b408a5b2f',
        			'label' => 'Facebook URL',
        			'name' => 'facebook_url',
        			'type' => 'url',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '100',
        				'class' => '',
        				'id' => '',
        			),
        			'default_value' => '',
        			'placeholder' => '',
        		),
        		array(
        			'key' => 'field_5c58b42ccedff',
        			'label' => 'Broker Tour',
        			'name' => 'broker_tour',
        			'type' => 'wysiwyg',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '100',
        				'class' => '',
        				'id' => '',
        			),
        			'default_value' => '',
        			'tabs' => 'full',
        			'toolbar' => 'basic',
        			'media_upload' => 0,
        			'delay' => 0,
        		),
        		array(
        			'key' => 'field_5c58b439cee00',
        			'label' => 'Extra Content',
        			'name' => 'extra_content',
        			'type' => 'wysiwyg',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '100',
        				'class' => '',
        				'id' => '',
        			),
        			'default_value' => '',
              'tabs' => 'full',
        			'toolbar' => 'full',
        			'media_upload' => 0,
        			'delay' => 0,
        		),
        		array(
        			'key' => 'field_5c58b7d8e6466',
        			'label' => 'Sponsors',
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
        			'key' => 'field_5c58b46fcee01',
        			'label' => 'Sponsors',
        			'name' => 'sponsors_repeater',
        			'type' => 'repeater',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '',
        				'class' => '',
        				'id' => '',
        			),
        			'collapsed' => 'field_5c58b4a7a2d63',
        			'min' => 0,
        			'max' => 0,
        			'layout' => 'row',
        			'button_label' => 'Add Sponser',
        			'sub_fields' => array(
        				array(
        					'key' => 'field_5c58b4a7a2d63',
        					'label' => 'Sponser Name',
        					'name' => 'sponsor_name',
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
        					'key' => 'field_5c58b4b2a2d64',
        					'label' => 'Company',
        					'name' => 'company',
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
        					'key' => 'field_5c58b4c5a2d65',
        					'label' => 'Phone Number',
        					'name' => 'phone_number',
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
        					'key' => 'field_5c58b4cfa2d66',
        					'label' => 'Email Address',
        					'name' => 'email_address',
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
        			'key' => 'field_5c58b80ce6467',
        			'label' => 'Upcoming Events',
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
        			'key' => 'field_5c58b4fba2d67',
        			'label' => 'Upcoming Events',
        			'name' => 'upcoming_events',
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
        				0 => 'tribe_events',
        			),
        			'taxonomy' => array(

        			),
        			'filters' => array(
        				0 => 'search',
        			),
        			'elements' => '',
        			'min' => '',
        			'max' => '',
        			'return_format' => 'object',
        		),

          ),
          'location' => array (
        		array (
        			array (
        				'param' => 'post_type',
        				'operator' => '==',
        				'value' => 'marketing-group',
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
