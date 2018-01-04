<?php

/**
 * Plugin Name:         itsIsotope
 * Plugin URI:          https://wordpress.org/plugins/itsisotope/
 * Description:         Allows you to use Metafizzy's Isotope to display feeds of WordPress posts using simple shortcodes. Works with custom post types and custom taxonomies too.
 * Version:             2.2
 * Author:              itsRashad
 * Author URI:          http://itsrashad.info
 * Text Domain:         itsisotope
 * License:             GPL-2.0+
 * License URI:         http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:         /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

// Define the plugin directory
define('ITS_DIR', dirname(__FILE__));

/* ----------------------------------------------------------------------------*
 * Public-Facing Functionality
 * ---------------------------------------------------------------------------- */

require_once( ITS_DIR . '/public/class-itsisotope.php' );

register_activation_hook(__FILE__, array('Isotope_Posts', 'activate'));
register_deactivation_hook(__FILE__, array('Isotope_Posts', 'deactivate'));

add_action('plugins_loaded', array('Isotope_Posts', 'get_instance'));

/* ----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 * ---------------------------------------------------------------------------- */

if (is_admin()) {
    require_once( ITS_DIR . '/admin/class-itsisotope-admin.php' );
    add_action('plugins_loaded', array('Isotope_Posts_Admin', 'get_instance'));
}