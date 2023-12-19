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


// --------------------------------- DELETE ---------------------------------
        if(!empty($_POST['delete-uzivatel'])
            && isset($_POST['id_uzivatel'])
        ){
            // provedu smazani uzivatele
            $ok = $this->myDB->deleteUser(intval($_POST['id_uzivatel']));
            if($ok){
                header("Location: ?page=sprava&message=SmazanUzivatel");
            } else {
                header("Location: ?page=sprava&message=NesmazanUzivatel");
            }
        }

        if(!empty($_POST['delete-hra'])
             && isset($_POST['id_hry'])
         ){
            // provedu smazani uzivatele
            $ok = $this->myDB->deleteGame(intval($_POST['id_hry']));
            if($ok){
                header("Location: ?page=sprava&message=SmazanaHra");
            } else {
                header("Location: ?page=sprava&message=NesmazanaHra");
            }
        }

            if(!empty($_POST['delete-recenze'])
            && isset($_POST['id_recenze'])
        ){
            // provedu smazani uzivatele
            $ok = $this->myDB->deleteRecenze(intval($_POST['id_recenze']));
            if($ok){
                header("Location: ?page=sprava&message=SmazanaRecenze");
            } else {
                header("Location: ?page=sprava&message=NesmazanaRecenze");
            }
        }

// --------------------------------- KONEC DELETE ---------------------------------

        if (!empty($_POST['zmenit']) && isset($_POST['id_uzivatel']) && isset($_POST['nove_pravo'])) {
                
            $zmenaPrava = $this->myDB->updatePravo($_POST['id_uzivatel'], $_POST['nove_pravo']);
            ?>
            <script>
                function VypisZpravy(status, userId) {
                    alert(status + ": Uživatel s ID " + userId + " byl změněn.");
                }
        
                // Jinak zapsaná if a else. Jen pro ukázku
                <?php if ($zmenaPrava) : ?>
                    VypisZpravy("OK", <?php echo $_POST['id_uzivatel']; ?>);
                <?php
                else :
                ?>
                    VypisZpravy("CHYBA", <?php echo $_POST['id_uzivatel']; ?>);
                <?php
                endif; ?>
            </script>
        <?php
        }

 
        //// nactu aktualni data uzivatelu
        $tplData['uzivatele'] = $this->myDB->getAllUsers();
        $tplData['hry'] = $this->myDB->getAllGames();
        $tplData['recenze'] = $this->myDB->getAllRecenze();

        

        // vratim sablonu naplnenou daty
        return $tplData;

    }

}

?>
