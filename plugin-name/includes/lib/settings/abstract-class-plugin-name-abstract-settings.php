<?php

/**
 * This file contains the class for managing any plugin's settings.
 *
 * @since      0.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/lib/settings
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * This class processes an array of settings and makes them available to WordPress.
 *
 * @since      0.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/lib/settings
 * @author     Your Name <your.name@example.com>
 */
abstract class Plugin_Name_Abstract_Settings {

	/**
	 * The name that identifies Plugin Name's Settings
	 *
	 * @since    0.0.0
	 * @access   private
	 * @var      string
	 */
	private $name;

	/**
	 * An array of settings that have been requested and where not found in the associated get_option entry.
	 *
	 * @since    0.0.0
	 * @access   private
	 * @var      array
	 */
	private $default_values;

	/**
	 * An array with the tabs
	 *
	 * Each item in this array looks like this:
	 *
	 * `
	 * array (
	 *    'name'   => a String that identifies the setting.
	 *    'label'  => the UI label of the tab.
	 *    'fields' => an array with all the fields contained in the tab.
	 * )
	 * `
	 *
	 * @since    0.0.0
	 * @access   private
	 * @var      array
	 */
	private $tabs;

	/**
	 * The name of the tab we're about to print.
	 *
	 * This is an aux var for enclosing all fields within a tab.
	 *
	 * @since    0.0.0
	 * @access   private
	 * @var      string
	 */
	private $current_tab_name = false;

	/**
	 * The name of the tab that's currently visible.
	 *
	 * This variable depends on the value of `$_GET['tab']`.
	 *
	 * @since    0.0.0
	 * @access   private
	 * @var      string
	 */
	private $opened_tab_name = false;

	/**
	 * Initialize the class, set its properties, and add the proper hooks.
	 *
	 * @since    0.0.0
	 * @access   protected
	 */
	protected function __construct( $name, $tabs ) {

		$this->default_values = array();
		$this->name = $name;
		$this->tabs = $tabs;

		foreach ( $this->tabs as $key => $tab ) {

			/**
			 * Filters the sections and fields of the given tab.
			 *
			 * @since    0.0.0
			 *
			 * @param    array    $fields    The fields (and sections) of the given tab in the settings screen.
			 */
			$this->tabs[$key]['fields'] = apply_filters( 'plugin_name_' . $tab['name']. '_settings',
				$tab['fields'] );

		}

		// Let's see which tab has to be enabled
		$this->opened_tab_name = $this->tabs[0]['name'];
		if ( isset( $_GET['tab'] ) ) {
			foreach ( $this->tabs as $tab ) {
				if ( $_GET['tab'] === $tab['name'] ) {
					$this->opened_tab_name = $tab['name'];
				}
			}
		}
	}

	/**
	 * Cloning instances of this class is forbidden.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function __clone() {

		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?' ), '0.0.0' );

	}

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function __wakeup() {

		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?' ), '0.0.0' );

	}

	/**
	 * Register the main hooks related to the settings page.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function define_admin_hooks() {

		add_action( 'admin_init', array( $this, 'register' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

	}

	/**
	 * Returns the value of the given setting.
	 *
	 * @param    string   $name    The name of the parameter whose value we want to obtain.
	 * @param    object   $value   Optional. Default value if the setting is not found and
	 *                             the setting didn't define a default value already.
	 *                             Default: `false`.
	 *
	 * @return   object   The concrete value of the specified parameter.
	 *                    If the setting has never been saved and it registered no
	 *                    default value (during the construction of `Plugin_Name_Settings`),
	 *                    then the parameter `$value` will be returned instead.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function get( $name, $value = false ) {

		$settings = get_option( $this->get_name(), array() );
		if ( isset( $settings[$name] ) ) {
			return $settings[$name];
		}

		$this->maybe_set_default_value( $name );
		if ( isset( $this->default_values[$name] ) ) {
			return $this->default_values[$name];
		} else {
			return $value;
		}

	}

	/**
	 * Looks for the default value of $name (if any) and saves it in the default values array.
	 *
	 * @param    string   $value   The name of the field whose default value we want to obtain.
	 *
	 * @since    0.0.0
	 * @access   private
	 */
	private function maybe_set_default_value( $name ) {

		$field = NULL;
		foreach ( $this->tabs as $tab ) {
			foreach ( $tab['fields'] as $f ) {
				switch ( $f['type'] ) {
					case 'section':
						continue;
					case 'custom':
						if ( $this->get_name() === $name ) {
							$field = $f;
						}
						break;
					case 'checkboxes':
						foreach ( $f['options'] as $option ) {
							if ( $option['name'] === $name ) {
								$field = $f;
							}
						}
						break;
					default:
						if ( $f['name'] === $name ) {
							$field = $f;
						}
				}
			}
		}

		if ( $field && isset( $field['default'] ) ) {
			$this->default_values[$name] = $f['default'];
		}

	}

