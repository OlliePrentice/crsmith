<?php if ($args) : ?>
    <div class="buttons py-3 <?php echo !empty( $args['wrapper'] ) ? $args['wrapper'] : ''; ?>">
        <?php foreach ($args as $button) : ?>
            <?php

            if (!empty($button['link'])) {

                $button['link']['label']            = !empty($button['label']) ? $button['label'] : '';
                $button['link']['style']            = !empty($button['style']) ? $button['style'] : '';
                $button['link']['classes']          = $button['link']['style'] . ' ';
                $button['link']['classes']          .= !empty($button['classes']) ? $button['classes'] : '';
                $button['link']['wrapper_classes']  = !empty($button['wrapper_classes']) ? $button['wrapper_classes'] : '';
                $button['link']['icon']             = !empty($button['icon']) ? $button['icon'] : '';
                $button['link']['attr']             = !empty($button['download']) ? 'download' : '';


                if($button['link']['style'] === 'link') {
                    get_template_part('template-parts/components/link', '', $button['link']);
                } else {
                    get_template_part('template-parts/components/button', '', $button['link']);
                }
            }

            ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
