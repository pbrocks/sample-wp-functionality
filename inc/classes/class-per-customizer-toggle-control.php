<?php
/**
 * Class that adds an IOS toggle option vesus a checkbox.
 *
 * @package wp_customize
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * Class that adds an IOS toggle option vesus a checkbox.
 */
class Per_Customizer_Toggle_Control extends WP_Customize_Control {
	/**
	 * Checkbox type.
	 *
	 * @var string
	 */
	public $type = 'ios';

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since 3.4.0
	 */
	public function enqueue() {
		wp_enqueue_script( 'customizer-toggle-control', $this->abs_path_to_url( dirname( __FILE__ ) . '/controls/js/customizer-toggle-control.js' ), array( 'jquery' ), wp_rand(), true );
		wp_enqueue_style( 'pure-css-toggle-buttons', $this->abs_path_to_url( dirname( __FILE__ ) . '/controls/css/pure-css-toggle.css' ), array(), wp_rand() );

		$css = '
			.disabled-control-title {
				color: #a0a5aa;
			}
			input[type=checkbox].tgl-light:checked + .tgl-btn {
				background: #0085ba;
			}
			input[type=checkbox].tgl-light + .tgl-btn {
			  background: #a0a5aa;
			}
			input[type=checkbox].tgl-light + .tgl-btn:after {
			  background: #f7f7f7;
			}

			input[type=checkbox].tgl-ios:checked + .tgl-btn {
			  background: #0085ba;
			}

			input[type=checkbox].tgl-flat:checked + .tgl-btn {
			  border: 4px solid #0085ba;
			}
			input[type=checkbox].tgl-flat:checked + .tgl-btn:after {
			  background: #0085ba;
			}

		';
		wp_add_inline_style( 'pure-css-toggle-buttons', $css );
	}

	/**
	 * Render the control's content.
	 *
	 * @author soderlind
	 * @version 1.2.0
	 */
	public function render_content() {
		?>
		<label class="customize-toogle-label">
			<div style="display:flex;flex-direction: row;justify-content: flex-start;">
				<span class="customize-control-title" style="flex: 2 0 0; vertical-align: middle;"><?php echo esc_html( $this->label ); ?></span>
				<input id="cb<?php echo esc_html( $this->instance_number ); ?>" type="checkbox" class="tgl tgl-<?php echo esc_html( $this->type ); ?>" value="<?php echo esc_attr( $this->value() ); ?>"
				<?php
				$this->link();
				checked( $this->value() );
				?>
				/>
				<label for="cb<?php echo esc_html( $this->instance_number ); ?>" class="tgl-btn"></label>
			</div>
			<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>
		</label>
		<?php
	}

	/**
	 * Plugin / theme agnostic path to URL
	 *
	 * @see https://wordpress.stackexchange.com/a/264870/14546
	 * @param string $path  file path.
	 * @return string       URL
	 */
	private function abs_path_to_url( $path = '' ) {
		$url = str_replace(
			wp_normalize_path( untrailingslashit( ABSPATH ) ),
			site_url(),
			wp_normalize_path( $path )
		);
		return esc_url_raw( $url );
	}
}
