<?php
require_once("inc/lebewesen.php");
require_once("inc/mensch.php");
require_once("inc/schweizer.php");


    $mensch = new Mensch("Severin", "männlich");
    echo "Name: " . $mensch->getName() ."\n";
    $mensch->umbenennen("Andrew");
    echo "Alter von ". $mensch->getName().": " . $mensch->getAlter()."\n";
    echo $mensch->getName() ." ist ein " . get_class($mensch)."\n";
    echo "Der Vorfahre ist : " . $mensch->getVorfahre()."\n";
    $mensch->neueEvolutionsTheorie("Alien");
    echo "Der Vorfahre ist : " . $mensch->getVorfahre()."\n";
    $bankangestellter = new Schweizer("Ospel", "männlich");
    try {
        $bankangestellter->umbenennen("Dougan",false);
    } catch(Exception $ex) {
        echo "Nachricht der Behörde: " . $ex->getMessage();
    }
?>
