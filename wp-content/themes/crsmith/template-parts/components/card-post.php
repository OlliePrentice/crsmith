<?php 

$_post      = !empty( $args['post'] ) ? $args['post'] : '';

$label      = !empty( $_post['label'] ) ? $_post['label'] : '';
$heading    = !empty( $_post['heading'] ) ? $_post['heading'] : '';
$excerpt    = !empty( $_post['excerpt'] ) ? $_post['excerpt'] : '';
$image      = !empty( $_post['image'] ) ? $_post['image'] : '';
$link       = !empty( $_post['link'] ) ? $_post['link'] : '';

?>

<?php if ( $_post ) : ?>
    <div class="card-post remove-underlines">
        <a href="<?php echo !empty( $link['url'] ) ? $link['url'] : ''; ?>" target="<?php echo !empty( $link['target'] ) ? $link['target'] : ''; ?>" class="block">
            <?php if ( $image ) :  ?>
                <div>
                    <?php echo $image; ?>
                </div>
            <?php endif; ?>
            <div class="pt-5">
                <?php if ( $label ) : ?>
                    <div class="mb-2">
                        <strong class="text-sm text-secondary tracking-wide"><?php echo $label; ?></strong>
                    </div>
                <?php endif; ?>
                <?php if ( $heading ) : ?>
                    <h4 class="mb-3"><?php echo $heading; ?></h4>
                <?php endif; ?>
                <?php if ( $excerpt ) : ?>
                    <div class="text-gray-600">
                        <?php echo $excerpt; ?>
                    </div>
                <?php endif; ?>
            </div>
        </a>
    </div>
<?php endif; ?>