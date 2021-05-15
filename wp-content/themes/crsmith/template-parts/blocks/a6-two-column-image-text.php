<?php if ( have_rows( 'columns' ) ) : ?>
    <div class="two-column-image-text max-w-6xl mx-auto">
        <div class="flex flex-wrap -mx-3">
            <?php while( have_rows( 'columns' ) ) : the_row(); ?>
                <?php
                
                $background_colour      = get_sub_field( 'background_colour' );
                $image                  = wp_get_attachment_image( get_sub_field( 'image'), 'card_wide' );
                $video                  = get_sub_field( 'video' );
                $heading                = get_sub_field( 'heading' );
                $subheading             = get_sub_field( 'subheading' );
                $content_editor         = get_sub_field( 'content_editor' );
                $buttons                = get_sub_field( 'buttons' );
                
                ?>

                <div class="px-3 w-1/2">
                    <div class="shadow-even-lg h-full flex flex-col">
                        <?php if ( $image ) : ?>
                            <div>
                                <?php echo $image; ?>
                            </div>
                        <?php endif; ?>
                        <div class="p-10 <?php echo $background_colour ? 'bg-' . $background_colour : 'bg-white'; ?> flex-1">
                            <?php if ( $heading ) : ?>
                                <h4><?php echo $heading; ?></h4>
                            <?php endif; ?>
                            <?php if ( $subheading ) : ?>
                                <h6 class="font-light"><?php echo $subheading; ?></h6>
                            <?php endif; ?>
                            <?php if ( $content_editor ) : ?>
                                <div>
                                    <?php echo $content_editor; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $buttons ) : ?>
                                <?php get_template_part( 'template-parts/components/buttons', '', $buttons ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>