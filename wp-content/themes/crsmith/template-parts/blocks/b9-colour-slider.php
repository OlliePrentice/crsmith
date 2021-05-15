<?php if ( have_rows( 'tabs' ) ) : ?>
    <div class="colour-slider tabbed-items">
        <div class="container mx-auto expand-container">
            <div class="buttons text-center mb-8">
                <?php while ( have_rows( 'tabs' ) ) : the_row(); ?>
                    <?php
                    
                    $tab_heading = get_sub_field( 'heading' );
                    
                    ?>
                
                        <?php if ( $tab_heading ) : ?>
                            <div class="btn-wrap">
                                <span class="btn cursor-pointer tab-action"><?php echo $tab_heading; ?></span>
                            </div>
                        <?php endif; ?>
                
                <?php endwhile; ?>
            </div>
            <?php while ( have_rows( 'tabs' ) ) : the_row(); ?>
                <?php 
                
                $mode       = get_sub_field( 'mode' );
                $round      = get_sub_field( 'round' );
                $view       = get_sub_field( 'slides_per_view' );
                $center     = get_sub_field( 'centre_slides' );
                
                ?>
                <div>
                    <?php if ( have_rows( 'items' ) ) : ?>
                        <div class="tab-content">
                            <?php get_template_part( 'template-parts/components/carousel-control' ); ?>
                            <div class="pt-4">
                                <div class="colour-slider__items <?php echo $center ? 'colour-slider__items--center' : ''; ?> swiper-container " data-mode="<?php echo $mode; ?>" data-slides="<?php echo $view; ?>" data-center="<?php echo $center; ?>">
                                    <div class="swiper-wrapper items-center">
                                        <?php while ( have_rows( 'items' ) ) : the_row(); ?>
                                            <div class="swiper-slide">
                                                <?php
                                                
                                                $image              = wp_get_attachment_image( get_sub_field( 'image' ), 'medium' );
                                                $colour             = get_sub_field( 'colour' );
                                                $heading            = get_sub_field( 'heading' );
                                                $content_editor     = get_sub_field( 'content_editor' );

                                                ?>
                                                <div class="text-center">
                                                    <?php if ( $mode === 'colour' ) : ?>
                                                        <div class="mb-8 colour-slider__colour-wrap">
                                                            <span style="background-color: <?php echo $colour; ?>;" class="block mx-auto colour-slider__colour rounded-full"></span>
                                                        </div>
                                                    <?php else : ?>
                                                        <?php if ( $image ) : ?>
                                                            <?php if ( $center ) : ?>
                                                                <div class="mb-8 colour-slider__colour-wrap">
                                                                    <span class="block mx-auto colour-slider__colour rounded-full"><?php echo $image; ?></span>
                                                                </div>
                                                            <?php else : ?>
                                                                <div class="img-center mb-8 <?php echo $round ? 'rounded-full overflow-hidden' : ''; ?>">
                                                                    <?php echo $image; ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if ( $heading ) : ?>
                                                        <h5 class="font-semibold m-2"><?php echo $heading; ?></h5>
                                                    <?php endif; ?>
                                                    <?php if ( $content_editor ) : ?>
                                                        <div class="text-base">
                                                            <?php echo $content_editor; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>