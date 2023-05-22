<?php
include_once "../model/Students.php";
include_once "../model/Passport.php";
include_once "../model/Hostel.php";
include_once "../model/Parent.php";
include_once "../model/OtherParent.php";
include_once "../model/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentId = $_POST['studentId'];
    $field = $_POST['field'];
    $value = $_POST['value'];
    $whatUpdate = $_POST['whatUpdate'];
    $database = new Database();
    $db = $database->GetConnection();
    if ($whatUpdate === 'student') {
        $student = new Students($db);
        $result = $student->update($studentId,$field,$value);
        return $result;
    }
    if ($whatUpdate === 'passport') {
        $passport = new Passport($db);
        $result = $passport->update($studentId,$field,$value);
        return $result;
    }
    if ($whatUpdate === 'hostel') {
        $hostel = new Hostel($db);
        $result = $hostel->update($studentId,$field,$value);
        return $result;
    } 
    if ($whatUpdate === 'parent') {
        $parent = new Parents($db);
        $result = $parent->update($studentId, $field, $value);
        return $result;
    }
    if ($whatUpdate === "other") {
        $other = new OtherParents($db);
        if ($value['id_num'] != 'none') {
            $result = $other->update($studentId, $field, $value);
            return $result;
        }
        else {
            $result = $other->insert($studentId, $field, $value);
            return $result;
        }
    }
}
?>
