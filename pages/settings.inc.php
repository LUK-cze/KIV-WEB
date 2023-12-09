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

require_once ('myAutoloader.inc.php');

use kivweb\Controllers\games_Controller;
use kivweb\Controllers\LoginController;
use kivweb\Controllers\user_login_Controller;
use kivweb\Controllers\user_management_Controller;
use kivweb\Controllers\user_registration_Controller;
use kivweb\Controllers\user_update_Controller;
use kivweb\Views\TemplateBasics;

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
    
    define("WEB_PAGES", [
        'login' => "user-login".$phpExtension,
        'registrace' => "user-registration".$phpExtension,
        'uprava' => "user-update".$phpExtension,
        'management' => "user-management".$phpExtension,
        'profil' => "user-profile".$phpExtension,
        'recenze' => "recenze".$phpExtension,
        'hry' => "games".$phpExtension
    ]);


    /** Klic defaultni webove stranky. */
    const WEB_PAGE_DEFAULT_KEY = "login";

    /** Dostupne webove stranky. */
    const WEB_PAGES = array(//// Uvodni stranka (Login) ////
    "login" => array(
        "title" => "Úvodní stránka",

        // kontroler
        "controller_class_name" => user_login_Controller::class, // poskytne nazev tridy vcetne namespace

        // TemplateBased sablona
        "view_class_name" => TemplateBasics::class,
        "template_type" => TemplateBasics::PAGE_LOGIN,
    ),
    //// KONEC: Uvodni stranka ////

    //// Sprava uzivatelu ////
    "sprava" => array(
        "title" => "Správa uživatelů",

        //// kontroler
        "controller_class_name" => user_management_Controller::class,

        // TemplateBased sablona
        "view_class_name" => TemplateBasics::class,
        "template_type" => TemplateBasics::PAGE_USER_MANAGEMENT,
    ),
    //// KONEC: Sprava uzivatelu ////

    //// Registrace ////

    "registrace" => array(
        "title" => "Registrace",

        //// kontroler
        "controller_class_name" => user_registration_Controller::class,

        // TemplateBased sablona
        "view_class_name" => TemplateBasics::class,
        "template_type" => TemplateBasics::PAGE_REGISTRATION,
    ),
    //// KONEC: Registrace ////

    //// USER UPDATE ////

    "update" => array(
        "title" => "Update uživatele",
        //// kontroler
        "controller_class_name" => user_update_Controller::class,

        // TemplateBased sablona
        "view_class_name" => TemplateBasics::class,
        "template_type" => TemplateBasics::PAGE_USER_UPDATE,
    ),
    //// KONEC: USER UPDATE ////

    //// Recenze ////

    "recenze" => array(
        "title" => "Recenze",

        //// kontroler
        "controller_class_name" => recenze_Controller::class,

        // TemplateBased sablona
        "view_class_name" => TemplateBasics::class,
        "template_type" => TemplateBasics::PAGE_RECENZE,
    ),
    //// KONEC: Recenze ////

    "hry" => array(
        "title" => "Recenze",

        //// kontroler
        "controller_class_name" => games_Controller::class,

        // TemplateBased sablona
        "view_class_name" => TemplateBasics::class,
        "template_type" => TemplateBasics::PAGE_GAMES,
    ),
    //// KONEC: Recenze ////


);
?>
