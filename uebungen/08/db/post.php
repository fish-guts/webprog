<?php

class post {
    private $dbhost = 'localhost';
    private $dbname = 'loc_orm';
    private $dbuser = 'loc_orm';
    private $dbpass = '12341234';
    private $table = "tbl_person";
    
    private $id;
    private $title;
    private $content;
    private $created;

   
    public function __construct($id)  
    {  
       $this->id = $id;
    }  
        
    public function findById($id) {
        $dsn = "mysql:host=".$this->dbhost.";dbname=".$this->dbname; 
        $sql = 'select ' .
                'tbl_person.id,' .
                'tbl_person.created,' .
                'tbl_person.title,' .
                'tbl_person.content ' .
                'FROM tbl_person ' .
                'WHERE id=?';
        $pdo = new PDO($dsn, "root","");
        $pds = $pdo->prepare($sql);
        $pds->execute(array($id));
        if ($row = $pds->fetch()) {
            return $row;                    
        } else {
            return null;
        }

    }
    
    public function save() {
        $dsn = "mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname;
        $sql = "UPDATE tbl_person SET created=?, title=?, content=? WHERE id=?";
        $pdo = new PDO($dsn, $this->dbuser, $this->dbpass);
        $pdo->beginTransaction();
        $pds = $pdo->prepare($sql);
        $pds->execute(array($this->created,$this->title,$this->content,$this->id)); 
        $pdo->commit();
    }
    
    public function delete() {
        $dsn = "mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname;
        $sql = "DELETE from  tbl_person WHERE id=?";
        $pdo = new PDO($dsn, $this->dbuser, $this->dbpass);
        $pdo->beginTransaction();
        $pds = $pdo->prepare($sql);
        $pds->execute(array($this->id));         
        $pdo->commit();
    }
    
    public function insert() {
        
        $dsn = "mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname;
        $sql = "INSERT INTO tbl_person (created,title,content) VALUES(?,?,?)";
        $pdo = new PDO($dsn, $this->dbuser, $this->dbpass);
        $pdo->beginTransaction();
        $pds = $pdo->prepare($sql);
        $pds->execute(array($this->created,$this->title,$this->content));   
        $pdo->commit();
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    public function setCreated($created) {
        $this->created = $created;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function setContent($content) {
        $this->content = $content;
    }
    public function getId() {
        return $this->id;
    }
    public function getCreated() {
        return $this->created;
    }
    public function getTitle() {
        return $this->title;
    }
    public function getContent() {
        return $this->content;
    }
 
    
    /* Data Table Gateway Pattern, rest gleich */
    
    public function findByAttribute($attr,$value) {
        
       $dsn = "mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname;
       $sql = 'select ' .
                'tbl_person.id,' .
                'tbl_person.created,' .
                'tbl_person.title,' .
                'tbl_person.content ' .
                'FROM tbl_person ' .
                'WHERE '.$attr.'=?';
        $pdo = new PDO($dsn, $this->dbuser, $this->dbpass);
        $pds = $pdo->prepare($sql);
        $pds->execute(array($value));
        if ($row = $pds->fetch()) {
            return $row;
        }        
    }
}

?>
