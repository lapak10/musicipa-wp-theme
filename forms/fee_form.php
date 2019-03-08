<?php 
if(isset($_POST['student_ipa_id'])){

  $student_obj = IPA_Student :: get_student_with_id( $_POST['student_ipa_id'] );

 //die( json_encode( $student_obj ) );

}

if( isset( $_POST['student_id'] ) ){

  $fee_saved = IPA_Fee :: save_new_fee(  $_POST );
  $student_obj = get_post( $_POST['student_id'] );
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
          <?php //if( empty( $student_data ) ):?>
          <div class="box box-primary">


<div class="box-header with-border">
  <h3 class="box-title">New Fee</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" method='post'>
  
<?php if( ! is_object( $student_obj ) ){?>

    <?php
      if(isset( $student_obj )){
      ?>

<div class="callout callout-danger">
                <h4>Not Found</h4>

                <p>Invalid Student ID provided. Please refer to student list and lookup the correct Student ID.</p>
              </div>
      <?php } ?>

  <div class="box-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Student ID</label>
      <input required  type="text" name='student_ipa_id' class="form-control" id="exampleInputEmail1" placeholder="Example: DAV10134 or simply 10134">
    </div>

  </div>

  
  <!-- /.box-body -->

  <div class="box-footer">
    <button type="submit" class="btn btn-primary btn-block">Search</button>
  </div>

<?php }else{ ?>

  <div class="box-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Student ID</label>
      <input type="text" disabled class="form-control" id="exampleInputEmail1" value="<?php echo IPA_Student :: get_student_virtual_ipa_id( $student_obj->ID );?>">
    </div>


   
    <div class="form-group">
      <label for="exampleInputEmail1">Student Name</label>
      <input type="text" disabled class="form-control" id="exampleInputEmail1" value="<?php echo IPA_Student :: get_name( $student_obj->ID );?>">
    </div>
   
    <div class="form-group">
      <label for="exampleInputEmail1">Course</label>
      <input type="text" disabled class="form-control" id="exampleInputEmail1" value="<?php echo IPA_Student :: get_course( $student_obj->ID );?>">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Father's Name</label>
      <input type="text" disabled class="form-control" id="exampleInputEmail1" value="<?php echo IPA_Student :: get_father_name( $student_obj->ID );?>">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Mother's Name</label>
      <input type="text" disabled class="form-control" id="exampleInputEmail1" value="<?php echo IPA_Student :: get_mother_name( $student_obj->ID );?>">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Phone no.</label>
      <input type="text" disabled class="form-control" id="exampleInputEmail1" value="<?php echo IPA_Student :: get_phone_no( $student_obj->ID );?>">
    </div>

  </div>
  <div class="box-footer">
    <button type="submit" class="btn btn-warning btn-block">Reset</button>
  </div>

<?php } ?>

</form>
</div>

          <?php //endif; ?>



         </div>

         <?php if( isset( $student_obj ) AND is_object( $student_obj ) AND ! isset( $fee_saved ) ): ?>

<!-- SECOND PART START -->
<div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Submit Fees - <?php echo IPA_Student :: get_student_virtual_ipa_id( $student_obj->ID );?> - 
              <?php echo IPA_Student :: get_name( $student_obj->ID );?>
              </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method='post'>
              <div class="box-body">
                
               
                <div class="form-group">
                  <label for="exampleInputPassword1">Start Date</label>
                  <input  required  type="text" name='fee_start_date' class="datepicker form-control" id="exampleInputPassword1" placeholder="Start Date">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">End Date</label>
                  <input  required  type="text" name='fee_end_date' class="datepicker form-control" id="exampleInputPassword1" placeholder="End Date">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Submit Date</label>
                  <input  required  type="text" name='fee_submit_date' class="datepicker form-control" id="exampleInputEmail1" placeholder="Submit Date">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Amount</label>
                  <input required type="text" name='fee_amount' class="form-control" id="exampleInputPassword1" placeholder="Amount in Rupees">
                </div>

               
              <div class="form-group">
                <label>Receiver</label>
                <?php 

$course_options = array(
  'anand'         => 'Anand',
  'vinayak'           => 'Vinayak'
  
);


echo form_dropdown('fee_recieved_by', $course_options, 'anand', ['class'=>'form-control','style'=>'width:100%']);

?>
              </div>
             
               
               
              </div>

              <?php 
              echo form_hidden('student_id',  $student_obj->ID );

              echo form_hidden('student_name', IPA_Student :: get_name( $student_obj->ID ) );

              echo form_hidden('fee_student_ipa_id', IPA_Student :: get_student_virtual_ipa_id( $student_obj->ID ) );
              ?>
              <!-- /.box-body -->


              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-block">Deposit Fees For <?php echo IPA_Student :: get_name( $student_obj->ID );?></button>
              </div>


            </form>
          </div>
         </div>
<!-- SECOND PART END -->

<?php elseif( isset( $fee_saved ) ): ?>


<!-- SECOND PART START -->
<div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Submit Fees - <?php echo IPA_Student :: get_student_virtual_ipa_id( $student_obj->ID );?> - 
              <?php echo IPA_Student :: get_name( $student_obj->ID );?>
              </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method='post'>
              <div class="box-body">
                
              <div class="callout callout-success">
                <h4>Fee entry saved successfully</h4>

                <p>You can check this entry in Student's profile</p>
              </div>
               
                <div class="form-group">
                  <label for="exampleInputPassword1">Start Date</label>
                  <input disabled value='<?php echo get_post_meta( $fee_saved,'fee_start_date',true ); ?>' type="text" name='fee_start_date' class="form-control" id="exampleInputPassword1" placeholder="Start Date">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">End Date</label>
                  <input disabled value='<?php echo get_post_meta( $fee_saved,'fee_end_date',true ); ?>' type="text" name='fee_end_date' class="form-control" id="exampleInputPassword1" placeholder="End Date">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Submit Date</label>
                  <input disabled value='<?php echo get_post_meta( $fee_saved,'fee_submit_date',true ); ?>' type="text" name='fee_submit_date' class="form-control" id="exampleInputEmail1" placeholder="Submit Date">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Amount</label>
                  <input disabled value='<?php echo get_post_meta( $fee_saved,'fee_amount',true ); ?>' type="text" name='fee_amount' class="form-control" id="exampleInputPassword1" placeholder="Amount in Rupees">
                </div>

               
              <div class="form-group">
                <label>Receiver</label>
                <?php 

$course_options = array(
  'anand'         => 'Anand',
  'vinayak'           => 'Vinayak'
  
);


echo form_dropdown('fee_recieved_by', get_post_meta( $fee_saved,'fee_recieved_by',true ), 'anand', ['class'=>'form-control','disabled'=>'true','style'=>'width:100%']);

?>
              </div>
             
               
               
              </div>

              <?php 
             // echo form_hidden('student_id',  $student_obj->ID );

              //echo form_hidden('student_name', IPA_Student :: get_name( $student_obj->ID ) );

              //echo form_hidden('fee_student_ipa_id', IPA_Student :: get_student_virtual_ipa_id( $student_obj->ID ) );
              ?>
              <!-- /.box-body -->


              <!-- <div class="box-footer">
                <button disabled type="submit" class="btn btn-primary btn-block">Deposit Fees For <?php //echo IPA_Student :: get_name( $student_obj->ID );?></button>
              </div> -->


            </form>
          </div>
         </div>
<!-- SECOND PART END -->


<?php endif; ?>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->