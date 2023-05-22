<?php
class Cyclics {
    private $table_name = "cyclics";
    private $conn;
  
    public $id_cyclic;
    public $name;
    public $cabinet;
    public $FIO_predsedatel;
    public $phone_predsedatel;
  
    public function __construct($db) {
      $this->conn = $db;
    }

    public function currentCyclic($id_cyclic) {
        $sql = "SELECT * FROM $this->table_name WHERE id_cyclic=:id_cyclic";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_cyclic', $id_cyclic);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

}
?>
