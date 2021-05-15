<?php

$heading_width  = get_field( 'heading_width' );
$content_width  = get_field( 'content_width' );
$preheading         = get_field( 'preheading' );
$heading            = get_field( 'heading' );
$content_editor     = get_field( 'content_editor' );
$buttons            = get_field( '_buttons' );

?>

<div class="styled-headline pt-28 pb-1 split-line">
    <div class="container mx-auto">
        <div class="text-center <?php if ( $heading_width && $content_editor ) : ?>max-w-3xl<?php endif; ?> mx-auto">
            <?php if ( $preheading || $heading ) : ?>
                <div class="<?php echo !$heading_width ? 'max-w-xl' : ''; ?> mx-auto" <?php echo $heading_width ? 'style="max-width: ' . $heading_width . 'px;"' : ''; ?>>
                    <?php if ( $preheading ) : ?>
                        <h6 class="font-light mb-4"><?php echo $preheading; ?></h6>
                    <?php endif; ?>
                    <?php if ( $heading ) : ?>
                        <h2><?php echo $heading; ?></h2>
                        <?php get_template_part( 'template-parts/components/dash-spacer' ); ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
    
            <?php if ( $content_editor ) : ?>
                <div class="mx-auto" <?php echo $content_width ? 'style="max-width: ' . $content_width . 'px;"' : ''; ?>>
                    <?php echo $content_editor; ?>
                </div>
            <?php endif; ?>
            <?php if ( !empty( $buttons['buttons'] ) ) : ?>
                <?php get_template_part( 'template-parts/components/buttons', '', $buttons['buttons'] ); ?>
            <?php endif; ?>
        </div>
    </div>
</div>