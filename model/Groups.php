<?php 
class Groups {
    private $table_name = "Groups";
    private $conn;
  
    public $id_group;
    public $name;

    public function __construct($db) {
        $this->conn = $db;
      }

    public function currentGroup($id_group) {
        $sql = "SELECT * FROM $this->table_name WHERE id_group=:id_group";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_group', $id_group);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function GetAllWithoutNone() {
        $sql = "SELECT * FROM $this->table_name where name != 'None' ORDER BY name";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}
?>