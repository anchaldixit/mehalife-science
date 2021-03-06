<!DOCTYPE html>
<html <?php echo (get_post_type() == 'es')? 'lang="es"':'lang="en"'; ?>>
    <head>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Oswald:400,700" rel="stylesheet">
      <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

        <title>
            <?php wp_title('|',true,'right') ?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="icon" href="<?php bloginfo('template_url') ?>/assets/images/logo.ico" type="image/x-icon">
        

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <?php wp_head(); ?>
         <!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->

        <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
        <script>
  jQuery(document).ready(function(){

      jQuery('.slider').bxSlider();
      //mobile menu icon
      jQuery('#menu-icon').click(function(){
        jQuery(this).toggleClass('change');
        jQuery('#dropdown_menu').slideToggle();
      });
      //reporting page add new button
      jQuery('#add-new').click(function(){
        jQuery('.task-section').slideToggle();
      });

      <?php if(is_user_logged_in()):?>
        jQuery(".header").stick_in_parent({offset_top:32});
      <?php else:?>
       jQuery(".header").stick_in_parent();
     <?php endif ?>
    });
  </script>


<!--
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      $('.menu').click(function(){
         $('ul').toggleclass('action');
      })
  })
</script>
-->

    </head>
    <body>
                           <!-- <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'top_nav',
                                ));
 
                         ?> -->

<div class="header">
     <div class="header-section">
          <div class="header-logo">
                <a href="/"><img src="/wp-content/uploads/2018/06/Mha.png"></a>
          </div>
          <ul class="header-links">
              <li><a href="/product/">Products</a></li>
              <li><a href="/about/">About Us</a></li>
              <li><a href="/contact-me/">Contact Us</a></li>
              <li><a href="/task/">Reporting</a></li>
         </ul>
       <div class="dropdown">
            <div class="containers"  class="dropbtn" id="menu-icon">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <ul id="dropdown_menu" class="dropdown-content">
              <li><a href="/product/">Products</a></li>
              <li><a href="/about/">About Us</a></li>
              <li><a href="/contact-me/">Contact Us</a></li>
              <li><a href="/task/">Reporting</a></li>
           </ul>
       </div>
    </div>
 </div>
 </header>
		