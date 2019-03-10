<li class="<?php echo is_home() ?'active':''  ?>"><a href="<?php echo get_home_url() ?>"><i class="fa fa-home"></i> <span>Home</span></a></li>
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