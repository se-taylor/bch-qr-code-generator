<?php

function bchqrc_shortcode(){
	return bchqrc_get_QR_code();
}

add_shortcode('bch_qr_code', 'bchqrc_shortcode');
