<?php
    // Naše hlavička stránky

use kivweb\Models\DatabaseModel;
use kivweb\Views\TemplateBasics;

    $myDB = new DatabaseModel();

    // 😡 --- PRO NEPRIHLASENE UZIVATELE --- 😡
    if(!$myDB->isUserLogged()){
?>
        <div>
            <b>Osobní údaje mohou měnit pouze přihlášení uživatelé.</b>
        </div>
<?php
    // 😡 --- KONEC: PRO NEPRIHLASENE UZIVATELE --- 😡
    } else {



?>

             <!-- <form action="" method="POST" oninput="x.value=(pas1.value==pas2.value)?'OK':'Nestejná hesla'"
                 autocomplete="off"> <input type="hidden" name="id_uzivatel" value="<?php //echo $_SESSION['id_uzivatel']; ?>">
                <input type="hidden" name="id_pravo" value="<?php //echo $_SESSION['id_pravo']; ?>">         -->

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="login">
            <form action="" method="POST" oninput="x.value=(heslo.value==heslo2.value)?'OK':'Hesla nejsou stejná!'">
                
            <fieldset>
                    <legend><h3>Osobní údaje</h3></legend>
                    <div class="email">
                        <input type="text" name="email" id="email" placeholder="E-mail" required>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 jmeno">
                            <input type="text" name="jmeno" id="jmeno" placeholder="Jméno" required>
                        </div>
                        <div class="col-sm-6 prijmeni">
                            <input type="text" name="prijmeni" id="prijmeni" placeholder="Příjmení" required>
                        </div>
                    </div>
                    <br>
                    <div class="gamertag">
                        <input type="text" name="login" id="login" placeholder="Přezdívka" required>
                    </div>
                    <!-- Hesla (i jeho input na kontrolu jestli se hesla schodují) -->
                    <div class="row">
                        <br>
                        <div class="pass col-sm-6">
                            <input type="password" name="heslo" id="heslo" placeholder="Heslo" required>
                        </div>
                        <div class="pass col-sm-6">
                            <input type="password" name="heslo2" id="heslo2" placeholder="Napište heslo znovu" required>
                        </div>
                        <div class="pass col-sm-12">
                            <input type="password" name="heslo_puvodni" id="heslo_puvodni" placeholder="Napište své původní heslo" required>
                        </div>
                    </div>
                    <button class="btn btn-sub" type="submit" name="action" value="update">Update</button>
                    <button class="btn btn-res" type="reset">Smazat údaje</button>
            </div>        
                    <h4>Zpět na hlavní stránku <a href="index.php?page=login">ZDE</a>.</h4>
                    <h5>Ověření hesla: <output name="x" for="heslo heslo2"></output></h5>
                    </fieldset>
            </form>  
            </div>  
        </div>
    </div>

<?php
    }
    // 🤑 --- KONEC: PRO PRIHLASENE UZIVATELE --- 🤑

?>
