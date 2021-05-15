<?php 

$images = get_field( 'images' );

?>

<?php if ( $images ) : ?>
    <div class="side-by-side-image">
        <div class="flex justify-center max-w-10xl mx-auto relative z-10">
            <?php foreach ( $images as $image_id ) : ?>
                <?php
                
                $image = wp_get_attachment_image( $image_id, 'header_carousel' );
                    
                ?>

                <?php if ( $image ) : ?>
                    <div class="w-1/2">
                        <?php echo $image; ?>
                    </div>
                <?php endif; ?>

            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>