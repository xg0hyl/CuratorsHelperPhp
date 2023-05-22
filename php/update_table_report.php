<?php
include_once "../model/Report.php";
include_once "../model/connection.php";
include_once "../model/Curators.php";

if (isset($_POST['selectedMonth'])) {
    session_start();
    $selectedMonth = $_POST['selectedMonth'];
    $database = new Database();
    $db = $database->GetConnection();
    $rep = new Report($db);
    $curator = new Curators($db);
    $resultCurator = $curator->currentCurator($_SESSION['id_pass']);
    $gr = $curator->getGroup($resultCurator['id_group']);

    $data = $rep->currentReport($selectedMonth, $gr['id_group']);

    $html = '';
    foreach ($data as $row) {

        $html .= '<tr data-report-id ="'. $row['id_report'] . '">';
        $html .= '<td class="text_report">' . $row['text_report'] . '</td>';
        $html .= '<td class="hours_week">' . $row['hours_week'] . '</td>';
        $html .= '<td class="check_end">' . $row['check_end'] . '</td>';
        $html .= '</tr>';
}

    echo $html;
    exit;
}
?>
