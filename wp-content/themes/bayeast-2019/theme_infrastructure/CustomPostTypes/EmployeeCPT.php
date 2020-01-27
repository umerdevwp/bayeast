<?php
namespace ThemeInfrastructure\CustomPostTypes;

class EmployeeCPT
{
    public static function setupEmployees()
	{
        self::createEmployeePostType();
		    self::addEmployeeACF();
    }

    public static function createEmployeePostType()
    {
        register_post_type( 'employee',
        array(
          'labels' => array(
            'name' => __( 'Employees' ),
            'singular_name' => __( 'Employee' )
          ),
          'exclude_from_search' => true,
          'publicly_queryable' => false,
          'show_ui' => true,
          'show_in_nav_menus' => false,
          'show_in_menu' => true,
          'supports' => array( 'title'),
          'show_in_rest' => true,
          'has_archive' => false,
          'menu_icon' => 'dashicons-id',
        )
      );
    }

    public static function addEmployeeACF()
    {
      if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array (
          'key' => 'group_employee_information',
          'title' => 'Employee Information',
          'fields' => array (
            array (
              'key' => 'field_employee_image',
              'label' => 'Employee Image',
              'name' => 'employee_image',
              'type' => 'image',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array (
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
            array (
              'key' => 'field_employee_title',
              'label' => 'Employee Title',
              'name' => 'employee_title',
              'type' => 'text',
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
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
            array (
              'key' => 'field_employee_email',
              'label' => 'Employee Email Address',
              'name' => 'employee_email',
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array (
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
            array (
              'key' => 'field_employee_phone',
              'label' => 'Employee Phone Number',
              'name' => 'employee_phone',
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array (
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
            array (
              'key' => 'field_employee_company',
              'label' => 'Employee Company Name',
              'name' => 'employee_company',
              'type' => 'text',
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
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
            array (
              'key' => 'field_employee_address',
              'label' => 'Employee Company Address',
              'name' => 'employee_address',
              'type' => 'textarea',
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
        			'rows' => 2,
        			'new_lines' => '',
            ),
            array (
              'key' => 'field_employee_video_link',
              'label' => 'Video Link',
              'name' => 'employee_video_link',
              'type' => 'page_link',
        			'instructions' => '',
        			'required' => 0,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '',
        				'class' => '',
        				'id' => '',
        			),
        			'post_type' => array(
        				0 => 'video',
        			),
        			'taxonomy' => '',
        			'allow_null' => 0,
        			'allow_archives' => 1,
        			'multiple' => 0,
            ),
          ),
          'location' => array (
        		array (
        			array (
        				'param' => 'post_type',
        				'operator' => '==',
        				'value' => 'employee',
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
