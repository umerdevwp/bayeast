<?php
namespace ThemeInfrastructure\CustomPostTypes;

class FaqCPT
{
    public static function setupFAQs()
	{
        self::createFAQPostType();
        self::addFAQACF();
    }

    public static function createFAQPostType()
    {
        register_post_type( 'faq',
        array(
          'labels' => array(
            'name' => __( 'FAQs' ),
            'singular_name' => __( 'FAQ' )
          ),
          'exclude_from_search' => false,
          'publicly_queryable' => false,
          'show_ui' => true,
          'show_in_nav_menus' => false,
          'show_in_menu' => true,
          'supports' => array( 'title'),
          'show_in_rest' => true,
          'has_archive' => true,
          'menu_icon' => 'dashicons-lightbulb',
        )
      );
    }

    public static function addFAQACF()
    {
      if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array (
          'key' => 'group_faq_fields',
          'title' => 'FAQ Answer',
          'fields' => array (
            array (
              'key' => 'field_faq_answer',
              'label' => '',
              'name' => 'faq_answer',
              'type' => 'wysiwyg',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array (
                'width' => '100',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
        			'placeholder' => '',
        			'maxlength' => '',
        			'rows' => 4,
        			'new_lines' => '',
            ),
          ),
          'location' => array (
        		array (
        			array (
        				'param' => 'post_type',
        				'operator' => '==',
        				'value' => 'faq',
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
