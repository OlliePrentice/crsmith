<?php

$id = seoUrl( $block['title'] ) . '-' . $block['id'];
if ( !empty( $block['anchor'] ) ) {
    $id = $block['anchor'];
}

$classes = !empty( $block['classes'] ) ? [$block['classes']] : [];
$classes[] = !empty( $block['default_classes'] ) ? $block['default_classes'] : '';
$classes[] = !empty( $block['backgroundColor'] ) ? 'bg-' . $block['backgroundColor'] : '';

$width = get_field( 'container_width' );

$container_classes = [];

switch ( $width ) {
    case $width === 'wide':
        $container_classes[] = 'container';
        break;
    case $width === 'expand':
        $container_classes[] = 'container expand-container';
        break;
    default:
        $container_classes[] = 'container standard-container';
        break;
} 

?>

<div id="<?php echo $id; ?>" class="full-container <?php echo implode( ' ', $classes ); ?>">
    <div class="<?php echo implode( ' ', $container_classes ); ?> mx-auto" data-aos="fade">
        <?php
        echo '<InnerBlocks/>';
        ?>
    </div>
</div>
