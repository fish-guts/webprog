<?php

require_once("lebewesen.php");

class Mensch extends Lebewesen {

    private static $alter = 29;
    private static $vorfahre = "Wilhelm Tell";
    private $geschlecht;
    private $name;
    
    function __construct($name, $geschlecht) {
        $this->name = $name;
        $this->geschlecht = $geschlecht;
        $this->altern();
    }

    function __destruct() {
        echo "Der Mensch ist gestorben";
    }



    public function altern() {
        $this->alter++;
    }

    public function geburtsTagFeiern() {
        echo "Yay, Ich habe geburtstag";
        $this->alter++;
    }

    public function getAlter() {
        return $this->alter;
    }

    static function getVorfahre() {
        return self::$vorfahre;
    }
    static function neueEvolutionstheorie($str) {
        self::$vorfahre = $str;
    }
    public function getName() {
        return $this->name;
    }
    public function umbenennen($str) {
        $this->name = $str;
    }    
}
?>
