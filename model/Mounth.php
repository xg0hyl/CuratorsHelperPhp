<?php 
class Mounth {
    private $table_name = "Mounth";
    private $conn;

    public $id_mounth;
    public $mounth;

    public function __construct($db) {
        $this->conn = $db;
      }

    public function GetAll() {
        $sql = "SELECT * FROM $this->table_name";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function GetOne($id_mounth) {
        $sql = "SELECT * FROM $this->table_name where id_mounth = :id_mounth";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_mounth', $id_mounth);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

}
?>