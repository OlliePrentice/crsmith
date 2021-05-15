<?php

/**
 * B4 - Featured products carousel
 */

$mode       = get_field( 'mode' );
$_posts = [];

if ( $mode === 'custom' ) {

    $items  = get_field( 'items' );
    foreach ( $items as $item ) {
        $_posts[] = [
            'heading'           => !empty( $item['heading'] ) ? $item['heading'] : '',
            'excerpt'           => !empty( $item['content_editor'] ) ? $item['content_editor'] : '',
            'image'             => !empty( $item['image'] ) ? wp_get_attachment_image( $item['image'], 'card_wide' ) : '',
            'link'              => !empty( $item['button'] ) ? $item['button'] : '',
        ];
    }

} else {

    $items  = get_field( 'posts' );
    foreach ( $items as $item ) {
        $_posts[] = [
            'heading'           => get_the_title( $item->ID ),
            'excerpt'           => apply_filters( 'the_content', excerpt( 50, $item->ID ) ),
            'image'             => get_the_post_thumbnail( $item->ID, 'card_wide', ['loading' => 'lazy'] ),
            'link'              => ['url' => get_the_permalink( $item->ID), 'target' => '', 'title' => __("Explore our") . ' ' . get_the_title( $item->ID ) ]
        ];
    }

}



?>

<?php if ( $_posts ) : ?>
    <div class="featured-products-carousel pb-4">    
        <div class="container mx-auto expand-container">

        <?php get_template_part( 'template-parts/components/carousel-control' ); ?>

            <div class="featured-products-carousel__slider swiper-container !overflow-visible">
                <div class="swiper-wrapper">
                    <?php foreach ( $_posts as $_post ) : ?>

                        <div class="swiper-slide max-w-2xl">
                            <?php get_template_part( 'template-parts/components/card-carousel', '', ['post' => $_post] ); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>  
<?php endif; ?>