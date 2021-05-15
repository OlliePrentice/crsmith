<?php 

$image_position     = get_field( 'image_position' );
$image              = wp_get_attachment_image( get_field( 'image'), 'full' );
$video              = get_field( 'video' );
$heading            = get_field( 'heading' );
$subheading         = get_field( 'subheading' );
$content_editor     = get_field( 'content_editor' );
$buttons            = get_field( '_buttons' );

?>

<div class="medium-image-text overflow-hidden">
    <div class="container mx-auto expand-container">
        <div class="flex flex-wrap items-center <?php echo $image_position === 'right' ? 'flex-row-reverse' : ''; ?> -mx-4">
            <div class="px-4 w-1/2">
                <?php if ( $image ) : ?>
                    <div class="max-w-2xl medium-image-text__image relative <?php echo $image_position === 'right' ? 'medium-image-text__image--right' : 'medium-image-text__image--left'; ?>">
                        <?php echo $image; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="px-4 w-1/2">
                <div class="max-w-xl">
                    <div class="max-w-lg">
                        <?php if ( $heading ) : ?>
                            <h2><?php echo $heading; ?></h2>
                        <?php endif; ?>
                        <?php if ( $subheading ) : ?>
                            <h4 class="font-light"><?php echo $subheading; ?></h4>
                        <?php endif; ?>
                    </div>
                    <?php if ( $content_editor ) : ?>
                        <div>
                            <?php echo $content_editor; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ( $buttons['buttons'] ) : ?>
                        <?php get_template_part( 'template-parts/components/buttons', '', $buttons['buttons'] ); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>