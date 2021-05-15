<?php 

/**
 * E5 - 4 icon row
 */

?>

<?php if ( have_rows ( 'items' ) ) : ?>
    <div class="four-icon-row border-b border-gray-200">
        <div class="container mx-auto">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-wrap items-center -mx-4">
                    <?php while ( have_rows( 'items' ) ) : the_row(); ?>
                        <?php
                        
                        $title      = get_sub_field( 'title' );
                        $copy       = get_sub_field( 'content_editor' );
                        $image      = get_sub_field( 'image' );
                        
                        ?>
                        <div class="px-4 py-5 w-1/4">
                            <div class="px-2">
                                <div class="flex -mx-3">
                                    <?php if ( $image ) : ?>
                                        <div class="px-3 pt-2">
                                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                        </div>
                                    <?php endif; ?>
                                    <div class="flex-1 px-3">
                                        <?php if ( $title ) : ?>
                                            <h6 class="font-semibold mb-1 leading-extra-tight"><?php echo $title; ?></h6>
                                        <?php endif; ?>
                                        <?php if ( $copy ) : ?>
                                            <div class="text-base text-primary remove-last-margin">
                                                <?php echo $copy; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>