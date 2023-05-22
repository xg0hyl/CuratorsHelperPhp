<?php
include_once "../model/Report.php";
include_once "../model/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $reportId = $_POST['reportId'];
    $textReport = $_POST['textReport'];
    $hoursWeek = $_POST['hoursWeek'];
    $checkMark = $_POST['checkMark'];

    $database = new Database();
    $db = $database->GetConnection();

    $report = new Report($db);

    $result = $report->Update($reportId, $textReport, $hoursWeek, $checkMark);

    if ($result) {
        echo "Данные успешно обновлены.";
    } else {
        echo "Ошибка при обновлении данных.";
    }
}
?>