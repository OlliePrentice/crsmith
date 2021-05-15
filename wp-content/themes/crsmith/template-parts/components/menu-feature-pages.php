<?php

$pages = !empty( $args['pages'] ) ? $args['pages'] : '';

?>

<?php if ( $pages ) : ?>
    <div class="menu-feature-pages pr-8 3xl:pr-12 flex -mx-4 3xl:-mx-6">
        <?php foreach ( $pages as $_page ) : ?>
            <div class="menu-feature-pages__item px-4 3xl:px-6 w-1/2">
                <a href="<?php echo get_the_permalink( $_page->ID ); ?>">
                    <h6 class="font-semibold mb-3 heading-link"><?php echo get_the_title( $_page->ID ); ?></h6>
                    <?php if ( $thumbnail = get_the_post_thumbnail( $_page->ID, 'menu_item' )) : ?>
                        <div class="mb-4">
                            <?php echo $thumbnail; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ( $excerpt = excerpt( 30, $_page->ID ) ) : ?>
                        <div class="text-base text-primary font-normal">
                            <?php echo apply_filters( 'the_content', $excerpt ); ?>
                        </div>
                    <?php endif; ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>