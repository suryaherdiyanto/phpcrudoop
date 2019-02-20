<?php
require_once __DIR__.'/../Connection.php';

class Model {
    protected $fields = [];
    protected $table;
    protected $primary_key = 'id';
    private $pdo;

    public function __construct(){
        $this->pdo = new Connection();
    }

    public function serializeData(array $data){
        $keys = [];
        foreach($data as $key => $value){
            $keys[':'.$key] = $value;
        }
        return $keys;
    }

    public function all(){
        return $this->pdo->getConnection()->query("select ".implode(',', $this->fields)." from ".$this->table)->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById(int $id){
        return $this->pdo->getConnection()->query("select ".implode(',', $this->fields)." from ".$this->table." where id = ".$id)->fetchAll(PDO::FETCH_OBJ)[0];
    }

    public function insert(array $data){
        array_shift($this->fields);
        $fields = implode(',', $this->fields);
        $parameters = $this->serializeData($data);
        $keys = implode(',', array_keys($parameters));

        $sql = $this->pdo->getConnection()->prepare('insert into '.$this->table.' ('.$fields.') values('.$keys.')');
        $sql->execute($parameters);
        return true;
    }

    public function update(int $id, array $data){
        $statement = '';
        foreach($data as $key => $value){
            $statement .= $key."='".$value."',";
        }
        $statement = rtrim($statement, ',');
        $sql = $this->pdo->getConnection()->prepare('update '.$this->table.' set '.$statement.' where '.$this->primary_key.' = '.$id);
        $sql->execute();
        return true;
    }

    public function delete(int $id){
        return $this->pdo->getConnection()->exec('delete from '.$this->table.' where '.$this->primary_key.' = '.$id);
    }
}