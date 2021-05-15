<?php

$phone_number   = get_field( 'phone_number', 'options' );
$contact_link   = get_field( 'contact_link', 'options' );
$buttons        = get_field( 'header_buttons', 'options' );

if ( ! empty( $buttons['buttons'] ) ) {
    for ( $i = 0; $i < count( $buttons['buttons'] ); $i++ ) {;
        $buttons['buttons'][$i]['classes'] = 'btn--small';
    }
}

$item_classes           = ['inline-block', 'align-middle', 'px-2'];
$item_level_2_classes   = ['inline-block', 'align-middle', 'mb-0', 'text-xs', 'leading-none', 'px-2'];

?>
<?php if ( $phone_number ) : ?>
    <div class="<?php echo implode( ' ', $item_level_2_classes ); ?>">
        <a href="<?php echo $phone_number['url']; ?>" <?php echo $phone_number['target'] ? 'target="_blank"' : ''; ?> class="text-lg">
            <span class="mr-2 text-xs align-middle"><?php _e('Call on'); ?></span><span class="font-semibold align-middle text-lg relative" style="top: -1px;"><?php echo $phone_number['title']; ?></span>
        </a>
    </div>
<?php endif; ?>
<div class="<?php echo implode( ' ', $item_classes ); ?>">
    <div class="relative">
        <div class="-mx-2">
            <?php if ( $contact_link ) : ?>
                <div class="<?php echo implode( ' ', $item_level_2_classes ); ?>">
                    <a href="<?php echo $contact_link['url']; ?>" <?php echo $contact_link['target'] ? 'target="_blank"' : ''; ?> class="font-bold px-2">
                        <?php echo $contact_link['title']; ?>
                    </a>
                </div>
            <?php endif; ?>
            <?php if ( !empty( $buttons['buttons'] ) ) : ?>
                <div class="<?php echo implode( ' ', $item_classes ); ?>">
                    <?php 

                    $buttons['buttons']['wrapper'] = 'buttons--close buttons--no-margin';
                    get_template_part( 'template-parts/components/buttons', '', $buttons['buttons'] ); 
                        
                    ?>
                </div>
            <?php endif; ?>
            <div class="<?php echo implode( ' ', $item_classes ); ?>">
                <a href="#" class="search-trigger">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </a>
            </div>
            <div class="absolute w-full top-1/2 left-0 transform -translate-y-1/2 z-50 search-form-wrap bg-white">
                <?php get_template_part( 'template-parts/components/search-form' ); ?>
            </div>
        </div>
    </div>
</div>