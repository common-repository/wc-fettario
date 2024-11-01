<?php
/*
Plugin Name: Italian feature add-on for Woocommerce
Version: 1.3
Description: Plugin che configura correttamente Woocommerce per chi usufruisce del regime forfettario comprensivo di cassa di previdenza
Author: Simone Marcon
Author URI: https://www.simonemarcon.com
*/

defined( 'ABSPATH' ) || exit;

//percorso generale del plugin
define( 'IAWC_PATH', plugin_dir_path( __FILE__ ) );

//includo i file
include( IAWC_PATH . 'menu.php');
include( IAWC_PATH . 'hooks.php');
include( IAWC_PATH . 'options.php');
include( IAWC_PATH . 'uninstall.php');

//richiamo la classe che genera il menu
$plugin_options = new IAWC_SettingMenu();



register_uninstall_hook( __FILE__, 'IAWC_uninstall_function' );



?>