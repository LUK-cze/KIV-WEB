<?php

namespace kivweb\Controllers;

use kivweb\Models\DatabaseModel;

/*

╔══════════════════════════════════╗
║                                  ║
║             Recenze              ║
║                                  ║
╚══════════════════════════════════╝

Recenze

*/


/**
 * Ovladac zajistujici vypsani uvodni stranky.
 * @package kivweb\Controllers
 */
class recenze_Controller implements IController {

    /** @var DatabaseModel $myDB  Sprava databaze. */
    private $myDB;

    /**
     * Inicializace pripojeni k databazi.
     */
    public function __construct() {
        // inicializace prace s DB
        //require_once (DIRECTORY_MODELS ."/DatabaseModel.class.php");
        $this->myDB = DatabaseModel::getDatabaseModel();
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
    $tplData['stories'] = $this->myDB->getAllIntroductions();




     /* ----------------- DEBUG -----------------
    var_dump($_POST);
    die;
    ----------------- DEBUG ----------------- */ 

    // Zpracování odesílaných formulářů
    if(isset($_POST['action'])){

    
        // Pokud je uživatel už přihlášen tak získám jeho data
        if($this -> myDB->isUserLogged()){
            // ziskam data prihlasenoho uzivatele
            $user = $this -> myDB->getLoggedUserData();
        }

        // vratim sablonu naplnenou daty
        return $tplData;
    
    
        }
    }
}






?>
