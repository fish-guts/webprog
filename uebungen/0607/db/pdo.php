<?php
class db {

    private $dbhost = 'localhost';
    private $dbname = 'hs1314';
    private $dbuser = 'zhaw';
    private $dbpass = 'zhaw1234';
    private $table_user = "user";
    private $table_todo = "todo";
    private $table_status = "status";
    public static $LOGIN_OK = true;

    function login($user, $pass) {
        session_start();
        $dsn = "mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname;
        $sql = 'SELECT id,username,password,email,realname FROM user WHERE username=?';
        $pdo = new PDO($dsn, $this->dbuser, $this->dbpass);
        $pds = $pdo->prepare($sql);
        $pds->execute(array($user));
        if ($row = $pds->fetch()) {
            if($row[2]==$pass) {
                $_SESSION['username'] = $row[1];
                $_SESSION['realname'] = $row[4];
                $_SESSION['email'] = $row[3];
                $_SESSION['userid'] = $row[0];
                return true;
            } else {
                return false;
            }
        } else {
            die("a problem has occured");
        }
    }
    
    function load_todo($status) {
        $dsn = "mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname;
        $sql = 'SELECT '
                .' todo.id, '
                .' user.id as userid, '
                .' todo.title, '
                .' todo.date,'
                .' user.username,'
                .' todo_status.name as status,'
                .' todo.text'
                .' FROM todo'
                .' LEFT JOIN todo_status ON todo.status = todo_status.id'
                .' LEFT JOIN user ON todo.user = user.id'
                .' WHERE status=?';
        $pdo = new PDO($dsn, $this->dbuser, $this->dbpass);
        $pds = $pdo->prepare($sql);
        $pds->execute(array($status));
        $result = $pds->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    function save_entry($id,$text) {
        $date = date('Y-m-d H:i:s');
        $dsn = "mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname;        
        $sql = "UPDATE todo SET text=?, date=? WHERE id=?";
        $pdo = new PDO($dsn, $this->dbuser, $this->dbpass);
        $pds = $pdo->prepare($sql);
        $pds->execute(array($text,$date,$id));     
    }
    function complete_entry($id) {
        $date = date('Y-m-d H:i:s');
        $dsn = "mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname;        
        $sql = "UPDATE todo SET status=2, date=? WHERE id=?";
        $pdo = new PDO($dsn, $this->dbuser, $this->dbpass);
        $pds = $pdo->prepare($sql);
        $pds->execute(array($date,$id));     
    }    
    function delete_entry($id) {
        $dsn = "mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname;        
        $sql = "DELETE FROM todo WHERE id=?";
        $pdo = new PDO($dsn, $this->dbuser, $this->dbpass);
        $pds = $pdo->prepare($sql);
        $pds->execute(array($id));     
    }    
    
      

    function create_entry($username,$title,$text) {
        $date = date('Y-m-d H:i:s');
        $dsn = "mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname;        
        $sql = "INSERT INTO todo (user,title,text,date,status) values(?,?,?,?,?);";
        $pdo = new PDO($dsn, $this->dbuser, $this->dbpass);
        $pds = $pdo->prepare($sql);
        $pds->execute(array($_SESSION['userid'],$title,$text,$date,1));     
    }         
}


?>