<?php

require_once("mensch.php");


class Schweizer extends Mensch {

   
    function __construct($name, $geschlecht) {
        $this->name = $name;
        $this->geschlecht = $geschlecht;
    }
    
    function umbenennen($str, $geduld) {
        $this->behoerdengang($str,$geduld);
    }
    
    function behoerdengang($str, $geduld) {
        if($geduld==false) {
            throw new Exception("Geduldsfassen ist gerissen!!!");
        } else {
            $this->name = $str;
        }
    }
}
?>
