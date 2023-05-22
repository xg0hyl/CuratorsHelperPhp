<?php
class Password {

  private $table_name = "Passwords";
  private $conn;

  public $id_num;
  public $password;
  public $login;
  public $salt;

  public function __construct($db) {
    $this->conn = $db;
  }

  public function FindPass($login, $password)
  {
      $sql = "SELECT * FROM Passwords WHERE login=:login AND password=:password";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':login', $login);
      $stmt->bindParam(':password', $password);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;

  }

  public function UpdatePassword($id_num, $password) {
    $sql = "UPDATE $this->table_name SET password = :password WHERE id_num = :id_num";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':id_num', $id_num);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
  }
  

  }
  
?>