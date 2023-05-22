<?php
include_once "../model/connection.php";
header('Content-Type: application/json');

$id = $_POST['studentId']; 

$DataBase = new Database();
$db = $DataBase->GetConnection();

$sql = "SELECT COUNT(*) as count, parent FROM Parents WHERE id_student = :id GROUP BY parent";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$col = 0;
$parents = array();

foreach ($results as $row) {
    $count = $row['count'];
    $parent = $row['parent'];
    
    $col += $count;
    $parents[] = $parent;
}

$response = array();
$response['count'] = $col;
$response['parents'] = $parents;

echo json_encode($response);
?>
