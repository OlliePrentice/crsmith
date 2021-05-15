<?php

$mode               = get_field( 'mode' );
$background_colour  = get_field( 'background_colour' );
$centre_slides      = get_field( 'centre_slides' );
$hide_card_excerpts = get_field( 'hide_card_excerpts' );
$_posts             = [];

if ( $mode === 'custom' ) {

    $items  = get_field( 'items' );
    foreach ( $items as $item ) {
        $_posts[] = [
            'label'             => !empty( $item['preheading'] ) ? $item['preheading'] : '',
            'heading'           => !empty( $item['heading'] ) ? $item['heading'] : '',
            'excerpt'           => !empty( $item['content_editor'] ) ? $item['content_editor'] : '',
            'image'             => !empty( $item['image'] ) ? wp_get_attachment_image( $item['image'], 'card_wide' ) : '',
            'link'              => !empty( $item['link'] ) ? $item['link'] : '',
        ];
    }

} else {

    $items  = get_field( 'posts' );
    foreach ( $items as $item ) {
        $_posts[] = [
            'label'             => get_terms_string( $item->ID, 'region' ),
            'heading'           => get_the_title( $item->ID ),
            'excerpt'           => apply_filters( 'the_content', excerpt( 50, $item->ID ) ),
            'image'             => get_the_post_thumbnail( $item->ID, 'card_wide', ['loading' => 'lazy'] ),
            'link'              => ['url' => get_the_permalink( $item->ID), 'target' => '', 'title' => __("Explore our") . ' ' . get_the_title( $item->ID ) ]
        ];
    }
}

if ( $block['backgroundColor'] === 'primary' || $block['backgroundColor'] === 'secondary' || $block['backgroundColor'] === 'teritary' ) {
    $dark = true;
}

?>

<?php if ( $_posts ) : ?>
    <div class="full-width-carousel <?php echo $hide_card_excerpts ? 'short-cards' : ''; ?> <?php echo $hide_card_excerpts && $dark ? 'theme-dark' : ''; ?>">
    
        <div class="bg-<?php echo $background_colour; ?>">
            <div class="container mx-auto">
                <div class="max-w-6xl mx-auto">
                    <?php get_template_part( 'template-parts/components/carousel-control' ); ?>
                </div>
            </div>
        </div>
        <div class="relative overflow-hidden pb-3">
            <?php if ( $background_colour ) : ?>
                <span class="half-background bg-<?php echo $background_colour; ?>"></span>
            <?php endif; ?>
            <div class="container mx-auto">
                <div class="max-w-6xl mx-auto">
                    <div class="full-width-carousel__slides swiper-container !overflow-visible" <?php echo $centre_slides ? 'data-slides="center"' : ''; ?>>
                        <div class="swiper-wrapper">
                            <?php foreach ( $_posts as $_post ) : ?>
                                <div class="swiper-slide !h-auto">
                                    <?php get_template_part( 'template-parts/components/card', 'case-study', ['post' => $_post] ); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>