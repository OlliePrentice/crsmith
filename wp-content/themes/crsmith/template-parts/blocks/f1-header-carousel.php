<?php

/**
 * F1 - Header carousel
 */

$classes    = [];
$offers     = crs_get_offers( get_field( 'offers_id' ) );

if($offers) {
    $classes[] = 'header-carousel--offers border-b-4 border-tertiary';
} else {
    $classes[] = 'border-b-4 border-primary';
}

?>

<?php if ( have_rows( 'items' ) ) : ?>
    <div class="header-carousel relative <?php echo implode( ' ', $classes ); ?>" data-aos="fade">
        <div class="relative overflow-hidden">
            <div class="container mx-auto expand-container">

                <?php get_template_part( 'template-parts/components/carousel-control' ); ?>

                <div class="header-carousel__slider swiper-container !overflow-visible">
                    <div class="swiper-wrapper">
                        <?php while ( have_rows( 'items') ) : the_row(); ?>
                            <?php
                            
                            $title              = get_sub_field( 'title' );
                            $image              = wp_get_attachment_image( get_sub_field( 'image' ), 'header_carousel' );
                            $copy               = get_sub_field( 'content_editor' );
                            $buttons            = get_sub_field( 'buttons' );
                            $background_colour  = get_sub_field( 'background_colour');

                            ?>

                            <div class="header-carousel__item swiper-slide <?php echo $background_colour ? 'bg-' . $background_colour : ''; ?>">
                                <div class="flex flex-wrap items-center h-full">
                                    <div class="header-carousel__text">
                                        <div class="w-8/12 mx-auto py-20">
                                            <?php if ( $title ) : ?>
                                                <h2 class="text-6xl"><?php echo $title; ?></h2>  
                                            <?php endif; ?>
                                            <div class="max-w-md">
                                                <?php if ( $copy ) : ?>
                                                    <div>
                                                        <?php echo $copy; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ( $buttons ) : ?>
                                                    <?php get_template_part( 'template-parts/components/buttons', '', $buttons ); ?>    
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if ( $image ) : ?>
                                        <div class="flex-1 h-full header-carousel__image">
                                            <div class="bg-cover bg-center h-full">
                                                <?php echo $image; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <?php if ( $offers ) : ?>
                <?php get_template_part('template-parts/components/offers-expander', '', ['offers' => $offers]); ?>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>