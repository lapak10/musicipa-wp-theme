<?php defined('ABSPATH') OR exit('No direct script access allowed'); ?>
<?php require_once('codeigniter_form_helper.php'); 

require_once('class/class-student.php');

require_once('class/class-lead.php');

require_once('class/class-fees.php');

require_once('class/class-demo.php');

function ipa_random_music_quote(){
    $quotes = array(
      '“Without music, life would be a blank to me.”― Jane Austen',
      '“Music is the shorthand of emotion.” ― Leo Tolstoy',
      '“Where words fail, music speaks.” ― Hans Christian Andersen',
      '“Music is to the soul what words are to the mind.” ― Modest Mouse',
      '“Music touches us emotionally, where words alone can’t.” ― Johnny Depp',
      '“I like beautiful melodies telling me terrible things.” ― Tom Waits',
      '“Who hears music, feels his solitude” ― Robert Browning',
      '“The music is not in the notes, but in the silence between.”  ― Wolfgang Amadeus Mozart',
      '“Music is the strongest form of magic.” ― Marilyn Manson',
        '“Music is the wine that fills the cup of silence.” ― Robert Fripp',
        '“Music is the language of the spirit. It opens the secret of life bringing peace, abolishing strife.” ― Kahlil Gibran',
        '“Music in the soul can be heard by the universe.” ― Lao Tzu'
    );

    return $quotes[mt_rand(0, count($quotes) - 1)];
  }

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
    include('forms/dashboard.php');
}


?>


  

<?php get_footer(); ?>