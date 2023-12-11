<?php

namespace kivweb\Controllers;

use kivweb\Models\DatabaseModel;

/*

╔══════════════════════════════════╗
║                                  ║
║              Login               ║
║                                  ║
╚══════════════════════════════════╝

Zde je úvodní stránka s loginem.
Je zde i nějaký obsah co se úkáže uživateli a když je uživatel přihlášen,
vypíší se mu jeho informace 

*/

    // Načítání souboru s databázovými funkcemi
    //require_once("MyDatabase.class.php");
    //$myDB = new MyDatabase();

// nactu rozhrani kontroleru
//require_once(DIRECTORY_CONTROLLERS."/IController.interface.php");

/**
 * Ovladac zajistujici vypsani uvodni stranky.
 * @package kivweb\Controllers
 */
class user_login_Controller implements IController {

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
        // přihlášení, pokud je vloženo login(username) a heslo
        if($_POST['action'] == 'login' && isset($_POST['login']) && isset($_POST['heslo'])){
        
            
        $hash = $this -> myDB -> getPassByLogin($_POST['login']);


        if(password_verify($_POST['heslo'], $hash)){

            echo "verify prosel";

                // pokusim se prihlasit uzivatele
                $res = $this -> myDB->userLogin($_POST['login'], $hash);
                if($res){
                    echo "OK: Uživatel byl přihlášen.";
                    header("Location: ?page=login#about");
                    exit;
                } else {
                    echo "ERROR: Přihlášení uživatele se nezdařilo.";
                    exit;
                }
            }
            echo "verify neprosel";
        }
            // Odhlášení
            else if($_POST['action'] == 'logout'){
                $this -> myDB->userLogout();
                echo "OK: Uživatel byl odhlášen.";
            }
            // Když se něco pokazí
            else {
                echo "WARNING: Neznámá akce.";
            }
            echo "<br>";
            die;
        }
    
        // Pokud je uživatel už přihlášen tak získám jeho data
        if($this -> myDB->isUserLogged()){
            // ziskam data prihlasenoho uzivatele
            $user = $this -> myDB->getLoggedUserData();
        }

        // vratim sablonu naplnenou daty
        return $tplData;
    }
    
}






?>
