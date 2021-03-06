<?php
/**
* Template Name: Contact
*/

get_header();
the_post();
get_template_part( 'template-parts/page-titles/title-simple');
?>

<div class="container">
    <div class="row">
        <div class="col">
            <?php
            the_content();
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-8 contact-form">
            <?php
            if ( $form_id = get_field('contact-form') ) {
                echo do_shortcode('[contact-form-7 id="' . $form_id . '" title="Contact Form"]');
            }
            ?>
        </div>
        <div class="col-12 col-md-4 contact-info">
            <?php
            the_field('contact-info');
            ?>
        </div>
    </div>
</div>
<div class="map">
    <?php echo do_shortcode( get_field( 'map' ) ); ?>
</div>

<?php
get_footer();