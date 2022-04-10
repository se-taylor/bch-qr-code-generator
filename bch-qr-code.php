<?php

/**
 * Plugin Name: Bitcoin Cash QR Code
 * Description: ‌Generate QR image to receive Bitcoin Cash donations.
 * Version:     1.0.0
 * Author:      S.E. Taylor
 * Author URI:      https://github.com/se-taylor/bch-qr-code-generator
 * License:     GPLv3
 */

namespace BCH_QR_CODE;

use BCH_QR_CODE\Admin\Init as Admin;
use BCH_QR_CODE\Includes\Assets;
use BCH_QR_CODE\Includes\Elementor;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once 'vendor/autoload.php';

register_activation_hook( __FILE__, '\BCH_QR_CODE\activation_hook_callback' );

function activation_hook_callback() {
	\BCH_QR_CODE\Includes\Init::activate();
}

register_deactivation_hook( __FILE__, '\BCH_QR_CODE\deactivation_hook_callback' );

function deactivation_hook_callback() {
	\BCH_QR_CODE\Includes\Init::deactivate();
}


Admin::instance();
Assets::instance();
Elementor::instance();
