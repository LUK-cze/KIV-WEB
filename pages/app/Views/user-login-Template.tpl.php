<?php

namespace kivweb\Views;

use kivweb\Models\DatabaseModel;
use kivweb\Views\TemplateBasics;
use kivweb\Views\IView;

    $myDB = new DatabaseModel();

    


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
                        <?php 
                        ?>
                        <div class="gamertag">
                            <input type="text" name="login" id="login" placeholder="Přezdívka" required>
                        </div>
                        <div class="pass">
                            <input type="password" name="heslo" id="heslo" placeholder="Heslo" required>
                        </div>
                        <button class="btn btn-sub" type="submit" name="action" value="login">Přihlásit se</button>
                        <button class="btn btn-res" type="reset">Smazat údaje</button>
                </div>        
                        <h4>Nemáš ještě účet? Zaregistruj se <a href="index.php?page=registrace">ZDE</a>.</h4>

                        </fieldset>
                </form>  
                </div>  
            </div>

            <div class="row">
        <div id="how" class="container gray mt-5">
                <div class="row">
                <div class="col-sm-12">
                    <h1>Jak to funguje?</h1>
                    <p>Uživatelé na naší stránce mají různé role, které udělují různé pravomoce. </p>
                    <h3>Nepřihlášený uživatel <span class="glyphicon glyphicon-star"><span class="glyphicon glyphicon-star-empty"><span class="glyphicon glyphicon-star-empty"></h3>
                    <p>V případě ne přihlášeného uživatele jsou dostupné pouze základní funkce. Máte možnost prohlížet si recenzováné hry a získávat informace o nabídce. Nicméně, abyste mohl/a využívat pokročilejších možností, jako je přidání hodnocení, vidět seznam svých hodnocení nebo správa uživatelského účtu, je nezbytné se registrovat nebo přihlásit.</p>
                    <p>Takže, až se rozhodnete vstoupit do svého účtu, čekají na vás rozšířené možnosti a lepší uživatelská zkušenost.</p>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-12">
                    <h3>Hráč <span class="glyphicon glyphicon-star"><span class="glyphicon glyphicon-star"><span class="glyphicon glyphicon-star-empty"></span></h3>
                    <p>Pro přihlášeného uživatele s hodností "Hráč" se otevírají dveře k rozsáhlejším možnostem správy hodnocení. Jako hráč můžete procházet a sledovat recenze ostatních uživatelů. Co však dělá vaši zkušenost ještě osobnější, je možnost přidávat, upravovat nebo dokonce mazat svá vlastní hodnocení. Tato pravomoc vám umožňuje nejen sdílet své dojmy s ostatními, ale také aktivně ovlivňovat a spravovat obsah na platformě.</p>
                    <p>Takže, až budete mít novou hru na seznamu nebo budete chtít aktualizovat své hodnocení oblíbeného titulu, jako hráč s hodností "Hráč" máte plnou kontrolu nad tím, co se zobrazuje ve vašem seznamu hodnocení.</p>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-12">
                    <h3>Správce <span class="glyphicon glyphicon-star"><span class="glyphicon glyphicon-star"><span class="glyphicon glyphicon-star"></span></h3>
                    <p>Pro uživatele s hodností "Správce" se otevírá široká škála možností pro aktivní správu obsahu a uživatelských interakcí. Kromě schopnosti prohlížet, přidávat, upravovat a mazat vlastní hodnocení, máte také pravomoc přidávat samotné hry do systému. Tímto způsobem můžete obohatit nabídku a zajistit, že komunita má přístup k co nejširšímu spektru her. Jako správce máte také kontrolu nad všemi uživateli na platformě. Můžete spravovat jejich účty, sledovat jejich aktivitu a schvalovat či zamítat jejich hodnocení. Tato pravomoc vám dává možnost udržovat kvalitu obsahu a zabezpečit, aby komunita byla informována o nejlepších hrách.</p>
                    <p>Kromě toho můžete povolovat zobrazení hodnocení od ostatních uživatelů, což přispívá k transparentnosti a důvěře ve vaší herní komunitě. Existuje i mýtická a legendární role Super-správce a Super-administrátora, ale je jen pro vyvolené.</p>
                </div>
                </div>       
            </div>
        </div>
        </div>
