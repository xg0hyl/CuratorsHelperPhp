<?php
include_once "../model/Report.php";
include_once "../model/connection.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $reportId = $_POST['reportId'];
    $database = new Database();
    $db = $database->GetConnection();
    $report = new Report($db);

    $result = $report->Delete($reportId);

    if ($result) {
        echo "Данные успешно удалены.";
    } else {
        echo "Ошибка при удаления данных.";
    }
}
?>