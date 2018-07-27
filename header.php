<!doctype html>
<html>

<head>

    <!-- <meta property="og:image" content="{{imageUrl}}"> 
    <meta property="og:description" content="">
    <meta property="og:title" content="">
    <meta property="og:site_name" content="">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content=""> -->
    <!-- <meta name="twitter:image" content="{{imageUrl}}"> -->


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>My theme</title>
    <?php wp_head();?>
    
</head>

<body <?php body_class(); ?> >
    <nav  class="navbar fixed-top navbar-expand-lg ">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo site_url(); ?>">
                    <img src="<?php echo site_url(); ?>" alt="">
                </a>
                <button class="navbar-toggler collapsed " type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <div class="menu-icon-bar "></div>
                    <div class="menu-icon-bar "></div>
                    <div class="menu-icon-bar "></div>
                </button>
            </div>
            <div class=" collapse navbar-collapse text-alt  " id="navbarNav">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'main-menu',
                        'container'      => 'ul',
                        'depth'          => 4,
                        'menu_class'     => 'navbar-nav nav navbar-right ',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker()
                    ));
                ?>
            </div>
        </div>
    </nav>
    <!-- Navigation -->
    <div class="main">