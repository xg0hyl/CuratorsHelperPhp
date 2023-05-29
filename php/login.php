<?php
session_start();
include_once "../model/connection.php";
include_once "../model/Curators.php";
include_once "../model/Passwords.php";

$database = new Database();
$db = $database->GetConnection();
$passwordObj = new Password($db);
$curator = new Curators($db);

$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $data['login'];
    $password = $data['password'];

    $result = $passwordObj->FindPass($login, $password);

    if ($result) {
        $_SESSION['logged_in'] = true;

        $resultCurator = $curator->currentCurator($result['id_num']);

        $fio = explode(' ', $resultCurator['FIO']);

        if (count($fio) >= 2) {
            $nameCurator = $fio[1];
        } else {
            $nameCurator = $resultCurator['FIO'];
        }

        $_SESSION['username'] = $nameCurator;
        $_SESSION['id_pass'] = $result['id_num'];

        header('Content-Type: application/json');
        echo json_encode(array('success' => true, 'message' => 'Успех'));
    } else {
        header('Content-Type: application/json');
        echo json_encode(array('success' => false, 'message' => 'Ошибка авторизации'));
    }
}
?>
