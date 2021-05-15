<?php 

$images = get_field( 'images' );

?>

<?php if ( $images ) : ?>
    <div class="image-carousel overflow-hidden">
        <div class="container mx-auto expand-container">
            <?php get_template_part( 'template-parts/components/carousel-control' ); ?>

            <div class="image-carousel__slides swiper-container !overflow-visible">
                <div class="swiper-wrapper">
                    <?php foreach ( $images as $image_id ) : ?>
                        <?php 
                            
                        $image_full     = wp_get_attachment_image_url( $image_id, 'full' );
                        $image          = wp_get_attachment_image( $image_id, 'wide_image' );

                        $caption        = wp_get_attachment_caption( $image_id );
                        $image_title    = get_the_title( $image_id );
                            
                        ?>

                        <?php if ( $image ) : ?>
                            <div class="swiper-slide remove-link-style">
                                <a href="<?php echo $image_full; ?>" data-fancybox="<?php echo $id . 'gallery'; ?>" class="block relative">
                                    <div class="absolute top-8 right-8">
                                        <?php get_template_part( 'template-parts/components/expand' ); ?>
                                    </div>
                                    <?php echo $image; ?>

                                    <?php if ( $image_title && $caption ) : ?>
                                        <div class="bg-white remove-last-margin p-8 absolute bottom-0 left-0 w-full">
                                            <h5 class="!text-primary font-semibold mb-1"><?php echo $image_title; ?></h5>
                                            <p class="!text-primary">
                                                <?php echo $caption; ?>
                                            </p>
                                        </div>
                                    <?php endif; ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>