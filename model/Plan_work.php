<?php 
class Plan_work {
    private $table_name = "Plan_work";
    private $conn;

    public $id_plan;
    public $id_group;
    public $id_type;
    public $mounth;
    public $date;
    public $form_work;
    public $check_end;

    public function __construct($db) {
        $this->conn = $db;
      }

    public function currentPlan($id_mounth,$id_group) {
        $sql = "SELECT * FROM $this->table_name where mounth = :id_mounth and id_group = :id_group";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_mounth', $id_mounth);
        $stmt->bindParam(':id_group', $id_group);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getType($id) {
        include_once "Type_plan.php";
        $group = new Type_plan($this->conn);
        $result = $group->currentType($id);
        return $result;      
      }

    public function Update($id_plan, $id_type, $date, $form_work, $check_end) {
      $sql = "UPDATE $this->table_name SET id_type = :id_type, date = :date, form_work = :form_work, check_end = :check_end WHERE id_plan = :id_plan";
      $stmt = $this->conn->prepare($sql);
  
      $stmt->bindParam(':id_plan', $id_plan);
      $stmt->bindParam(':id_type', $id_type);
      $stmt->bindParam(':date', $date);
      $stmt->bindParam(':form_work', $form_work);
      $stmt->bindParam(':check_end', $check_end);
  
      if ($stmt->execute()) {
          return true;
      } else {
          return false;
      }
    }

    public function Insert($id_type, $date, $form_work, $check_end, $id_group, $mounth) {
      $sql = "INSERT INTO $this->table_name (id_type, date, form_work, check_end, id_group, mounth) 
      VALUES (:id_type, :date, :form_work, :check_end, :id_group, :mounth)";
      $stmt = $this->conn->prepare($sql);
  
      $stmt->bindParam(':id_type', $id_type);
      $stmt->bindParam(':date', $date);
      $stmt->bindParam(':form_work', $form_work);
      $stmt->bindParam(':check_end', $check_end);
      $stmt->bindParam(':id_group', $id_group);
      $stmt->bindParam(':mounth', $mounth);
  
      if ($stmt->execute()) {
          return true;
      } else {
          return false;
      }
    }
    
    public function Delete($id_plan) {
      $sql = "DELETE FROM $this->table_name WHERE id_plan = :id_plan";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id_plan', $id_plan);
      if ($stmt->execute()) {
          return true;
      } else {
          return false;
      }
  }

}
?>