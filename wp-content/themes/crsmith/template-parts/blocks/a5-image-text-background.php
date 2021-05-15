<?php 

$background_colour      = get_field( 'background_colour' );
$small_container        = get_field( 'small_container' );
$image_position         = get_field( 'image_position' );
$image                  = wp_get_attachment_image( get_field( 'image'), 'header_carousel' );
$heading                = get_field( 'heading' );
$subheading             = get_field( 'subheading' );
$content_editor         = get_field( 'content_editor' );
$buttons                = get_field( '_buttons' );

?>

<div class="image-text-background <?php echo $small_container ? 'max-w-6xl mx-auto' : 'bg-' . $background_colour; ?>">
    <div class="flex flex-wrap items-center -mx-3 <?php echo $image_position === 'right' ? 'flex-row-reverse' : ''; ?>">
        <div class="w-1/2 px-3 <?php echo $image_position === 'right' ? 'img-right' : ''; ?>">
            <?php if ( $image ) : ?>
                <?php echo $image; ?>
            <?php endif; ?>
        </div>
        <div class="px-3 w-1/2">
            <div class="<?php echo $small_container ? 'max-w-lg' : 'max-w-xl mx-auto px-4'; ?> <?php echo $small_container && $image_position === 'right' ? 'xl:pr-8' : ''; ?> <?php echo $small_container && $image_position === 'left' ? 'xl:pl-8 ml-auto' : ''; ?>">
                <div class="max-w-md">
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
                <?php if ( !empty( $buttons['buttons'] ) ) : ?>
                    <?php get_template_part( 'template-parts/components/buttons', '', $buttons['buttons'] ); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>