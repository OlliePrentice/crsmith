<?php

/**
 * G3 - Testimonial carousel
 */

$heading        = get_field( 'heading' );
$testimonials   = get_field( 'testimonials' );
$embed          = get_field( 'embed' );

if ( ! $testimonials ) {

    $testimonials = get_posts([
        'post_type'     => 'testimonial',
        'post_status'   => 'publish',
        'numberposts'   => 5,
        'orderby'         => 'rand'
    ]);

}

?>

<div class="testimonial-carousel text-center">
    <?php if ( $heading ) : ?>
        <div class="container mx-auto">
            <h2 class="mb-16"><?php echo $heading; ?></h2>
        </div>
    <?php endif; ?>
 
    <?php if ( $testimonials ) : ?>
        <div class="bg-quaternary">
            <div class="container mx-auto expand-container">
                <div class="testimonial-carousel__items swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach ( $testimonials as $testimonial ) : ?>
                            <?php
                                
                            $quote = get_field( 'quote', $testimonial->ID );
                            $quote_length = strlen($quote);
                            $quote_class = 'font-semibold ';

                            switch ( $quote_length ) {
                                case $quote_length > 150 && $quote_length < 199:
                                    $quote_class .= 'text-3xl md:text-4xl';
                                    break;
                                case $quote_length > 200:
                                    $quote_class .= 'text-2xl md:text-3xl';
                                    break;
                                default:
                                    $quote_class .= '';
                                    break;
                            }
                                
                            ?>
                            <?php if ( $quote ) : ?>
                                <div class="swiper-slide">
                                    <div class="px-20 pt-24 mb-10">
                                        <h2 class="<?php echo $quote_class; ?>"><?php echo $quote; ?></h2>
                                        <div>
                                            <span class="text-primary"><?php echo get_the_title( $testimonial->ID ); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="absolute-carousel-arrows">
                        <div class="swiper-button-prev swiper-button-prev--alt mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </div>
                        <div class="swiper-button-next swiper-button-next--alt mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <div class="swiper-pagination mb-10"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
  
    <?php if ( $embed ) : ?>
        <div class="py-7 bg-white">
            <div class="container mx-auto">
                <?php echo $embed; ?>     
            </div>
        </div>
    <?php endif; ?>
</div>