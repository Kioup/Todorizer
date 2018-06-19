<?php

class Connection {
    
	private $host;
	private $dbname;
	private $username;
	private $password;

    public function __construct(){
        
        $this->host = "db742415546.db.1and1.com";
        $this->dbname = "db742415546";
        $this->username = "dbo742415546";
        $this->password = "Todorizer2018.";
        
    }
    public function get_connection(){

        $dbserver = 'mysql:host='. $this->host .';dbname='. $this->dbname;
        
        $db = new PDO($dbserver, $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        
        return $db;
        
    }

}