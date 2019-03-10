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

        self :: add_mysql_date ( $student_id , $data_array['date_of_joining'] );

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

    private static function add_mysql_date($student_id, $date_string){

        $date = DateTime::createFromFormat('d/m/Y', $date_string );
        $mysql_date = $date->format('Y-m-d');

        return add_post_meta( $student_id ,'mysql_date',$mysql_date,true);


    }

    public static function apply_filter( $filter_array ){
        $args = array( 

            'posts_per_page' => -1,
             'post_type' => self:: $post_type ,
             'post_status' => 'publish'
             
        );        

        $filter_search = array(
            'meta_query' => array(
           // array('key'=>'from_factory','value' => '' ,'compare'=> 'NOT EXISTS' )
            //'relation' => 'AND'
                //array('key' => 'load_source_city','value' => $_POST['load_source_city']),
                //array('key' => 'load_destination_city','value' => $_POST['load_destination_city']),
                //array('key' => 'load_truck_type','value' => $_GET['load_truck_type']),
                //array('key' => 'load_weight_capacity','value' => $_GET['load_weight_capacity']),
                //array('key' => 'load_date','value' => $_POST['load_date'])
                )
            );
            
            if(isset(  $filter_array['filter_course'] ) AND 'any' != $filter_array['filter_course'] ){
            //$filter_search['meta_query'] = array('key' => 'filter_course','value' => $filter_array['filter_course']);
            array_push($filter_search['meta_query'] ,array(array('key' => 'course','value' => $filter_array['filter_course'])));
            }

            if(isset($filter_array['filter_from_date']) AND '' != $filter_array['filter_from_date'] ){
            array_push($filter_search['meta_query'] ,array(array('key' => 'mysql_date', 'compare' => '>=','type' => 'DATE' ,'value' => DateTime ::createFromFormat('d/m/Y',  $filter_array['filter_from_date'] )->format('Y-m-d')   )));
            }

            if(isset($filter_array['filter_to_date']) AND '' != $filter_array['filter_to_date'] ){
                array_push($filter_search['meta_query'] ,array(array('key' => 'mysql_date', 'compare' => '<=','type' => 'DATE' ,'value' => DateTime ::createFromFormat('d/m/Y',  $filter_array['filter_to_date'] )->format('Y-m-d')   )));
            }
            
            
            //wp_die(var_dump($filter_search));
            
            $args = array_merge($args,$filter_search);

            return get_posts( $args );
        
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
    public static function get_all_students_count( $filter_args = [] ){

        
        return str_pad( count( self :: get_all_students() ) ,2,'0',STR_PAD_LEFT);

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

    public static function get_date_of_joining($id){
        return ucwords( get_post_meta( $id, 'date_of_joining',true ) );
    }


    //public static function get_student_with_id(){}

}