<?php

function bchqrc_get_option( string $option, $default = null ) {
	$options = get_option( 'bchqrc_config_bch', array() );
	return $options[ $option ] ?? $default;
}

function bchqrc_update_option( $option, $new_value ) {
	$config            = get_option( 'bchqrc_config_bch', array() );
	$config[ $option ] = $new_value;
	return update_option( 'bchqrc_config_bch', $config );
}
