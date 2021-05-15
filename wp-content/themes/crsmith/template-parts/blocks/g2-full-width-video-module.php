<?php 

$mode       = get_field( 'mode' );
$link       = get_field( 'link' );
$file       = get_field( 'file' );
$thumbnail  = wp_get_attachment_image( get_field( 'thumbnail' ), 'trio' );

$url        = $link;

if ( $mode === 'file' ) {
    $url    = !empty( $file['url'] ) ? $file['url'] : '';
}

?>

<div class="full-width-video max-w-4xl mx-auto">
    <?php if ( $thumbnail && $url ) : ?>
        <a href="<?php echo $url; ?>" data-fancybox class="block text-center">
            <div class="relative inline-block">
                <?php echo $thumbnail; ?>
                <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"><?php echo get_inline_svg( 'play.svg' ); ?></span>
            </div>
        </a>
    <?php endif; ?>
</div>