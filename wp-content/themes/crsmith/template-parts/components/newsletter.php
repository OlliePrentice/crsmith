<?php 

$heading        = get_field( 'newsletter_heading', 'options' );
$subheading     = get_field( 'newsletter_subheading', 'options' );
$form_id        = get_field( 'newsletter_form_id', 'options' );
$terms          = get_field( 'newsletter_terms', 'options' );

?>

<div class="newsletter py-10">
    <div class="flex flex-wrap items-center -mx-4 py-1">
        <div class="px-4 w-5/12">
            <?php if ( $heading ) : ?>
                <h3 class="mb-3"><?php echo $heading; ?></h3>
            <?php endif; ?>
            <?php if ( $subheading ) : ?>
                <h6 class="mb-0"><?php echo $subheading; ?></h6>
            <?php endif; ?>
        </div>
        <div class="px-4 w-7/12">
            <?php if ( $form_id ) : ?>
                <?php gravity_form( $form_id, false, false, false, null, true ); ?>
            <?php endif; ?>
            <?php if ( $terms ) : ?>
                <div class="text-sm remove-last-margin text-gray-400">
                    <?php echo $terms; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>