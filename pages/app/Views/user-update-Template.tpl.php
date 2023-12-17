<?php
namespace kivweb\Views;

use kivweb\Models\DatabaseModel;
use kivweb\Views\TemplateBasics;

    $myDB = new DatabaseModel();


    ?>
    <script>
        function VypisZpravy(status, akce) {
            alert(status + ": Uživatel " + akce);
        }

        function VypisZpravyNahrani(status, akce) {
            alert(status + ": Profilová fotka " + akce);
        }
    
    </script>
    <?php
    
    // ---------- Výpis pro úpravy ----------
    if (isset($_GET['message']) && $_GET['message'] == 'upraven') {
        echo '<script>VypisZpravy("OK", "byl upraven");</script>';
    }
    if (isset($_GET['message']) && $_GET['message'] == 'neupraven') {
        echo '<script>VypisZpravy("ERROR", "nebyl upraven");</script>';
    }
    if (isset($_GET['message']) && $_GET['message'] == 'NespravneHeslo') {
        echo '<script>VypisZpravy("ERROR", "nezadal puvodní heslo správně");</script>';
    }
    if (isset($_GET['message']) && $_GET['message'] == 'NespravneAtributy') {
        echo '<script>VypisZpravy("ERROR", "nezadal požadované atributy");</script>';
    }

    // ---------- KONEC Výpis pro úpravy KONEC----------

    // ---------- Výpis pro nahrávání souboru ----------

    if (isset($_GET['message']) && $_GET['message'] == 'UploadProsel') {
        echo '<script>VypisZpravyNahrani("OK", "byla nahrána");</script>';
    }

    if (isset($_GET['message']) && $_GET['message'] == 'CastecnyUpload') {
        echo '<script>VypisZpravyNahrani("ERROR", "byla nahrána pouze z části");</script>';
    }

    if (isset($_GET['message']) && $_GET['message'] == 'NoUpload') {
        echo '<script>VypisZpravyNahrani("ERROR", "nebyla nahrána");</script>';
    }

    if (isset($_GET['message']) && $_GET['message'] == 'ExtensionUploadERR') {
        echo '<script>VypisZpravyNahrani("ERROR", "byla nahrána se špatnou příponou");</script>';
    }

    if (isset($_GET['message']) && $_GET['message'] == 'CastecnyUpload') {
        echo '<script>VypisZpravyNahrani("ERROR", "byla nahrána pouze z části");</script>';
    }

    if (isset($_GET['message']) && $_GET['message'] == 'MocVelkyUpload') {
        echo '<script>VypisZpravyNahrani("ERROR", "překročila stanovenou hranici 10 MB");</script>';
    }

    if (isset($_GET['message']) && $_GET['message'] == 'SpatnyTypUploadu') {
        echo '<script>VypisZpravyNahrani("ERROR", "nebyla požadovaného formátu (gif, png, jpeg)");</script>';
    }

    if (isset($_GET['message']) && $_GET['message'] == 'ZadnyTMPAdresar') {
        echo '<script>VypisZpravyNahrani("ERROR", "nebyla nahrána, protože se nedostala do TMP adresáře";</script>';
    }

    if (isset($_GET['message']) && $_GET['message'] == 'ZadnyTMPAdresar') {
        echo '<script>VypisZpravyNahrani("ERROR", "nebyla nahrána, protože se nedostala do TMP adresáře";</script>';
    }

    if (isset($_GET['message']) && $_GET['message'] == 'NesloZapsatUpload') {
        echo '<script>VypisZpravyNahrani("ERROR", "nešlo zapsat";</script>';
    }

    if (isset($_GET['message']) && $_GET['message'] == 'NesloPresunoutUpload') {
        echo '<script>VypisZpravyNahrani("ERROR", "nešlo přesunout";</script>';
    }

    if (isset($_GET['message']) && $_GET['message'] == 'DatabazeNeproslaUpload') {
        echo '<script>VypisZpravyNahrani("ERROR", "nešla nahrát do databáze";</script>';
    }
    // ---------- KONEC Výpis pro nahrávání souboru KONEC ----------

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
<div class="container mt-5">
    <div class="row"> 

            <!-- VÝPIS AKTUALNÍCH ÚDAJŮ -->

            <?php 
            
            $pravo = $tplData['right'];

            // ziskam nazev
            $pravoNazev = ($pravo == null) ? "*Neznámé*" : $pravo;
            
            ?>

            <!-- Výpis informací o přihlášeném uživateli -->
            <div class="col-md-4">
                <div class="login">
                <fieldset>
                    <legend><h3>Vítej <?php echo $_SESSION['jmeno'] ; ?></h3></legend>
                    <div class="parametry">
                        <div class="row">
                            <div class="col-sm-12">
                                User Name: <?php echo $_SESSION['login'] ; ?>
                                </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                Jméno: <?php echo $_SESSION['jmeno'] ; ?>
                                </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                Příjmení: <?php echo $_SESSION['prijmeni'] ; ?>
                                </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                E-mail: <?php echo $_SESSION['email'] ; ?>
                                </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                Právo: <?php echo $pravoNazev ; ?>
                            </div>
                        </div>
                    </div>

            <div class="row">
                    <div class="col-sm-12 center-tlacitka">                   
                        <form action="index.php" method="POST">
                            <button class="btn btn-res" type="submit" name="action" value="logout">Odhlaš se</button>
                        </form>
                    </div>
            </div>
                </fieldset>
                </div>  
            </div>

        <!-- Fotka uživatele -->
        <?php 
        $foto_uzivatel = isset($_SESSION['foto']) ? $_SESSION['foto'] : "default-profile-picture.svg";
        
        //echo $foto_uzivatel;
        //die;
        
        ?>

    <div class="col-md-8 info ">
        <div class="foto-panel">
            <div class="row">
                  <div class="col-sm-12 center-tlacitka"> 
                      <div class=" center-tlacitka">
                            <img class="fotka" src="../img/profile_pictures/<?php echo $foto_uzivatel ?>" alt="ProfilePic">
                      </div>  
                  </div>
            </div>


              <div class="row">
                    <div class="col-sm-6 center-tlacitka"> 
                        <form method="post" enctype="multipart/form-data">
                            <input type="file" name="ProfilePic" class="input-file">
                    </div>
                            <div class="col-sm-6 center-tlacitka"> 
                                <button class="btn btn-checklg" type="submit" name="upload" value="ProfilePic"><img class="checklg" src="../img/icons/check-lg.svg" alt="fajfka"></button>
                            </div>
                        </form>

                  </div>
              </div>
        </div> 
    </div>




        <!-- Update uživatele -->
        <div class="row">
            <div class="col-md-12">
                <div class="login">
                <form action="" method="POST" oninput="x.value=(heslo.value==heslo2.value)?'OK':'Hesla nejsou stejná!'">

                <fieldset>
                        <legend><h3>Změna osobních údajů</h3></legend>
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
                         <div class="row">
                          <div class="col-sm-12 center-tlacitka">  
                            <button class="btn btn-sub" type="submit" name="action" value="update">Update</button>
                            <button class="btn btn-res" type="reset">Smazat údaje</button>
                         </div>
                        </div>
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
