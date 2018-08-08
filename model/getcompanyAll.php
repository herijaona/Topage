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
        $companies = [];
        global $db;
        $q = $db->query('SELECT lastname FROM register');
        $q->execute();
        $resultado = $q->fetchAll(PDO::FETCH_COLUMN);
        var_dump($resultado);

    }
}
?>