<?php

class IPA_Student{

    private static $post_type = 'students_data';
    
    public static function save_new_student( $data_array = [] ){

        if ( ! is_array ( $data_array ) ){
            throw new Exception("Value must be 1 or below");   
        }


        $student_id = wp_insert_post(array(
            'post_title'=>ucwords ( $data_array['student_name'] ),
            'post_status'=>'publish',
            'post_type' => self :: $post_type,
            'meta_input' => $data_array
        ));

        $new_ipa_id = self :: generate_ipa_id( $data_array['course'], $student_id );
        
        add_post_meta( $student_id, 'ipa_id', $new_ipa_id ,true);

        wp_update_post(
            array(
                'ID' =>  $student_id,
                'post_title' => ucwords ( $data_array['student_name'] ) .' --- '. strtoupper( substr( $data_array['course'] , 0, 3) ) . $new_ipa_id 
            )
        );

        return  $student_id;
    }

    private static function generate_ipa_id ( $course = '' ,$student_id = 0 ) {

        if( ! is_string($course) OR $course == '' OR (int) $student_id < 1){
            return false;
        }
        
       // return strtoupper( substr($course, 0, 3) ) . '1'. str_pad( $student_id , 5, "0", STR_PAD_LEFT);
       // return strtoupper( substr($course, 0, 3) ) . ( 10000 + absint( $student_id ) );

       return 10000 + absint( $student_id );


    }

    public static function get_student_with_id($id = ''){

        //       $id = 'In My Cart : items';
           preg_match_all('!\d+!', $id, $matches);
       
           if( count( $matches[0] ) === 0 ){
               return -2;
           }
               
               $args = array( 
                   'posts_per_page' => 1,
                   'post_type' =>self :: $post_type,
                    'post_status' => 'publish',
                    
                    'meta_query' => array(
                    
                    array('key' => 'ipa_id','value' => $matches[0][0] )
                   
                    ));
               
              // return $matches[0][0];

               $matching_trucks = get_posts( $args );
       
               if ( empty ($matching_trucks)  ){
                   return -1;
               }
               
               return $matching_trucks[0];
           }

    public static function get_all_students( $filter_args = [] ){

        return get_posts( array(
                    'posts_per_page' => -1,
                    'post_type' =>self :: $post_type,
                    'post_status' => 'publish',
        ) );


    }

    public static function get_student_virtual_ipa_id( $id ='' ){

        return strtoupper( substr( get_post_meta($id,'course',true) , 0, 3) ) . get_post_meta($id,'ipa_id',true);

    }


    public static function get_name($id){
        return ucwords( get_post_meta( $id, 'student_name',true ) );
    }

    public static function get_course($id){
        return ucwords( get_post_meta( $id, 'course',true ) );
    }

    public static function get_phone_no($id){
        return ucwords( get_post_meta( $id, 'phone',true ) );
    }

    public static function get_father_name($id){
        return ucwords( get_post_meta( $id, 'father_name',true ) );
    }

    public static function get_mother_name($id){
        return ucwords( get_post_meta( $id, 'mother_name',true ) );
    }


    //public static function get_student_with_id(){}

}