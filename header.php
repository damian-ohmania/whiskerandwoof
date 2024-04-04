<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package whisker&Woof
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GWCH6J6601"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-GWCH6J6601');
    </script>
    <!-- Google tag (gtag.js) -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/upk3cwt.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // When the mobile menu button is clicked
            var navbarToggler = document.querySelector('.navbar-toggler');
            navbarToggler.addEventListener('click', function() {
                // Toggle the 'open' class on the menu container
                var menuFullPage = document.querySelector('.menu-full-page');
                menuFullPage.classList.toggle('open');
                // Prevent scrolling on the body when the menu is open
                document.body.classList.toggle('menu-open');
            });

            // When the close icon is clicked
            var closeIcon = document.querySelector('.close-icon');
            closeIcon.addEventListener('click', function() {
                // Toggle the 'open' class on the menu container to close it
                var menuFullPage = document.querySelector('.menu-full-page');
                menuFullPage.classList.remove('open');
                // Remove the 'menu-open' class from the body to enable scrolling
                document.body.classList.remove('menu-open');
            });
        });

    </script>
    <?php wp_head(); ?>
    <!-- Meta Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '3550770128503892');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=3550770128503892&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
</head>

<body <?php body_class(); ?>>
    <header class="header">
        <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-dark">
            <div class="container-fluid">
                <div class="logo-box">
                    <a class="navbar-brand" href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_field('header_logo', 'option')['url']; ?>" alt="<?php echo get_field('header_logo', 'option')['alt']; ?>" class="img-fluid">
                    </a>
                </div>
                

                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'container' => false,
                            'menu_class' => 'navbar-nav main-menu ml-auto',
                            'walker' => new WW_Walker_Nav_Menu(),
                        )
                    );
                    ?>
                    
                </div>
                <a href="https://whiskerandwoof.mwi.pet/" class="link-box-link">
                    <div class="link-box">
                        <span>Register Your Pet</span>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>

    <!-- Full-page menu container -->
    <div class="menu-full-page">
        <span class="close-icon"><i class="fas fa-chevron-right"></i></span>
        <ul class="full-page-menu">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'navbar-nav',
                    'walker' => new WW_Walker_Nav_Menu(),
                )
            );
            ?>
        </ul>
        <section class="logo">
            <img src="<?php echo get_field('bottom_logo_image')['url']; ?>" alt="<?php echo get_field('bottom_logo_image')['alt']; ?>" class="img-fluid">
        </section>
    </div>

    <main>