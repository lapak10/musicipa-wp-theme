<?php 

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

<div class="col-md-12">

<div class="box box-default">


<div class="box-header with-border">
<h3 class="box-title">Filter</h3>
</div>

<div class="box-body">
       

       <div class="row">
       <form method='get'>
       
       <div class="col-xs-3 form-group">
       <label for="exampleInputEmail1">Student</label>
         
       <?php 

$course_options = IPA_Student :: get_all_students_select_options();


echo form_dropdown('filter_student_id', $course_options, isset( $_GET['filter_student_id'] )? $_GET['filter_student_id'] : ''  , ['class'=>'form-control','id'=>'students_dropdown','style'=>'width:100%']);

?>
          </div>

          <div class="col-xs-2 form-group">
       <label for="exampleInputEmail1">Start Date</label>
         <input value='<?php echo isset( $_GET['filter_start_date'] )? $_GET['filter_start_date'] : '';?>' id="exampleInputEmail1"  name='filter_start_date' type="text" class="datepicker form-control" placeholder="Start Date">
       </div>

       <div class="col-xs-2 form-group">
       <label for="exampleInputEmail1">End Date</label>
         <input value='<?php echo isset( $_GET['filter_end_date'] )? $_GET['filter_end_date'] : '';?>' id="exampleInputEmail1"  name='filter_end_date' type="text" class="datepicker form-control" placeholder="End Date">
       </div>

       <div class="col-xs-2 form-group">
       <label for="exampleInputEmail1">Submit Date</label>
         <input value='<?php echo isset( $_GET['filter_submit_date'] )? $_GET['filter_submit_date'] : '';?>' id="exampleInputEmail1"  name='filter_submit_date' type="text" class="datepicker form-control" placeholder="Submit Date">
       </div>
        
       <div class="col-xs-3 form-group">
       <label for="exampleInputEmail1">Action</label>
       <button type="submit" name='filter_form' value='search' class="btn btn-warning btn-block">Filter</button>
       </div>
       
   </form>
        
       </div>
     
    </div> 
   </div>  
</div>

</div> 

        <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
         
          <div class="box box-default">


<div class="box-header with-border">
  <h3 class="box-title">All Students</h3>
</div>
<!-- /.box-header -->
<!-- form start -->

  


  

<div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Receipt No.</th>
                  <th>Name</th>
                  <th>Fee End Date</th>
                  <th>Fee Submit Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               
    <?php $all_fees = '';

if( isset( $_GET['filter_form'] ) ){

 $all_fees = IPA_Fee :: apply_filter( $_GET );

}else{

 $all_fees = IPA_Fee :: get_all_fees();

}


             foreach( $all_fees as $fee ){

        echo '<tr>';
        echo '<td>' .  $fee->ID . '</td>';
        echo '<td>' . get_post_meta ( $fee->ID,'student_name',true ) . '</td>';
        echo '<td>' . get_post_meta ( $fee->ID,'fee_end_date',true ) . '</td>';
        echo '<td>' . get_post_meta ( $fee->ID,'fee_submit_date',true ) . '</td>';
       
        echo '<td>' . 'ACTION' . '</td>';
        echo '</td>';

    } ?>

                <!-- <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>X</td>
                </tr> -->
              
                </tbody>
                <tfoot>
                <tr>
                <th>Receipt No.</th>
                  <th>Name</th>
                  <th>Course</th>
                  <th>Phone</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>

  
  <!-- /.box-body -->

  


          </div>
         </div>

      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->