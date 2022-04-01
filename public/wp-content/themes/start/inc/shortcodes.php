<?php

function ua_flag( $atts ){
	return '<span class="flag flag-ua"></span>';
}

add_shortcode( 'ua', 'ua_flag' );

function arvo_email_shortcode( $atts ){
	$atts = shortcode_atts( array(
		'location' => '',
	), $atts );
	
	$location = get_field( $atts['location'], 'option' );
	$email  = sanitize_email( $location['email'] );
	return sprintf( '<a href="mailto:%s">%s</a>', antispambot( $email, 1 ), antispambot( $email) );
}

add_shortcode( 'email', 'arvo_email_shortcode' );

function arvo_phone_shortcode( $atts ){
	$atts = shortcode_atts( array(
		'location' => '',
	), $atts );
	$location = get_field( $atts['location'], 'option' );
	return sprintf( '<a href="tel:%1$s">%1$s</a>', $location['tel'] );
}

add_shortcode( 'phone', 'arvo_phone_shortcode' );