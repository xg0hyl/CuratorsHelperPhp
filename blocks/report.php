<div class="report-container">
    <div class="d-flex w-100 justify-content-around">
        <img src="../images/BackBtn.png" class="back-btn-report back-btn">
            <script>
                $('.back-btn-report').click(function() {
                    $('.report-container').css('display', 'none');
                    $('.plan-container').css('display', 'block ');
                });
            </script>
        <h1 class="text-center m-3">Отчет</h1>
    </div>
    
    <?php $gr = $curator->getGroup($resultCurator['id_group']); ?>
    <h3 class="text-center m-1">о выполнении плана идеологической и воспитательной работы <br> учебной группы №<?php if($gr) echo $gr['name']; else echo "none" ?></h3> 
    <h3 class="text-center m-3">на
        <select class="mounth_select-report combobox">
        <?php 
            include_once "../model/Mounth.php";

            $mounth = new Mounth($db);
            $data = $mounth->GetAll();
            $currentMonth = date('n');
            foreach ($data as $row) {
                $id = $row['id_mounth'];
                $mounthName = $row['mounth'];
                $selected = ($id == $currentMonth) ? 'selected' : '';
                echo '<option value="' . $id . '" ' . $selected . '>' . $mounthName . '</option>';
            }
            ?>
        </select>
        <script>
            $(document).ready(function() {
                $('.mounth_select-report').on('change', function() {
                    var selectedMonth_report = $(this).val();
                    loadReportData(selectedMonth_report);
                });

                var selectedMonth_report = $('.mounth_select-report').val();
                loadReportData(selectedMonth_report);
            });


            function loadReportData(selectedMonth_report) {
                $('.waiting-background').show();
                $.ajax({
                    url: '../php/update_table_report.php',
                    type: 'POST',
                    data: { selectedMonth: selectedMonth_report },
                    success: function(response) {
                    $('.waiting-background').hide();
                    $('.report-body').html(response);
                    },
                    error: function(xhr, status, error) {
                    $('.waiting-background').hide();
                    console.log(error);
                    }
                });
            }
        </script>
    </h3>

    <div class="report-item-container">

        <div class="table_report-container">
            <table class="table report-table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="table-text_report text-center">Содержание деятельности</th>
                    <th scope="col" class="table-hours_week text-center">Кол-во часов</th>
                    <th scope="col" class="table-check_end-report text-center">Отметка</th>
                </tr>
            </thead>
                <tbody class="text-center report-body">
                </tbody>
            </table>
        </div>

        <form class="form-report" method="post">
            <div class="form-floating mb-3">
                <input type="text" name="ch_text_report" class="form-control rounded-3" placeholder="Содержание деятельности">
                <label for="floatingPassword">Содержание деятельности</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" name="ch_report-hours_week" class="form-control rounded-3" placeholder="Кол-во часов">
                <label for="floatingPassword">Кол-во часов</label>
            </div>
            <div class="checkbox_plan-container mb-3">
                <input type="checkbox" name="ch_report-check">
                <label>Отметка о выполнении</label>
            </div>
            <div class="warning warningReport">
                *Заполните все поля
            </div>
            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-dark OkChangeReport" type="submit">Изменить</button>
        </form>
    </div>
</div>
<script src="../js/report.js"></script>