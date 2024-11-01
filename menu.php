<?php





defined( 'ABSPATH' ) || exit;








class IAWC_SettingMenu {


    


    public function __construct() {


		// Aggiungo la pagina al menu di amministrazione


        add_action( 'admin_menu', array( &$this, 'IAWC_setupAdminMenus' ) );


        


}


    


    public function IAWC_setupAdminMenus() {


		add_menu_page( 'Italian Addon WC', 'Italian feature Woocommerce', 'manage_options','ItalianAddonWC_settings', array( &$this, 'IAWC_settingsPage' ) );


}





    








	public function IAWC_settingsPage() {


		// Output della pagina


?>


		<h2>Italian feature add-on for Woocommerce: Woocommerce su misura per il regime forfettario</h2>


        <p>Caro collega,<br>


        Mi presento sono <a href="https://www.simonemarcon.com">Marcon Simone</a> e ho sviluppato questo plugin per rispondere all'esigenza di tutti i lavoratori autonomi, che rientrano nel regime forfettario, ad adempiere alle richieste nelle varie fatture.<br>


        Una volta installato il <strong>plugin è già funzionante</strong> e non dovrai fare nulla per quanto riguarda l'inserimento della marca da bollo negli ordini superiori all'indicazioni dell'agenzia delle entrate.<br></p>


        <br>





        


        <?php


            IAWC_Cassa_previdenziale_option();


        ?>


        





        <p>Informazioni generali<br>


        <strong>Valore marca da bollo:</strong> 2€<br>


        <strong>Inserimento marca da bollo negli ordini superiori a:</strong> 77.47€</p>











<?php


}





}





?>