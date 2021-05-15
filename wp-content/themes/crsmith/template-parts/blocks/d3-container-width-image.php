<?php

$image = wp_get_attachment_image( get_field( 'image'), 'full' );

?>

<?php if ( $image ) : ?>
    <div class="container-width-image max-w-6xl mx-auto relative z-10">
        <?php echo $image; ?>
    </div>
<?php endif; ?>