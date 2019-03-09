<?php 

if ( isset(  $_POST['student_name'] ) ) {
  $student_id = IPA_Student :: save_new_student( $_POST ); 
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
              <h3 class="box-title">New Student</h3>

            </div>
            <!-- /.box-header -->

<?php 

if( isset ($student_id) ){ 
  $student_data = get_post_meta( $student_id );
  
  ?>

<!-- SAVED FORM START -->

 <!-- form start -->
 <form role="form" method='post'>
              <div class="box-body">

 
              <div class="callout callout-success">
                <h4> <?php echo get_the_title( $student_id ); ?></h4>

                <p>New student has been saved successfully </p>
              </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Student Name</label>
                  <input disabled type="text" name='student_name' class="form-control" id="exampleInputEmail1" value="<?php echo $student_data['student_name'][0]; ?>">
                </div>

                

                <div class="form-group">
                  <label for="exampleInputEmail1">Father's Name</label>
                  <input  disabled type="text" name='father_name' class="form-control" id="exampleInputEmail1" value="<?php echo $student_data['father_name'][0]; ?>">
                </div>
               

                <div class="form-group">
                  <label for="exampleInputEmail1">Mother's Name</label>
                  <input  disabled type="text" name='mother_name' class="form-control" id="exampleInputEmail1" value="<?php echo $student_data['mother_name'][0]; ?>">
                </div>


                <div class="form-group">
                  <label for="exampleInputPassword1">Address</label>
                  <textarea disabled  name='address' class="form-control" rows='3' id="exampleInputPassword1" value="Address"><?php echo $student_data['address'][0]; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Phone No.</label>
                  <input disabled  type="text" name='phone' class="form-control" id="exampleInputPassword1" value="<?php echo $student_data['phone'][0]; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alternate Phone No. (Optional)</label>
                  <input type="text" disabled name='phone_alternative' class="form-control" id="exampleInputPassword1" value="<?php echo $student_data['phone_alternative'][0]; ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Date Of Joining.</label>
                  <input  disabled type="text" name='date_of_joining'  class="datepicker form-control" id="exampleInputPassword1" value="<?php echo $student_data['date_of_joining'][0]; ?>">
                </div>

                <div class="form-group">
                <label>Course</label>

<?php 

$course_options = get_courses_array();


echo form_dropdown('course', $course_options,  $student_data['course'][0] , ['class'=>'form-control','disabled'=> 'true' ,'style'=>'width:100%']);

?>

                <!-- <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select> -->
              </div>
              <div class="form-group">
                <label>Music Certification</label>
                
                <?php 

$music_certification_options = get_certifications_array();


echo form_dropdown('music_certification', $music_certification_options,  $student_data['music_certification'][0] , ['class'=>'form-control','disabled'=> 'true' ,'style'=>'width:100%']);

?>

              </div>
             
               
               
              </div>

              
              <!-- /.box-body -->
<?php 

//echo form_hidden('add_new_student','true');

?>
              <!-- <div class="box-footer">
                <button type="submit" class="btn btn-success btn-block">Save</button>
              </div> -->
            </form>

<!-- SAVED FORM END -->

<?php } else { ?>


            <!-- form start -->
            <form role="form" method='post'>
              <div class="box-body">



                <div class="form-group">
                  <label for="exampleInputEmail1">Student Name</label>
                  <input required type="text" name='student_name' class="form-control" id="exampleInputEmail1" placeholder="Student Name">
                </div>

                
               
                <div class="row">
                <div class="col-xs-6 form-group">
                <label for="exampleInputEmail1">Father's Name</label>
                  <input required id="exampleInputEmail1" name='father_name' type="text" class="form-control" placeholder="Father's Name">
                </div>
                <div class="col-xs-6 form-group">
                <label for="exampleInputEmail1">Mother's Name</label>
                  <input required id="exampleInputEmail1" name='mother_name' type="text" class="form-control" placeholder="Mother's Name">
                </div>
                
              </div>

                


                <div class="form-group">
                  <label for="exampleInputPassword1">Address</label>
                  <textarea required  name='address' class="form-control" rows='3' id="exampleInputPassword1" placeholder="Address"></textarea>
                </div>


                <div class="row">
                <div class="col-xs-6 form-group">
                <label for="exampleInputPassword1">Phone No.</label>
                  <input required  type="text" name='phone' class="form-control" id="exampleInputPassword1" placeholder="Phone No.">
                </div>
                <div class="col-xs-6 form-group">
                <label for="exampleInputPassword1">Alternate Phone No. (Optional)</label>
                  <input type="text" name='phone_alternative' class="form-control" id="exampleInputPassword1" placeholder="Phone No.">
                </div>
                
              </div>

               
              <div class="row">
                <div class="col-xs-3 form-group">
                  <label for="exampleInputPassword1">Date Of Joining.</label>
                  <input  required   type="text" name='date_of_joining'  class="datepicker form-control" id="exampleInputPassword1" placeholder="Date Of Joining">
                </div>

                <div class="col-xs-9 form-group">
                <label>Course</label>

<?php 

$course_options = get_courses_array();


echo form_dropdown('course', $course_options, 'guitar', ['class'=>'form-control','style'=>'width:100%']);

?>

                <!-- <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select> -->
              </div>
              </div>
              <div class="form-group">
                <label>Music Certification</label>
                
                <?php 

$music_certification_options = get_certifications_array();


echo form_dropdown('music_certification', $music_certification_options, 'none', ['class'=>'form-control','style'=>'width:100%']);

?>

              </div>
             
               
               
              </div>

              
              <!-- /.box-body -->
<?php 

//echo form_hidden('add_new_student','true');

?>
              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-block">Save</button>
              </div>
            </form>


<?php } ?>









          </div>
         </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->