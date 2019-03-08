<?php defined('ABSPATH') OR exit('No direct script access allowed'); ?>
<?php require_once('codeigniter_form_helper.php'); 

require_once('class/class-student.php');

require_once('class/class-lead.php');

require_once('class/class-fees.php');


?>
<?php 

//if( ! empty ($_POST) ){var_dump( $_POST );exit;}

?>

<?php get_header() ?>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<?php include('header_nav_bar.php'); ?>

<?php include('sidebar.php'); ?>

<?php  if ( is_page('fee') ){
    include('forms/fee_form.php');
}

else if ( is_page('student') ){
    include('forms/student_form.php');
}

else if ( is_page('lead') ){
    include('forms/lead_form.php');
}
else if ( is_page('all_student') ){
    include('forms/all_student_form.php');
}

else if ( is_page('all_lead') ){
    include('forms/all_lead.php');
}
else if ( is_page('all_fee') ){
    include('forms/all_fee.php');
}

else{
    include('forms/student_form.php');
}


?>


  

<?php get_footer(); ?>