<?php
include_once "../model/Report.php";
include_once "../model/connection.php";
include_once "../model/Curators.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $textReport = $_POST['textReport'];
    $hoursWeek = $_POST['hoursWeek'];
    $checkMark = $_POST['checkMark'];
    $mounth = $_POST['mounth'];
    $database = new Database();
    $db = $database->GetConnection();
    $curator = new Curators($db);
    $resultCurator = $curator->currentCurator($_SESSION['id_pass']);
    $gr = $curator->getGroup($resultCurator['id_group']);
    $report = new Report($db);

    $result = $report->Insert($textReport, $hoursWeek, $checkMark, $gr['id_group'], $mounth);

    if ($result) {
        echo "Данные успешно добавлены.";
    } else {
        echo "Ошибка при добавлены данных.";
    }
}
?>