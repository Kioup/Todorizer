<?php

class Connection {
    
	private $host;
	private $dbname;
	private $username;
	private $password;

    public function __construct(){
        
        $this->host = "localhost";
        $this->dbname = "databaseTodorizer";
        $this->username = "root";
        $this->password = "";
        
    }
    
    public function get_connection(){

        $dbserver = 'mysql:host='. $this->host .';dbname='. $this->dbname;
        try {
            $db = new PDO($dbserver, $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        } catch (PDOException $e) {
            //echo $e;
        }
        return $db;
        
    }
}