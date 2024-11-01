<?php

global $woocommerce;

defined( 'ABSPATH' ) || exit;

add_action( 'woocommerce_cart_calculate_fees','IAWC_custom_tax_function', 10, 1 );

function IAWC_custom_tax_function( $cart ) {

    //recupero le informazioni sulla cassa previdenziale
    $options = get_option( 'IAWC_cassa_previdenziale' );

    //verifico se il valore del carrello è maggiore di 77.47
    if(round(floatval(WC()->cart->cart_contents_total), 2) > round(77.47, 2))
    {

        $cart->add_fee( __('Marca da bollo assolta sull\'originale','text-marca-da-bollo') , 2.00 , false);

    }

    //se è attiva la rivalsa previdenziale calcolo e aggiungo il 4 percento
    if(isset( $options['attivata'] ))
    {
        //calcolo valore percentuale
        $Rivalsa = (WC()->cart->cart_contents_total * $options['percentuale'])/100;

        if(round(floatval(WC()->cart->cart_contents_total), 2)+$Rivalsa > round(77.47, 2)){
            $cart->add_fee( __('Marca da bollo assolta sull\'originale','text-marca-da-bollo') , 2.00 , false); 
        }

        $cart->add_fee( __('Rivalsa contributiva ','text-rivalsa') . $options['tipologia'] . ' ' .  $options['percentuale'] . '%', $Rivalsa , false);

    }

}
?>