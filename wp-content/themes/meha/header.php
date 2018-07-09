<!DOCTYPE html>
<html <?php echo (get_post_type() == 'es')? 'lang="es"':'lang="en"'; ?>>
    <head>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Oswald:400,700" rel="stylesheet">
      <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
       <link rel="stylesheet" href="wp-content/themes/meha/assets/customizer-resetstyle.css">

      <link rel="stylesheet" href="wp-content/themes/meha/assets/customizer-style.css">
        <title>
            <?php wp_title('|',true,'right') ?>
        </title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="icon" href="<?php bloginfo('template_url') ?>/assets/images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <?php wp_head(); ?>
         <!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->

        <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
        <script>
  jQuery(document).ready(function(){
      jQuery('.slider').bxSlider();
      jQuery('#menu-icon').click(function(){
        jQuery(this).toggleClass('change');
        jQuery('#dropdown_menu').slideToggle();
      });

      jQuery('#add-new').click(function(){
        jQuery('.task-section').slideToggle();
      });
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
                <img src="/wp-content/uploads/2018/06/Mha.png">
              
         </div>
          <ul class="header-links">
              <li><a href="/homepage/">Home</a></li>
              <li><a href="/about-static-page/">About Us</a></li>
              <li><a href="/contact-me/">Contact Us</a></li>
              <li><a href="/product/">Products</a></li>
         </ul>
       <div class="dropdown">
            <div class="containers"  class="dropbtn" id="menu-icon">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <ul id="dropdown_menu" class="dropdown-content">
              <li><a href="/homepage/">Home</a></li>
              <li><a href="/about-static-page/">About Us</a></li>
              <li><a href="/contact-me/">Contact Us</a></li>
              <li><a href="/product/">Products</a></li>
           </ul>
       </div>
    </div>
 </div>
 </header>
		