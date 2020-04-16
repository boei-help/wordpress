<?php
/*
 * Plugin Name: Boei Help
 * Version: 1.0.0
 * Plugin URI: https://www.boei.help/?utm_source=wordpress&utm_medium=wp_plugins
 * Description: Convert more using Boei by talking to visitors on their favourite channels. This plugin embeds Boei's script in your WordPress website.
 * Author: Boei.help
 * Tested up to: 5.4
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package Boei Help
 * @author Boei.help
 * @license GPL-2.0-or-later
 */

if (!defined('ABSPATH')) exit;


/** 
 * Optional function for users that want to test on localhost with their live domain
 * @link https://app.boei.help/docs/1.0/localhost
 */
// function boei_localhost_test(){
//     echo '<script>window.Boei_Test_Hostname = "example.com";</script>';
// }
//add_action( 'wp_head', 'boei_localhost_test' );


/** 
 * Loading the Boei script on the frontend
 */
function boei_load_script() {

  wp_enqueue_script('boei', 'https://cdn.boei.help/hello.js', array(), '1.0', true);
    
}
add_action('wp_enqueue_scripts', 'boei_load_script');



/** 
 * Adding link to the Boei settings page in wp-plugins admin
 */
function boei_admin_action_links( $links ) {

	$links = array_merge( array(
		'<a href="' . esc_url( 'https://app.boei.help' ) . '">' . __( 'Settings', 'textdomain' ) . '</a>'
	), $links );

	return $links;

}
add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'boei_admin_action_links' );