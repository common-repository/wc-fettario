<?php 



// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) exit;



//Disinstallazione

function IAWC_uninstall_function()

{

    delete_option( 'cassa_previdenziale' );

}



?>