<?php 

/**
 * A8 - Blurred image and text
 */

$background_image   = wp_get_attachment_image_url( get_field( 'image' ), 'full' );
$blur_image         = get_field( 'blur_image' );
$background_colour  = get_field( 'background_colour' ) ? get_field( 'background_colour' ) : 'white';
$heading            = get_field( 'heading' );
$subheading         = get_field( 'subheading' );
$content_editor     = get_field( 'content_editor' );
$buttons            = get_field( '_buttons' );


$box_classes = [ $background_colour ? 'bg-' . $background_colour : '', $background_colour === 'primary' ? 'theme-dark' : '' ];

?>

<div class="full-width-image-text blurred-image-text relative pb-48">
    <div class="relative">
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
            <div class="bg-cover bg-center absolute top-0 left-0 w-full h-full <?php echo $blur_image ? 'blur-scroller' : ''; ?>" style="background-image: url(<?php echo $background_image; ?>);"></div>
        </div>
        <div class="container expand-container mx-auto pt-80 blurred-image-text__content">

            <div class="flex flex-wrap -mx-3 mt-5 relative top-48" data-aos="fade-up">
                <div class="w-full px-3 xl:px-6 max-w-5xl mx-auto">
                    <div class="blurred-image-text__box flex items-center p-20 border-b-4 border-secondary shadow-xl <?php echo implode( ' ', $box_classes ); ?>">
                        <div class="text-center">                            
                            <div class="max-w-lg mx-auto">
                                <?php if ( $heading ) : ?>
                                    <h2><?php echo $heading; ?></h2>
                                <?php endif; ?>
                                <?php if ( $subheading ) : ?>
                                    <h5><?php echo $subheading; ?></h5>
                                <?php endif; ?>
                            </div>
                            <?php if ( $content_editor ) : ?>
                                <div class="text-gray-600">
                                    <?php echo $content_editor; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( ! empty( $buttons['buttons'] ) ) : ?>
                                <?php get_template_part( 'template-parts/components/buttons', '', $buttons['buttons'] ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>   
</div>