<?php 
class OtherParents {
    private $table_name = "Brothers_sisters";
    private $conn;

    public $id_num;
    public $id_student;
    public $FIO;
    public $date_born;
    public $status;
    public $whois;

    public function __construct($db) {
        $this->conn = $db;
      }

    public function GetBrothers($id_student) {
        $sql = "SELECT * FROM $this->table_name where id_student = :id_student AND whois = 'Брат'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_student', $id_student);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function GetSisters($id_student) {
        $sql = "SELECT * FROM $this->table_name where id_student = :id_student AND whois = 'Сестра'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_student', $id_student);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update($id_student, $field, $value) {
        $valOther = $value['id_num'];
        unset($value['id_num']);
        unset($field['id_num']);
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
    
            $sql .= " WHERE id_student = :id_student AND id_num = :id_num";
            $params[":id_student"] = $id_student;
            $params[":id_num"] = $valOther;
    
            $stmt = $this->conn->prepare($sql);
    
            if ($stmt->execute($params)) {
                return true;
            } else {
                return false;
            }
    }

    public function insert($id_student, $field, $value) { 
        unset($value['id_num']);
        unset($field['id_num']);
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
?>