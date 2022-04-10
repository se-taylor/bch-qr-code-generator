<?php

namespace BCH_QR_CODE\Admin;

use BCH_QR_CODE\Includes\Functions;

class Init {

	private static $instance = null;

	private function __construct() {
		$this->init();
	}

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new Init();
		}

		return self::$instance;
	}

	public function init() {
		add_action( 'admin_enqueue_scripts', array( $this, 'assets' ) );
		add_action( 'admin_menu', array( $this, 'add_menu_page' ) );
	}

	public function assets( $hook ) {
		if ( 'settings_page_bch-qr-code' === $hook ) {
			wp_enqueue_style( 'bchqrc-admin' );
			wp_enqueue_script( 'bchqrc-admin' );
		}
	}

	public function add_menu_page() {
		add_submenu_page(
			'options-general.php',
			__( 'Bitcoin Cash QR Code', 'bch-qr-code' ),
			__( 'Bitcoin Cash QR Code', 'bch-qr-code' ),
			'manage_options',
			'bch-qr-code',
			array( $this, 'renbder_settings_page' ),
		);
	}

	public function renbder_settings_page() {
		?>
		<div class="bchqrc-admin-wrapper">
			<div class="bchqrc-admin-header">
				<span class="bchqrc-logo">
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
				<style type="text/css">
					.st0{fill:#0AC18E;}
					.st1{fill:#FFFFFF;}
				</style>
				<circle class="st0" cx="394" cy="394" r="394"/>
				<path id="symbol_1_" class="st1" d="M516.9,261.7c-19.8-44.9-65.3-54.5-121-45.2L378,147.1L335.8,158l17.6,69.2
					c-11.1,2.8-22.5,5.2-33.8,8.4L302,166.8l-42.2,10.9l17.9,69.4c-9.1,2.6-85.2,22.1-85.2,22.1l11.6,45.2c0,0,31-8.7,30.7-8
					c17.2-4.5,25.3,4.1,29.1,12.2l49.2,190.2c0.6,5.5-0.4,14.9-12.2,18.1c0.7,0.4-30.7,7.9-30.7,7.9l4.6,52.7c0,0,75.4-19.3,85.3-21.8
					l18.1,70.2l42.2-10.9l-18.1-70.7c11.6-2.7,22.9-5.5,33.9-8.4l18,70.3l42.2-10.9l-18.1-70.1c65-15.8,110.9-56.8,101.5-119.5
					c-6-37.8-47.3-68.8-81.6-72.3C519.3,324.7,530,297.4,516.9,261.7L516.9,261.7z M496.6,427.2c8.4,62.1-77.9,69.7-106.4,77.2
					l-24.8-92.9C394,404,482.4,372.5,496.6,427.2z M444.6,300.7c8.9,55.2-64.9,61.6-88.7,67.7l-22.6-84.3
					C357.2,278.2,426.5,249.6,444.6,300.7z"/>
				</svg>
				</span>
				<span class="bchqrc-admin-title">
					<h1><?php esc_html_e( 'Bitcoin Cash QR Code', 'bch-qr-code' ); ?></h1>
				</span>
				<p><?php esc_html_e( 'Un-Official Bitcoin Cash QR Code plugin for WordPress.', 'bch-qr-code' ); ?></p>
				<p><?php esc_html_e( 'Use the following shortcode to display donation QR code. If you are using Elementor, use the Elementor widget.', 'bch-qr-code' ); ?><code>[bch_qr_code]</code></p>
				<br>
			</div>
			<div class="bchqrc-admin-main">
				<section class="bchqrc-settings">
					<label for="bch_qr_code_address">
						<?php _e( 'Bitcoin Cash QR Code address:', 'bch-qr-code' ); ?>
					</label>
					<br>
					<input type="text" id="bch-qr-code-address" name="bch_qr_code_address" placeholder="q or p" size="42" pattern="[a-z0-9]{42}" value="<?php echo esc_attr( bchqrc_get_option( '_bch_qr_code_address' ) ); ?>">
					<?php wp_nonce_field( 'bchqrc_save_settings' ); ?>
					<input type="submit" id="save_bch_qr_code_address" name="save_bch_qr_code_address" value="<?php esc_attr_e( 'Save', 'bch-qr-code' ); ?>">
					<?php if ( bchqrc_get_option( '_bch_qr_code_address' ) ) : ?>
					<?php endif; ?>
					<div id="bchqrc-message-area"></div>
				</section>
			</div>
		</div>
		<?php
	}

}