<?php
    ///////////// KONEC: PRO NEPRIHLASENE UZIVATELE ///////////////

    } else {

    ///////////// 🤑 --- PRO PRIHLASENE UZIVATELE --- 🤑 /////////////
        // ziskam nazev prava uzivatele, abych ho mohl vypsat
        $pravo = $myDB->getRightNameById($_SESSION["id_pravo"]);

        // ziskam nazev
        $pravoNazev = ($pravo == null) ? "*Neznámé*" : $pravo;

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

                    <form action="index.php" method="POST">
                      <input type="hidden" name="action" value="logout">
                      <input type="submit" name="potvrzeni" value="Odhlaš se">
                    </form>
                </fieldset>
                </div>  
            </div>
        </div>

        <div class="row">
        <div id="how" class="container gray mt-5">
                <div class="row">
                <div class="col-sm-12">
                    <h1>Jak to funguje?</h1>
                    <p>Uživatelé na naší stránce mají různé role, které udělují různé pravomoce. </p>
                    <h3>Nepřihlášený uživatel <span class="glyphicon glyphicon-star"><span class="glyphicon glyphicon-star-empty"><span class="glyphicon glyphicon-star-empty"></h3>
                    <p>V případě ne přihlášeného uživatele jsou dostupné pouze základní funkce. Máte možnost prohlížet si recenzováné hry a získávat informace o nabídce. Nicméně, abyste mohl/a využívat pokročilejších možností, jako je přidání hodnocení, vidět seznam svých hodnocení nebo správa uživatelského účtu, je nezbytné se registrovat nebo přihlásit.</p>
                    <p>Takže, až se rozhodnete vstoupit do svého účtu, čekají na vás rozšířené možnosti a lepší uživatelská zkušenost.</p>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-12">
                    <h3>Hráč <span class="glyphicon glyphicon-star"><span class="glyphicon glyphicon-star"><span class="glyphicon glyphicon-star-empty"></span></h3>
                    <p>Pro přihlášeného uživatele s hodností "Hráč" se otevírají dveře k rozsáhlejším možnostem správy hodnocení. Jako hráč můžete procházet a sledovat recenze ostatních uživatelů. Co však dělá vaši zkušenost ještě osobnější, je možnost přidávat, upravovat nebo dokonce mazat svá vlastní hodnocení. Tato pravomoc vám umožňuje nejen sdílet své dojmy s ostatními, ale také aktivně ovlivňovat a spravovat obsah na platformě.</p>
                    <p>Takže, až budete mít novou hru na seznamu nebo budete chtít aktualizovat své hodnocení oblíbeného titulu, jako hráč s hodností "Hráč" máte plnou kontrolu nad tím, co se zobrazuje ve vašem seznamu hodnocení.</p>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-12">
                    <h3>Správce <span class="glyphicon glyphicon-star"><span class="glyphicon glyphicon-star"><span class="glyphicon glyphicon-star"></span></h3>
                    <p>Pro uživatele s hodností "Správce" se otevírá široká škála možností pro aktivní správu obsahu a uživatelských interakcí. Kromě schopnosti prohlížet, přidávat, upravovat a mazat vlastní hodnocení, máte také pravomoc přidávat samotné hry do systému. Tímto způsobem můžete obohatit nabídku a zajistit, že komunita má přístup k co nejširšímu spektru her. Jako správce máte také kontrolu nad všemi uživateli na platformě. Můžete spravovat jejich účty, sledovat jejich aktivitu a schvalovat či zamítat jejich hodnocení. Tato pravomoc vám dává možnost udržovat kvalitu obsahu a zabezpečit, aby komunita byla informována o nejlepších hrách.</p>
                    <p>Kromě toho můžete povolovat zobrazení hodnocení od ostatních uživatelů, což přispívá k transparentnosti a důvěře ve vaší herní komunitě. Existuje i mýtická a legendární role Super-správce a Super-administrátora, ale je jen pro vyvolené.</p>
                </div>
                </div>       
            </div>
        </div>

<?php
    }
    ///////////// KONEC: PRO PRIHLASENE UZIVATELE ///////////////

?>
