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

use kivweb\Models\DatabaseModel as myDB;
use kivweb\Models\DatabaseModel;

// nactu rozhrani kontroleru
//require_once(DIRECTORY_CONTROLLERS."/IController.interface.php");

/**
 * Ovladac zajistujici vypsani uvodni stranky.
 * @package kivweb\Controllers
 */
class user_update_Controller implements IController {

    /** @var MyDB $db  Sprava databaze. */
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

        
        // Pokud je uživatel už přihlášen tak získám jeho data
        if($this -> myDB->isUserLogged()){
            // ziskam data prihlasenoho uzivatele
            $userData = $this -> myDB->getLoggedUserData();
        }

        password_verify($_POST['heslo_puvodni'], $userData['heslo']);

       
        
        
       // echo var_dump($userData);
        echo " <br> V CONTROLLERU (POST)----------------------------------------------------<br>";
        echo var_dump($_POST);
        echo " <br> V CONTROLLERU (SESSION)----------------------------------------------------<br>";
        echo var_dump($_SESSION);
        echo " <br> V CONTROLLERU (USER DATA)----------------------------------------------------<br>";
        echo var_dump($userData);
        die;
        
        
        
                // Zpracování odeslaných formulářů
                if(isset($_POST['action'])){
                    // Kontrola, jestli mám všchny požadované hodnoty
                    if(isset($_SESSION['id_uzivatel']) 
                    && isset($_POST['heslo']) 
                && !empty($_POST['heslo_puvodni']) 
                && isset($_POST['heslo2'])
                        && isset($_POST['jmeno']) 
                        && isset($_POST['prijmeni']) && isset($_POST['email'])
                        && $_POST['heslo'] == $_POST['heslo2']
                        && $_POST['heslo'] != ""
                         && $_POST['jmeno'] != "" && $_POST['email'] != ""
                        && $_SESSION['pravo'] > 0
                        // Je současným uživatelem a zadal správné heslo? 
                        && $_SESSION['id_uzivatel'] == $userData['id_uzivatel']
                    ){
                        // Bylo zadáno správné současné heslo?
                        if(password_verify($_POST['heslo_puvodni'], $userData['heslo'])){
                            // Jestli ano tak uložím všchny atributy do batabáze (uživatele)
                            $res = $this -> myDB->updateUser($_SESSION['id_uzivatel'], $_POST['login'], $_POST['heslo'], $_POST['jmeno'], $_POST['prijmeni'], $_POST['email'], $_SESSION['pravo']);
                            // Kontrola jestli byl uložen
                            if($res){
                                echo "OK: Uživatel byl upraven.";
                                // Zde načítam znovu jeho uložená data (už upravená)
                                $userData = $this -> myDB->getLoggedUserData();
                            } else {
                                echo "ERROR: Upravení uživatele se nezdařilo.";
                            }
                        } else {
                            // Chyba
                            echo "ERROR: Zadané současné heslo uživatele není správné.";
                        }
                    } else {
                        // Nebyli zadené všchny atributy
                        echo "ERROR: Nebyly přijaty požadované atributy uživatele.";
                    }
                    echo "<br><br>";
                }


    
        // vratim sablonu naplnenou daty
        return $tplData;
    }
    
}





?>
