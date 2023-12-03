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

/*
TODO: Jestli nevyužiji tak smazat 

    // Definování přípony
    $phpExtension = ".inc.php";

    // Dostupné stránky mého webu
    // První parametr (např. login) je klíč a druhý je název souboru, který pod ním mám 
    
    /*
    define("WEB_PAGES", [
        'login' => "user-login".$phpExtension,
        'registrace' => "user-registration".$phpExtension,
        'uprava' => "user-update".$phpExtension,
        'management' => "user-management".$phpExtension,
        'profil' => "user-profile".$phpExtension,
        'recenze' => "recenze".$phpExtension,
        'hry' => "games".$phpExtension
    ]);

    */

    /** Klic defaultni webove stranky. */
    const WEB_PAGE_DEFAULT_KEY = "login";

    /** Dostupne webove stranky. */
const WEB_PAGES = array(//// Uvodni stranka (Login) ////
    "login" => array(
        "title" => "Úvodní stránka",

        //// kontroler
        "controller_class_name" => \kivweb\Controllers\LoginController::class, // poskytne nazev tridy vcetne namespace

        // TemplateBased sablona
        "template_type" => \kivweb\Views\TemplateBased\TemplateBasics::PAGE_LOGIN,
    ),
    //// KONEC: Uvodni stranka ////

    //// Sprava uzivatelu ////
    "sprava" => array(
        "title" => "Správa uživatelů",

        //// kontroler
        "controller_class_name" => \kivweb\Controllers\UserManagementController::class,

        // ClassBased sablona
        //"view_class_name" => \kivweb\Views\ClassBased\UserManagementTemplate::class,

        // TemplateBased sablona
        "view_class_name" => \kivweb\Views\TemplateBased\TemplateBasics::class,
        "template_type" => \kivweb\Views\TemplateBased\TemplateBasics::PAGE_USER_MANAGEMENT,
    ),
    //// KONEC: Sprava uzivatelu ////

    //// Registrace ////

    "registrace" => array(
        "title" => "Registrace",

        //// kontroler
        "controller_class_name" => \kivweb\Controllers\UserRegistrationController::class,

        // ClassBased sablona
        //"view_class_name" => \kivweb\Views\ClassBased\UserManagementTemplate::class,

        // TemplateBased sablona
        "view_class_name" => \kivweb\Views\TemplateBased\TemplateBasics::class,
        "template_type" => \kivweb\Views\TemplateBased\TemplateBasics::PAGE_REGISTRATION,
    ),
    //// KONEC: Registrace ////

    //// USER UPDATE ////

    "update" => array(
        "title" => "Update uživatele",
        //// kontroler
        "controller_class_name" => \kivweb\Controllers\RecenzeController::class,
        // TemplateBased sablona
        "view_class_name" => \kivweb\Views\TemplateBased\TemplateBasics::class,
        "template_type" => \kivweb\Views\TemplateBased\TemplateBasics::PAGE_USER_UPDATE,
    ),
    //// KONEC: USER UPDATE ////

    //// Recenze ////

    "recenze" => array(
        "title" => "Recenze",

        //// kontroler
        "controller_class_name" => \kivweb\Controllers\RecenzeController::class,

        // TemplateBased sablona
        "view_class_name" => \kivweb\Views\TemplateBased\TemplateBasics::class,
        "template_type" => \kivweb\Views\TemplateBased\TemplateBasics::PAGE_RECENZE,
    ),
    //// KONEC: Recenze ////


);

?>
