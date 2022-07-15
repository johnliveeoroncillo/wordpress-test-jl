<?php
$prefix = '_carleader_listing_';
$fields = [];
 $fields[] = [
 	  			'name' => esc_html__( 'Video', 'caleader-listing' ),
  				'id'   => $prefix . 'videos',
                // Group field
                'type'   => 'group',
                // Clone whole group?
                'clone'  => true,
                // Drag and drop clones to reorder them?
                'sort_clone' => true,
                // Sub-fields
                'fields' => array(
                    
                    array(
                        'name' => esc_html__( 'Video Type', 'caleader-listing' ),
                        'id'   => 'video_type',
                        'type' => 'select',
                        // Array of 'value' => 'Label' pairs
                          'options'         => array(
                              'youtube'       => 'youtube',
                              'video' => 'video',
                          ),
                    ),
                    array(
                        'name' => esc_html__( 'Video Url', 'caleader-listing' ),
                        'id'   => 'video_url',
                        'type' => 'text',
                    ),
                    array(
                        'name'             => esc_html__( 'Image Upload', 'caleader-listing' ),
                        'id'               => 'video_image',
                        'type'             => 'image_advanced',
                        // Maximum image uploads
                        'max_file_uploads' => 1,
                    ),
                ),
        ];
return [
  'id'         => $prefix . 'video',
  'title'      => esc_html__( 'Videos', 'caleader-listing' ),
  'post_types' => 'carleader-listing',
  'fields'     => $fields,
];