<?php

/**
 * Component: Social
 */

$social = get_field('social', 'options');

?>

<?php if ($social) : ?>
    <div class="social">
        <ul class="social__list text-zero text-center -mx-3">
            <?php foreach ($social as $item) : ?>
                <?php

                $icon = $item['icon'];
                $link = $item['link'];

                ?>

                <?php if ($icon && $link) : ?>
                    <li class="social__item inline-block mb-2 text-3xl px-3">
                        <a href="<?php echo $link['url']; ?>" class="text-center text-primary hover:text-secondary" <?php echo ($link['target']) ? 'target="_blank"' : ''; ?>><?php echo $icon; ?></a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
