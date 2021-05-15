<?php 

$_post = !empty( $args['post'] ) ? $args['post'] : '';

?>

<?php if ( $_post ) : ?>
<div class="card-carousel remove-underlines">
    <a href="<?php echo !empty( $_post['link']['url'] ) ? $_post['link']['url'] : ''; ?>" target="<?php echo !empty( $_post['link']['target'] ) ? $_post['link']['target'] : ''; ?>" class="block">

        <div>
            <?php echo !empty( $_post['image'] ) ? $_post['image'] : ''; ?>
        </div>
        <div class="shadow-even bg-white card-carousel__content transition-all duration-500 border-b-4 border-transparent">
            <div class="text-center pt-12 pb-16 px-4 max-w-xl mx-auto card-carousel__text transition-all duration-500">
                <h3 class="mb-4"><?php echo !empty( $_post['heading'] ) ? $_post['heading'] : ''; ?></h3>
                <?php if ( !empty( $_post['excerpt'] ) ) : ?>
                    <div class="pt-1 text-gray-800">
                        <?php echo $_post['excerpt']; ?>
                    </div>
                <?php endif; ?>
                <?php if ( !empty( $_post['link']['title'] ) ) : ?>
                    <div class="absolute bottom-16 left-0 right-0 card-carousel__btn opacity-0 invisible pointer-events-none transition-all duration-500">
                        <span class="btn"><?php echo $_post['link']['title']; ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </a>
</div>
<?php endif; ?>