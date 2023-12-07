<?php
// muze se hodit:
//<form method='post'>
//    <input type='hidden' name='id_user' value=''>
//    <button type='submit' name='action' value='delete'>Smazat</button>
//</form>

use kivweb\Models\DatabaseModel;
use kivweb\Views\ClassBased\TemplateBasics;

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
    require_once("MyDatabase.class.php"); // ZAJÍMAVOST: Zde nemusím používat závorky, ale je dobré je tu mít
    $myDB = new DatabaseModel();

    // Načtení hlavičky
    TemplateBasics::getHTMLHeader("Úprava osobních údajů uživatele");

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
    TemplateBasics::getHTMLFooter();
?>

