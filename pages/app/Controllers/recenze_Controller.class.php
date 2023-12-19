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

     /* ----------------- DEBUG -----------------
    var_dump($_POST);
    die;
    ----------------- DEBUG ----------------- */ 

    // Zpracování odesílaných formulářů

    if(isset($_POST['recenze'])){
    if(!empty($_POST["hra"]) && !empty($_POST["recenze_text"]) && !empty($_POST["hodnoceni"])){
        $datumCasRecenze = date("Y-m-d H:i:s"); // Formát "Y-m-d H:i:s" znamená rok-měsíc-den hodina:minuta:sekunda



        $pridatRecenzi = $this -> myDB->addNewRecenze($_POST["hra"], $_POST["id_hry"], $_SESSION["id_uzivatel"], $_SESSION["login"], $_POST["hodnoceni"], $_POST["recenze_text"], $datumCasRecenze);

            if($pridatRecenzi){
                header("Location: ?page=recenze&message=HraPridana");
            } else {
                header("Location: ?page=recenze&message=HraNepridana");
                exit();
            }
        } else {
            header("Location: ?page=recenze&message=MaloAtributu");
            exit();
        }
    }
       
            $tplData['gameData'] = $this -> myDB -> getAllGames();
            $tplData["AllRecenze"] = $this -> myDB -> getAllRecenze();

            // vratim sablonu naplnenou daty
            return $tplData;
    }
}






?>
