<?php

$offers = get_field( 'offers' );

?>

<?php if ( $offers ) : ?>
    <div class="offer-carousel">
        <div class="max-w-6xl mx-auto">
            <?php
            
            if ( count( $offers ) > 1 ) {
                get_template_part( 'template-parts/components/carousel-control' ); 
            }
            
            ?>
            <div class="offer-carousel__items swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ( $offers as $offer ) : ?>
                        <div class="swiper-slide">
                            <?php get_template_part( 'template-parts/components/card', 'offer-wide', ['offer' => $offer] ); ?>
                        </div>    
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>