	/**
	 * Registers all settings in WordPress using the Settings API.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function register() {

		require_once( PLUGIN_NAME_INCLUDES_DIR . '/lib/settings/class-plugin-name-settings-autoloader.php' );

		foreach ( $this->tabs as $tab ) {
			$this->register_tab( $tab );
		}

	}

	/**
	 * Enqueues all required scripts.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function enqueue_scripts() {

		wp_enqueue_script(
			'settings-js',
			PLUGIN_NAME_INCLUDES_URL . '/lib/settings/assets/js/settings.js',
			array(),
			Plugin_Name()->get_version(),
			true );

	}

	/**
	 * Registers the given tab in the Settings page.
	 *
	 * @param    array    $tabs   A list with all fields.
	 *
	 * @since    0.0.0
	 * @access   private
	 */
	private function register_tab( $tab ) {

		// Create a default section (which will also be used for enclosing all
		// fields within the current tab)
		$section = 'plugin-name-' . $tab['name'] . '-opening-section';
		add_settings_section(
				$section,
				'',
				array( $this, 'open_field_section' ),
				$this->get_settings_page_name()
			);

		foreach ( $tab['fields'] as $field ) {

			$defaults = array(
				'desc' => '',
				'more' => ''
			);
			$field = wp_parse_args( $field, $defaults );

			switch ( $field['type'] ) {

				case 'section':
					$section = $field['name'];
					add_settings_section(
						$field['name'],
						$field['label'],
						'',
						$this->get_settings_page_name()
					);
					break;

				case 'textarea':
					$field = wp_parse_args( $field, array( 'placeholder' => '' ) );

					$setting = new Plugin_Name_Text_Area_Setting(
						$field['name'],
						$field['desc'],
						$field['more'],
						$field['placeholder']
					);

					$value = $this->get( $field['name'] );
					$setting->set_value( $value );

					$setting->register(
						$field['label'],
						$this->get_settings_page_name(),
						$section,
						$this->get_option_group(),
						$this->get_name()
					);
					break;

				case 'email':
				case 'number':
				case 'password':
				case 'text':
					$field = wp_parse_args( $field, array( 'placeholder' => '' ) );

					$setting = new Plugin_Name_Input_Setting(
						$field['name'],
						$field['desc'],
						$field['more'],
						$field['type'],
						$field['placeholder']
					);

					$value = $this->get( $field['name'] );
					$setting->set_value( $value );

					$setting->register(
						$field['label'],
						$this->get_settings_page_name(),
						$section,
						$this->get_option_group(),
						$this->get_name()
					);
					break;

				case 'checkbox':
					$setting = new Plugin_Name_Checkbox_Setting(
						$field['name'],
						$field['desc'],
						$field['more']
					);

					$value = $this->get( $field['name'] );
					$setting->set_value( $value );

					$setting->register(
						$field['label'],
						$this->get_settings_page_name(),
						$section,
						$this->get_option_group(),
						$this->get_name()
					);
					break;

				case 'checkboxes':
					$setting = new Plugin_Name_Checkbox_Set_Setting( $field['options'] );

					foreach ( $field['options'] as $cb ) {
						$tuple = array(
								'name'  => $cb['name'],
								'value' => $value
							);
						$setting->set_value( $tuple );
					}

					$setting->register(
						$field['label'],
						$this->get_settings_page_name(),
						$section,
						$this->get_option_group(),
						$this->get_name()
					);
					break;

				case 'range':
					$setting = new Plugin_Name_Range_Setting(
						$field['name'],
						$field['desc'],
						$field['more'],
						$field['args']
					);

					$value = $this->get( $field['name'] );
					$setting->set_value( $value );

					$setting->register(
						$field['label'],
						$this->get_settings_page_name(),
						$section,
						$this->get_option_group(),
						$this->get_name()
					);
					break;

				case 'radio':
					$setting = new Plugin_Name_Radio_Setting(
						$field['name'],
						$field['desc'],
						$field['more'],
						$field['options'] );

					$value = $this->get( $field['name'] );
					$setting->set_value( $value );

					$setting->register(
						$field['label'],
						$this->get_settings_page_name(),
						$section,
						$this->get_option_group(),
						$this->get_name()
					);
					break;

				case 'select':
					$setting = new Plugin_Name_Select_Setting(
						$field['name'],
						$field['desc'],
						$field['more'],
						$field['options'] );

					$value = $this->get( $field['name'] );
					$setting->set_value( $value );

					$setting->register(
						$field['label'],
						$this->get_settings_page_name(),
						$section,
						$this->get_option_group(),
						$this->get_name()
					);
					break;

				case 'custom':
					$setting = $field['instance'];

					$value = $this->get( $setting->get_name(), array() );
					$setting->set_value( $value );

					$setting->register(
						$field['label'],
						$this->get_settings_page_name(),
						$section,
						$this->get_option_group(),
						$this->get_name()
					);
					break;

				default:
					trigger_error( "Undefined Plugin_Name_Setting field type `${field['type']}'" );

			}
		}

		// Close tab
		$section = 'plugin-name-' . $tab['name'] . '-closing-section';
		add_settings_section(
				$section,
				'',
				array( $this, 'close_field_section' ),
				$this->get_settings_page_name()
			);

	}

