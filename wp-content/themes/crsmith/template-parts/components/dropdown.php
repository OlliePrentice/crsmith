<?php

/**
 * Component: Dropdown
 */

$_post = !empty( $args['post'] ) ? $args['post'] : '';

?>

<?php if ( $_post ) : ?>
    <div class="dropdown">
        <div class="dropdown__trigger relative cursor-pointer">
            <div class="border-b border-gray-300 py-4">
                <div class="flex items-center -mx-4">
                    <div class="px-4 flex-1">
                        <h6 class="font-semibold mb-0"><?php echo $_post['heading']; ?></h6>
                    </div>
                    <div class="px-4">
                        <?php get_template_part( 'template-parts/components/expander-accordion' ); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="dropdown__content" style="display: none;">
            <div class="dropdown__copy py-6">
                <div>
                    <?php echo $_post['excerpt']; ?>
                </div>
                <?php if ( !empty( $_post['buttons'] ) ) : ?>
                    <div>
                        <?php get_template_part( 'template-parts/components/buttons', '', $_post['buttons'] ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
