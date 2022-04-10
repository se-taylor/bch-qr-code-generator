<?php

namespace BCH_QR_CODE\Includes;

class Bitcoin_Cash_QR_Code_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'bch-qr-code';
	}

	public function get_title() {
		return __( 'Bitcoin Cash QR Code', 'bch-qr-code' );
	}

	public function get_icon() {
		return 'eicon-play';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function _register_controls() {}

	protected function render() {
		echo bchqrc_get_QR_code();
	}

}
