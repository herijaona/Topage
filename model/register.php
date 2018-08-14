<?php
class Register{
 
    // database connection and table name
    private $conn;
    private $table_register = "register";
 
    // object properties
    public $id;
    public $name;
    public $lastname;
    public $email;
    public $adresse;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    function create(){
 
        $query = "INSERT INTO " . $this->table_register . 
        " SET name=:name, lastname=:lastname, password=:password, email=:email, adresse=:adresse";
 
        $stmt = $this->conn->prepare($query);
        
        // posted values
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->last=htmlspecialchars(strip_tags($this->lastname));
        $this->last=htmlspecialchars(strip_tags($this->password));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->adresse=htmlspecialchars(strip_tags($this->adresse));
        // bind values 
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":lastname", $this->lastname);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":adresse", $this->adresse);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }

    public function Login($username, $password)
    {
        try {
            $query = $this->conn->prepare("SELECT name FROM  ". $this->table_register . " WHERE (lastname=:lastname OR email=:lastname) AND password=:password");
            $query->bindParam("lastname", $lastname, PDO::PARAM_STR);
            $enc_password = hash('sha256', $password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_OBJ);
                return $result->id;
                var_dump($query->fetch(PDO::FETCH_OBJ));
            } else {
                var_dump('test2');
                var_dump($query->fetch(PDO::FETCH_OBJ));
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
 
}
?>