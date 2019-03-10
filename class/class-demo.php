<?php
class IPA_Demo{
    private static $lead_post_type = 'lead_data';

    public static function get_demo_count_today(){

        return self :: get_demo_count('today');
        //return str_pad( count( self :: get_all_students() ) ,2,'0',STR_PAD_LEFT);
        //return '01';

    }

    public static function get_demo_count_tomorrow(){

       return self :: get_demo_count('tomorrow');
        //return str_pad( count( self :: get_all_students() ) ,2,'0',STR_PAD_LEFT);
        //return '01';

    }
    public static function get_today_demo_more_info_link(){
           
        return add_query_arg( array(
            'filter_demo_date' => date("d/m/Y"),
            'filter_form' => 'search'
        ) , get_permalink( get_page_by_title('all_lead') ) );
        
        
        
    }

    public static function get_tomorrow_demo_more_info_link(){
        return add_query_arg( array(
            'filter_demo_date' => date( "d/m/Y", strtotime(' +1 day ') ),
            'filter_form' => 'search'
        ) , get_permalink( get_page_by_title('all_lead') ) ); 
    }
    
    public static function get_demo_count( $day='' ){

        $date = date("d/m/Y");

        if( $day === 'tomorrow' ){
            $date = date( "d/m/Y", strtotime(' +1 day ') );
        }

       

        

        $args = array( 

            'posts_per_page' => -1,
             'post_type' => self:: $lead_post_type ,
             'post_status' => 'publish',

             'meta_query' => array(
                // array('key'=>'from_factory','value' => '' ,'compare'=> 'NOT EXISTS' )
                 //'relation' => 'AND'
                     array('key' => 'demo_date','value' => $date )
                     //array('key' => 'load_destination_city','value' => $_POST['load_destination_city']),
                     //array('key' => 'load_truck_type','value' => $_GET['load_truck_type']),
                     //array('key' => 'load_weight_capacity','value' => $_GET['load_weight_capacity']),
                     //array('key' => 'load_date','value' => $_POST['load_date'])
                     )
             
        );        

       
        return str_pad( count( get_posts( $args ) ) ,2,'0',STR_PAD_LEFT);
        
       

    }
}