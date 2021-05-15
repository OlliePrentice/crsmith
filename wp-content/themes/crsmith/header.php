<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta HTTP-EQUIV="Content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9;IE=10;IE=Edge,chrome=1"/>
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

    <?php wp_head(); ?>


    <link rel="preconnect" href="https://use.typekit.net">
    <link rel="preload" as="style"
          href="https://use.typekit.net/sts4lit.css"/>
    <link href="https://use.typekit.net/sts4lit.css"
          rel="stylesheet" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet"
              href="https://use.typekit.net/sts4lit.css"/>
    </noscript>

    <!-- TrustBox script -->
    <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
    <!-- End TrustBox script -->
</head>

<body <?php body_class(); ?>>

<?php

$logo = get_field( 'logo', 'options' );

?>

<header class="main-header fixed top-0 left-0 w-full z-50 bg-white remove-list-style">
    <div class="relative">
        <div class="container standard-container mx-auto">
            <div class="border-b border-gray-300">
                <div class="flex -mx-2 items-center">
                    <div class="flex-1 px-2 text-zero">
                        <div class="main-header__logo inline-block ">
                            <a href="<?= home_url('/'); ?>"
                            class="main-header__logo-link block">
                                <?php if ( $logo ) : ?>
                                    <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
                                <?php else : ?>
                                    <?php _e('CR Smith'); ?>
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>
                    <div class="px-2 remove-underlines text-zero -mx-2">
                        <?php get_template_part( 'template-parts/components/header-top-bar' ); ?>
                    </div>
                </div>
            </div>
        </div>
      
        <div>
            <div class="container standard-container mx-auto">
                <div class="flex flex-wrap justify-between -mx-4 remove-link-style">
                    <div class="px-4">
                        <nav class="main-header__nav text-zero">
                            <?php wp_nav_menu(['theme_location' => 'primary', 'container' => false, 'walker' => new OP_Walker_Nav]); ?>
                        </nav>
                    </div>
                    <div class="px-4">
                        <nav class="main-header__nav main-header__nav--secondary text-zero">
                            <?php wp_nav_menu(['theme_location' => 'secondary', 'container' => false, 'walker' => new OP_Walker_Nav]); ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header><!-- .masthead -->

<?php

get_template_part('template-parts/components/mobile-navigation');

?>

<main class="site-wrapper">