	/**
	 * Opens a DIV tag for enclosing all fields within a tab.
	 *
	 * If the tab we're opening is the first one, we also print the actual tabs.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function open_field_section() {

		// Print the actual tabs (if there's more than one tab)
		if ( count( $this->tabs ) > 1 && ! $this->current_tab_name ) {
			$tabs = $this->tabs;
			$opened_tab = $this->opened_tab_name;
			include PLUGIN_NAME_INCLUDES_DIR . '/lib/settings/partials/plugin-name-tabs.php';
			$this->current_tab_name = $this->tabs[0]['name'];
		} else {
			$previous_name = $this->current_tab_name;
			$this->current_tab_name = false;
			for ( $i = 0; $i < count( $this->tabs ) - 1 && ! $this->current_tab_name; ++$i ) {
				if ( $this->tabs[$i]['name'] === $previous_name ) {
					$current_tab = $this->tabs[$i+1];
					$this->current_tab_name = $current_tab['name'];
				}
			}
		}

		// And now group all the fields under
		if ( $this->current_tab_name === $this->opened_tab_name ) {
			$invisible = '';
		} else {
			$invisible = ' style="display:none;"';
		}
		echo '<div id="' . $this->current_tab_name . '-tab-content" class="tab-content"' . $invisible . '>';
	}

	/**
	 * Closes a tab div.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function close_field_section() {
		echo '</div>';
	}

	/**
	 * Get the name of the option group.
	 *
	 * @return   string    the name of the settings.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function get_name() {
		return $this->name . '_settings';
	}

	/**
	 * Get the name of the option group.
	 *
	 * @return   string    the name of the option group.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function get_option_group() {
		return $this->name . '_group';
	}

	/**
	 * Get the name of the option group.
	 *
	 * @return   string    the name of the option group.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function get_settings_page_name() {
		return $this->name . '-settings-page';
	}

}

