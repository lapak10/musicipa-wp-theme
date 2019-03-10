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

        self :: add_mysql_date ( $lead_id , $data_array['demo_date'] );

        return  $lead_id;
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

            if(isset(  $filter_array['filter_age_group'] ) AND 'any' != $filter_array['filter_age_group'] ){
                //$filter_search['meta_query'] = array('key' => 'filter_course','value' => $filter_array['filter_course']);
                array_push($filter_search['meta_query'] ,array(array('key' => 'age_group','value' => $filter_array['filter_age_group'])));
                }

            if(isset($filter_array['filter_demo_date']) AND '' != $filter_array['filter_demo_date'] ){
            array_push($filter_search['meta_query'] ,array(array('key' => 'mysql_date','type' => 'DATE' ,'value' => DateTime ::createFromFormat('d/m/Y',  $filter_array['filter_demo_date'] )->format('Y-m-d')   )));
            }

            
            
            
            //wp_die(var_dump($filter_search));
            
            $args = array_merge($args,$filter_search);

            return get_posts( $args );
        
    }

   

    public static function get_lead_with_id($id = ''){}

    public static function get_all_leads(){

        return get_posts( array(
            'posts_per_page' => -1,
            'post_type' =>self :: $post_type,
            'post_status' => 'publish',
) );
         
    }
    public static function get_all_leads_count( $filter_args = [] ){

        
            return str_pad( count( self :: get_all_leads() ) ,2,'0',STR_PAD_LEFT);

    }

    private static function add_mysql_date($lead_id, $date_string){

        $date = DateTime::createFromFormat('d/m/Y', $date_string );
        $mysql_date = $date->format('Y-m-d');

        return add_post_meta( $lead_id ,'mysql_date',$mysql_date,true);


    }

  
}