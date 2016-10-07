<?php
/*
Plugin Name: Pootle Page Builder Module Boilerplate
Plugin URI: http://pootlepress.com/
Description: A simple single class boilerplate for fast track Pootle Page Builder Module Development
Author: Shramee
Version: 1.0.0
Author URI: http://shramee.com/
@developer shramee <shramee.srivastav@gmail.com>
*/

class PPB_Module_Boilerplate {

	/** @var string Token */
	public $token = 'ppb-module-biolerplate';

	/** @var string Main plugin class, Module is greyed out if this class is not present */
	public $class = 'PPB_Module_Boilerplate';

	/** @var string Module name */
	public $name = 'Module Boilerplate';

	/** @var PPB_Module_Boilerplate Instance */
	private static $_instance = null;

	/**
	 * Gets PPB_Module_Boilerplate instance
	 * @return PPB_Module_Boilerplate instance
	 * @since 	1.0.0
	 */
	public static function instance() {
		if ( null == self::$_instance ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * PootlePB_Meta_Slider constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'init', ) );
	}

	/**
	 * Initiates the addon
	 * @action init
	 */
	public function init() {
		// Adding modules to live editor sidebar
		add_action( 'pootlepb_modules', array( $this, 'module' ) );
		// Adding modules plugin to Modules page
		add_action( 'pootlepb_modules_page', array( $this, 'module_plugin' ), 25 );
		if ( class_exists( $this->class ) ) {
			// Adding module tab in content block panel
			add_filter( 'pootlepb_content_block_tabs', array( $this, 'tab' ) );
			add_filter( 'pootlepb_le_content_block_tabs', array( $this, 'tab' ) );
			// Adding stuff to the content block
			add_action( 'pootlepb_render_content_block', array( $this, 'content' ), 52 );
			// Content block panel fields
			add_filter( 'pootlepb_content_block_fields', array( $this, 'fields' ) );

			$forms = ninja_forms_get_all_forms();
			foreach ( $forms as $form ) {
				$this->choices[ $form['id'] ] = "$form[id] - $form[name]";
			}
		}
	}

	/**
	 * The module box data
	 * @param array $mods Modules
	 * @return array
	 * @filter pootlepb_modules
	 */
	public function module( $mods ) {
		$mods["$this->token-form"] = array(
			'label' => $this->name,
			'icon_class' => 'dashicons dashicons-admin-plugins',
			'icon_html' => '',
			'tab' => "#pootle-$this->token-tab",
			'ActiveClass' => $this->class,
			'priority'    => 35,
		);
		return $mods;
	}

	/**
	 * USE THIS ONLY IF YOUR MODULE NEEDS AN EXTERNAL PLUGIN TO WORK
	 *
	 * Adds plugin entry in Free modules section
	 * @param array $mods Modules
	 * @return mixed
	 * @filter pootlepb_modules_page
	 */
	public function module_plugin( $mods ) {
		$mods[ $this->token ] = array(
			'Name' => $this->name,
			'Description' => 'Awesome boilerplate to fast track your Pootle Pagebuilder module development.',
			'InstallURI' => 'http://example.com/',
			//'InstallURI' => admin_url( "/plugin-install.php?s=$this->name&tab=search&type=term" ), // If parent plugin hosted on WP.org
			'AuthorURI' => 'https://shramee.me',
			'Author' => 'Shramee',
			'Image' => plugin_dir_url( __FILE__ ) . '/module.png',
			//'Image' => "//ps.w.org/$this->token/assets/icon-256x256.png?rev=1262610", // If parent plugin hosted on WP.org
			'ActiveClass' => $this->class,
		);
		return $mods;

	}

	/**
	 * Adds module tab in content block panel
	 * @param array $tabs Content block panel tabs
	 * @return mixed
	 * @filter pootlepb_content_block_tabs, pootlepb_le_content_block_tabs
	 */
	public function tab( $tabs ) {
		$tabs[ $this->token ] = array(
			'label' => $this->name,
			'priority' => 5,
		);
		return $tabs;
	}

	/**
	 * Adds module fields in content block panel
	 * @param $fields
	 * @return mixed
	 * @filter pootlepb_content_block_fields
	 */
	public function fields( $fields ) {
		$fields[ $this->token . '-txt' ] = array(
			'name' => 'Sample text field',
			'type' => 'text',
			'tab' => $this->token,
		);
		$fields[ $this->token . '-clr' ] = array(
			'name' => 'Sample color field',
			'type' => 'color',
			'tab' => $this->token,
		);
		return $fields;
	}

	/**
	 * Renders the module content
	 * @param array $info Content block info
	 * @action pootlepb_render_content_block
	 */
	public function content( $info ) {
		$set = json_decode( $info['info']['style'], true ); // Here are all the settings

		if ( ! empty( $set[ $this->token . '-txt' ] ) ) {
			// Output your module content here
			echo "<div style='color: {$set[ $this->token . '-clr' ]}'>{$set[ $this->token . '-txt' ]}</div>";
		}
	}
}

PPB_Module_Boilerplate::instance();
?>

### `PPB_Module_Boilerplate`::`instance()`

* Gets PPB_Module_Boilerplate instance
* @return PPB_Module_Boilerplate instance
* @since 	1.0.0

-------

### `PPB_Module_Boilerplate`::`__construct()`

* PootlePB_Meta_Slider constructor.

-------

### `PPB_Module_Boilerplate`::`init()`

* Initiates the addon
* @action init

-------

### `PPB_Module_Boilerplate`::`module( $mods )`

* The module box data
* @param array $mods Modules
* @return array
* @filter pootlepb_modules

-------

### `PPB_Module_Boilerplate`::`module_plugin( $mods )`

* USE THIS ONLY IF YOUR MODULE NEEDS AN EXTERNAL PLUGIN TO WORK
* Adds plugin entry in Free modules section
* @param array $mods Modules
* @return mixed
* @filter pootlepb_modules_page

-------

### `PPB_Module_Boilerplate`::`tab( $tabs )`

* Adds module tab in content block panel
* @param array $tabs Content block panel tabs
* @return mixed
* @filter pootlepb_content_block_tabs, pootlepb_le_content_block_tabs

-------

### `PPB_Module_Boilerplate`::`fields( $fields )`

* Adds module fields in content block panel
* @param $fields
* @return mixed
* @filter pootlepb_content_block_fields

-------

### `PPB_Module_Boilerplate`::`content( $info )`

* Renders the module content
* @param array $info Content block info
* @action pootlepb_render_content_block
