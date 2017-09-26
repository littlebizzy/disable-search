<?php
/**
 * Plugins Suggestions class
 */
final class DSBSRC_Admin_Suggestions {

	// Properties
	// ---------------------------------------------------------------------------------------------------

	/**
	 * Single class instance
	 */
	private static $instance;

	/**
	 * Plugins directories
	 */
	private $missing;
	private $required = array(
		'disable-author-pages-littlebizzy' => array(
			'name' => 'Disable Author Pages',
			'desc' => 'Completely disables author archives which then become 404 errors, converts author links to homepage links, and works with or without fancy permalinks.',
			'filename' => 'disable-author-pages.php',
		),
		'remove-query-strings-littlebizzy' => array(
			'name' => 'Remove Query Strings',
			'desc' => 'Removes all query strings from static resources meaning that proxy servers and beyond can better cache your site content (plus, better SEO scores).',
			'filename' => 'remove-query-strings.php',
		),
	);



	// Initialization
	// ---------------------------------------------------------------------------------------------------


	/**
	 * Create or retrieve instance
	 */
	public static function instance() {

		// Check instance
		if (!isset(self::$instance))
			self::$instance = new DSBSRC_Admin_Suggestions;

		// Done
		return self::$instance;
	}

	/**
	* Constructor
	*/
	private function __construct() {

		$timestamp = (int) get_option( 'dsbsrc_dismissed_on' );

		if ( empty( $timestamp ) || ( time() - $timestamp ) > (180 * 86400) ) {

			// Check AJAX submit
			if (defined('DOING_AJAX') && DOING_AJAX) {
				add_action( 'wp_ajax_dsbsrc_dismiss', array(&$this, 'dismiss'));

			// Admin area (except install or activate plugins page)
			} elseif (!in_array(basename($_SERVER['PHP_SELF']), array('plugins.php', 'plugin-install.php', 'update.php'))) {

				// Admin hooks
				add_action('admin_footer', array(&$this, 'admin_footer'));
				add_action('plugins_loaded', array(&$this, 'plugins_loaded'));
			}

		}

	}



	/**
	 * Footer script
	 */
	public function admin_footer() { ?>
<script type="text/javascript">jQuery(function($) {	$(document).on('click', '.dsbsrc-dismiss .notice-dismiss', function() { $.post(ajaxurl, {'action':'dsbsrc_dismiss','nonce':$(this).parent().attr('data-nonce')}); }); });</script>
	<?php }



	/**
	 * Dismissi timestamp
	 */
	public function dismiss() {
		if (!empty($_POST['nonce']) && wp_verify_nonce($_POST['nonce'], 'dsbsrc-dismiss')) {
			update_option('dsbsrc_dismissed_on', time(), true);
		}
	}



	// Plugins check
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Admin notices
	 */
	public function admin_notices() {

		$plugin_data = get_plugin_data( DSBSRC_FILE );

		?><div class="dsbsrc-dismiss notice notice-success is-dismissible" data-nonce="<?php echo wp_create_nonce('dsbsrc-dismiss'); ?>">

			<p><?php echo $plugin_data['Name']; ?> recommends the following free plugins:</p>

			<ul><?php foreach ($this->missing as $plugin) : ?>

				<li><strong><?php echo $this->required[$plugin]['name']; ?></strong> <a href="<?php echo esc_url($this->get_install_url($plugin)); ?>">Install now!</a><br /><?php echo $this->required[$plugin]['desc']; ?></li>

			<?php endforeach; ?></ul>

		</div><?php
	}



	/**
	 * Check current active plugins
	 */
	public function plugins_loaded() {

		// Check missing plugins
		$this->missing = $this->get_missing_plugins();
		if (empty($this->missing) || !is_array($this->missing))
			return;

		// Notice action
		add_action('admin_notices', array(&$this, 'admin_notices'));
	}



	/**
	 * Retrieve uninstalled plugins
	 */
	private function get_missing_plugins() {

		// Initialize
		$inactive = array();

		// Check plugins directory
		$directories = array_merge(self::get_mu_plugins_directories(), self::get_plugins_directories());
		if (!empty($directories)) {
			$required = array_keys($this->required);
			foreach ($required as $plugin) {
				if (!in_array($plugin, $directories))
					$inactive[] = $plugin;
			}
		}

		// Check inactives
		if (empty($inactive))
			return false;

		// Done
		return $inactive;
	}



	/**
	 * Collects all active plugins
	 */
	private function get_plugins_directories() {

		// Initialize
		$directories = array();

		// Plugins split directory
		$split = '/'.basename(WP_CONTENT_DIR).'/'.basename(WP_PLUGIN_DIR).'/';

		// Multisite plugins
		if (is_multisite()) {
			$ms_plugins = wp_get_active_network_plugins();
			if (!empty($ms_plugins) && is_array($ms_plugins)) {
				foreach ($ms_plugins as $file) {
					$directory = explode($split, $file);
					$directory = explode('/', ltrim($directory[1], '/'));
					$directory = $directory[0];
					if (!in_array($directory, $directories))
						$directories[] = $directory;
				}
			}
		}

		// Active plugins
		$plugins = wp_get_active_and_valid_plugins();
		if (!empty($plugins) && is_array($plugins)) {
			foreach ($plugins as $file) {
				$directory = explode($split, $file);
				$directory = explode('/', ltrim($directory[1], '/'));
				$directory = $directory[0];
				if (!in_array($directory, $directories))
					$directories[] = $directory;
			}
		}

		// Done
		return $directories;
	}



	/**
	 * Retrieve mu-plugins directories
	 */
	private function get_mu_plugins_directories() {

		// Initialize
		$directories = array();

		// Dependencies
		if (!function_exists('get_plugins'))
			require_once(ABSPATH.'wp-admin/includes/plugin.php');

		// Retrieve mu-plugins
		$plugins = get_plugins('/../mu-plugins');
		if (!empty($plugins) && is_array($plugins)) {
			foreach ($plugins as $path => $info) {
				$directory = dirname($path);
				if (!in_array($directory, array('.', '..')))
					$directories[] = $directory;
			}
		}

		// Done
		return $directories;
	}



	/**
	 * Plugin install/activate URL
	 */
	private function get_install_url($plugin) {

		// Check existing plugin
		$exists = @file_exists(WP_PLUGIN_DIR.'/'.$plugin);

		// Activate
		if ($exists) {

			// Existing plugin
			$path = $plugin.'/'.$this->required[$plugin]['filename'];
			return admin_url('plugins.php?action=activate&plugin='.$path.'&_wpnonce='.wp_create_nonce('activate-plugin_'.$path));

		// Install
		} else {

			// New plugin
			return admin_url('update.php?action=install-plugin&plugin='.$plugin.'&_wpnonce='.wp_create_nonce('install-plugin_'.$plugin));
		}
	}



}