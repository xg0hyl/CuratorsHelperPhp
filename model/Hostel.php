<?php 
class Hostel {
    private $table_name = "Hostel";
    private $conn;

    public $id_hostel;
    public $id_student;
    public $room;

    public function __construct($db) {
        $this->conn = $db;
      }

    public function GetOne($id_student) {
        $sql = "SELECT * FROM $this->table_name where id_student = :id_student";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_student', $id_student);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update($studentId, $field, $value) {
        if ($this->GetOne($studentId)) {
            $sql = "UPDATE $this->table_name SET $field = :value WHERE id_student = :studentId";
        } else {
            $sql = "INSERT INTO $this->table_name (id_student, $field) VALUES (:studentId, :value)";
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':value', $value);
        $stmt->bindParam(':studentId', $studentId);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
?>