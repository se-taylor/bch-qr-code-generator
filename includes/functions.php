<?php

function bchqrc_get_QR_code() {
	$qr = BCH_QR_CODE\QRCode::getMinimumQRCode(
		bchqrc_get_option('_bch_qr_code_address'),
		QR_ERROR_CORRECT_LEVEL_L
	);
	$im = $qr->createImage(6, 8);
	ob_start();
	imagepng($im);
	imagepng($im);
	$image_data = ob_get_contents();
	ob_end_clean();
	imagedestroy($im);

	return '<figure class="bchqrc-qr-code"><img src="data:image/png;base64,' . base64_encode($image_data) . '"></figure>';
}
