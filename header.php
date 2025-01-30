<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//ajax.googleapis.com">
    <link rel="dns-prefetch" href="//www.google-analytics.com">
    <link rel="dns-prefetch" href="//apis.google.com">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Balefire Marketing + Advertising">
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon.png">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/apple-icon-touch.png" rel="apple-touch-icon" />
    <?php wp_head(); ?>
    <?php
    if (defined('WP_ENV') && WP_ENV === 'development') {
        echo '<script type="module">
            if (import.meta.hot) {
                import.meta.hot.on("vite:beforeUpdate", () => {
                    console.log("Vite: beforeUpdate")
                })
            }
        </script>';
    }
    ?>
</head>
<body id="<?php if (is_front_page()) { echo 'home'; } else { echo 'int'; }?>" <?php body_class(); ?>>
<div id="page">
    <header id="masthead">
        <div class="container">
            <a href="<?php echo home_url(); ?>" class="header-logo">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/logo.svg" class="logo">
            </a>
            <nav id="nav-main">
                <?php balefire_top_nav(); ?>
            </nav>
        </div>
    </header>