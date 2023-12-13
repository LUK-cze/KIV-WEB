<?php

/*

╔══════════════════════════════════╗
║                                  ║
║            Registrace            ║
║                                  ║
╚══════════════════════════════════╝

*/
    // nacteni hlavicky stranky

use kivweb\Models\DatabaseModel;

    $myDB = new DatabaseModel();

    if($myDB->isUserLogged()){
        // Získam data přihlášeného uživatele. Toto se hodí jen když chci vypsat zprávu, že uživatel je již přihlášen a registrovat se znovu nemůže.
        $user = $myDB->getLoggedUserData();
    }

    // nacteni souboru s funkcemi
    //require_once("MyDatabase.class.php");
    //$myDB = new MyDatabase();

    $rights = $myDB -> getAllRights();
    
    // 😡 ---  PRO NEPRIHLASENE UZIVATELE --- 😡
    if(!$myDB->isUserLogged()){
?>
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-12">
        <div class="login">
          <form action="" method="POST" oninput="x.value=(heslo.value==heslo2.value)?'OK':'Hesla nejsou stejná!'">
                <fieldset>
                  <legend><h3>Zaregistruj se</h3></legend>
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
                  </div>


                <button class="btn btn-sub" type="submit" name="action" value="registrace">Zaregistruj se</button>
                <button class="btn btn-res" type="reset">Smazat údaje</button>
          </div>        
                <h4>Maš už účet? Přihlaš se <a href="index.php?page=login">ZDE</a>.</h4>
                <h5>Ověření hesla: <output name="x" for="heslo heslo2"></output></h5>

                </fieldset>
          </form>  
        </div>  
    </div>
  </div>
<?php
    // 😡 --- KONEC: PRO NEPRIHLASENE UZIVATELE --- 😡
    } else {
    // 🤑 --- PRO PRIHLASENE UZIVATELE --- 🤑
?>
        <div>
            <b>Si již přihlášený jako <?php echo $user['login'] ; ?> a znovu se registrovat nemůžeš.</b>
        </div>
<?php
    }
    // 🤑 --- KONEC: PRO PRIHLASENE UZIVATELE --- 🤑

?>
