<?php
include_once "../model/connection.php";

$id_num = $_POST['id_num']; 

$DataBase = new Database();
$db = $DataBase->GetConnection();

$sql = "SELECT * FROM Brothers_sisters WHERE id_num = :id_num";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id_num', $id_num);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($result);
?>
