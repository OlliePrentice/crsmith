<?php

$content_editor = get_field( 'content_editor' );
$name           = get_field( 'name' );

?>

<div class="py-4">
    <div class="pullquote max-w-6xl p-14 mx-auto bg-white shadow-even-lg border-b-4 border-secondary relative z-10">
        <div class="max-w-5xl text-center xl:px-20 mx-auto">
            <?php if ( $content_editor ) : ?>
                <div class="text-4xl text-primary">
                    <?php echo $content_editor; ?>
                </div>
            <?php endif; ?>
            <?php if ( $name ) : ?>
                <h6 class="font-light pt-2 mb-0"><?php echo $name; ?></h6>
            <?php endif; ?>
        </div>
    </div>
</div>