<?php

/*

╔══════════════════════════════════╗
║                                  ║
║            Registrace            ║
║                                  ║
╚══════════════════════════════════╝

*/

// ---------------------- DEBUG ----------------------
function debug_to_console($data) {
  $output = $data;
  if (is_array($output))
      $output = implode(',', $output);

  echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
// ---------------------- DEBUG ----------------------


    // nacteni souboru s funkcemi
    //require_once("MyDatabase.class.php");
    //$myDB = new MyDatabase();

    $rights = $myDB -> getAllRights();


    // nacteni hlavicky stranky
    require_once("ZakladHTML.class.php");
    ZakladHTML::createHeader("Registrace nového uživatele");

    // zpracovani formulare pro registraci uzivatele
    if(!empty($_POST['action'])){
        // mam vsechny pozadovane hodnoty?
        if(!empty($_POST['login']) && !empty($_POST['heslo']) && !empty($_POST['heslo2'])
            && !empty($_POST['jmeno']) && !empty($_POST['prijmeni']) && !empty($_POST['email']) && !empty($_POST['pravo'])
            && $_POST['heslo'] == $_POST['heslo2']
        ){
            // --- Zde hashuji heslo. ---  
            // Nepoužívám md_5. Ikdyž je celkem dobrý dneska jde velmi lehce prolomit.
            // Proto používám BCRYPT 
            // Poznámka: Pro BCRYPT je potřeba délka hesla v databázi minimálně 60.
            // Jinak se nám do sloupečku s heslem ani nevyjde.
            $heslo = $_POST['heslo'];
            $hash = password_hash($heslo, PASSWORD_BCRYPT);


            // Ukládání do databáze
            $res = $myDB->addNewUser($_POST['login'], $hash, $_POST['jmeno'], $_POST['prijmeni'], $_POST['email'], $_POST['pravo']);
            // Kontrola
            if($res){
                echo "OK: Uživatel byl přidán do databáze.";
                debug_to_console("OK: Uživatel byl přidán do databáze.");
            } else {
                echo "ERROR: Uložení uživatele se nezdařilo.";
                debug_to_console("ERROR: Uložení uživatele se nezdařilo.");
            }
        } else {
            // Nebyli přijaté všchny atrituty (Nemělo by se to stát, protože toto kontoluji v HTML)
            echo "ERROR: Nebyly přijaty požadované atributy uživatele.";
            debug_to_console("ERROR: Nebyly přijaty požadované atributy uživatele.");
        }
        echo "<br><br>";
    }

    if($myDB->isUserLogged()){
        // Získam data přihlášeného uživatele. Toto se hodí jen když chci vypsat zprávu, že uživatel je již přihlášen a registrovat se znovu nemůže.
        $user = $myDB->getLoggedUserData();
    }
    
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
                  <div class="row">
                    <div class="col-sm-6 pravo">
                     <p>Zvol právo:</p>
                    </div>
                    <div class="col-sm-6 pravo">
                      <select name="pravo">
                          <?php
                          //Zde získám práve které si uživatel může zvolit
                          foreach($rights as $r){
                              echo"<option value='$r[id_pravo]'>$r[nazev]</option>"; 
                          }
                          ?>
                      </select>
                    </div>
                </div>

                <button class="btn btn-sub" type="submit" name="action" value="login">Zaregistruj se</button>
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

    // Patička co je vytvořena v jiném soboru (viz. hlavička ⬆⬆⬆)
    ZakladHTML::createFooter();
?>
