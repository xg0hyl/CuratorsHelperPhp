<?php 
class Type_plan {
    private $table_name = "Type_plan_work";
    private $conn;

    public $id_type;
    public $name;

    public function __construct($db) {
        $this->conn = $db;
      }

      public function currentType($id_type) {
        $sql = "SELECT * FROM $this->table_name WHERE id_type=:id_type";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_type', $id_type);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
      }

      public function GetAll() {
        $sql = "SELECT * FROM $this->table_name";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
      }

}
?>