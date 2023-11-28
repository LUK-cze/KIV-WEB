<?php
/*

╔══════════════════════════════════╗
║                                  ║
║              Login               ║
║                                  ║
╚══════════════════════════════════╝

Zde je úvodní stránka s loginem.
Je zde i nějaký obsah co se úkáže uživateli a když je uživatel přihlášen,
vypíší se mu jeho informace 

*/

    // Načítání souboru s databázovými funkcemi
    require_once("MyDatabase.class.php");
    $myDB = new MyDatabase();

    // Načítání modulu hlavičky, který je v souboru ZakladHTML.class.php
    require_once("ZakladHTML.class.php");
    ZakladHTML::createHeader("Přihlášení a odhlášení uživatele");

    // Zpracování odesílaných formulářů
    if(isset($_POST['action'])){
        // přihlášení, pokud je vloženo login(username) a heslo
        if($_POST['action'] == 'login' && isset($_POST['login']) && isset($_POST['heslo'])){
            // pokusim se prihlasit uzivatele
            $res = $myDB->userLogin($_POST['login'], $_POST['heslo']);
            if($res){
                echo "OK: Uživatel byl přihlášen.";
            } else {
                echo "ERROR: Přihlášení uživatele se nezdařilo.";
            }
        }
        // Odhlášení
        else if($_POST['action'] == 'logout'){
            $myDB->userLogout();
            echo "OK: Uživatel byl odhlášen.";
        }
        // Když se něco pokazí
        else {
            echo "WARNING: Neznámá akce.";
        }
        echo "<br>";
    }

    // Pokud je uživatel už přihlášen tak získám jeho data
    if($myDB->isUserLogged()){
        // ziskam data prihlasenoho uzivatele
        $user = $myDB->getLoggedUserData();
    }

    ///////////// 😡 --- PRO NEPŘIHLÁŠENÉ UŽIVATELE --- 😡 ///////////////
    // pokud uzivatel neni prihlasen nebo nebyla ziskana jeho data, tak vypisu prihlasovaci formular
    if(!$myDB->isUserLogged()){
?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-8">
            <h3 id="about">Vítejte na webu Pár Pařmenů!</h3>
            <p>Váši průvodci do světa her všech druhů! Jsme váš spolehlivý zdroj pro recenze a zábavné pohledy na hry z různých žánrů. Bez ohledu na to, zda jste vášnivým hráčem, kterému nikdy nic neunikne, nebo jen občasným hráčem hledajícím zábavu, na našem webu najdete informace, které potřebujete.</p>
            <p>Naše vášeň pro hry nás spojuje, a my jsme tu, abychom vám pomohli najít ty nejlepší tituly a neustále rozšiřovat vaši herní obzory. Takže se pohodlně usaďte a připravte se na dobrodružství, které vás čeká na webu Pár Pařmenů!</p>
            </div>
            <div class="col-sm-4">
                <div class="login">
                <form action="" method="POST"> <!-- index.php?page=uprava -->
                        <fieldset>
                        <legend><h3>Přihlaš se!</h3></legend>
                        <div class="gamertag">
                            <input type="text" name="login" id="login" placeholder="Přezdívka" required>
                        </div>
                        <div class="pass">
                            <input type="password" name="heslo" id="heslo" placeholder="Heslo" required>
                        </div>
                        <input class="btn btn-sub" type="submit" value="Přihlásit se">
                        <input class="btn btn-res" type="reset" value="Smazat údaje">
                </div>        
                        <h4>Nemáš ještě účet? Zaregistruj se <a href="index.php?page=registrace">ZDE</a>.</h4>

                        </fieldset>
                </form>  
                </div>  
            </div>
        </div>
<?php
    ///////////// KONEC: PRO NEPRIHLASENE UZIVATELE ///////////////

    } else {

    ///////////// 🤑 --- PRO PRIHLASENE UZIVATELE --- 🤑 /////////////
        // ziskam nazev prava uzivatele, abych ho mohl vypsat
        $pravo = $myDB->getRightById($user["id_pravo"]);
        // ziskam nazev
        $pravoNazev = ($pravo == null) ? "*Neznámé*" : $pravo['nazev'];

?>

<div class="container mt-5">
        <div class="row">
            <div class="col-sm-8">
            <h3 id="about">Vítejte na webu Pár Pařmenů!</h3>
            <p>Váši průvodci do světa her všech druhů! Jsme váš spolehlivý zdroj pro recenze a zábavné pohledy na hry z různých žánrů. Bez ohledu na to, zda jste vášnivým hráčem, kterému nikdy nic neunikne, nebo jen občasným hráčem hledajícím zábavu, na našem webu najdete informace, které potřebujete.</p>
            <p>Naše vášeň pro hry nás spojuje, a my jsme tu, abychom vám pomohli najít ty nejlepší tituly a neustále rozšiřovat vaši herní obzory. Takže se pohodlně usaďte a připravte se na dobrodružství, které vás čeká na webu Pár Pařmenů!</p>
            </div>
            <div class="col-sm-4">
                <div class="login">
                <fieldset>
                    <legend><h3>Vítej <?php echo $user['jmeno'] ; ?></h3></legend>
                    Login: <?php echo $user['login'] ; ?>
                    Jméno: <?php echo $user['jmeno'] ; ?>
                    E-mail: <?php echo $user['email'] ; ?>
                    Právo: <?php echo $pravoNazev ; ?>

                    <form action="index.php" method="POST">
                      <input type="hidden" name="action" value="logout">
                      <input type="submit" name="potvrzeni" value="Odhlaš se">
                    </form>
                </fieldset>
                </div>  
            </div>
        </div>

        Odhlášení uživatele:
        <form action="" method="POST">
            <input type="hidden" name="action" value="logout">
            <input type="submit" name="potvrzeni" value="Odhlásit">
        </form>
<?php
    }
    ///////////// KONEC: PRO PRIHLASENE UZIVATELE ///////////////

    // Patička co je vytvořena v jiném soboru (viz. hlavička ⬆⬆⬆)
    ZakladHTML::createFooter();
?>
