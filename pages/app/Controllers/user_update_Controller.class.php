<?php

/*

╔══════════════════════════════════╗
║                                  ║
║         Update uživatele         ║
║                                  ║
╚══════════════════════════════════╝

Zde si uživatel může upravit svoje údaje co má uložené v databázi

*/


namespace kivweb\Controllers;

use kivweb\Models\DatabaseModel as MyDB;

// nactu rozhrani kontroleru
//require_once(DIRECTORY_CONTROLLERS."/IController.interface.php");

/**
 * Ovladac zajistujici vypsani uvodni stranky.
 * @package kivweb\Controllers
 */
class user_update_Controller implements IController {

    /** @var MyDB $db  Sprava databaze. */
    private $db;

    /**
     * Inicializace pripojeni k databazi.
     */
    public function __construct() {
        // inicializace prace s DB
        //require_once (DIRECTORY_MODELS ."/DatabaseModel.class.php");
        $this->db = MyDB::getDatabaseModel();
    }

    /**
     * Vrati obsah uvodni stranky.
     * @param string $pageTitle     Nazev stranky.
     * @return array                Vytvorena data pro sablonu.
     */
    public function show(string $pageTitle):array {
        //// vsechna data sablony budou globalni
        $tplData = [];
        // nazev
        $tplData['title'] = $pageTitle;
        // data pohadek
        $tplData['stories'] = $this->db->getAllIntroductions();

        // vratim sablonu naplnenou daty
        return $tplData;
    }
    
}

   // Pokud je uživatel přihlášen, tak získám jeho data
    if($myDB->isUserLogged()){
        // Získání dat
        $userData = $myDB->getLoggedUserData();
    }



?>
