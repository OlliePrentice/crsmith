<?php

$label = !empty( $args['label'] ) ? $args['label'] : '';

?>

<?php if ( $label ) : ?>
    <span class="block mb-2 text-secondary uppercase tracking-widest text-sm font-bold"><?php echo $label; ?></span>
<?php endif; ?>