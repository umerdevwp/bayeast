<?php
namespace ThemeInfrastructure\ACF;

class ACFTemplatePartFields
{

    public static function setup()
    {
        self::setupTemplatePartsFields();
    }

    private static function setupTemplatePartsFields()
    {
      if( function_exists('acf_add_local_field_group') ):
        acf_add_local_field_group(array(
        	'key' => 'group_5c59b0d1b790a',
        	'title' => 'Internal Page Hero',
        	'fields' => array(
        		array(
        			'key' => 'field_internal_hero_content',
        			'label' => 'Hero Content',
        			'name' => 'hero_content',
        			'type' => 'wysiwyg',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '50',
        				'class' => '',
        				'id' => '',
        			),
        			'default_value' => '',
        			'tabs' => 'all',
        			'toolbar' => 'basic',
        			'media_upload' => 0,
        			'delay' => 0,
        		),
            array(
              'key' => 'field_internal_hero_additional',
              'label' => 'Additional Content Callout',
              'name' => 'additional_content',
              'type' => 'wysiwyg',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '50',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'tabs' => 'all',
              'toolbar' => 'basic',
              'media_upload' => 0,
              'delay' => 0,
            ),
        	),
          'location' => array(
        		array(
              array(
            		'param' => 'post_type',
            		'operator' => '==',
            		'value' => 'page',
            	),
              array(
                'param' => 'post_type',
                'operator' => '!=',
                'value' => 'tribe_events',
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
