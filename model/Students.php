<?php 
class Students {
    private $table_name = "student";
    private $conn;

    public $id_student;
    public $FIO;
    public $date_born;
    public $adres;
    public $id_group;
    public $school;
    public $national;
    public $phone;
    public $health;
    public $relationship;
    public $photo;
    public $hobby;
    public $expelled;

    public function __construct($db) {
        $this->conn = $db;
      }

    public function GetAll() {
        $sql = "SELECT * FROM $this->table_name where expelled is null";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update($studentId, $field, $value) {
        if ($field != 'national') {
            $sql = "UPDATE $this->table_name SET $field = :value WHERE id_student = :studentId";
        } else {
            $sql = "UPDATE $this->table_name SET [national] = :value WHERE id_student = :studentId";
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

    public function GetAllByGroup($id_group) {
        $sql = "SELECT * FROM $this->table_name where id_group = :id_group AND expelled is null";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_group', $id_group);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function GetOne($id_student) {
        $sql = "SELECT * FROM $this->table_name where id_student = :id_student";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_student', $id_student);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getGroup($id) {
        include_once "Groups.php";
        $group = new Groups($this->conn);
        $result = $group->currentGroup($id);
        return $result;      
      }

    public function getHostel($id) {
        include_once "Hostel.php";
        $group = new Hostel($this->conn);
        $result = $group->getOne($id);
        return $result;      
    }

    public function getPassport($id) {
        include_once "Passport.php";
        $group = new Passport($this->conn);
        $result = $group->getOne($id);
        return $result;      
    }

    public function getMother($id) {
        include_once "Parent.php";
        $group = new Parents($this->conn);
        $result = $group->getMother($id);
        return $result;      
    }

    public function getFather($id) {
        include_once "Parent.php";
        $group = new Parents($this->conn);
        $result = $group->getFather($id);
        return $result;      
    }

    public function getOpekun($id) {
        include_once "Parent.php";
        $group = new Parents($this->conn);
        $result = $group->getOpekun($id);
        return $result;      
    }

    public function getBrothers($id) {
        include_once "OtherParent.php";
        $group = new OtherParents($this->conn);
        $result = $group->getBrothers($id);
        return $result;      
    }

    public function getSisters($id) {
        include_once "OtherParent.php";
        $group = new OtherParents($this->conn);
        $result = $group->getSisters($id);
        return $result;      
    }

}
?>