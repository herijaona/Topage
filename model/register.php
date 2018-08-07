<?php
class Register{
 
    // database connection and table name
    private $conn;
    private $table_register = "register";
 
    // object properties
    public $id;
    public $name;
    public $lastname;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    function create(){
 
        $query = "INSERT INTO " . $this->table_register . " SET name=:name, lastname=:lastname";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->last=htmlspecialchars(strip_tags($this->lastname));
        // bind values 
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":lastname", $this->lastname);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
}
?>