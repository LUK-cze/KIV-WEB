<?php

namespace kivweb\Views;

use kivweb\Models\DatabaseModel;
use kivweb\Views\IView;



/**
 * Templaty pro stránku
 * @package kivweb\Views\TemplateBased
 */
class TemplateBasics implements IView {

    /** @var string PAGE_INTRODUCTION  Sablona s uvodni strankou. */
    const PAGE_LOGIN = "user-login-Template.tpl.php";
    /** @var string PAGE_USER_MANAGEMENT  Sablona se spravou uzivatelu. */
    const PAGE_USER_MANAGEMENT = "user-management-Template.tpl.php";
    /** @var string PAGE_REGISTRATION  Sablona se registracnim formularem. */
    const PAGE_REGISTRATION = "user-registration-Template.tpl.php";
    /** @var string PAGE_USER_UPDATE  Sablona se updatem uzivatele (Jeho profil). */
    const PAGE_USER_UPDATE = "user-update-Template.tpl.php";
    /** @var string PAGE_RECENZE  Sablona se recenzemi her. */
    const PAGE_RECENZE = "recenze-Template.tpl.php";
    /** @var string PAGE_RECENZE  Sablona se recenzemi her. */
    const PAGE_GAMES = "games-Template.tpl.php";    

    

    
    /**
     * Zajisti vypsani HTML sablony prislusne stranky.
     * @param array $templateData       Data stranky.
     * @param string $pageType          Typ vypisovane stranky.
     */
    
    public function printOutput(array $templateData, string $pageType = self::PAGE_LOGIN)
    {
        //// vypis hlavicky
        $this->getHTMLHeader($templateData['title']);

        //// vypis sablony obsahu
        // data pro sablonu nastavim globalni
        global $tplData;
        $tplData = $templateData;
        // nactu sablonu
        require_once($pageType);

        //// vypis pacicky
        $this->getHTMLFooter();
    }

    /**
     *  Vrati vrsek stranky az po oblast, ve ktere se vypisuje obsah stranky.
     *  @param string $pageTitle    Nazev stranky.
     */
    public function getHTMLHeader(string $pageTitle, string $pageType = self::PAGE_LOGIN) {
        $myDB = new DatabaseModel();

        if($myDB->isUserLogged()){
            $right = $_SESSION['id_pravo'];
        }

        $foto_uzivatel = isset($_SESSION['foto']) ? $_SESSION['foto'] : "default-profile-picture.svg";
        ?>
        <html lang="en">
        <head>
        <title>Pár Pařmenů</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- Bootstrap favikony ze stránky https://icons.getbootstrap.com/ -->

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">

        <link rel="icon" href="../img/icons/controller.svg" sizes="any" type="image/svg+xml">

        <link rel="stylesheet" href="../css/css.css">
        <link rel="stylesheet" href="../css/navbar.css">
        <link rel="stylesheet" href="../css/login.css">
        <link rel="stylesheet" href="../css/games.css">
    



        </head>
        <body data-spy="scroll" data-target=".navbar">

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand glyphicon glyphicon-tower" href="#myPage" alt="logo" width="30" height="30"><?php $pageTitle ?></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php?page=login#about">CO JSME ZAČ?</a></li>
                <li><a href="index.php?page=login#how">JAK TO FUGUJE?</a></li>
                <li><a href="index.php?page=recenze">RECENZE</a></li>
                <li><a href="index.php?page=hry">HRY</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        JÁ <?php if($myDB->isUserLogged()){ ?>
                            <img class="fotka-mini" src="../img/profile_pictures/<?php echo $foto_uzivatel ?>" alt="ProfilePic-mini">
                        <?php } ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php if(!$myDB->isUserLogged()){ ?>
                                <li><a href="index.php?page=registrace">ZAREGISTRUJ SE</a></li>
                                <li><a href="index.php?page=login">PŘIHLAŠ SE</a></li>
                            <?php } else { ?>
                                <li><a href="index.php?page=update">MŮJ PROFIL</a></li>
                            <?php if($right <= 2){ ?>
                                <li><a href="index.php?page=sprava">SPRÁVA DATABÁZE</a></li>
                            <?php } 
                            }?>

                        </ul>
                </li>
                        
                       
                </ul>
            </div>
            </div>
        </nav>

        <div class="hero jumbotron text-center">
        <h1>Pár Pařmenů</h1>
        <h3>Recenze video her.</h3> 
        </div>
        <?php
    }
    
    /**
     *  Vrati paticku stranky.
     */
    public function getHTMLFooter(){
        ?>
                <div class="footer fixed-bottom">
                    <div class="text-footer">
                        <h3>Autor: Matěj Putík</h3>
                        <h3>KIV/WEB</h3>
                        <h3>Osobní E-mail: DUKEczech@seznam.cz</h3>
                    </div>
                </div>
            </body>
        </html>
     
        <?php
    }  
      
}

?>
