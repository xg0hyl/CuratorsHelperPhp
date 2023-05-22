<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        session_start();
        $listParam = array();
        include_once "../model/connection.php";
        include_once "../model/Curators.php";
        include_once "../model/Passwords.php";
        $database = new Database();
        $db = $database->GetConnection();

        if (!empty($_POST['phone-setting'])) {
            $listParam['phone'] = $_POST['phone-setting'];
        }
    
        if (!empty($_POST['date-settings'])) {
            $listParam['date_born'] = $_POST['date-settings'];
        }
    
        if (!empty($_POST['email-setting'])) {
            $listParam['email'] = $_POST['email-setting'];
        }
        

        if (!empty($_POST['password-setting'])) {
            $password = $_POST['password-setting'];
            $passwordObj = new Password($db);
            if ($passwordObj->UpdatePassword($_SESSION['id_pass'], $password)) {
            }
        }

        if (!empty($listParam)) {
            $curator = new Curators($db);
            $resultCurator = $curator->currentCurator($_SESSION['id_pass']);
            if ($curator->updateCurator($resultCurator['id_curator'], $listParam)) {
            }
        }
            header("Location: ../pages/main.php");
            exit();
    }
?>