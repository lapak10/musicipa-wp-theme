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
                  <th>ID</th>
                  <th>Name</th>
                  <th>Fee End Date</th>
                  <th>Fee Submit Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               
    <?php foreach( IPA_Fee :: get_all_fees() as $lead_obj ){

        echo '<tr>';
        echo '<td>' .  $lead_obj->ID . '</td>';
        echo '<td>' . get_post_meta ( $lead_obj->ID,'student_name',true ) . '</td>';
        echo '<td>' . get_post_meta ( $lead_obj->ID,'fee_end_date',true ) . '</td>';
        echo '<td>' . get_post_meta ( $lead_obj->ID,'fee_submit_date',true ) . '</td>';
       
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
                <th>ID</th>
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