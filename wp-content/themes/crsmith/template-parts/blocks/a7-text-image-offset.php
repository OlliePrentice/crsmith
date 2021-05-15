<?php if ( have_rows( 'columns' ) ) : $i = 0; ?>
    <div class="text-image-offset">
        <div class="container mx-auto expand-container">
            <div class="flex flex-wrap -mx-4">
                <?php while ( have_rows( 'columns' ) ) : the_row(); ?>
                    <?php
                    
                    $image              = wp_get_attachment_image( get_sub_field( 'image' ), 'full' );
                    $video              = get_sub_field( 'video' );
                    $heading            = get_sub_field( 'heading' );
                    $content_editor     = get_sub_field( 'content_editor' );
                    $buttons            = get_sub_field( 'buttons' );
                    
                    ?>
                    <div class="w-1/2 px-4 text-image-offset__col">
                        <div class="xl:flex xl:flex-col xl:justify-between h-full">
                            <?php if ( $i === 1 ) : ?>
                                <?php if ( $image ) : ?>
                                    <div class="mb-10">
                                        <?php echo $image; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                                <div class="max-w-lg lg:pr-8 pt-10">
                                    <?php if ( $heading ) : ?>
                                        <h2 class="mb-10"><?php echo $heading; ?></h2>
                                    <?php endif; ?>
                                    <?php if ( $content_editor ) : ?>
                                        <div class="remove-last-margin">
                                            <?php echo $content_editor; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ( $buttons ) : ?>
                                        <div>
                                            <?php get_template_part( 'template-parts/components/buttons', '', $buttons ); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php if ( $i === 0 ) : ?>
                                <?php if ( $image ) : ?>
                                    <div class="mt-20">
                                        <?php echo $image; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php $i++; endwhile; ?>
            </div>
        </div>
    </div>
<?php endif; ?>