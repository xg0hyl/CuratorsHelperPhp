<?php 
include_once "../model/connection.php";
include_once "../model/Students.php";
include_once "../model/Curators.php";

    
    if (isset($_POST['selectedGroup'])) {
        session_start();
        $database = new Database();
        $db = $database->GetConnection();

        $curator = new Curators($db);
        $thisCur = $curator->currentCurator($_SESSION['id_pass']);

        $student = new Students($db);
        $selectedGroup = $_POST['selectedGroup'];
        $data = null;
        if ($selectedGroup === "all"){
            $data = $student->GetAll();
        } else {
            $data = $student->GetAllByGroup($selectedGroup);
        }
        if ($data != null) {
            foreach ($data as $row) {
                $FIO = explode(' ', $row['FIO']);
                $name = $row['FIO'];
                $photo = base64_encode($row['photo']);
                $phone = $row['phone'];
                echo '<div class="list_st-item">';
                    if (count($FIO) === 3) {
                    echo '<div class="st_item-name">' . $FIO[0] . ' ' . $FIO[1] . '<br>' . $FIO[2] . '</div>';
                    } else {
                    echo '<div class="st_item-name">' . $name . '</div>';
                    }
                    if ($photo != null) {
                        echo '<img class="st_item-photo" src="data:image/jpeg;base64,' . $photo .'">';
                    } else {
                        echo '<img class="st_item-photo" src="../images/nonePhoto.png">';
                    }
                    echo '<div class="st_item-phone">' . $phone . '</div>';
                    if ($selectedGroup === $thisCur['id_group']) {
                        echo '<div class="st_item-more" data-student-id="' . $row['id_student'] . '">Подробнее...</div>';
                    } 
                echo '</div>';
            }
        }
    }
           

?>