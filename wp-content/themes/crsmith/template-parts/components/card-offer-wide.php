<?php 

$offer = !empty( $args['offer'] ) ? $args['offer'] : '';

?>

<?php if ( $offer ) : ?>
    <?php 
        
    $subtext    = get_field( 'offer_subtext', $offer->ID );
    $end_date   = get_field( 'offer_end_date', $offer->ID );
    $image      = get_the_post_thumbnail( $offer->ID, 'wide_double' );

    ?>
    <article class="card-offer-wide remove-underlines">
        <a href="<?php echo get_the_permalink( $offer->ID ); ?>" class="block bg-primary border-b-4 border-tertiary">
            <div class="flex flex-wrap -mx-4">
                <div class="px-4 w-7/12">
                    <div class="px-16 py-10">
                        <h4 class="font-bold mb-5"><?php echo get_the_title( $offer->ID ); ?></h4>
                        <?php if ( $subtext ) : ?>
                            <p class="text-2xl md:text-3xl mb-12"><?php echo $subtext; ?></p>
                        <?php endif; ?>
                        <?php if ( $end_date ) : ?>
                            <h4 class="font-bold underline"><?php echo $end_date; ?></h4>
                        <?php endif; ?>
                        <div class="btn-wrap pt-3">
                            <span class="btn btn--tertiary fill text-white"><?php echo __( 'Learn more' ); ?></span>
                        </div>
                    </div>
                </div>
                <div class="px-4 w-5/12 fit-image">
                    <?php if ( $image ) : ?>
                        <?php echo $image; ?>
                    <?php endif; ?>
                </div>
            </div>
        </a>
    </article>
<?php endif; ?>