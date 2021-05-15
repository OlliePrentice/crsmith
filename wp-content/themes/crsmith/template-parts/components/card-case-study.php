<?php

$_post = !empty( $args['post'] ) ? $args['post'] : '';




?>

<?php if ( $_post ) : ?>
    <article class="card-case-study remove-link-style shadow-even bg-white h-full">
        <a href="<?php echo !empty( $_post['link']['url'] ) ? $_post['link']['url'] : ''; ?>" target="<?php echo !empty( $_post['link']['target'] ) ? $_post['link']['target'] : ''; ?>" class="block h-full">
            <?php if ( !empty( $_post['image'] ) ) : ?>
                <div class="img-full">
                    <?php echo $_post['image']; ?>
                </div>
            <?php endif; ?>
            <div class="p-14 bg-white card-case-study__content">
                <?php if ( !empty( $_post['label'] ) ) : ?>
                    <span class="text-base font-bold uppercase !text-secondary block mb-5 tracking-wide"><?php echo $_post['label']; ?></span>
                <?php endif; ?>
                <?php if ( !empty( $_post['heading'] ) ) : ?>
                    <h3 class="mb-5"><?php echo $_post['heading']; ?></h3>
                <?php endif; ?>
                <?php if ( !empty ( $_post['excerpt'] ) ) : ?>
                    <div class="text-gray-800 card-case-study__excerpt">
                        <?php echo apply_filters('the_content', $_post['excerpt']); ?>
                    </div>
                <?php endif; ?>
            </div>
        </a>
    </article>
<?php endif; ?>