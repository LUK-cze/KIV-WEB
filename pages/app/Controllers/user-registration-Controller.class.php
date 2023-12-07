<?php

namespace kivweb\Controllers;

use kivweb\Models\DatabaseModel;

// nactu rozhrani kontroleru
//require_once(DIRECTORY_CONTROLLERS."/IController.interface.php");

/**
 * Ovladac zajistujici vypsani uvodni stranky.
 * @package kivweb\Controllers
 */
class UserRegistrationController implements IController {

    /** @var DatabaseModel $db  Sprava databaze. */
    private $db;

    /**
     * Inicializace pripojeni k databazi.
     */
    public function __construct() {
        // inicializace prace s DB
        //require_once (DIRECTORY_MODELS ."/DatabaseModel.class.php");
        $this->db = DatabaseModel::getDatabaseModel();
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

// zpracovani formulare pro registraci uzivatele
if(!empty($_POST['action'])){
    // mam vsechny pozadovane hodnoty?
    if(!empty($_POST['login']) && !empty($_POST['heslo']) && !empty($_POST['heslo2'])
        && !empty($_POST['jmeno']) && !empty($_POST['prijmeni']) && !empty($_POST['email']) && !empty($_POST['pravo'])
        && $_POST['heslo'] == $_POST['heslo2']
    ){
        // --- Zde hashuji heslo. ---  
        // Nepoužívám md_5. Ikdyž je celkem dobrý dneska jde velmi lehce prolomit.
        // Proto používám BCRYPT 
        // Poznámka: Pro BCRYPT je potřeba délka hesla v databázi minimálně 60.
        // Jinak se nám do sloupečku s heslem ani nevyjde.
        $heslo = $_POST['heslo'];
        $hash = password_hash($heslo, PASSWORD_BCRYPT);


        // Ukládání do databáze
        $res = $myDB->addNewUser($_POST['login'], $hash, $_POST['jmeno'], $_POST['prijmeni'], $_POST['email'], $_POST['pravo']);
        // Kontrola
        if($res){
            echo "OK: Uživatel byl přidán do databáze.";
        } else {
            echo "ERROR: Uložení uživatele se nezdařilo.";
        }
    } else {
        // Nebyli přijaté všchny atrituty (Nemělo by se to stát, protože toto kontoluji v HTML)
        echo "ERROR: Nebyly přijaty požadované atributy uživatele.";
    }
    echo "<br><br>";
}

?>
