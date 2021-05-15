<?php 

/**
 * G1 - News module
 */

$mode       = get_field( 'mode' );
$heading    = get_field( 'heading' );
$link       = get_field( 'link' );
$_posts     = [];

if ( $mode === 'query' || $mode === 'relationship' ) {

    if ( $mode === 'query' ) {

        $cats   = get_field( 'categories' );
        $tags   = get_field( 'tags' );

        $args = [
            'post_type'     => 'post',
            'post_status'   => 'publish',
            'numberposts'   => 3,
        ];

        $tax_query = [];

        if ( $cats ) {
            $tax_query[] = [
                'taxonomy'  => 'category',
                'terms'     => $cats,
            ];
        }

        if( $tags ) {
            $tax_query[] = [
                'taxonomy'  => 'post_tag',
                'terms'     => $tags,
            ];
        }

        $args['tax_query'] = $tax_query;

        $items = get_posts( $args );

    } else {

        $items = get_field( 'posts' );
    }
    

    foreach ( $items as $item ) {
        $_posts[] = [
            'label'             => get_terms_string( $item->ID, 'category' ),
            'heading'           => get_the_title( $item->ID ),
            'excerpt'           => apply_filters( 'the_content', excerpt( 50, $item->ID ) ),
            'image'             => get_the_post_thumbnail( $item->ID, 'card', ['loading' => 'lazy'] ),
            'link'              => ['url' => get_the_permalink( $item->ID), 'target' => '', 'title' => '' ]
        ];
    }

} elseif ( $mode === 'custom' ) {

    $items = get_field( 'items' );

    foreach ( $items as $item ) {
        $_posts[] = [
            'label'             => !empty( $item['label'] ) ? $item['label'] : '',
            'heading'           => !empty( $item['title'] ) ? $item['title'] : '',
            'excerpt'           => !empty( $item['content_editor'] ) ? $item['content_editor'] : '',
            'image'             => !empty( $item['image'] ) ? wp_get_attachment_image( $item['image'], 'card', ['loading' => 'lazy'] ) : '',
            'link'              => !empty( $item['link'] ) ? $item['link'] : '',
        ];
    }

}



?>

<div class="news-module">
    <div class="container mx-auto standard-container">
        <div class="flex flex-wrap items-center justify-between -mx-4 mb-6">
            <?php if ( $heading ) : ?>
                <div class="px-4">
                    <h2><?php echo $heading; ?></h2>
                </div>
            <?php endif; ?>
            <?php if ( $link ) : ?>
                <div class="px-4">
                    <div class="mb-5">
                    <?php get_template_part( 'template-parts/components/link', '', $link ); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>    
        <?php if ( $_posts ) : ?> 
            <div class="flex flex-wrap -mx-3">
                <?php foreach ( $_posts as $_post ) : ?>
                    <div class="px-3 w-1/3">
                        <?php get_template_part( 'template-parts/components/card', 'post', ['post' => $_post] ); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>