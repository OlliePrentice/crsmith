<?php

$title          = get_field( 'title' );
$link           = get_field( 'link' );
$content_editor = get_field( 'content_editor' );
$mode           = get_field( 'mode' );

$_posts = [];

if ( $mode === 'relationship' ) {
    
    $items  = get_field( 'faqs' );

    foreach ( $items as $item ) {

        $_posts[] = [
            'heading'           => get_the_title( $item->ID ),
            'excerpt'           => apply_filters( 'the_content', $item->post_content ),
            'buttons'           => !empty( get_field( 'faq_buttons', $item->ID )['buttons'] ) ? get_field( 'faq_buttons', $item->ID )['buttons'] : ''
        ];

    }

} else {

    $items  = get_field( 'accordion' );

    foreach ( $items as $item ) {

        $_posts[] = [
            'heading'           => !empty( $item['heading'] ) ? $item['heading'] : '',
            'excerpt'           => !empty( $item['content_editor'] ) ? $item['content_editor'] : '',
            'buttons'           => !empty( $item['buttons'] ) ? $item['buttons'] : '',
        ];
        
    }
}

?>

<div class="full-width-accordion">
    <div class="container mx-auto expand-container">
        <div class="bg-white p-16 shadow-even border-b-4 border-secondary">
            <div class="flex flex-wrap items-center -mx-4 mb-3">
                <div class="px-4 flex-1">
                    <?php if ( $title ) : ?>
                        <h2 class="mb-4"><?php echo $title; ?></h2>
                    <?php endif; ?>
                </div>
                <div class="px-4">
                    <?php if ( $link ) : ?>
                        <div class="mb-4">
                            <?php get_template_part( 'template-parts/components/link', '', $link ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if ( $_posts ) : ?>
                <div>
                    <?php foreach ( $_posts as $_post ) : ?>
                        <?php get_template_part( 'template-parts/components/dropdown', '', ['post' => $_post] ); ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>