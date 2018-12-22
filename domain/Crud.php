
<?php
require_once 'config/DB.php';

abstract class Crud extends DB
{
    protected $table;

    public abstract function insert();
    public abstract function update($id);

    public function find($id){
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $stmt = Connect::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function findAll(){
        $sql = "SELECT * FROM $this->table";
        $stmt = Connect::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function findAllProcesso($id){
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $stmt = Connect::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE id = $id";
        $stmt = Connect::prepare($sql);
        return $stmt->execute();
    }
}


?>
