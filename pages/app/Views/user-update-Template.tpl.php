<?php
/*

╔══════════════════════════════════╗
║                                  ║
║         Update uživatele         ║
║                                  ║
╚══════════════════════════════════╝

Zde si uživatel může upravit svoje údaje co má uložené v databázi

*/

    // Načítání funkce pro práci s databází
    require_once("MyDatabase.class.php");
    $myDB = new MyDatabase();

    // Naše hlavička stránky
    require_once("ZakladHTML.class.php");
    ZakladHTML::createHeader("Úprava osobních údajů uživatele");

    // Pokud je uživatel přihlášen, tak získám jeho data
    if($myDB->isUserLogged()){
        // Získání dat
        $userData = $myDB->getLoggedUserData();
    }

    // 😡 --- PRO NEPRIHLASENE UZIVATELE --- 😡
    if(!$myDB->isUserLogged()){
?>
        <div>
            <b>Osobní údaje mohou měnit pouze přihlášení uživatelé.</b>
        </div>
<?php
    // 😡 --- KONEC: PRO NEPRIHLASENE UZIVATELE --- 😡
    } else {
    // 🤑 --- PRO PRIHLASENE UZIVATELE --- 🤑

        // Zpracování odeslaných formulářů
        if(isset($_POST['potvrzeni'])){
            // Kontrola, jestli mám všchny požadované hodnoty
            if(isset($_POST['id_uzivatel']) && isset($_POST['heslo']) && isset($_POST['heslo2'])
                && isset($_POST['jmeno']) && isset($_POST['email']) && isset($_POST['pravo'])
                && $_POST['heslo'] == $_POST['heslo2']
                && $_POST['heslo'] != "" && $_POST['jmeno'] != "" && $_POST['email'] != ""
                && $_POST['pravo'] > 0
                // Je současným uživatelem a zadal správné heslo?
                && $_POST['id_uzivatel'] == $userData['id_uzivatel']
            ){
                // Bylo zadáno správné současné heslo?
                if($_POST['heslo_puvodni'] == $userData['heslo']){
                    // Jestli ano tak uložím všchny atributy do batabáze (uživatele)
                    $res = $myDB->updateUser($userData['id_uzivatel'], $userData['login'], $_POST['heslo'], $_POST['jmeno'], $_POST['prijmeni'], $_POST['email'], $_POST['pravo']);
                    // Kontrola jestli byl uložen
                    if($res){
                        echo "OK: Uživatel byl upraven.";
                        // Zde načítam znovu jeho uložená data (už upravená)
                        $userData = $myDB->getLoggedUserData();
                    } else {
                        echo "ERROR: Upravení uživatele se nezdařilo.";
                    }
                } else {
                    // Chyba
                    echo "ERROR: Zadané současné heslo uživatele není správné.";
                }
            } else {
                // Nebyli zadené všchny atributy
                echo "ERROR: Nebyly přijaty požadované atributy uživatele.";
            }
            echo "<br><br>";
        }

?>
        <h2>Osobní údaje</h2>
        <form action="" method="POST" oninput="x.value=(pas1.value==pas2.value)?'OK':'Nestejná hesla'"
              autocomplete="off"
        >
            <input type="hidden" name="id_uzivatel" value="<?php echo $userData['id_uzivatel']; ?>">
            <table>
                <tr><td>Login:</td><td><?php echo $userData['login']; ?></td></tr>
                <tr><td>Heslo 1:</td><td><input type="password" name="heslo" id="pas1"></td></tr>
                <tr><td>Heslo 2:</td><td><input type="password" name="heslo2" id="pas2"></td></tr>
                <tr><td>Ověření hesla:</td><td><output name="x" for="pas1 pas2"></output></td></tr>
                <tr><td>Jméno:</td><td><input type="text" name="jmeno" value="<?php echo $userData['jmeno']; ?>" required></td></tr>
                <tr><td>Příjmení:</td><td><input type="text" name="prijmeni" value="<?php echo $userData['prijmeni']; ?>" required></td></tr>
                <tr><td>E-mail:</td><td><input type="email" name="email" value="<?php echo $userData['email']; ?>" required></td></tr>
                <tr><td>Právo:</td>
                    <td>
                        <select name="pravo">
                            <?php
                            // Získám všchny práva
                            $rights = $myDB->getAllRights();
                            // Projdu je a vypíšu
                            foreach($rights as $r){
                                $selected = ($userData['id_pravo'] == $r['id_pravo']) ? "selected" : "";
                                echo "<option value='$r[id_pravo]' $selected>$r[nazev]</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr><td>Současné heslo:</td><td><input type="password" name="heslo_puvodni" required></td></tr>
            </table>

            <input type="submit" name="potvrzeni" value="Upravit osobní údaje">
        </form>
<?php
    }
    // 🤑 --- KONEC: PRO PRIHLASENE UZIVATELE --- 🤑

    // Patička (viz ZakladHTML)
    ZakladHTML::createFooter();
?>
