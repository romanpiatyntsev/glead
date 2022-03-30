<?php

/**
 * The template for displaying front page
 *
 * @package start
 */

get_header(); ?>

<?php 
if ( have_posts() ) :
    while ( have_posts()) : the_post();
        if ( have_rows( 'sections' ) ) :
            while ( have_rows( 'sections' ) ) : the_row();
                get_template_part( 'template-parts/sections/section', get_row_layout() );
            endwhile;
        endif;
    endwhile;
endif; ?>

<?php get_footer();
