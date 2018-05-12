<!DOCTYPE html>
<html <?php echo (get_post_type() == 'es')? 'lang="es"':'lang="en"'; ?>>
    <head>
      <link href="">
        <title>
            <?php wp_title('|',true,'right') ?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="icon" href="<?php bloginfo('template_url') ?>/assets/images/favicon.ico" type="image/x-icon">
        <?php wp_head(); ?>
    </head>
    <body>
       <header class="header main">
    		<nav class="topNav">
                           <!-- <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'top_nav',
                                ));
                            ?> -->
        </nav>
     <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">MehaLifeScinces</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">Products</a></li>
      </ul>
    </div>
  </div>
</nav>
  <div id="mycarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="item active">
            <img src="wp-content/themes/meha/assets/images/Mha_logo_lf (1).JPG" alt="" class="img-responsive">
       </div>
   </div>
 </div>
</div>
 </header>

