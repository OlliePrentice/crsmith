<?php

/**
 * F2- Header image text
 * 
 * Borrows styles from f1 - Header carousel
 */

$title              = get_field( 'title' );
$image              = wp_get_attachment_image(get_field( 'image' ), 'header_carousel');
$content_edtior     = get_field( 'content_editor' );
$link_dropdown      = get_field( 'link_dropdown' );


$classes    = [];
$offers     = crs_get_offers( get_field( 'offers_id' ) );

if($offers) {
    $classes[] = 'header-carousel--offers border-b-4 border-tertiary';
}

?>

<div class="header-image-text relative overflow-hidden <?php echo implode( ' ', $classes ); ?>">
    <div class="relative overflow-hidden">
        <div class="container mx-auto expand-container">
            <div class="flex flex-wrap -mx-4">
                <div class="px-4 w-1/2">
                    <div class="max-w-lg py-24 lg:pr-8 h-full flex flex-col justify-between">
                        <div>
                            <?php if ( $title ) : ?>
                                <div class="max-w-sm">
                                    <h1 class="mb-12"><?php echo $title; ?></h1>
                                    <?php get_template_part( 'template-parts/components/dash-spacer' ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $content_edtior ) : ?>
                                <div class="text-2xl pt-4 mb-12">
                                    <?php echo $content_edtior; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php get_template_part( 'template-parts/components/link-dropdown', '', ['options' => $link_dropdown] ); ?>
                    </div>
                </div>
                <?php if ( $image ) : ?>
                    <div class="w-1/2 self-stretch fit-image">
                        <div class="image-half-screen h-full">
                            <?php echo $image; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if ( $offers ) : ?>
            <?php get_template_part('template-parts/components/offers-expander', '', ['offers' => $offers]); ?>
        <?php endif; ?>
    </div>
</div>