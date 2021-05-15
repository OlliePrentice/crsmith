<?php 

$list = !empty( $args['list'] ) ? $args['list'] : '';

?>

<?php if ( $list ) : ?>
    <ul class="key-points">
        <?php foreach ( $list as $item ) : ?>
            <?php
                
            $heading    = !empty( $item['heading'] ) ? $item['heading'] : '';
            $copy       = !empty( $item['content_editor'] ) ? $item['content_editor'] : '';
                
            ?>

            <li class="flex -mx-3 key-point">
                <div class="px-3">
                    <span class="flex items-center justify-center w-10 h-10 rounded-full bg-tertiary">
                        <?php echo get_inline_svg( 'check.svg' ); ?>
                    </span>
                </div>
                <div class="flex-1 px-3 pt-1">                
                    <?php if ( $heading ) : ?>
                        <h5 class="mb-2 font-bold"><?php echo $heading; ?></h5>
                    <?php endif; ?>
                    <?php if ( $copy ) : ?>
                        <div class="text-sm remove-last-margin">
                            <?php echo $copy; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>