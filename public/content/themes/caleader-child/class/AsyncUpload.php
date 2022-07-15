<?php

class AsyncUpload {
    /**
     * @param
     * FILE OBJECT
     * $file = array('name','tmp_name','size')
     */
    public function upload($file) {
        $filename = basename($file['name']);
        // $upload_file = wp_upload_bits($filename, null, file_get_contents($file['name']));
        $upload_file = wp_upload_bits($filename, null, file_get_contents($file["tmp_name"]));
        if (!$upload_file['error']) {
            $wp_filetype = wp_check_filetype($filename, null );
            $attachment = array(
                'post_mime_type' => $wp_filetype['type'],
                'post_parent' => 0,
                'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
                'post_content' => '',
                'post_status' => 'inherit'
            );
            $attachment_id = wp_insert_attachment( $attachment, $upload_file['file'], 0 );
            if (!is_wp_error($attachment_id)) {
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                $attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload_file['file'] );
                wp_update_attachment_metadata( $attachment_id,  $attachment_data );
            }
            
            return $attachment_id;
        }

        return false;
    }
}