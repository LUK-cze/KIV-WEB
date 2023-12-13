<?php

namespace kivweb\Controllers;

use kivweb\Models\DatabaseModel as MyDB;

// nactu rozhrani kontroleru
//require_once(DIRECTORY_CONTROLLERS."/IController.interface.php");


/**
 * Ovladac zajistujici vypsani stranky se spravou uzivatelu.
 * @package kivweb\Controllers
 */
class user_management_Controller implements IController {

    /** @var MyDB $db  Sprava databaze. */
    private $myDB;

    /**
     * Inicializace pripojeni k databazi.
     */
    public function __construct() {
        // inicializace prace s DB
        //require_once (DIRECTORY_MODELS ."/DatabaseModel.class.php");
        $this->myDB = MyDB::getDatabaseModel();
    }

    /**
     * Vrati obsah stranky se spravou uzivatelu.
     * @param string $pageTitle     Nazev stranky.
     * @return array                Vytvorena data pro sablonu.
     */
    public function show(string $pageTitle):array {
        //// vsechna data sablony budou globalni
        $tplData = [];
        // nazev
        $tplData['title'] = $pageTitle;

        // Pokud je uživatel přihlášen, tak získám jeho data
        if($this -> myDB->isUserLogged()){
            // Získání data přihlášeného uživatele
            $userData = $this -> myDB->getLoggedUserData();
        }

        //// neprisel pozadavek na smazani uzivatele?
        var_dump($_POST);
        //die;
        if(!empty($_POST['delete'])
            && isset($_POST['id_uzivatel'])
        ){
            echo "MAZU<br>";
            // provedu smazani uzivatele
            $ok = $this->myDB->deleteUser(intval($_POST['id_uzivatel']));
            if($ok){
                $tplData['delete'] = "OK: Uživatel s ID:$_POST[id_uzivatel] byl smazán z databáze.";
            } else {
                $tplData['delete'] = "CHYBA: Uživatele s ID:$_POST[id_uzivatel] se nepodařilo smazat z databáze.";
            }
        }

    if(!empty($_POST['zmenit'])
        and isset($_POST['id_uzivatel']) && isset($_POST['nove_pravo'])
        ){
            echo "MENIM<br>";

        // updateInTable(string $tableName, string $updateStatementWithValues, string $whereStatement):bool
        $ok = $this->myDB->updateInTable(TABLE_UZIVATEL, $_POST['nove_pravo'], "id_uzivatele = ".$_POST['id_uzivatele']);
        $ok = true;
        //$q = "UPDATE ".TABLE_UZIVATEL." SET id_pravo = ".$_POST['nove_pravo']." WHERE id_uzivatel = ".$_POST['id_uzivatele'];
        echo "MENIM<br>";

        if($ok){
            $tplData['zmena'] = "OK: Uživatel s ID:$_POST[id_uzivatel] byl změněn.";
        } else {
            $tplData['zmena'] = "CHYBA: Uživatele s ID:$_POST[id_uzivatel] se nepodařilo změnit.";
        }
    }

        //// nactu aktualni data uzivatelu
        $tplData['uzivatele'] = $this->myDB->getAllUsers();

        // vratim sablonu naplnenou daty
        return $tplData;
    }

}

?>
