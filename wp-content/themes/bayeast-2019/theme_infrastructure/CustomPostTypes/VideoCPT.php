<?php
namespace ThemeInfrastructure\CustomPostTypes;

class VideoCPT
{
    public static function setupVideos()
	{
        self::createVideoPostType();
		    self::addVideoACF();
    }

    public static function createVideoPostType()
    {
        register_post_type( 'video',
        array(
          'labels' => array(
            'name' => __( 'Videos' ),
            'singular_name' => __( 'Video' )
          ),
          'public' => true,
          'show_ui' => true,
          'hierarchical' => false,
          'show_in_rest' => true,
          'supports' => array( 'title'),
          'menu_icon' => 'dashicons-format-video',
          'taxonomies'    => array('video-category', 'post_tag'),
        )
      );
    }

    public static function addVideoACF()
    {
      if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array (
          'key' => 'group_video_fields',
          'title' => 'Video Details',
          'fields' => array (
            // array (
            //   'key' => 'field_video_cover_image',
            //   'label' => 'Video Cover Image',
            //   'name' => 'video_cover_image',
            //   'type' => 'image',
            //   'instructions' => '',
            //   'required' => 0,
            //   'conditional_logic' => 0,
            //   'wrapper' => array (
            //     'width' => '',
            //     'class' => '',
            //     'id' => '',
            //   ),
            //   'return_format' => 'id',
            //   'preview_size' => 'thumbnail',
            //   'library' => 'all',
            //   'min_width' => '',
            //   'min_height' => '',
            //   'min_size' => '',
            //   'max_width' => '',
            //   'max_height' => '',
            //   'max_size' => '',
            //   'mime_types' => '',
            // ),
            array (
              'key' => 'field_video_iframe',
              'label' => 'Video iFrame',
              'name' => 'embed_code',
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
        			'rows' => 4,
        			'new_lines' => '',
            ),
            array (
              'key' => 'field_video_decription',
              'label' => 'Video Description',
              'name' => 'video_description',
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
              'new_lines' => '',
            ),
          ),
          'location' => array (
        		array (
        			array (
        				'param' => 'post_type',
        				'operator' => '==',
        				'value' => 'video',
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

?>
