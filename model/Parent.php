<?php 
class Parents {
    private $table_name = "Parents";
    private $conn;

    public $id_parent;
    public $id_student;
    public $FIO;
    public $adres;
    public $phone;
    public $job_place;
    public $job;
    public $date_bord;
    public $parent;

    public function __construct($db) {
        $this->conn = $db;
      }

    public function GetMother($id_student) {
        $sql = "SELECT * FROM $this->table_name where id_student = :id_student AND parent = 'Мать'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_student', $id_student);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function GetFather($id_student) {
        $sql = "SELECT * FROM $this->table_name where id_student = :id_student AND parent = 'Отец'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_student', $id_student);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function GetOpekun($id_student) {
        $sql = "SELECT * FROM $this->table_name where id_student = :id_student AND parent = 'Опекун'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_student', $id_student);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update($id_student, $field, $value) {
        $parent = null;
        $valParent = $value['parent'];
        $fieldParent = $field['parent'];
        

        switch ($valParent) {
            case 'Мать':
                $parent = $this->GetMother($id_student);
                break;
            case 'Отец':
                $parent = $this->GetFather($id_student);
                break;
            case 'Опекун':
                $parent = $this->GetOpekun($id_student);
                break;
        }
    
        if ($parent) {
            unset($value['parent']);
            unset($field['parent']);
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
    
            $sql .= " WHERE id_student = :id_student AND parent = :parent";
            $params[":id_student"] = $id_student;
            $params[":parent"] = $valParent;
    
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
    


    public function GetParent($id_student, $parent) {
        $sql = "SELECT * FROM $this->table_name WHERE id_student = :id_student AND parent = :parent";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_student', $id_student);
        $stmt->bindParam(':parent', $parent);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    

}
?>