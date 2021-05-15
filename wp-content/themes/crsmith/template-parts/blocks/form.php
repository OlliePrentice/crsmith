<?php

$heading            = get_field( 'heading' );
$content_editor     = get_field( 'content_editor' );
$form_id            = get_field( 'form_id' );

?>

<div class="form max-w-6xl mx-auto">
    <div class="flex flex-wrap -mx-4">
        <div class="px-4 w-5/12">
            <div class="max-w-sm">
                <?php if ( $heading ) : ?>
                    <h2><?php echo $heading; ?></h2>
                    <?php get_template_part( 'template-parts/components/dash-spacer' ); ?>
                <?php endif; ?>
                <?php if ( $content_editor ) : ?>
                    <div>
                        <?php echo $content_editor; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="px-4 w-7/12">
            <?php 
            
            if ( $form_id ) {
                gravity_form( $form_id, false, false, false, null, true ); 
            }
            
            ?>
        </div>
    </div>
</div>