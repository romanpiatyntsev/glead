<?php
/**
* Template Name: Sections
*/

get_header();

if ( have_posts() ) :
    while ( have_posts()) : the_post();
        if ( have_rows( 'sections' ) ) :
            while ( have_rows( 'sections' ) ) : the_row();
                get_template_part( 'template-parts/sections/section', get_row_layout() );
            endwhile;
        endif;
    endwhile;
endif; 

get_footer();