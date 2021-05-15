<?php 

$options = !empty( $args['options'] ) ? $args['options'] : '';

?>

<?php if ( $options ) : ?>
    <div class="flex items-center">
        <label for="linkDropdown<?php echo $id; ?>" class="text-primary mr-8"><?php echo __('Skip to:'); ?></label>
        <select id="linkDropdown<?php echo $id; ?>" class="drop-select scroll-links flex-1">
            <?php foreach ( $options as $option ) : ?>
                <?php
                
                $option_id      = !empty( $option['id'] ) ? $option['id'] : '';
                $option_label   = !empty( $option['label'] ) ? $option['label'] : '';
                
                ?>
                <option value="<?php echo $option_id; ?>"><?php echo $option_label; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
<?php endif; ?>