<?php

namespace BCH_QR_CODE;

define( 'BCHQRC_PATH', plugin_dir_path( __FILE__ ) );
define( 'BCHQRC_URL', plugin_dir_url( __FILE__ ) );

define( 'BCHQRC_VERSION', '1.0.0' );
define( 'BCHQRC_SLUG', 'bch_qr_code' ); // snake_case

define( 'BCHQRC_ADMIN_PATH', BCHQRC_PATH . 'admin/' );
define( 'BCHQRC_ADMIN_URL', BCHQRC_URL . 'admin/' );

define( 'BCHQRC_FRONT_ASSETS', BCHQRC_URL . 'front/assets/dist/' );
define( 'BCHQRC_IMG_ASSETS', BCHQRC_URL . 'front/assets/img/' );
define( 'BCHQRC_ADMIN_ASSETS', BCHQRC_ADMIN_URL . 'assets/dist/' );
