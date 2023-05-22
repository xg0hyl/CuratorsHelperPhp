<?php
include_once "../model/Plan_work.php";
include_once "../model/connection.php";
include_once "../model/Curators.php";

if (isset($_POST['selectedMonth'])) {
    session_start();
    $selectedMonth = $_POST['selectedMonth'];
    $database = new Database();
    $db = $database->GetConnection();
    $planWork = new Plan_work($db);
    $curator = new Curators($db);
    $resultCurator = $curator->currentCurator($_SESSION['id_pass']);
    $gr = $curator->getGroup($resultCurator['id_group']);

    $data = $planWork->currentPlan($selectedMonth, $gr['id_group']);

    $html = '';
    foreach ($data as $row) {
        $type = $planWork->getType($row['id_type']);
        $type_work = $type['name'];

        $html .= '<tr data-plan-id ="'. $row['id_plan'] . '">';
        $html .= '<td class="type_work">' . $type_work . '</td>';
        $html .= '<td class="plan_date">' . $row['date'] . '</td>';
        $html .= '<td class="form_work">' . $row['form_work'] . '</td>';
        $html .= '<td class="check_end">' . $row['check_end'] . '</td>';
        $html .= '</tr>';
}

    echo $html;
    exit;
}
?>
