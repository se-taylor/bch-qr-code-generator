<?php

add_action( 'wp_ajax_bchqrc_validate_address', 'bchqrc_validate_address' );

function bchqrc_validate_address() {

	check_ajax_referer( 'bchqrc_save_settings', 'nonce' );

	$address = sanitize_text_field( $_POST['address'] );


	if ( 42 !== strlen( $address ) ) {
		wp_send_json_error(__('Bitcoin Cash address is not valid. It should have exactly 42 characters.', 'bch-qr-code'));
	}


	if ( 0 !== strpos( $address, 'q' ) && 0 !== strpos( $address, 'p' ) ) {
		wp_send_json_error(__('Bitcoin Cash address is not valid. It should start with a <code>q or p</code>.', 'bch-qr-code'));
	}

	bchqrc_update_option( '_bch_qr_code_address', $address );

	wp_send_json_success(__('Saved!', 'bch-qr-code'));
}
