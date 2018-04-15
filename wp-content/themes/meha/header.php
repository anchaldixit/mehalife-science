<!DOCTYPE html>
<html <?php echo (get_post_type() == 'es')? 'lang="es"':'lang="en"'; ?>>
    <head>
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
                            <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'top_nav',
                                ));
                            ?>
            </nav>
    	</header>