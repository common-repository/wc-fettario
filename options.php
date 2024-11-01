<?php

defined( 'ABSPATH' ) || exit;

add_action( 'admin_init', 'IAWC_Cassa_previdenziale_settings_init' );

function IAWC_Cassa_previdenziale_settings_init(  ) { 
    register_setting( 'wooForfSettings', 'IAWC_cassa_previdenziale' );
    add_settings_section(
        'option_Wooforf_section', 
        __( 'Rivalsa previdenziale', 'text-cassa-previdenziale-title' ), 
        'IAWC_Cassa_previdenziale_settings_section_callback', 
        'wooForfSettings'
    );

    add_settings_field( 
        'attivata', 
        __( 'Calcolo cassa previdenziale', 'attiva-cassa-previdenziale' ), 
        'IAWC_Attiva_field_render', 
        'wooForfSettings', 
        'option_Wooforf_section' 
    );

    add_settings_field( 
        'tipologia', 
        __( 'Tipologia cassa previdenziale', 'tipologia-cassa-previdenziale' ), 
        'IAWC_Tipologia_field_render', 
        'wooForfSettings', 
        'option_Wooforf_section' 
    );

    add_settings_field( 
        'percentuale', 
        __( 'Percentuale cassa previdenziale', 'percentuale-cassa-previdenziale' ), 
        'IAWC_Percentuale_field_render', 
        'wooForfSettings', 
        'option_Wooforf_section' 
    );
}

function IAWC_Attiva_field_render(  ) { 
    $options = get_option( 'IAWC_cassa_previdenziale' );
    ?>
   <input type="checkbox" id="IAWC_cassa_previdenziale[attivata]" name="IAWC_cassa_previdenziale[attivata]" <?php checked( isset( $options['attivata'] ) ); ?> >Abilita calcolo cassa previdenziale</input><br><br>
<?php
}

function IAWC_Tipologia_field_render(  ) { 
    $options = get_option( 'IAWC_cassa_previdenziale' );
    ?>
   <select name="IAWC_cassa_previdenziale[tipologia]" id="IAWC_cassa_previdenziale[tipologia]" required>
        <option value='CNN'  <?php selected( $options['tipologia'], 'CNN' ); ?> >Cassa nazionale del Notariato (CNN)</option>
        <option value='CNPAF' <?php selected( $options['tipologia'], 'CNPAF' ); ?> >Cassa Forense o Cassa Nazionale di Previdenza e Assistenza Forense (CNPAF)</option>
        <option value='CIPAG' <?php selected( $options['tipologia'], 'CIPAG' ); ?> >Cassa Italiana di Previdenza ed Assistenza dei Geometri Liberi Professionisti (CIPAG)</option>
        <option value='CRPC' <?php selected( $options['tipologia'], 'CRPC' ); ?> >Cassa Ragionieri e Periti Commerciali</option>
        <option value='CNPADC' <?php selected( $options['tipologia'], 'CNPADC' ); ?> >Cassa Nazionale di Previdenza e Assistenza a favore dei Dottori Commercialisti (CNPADC)</option>
        <option value='ENPAB' <?php selected( $options['tipologia'], 'ENPAB' ); ?> >Cassa Biologi (ENPAB)</option>
        <option value='ENPACL' <?php selected( $options['tipologia'], 'ENPACL' ); ?> >Cassa Consulenti del Lavoro (ENPACL)</option>
        <option value='ENPAF' <?php selected( $options['tipologia'], 'ENPAF' ); ?> >Cassa dei Farmacisti (ENPAF)</option>
        <option value='ENPAIA' <?php selected( $options['tipologia'], 'ENPAIA' ); ?> >Cassa Agrotecnici e Periti Agrari (ENPAIA)</option>
        <option value='ENPAM' <?php selected( $options['tipologia'], 'ENPAM' ); ?> >Cassa Medici (ENPAM)</option>
        <option value='ENPAP' <?php selected( $options['tipologia'], 'ENPAP' ); ?> >Cassa Psicologi (ENPAP)</option>
        <option value='ENPAV' <?php selected( $options['tipologia'], 'ENPAV' ); ?> >Cassa Veterinari (ENPAV)</option>
        <option value='EPAP' <?php selected( $options['tipologia'], 'EPAP' ); ?> >Cassa Dottori Agronomi, Forestali, Attuari, Chimici, Geologi (EPAP)</option>
        <option value='EPPI' <?php selected( $options['tipologia'], 'EPPI' ); ?> >Cassa Periti Industriali (EPPI)</option>
        <option value='INARCASSA' <?php selected( $options['tipologia'], 'INARCASSA' ); ?> >Cassa Ingegneri e Architetti (INARCASSA)</option>
        <option value='INPGI' <?php selected( $options['tipologia'], 'INPGI' ); ?> >Cassa Giornalisti e Liberi Professionisti (INPGI)</option>
        <option value='ENPAPI' <?php selected( $options['tipologia'], 'ENPAPI' ); ?> >Cassa Infermieri, Assistenti Sanitari e Vigilatrici d’Infanzia (ENPAPI)</option>
        <option value='ENAS' <?php selected( $options['tipologia'], 'ENAS' ); ?> >Enasarco</option>
        <option value='INPS' <?php selected( $options['tipologia'], 'INPS' ); ?> >Istituto Nazionale Previdenza Sociale (INPS)</option>
    </select><br><br>
<?php
}

function IAWC_Percentuale_field_render(  ) { 
    $options = get_option( 'IAWC_cassa_previdenziale' );
    ?>
    <input type="number" id="IAWC_cassa_previdenziale[percentuale]" name="IAWC_cassa_previdenziale[percentuale]" value="<?php echo $options['percentuale'] ?>" required></input><br><br>
<?php
}


function IAWC_Cassa_previdenziale_settings_section_callback(  ) { 
    echo __( 'Se devi impostare la cassa previdenziale utilizza il seguente form:', 'descr-cassa-previdenziale' );
}


function IAWC_Cassa_previdenziale_option(  ) { 
    ?>
    <form action='options.php' method='post'>
        <?php
        settings_fields( 'wooForfSettings' );
        do_settings_sections( 'wooForfSettings' );
        submit_button();
        ?>
    </form>
    <?php
}

?>