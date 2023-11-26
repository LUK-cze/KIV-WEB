<?php
///////////////////////////////////////////////////////
////////////// Zakladni nastaveni webu ////////////////
///////////////////////////////////////////////////////

////// nastaveni pristupu k databazi ///////

    // prihlasovaci udaje k databazi
    define("DB_SERVER","localhost"); // https://students.kiv.zcu.cz nebo 147.228.63.10
    define("DB_NAME","KIV/WEB");
    define("DB_USER","root");
    define("DB_PASS","");

    // definice konkretnich nazvu tabulek
    define("TABLE_UZIVATEL","uzivatele");
    define("TABLE_PRAVO","pravo");


///// vsechny stranky webu ////////

    // pripona souboru
    $phpExtension = ".inc.php";

    // dostupne stranky webu
    define("WEB_PAGES", [
        'login' => "user-login".$phpExtension,
        'registrace' => "user-registration".$phpExtension,
        'uprava' => "user-update".$phpExtension,
        'management' => "user-management".$phpExtension
    ]);

    // defaultni/vychozi stranka webu
    define("WEB_PAGE_DEFAULT_KEY", 'login');

?>
