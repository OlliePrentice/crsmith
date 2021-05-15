<?php if ( have_rows( 'items' ) ) : ?>
    <div class="icon-row">
        <?php while ( have_rows( 'items' ) ) : the_row(); ?>
            <?php
            
            $title              = get_sub_field( 'title' );
            $image              = get_sub_field( 'image' );
            $content_editor     = get_sub_field( 'content_editor' );
            $buttons            = get_sub_field( 'buttons' );
            
            ?>
            <div class="max-w-6xl mx-auto bg-white shadow-even-lg border-b-4 border-secondary p-16 mb-8">
                <div class="flex flex-wrap -mx-4">
                    <div class="px-4">
                        <?php if ( $image ) : ?>
                            <div>
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="px-4 flex-1">
                        <div class="max-w-2xl mx-auto">
                            <?php if ( $title ) : ?>
                                <h4><?php echo $title; ?></h4>
                            <?php endif; ?>
                            <?php if ( $content_editor ) : ?>
                                <div>
                                    <?php echo $content_editor; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>