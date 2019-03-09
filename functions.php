<?php

// function check_pages_live(){
//         if(get_page_by_title( 'lead' ) == NULL) {
//             create_pages_fly('lead');
//         }
//         if(get_page_by_title( 'fee') == NULL) {
//             create_pages_fly('fee');
//         }
//         if(get_page_by_title( 'student') == NULL) {
//             create_pages_fly('student');
//         }

//         if( get_page_by_title('all_student') == NULL ){
//             create_pages_fly('all_student');
//         }

//         if( get_page_by_title('all_fee') == NULL ){
//             create_pages_fly('all_fee');
//         }
//         if( get_page_by_title('all_lead') == NULL ){
//             create_pages_fly('all_lead');
//         }
//     }



// add_action('init','check_pages_live');


function create_pages_fly($pageName) {
        $createPage = array(
          'post_title'    => $pageName,
          'post_content'  => 'Starter content',
          'post_status'   => 'publish',
          'post_author'   => 1,
          'post_type'     => 'page',
          'post_name'     => $pageName
        );

        // Insert the post into the database
        wp_insert_post( $createPage );
}

function get_courses_array ( $include_all_option = false ){

    $course_array = array(
     
      'vocal'         => 'Vocal',
      'guitar'           => 'Guitar',
      'keyboard'         => 'Keyboard',
      'dance'        => 'Dance',
    );

    if( $include_all_option ){
      $course_array = ['any'=>'All']  + $course_array ;
    }

    return $course_array;
}

function get_certifications_array (  ){

  return array(
    'none'         => 'Not Applicable',
    'absm'           => 'ABSM',
    'prayag'         => 'Prayaag',
    'trinity'        => 'Trinity',
  );

 

  
}