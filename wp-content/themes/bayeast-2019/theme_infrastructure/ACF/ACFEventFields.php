<?php
namespace ThemeInfrastructure\ACF;

class ACFEventFields
{

    public static function setup()
    {

        self::setupEventFields();
    }

    private static function setupEventFields()
    {
      if( function_exists('acf_add_local_field_group') ):
        acf_add_local_field_group(array(
          'key' => 'group_event_additional_fields',
          'title' => 'Event Additional Fields',
          'fields' => array(
            array(
              'key' => 'field_event_price_info',
              'label' => 'Additional Pricing Information',
              'name' => 'additional_pricing_information',
              'type' => 'textarea',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '100',
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
              'key' => 'field_event_register_link',
              'label' => 'Register Link',
              'name' => 'register_link',
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
