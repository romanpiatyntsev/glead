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
	$tel = $location['tel'];
	$tel_link = str_replace(' ', '', $tel);
	return sprintf( '<a href="tel:%s">%s</a>', $tel_link, $tel );
}

add_shortcode( 'phone', 'arvo_phone_shortcode' );