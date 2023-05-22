<?php 
include_once "../model/Students.php";
include_once "../model/connection.php";

$id_student = $_POST['studentId'];

$database = new Database();
$db = $database->GetConnection();
$student = new Students($db);

$result = $student->GetOne($id_student);
$hostel = $student->getHostel($id_student);
$passport = $student->getPassport($id_student);
$mother = $student->getMother($id_student);
$father = $student->getFather($id_student);
$opekun = $student->GetOpekun($id_student);
$brothers = $student->GetBrothers($id_student);
$sisters = $student->GetSisters($id_student);

$studentData = array(
    'id_student' => $result['id_student'],
    'FIO' => $result['FIO'],
    'date_born' => $result['date_born'],
    'adres' => $result['adres'],
    'id_group' => $result['id_group'],
    'school' => $result['school'],
    'national' => $result['national'],
    'phone' => $result['phone'],
    'health' => $result['health'],
    'relationship' => $result['relationship'],
    'hobby' => $result['hobby'],
    'expelled' => $result['expelled']
);

if ($result['photo'] != null) {
    $studentData['photo'] = 'data:image/jpeg;base64,' . base64_encode($result['photo']);
} else {
    $studentData['photo'] = "../images/nonePhoto.png";
}

if ($hostel) {
    $studentData['room'] = $hostel['room'];
}

if ($passport) {
    $studentData['passport'] = array(
        'num_passport' => $passport['num_passport'],
        'person_issue' => $passport['person_issue'], 
        'date_issue' => $passport['date_issue']
    );
} else {
    $studentData['passport'] = null;
}

if ($mother) {
    $str_mother = $mother['parent'] . ': ' . $mother['FIO'] . ', ' . $mother['date_bord'] . ', ' .
                $mother['adres'] . ', ' . $mother['phone'] . ', ' . $mother['job_place'] . ', ' . $mother['job'];
    $studentData['mother'] = array(
        'parent' => $mother['parent'],
        'FIO' => $mother['FIO'],
        'date_bord' => $mother['date_bord'],
        'adres' => $mother['adres'],
        'phone' => $mother['phone'],
        'job_place' => $mother['job_place'],
        'job' => $mother['job']
    );
} else if ($opekun) {
    $str_opekun = $opekun['parent'] . ': ' . $opekun['FIO'] . ', ' . $opekun['date_bord'] . ', ' .
                $opekun['adres'] . ', ' . $opekun['phone'] . ', ' . $opekun['job_place'] . ', ' . $opekun['job'];
    $studentData['mother'] = array(
        'parent' => $opekun['parent'],
        'FIO' => $opekun['FIO'],
        'date_bord' => $opekun['date_bord'],
        'adres' => $opekun['adres'],
        'phone' => $opekun['phone'],
        'job_place' => $opekun['job_place'],
        'job' => $opekun['job']
    );
} else {
    $studentData['mother'] = null;
}

if ($father) {
    $str_father = $father['parent'] . ': ' . $father['FIO'] . ', ' . $father['date_bord'] . ', ' .
                $father['adres'] . ', ' . $father['phone'] . ', ' . $father['job_place'] . ', ' . $father['job'];
    $studentData['father'] = array(
        'parent' => $father['parent'],
        'FIO' => $father['FIO'],
        'date_bord' => $father['date_bord'],
        'adres' => $father['adres'],
        'phone' => $father['phone'],
        'job_place' => $father['job_place'],
        'job' => $father['job']
    );
} else {
    $studentData['father'] = null;
}

if ($brothers) {
    $str_brother = null;
    foreach ($brothers as $row) {
        $str_brother .= $row['whois'] . ': ' . $row['FIO'] . ', ' . $row['date_born'] . ', ' . $row['status'] . "\n";
    }
    $studentData['brothers'] = $str_brother;
}


if ($sisters) {
    $str_sisters = null;
    foreach ($sisters as $row) {
        $str_sisters .= $row['whois'] . ': ' . $row['FIO'] . ', ' . $row['date_born'] . ', ' . $row['status'] . "\n";
    }
    $studentData['sisters'] = $str_sisters;
}

echo json_encode($studentData);
?>
