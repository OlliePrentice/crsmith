<?php

$title              = get_field( 'title' );
$content_editor     = get_field( 'content_editor' );

?>

<div class="four-numbers-icons max-w-6xl mx-auto">
    <div class="flex flex-wrap -mx-4 py-3 items-center">
        <div class="px-4 w-5/12">
            <div class="max-w-sm">
                <?php if ( $title ) : ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php if ( $content_editor ) : ?>
                    <div>
                        <?php echo $content_editor; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="px-4 w-7/12 2xl:pl-10">
            <?php if ( have_rows( 'items' ) ) : ?>
                <div class="-mx-3 flex flex-wrap">
                    <?php while ( have_rows( 'items' ) ) : the_row(); ?>
                        <?php
                        
                        $mode       = get_sub_field( 'mode' );
                        $number     = get_sub_field( 'number' );
                        $image      = get_sub_field( 'image' ); 
                        $title      = get_sub_field( 'title' );
                        $text       = get_sub_field( 'text' );
                        
                        ?>
                        <div class="px-3 w-1/2 mb-6">
                            <div class="shadow-even bg-white p-12 text-center h-full number-box flex items-center justify-center">
                                <div>
                                    <?php if ( $mode === 'number' && $number ) : ?>
                                        <h4 class="text-secondary font-bold text-5xl md:text-6xl">
                                            <span><?php echo $number; ?></span>
                                        </h4>
                                    <?php elseif ( $image ) : ?>
                                        <div>
                                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                        </div>
                                    <?php endif; ?>
                                    <?php if ( $title ) : ?>
                                        <h5 class="text-primary font-semibold"><?php echo $title; ?></h5>
                                    <?php endif; ?>
                                    <?php if ( $text ) : ?>
                                        <span class="block"><?php echo $text; ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>