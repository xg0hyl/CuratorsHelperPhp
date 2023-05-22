<?php 
class Passport {
    private $table_name = "Passport";
    private $conn;

    public $id_passport;
    public $id_student;
    public $num_passport;
    public $person_issue;
    public $date_issue;

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

    public function update($id_student, $field, $value) {
        if ($this->GetOne($id_student)) {
            $sql = "UPDATE $this->table_name SET ";
            $params = array();
            $first = true;
    
            foreach ($field as $key => $fieldName) {
                if (!$first) {
                    $sql .= ", ";
                }
    
                $sql .= "$fieldName = :$key";
                $params[":$key"] = $value[$key];
                $first = false;
            }
    
            $sql .= " WHERE id_student = :id_student";
            $params[":id_student"] = $id_student;
    
            $stmt = $this->conn->prepare($sql);
    
            if ($stmt->execute($params)) {
                return true;
            } else {
                return false;
            }
        } else {
            $sql = "INSERT INTO $this->table_name (id_student, ";
            $valuesSql = "VALUES (:id_student, ";
            $params = array(":id_student" => $id_student);
            $first = true;
    
            foreach ($field as $key => $fieldName) {
                if (!$first) {
                    $sql .= ", ";
                    $valuesSql .= ", ";
                }
    
                $sql .= $fieldName;
                $valuesSql .= ":$key";
                $params[":$key"] = $value[$key];
                $first = false;
            }
    
            $sql .= ") " . $valuesSql . ")";
            $stmt = $this->conn->prepare($sql);
    
            if ($stmt->execute($params)) {
                return true;
            } else {
                return false;
            }
        }
    }
    

}
?>