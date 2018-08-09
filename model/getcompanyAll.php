<?php
class CompanyAll{
 
    // database connection and table 
    private $conn;
    private $table_register = "register";
 
    // object properties
    private $_db;
 
    public function __construct($db){
        $this->conn = $db;
    }
    public function getAll(){
        global $db;
        $q = $db->query('SELECT name,lastname,email,adresse FROM register');
        $q->execute();
        $resultado = $q->fetchAll();
        return $resultado;
    }
}
?>