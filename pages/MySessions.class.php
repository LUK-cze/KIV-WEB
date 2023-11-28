<?php
/*
╔══════════════════════════════════╗
║                                  ║
║             Session              ║
║                                  ║
╚══════════════════════════════════╝

Zde pracujeme se session
*/
class MySession{
    
    // Jakmile se vytvoří objekt tak session se zahájí
    public function __construct(){
        session_start();
    }
    
    // Přidávání hodnoty do session
    public function addSession($name, $value){
        $_SESSION[$name] = $value;
    }
    
    // Vratí hodnotu dané session nebo null, pokud session není nastavena
    public function readSession($name){
        // Existuje daný atribut v session
        if($this->isSessionSet($name)){
            return $_SESSION[$name];
        } else {
            return null;
        }
    }
    
    // Zde se kontroluje jestli je session nastavená
    public function isSessionSet($name){
        return isset($_SESSION[$name]);
    }

    
    // Odstranění session
    public function removeSession($name){
        unset($_SESSION[$name]);
    }
    
}
?>