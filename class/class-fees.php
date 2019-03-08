<?php

class IPA_Fee{

    private static $post_type = 'fee_data';
    
    public static function save_new_fee( $data_array = [] ){

        if ( ! is_array ( $data_array ) ){
            throw new Exception("please provide valid array");   
        }


        return wp_insert_post(array(
            'post_title'=> $data_array['student_name'] .' -- '.$data_array['fee_student_ipa_id'].' -- Rs'. $data_array['fee_amount'] .' -- '. $data_array['fee_submit_date'] ,
            'post_status'=>'publish',
            'post_type' => self :: $post_type,
            'meta_input' => $data_array
        ));

        //$new_ipa_id = self :: generate_ipa_id( $data_array['course'], $student_id );
        
       // add_post_meta( $student_id, 'ipa_id', $new_ipa_id ,true);

        // wp_update_post(
        //     array(
        //         'ID' =>  $student_id,
        //         'post_title' => ucwords ( $data_array['student_name'] ) .' --- '. strtoupper( substr( $data_array['course'] , 0, 3) ) . $new_ipa_id 
        //     )
        // );

        // return  $student_id;


    }

    public static function get_all_fees( $filter_args = [] ){

        return get_posts( array(
                    'posts_per_page' => -1,
                    'post_type' =>self :: $post_type,
                    'post_status' => 'publish',
        ) );


    }

    public static function get_student_with_ipa_id( $id ='' ){}
    //public static function get_student_with_id(){}

}