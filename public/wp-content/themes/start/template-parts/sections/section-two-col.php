<?php
/**
 * Section Two Columns
 */
$row_class = get_sub_field( 'reverse' ) ? 'row flex-row-reverse' : 'row';
?>
<section class="two-col">
    <div class="container">
        <div class="<?php echo $row_class; ?>">
            <div class="col-12 col-md-6 col-lg-7 left-column">
                <?php echo do_shortcode( get_sub_field( 'left-column' ) ); ?>
            </div>
            <div class="col-12 col-md-6 col-lg-5 d-flex justify-content-start justify-content-md-end right-column">
                <?php the_sub_field( 'right-column' ); ?>
            </div>
        </div>
    </div>
</section>