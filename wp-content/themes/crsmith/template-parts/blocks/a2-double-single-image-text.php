<?php

$images             = get_field( 'images' );
$compare            = get_field( 'compare_images' );
$video              = get_field( 'video' );
$heading            = get_field( 'heading' );
$content_left       = get_field( 'content_left' );
$content_right      = get_field( 'content_right' );
$buttons            = get_field( '_buttons' );

$content_classes    = [];

if ( $heading_postition === 'right' ) {
    $content_classes[]  = 'flex-row-reverse';
}

?>

<div class="double-single-image-text">
    <div class="container mx-auto expand-container :">
        <?php if ( $images ) : $i = 0; ?>
            <div class="flex mb-12 <?php echo $compare ? 'img-comp-container' : ''; ?>">
                <?php foreach ( $images as $image_id ) : ?>
                    <?php
                        
                    $image_size = count( $images ) === 1 || $compare  ? 'wide_image' : 'wide_double'; 
                    $image = wp_get_attachment_image( $image_id, $image_size, ['loading' => 'lazy']);
                    
                    ?>

                    <?php if ( $image ) : ?>
                        <div class="flex-1 img-full <?php echo $compare ? 'img-comp-img' : ''; ?> <?php echo $compare && $i === 1 ? 'img-comp-overlay' : ''; ?>">
                            <?php echo $image; ?>
                        </div>
                    <?php endif; ?>
                <?php $i++; endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="flex flex-wrap -mx-4 <?php echo implode( ' ', $content_classes ); ?>">
            <div class="px-4 w-1/2">
                <?php if ( $content_left ) : ?>
                    <div><?php echo $content_left; ?></div>
                <?php endif; ?>
            </div>
            <div class="px-4 w-1/2">
                <?php if ( $content_right ) : ?>
                    <div>
                        <?php echo $content_right; ?>
                    </div>
                <?php endif; ?>
                <?php if ( ! empty( $buttons['buttons'] ) ) : ?>
                    <?php get_template_part( 'template-parts/components/buttons', '', $buttons['buttons'] ); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>