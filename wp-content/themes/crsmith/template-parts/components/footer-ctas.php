<?php

$cta_count = count( get_field( 'ctas', 'options') );

?>

<?php if ( have_rows( 'ctas', 'options' ) ) : $j = 1; ?>
    <?php while ( have_rows( 'ctas', 'options' ) ) : the_row(); ?>
        <?php
        
        $heading        = get_sub_field( 'heading' );
        $space_links    = get_sub_field( 'space_links' );
        $links          = get_sub_field( 'links' );

        if ( ! empty( $links ) ) {
            for ( $i = 0; $i < count( $links ); $i++) {
                $links[$i]['classes'] = 'min-wide';
            }
        }
        
        ?>
        <div class="border-t-faded text-center <?php echo $cta_count === $j ? 'border-b-faded' : ''; ?> <?php echo $space_links ? 'space-links' : ''; ?>">
            <div class="pt-12 pb-6">
                <?php if ( $heading ) : ?>
                    <h3><?php echo $heading; ?></h3>
                <?php endif; ?>
                <?php if ( $links ) : ?>
                    <?php get_template_part( 'template-parts/components/buttons', '', $links ); ?>
                <?php endif; ?>
            </div>
        </div>
    <?php $j++; endwhile; ?>
<?php endif; ?>