</main>

<?php

$navigation_heading     = get_field( 'footer_navigation_heading', 'options' );
$footer_text            = get_field( 'footer_text', 'options' );

?>

<footer class="main-footer pb-16 remove-list-style">
    <div class="container mx-auto standard-container">
        <?php get_template_part( 'template-parts/components/newsletter' ); ?>
        <?php get_template_part( 'template-parts/components/footer-ctas' ) ?>

        <div class="py-12">
            <?php if ( $navigation_heading ) : ?>
                <h3 class="text-center"><?php echo $navigation_heading; ?></h3>
            <?php endif; ?>
            <nav class="main-footer__nav pt-6 remove-underlines">
                <?php wp_nav_menu(array('theme_location' => 'footer', 'container' => false)); ?>
            </nav>
        </div>
        <?php get_template_part( 'template-parts/components/social' ); ?>
        <?php if ( $footer_text ) : ?>
            <div class="text-center text-xs text-gray-400 pt-5 remove-last-margin">
                <?php echo $footer_text; ?>
            </div>
        <?php endif; ?>
    </div>
</footer><!-- .mastfoot -->

<?php

$google_maps_key = get_field('google_maps_api_key', 'options');

?>

<?php if($google_maps_key) : ?>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $google_maps_key; ?>"></script>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
