<?php 

/**
 * C8 - Title
 */

$heading_width  = get_field( 'heading_width' );
$content_width  = get_field( 'content_width' );
$preheading     = get_field( 'preheading' );
$heading        = get_field( 'heading' );
$content_editor = get_field( 'content_editor' );
$buttons        = get_field( '_buttons' );

?>

<div class="text-center <?php if ( $heading_width && $content_editor ) : ?>max-w-3xl<?php endif; ?> mx-auto">
    <div class="<?php echo !$heading_width ? 'max-w-xl' : ''; ?> mx-auto" <?php echo $heading_width ? 'style="max-width: ' . $heading_width . 'px;"' : ''; ?>>
        <?php if ( $preheading ) : ?>
            <h3 class="font-light"><?php echo $preheading; ?></h3>
        <?php endif; ?>
        <?php if ( $heading ) : ?>
            <h2><?php echo $heading; ?></h2>
            <?php get_template_part( 'template-parts/components/dash-spacer' ); ?>
        <?php endif; ?>
    </div>
    <?php if ( $content_editor ) : ?>
        <div class="mx-auto" <?php echo $content_width ? 'style="max-width: ' . $content_width . 'px;"' : ''; ?>>
            <?php echo $content_editor; ?>
        </div>
    <?php endif; ?>
    <?php if ( !empty( $buttons['buttons'] ) ) : ?>
        <div class="pt-5">
            <?php get_template_part( 'template-parts/components/buttons', '', $buttons['buttons'] ); ?>
        </div>
    <?php endif; ?>
</div>