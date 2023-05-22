<?php
include_once "../model/connection.php";

$id = $_POST['studentId']; 

$DataBase = new Database();
$db = $DataBase->GetConnection();

$sql = "SELECT * FROM Brothers_sisters WHERE id_student = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<option value="none" selected>Выберите родственника</option>';
foreach ($results as $row) {
    echo '<option value="'.$row['id_num'].'" data-whois="' . $row['whois'] . '">' . $row['FIO'] . '</option>';
}

?>
