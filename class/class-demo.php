<?php
class IPA_Demo{
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

    public static function get_demo_count( $day = 'today' ){

        if( $day === 'tomorrow' ){
            return '15';
        }
        // By default we will be returning for today
            return '12';

    }
}