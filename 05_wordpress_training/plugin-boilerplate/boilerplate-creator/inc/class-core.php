<?php
/**
 * Core class
 *
 * This file contains Core class which can handle whole script process
 *
 * @package    Boilerplate_Creatore
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.0
 */

namespace Boilerplate_Creator\Inc;

use Boilerplate_Creator\Inc\Functions\{
	Utility, Files_Process
};
use Boilerplate_Creator\Inc\Setting;

/**
 * Class Core
 *
 * This file contains core class which can set Primary class for script
 *
 * @package    Boilerplate_Creator
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @property Setting       $settings
 * @property boolean       $is_in_test_mode
 * @property Files_Process $file_process
 */
class Core {
	use Utility;
	/**
	 * @var Setting $settings Primary settings for this script
	 */
	protected $settings;
	/**
	 * @var boolean $is_in_test_mode
	 */
	protected $is_in_test_mode;
	/**
	 * @var Files_Process $file_process
	 */
	protected $file_process;

	public function __construct( Setting $settings, Files_Process $files_process ) {
		/**
		 * set time zone
		 */
		$this->set_time_zone( 'Asia/Tehran' );
		$this->settings        = $settings;
		$this->file_process    = $files_process;
		$this->is_in_test_mode = true;
	}

	public function init() {


		if ( $this->is_in_test_mode ) {

			$this->customize_abstract_classes();
			var_dump( $this );
		} else {
			$this->create_new_project();
			$this->create_new_files_and_directories();
			$this->remove_extra_files();
			$this->rename_main_plugin_file();
			$this->customize_main_plugin_file();
			$this->rename_asset_files();
			var_dump( $this );
			//TODO:
		}
	}

	/**
	 * Customize abstract classes in plugin
	 */
	public function customize_abstract_classes() {


		$admin_menu_search_items       = [
			[
				'search'  => $this->settings->old_plugin_version,
				'replace' => $this->settings->new_plugin_version,
			],
			[
				'search'  => $this->settings->old_namespace,
				'replace' => $this->settings->new_namespace,
			],
			[
				'search'  => $this->settings->old_namespace,
				'replace' => $this->settings->new_namespace,
			],
			[
				'search'  => $this->settings->old_link,
				'replace' => $this->settings->new_link,
			],
			[
				'search'  => $this->settings->old_author_name,
				'replace' => $this->settings->new_author_name,
			],
			[
				'search'  => $this->settings->old_author_uri,
				'replace' => $this->settings->new_author_uri,
			],
			[
				'search'  => $this->settings->old_author_email,
				'replace' => $this->settings->new_author_email,
			],

		];
		$search_and_replace_list_items = [
			[
				'file_name'    => $this->settings->new_abstract_file_full_path . 'class-admin-menu.php',
				'search_items' => $admin_menu_search_items,
			],
		];
		$results                       = $this->file_process->files_bulk_search_and_replace( $search_and_replace_list_items );
		$this->file_process->several_appends( $results, $this->settings->main_log_file );

	}

	/**
	 * Create directory for new plugin
	 */
	public function create_new_project() {
		$result = $this->file_process->make_directory_if_not_exist( '../' . $this->settings->new_path, 'for new plugin path' );
		$this->file_process->append( $result ['message'], $this->settings->main_log_file );
		$this->file_process->append_section_separator( $this->settings->main_log_file );
	}

	/**
	 * Create new directories and files for new plugin
	 */
	public function create_new_files_and_directories() {
		$result = $this->file_process->copy_directory(
			$this->settings->old_full_path,
			$this->settings->new_full_path
		);
		$this->file_process->append( $result ['message'], $this->settings->main_log_file );
		$this->file_process->append_section_separator( $this->settings->main_log_file );
	}

	/**
	 * Remove extra file in new plugin directory
	 */
	public function remove_extra_files() {
		$this->file_process->remove_file( $this->settings->new_full_path . 'LICENSE.txt' );
		$this->file_process->remove_file( $this->settings->new_full_path . '.gitignore' );
		// TODO: log this process in future
	}

	/**
	 * Rename main plugin file
	 */
	public function rename_main_plugin_file() {
		$result = $this->file_process->rename_file(
			$this->settings->new_full_path . 'plugin-name.php',
			$this->settings->new_plugin_main_file_name
		);
		$this->file_process->append( $result ['message'], $this->settings->main_log_file );
		$this->file_process->append_section_separator( $this->settings->main_log_file );
	}

