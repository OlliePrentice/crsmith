<?php

$slide_count = get_field( 'items' ) ? count( get_field( 'items' ) ) : '';

?>

<?php if ( have_rows( 'items' ) ) : $i = 1; ?>
    <div class="image-slider overflow-hidden">
        <div class="max-w-6xl mx-auto z-10 relative">
            <div class="image-slider__slides swiper-container !overflow-visible">
                <div class="swiper-wrapper">
                    <?php while ( have_rows( 'items' ) ) : the_row(); ?>
                        <?php
                        
                        $background_colour      = get_sub_field( 'background_colour' );
                        $image_position         = get_sub_field( 'image_position' );
                        $heading                = get_sub_field( 'heading' );
                        $image                  = wp_get_attachment_image( get_sub_field( 'image'), 'wide_double' );
                        $content_editor         = get_sub_field( 'content_editor' );
                        $buttons                = get_sub_field( 'buttons' );
                        
                        ?>
                        <div class="swiper-slide py-3">
                            <div class="bg-<?php echo $background_colour; ?> shadow-even">
                                <div class="flex">
                                    <?php if ( $image_position === 'left' ) : ?>
                                        <div class="w-1/2 fit-image">
                                            <?php if ( $image ) : ?>
                                                <?php echo $image; ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="pt-16 px-16 pb-8 w-1/2 flex flex-col justify-between">
                                        <div class="max-w-sm">
                                            <?php if ( $heading ) : ?>
                                                <h3 class="mb-4"><?php echo $heading; ?></h3>
                                            <?php endif; ?>
                                            <?php if ( $content_editor ) : ?>
                                                <div>
                                                    <?php echo $content_editor; ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ( !empty( $buttons ) ) : ?>
                                                <?php get_template_part( 'template-parts/components/buttons', '', $buttons ); ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="flex flex-wrap items-center justify-between -mx-2">
                                            <div class="px-2">
                                                <span class="font-bold text-base !text-secondary"><?php echo $i . ' ' . __('of') . ' ' . $slide_count; ?></span>    
                                            </div>
                                            <div class="px-2">
                                                <?php get_template_part( 'template-parts/components/carousel-control' ); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ( $image_position === 'right' ) : ?>
                                        <div class="w-1/2 fit-image">
                                            <?php if ( $image ) : ?>
                                                <?php echo $image; ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php $i++; endwhile; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>