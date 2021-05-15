<?php if ( have_rows( 'items' ) ) : ?>
    <div class="two-column-icons max-w-6xl mx-auto">
        <div class="flex flex-wrap -mx-4">
            <?php while ( have_rows( 'items' ) ) : the_row(); ?>
                <?php
                
                $title              = get_sub_field( 'title' );
                $image              = get_sub_field( 'image' );
                $content_editor     = get_sub_field( 'content_editor' );
                
                ?>
                <div class="px-4 w-1/2 mb-10">
                    <div class="text-center max-w-md mx-auto">
                        <?php if ( $image ) : ?>
                            <div class="mb-4">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="mx-auto">
                            </div>
                        <?php endif; ?>
                        <?php if ( $title ) : ?>
                            <h5 class="font-semibold mb-5"><?php echo $title; ?></h5>
                        <?php endif; ?>
                        <?php if ( $content_editor ) : ?>
                            <div>
                                <?php echo $content_editor; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>