<?php

/**
 * Component: Button
 */

$button = $args;

?>

<div class="btn-wrap <?= (!empty($button['wrapper_classes'])) ? $button['wrapper_classes'] : ''; ?>">
    <?php if ( !empty( $button['label'] ) ) : ?>
        <span class="text-2xl text-primary font-semibold block mb-4 text-center"><?php echo $button['label']; ?></span>
    <?php endif; ?>
    <a href="<?= $button['url']; ?>" <?= (!empty($button['target'])) ? 'target="_blank"' : ''; ?>
       class="btn <?= (!empty($button['classes'])) ? $button['classes'] : ''; ?>" <?= (!empty($button['attr'])) ? $button['attr'] : ''; ?>><?= !empty($button['icon']) ? $button['icon'] : ''; ?><span><?= $button['title']; ?></span></a>
</div>
