<?php

$offers = !empty( $args['offers'] ) ? $args['offers'] : '';

?>

<?php if ( $offers ) : ?>
    <div class="offers-expander theme-dark bg-primary absolute bottom-0 z-10 w-full">
        <div class="container mx-auto standard-container">
            <div class="offers-expander__items swiper-container !overflow-visible">
                <div class="swiper-wrapper">
                    <?php foreach ( $offers as $offer ) : ?>
                        <?php

                        $subtext    = get_field( 'offer_subtext', $offer->ID );
                        $end_date   = get_field( 'offer_end_date', $offer->ID );
                        $buttons    = get_field( 'offer_buttons', $offer->ID );
                        $terms      = get_field( 'offer_terms', $offer->ID );
                        $key_points = get_field( 'offer_key_points', $offer->ID );

                        $column_item_classes = 'px-4 py-1 border-r border-white last:border-transparent border-opacity-30';

                        if ( ! empty( $buttons['buttons'] ) ) {
                            for ( $i = 0; $i < count( $buttons['buttons'] ); $i++) {
                                $buttons['buttons'][$i]['wrapper_classes'] = 'w-full';
                                $buttons['buttons'][$i]['classes'] = 'w-full btn--tertiary';
                            }
                        }

                        ?>
                        <div class="swiper-slide">
                            <div class="offers-expander__top relative py-2  cursor-pointer">
                                <div class="offers-expander__top-columns flex items-center justify-center -mx-4 pr-14 text-base">
                                    <div class="<?php echo $column_item_classes; ?>">
                                        <span class="block uppercase font-bold offers-expander__title"><?php echo get_the_title( $offer->ID ); ?></span>
                                    </div>
                                    <?php if ( $subtext ) : ?>
                                        <div class="<?php echo $column_item_classes; ?>">
                                            <span class="block offers-expander__subtitle"><?php echo $subtext; ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ( $end_date ) : ?>
                                        <div class="<?php echo $column_item_classes; ?>">
                                            <span class="block offers-expander__expiry"><?php echo $end_date; ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="offers-expander__icon absolute top-1/2 transform -translate-y-1/2 text-zero cursor-pointer">
                                    <?php get_template_part( 'template-parts/components/expander' ); ?>
                                </div>
                            </div>
                            <div class="offers-expander__body py-14 hidden">
                                <div class="flex flex-wrap justify-between -mx-4">
                                    <div class="w-7/12 px-4">
                                        <?php get_template_part( 'template-parts/components/key-points', '', ['list' => $key_points] ); ?>
                                    </div>
                                    <?php if ( ! empty( $buttons['buttons'] ) ) : ?>
                                        <div class="w-4/12 px-4">
                                            <div class="2xl:pl-12 offers-expander__buttons">
                                                <?php get_template_part( 'template-parts/components/buttons', '', $buttons['buttons'] ); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php if ( $terms ) : ?>
                                    <div class="pt-6 opacity-50 text-xs remove-last-margin">
                                        <p><strong><?php _e('Terms and Conditions'); ?></strong></p>
                                        <?php echo $terms; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>