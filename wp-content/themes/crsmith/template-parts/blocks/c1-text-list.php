<?php if ( have_rows( 'columns' ) ) : ?>
    <div class="text-list max-w-6xl mx-auto p-20 shadow-even relative z-10 bg-white border-b-4 border-secondary">
        <div class="flex flex-wrap -mx-4">
            <?php while ( have_rows( 'columns' ) ) : the_row(); ?>
                <?php
                
                $content_editor = get_sub_field( 'content_editor' );
                
                ?>

                <?php if ( $content_editor ) : ?>
                    <div class="px-4 lg:w-1/2 text-primary">
                        <div class="max-w-md mx-auto remove-last-margin">
                            <?php echo $content_editor; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>