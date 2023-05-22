<?php
include_once "../model/Plan_work.php";
include_once "../model/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $planId = $_POST['planId'];
    $typeOfWork = $_POST['typeOfWork'];
    $date = $_POST['date'];
    $formOfWork = $_POST['formOfWork'];
    $checkMark = $_POST['checkMark'];

    $database = new Database();
    $db = $database->GetConnection();

    $planWork = new Plan_work($db);

    $result = $planWork->Update($planId, $typeOfWork, $date, $formOfWork, $checkMark);

    if ($result) {
        echo "Данные успешно обновлены.";
    } else {
        echo "Ошибка при обновлении данных.";
    }
}
?>