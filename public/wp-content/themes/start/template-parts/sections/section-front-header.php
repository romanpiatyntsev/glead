<?php 
// Section Header Big
?>
<section class="front-header">
    <div class="custom-container">
            <div class="column text">
                    <?php the_sub_field('text'); ?>
            </div>
            <div class="column image">
            <?php 
                $image = get_sub_field('header-image');
                if( $image ) {
                    echo wp_get_attachment_image( $image, 'full' );
                }
            ?>
            </div>
        </div>
    </div>
</section>
