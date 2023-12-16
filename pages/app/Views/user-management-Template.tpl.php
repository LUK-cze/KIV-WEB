<?php
// muze se hodit:
//<form method='post'>
//    <input type='hidden' name='id_user' value=''>
//    <button type='submit' name='action' value='delete'>Smazat</button>
//</form>


namespace kivweb\Views;
use kivweb\Models\DatabaseModel;
use kivweb\Views\TemplateBasics;

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

    $myDB = new DatabaseModel();

    $userData = $tplData['uzivatele']; 

    $pravo = $_SESSION['id_pravo'];


    // 😡 --- PRO NEPŘIHLÁŠENÉ UŽIVATELE --- 😡
    if(!$myDB->isUserLogged()){
?>
        <div>
            <b>Tato strána je dostupná pouze přihlášeným uživatelům.</b>
        </div>
<?php
    // 😡 --- KONEC: PRO NEPŘIHLÁŠENÉ UŽIVATELE --- 😡
    } else if($pravo >= 2) {
    // ------------------- PRO PŘIHLÁŠÉNE UŽIVATELE BEZ PRÁVA ADMIN -------------------
?>
        <div>
            <b>Správu uživatelů mohou provádět pouze uživatelé s právem Administrátor.</b>
        </div>
<?php
    //------------------- KONEC: PRO PŘIHLÁŠÉNE UŽIVATELE BEZ PRÁVA ADMIN -------------------
    } else {
    // 🤑 --- PRO PŘIHLÁŠÉNE UŽIVATELE S PRÁVEM ADMIN --- 🤑


        // Získám data všch uživatelů
        // Dávám ho až sem aby se aktulizovala tabulka, když někoho smažu
        $users = $myDB->getAllUsers();
?>

<div class="container mt-5">
    <div class="row"> 
        <div class="col-md-12 table-container">
        <h2>Seznam uživatelů</h2>
        <table border="1">
            <tr class="header_table"><th class="id_table">ID</th><th>Login</th><th>Jméno</th><th>Přijmení</th><th>E-mail</th><th class="pravo_table">Právo</th><th>Akce</th><th></th></tr>
            <?php
                // Pocházení uživatelů a jejich vypsání
                foreach ($users as $u) {
                    echo "<tr><td class='id_table' >$u[id_uzivatel]</td><td>$u[login]</td><td>$u[jmeno]</td><td>$u[prijmeni]</td><td>$u[email]</td><td class='pravo_table'>$u[id_pravo]</td><td> 
                <!-- Změna práva -->
                <form action='' method='POST'>
                    <input type='hidden' name='id_uzivatel' value='$u[id_uzivatel]'>
                    <select name='nove_pravo'>
                        <option value='1' " . ($u['id_pravo'] == 1 ? 'selected' : '') . ">Super Admin</option>
                        <option value='2' " . ($u['id_pravo'] == 2 ? 'selected' : '') . ">Admin</option>
                        <option value='3' " . ($u['id_pravo'] == 3 ? 'selected' : '') . ">Autor</option>
                        <option value='4' " . ($u['id_pravo'] == 4 ? 'selected' : '') . ">Recenzert</option>
                    </select>
                    <button class='btn btn-sub' type='submit' name='zmenit' value='zmenit'>Změnit</button>
                </form>
                </td>
                <td>

                    "
                        ."<form action='' method='POST'>
                              <input type='hidden' name='id_uzivatel' value='$u[id_uzivatel]'>
                              <button class='btn btn-res' type='submit' name='delete' value='delete'>X</button>
                          </form>"
                        ."</td></tr>";
            
                }
            ?>
        </table>
        </div>
    </div>
</div>
<?php
    // 🤑 --- KONEC: PRO PŘIHLÁŠÉNE UŽIVATELE S PRÁVEM ADMIN --- 🤑
    }

?>

