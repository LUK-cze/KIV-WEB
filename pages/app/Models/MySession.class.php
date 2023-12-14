<?php 

namespace kivweb\Models;

class MySession {


   public function __construct(){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        }
    }

    public function addSession(string $name, $value){
        $_SESSION[$name] = $value;
    }

    public function readSession(string $name){

        // Zde se ptám zda existuje daný atribut v session
        if($this->isSessionSet($name)){
            return $_SESSION[$name];
        } else {
            return null;
        }
    }

    public function isSessionSet(string $name){
        return isset($_SESSION[$name]);
    }

    public function removeSession(string $name){
        unset($_SESSION[$name]);
    }   
}

?>