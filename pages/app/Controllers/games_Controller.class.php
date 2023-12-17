<?php

namespace kivweb\Controllers;

use finfo;
use kivweb\Models\DatabaseModel;

// nactu rozhrani kontroleru
//require_once(DIRECTORY_CONTROLLERS."/IController.interface.php");

/**
 * Ovladac zajistujici vypsani uvodni stranky.
 * @package kivweb\Controllers
 */
class games_Controller implements IController {

    /** @var DatabaseModel $db  Sprava databaze. */
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

       
        /*
        // TODO: Opravit nahravaní fotky do batabaze a do adresare 
        var_dump($_POST);
        var_dump($_FILES);
        die;
        */
        

        if(isset($_POST['PridejHru'])){
            if(!empty($_POST["nazev_hry"]) && 
            !empty($_POST["zanr"]) &&
            !empty($_POST["popisek_hry"])){

            $PridaniHry = $this -> myDB->addNewGame($_POST["nazev_hry"], $_POST["zanr"], $_POST["popisek_hry"]);


            if ($PridaniHry){
                header("Location: ?page=update&message=Pridana");
            } else {
                header("Location: ?page=update&message=Nepridana");
            }
            

        }

        if(isset($_POST['uploadFotoHry'])){

            // ---------------------- OŠETŘENÍ FOTKY ----------------------
            // Zde kontroluji errory pokud error kod se nerovná nule (co znamená vše OK = obrázek byl nahrán)
            if($_FILES["GamePic"]["error"] !== UPLOAD_ERR_OK){
                
                switch ($_FILES["GamePic"]["error"]){
                    case UPLOAD_ERR_PARTIAL:
                        header("Location: ?page=hry&message=CastecnyUpload");
                        exit();
                    break;

                    case UPLOAD_ERR_PARTIAL:
                        header("Location: ?page=hry&message=CastecnyUpload");
                        exit();
                    break;

                    case UPLOAD_ERR_NO_FILE:
                        header("Location: ?page=hry&message=NoUpload");
                        exit();
                    break;

                    case UPLOAD_ERR_EXTENSION:
                        header("Location: ?page=hry&message=ExtensionUploadERR");
                        exit();
                    break;

                    case UPLOAD_ERR_EXTENSION:
                        header("Location: ?page=hry&message=ExtensionUploadERR");
                        exit();
                    break;

                    case UPLOAD_ERR_NO_TMP_DIR:
                        header("Location: ?page=hry&message=ZadnyTMPAdresar");
                        exit();
                    break;

                    case UPLOAD_ERR_CANT_WRITE:
                        header("Location: ?page=hry&message=NesloZapsatUpload");
                        exit();
                    break;

                    default:
                        exit("Nastala neznámá chyba");
                    break;
                }
            }

            
        // Kontrola, že fotka má maximální velikost 10 MB (10485760 B)
        if($_FILES["GamePic"]["size"] > 10485760){
            header("Location: ?page=hry&message=MocVelkyUpload");
            exit();
        }

        $finfo = new finfo(FILEINFO_MIME_TYPE);

        $fotka_typ = $finfo->file($_FILES["GamePic"]["tmp_name"]);



        $povolene_typy = ["image/gif", "image/png", "image/jpeg"];

        if (! in_array($_FILES["GamePic"]["type"], $povolene_typy)){
            header("Location: ?page=hry&message=SpatnyTypUploadu");
            exit();
        }


        // Přesování souboru na správné místo 
        // Ošetření útoků
        $pathinfo = pathinfo($_FILES["GamePic"]["name"]);

        $base = $pathinfo["filename"];

        $base = preg_replace("/[^\w-]/", "_", $base);

        $filename = $base . "." . $pathinfo["extension"];
        // Konec ošetření proti škodlivím znakům 

        $destinace = __DIR__."/../../../img/game_panel/".$filename;

        // Ošetření nahrávaní fotky, která se už v databázi nachází 
        $i = 1;

        while(file_exists($destinace)){
            $filename = $base . "($i)." . $pathinfo["extension"];
            $destinace = __DIR__."/../../../img/game_panel/".$filename;
            
            $i++;
        }
            

        if(!move_uploaded_file($_FILES["GamePic"]["tmp_name"], $destinace)){
            header("Location: ?page=hry&message=NesloPresunoutUpload");
        }

        // Když je vše OK
        if (!empty($filename)){
            $res = $this -> myDB->addFoto($_POST["nazev_hry"], $filename);
            header("Location: ?page=hry&message=UploadProsel");
        } else {
            header("Location: ?page=hry&message=DatabazeNeproslaUpload");
        }

    } else {
        echo "NEUPLNE PARAMETRY";
        die;
        header("Location: ?page=hry&message=NeuplneAtributy");
    }
  }


        //// nactu aktualni data her
        $tplData['hry'] = $this->myDB->getAllGames();

        $tplData['gameData'] = $this -> myDB -> getAllGames();

        // vratim sablonu naplnenou daty
        return $tplData;
    }
    
}

?>
