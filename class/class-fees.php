<?php

class IPA_Fee{

    private static $post_type = 'fee_data';
    
    public static function save_new_fee( $data_array = [] ){

        if ( ! is_array ( $data_array ) ){
            throw new Exception("please provide valid array");   
        }


        $fee_id =  wp_insert_post(array(
            'post_title'=> $data_array['student_name'] .' -- '.$data_array['fee_student_ipa_id'].' -- Rs'. $data_array['fee_amount'] .' -- '. $data_array['fee_submit_date'] ,
            'post_status'=>'publish',
            'post_type' => self :: $post_type,
            'meta_input' => $data_array
        ));

        
        self :: add_mysql_date ( $fee_id , $data_array['fee_start_date'] ,'mysql_fee_start_date');
        self :: add_mysql_date ( $fee_id , $data_array['fee_end_date'] ,'mysql_fee_end_date');
        self :: add_mysql_date ( $fee_id , $data_array['fee_submit_date'] ,'mysql_fee_submit_date');
       

        return  $fee_id;


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
            
            

            if(isset($filter_array['filter_submit_date']) AND '' != $filter_array['filter_submit_date'] ){
                array_push($filter_search['meta_query'] ,array(array('key' => 'mysql_fee_submit_date','type' => 'DATE' ,'value' => DateTime ::createFromFormat('d/m/Y',  $filter_array['filter_submit_date'] )->format('Y-m-d')   )));
            }
            if(isset($filter_array['filter_end_date']) AND '' != $filter_array['filter_end_date'] ){
                array_push($filter_search['meta_query'] ,array(array('key' => 'mysql_fee_end_date','type' => 'DATE' ,'value' => DateTime ::createFromFormat('d/m/Y',  $filter_array['filter_end_date'] )->format('Y-m-d')   )));
            }
            if(isset($filter_array['filter_start_date']) AND '' != $filter_array['filter_start_date'] ){
                array_push($filter_search['meta_query'] ,array(array('key' => 'mysql_fee_start_date','type' => 'DATE' ,'value' => DateTime ::createFromFormat('d/m/Y',  $filter_array['filter_start_date'] )->format('Y-m-d')   )));
            }

            if(isset($filter_array['filter_student_id']) AND 'any' != $filter_array['filter_student_id'] ){
                array_push($filter_search['meta_query'] ,array(array('key' => 'student_id' ,'value' => $filter_array['filter_student_id'] )));
            }

            
            
            
            //wp_die(var_dump($filter_search));
            
            $args = array_merge($args,$filter_search);

            return get_posts( $args );
        
    }

    private static function add_mysql_date($fee_id, $date_string, $key_name ='mysql_date'){

        $date = DateTime::createFromFormat('d/m/Y', $date_string );
        $mysql_date = $date->format('Y-m-d');

        return add_post_meta( $fee_id ,$key_name ,$mysql_date,true);


    }

    public static function get_all_fees(){

        return get_posts( array(
                    'posts_per_page' => -1,
                    'post_type' =>self :: $post_type,
                    'post_status' => 'publish',
        ) );


    }

    public static function get_student_with_ipa_id( $id ='' ){}
    //public static function get_student_with_id(){}

}