<?php
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

    $users = $tplData['uzivatele']; 
    $hry = $tplData['hry']; 
    $recenze = $tplData['recenze']; 
    $pravo = $_SESSION['id_pravo'];


    ?>
    <script>
        function VypisZpravyDeleteUser(status, akce) {
            alert(status + ": Uživatel " + akce);
        }

        function VypisZpravyDeleteGame(status, akce) {
            alert(status + ": Hra " + akce);
        }

        function VypisZpravyDeleteRecenze(status, akce) {
            alert(status + ": Recenze " + akce);
        }
    
    </script>
    <?php


// --------------------- USER DELETE ---------------------
    if (isset($_GET['message']) && $_GET['message'] == 'SmazanUzivatel') {
        echo '<script>VypisZpravyDeleteUser("OK", "byl smazán");</script>';
    }

    if (isset($_GET['message']) && $_GET['message'] == 'NesmazanUzivatel') {
        echo '<script>VypisZpravyDeleteUser("ERROR", "nebyl smazán");</script>';
    }

// --------------------- GAME DELETE ---------------------
    if (isset($_GET['message']) && $_GET['message'] == 'SmazanaHra') {
        echo '<script>VypisZpravyDeleteGame("OK", "byla smazána");</script>';
    }

    if (isset($_GET['message']) && $_GET['message'] == 'NesmazanaHra') {
        echo '<script>VypisZpravyDeleteGame("ERROR", "nebyla smazána");</script>';
    }
// --------------------- RECENZE DELETE ---------------------
    if (isset($_GET['message']) && $_GET['message'] == 'SmazanaRecenze') {
        echo '<script>VypisZpravyDeleteRecenze("OK", "byla smazána");</script>';
    }

    if (isset($_GET['message']) && $_GET['message'] == 'NesmazanaRecenze') {
        echo '<script>VypisZpravyDeleteRecenze("ERROR", "nebyla smzána");</script>';
    }



    // 😡 --- PRO NEPŘIHLÁŠENÉ UŽIVATELE --- 😡
    if(!$myDB->isUserLogged()){
?>
        <div>
            <b>Tato strána je dostupná pouze přihlášeným uživatelům.</b>
        </div>
<?php
    // 😡 --- KONEC: PRO NEPŘIHLÁŠENÉ UŽIVATELE --- 😡
    } else if($pravo > 2) {
    // ------------------- PRO PŘIHLÁŠÉNE UŽIVATELE BEZ PRÁVA ADMIN -------------------
?>
        <div>
            <b>Správu uživatelů mohou provádět pouze uživatelé s právem Administrátor.</b>
        </div>
<?php
    //------------------- KONEC: PRO PŘIHLÁŠÉNE UŽIVATELE BEZ PRÁVA ADMIN -------------------
    } else {
    // 🤑 --- PRO PŘIHLÁŠÉNE UŽIVATELE S PRÁVEM ADMIN --- 🤑


    //TODO: DULEŽITY KLIČ K VYŘESENÍ PROGLEMU U RECENZÍ ?
        // Získám data všch uživatelů
        // Dávám ho až sem aby se aktulizovala tabulka, když někoho smažu
        //$users = $myDB->getAllUsers();


?>

<div class="container mt-5">


<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#uzivatele">Uživatelé</a></li>
    <li><a data-toggle="tab" href="#hry">Hry</a></li>
    <li><a data-toggle="tab" href="#recenze">Recenze</a></li>
  </ul>

  <div class="tab-content">
    <div id="uzivatele" class="tab-pane fade in active">

        <!-- SEZNAM UŽIVATELŮ -->
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
                                  <button class='btn btn-res' type='submit' name='delete-uzivatel' value='delete-uzivatel'>X</button>
                              </form>"
                            ."</td></tr>";
                    
                    }
                ?>
            </table>
            </div>
        </div>

    </div>
    <div id="hry" class="tab-pane fade">

        <!-- SEZNAM HER -->
        <div class="row"> 
            <div class="col-md-12 table-container">
            <h2>Seznam her</h2>
            <table border="1">
                <tr class="header_table"><th class="id_table">ID</th><th>Název Hry</th><th>Žánr</th><th>Foto Hry</th><th></th></tr>
                <?php
                    // Pocházení uživatelů a jejich vypsání
                    foreach ($hry as $h) {
                        echo "<tr><td class='id_table' >$h[id_hry]</td><td>$h[nazev_hry]</td><td>$h[zanr]</td><td>$h[foto_hry]</td>
                    </td>
                    <td>
                    
                        "
                            ."<form action='' method='POST'>
                                  <input type='hidden' name='id_hry' value='$h[id_hry]'>
                                  <button class='btn btn-res' type='submit' name='delete-hra' value='delete-hra'>X</button>
                              </form>"
                            ."</td></tr>";
                    
                    }
                ?>
            </table>
            </div>
        </div>

    </div>
    <div id="recenze" class="tab-pane fade">

        <!-- SEZNAM RECENZÍ -->
        <div class="row"> 
            <div class="col-md-12 table-container">
            <h2>Seznam uživatelů</h2>
            <table border="1">
                <tr class="header_table"><th class="id_table">ID Recenze</th><th class="pravo_table">ID Hry</th><th class="pravo_table">ID Uživatele</th><th>Hodnocení</th><th>Datum</th><th></th></tr>
                <?php
                    // Pocházení uživatelů a jejich vypsání
                    foreach ($recenze as $r) {
                        echo "<tr><td class='id_table' >$r[id_recenze]</td><td>$r[id_hry]</td><td>$r[id_uzivatel]</td><td>$r[hodnoceni]</td><td>$r[datum]</td>
                    </td>
                    <td>

                        "
                            ."<form action='' method='POST'>
                                  <input type='hidden' name='id_recenze' value='$r[id_recenze]'>
                                  <button class='btn btn-res' type='submit' name='delete-recenze' value='delete-recenze'>X</button>
                              </form>"
                            ."</td></tr>";
                    
                    }
                ?>
            </table>
            </div>
        </div>

    </div>
  </div>
</div>


</div>
<?php
    // 🤑 --- KONEC: PRO PŘIHLÁŠÉNE UŽIVATELE S PRÁVEM ADMIN --- 🤑
    }

?>

