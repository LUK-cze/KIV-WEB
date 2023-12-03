<?php
///////////////////////////////////////////////////////////////////////////
/////////// Sablona pro zobrazeni stranky se spravou uzivatelu  ///////////
///////////////////////////////////////////////////////////////////////////

//// pozn.: sablona je samostatna a provadi primy vypis do vystupu:
// -> lze testovat bez zbytku aplikace.
// -> pri vyuziti Twigu se sablona obejde bez PHP.

/*
////// Po zakomponovani do zbytku aplikace bude tato cast odstranena/zakomentovana  //////
//// UKAZKA DAT: Uvod bude vypisovat informace z tabulky, ktera ma nasledujici sloupce:
// id, date, author, title, text
$tplData['title'] = "Sprava uživatelů (TPL)";
$tplData['users'] = [
    array("id_user" => 1, "first_name" => "František", "last_name" => "Noha",
            "login" => "frnoha", "password" => "Tajne*Heslo", "email" => "fr.noha@ukazka.zcu.cz", "web" => "www.zcu.cz")
];
$tplData['delete'] = "Úspěšné mazání.";
define("DIRECTORY_VIEWS", "../Views");
const WEB_PAGES = array(
    "uvod" => array("title" => "Sprava uživatelů (TPL)")
);
////// KONEC: Po zakomponovani do zbytku aplikace bude tato cast odstranena/zakomentovana  //////
*/

//// vypis sablony
// urceni globalnich promennych, se kterymi sablona pracuje
global $tplData;

?>
<!-- ------------------------------------------------------------------------------------------------------- -->
<div class="alert-info">TemplateBased</div>

<!-- Vypis obsahu sablony -->
<?php
// muze se hodit:
//<form method='post'>
//    <input type='hidden' name='id_user' value=''>
//    <button type='submit' name='action' value='delete'>Smazat</button>
//</form>
?>

<?php
/*

╔══════════════════════════════════╗
║                                  ║
║          USER managment          ║
║                                  ║
╚══════════════════════════════════╝

Zde můžou uživatelé s dostatečným právem upravovat zaregistrovane uživatele
*/

    // Načtení souboru s funkcemi k práci s databází 
    //require_once("MyDatabase.class.php"); // ZAJÍMAVOST: Zde nemusím používat závorky, ale je dobré je tu mít
    //$myDB = new MyDatabase();

    // Načtení hlavičky
    require_once("ZakladHTML.class.php");
    ZakladHTML::createHeader("Správa uživatelů");

    // Pokud je uživatel přihlášen, tak získám jeho data
    if($myDB->isUserLogged()){
        // Získání data přihlášeného uživatele
        $userData = $myDB->getLoggedUserData();
    }

    // 😡 --- PRO NEPŘIHLÁŠENÉ UŽIVATELE --- 😡
    if(!$myDB->isUserLogged()){
?>
        <div>
            <b>Tato strána je dostupná pouze přihlášeným uživatelům.</b>
        </div>
<?php
    // 😡 --- KONEC: PRO NEPŘIHLÁŠENÉ UŽIVATELE --- 😡
    } else if($userData['id_pravo'] > 2) {
    // ------------------- PRO PŘIHLÁŠÉNE UŽIVATELE BEZ PRÁVA ADMIN -------------------
?>
        <div>
            <b>Správu uživatelů mohou provádět pouze uživatelé s právem Administrátor.</b>
        </div>
<?php
    //------------------- KONEC: PRO PŘIHLÁŠÉNE UŽIVATELE BEZ PRÁVA ADMIN -------------------
    } else {
    // 🤑 --- PRO PŘIHLÁŠÉNE UŽIVATELE S PRÁVEM ADMIN --- 🤑

        // Zpracování formuláře pro smazání uživatele
        if(!empty($_POST['id_uzivatel'])){
            // Smazání daného uživatele z databáze
            $res = $myDB->deleteFromTable(TABLE_UZIVATEL, "id_uzivatel='$_POST[id_uzivatel]'");
            // Vyýsledek smazání
            if($res){
                echo "OK: Uživatel byl smazán z databáze.";
            } else {
                echo "ERROR: Smazání uživatele se nezdařilo.";
            }
        }

        // Získám data všch uživatelů
        // Dávám ho až sem aby se aktulizovala tabulka, když někoho smažu
        $users = $myDB->getAllUsers();
?>
        <h2>Seznam uživatelů</h2>
        <table border="1">
            <tr><th>ID</th><th>Login</th><th>Jméno</th><th>E-mail</th><th>Právo</th><th>Akce</th></tr>
            <?php
                // Pocházení uživatelů a jejich vypsání
                foreach ($users as $u) {
                    echo "<tr><td>$u[id_uzivatel]</td><td>$u[login]</td><td>$u[jmeno]</td><td>$u[prijmeni]</td><td>$u[email]</td><td>$u[id_pravo]</td><td>"
                        ."<form action='' method='POST'>
                              <input type='hidden' name='id_uzivatel' value='$u[id_uzivatel]'>
                              <input type='submit' name='potvrzeni' value='Smazat'>
                          </form>"
                        ."</td></tr>";
                }
            ?>
        </table>
<?php
    // 🤑 --- KONEC: PRO PŘIHLÁŠÉNE UŽIVATELE S PRÁVEM ADMIN --- 🤑
    }

    // paticka
    ZakladHTML::createFooter();
?>

