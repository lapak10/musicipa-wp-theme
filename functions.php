<?php

function check_pages_live(){
        if(get_page_by_title( 'lead' ) == NULL) {
            create_pages_fly('lead');
        }
        if(get_page_by_title( 'fee') == NULL) {
            create_pages_fly('fee');
        }
        if(get_page_by_title( 'student') == NULL) {
            create_pages_fly('student');
        }
    }



add_action('init','check_pages_live');


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