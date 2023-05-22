<?php
include_once "../model/Plan_work.php";
include_once "../model/connection.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $planId = $_POST['planId'];
    $database = new Database();
    $db = $database->GetConnection();
    $plan = new Plan_work($db);

    $result = $plan->Delete($planId);

    if ($result) {
        echo "Данные успешно удалены.";
    } else {
        echo "Ошибка при удаления данных.";
    }
}
?>