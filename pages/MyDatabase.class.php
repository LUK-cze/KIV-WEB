<?php

/*
╔══════════════════════════════════╗
║                                  ║
║    Třída pro práci s databází    ║
║                                  ║
╚══════════════════════════════════╝

Zde si tvoříme fukce, se ktrýmy pracuje s databází

*/
class MyDatabase {
    /*
      MyDatabase constructor.
      Inicializace připojení k databazi a pokud ma být spravovano přihlašení uživatele, tak i vlastni objekt pro spravu session.
    */

    private $pdo;

    /** @var MySession $mySession  Vlastní objekt pro správu session. */
    private $mySession;
    /** @var string KEY_USER Klíč pro data uživatele, která jsou uložena v session. */
    private const KEY_USER = "current_user_id";


    public function __construct(){
        // Inicializace připojení k databázi
        $this->pdo = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASS);
        $this->pdo->exec("set names utf8"); // Toto nemusím využívat v lokální databázi. Co to dělá, jen to aby mi byla předávána data v databázi v utf8
        // Nastavení PDO error módu na výjimku, tj. každá chyba při práci s PDO bude výjimkou
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        require_once("MySessions.class.php");
        $this->mySession = new MySession();
    }


    // --- Obecne funkce ---

    
    //Provede dotaz a bud vrati získana data, nebo při chybe je vypíše a vratí null.
    private function executeQueryWithoutException(string $dotaz){
        // Vykonání dotazu
        $res = $this->pdo->query($dotaz);
        // Pokud není false, tak vrátím výsledek, jinak null
        if ($res != false) {
            // Zde je OK
            return $res;
        } else {
            // Zde je false - vypíšu příslušnou chybu a vrátím null
            $error = $this->pdo->errorInfo();
            echo $error[2];
            return null;
        }
    }

    /*
       Provede dotaz a bud vrátí získaná data, nebo při chybe je vypíše a vratí null.
       Varianta, pokud je pouzit PDO::ERRMODE_EXCEPTION

    *  @param string $dotaz        SQL dotaz.
    *  @return PDOStatement|null    Vysledek dotazu.
    */
   private function executeQuery(string $dotaz){
       // vykonam dotaz
       try {
           $res = $this->pdo->query($dotaz);
           return $res;
       } catch (PDOException $ex){
           echo "Nastala výjimka: ". $ex->getCode() ."<br>"
               ."Text: ". $ex->getMessage();
           return null;
       }
   }

    /**
     * Čtení z tabulky
     *
     * @param string $tableName         Název tabulky.
     * @param string $whereStatement    Připadné omezení na získaný řádek tabulky. Default "".
     * @param string $orderByStatement  Připadné řazení získaných řádek tabulky. Default "".
     * @return array                    Vrací pole získaných řádek tabulky.
     */
    public function selectFromTable(string $tableName, string $colName = "", string $whereStatement = "", string $orderByStatement = ""):array {
        
        if ($colName == ""){
            $colName = "*";
        }

        // slozim dotaz
        $q = "SELECT $colName FROM ".$tableName
            .(($whereStatement == "") ? "" : " WHERE $whereStatement") // Když nemám whereStatement tak ho nebudu vyplňovat, ale pokud jo tak S MEZEROU dopňím WHERE a kde
            .(($orderByStatement == "") ? "" : " ORDER BY $orderByStatement"); // To samý, ale s orderem
        // Provedu ho a vratim vysledek
        $obj = $this->executeQuery($q);
        // Pokud je null, tak vratim prazdne pole
        if($obj == null){
            return [];
        }
        return $obj->fetchAll();
    }

    /**
     * Vložení do tabulky
     *
     * @param string $tableName         Název tabulky.
     * @param string $insertStatement   Text s názvy sloupců pro insert.
     * @param string $insertValues      Text s hodnotami pro příslušné sloupce.
     * @return bool                     Vlozeno v pořádku?
     */
    public function insertIntoTable(string $tableName, string $insertStatement, string $insertValues):bool {
        // slozim dotaz
        $q = "INSERT INTO $tableName($insertStatement) VALUES ($insertValues)";
        // provedu ho a vratim uspesnost vlozeni
        $obj = $this->executeQuery($q);
        // pokud ($obj == null), tak vratim false
        return ($obj != null);
    }

    /**
     * Jednoduchá úprava řádku databázové tabulky.
     *
     * @param string $tableName                     Nazev tabulky.
     * @param string $updateStatementWithValues     Cela cast updatu s hodnotami.
     * @param string $whereStatement                Cela cast pro WHERE.
     * @return bool                                 Upraveno v poradku?
     */
    public function updateInTable(string $tableName, string $updateStatementWithValues, string $whereStatement):bool {
        // slozim dotaz
        $q = "UPDATE $tableName SET $updateStatementWithValues WHERE $whereStatement";
        // provedu ho a vratim vysledek
        $obj = $this->executeQuery($q);
        // pokud ($obj == null), tak vratim false
        return ($obj != null);
    }

    /**
     * Dle zadane podminky maze radky v prislusne tabulce.
     *
     * @param string $tableName         Nazev tabulky.
     * @param string $whereStatement    Podminka mazani.
     * @return bool
     */
    public function deleteFromTable(string $tableName, string $whereStatement):bool {
        // slozim dotaz
        $q = "DELETE FROM $tableName WHERE $whereStatement";
        // provedu ho a vratim vysledek
        $obj = $this->executeQuery($q);
        // pokud ($obj == null), tak vratim false
        return ($obj != null);
    }

    ///////////////////  KONEC: Obecne funkce  ////////////////////////////////////////////

    ///////////////////  Konkretni funkce  ////////////////////////////////////////////
    // Tyto funkce jsou pro práci s databází a braní z ní dat a nebo input do databáze

    /**
     * Ziskani zaznamu vsech uzivatelu aplikace.
     *
     * @return array    Pole se vsemi uzivateli.
     */
    public function getAllUsers(){
        // ziskam vsechny uzivatele z DB razene dle ID a vratim je
        $users = $this->selectFromTable(TABLE_UZIVATEL, "", "", "id_uzivatel");
        return $users;
    }

    /**
     * Ziskani zaznamu vsech prav uzivatelu.
     *
     * @return array    Pole se vsemi pravy.
     */
    public function getAllRights(){
        // ziskam vsechna prava z DB razena dle ID a vratim je
        $rights = $this->selectFromTable(TABLE_PRAVO, "", "", "vaha ASC, nazev ASC");
        return $rights;
    }

    /**
     * Ziskani konkretniho prava uzivatele dle ID prava.
     *
     * @param int $id       ID prava.
     * @return array        Data nalezeneho prava.
     */
    public function getRightById(int $id){
        // ziskam pravo dle ID
        $rights = $this->selectFromTable(TABLE_PRAVO, "", "", "id_pravo=$id");
        if(empty($rights)){
            return null;
        } else {
            // vracim prvni nalezene pravo
            return $rights[0];
        }
    }

    public function getPassByLogin(string $login){
        // Ziskam heslo dle loginu
        // Toto musim abych si mohl prihlasit kdyz pouzivam hesh

        $pass = $this->selectFromTable(TABLE_UZIVATEL, 'heslo', "login = $login");

        if(empty($pass)){
            return null;
        } else {
            // vracim prvni nalezene pravo
            return $pass[0];
        }
    }

    /**
     * Vytvoreni noveho uzivatele v databazi.
     *
     * @param string $login     Login.
     * @param string $jmeno     Jmeno.
     * @param string $email     E-mail.
     * @param int $idPravo      Je cizim klicem do tabulky s pravy.
     * @return bool             Vlozen v poradku?
     */
    public function addNewUser(string $login, string $heslo, string $jmeno, string $prijmeni, string $email, int $idPravo = 4){
        // hlavicka pro vlozeni do tabulky uzivatelu
        $insertStatement = "login, heslo, jmeno, prijmeni, email, id_pravo";
        // hodnoty pro vlozeni do tabulky uzivatelu
        $insertValues = "'$login', '$heslo', '$jmeno', '$prijmeni', '$email', $idPravo";
        // provedu dotaz a vratim jeho vysledek
        return $this->insertIntoTable(TABLE_UZIVATEL, $insertStatement, $insertValues);
    }

    /**
     * Uprava konkretniho uzivatele v databazi.
     *
     * @param int $idUzivatel   ID upravovaneho uzivatele.
     * @param string $login     Login.
     * @param string $heslo     Heslo.
     * @param string $jmeno     Jmeno.
     * @param string $prijmeni  Příjmení
     * @param string $email     E-mail.
     * @param int $idPravo      ID prava.
     * @return bool             Bylo upraveno?
     */
    public function updateUser(int $idUzivatel, string $login, string $heslo, string $jmeno, string $prijmeni, string $email, int $idPravo){
        // slozim cast s hodnotami
        $updateStatementWithValues = "login='$login', heslo='$heslo', jmeno='$jmeno', prijmeni='$prijmeni', email='$email', id_pravo='$idPravo'";
        // podminka
        $whereStatement = "id_uzivatel=$idUzivatel";
        // provedu update
        return $this->updateInTable(TABLE_UZIVATEL, $updateStatementWithValues, $whereStatement);
    }

    ///////////////////  KONEC: Konkretni funkce  ////////////////////////////////////////////

    ///////////////////  Sprava prihlaseni uzivatele  ////////////////////////////////////////

    /**
     * Overi, zda muse byt uzivatel prihlasen a pripadne ho prihlasi.
     *
     * @param string $login     Login uzivatele.
     * @param string $heslo     Heslo uzivatele.
     * @return bool             Byl prihlasen?
     */
    public function userLogin(string $login, string $heslo):bool {



        // ziskam uzivatele z DB - primo overuju login i heslo
        $where = "login='$login' AND heslo='$heslo'";
        $user = $this->selectFromTable(TABLE_UZIVATEL, "", $where);
        // ziskal jsem uzivatele(Jestli zde vůbec nějakýho najdu)
        if(count($user)){
            // ziskal - ulozim ID prvniho nalezeneho uzivatele do session
            $this->mySession->addSession(self::KEY_USER, $user[0]['id_uzivatel']);
            return true;
        }
        // neziskal jsem uzivatele(Zádného uživatele jsem nenašel)
        return false;
    }

    /**
     * Odhlasi soucasneho uzivatele.
     */
    public function userLogout(){
        $this->mySession->removeSession(self::KEY_USER);
    }

    /**
     * Test, zda je nyni uzivatel prihlasen.
     *
     * @return bool     Je prihlasen?
     */
    public function isUserLogged():bool {
        return $this->mySession->isSessionSet(self::KEY_USER);
    }

    /**
     * Pokud je uzivatel prihlasen, tak vrati jeho data,
     * ale pokud nebyla v session nalezena, tak vypise chybu.
     *
     * @return mixed|null   Data uzivatele nebo null.
     */
    public function getLoggedUserData(){
        if($this->isUserLogged()){
            // ziskam data uzivatele ze session
            $userId = $this->mySession->readSession(self::KEY_USER);
            // pokud nemam data uzivatele, tak vypisu chybu a vynutim odhlaseni uzivatele
            if($userId == null) {
                // nemam data uzivatele ze session - vypisu jen chybu, uzivatele odhlasim a vratim null
                echo "SEVER ERROR: Data přihlášeného uživatele nebyla nalezena, a proto byl uživatel odhlášen.";
                $this->userLogout();
                // vracim null
                return null;
            }
            // nactu data uzivatele z databaze
            $userData = $this->selectFromTable(TABLE_UZIVATEL, "", "id_uzivatel=$userId");
            // mam data uzivatele?
            if(empty($userData)){
                // nemam - vypisu jen chybu, uzivatele odhlasim a vratim null
                echo "ERROR: Data přihlášeného uživatele se nenachází v databázi (mohl být smazán), a proto byl uživatel odhlášen.";
                $this->userLogout();
                return null;
            }
            // protoze DB vraci pole uzivatelu, tak vyjmu jeho prvni polozku a vratim ziskana data uzivatele
            return $userData[0];
        }
        // uzivatel neni prihlasen - vracim null
        return null;
    }


    // Tato funkce přidává fotku uživateli
    public function addFoto(int $idUzivatel, string $foto){
        // Update fotky (defaultně je null)
        $updateStatementWithValues = "foto='$foto'";
        // Podmínka, lterá zjistí pro jakého uživatele to je pomocí ID
        $whereStatement = "id_uzivatel=$idUzivatel";
        // Nahrání fotky do databáze
        return $this->updateInTable(TABLE_UZIVATEL, $updateStatementWithValues, $whereStatement);
    }

    // Funkce pro vložení hry do databáze
    public function addNewGame(string $nazev_hry, int $id_zanry, string $foto_hry, string $popisek_hry){
        // Hlavička pro vložení úživatelů do tabulky
        $insertStatement = "nazev_hry, id_zanru, foto_hry, popisek_hry";
        // Hodnoty pro vložení do tabulky s hrami
        $insertValues = "'$nazev_hry', '$id_zanry', '$foto_hry', '$popisek_hry'";
        //Provedu výsledek a vrátím ho
        return $this->insertIntoTable(TABLE_UZIVATEL, $insertStatement, $insertValues);
    }

    ///////////////////  KONEC: Sprava prihlaseni uzivatele  ////////////////////////////////////////

}
?>
