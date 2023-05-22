<?php 
    include_once "../model/Students.php";
    include_once "../model/Curators.php";
    include_once "../model/connection.php";

    session_start();
    $database = new Database();
    $db = $database->GetConnection();
    $studentId = $_POST['studentId'];

    $student = new Students($db);
    $curator = new Curators($db);

    $thisCur = $curator->currentCurator($_SESSION['id_pass']);
    $result = $student->GetAllByGroup($thisCur['id_group']);
    foreach ($result as $row) {
        $selected = ($row['id_student'] == $studentId) ? 'selected' : '';
        echo '<option value="'.$row['id_student'].'" ' . $selected . '>'.$row['FIO'].'</option>';
    }
?>