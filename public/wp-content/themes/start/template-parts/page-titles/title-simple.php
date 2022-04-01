<?php
/**
 * Header Simple Template
 */
?>

<div class="title-simple">
    <div class="container" style="text-align:center;">
        <?php
        the_title( '<h1 class="page-title">', '</h1>' );

        if ( $subtitle = get_field( 'subtitle' ) ) :
        ?>
        <p class="page-subtitle"><?php echo $subtitle; ?></p>
        <?php
        endif;
        ?>

</div>
</div> 