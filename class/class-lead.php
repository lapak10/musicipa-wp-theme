<?php

class IPA_Lead{

    private static $post_type = 'lead_data';
    
    public static function save_new_lead( $data_array = [] ){

        if ( ! is_array ( $data_array ) ){
            throw new Exception("Value must be 1 or below");   
        }


        $lead_id = wp_insert_post(array(
            'post_title'=>ucwords ( $data_array['lead_student_name'] ),
            'post_status'=>'publish',
            'post_type' =>  self :: $post_type ,
            'meta_input' => $data_array
        ));


        return  $lead_id;
    }

   

    public static function get_lead_with_id($id = ''){}

    public static function get_all_leads( $filter_args = [] ){

        return get_posts( array(
            'posts_per_page' => -1,
            'post_type' =>self :: $post_type,
            'post_status' => 'publish',
) );
         
    }

  
}