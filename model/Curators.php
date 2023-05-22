<?php
class Curators {
    private $table_name = "Curators";
    private $conn;
  
    public $id_curator;
    public $FIO;
    public $id_group;
    public $education;
    public $phone;
    public $date_born;
    public $photo;
    public $id_cyclic;
    public $email;
    public $id_pass;
  
    public function __construct($db) {
      $this->conn = $db;
    }

    public function currentCurator($id_pass) {
        $sql = "SELECT * FROM $this->table_name WHERE id_pass=:id_pass";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_pass', $id_pass);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateCurator($id_curator, $data) {
      $updateFields = '';
      $params = [];
  
      foreach ($data as $field => $value) {
          $updateFields .= $field . ' = :' . $field . ', ';
          $params[':' . $field] = $value;
      }
  
      $updateFields = rtrim($updateFields, ', ');
  
      $sql = "UPDATE $this->table_name SET $updateFields WHERE id_curator = :id_curator";
      $stmt = $this->conn->prepare($sql);
  
      $params[':id_curator'] = $id_curator;
  
      if ($stmt->execute($params)) {
          return true;
      } else {
          return false;
      }
    }
  


    public function getGroup($id) {
      include_once "Groups.php";
      $group = new Groups($this->conn);
      $result = $group->currentGroup($id);
      return $result;      
    }
    
    public function getCyclic($id) {
      include_once "Cyclic.php";
      $cyclic = new Cyclics($this->conn);
      $result = $cyclic->currentCyclic($id);
      return $result;   
    }

}
?>