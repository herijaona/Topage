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
}
?>