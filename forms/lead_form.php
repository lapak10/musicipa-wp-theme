<?php 

if ( isset(  $_POST['lead_student_name'] ) ) {
  $lead_id = IPA_Lead :: save_new_lead( $_POST ); 
}

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

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">New Lead</h3>
            </div>
            <!-- /.box-header -->
  <?php if( ! isset ( $lead_id ) ) { ?>

            <!-- form start -->
            <form role="form" method='post'>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Student Name</label>
                  <input type="text" name='lead_student_name' class="form-control" id="exampleInputEmail1" placeholder="Student Name">
                </div>

                <div class="form-group">
                <label>Age Group</label>
                <?php 

$course_options = array(
  'kid'         => 'Kid',
  'teen'         => 'Teen',
  'adult'           => 'Adult'
  
);


echo form_dropdown('age_group', $course_options, 'kid', ['class'=>'form-control','style'=>'width:100%']);

?>
              </div>
                <div class="form-group">
                <label>Parent Title</label>
                <?php 

$course_options = array(
  'mr'         => 'Mr',
  'mrs'           => 'Mrs'
  
);


echo form_dropdown('parent_gender', $course_options, 'mr', ['class'=>'form-control','style'=>'width:100%']);

?>
              </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Parent Name</label>
                  <input type="text" name='parent_name'  class="form-control" id="exampleInputEmail1" placeholder="Parent Name">
                </div>


                <div class="form-group">
                  <label for="exampleInputPassword1">Locality</label>
                  <input type="text"  name='locality'  class="form-control" id="exampleInputPassword1" placeholder="Locality">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Phone No.</label>
                  <input type="text"  name='phone_no'  class="form-control" id="exampleInputPassword1" placeholder="Phone No.">
                </div>
                <div class="form-group">
                <label>Course</label>
                <?php 

$course_options = get_courses_array();


echo form_dropdown('course', $course_options, 'vocal' , ['class'=>'form-control' ,'style'=>'width:100%']);

?>
              </div>
              <div class="form-group">
                <label>Status</label>
                <?php 

$course_options = array(
  'warm'         => 'Warm',
  'hot'           => 'Hot',
  'cold'         => 'Cold',
  'admission_done'        => 'Joined IPA',
);


echo form_dropdown('lead_status', $course_options, 'warm', ['class'=>'form-control','style'=>'width:100%']);

?>
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Demo Date</label>
                  <input type="text"  name='demo_date' class="form-control datepicker" id="exampleInputEmail1" placeholder="Demo Date">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Demo Time</label>
                  <input type="text"  name='demo_time' class="form-control timepicker" id="exampleInputEmail1" placeholder="Demo Date">
                </div>
               
               
              </div>

              
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-block">Save</button>
              </div>
            </form>

<?php }else { ?>

<!-- form start -->
<form role="form">
              <div class="box-body">

              <div class="callout callout-success">
                <h4> Lead has been save successfully</h4>

               
              </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Student Name</label>
                  <input  disabled type="text"  value="<?php echo $_POST['lead_student_name']; ?>" name='lead_student_name' class="form-control" id="exampleInputEmail1" placeholder="Student Name">
                </div>

                <div class="form-group">
                <label>Age Group</label>
                <?php 

$course_options = array(
  'kid'         => 'Kid',
  'teen'         => 'Teen',
  'adult'           => 'Adult'
  
);


echo form_dropdown('age_group', $course_options, $_POST['age_group'], ['class'=>'form-control','disabled'=> 'true','style'=>'width:100%']);

?>
              </div>
                <div class="form-group">
                <label>Parent Title</label>
                <?php 

$course_options = array(
  'mr'         => 'Mr',
  'mrs'           => 'Mrs'
  
);


echo form_dropdown('parent_gender', $course_options, $_POST['parent_gender'] , ['class'=>'form-control','disabled'=> 'true','style'=>'width:100%']);

?>
              </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Parent Name</label>
                  <input  disabled type="text"  value="<?php echo $_POST['parent_name']; ?>" name='parent_name'  class="form-control" id="exampleInputEmail1" placeholder="Parent Name">
                </div>


                <div class="form-group">
                  <label for="exampleInputPassword1">Locality</label>
                  <input  disabled type="text" value="<?php echo $_POST['locality']; ?>"  name='locality'  class="form-control" id="exampleInputPassword1" placeholder="Locality">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Phone No.</label>
                  <input  disabled type="text" value="<?php echo $_POST['phone_no']; ?>"  name='phone_no'  class="form-control" id="exampleInputPassword1" placeholder="Phone No.">
                </div>
                <div class="form-group">
                <label>Course</label>
                <?php 

$course_options = get_courses_array();


echo form_dropdown('course', $course_options, $_POST['course'] , ['class'=>'form-control' ,'disabled'=> 'true','style'=>'width:100%']);

?>
              </div>
              <div class="form-group">
                <label>Status</label>
                <?php 

$course_options = array(
  'warm'         => 'Warm',
  'hot'           => 'Hot',
  'cold'         => 'Cold',
  'admission_done'        => 'Joined IPA',
);


echo form_dropdown('lead_status', $course_options, $_POST['lead_status'], ['class'=>'form-control','disabled'=> 'true','style'=>'width:100%']);

?>
              </div>
             

                <div class="form-group">
                  <label for="exampleInputEmail1">Demo Date</label>
                  <input type="text"   value="<?php echo $_POST['demo_date']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Demo Date">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Demo Time</label>
                  <input type="text"  value="<?php echo $_POST['demo_time']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Demo Date">
                </div>
               
               
              </div>

              
              <!-- /.box-body -->

              <!-- <div class="box-footer">
                <button type="submit" class="btn btn-success btn-block">Save</button>
              </div> -->
            </form>

<?php } ?>

          </div>
         </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->