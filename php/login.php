<?php
    session_start();
    include_once "../model/connection.php";
    include_once "../model/Curators.php";
    include_once "../model/Passwords.php";


    $database = new Database();
    $db = $database->GetConnection();
    $password = new Password($db);
    $result = $password->FindPass($_POST['login'], $_POST['password']);
    $curator = new Curators($db);

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
        echo "Успех";
    }
?>
