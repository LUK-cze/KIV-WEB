<?php

/*

╔══════════════════════════════════╗
║                                  ║
║            Nastavení             ║
║                                  ║
╚══════════════════════════════════╝

Zde je nastavení dostupných stránek (pole WEB_PAGES), defaultní stránka a
přístup do databáze

*/

    // Údaje pro přihlášení do databáze
    define("DB_SERVER","localhost");
    define("DB_NAME","kivweb");
    define("DB_USER","root");
    define("DB_PASS","");

    // Názvy vytvořených tabulek
    define("TABLE_UZIVATEL","uzivatele");
    define("TABLE_PRAVO","pravo");
    define("TABLE_HRY","hry");
    define("TABLE_ZANRY","zanry");


///// vsechny stranky webu ////////

    // Definování přípony
    $phpExtension = ".inc.php";

    // Dostupné stránky mého webu
    // První parametr (např. login) je klíč a druhý je název souboru, který pod ním mám 
    define("WEB_PAGES", [
        'login' => "user-login".$phpExtension,
        'registrace' => "user-registration".$phpExtension,
        'uprava' => "user-update".$phpExtension,
        'management' => "user-management".$phpExtension,
        'profil' => "user-profile".$phpExtension,
        'recenze' => "recenze".$phpExtension
    ]);

    // Defaultni/výchozí stránka webu
    define("WEB_PAGE_DEFAULT_KEY", 'login');

?>
