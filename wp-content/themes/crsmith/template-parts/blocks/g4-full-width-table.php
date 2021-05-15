<?php

/**
 * G4 - Full width table
 */

$table = get_field( 'table' );

?>

<?php if ( $table ) : ?>
    <div class="full-width-table">
        <?php
            
        if ( $table_id = crs_get_tablepress_table_id($table->ID) ) {
            echo do_shortcode(sprintf("[table id=%s /]", $table_id));
        }
            
        ?>
    </div>
<?php endif; ?>

