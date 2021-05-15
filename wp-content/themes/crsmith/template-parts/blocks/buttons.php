<?php

/**
 * Buttons Module
 */

$buttons = get_field('buttons');

get_template_part('template-parts/components/buttons', $buttons);

?>