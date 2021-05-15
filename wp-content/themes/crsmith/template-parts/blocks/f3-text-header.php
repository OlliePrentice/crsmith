<?php

$title              = get_field( 'title' );
$content_editor     = get_field( 'content_editor' );

?>

<div class="text-header">
    <div class="container mx-auto expand-container">
        <div class="flex flex-wrap -mx-4">
            <div class="px-4 w-1/2">
                <?php if ( $title ) : ?>
                    <div class="max-w-xl">
                        <h1><?php echo $title; ?></h1>
                        <?php get_template_part( 'template-parts/components/dash-spacer' ); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="px-4 w-1/2">
                <?php if ( $content_editor ) : ?>
                    <div class="max-w-lg mx-auto xl:pr-8">
                        <div class="text-2xl">
                            <?php echo $content_editor; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>