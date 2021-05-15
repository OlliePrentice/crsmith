<?php 

$heading            = get_field( 'heading' );
$content_editor     = get_field( 'content_editor' );
$image              = wp_get_attachment_image( get_field( 'image' ), 'portrait' );
$buttons            = get_field( '_buttons' );

?>

<div class="portrait-image-text">
    <div class="<?php echo implode( ' ', $box_classes ); ?>">
        <div class="container mx-auto expand-container">
            <div class="flex flex-wrap items-center -mx-4">
                <div class="px-4 w-1/2">
                    <div class="pr-16 py-20">
                        <?php if ( $heading ) : ?>
                            <h2 class="max-w-lg"><?php echo $heading; ?></h2>
                        <?php endif; ?>
                        <?php if ( $content_editor ) : ?>
                            <div>
                                <?php echo $content_editor; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ( ! empty( $buttons['buttons'] ) ) : ?>
                            <?php get_template_part( 'template-parts/components/buttons', '', $buttons['buttons'] ); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="px-4 w-1/2 -my-20">
                    <?php if ( $image ) : ?>
                        <div class="relative -right-24 3xl:right-0 flex justify-end">
                            <?php echo $image; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>