<?php 
class Report {
    private $table_name = "Report";
    private $conn;

    public $id_report;
    public $id_group;
    public $mounth;
    public $text_report;
    public $hours_week;
    public $check_end;

    public function __construct($db) {
        $this->conn = $db;
      }

    public function currentReport($id_mounth,$id_group) {
        $sql = "SELECT * FROM $this->table_name where mounth = :id_mounth and id_group = :id_group";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_mounth', $id_mounth);
        $stmt->bindParam(':id_group', $id_group);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function Update($id_report, $text_report, $hours_week, $check_end) {
      $sql = "UPDATE $this->table_name SET text_report = :text_report, hours_week = :hours_week, check_end = :check_end 
      WHERE id_report = :id_report";
      $stmt = $this->conn->prepare($sql);
  
      $stmt->bindParam(':text_report', $text_report);
      $stmt->bindParam(':hours_week', $hours_week);
      $stmt->bindParam(':check_end', $check_end);
      $stmt->bindParam(':id_report', $id_report);
  
      if ($stmt->execute()) {
          return true;
      } else {
          return false;
      }
    }

    public function Insert($text_report, $hours_week, $check_end, $id_group, $mounth) {
      $sql = "INSERT INTO $this->table_name (text_report, hours_week, check_end, id_group, mounth) 
      VALUES (:text_report, :hours_week, :check_end, :id_group, :mounth)";
      $stmt = $this->conn->prepare($sql);
  
      $stmt->bindParam(':text_report', $text_report);
      $stmt->bindParam(':hours_week', $hours_week);
      $stmt->bindParam(':check_end', $check_end);
      $stmt->bindParam(':id_group', $id_group);
      $stmt->bindParam(':mounth', $mounth);
  
      if ($stmt->execute()) {
          return true;
      } else {
          return false;
      }
    }

    public function Delete($id_report) {
        $sql = "DELETE FROM $this->table_name WHERE id_report = :id_report";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_report', $id_report);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

}
?>