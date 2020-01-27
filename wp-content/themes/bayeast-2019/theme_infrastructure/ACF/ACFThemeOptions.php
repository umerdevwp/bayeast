<?php
namespace ThemeInfrastructure\ACF;

class ACFThemeOptions
{
    public static function setup()
    {
        self::addThemeOptionsPage();
    }
    private static function addThemeOptionsPage()
    {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page(array(
                'page_title' => 'Theme Settings',
                'menu_title' => 'Theme Settings',
                'menu_slug'  => 'theme-settings',
                'capability' => 'manage_options',
                'redirect'   => false,
            ));
            acf_add_local_field_group(array(
                'key'                   => 'group_5c5c7552ab713',
                'title'                 => 'Breaking News',
                'fields'                => array(
                    array(
                        'key'               => 'field_5c5c75761f431',
                        'label'             => 'Breaking News Message',
                        'name'              => 'breaking_news_message',
                        'type'              => 'text',
                        'instructions'      => 'Enter the message for the breaking news ticker for logged in users.	The ticker will only display if you\'ve entered a message here.',
                        'required'          => 0,
                        'conditional_logic' => 0,
                    ),
                    array(
                        'key'               => 'field_5c5c75b21f432',
                        'label'             => 'Breaking News Link',
                        'name'              => 'breaking_news_link',
                        'type'              => 'page_link',
                        'instructions'      => 'Select the page you\'d like "Read More" to link to.	This will only display if you\'ve selected a page link.',
                        'required'          => 0,
                        'conditional_logic' => 0,
                    ),
                ),
                'location'              => array(
                    array(
                        array(
                            'param'    => 'options_page',
                            'operator' => '==',
                            'value'    => 'theme-settings',
                        ),
                    ),
                ),
                'menu_order'            => 0,
                'position'              => 'normal',
                'style'                 => 'default',
                'label_placement'       => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen'        => '',
                'active'                => 1,
                'description'           => '',
            ));
            acf_add_local_field_group(array(
                'key'      => 'group_events_options',
                'title'    => 'Events Page Settings',
                'fields'   => array(
                  array(
                      'key'          => 'field_events_page_hero_headline',
                      'label'        => 'Events Page Hero Headline',
                      'name'         => 'events_page_hero_headline',
                      'type'         => 'text',
                      'instructions' => 'Enter copyright text you\'d like to display in the hero area on the Events page',
                  ),
                    array(
                        'key'          => 'field_events_page_hero_cotnent',
                        'label'        => 'Events Page Hero Content',
                        'name'         => 'events_page_hero_content',
                        'type'         => 'textarea',
                        'instructions' => 'Enter copyright text you\'d like to display in the hero area on the Events page',
                    ),
                    array(
                      'key' => 'field_events_page_image',
                      'label' => 'Events Page Hero Image',
                      'name' => 'events_page_hero_image',
                      'type' => 'image',
                      'instructions' => '',
                      'required' => 0,
                      'conditional_logic' => 0,
                      'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                      ),
                      'return_format' => 'url',
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
                ),
                'location' => array(
                    array(
                        array(
                            'param'    => 'options_page',
                            'operator' => '==',
                            'value'    => 'theme-settings',
                        ),
                    ),
                ),
            ));
            acf_add_local_field_group(array(
                'key'      => 'group_5c5de28916a0a',
                'title'    => 'Footer Copyright Text',
                'fields'   => array(
                    array(
                        'key'          => 'field_5c5de2a0235fa',
                        'label'        => 'Footer Copyright Text',
                        'name'         => 'footer_copyright_text',
                        'type'         => 'text',
                        'instructions' => 'Enter copyright text you\'d like to display below the logo in the footer',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param'    => 'options_page',
                            'operator' => '==',
                            'value'    => 'theme-settings',
                        ),
                    ),
                ),
            ));
            acf_add_local_field_group(array(
                'key'                   => 'group_payment_portal',
                'title'                 => 'Payment Portal',
                'fields'                => array(
                    array(
                        'key'               => 'field_payment_portal_headline',
                        'label'             => 'Payment Portal Headline',
                        'name'              => 'payment_portal_headine',
                        'type'              => 'text',
                        'required'          => 0,
                        'conditional_logic' => 0,
                    ),
                    array(
                        'key'               => 'field_payment_portal_link_label',
                        'label'             => 'Payment Portal Link Label',
                        'name'              => 'payment_portal_link_label',
                        'type'              => 'text',
                        'required'          => 0,
                        'conditional_logic' => 0,
                    ),
                    array(
                        'key'               => 'field_payment_portal_link_url',
                        'label'             => 'Payment Portal Link URL',
                        'name'              => 'payment_portal_link_url',
                        'type'              => 'url',
                        'required'          => 0,
                        'conditional_logic' => 0,
                    ),
                ),
                'location'              => array(
                    array(
                        array(
                            'param'    => 'options_page',
                            'operator' => '==',
                            'value'    => 'theme-settings',
                        ),
                    ),
                ),
                'menu_order'            => 0,
                'position'              => 'normal',
                'style'                 => 'default',
                'label_placement'       => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen'        => '',
                'active'                => 1,
                'description'           => '',
			));
			acf_add_local_field_group(array(
				'key' => 'group_5c649423da186',
				'title' => 'Social Media Icons',
				'fields' => array(
					array(
						'key' => 'field_5c6494d377506',
						'label' => 'Facebook URL',
						'name' => 'facebook_url',
						'type' => 'url',
						'instructions' => 'Enter the URL you\'d like attached to the Facebook icon in the footer',
						'required' => 0,
						'conditional_logic' => 0,
						'default_value' => '',
						'placeholder' => '',
					),
					array(
						'key' => 'field_5c64951577507',
						'label' => 'Twitter URL',
						'name' => 'twitter_url',
						'type' => 'url',
						'instructions' => 'Enter the URL you\'d like attached to the Twitter icon in the footer',
						'required' => 0,
						'conditional_logic' => 0,
						'default_value' => '',
						'placeholder' => '',
					),
					array(
						'key' => 'field_5c64952e77508',
						'label' => 'Instagram URL',
						'name' => 'instagram_url',
						'type' => 'url',
						'instructions' => 'Enter the URL you\'d like attached to the Facebook icon in the footer',
						'required' => 0,
						'conditional_logic' => 0,
						'default_value' => '',
						'placeholder' => '',
					),
					array(
						'key' => 'field_5c64953c77509',
						'label' => 'YouTube URL',
						'name' => 'youtube_url',
						'type' => 'url',
						'instructions' => 'Enter the URL you\'d like attached to the Facebook icon in the footer',
						'required' => 0,
						'conditional_logic' => 0,
						'default_value' => '',
						'placeholder' => '',
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'options_page',
							'operator' => '==',
							'value' => 'theme-settings',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'active' => 1,
				'description' => 'Enter URLs for social media accounts you would like to link to in the footer.	If no URL is entered for a specific item, the corresponding icon will not appear.',
			));
			acf_add_local_field_group(array(
				'key' => 'group_5c6459d608da3',
				'title' => 'Footer Addresses',
				'fields' => array(
					array(
						'key' => 'field_5c6459f4827d1',
						'label' => 'Footer Addresses',
						'name' => 'footer_addresses',
						'type' => 'repeater',
						'instructions' => 'Enter addresses to display in the footer',
						'required' => 0,
						'conditional_logic' => 0,
						'collapsed' => '',
						'min' => 0,
						'max' => 0,
						'layout' => 'row',
						'button_label' => 'Add an address',
						'sub_fields' => array(
							array(
								'key' => 'field_5c645a30827d2',
								'label' => 'Address',
								'name' => 'address',
								'type' => 'wysiwyg',
								'instructions' => 'Enter an address you\'d like to appear in the footer',
								'required' => 0,
								'conditional_logic' => 0,
								'default_value' => '',
								'tabs' => 'all',
								'toolbar' => 'full',
								'media_upload' => 1,
								'delay' => 0,
							),
						),
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'options_page',
							'operator' => '==',
							'value' => 'theme-settings',
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
        }
        self::addThemeOptionsFields();
    }
    private static function addThemeOptionsFields()
    {
        // Add acf_add_options_page code here
    }
}
