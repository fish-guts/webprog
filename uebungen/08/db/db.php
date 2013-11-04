<?php

class db {

    private $dbhost = 'localhost';
    private $dbname = 'loc_orm';
    private $dbuser = 'loc_orm';
    private $dbpass = '12341234';
    private $table = "tbl_person";

    function load() {
        $dsn = "mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname;
        $sql = 'SELECT '
                . ' tbl_person.id, '
                . ' tbl_person.created, '
                . ' tbl_person.title,'
                . ' tbl_person.content '
                . ' FROM tbl_person';

        $pdo = new PDO($dsn, $this->dbuser, $this->dbpass);
        $pds = $pdo->prepare($sql);
        $pds->execute();
        $result = $pds->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}
