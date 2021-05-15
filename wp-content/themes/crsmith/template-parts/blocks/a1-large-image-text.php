<?php 

$image_position     = get_field( 'image_position' );
$image              = wp_get_attachment_image( get_field( 'image'), 'large' );
$video              = get_field( 'video' );
$heading            = get_field( 'heading' );
$subheading         = get_field( 'subheading' );
$content_editor     = get_field( 'content_editor' );
$buttons            = get_field( '_buttons' );

?>

<div class="large-image-text relative overflow-hidden">
    <div class="container mx-auto expand-container">
        <div class="flex flex-wrap <?php echo $image_position === 'right' ? 'flex-row-reverse' : ''; ?> -mx-4">
            <div class="px-4 w-1/2">
                <?php if ( $image ) : ?>
                    <div class="image-half-screen xl:pl-12">
                        <?php echo $image; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="px-4 w-1/2">
                <div class="py-12 max-w-xl <?php echo $image_position === 'right' ? 'xl:pr-9' : 'xl:pl-9'; ?>">
                    <?php if ( $heading ) : ?>
                        <div class="max-w-md">
                            <h2><?php echo $heading; ?></h2>
                        </div>
                    <?php endif; ?>
                    <?php if ( $content_editor ) : ?>
                        <div>
                            <?php echo $content_editor; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ( !empty( $buttons ) ) : ?>
                        <?php get_template_part( 'template-parts/components/buttons', '', $buttons ); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>