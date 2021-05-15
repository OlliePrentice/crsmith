<?php

$images = get_field( 'images' );

?>

<?php if ( $images ) : $i = 1; ?>
    <div class="image-trio">
        <div class="grid grid-rows-2 grid-flow-col gap-4 max-w-10xl mx-auto">
            <?php foreach ( $images as $image_id ) : ?>
                <?php

                    $item_classes = [];
                    
                    switch ( $i ) {
                        case $i === 1:
                            break;
                        case $i === 2:
                            break;
                        case $i === 3:
                            $item_classes[] = 'row-span-2 col-span-2';
                            break;

                    }
                    
                    
                ?>

                <div class="<?php echo implode( ' ', $item_classes ); ?> fit-image img-full">
                    <?php echo wp_get_attachment_image( $image_id, 'trio' ); ?>
                </div>
            <?php $i++; endforeach; ?>

        </div>
    </div>
<?php endif; ?>