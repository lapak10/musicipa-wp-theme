<?php

    // $menu = array(
    //     'Students'=> array(['title'=>'student','display_name'=>'New Student'],['title'=>'all_student','display_name'=>'All Students']),
    //     'Fees' => array(['title'=>'fee','display_name'=>'New Fee'],['title'=>'all_fee','display_name'=>'All Fees']),
    //     'Leads' => array(['title'=>'lead','display_name'=>'New Lead'],['title'=>'all_lead','display_name'=>'All Leads'])
    // );

    // function musicipa_gen_menu($menu = []){

    //     foreach( $menu as $parent_menu => $value){
    //         echo '<li class="treeview '. in_array('lead') ? 'active':'' .'">
    //         <a href="'. get_permalink( get_page_by_title('student') ) .'"><i class="fa fa-link"></i> <span>Student</span>
    //           <span class="pull-right-container">
    //               <i class="fa fa-angle-left pull-right"></i>
    //             </span>
    //         </a>';

    //         echo '<ul class="treeview-menu">';

    //             foreach($value as $sub_menu){
    //                 echo '<li class="'. is_page('fee') ? 'active' : '' .'"><a href="'. get_permalink( get_page_by_title( $sub_menu ) ) .'">'. $sub_menu .'</a></li>';
    //             }

    //         echo '</ul></li>';

    //     }


    // }


?>

<li class="treeview <?php echo ( is_page('student') OR is_page('all_student') )?'active':''  ?>">
      <a href="<?php echo get_permalink( get_page_by_title('all_student') ) ?>"><i class="fa fa-link"></i> <span>Student</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php echo is_page('student')?'active':''  ?>"><a href="<?php echo get_permalink( get_page_by_title('student') ) ?>">New Student</a></li>
        <li class="<?php echo is_page('all_student')?'active':''  ?>"><a href="<?php echo get_permalink( get_page_by_title('all_student') ) ?>">All Students</a></li>
      </ul>
    </li>

    <li class="treeview <?php echo ( is_page('all_fee') OR is_page('fee') )?'active':''  ?>">
      <a href="<?php echo get_permalink( get_page_by_title('all_fee') ) ?>"><i class="fa fa-link"></i> <span>Fees</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php echo is_page('fee')?'active':''  ?>"><a href="<?php echo get_permalink( get_page_by_title('fee') ) ?>">New Fees</a></li>
        <li class="<?php echo is_page('all_fee')?'active':''  ?>"><a href="<?php echo get_permalink( get_page_by_title('all_fee') ) ?>">All Fees</a></li>
      </ul>
    </li>


    <li class="treeview <?php echo ( is_page('lead') OR is_page('all_lead') )?'active':''  ?>">
      <a href="<?php echo get_permalink( get_page_by_title('all_lead') ) ?>"><i class="fa fa-link"></i> <span>Leads</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php echo is_page('lead')?'active':''  ?>"><a href="<?php echo get_permalink( get_page_by_title('lead') ) ?>">New Lead</a></li>
        <li class="<?php echo is_page('all_lead')?'active':''  ?>"><a href="<?php echo get_permalink( get_page_by_title('all_lead') ) ?>">All Leads</a></li>
      </ul>
    </li>