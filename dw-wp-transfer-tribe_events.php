<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.dasdware.de
 * @since             1.0.0
 * @package           DW_WP_Transfer_TribeEvents
 *
 * @wordpress-plugin
 * Plugin Name:       dasd.ware WordPress Transfer add-on for The Events Calendar
 * Plugin URI:        http://www.dasdware.de
 * Description:       Adds transfer definitions for The Events Calendar.
 * Version:           1.0.0
 * Author:            dasd.ware
 * Author URI:        http://www.dasdware.de
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dw-wp-transfer-tribe_events
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'DW_WP_TRANSFER_TRIBE_EVENTS_VERSION', '1.0.0' );


function add_descriptor($add_descriptor) {
	// Extension: tribe_events
	$add_descriptor(
		new DW_WP_Transfer_Descriptor(
			'tribe-events', 
			'The Events Calendar (Events, Venues and Organizers)', 
			array('tribe_venue', 'tribe_organizer', 'tribe_events'),
			array(
				new DW_WP_Transfer_ForeignKey('tribe_events', '_EventVenueID', 'tribe_venue', 'ID', true, false),
				new DW_WP_Transfer_ForeignKey('tribe_events', '_EventOrganizerID', 'tribe_organizer', 'ID', true, false)
			)
		)
	);
}	

add_action('dw_wp_transfer_add_descriptors', 'add_descriptor');

?>