	/**
	 * Change main plugin file with new values
	 */
	public function customize_main_plugin_file() {
		$search_and_replace_items = [
			[
				'search'  => $this->settings->old_plugin_name_in_header,
				'replace' => $this->settings->new_plugin_name_in_header,
			],
			[
				'search'  => $this->settings->old_plugin_description,
				'replace' => $this->settings->new_plugin_description,
			],
			[
				'search'  => $this->settings->old_plugin_version,
				'replace' => $this->settings->new_plugin_version,
			],
			[
				'search'  => $this->settings->old_namespace,
				'replace' => $this->settings->new_namespace,
			],
			[
				'search'  => $this->settings->old_namespace,
				'replace' => $this->settings->new_namespace,
			],
			[
				'search'  => $this->settings->old_link,
				'replace' => $this->settings->new_link,
			],
			[
				'search'  => $this->settings->old_author_name,
				'replace' => $this->settings->new_author_name,
			],
			[
				'search'  => $this->settings->old_author_uri,
				'replace' => $this->settings->new_author_uri,
			],
			[
				'search'  => $this->settings->old_author_email,
				'replace' => $this->settings->new_author_email,
			],
			[
				'search'  => $this->settings->old_main_plugin_name,
				'replace' => $this->settings->new_main_plugin_name,
			],
			[
				'search'  => $this->settings->old_plugin_name_main_name_const,
				'replace' => $this->settings->new_plugin_name_main_name_const,
			],
			[
				'search'  => $this->settings->old_plugin_name_const_prefix,
				'replace' => $this->settings->new_plugin_name_const_prefix,
			],
			[
				'search'  => $this->settings->old_plugin_name_method_prefix,
				'replace' => $this->settings->new_plugin_name_method_prefix,
			],


		];
		$result                   = $this->file_process->do_search_and_replace(
			$this->settings->new_plugin_main_file_name,
			$search_and_replace_items
		);

		$this->file_process->append( $result ['message'], $this->settings->main_log_file );
		$this->file_process->append_section_separator( $this->settings->main_log_file );
	}

	/**
	 * Rename asset files
	 */
	public function rename_asset_files() {
		$rename_list_items = [
			[
				'old_name' => $this->settings->new_full_path . 'assets/admin/css/plugin-name-admin.css',
				'new_name' => $this->settings->new_full_path . 'assets/admin/css/' . $this->settings->new_file_name_prefix . '-admin.css',
			],
			[
				'old_name' => $this->settings->new_full_path . 'assets/admin/css/plugin-name-admin-ver-1.css',
				'new_name' => $this->settings->new_full_path . 'assets/admin/css/' . $this->settings->new_file_name_prefix . '-admin-ver-1.css',
			],
			[
				'old_name' => $this->settings->new_full_path . 'assets/admin/js/plugin-name-admin.js',
				'new_name' => $this->settings->new_full_path . 'assets/admin/js/' . $this->settings->new_file_name_prefix . '-admin.js',
			],
			[
				'old_name' => $this->settings->new_full_path . 'assets/admin/js/plugin-name-admin-ver-1.js',
				'new_name' => $this->settings->new_full_path . 'assets/admin/js/' . $this->settings->new_file_name_prefix . '-admin-ver-1.js',
			],
			[
				'old_name' => $this->settings->new_full_path . 'assets/css/plugin-name-public.css',
				'new_name' => $this->settings->new_full_path . 'assets/css/' . $this->settings->new_file_name_prefix . '-public.css',
			],
			[
				'old_name' => $this->settings->new_full_path . 'assets/css/plugin-name-public-ver-1.css',
				'new_name' => $this->settings->new_full_path . 'assets/css/' . $this->settings->new_file_name_prefix . '-public-ver-1.css',
			],
			[
				'old_name' => $this->settings->new_full_path . 'assets/js/plugin-name-public.js',
				'new_name' => $this->settings->new_full_path . 'assets/js/' . $this->settings->new_file_name_prefix . '-public.js',
			],
			[
				'old_name' => $this->settings->new_full_path . 'assets/js/plugin-name-public-ver-1.js',
				'new_name' => $this->settings->new_full_path . 'assets/js/' . $this->settings->new_file_name_prefix . '-public-ver-1.js',
			],
			[
				'old_name' => $this->settings->new_full_path . 'languages/plugin-name.pot',
				'new_name' => $this->settings->new_full_path . 'languages/' . $this->settings->new_file_name_prefix . '.pot',
			],
		];
		$results           = $this->file_process->files_bulk_rename( $rename_list_items );
		$this->file_process->several_appends( $results, $this->settings->main_log_file );
	}

	/**
	 * @param $property
	 *
	 * @return mixed
	 */
	public function __get( $property ) {
		return $this->$property;
	}

	/**
	 * @param $name
	 * @param $value
	 */
	public function __set( $name, $value ) {
		$this->$name = $value;
	}


}