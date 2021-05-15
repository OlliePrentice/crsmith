<?php

/**
 * G6 - Trustpilot widget
 */

$embed = get_field( 'embed' );

?>

<?php if ( $embed ) : ?>
    <div class="border-t border-gray-200 py-7">
        <div class="container mx-auto">
            <?php echo $embed; ?>     
        </div>
    </div>
<?php endif; ?>