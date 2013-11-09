<!DOCTYPE html>
<html class="no-js">
<head>
    <!-- METADATA -->
    <title><?php wp_title(''); ?></title>
    <meta name="description" content="<?php wp_title(); echo ' | '; bloginfo( 'description' ); ?>" />
    <meta charset="utf-8">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>
<body <?php body_class('squeaky'); ?>>
<div class="wrapper">
    <header class="main">
        <h1 class="blog-name">
            <!-- TODO: Create option in theme customizer to upload new logo -->
            <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
        </h1>
        <nav class="primary" role="navigation">
            <?php wp_nav_menu( array(
                'container' => 'ul',
                'menu_class' => 'springtheme-main-menu',
                'menu_id' => 'main-nav',
                'depth' => 0,
                'theme_location' => 'header_menu'
            ));
            ?>
        </nav>
    </header>
