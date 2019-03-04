<?php defined('ABSPATH') OR exit('No direct script access allowed'); ?>

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
    include('fee_form.php');
}

if ( is_page('student') ){
    include('student_form.php');
}

if ( is_page('lead') ){
    include('lead_form.php');
}

?>


  

<?php get_footer(); ?>