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

use finfo;
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

        
        // Pokud je uživatel už přihlášen tak získám jeho data
        if($this -> myDB->isUserLogged()){
            // ziskam data prihlasenoho uzivatele
            $userData = $this -> myDB->getLoggedUserData();
        }


       
        
        
       // echo var_dump($userData);
       /*
        echo " <br> V CONTROLLERU (POST)----------------------------------------------------<br>";
        echo var_dump($_POST);
        echo " <br> V CONTROLLERU (SESSION)----------------------------------------------------<br>";
        echo var_dump($_SESSION);
        echo " <br> V CONTROLLERU (USER DATA)----------------------------------------------------<br>";
        echo var_dump($userData);
        die;
        */
        
                // Zpracování odeslaných formulářů
                if(isset($_POST['action'])){
                    // Kontrola, jestli mám všchny požadované hodnoty
                    if(isset($_SESSION['id_uzivatel']) 
                    && isset($_POST['heslo']) 
                    && !empty($_POST['heslo_puvodni']) 
                    && isset($_POST['heslo2'])
                    && isset($_POST['jmeno']) 
                    && isset($_POST['prijmeni']) && isset($_POST['email'])
                    && password_verify($_POST['heslo_puvodni'], $userData['heslo'])
                    && !empty($_POST['heslo'])
                    && !empty($_POST['jmeno']) 
                    && !empty($_POST['email'])
                    && $_SESSION['id_pravo'] > 0
                    // Je současným uživatelem a zadal správné heslo? 
                    && $_SESSION['id_uzivatel'] == $userData['id_uzivatel']
                    ){
                        $heslo = $_POST['heslo'];
                        $hash = password_hash($heslo, PASSWORD_BCRYPT);

                        // Bylo zadáno správné současné heslo?
                        if(password_verify($_POST['heslo_puvodni'], $userData['heslo'])){
                            // Jestli ano tak uložím všchny atributy do batabáze (uživatele)
                            $res = $this -> myDB->updateUser($_SESSION['id_uzivatel'], $_POST['login'], $hash, $_POST['jmeno'], $_POST['prijmeni'], $_POST['email'], $_SESSION['id_pravo']);
                            // Kontrola jestli byl uložen
                            if($res){
                                //echo "OK: Uživatel byl upraven.";
                                // Zde načítam znovu jeho uložená data (už upravená)
                                $userData = $this -> myDB->getLoggedUserData();

                                //echo "OK: Uživatel byl přihlášen.";
                                header("Location: ?page=update&message=upraven");
                            } else {
                                //echo "ERROR: Upravení uživatele se nezdařilo.";
                                header("Location: ?page=update&message=neupraven");
                            }
                        } else {
                            // Chyba
                            //echo "ERROR: Zadané současné heslo uživatele není správné.";
                            header("Location: ?page=update&message=NespravneHeslo");
                        }
                    } else {
                        // Nebyli zadené všchny atributy
                        //echo "ERROR: Nebyly přijaty požadované atributy uživatele.";
                        header("Location: ?page=update&message=NespravneAtributy");
                    }
                    echo "<br><br>";

                }

                if(isset($_POST['upload'])){
                    // Zde kontroluji errory pokud error kod se nerovná nule (co znamená vše OK = obrázek byl nahrán)
                    if($_FILES["ProfilePic"]["error"] !== UPLOAD_ERR_OK){
                        
                        switch ($_FILES["ProfilePic"]["error"]){
                            case UPLOAD_ERR_PARTIAL:
                                header("Location: ?page=update&message=CastecnyUpload");
                                exit();
                            break;

                            case UPLOAD_ERR_PARTIAL:
                                header("Location: ?page=update&message=CastecnyUpload");
                                exit();
                            break;

                            case UPLOAD_ERR_NO_FILE:
                                header("Location: ?page=update&message=NoUpload");
                                exit();
                            break;

                            case UPLOAD_ERR_EXTENSION:
                                header("Location: ?page=update&message=ExtensionUploadERR");
                                exit();
                            break;

                            case UPLOAD_ERR_EXTENSION:
                                header("Location: ?page=update&message=ExtensionUploadERR");
                                exit();
                            break;

                            case UPLOAD_ERR_NO_TMP_DIR:
                                header("Location: ?page=update&message=ZadnyTMPAdresar");
                                exit();
                            break;

                            case UPLOAD_ERR_CANT_WRITE:
                                header("Location: ?page=update&message=NesloZapsatUpload");
                                exit();
                            break;

                            default:
                                exit("Nastala neznámá chyba");
                            break;
                        }
                    }

                    
                // Kontrola, že fotka má maximální velikost 10 MB (10485760 B)
                if($_FILES["ProfilePic"]["size"] > 10485760){
                    header("Location: ?page=update&message=MocVelkyUpload");
                    exit();
                }


                $finfo = new finfo(FILEINFO_MIME_TYPE);

                $fotka_typ = $finfo->file($_FILES["ProfilePic"]["tmp_name"]);



                $povolene_typy = ["image/gif", "image/png", "image/jpeg"];

                if (! in_array($_FILES["ProfilePic"]["type"], $povolene_typy)){
                    header("Location: ?page=update&message=SpatnyTypUploadu");
                    exit();
                }


                // Přesování souboru na správné místo 
                // Ošetření útoků
                $pathinfo = pathinfo($_FILES["ProfilePic"]["name"]);

                $base = $pathinfo["filename"];

                $base = preg_replace("/[^\w-]/", "_", $base);

                $filename = $base . "." . $pathinfo["extension"];
                // Konec ošetření proti škodlivím znakům 

                $destinace = __DIR__."/../../../img/profile_pictures/".$filename;

                // Ošetření nahrávaní fotky, která se už v databázi nachází 
                $i = 1;

                while(file_exists($destinace)){
                    $filename = $base . "($i)." . $pathinfo["extension"];
                    $destinace = __DIR__."/../../../img/profile_pictures/".$filename;
                    
                    $i++;
                }
                    

                if(!move_uploaded_file($_FILES["ProfilePic"]["tmp_name"], $destinace)){
                    header("Location: ?page=update&message=NesloPresunoutUpload");
                }

                // Když je vše OK
                if (!empty($filename)){
                    $res = $this -> myDB->addFoto($_SESSION["id_uzivatel"], $filename);
                    header("Location: ?page=update&message=UploadProsel");
                } else {
                    header("Location: ?page=update&message=DatabazeNeproslaUpload");
                }


                

          }

            // ziskam nazev prava uzivatele, abych ho mohl vypsat
            if($this -> myDB->isUserLogged()){
                $tplData['right'] = $this -> myDB->getRightNameById($_SESSION["id_pravo"]);
            }
    
        // vratim sablonu naplnenou daty
        return $tplData;
    }
    
}





?>
