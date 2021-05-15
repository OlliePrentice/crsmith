<?php 

$images = get_field( 'images' );

?>

<?php if ( $images ) : ?>
    <div class="side-by-side-image-scaled max-w-6xl mx-auto relative z-10">
        <div class="flex justify-center -mx-3">
            <?php foreach ( $images as $image_id ) : ?>
                <?php
                    
                $image = wp_get_attachment_image( $image_id, 'side_double' );
                    
                ?>

                <?php if ( $image ) : ?>
                    <div class="w-1/2 px-3">
                        <?php echo $image; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>