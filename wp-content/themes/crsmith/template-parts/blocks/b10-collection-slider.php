<?php if ( have_rows( 'tabs' ) ) : ?>
    <div class="collection-slider tabbed-items">
        <div class="container mx-auto expand-container">
            <div class="buttons text-center mb-8">
                <?php while ( have_rows( 'tabs' ) ) : the_row(); ?>
                    <?php
                    
                    $tab_heading = get_sub_field( 'tab_heading' );
                    
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
                
                $section_heading    = get_sub_field( 'tab_heading' );
                $heading            = get_sub_field( 'heading' );
                $images             = get_sub_field( 'images' );
                $content_editor     = get_sub_field( 'content_editor' );

                ?>
                <div class="tab-content">
                    <div class="flex flex-wrap items-center -mx-4">
                        <div class="px-4 w-4/12">
                            <div class="max-w-sm xl:pr-8">
                                <?php if ( $heading ) : ?>
                                    <h2><?php echo $heading; ?></h2>
                                <?php endif; ?>
                                <?php if ( $content_editor ) : ?>
                                    <div>
                                        <?php echo $content_editor; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="px-4 w-8/12">
                            <?php if ( $images ) : ?>
                                <div class="xl:pl-12 relative">
                                    <?php get_template_part( 'template-parts/components/carousel-control' ); ?>
                                    <div class="-mx-7">
                                        <div class="collection-slider__images swiper-container">
                                            <div class="swiper-wrapper">
                                                <?php foreach ( $images as $image_id ) : ?>
                                                    <?php
                                                    
                                                    $image_title = get_the_title( $image_id );
                                                        
                                                    ?>
                                                    <div class="swiper-slide text-center relative">
                                                        <div class="img-center mb-7 collection-slider__image">
                                                            <?php echo wp_get_attachment_image( $image_id, 'medium' ); ?>
                                                        </div>
                                                        <div class="w-60 hidden slide-active-content relative left-1/2 transform -translate-x-1/2">
                                                            <?php get_template_part( 'template-parts/components/label', '', ['label' => $section_heading] ); ?>
                                                            <?php if ( $image_title ) : ?>
                                                                <h5 class="font-semibold"><?php echo $image_title; ?></h5>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>