<?php 

class Connection {
    private $credentials;
    private $connection;

    public function __construct(){
        $this->credentials = require_once(__DIR__ . '/../config/database.php');
    }

    public function getConnection(){
        $dsn = $this->credentials['mysql']['name'].':'.'dbname='.$this->credentials['mysql']['dbname'].';'.'host='.$this->credentials['mysql']['host'];
        
        try{
            $this->connection = new PDO($dsn, $this->credentials['mysql']['username'], $this->credentials['mysql']['password']);
            return $this->connection;
        }catch(PDOException $e){
            echo "Connection Failed: ".$e->getMessage();
        }
    }
}