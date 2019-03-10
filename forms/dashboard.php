<?php 

// if ( isset(  $_POST['lead_student_name'] ) ) {
//   $lead_id = IPA_Lead :: save_new_lead( $_POST ); 
// }

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <h1>
        Add New Lead
        <small>New</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section> -->
    <!-- Main content -->
    <section class="content container-fluid">

<!-- Small boxes (Stat box) -->
<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo IPA_Student :: get_all_students_count()  ?></h3>

              <p>Students</p>
            </div>
            <div class="icon">
            <i class="icon ion-md-people"></i>
            </div>
            <a href="<?php echo get_permalink( get_page_by_title('all_student') ) ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo IPA_Lead :: get_all_leads_count()  ?></h3>

              <p>Leads</p>
            </div>
            <div class="icon">
            <i class="icon ion-md-person-add"></i>
            </div>
            <a href="<?php echo get_permalink( get_page_by_title('all_lead') ) ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo IPA_Demo :: get_demo_count_today() ?></h3>

              <p>Demo ( Today )</p>
            </div>
            <div class="icon">
              <i class="icon ion-md-walk"></i>
            </div>
            <a href="<?php echo IPA_Demo :: get_today_demo_more_info_link(); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <h3><?php echo IPA_Demo :: get_demo_count_tomorrow() ?></h3>

              <p>Demo ( Tomorrow )</p>
            </div>
            <div class="icon">
            <i class="icon ion-md-walk"></i>
            </div>
            <a href="<?php echo IPA_Demo :: get_tomorrow_demo_more_info_link(); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->