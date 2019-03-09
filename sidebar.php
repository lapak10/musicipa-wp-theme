<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="<?php echo get_template_directory_uri(); ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>Anand Kumar</p>
      <!-- Status -->
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>

  <!-- search form (Optional) -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
    </div>
  </form>
  <!-- /.search form -->

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">HEADER</li>
    <!-- Optionally, you can add icons to the links -->
<!--     
    <li class="<?php //echo is_page('student')?'active':''  ?>"><a href="<?php echo get_permalink( get_page_by_title('student') ) ?>"><i class="fa fa-link"></i> <span>Student Management</span></a></li>
    <li class="<?php //echo is_page('fee')?'active':''  ?>"><a href="<?php echo get_permalink( get_page_by_title('fee') ) ?>"><i class="fa fa-link"></i> <span>Fees Management</span></a></li>
    <li class="<?php //echo is_page('lead')?'active':''  ?>"><a href="<?php echo get_permalink( get_page_by_title('lead') ) ?>"><i class="fa fa-link"></i> <span>Lead Management</span></a></li>
   
    -->
   
<?php include_once('sidebar_menu_gen.php'); ?>

   
    <!-- <li class="treeview <?php echo is_page('lead')?'active':''  ?>">
      <a href="<?php echo get_permalink( get_page_by_title('student') ) ?>"><i class="fa fa-link"></i> <span>Student</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php echo is_page('fee')?'active':''  ?>"><a href="<?php echo get_permalink( get_page_by_title('fee') ) ?>">New Student</a></li>
        <li class="<?php echo is_page('lead')?'active':''  ?>"><a href="<?php echo get_permalink( get_page_by_title('lead') ) ?>">All Students</a></li>
      </ul>
    </li>

    <li class="treeview <?php echo is_page('lead')?'active':''  ?>">
      <a href="<?php echo get_permalink( get_page_by_title('student') ) ?>"><i class="fa fa-link"></i> <span>Fees</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php echo is_page('fee')?'active':''  ?>"><a href="<?php echo get_permalink( get_page_by_title('fee') ) ?>">New Fees</a></li>
        <li class="<?php echo is_page('lead')?'active':''  ?>"><a href="<?php echo get_permalink( get_page_by_title('lead') ) ?>">All Fees</a></li>
      </ul>
    </li>


    <li class="treeview <?php echo is_page('lead')?'active':''  ?>">
      <a href="<?php echo get_permalink( get_page_by_title('student') ) ?>"><i class="fa fa-link"></i> <span>Leads</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php echo is_page('fee')?'active':''  ?>"><a href="<?php echo get_permalink( get_page_by_title('fee') ) ?>">New Lead</a></li>
        <li class="<?php echo is_page('lead')?'active':''  ?>"><a href="<?php echo get_permalink( get_page_by_title('lead') ) ?>">All Leads</a></li>
      </ul>
    </li> -->


  </ul>
  <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>