<div class="plan-container">
    <img src="../images/BackBtn.png" class="back-btn-plan back-btn">
        <script>
            $('.back-btn-plan').click(function() {
                $('.plan-container').css('display', 'none');
                $('.container-home').addClass('active-menu');
            });
        </script>
    <h1 class="text-center m-3">План</h1>
    <?php $gr = $curator->getGroup($resultCurator['id_group']); ?>
    <h3 class="text-center m-3">идеологической и воспитательной работы учебной группы №<?php if($gr) echo $gr['name']; else echo "none" ?></h3> 
    <h3 class="text-center m-3">на
        <select class="mounth_select combobox">
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
                $('.mounth_select').on('change', function() {
                    var selectedMonth = $(this).val();
                    loadTableData(selectedMonth);
                });

                var selectedMonth = $('.mounth_select').val();
                loadTableData(selectedMonth);
            });


            function loadTableData(selectedMonth) {
                $('.waiting-background').show();
                $.ajax({
                    url: '../php/update_table_plan.php',
                    type: 'POST',
                    data: { selectedMonth: selectedMonth },
                    success: function(response) {
                    $('.waiting-background').hide();
                    $('.plan-body').html(response);
                    },
                    error: function(xhr, status, error) {
                    $('.waiting-background').hide();
                    console.log(error);
                    }
                });
            }
        </script>
    </h3>
    <div class="planBtns-container d-flex justify-content-between">
        <button class="m-4 btn btn-lg rounded-3 btn-dark w-25 align-self-end ReportBtn">Отчет</button>
        <button class="m-4 btn btn-lg rounded-3 btn-dark w-25 align-self-start ChangePlanBtn">Изменить</button>
    </div>

    <div class="table-container">
        <table class="table plan-table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="table-type-work text-center">Тип работ</th>
                <th scope="col" class="table-date-plan text-center">Дата</th>
                <th scope="col" class="table-form-work text-center">Форма работ</th>
                <th scope="col" class="table-check-plan text-center">Отметка</th>
            </tr>
        </thead>
        <tbody class="text-center plan-body">
        </tbody>
        </table>
    </div>

        <div class="plan-change-popup" role="document">
            <div class="rounded-4 shadow plan-change-container">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Изменить план</h1>
                    <button type="button" class="btn-close btn_close-plan" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

            <div class="modal-body p-5 pt-0">
                <form class="" method="post">
                    <div class="form-floating mb-3">
                    <select class="type_work-select custom-select form-control rounded-3">
                    <?php 
                        include_once "../model/Type_plan.php";

                        $type_plan = new Type_plan($db);
                        $data = $type_plan->GetAll();
                        foreach ($data as $row) {
                            echo '<option value="' . $row['id_type'] . '">' . $row['name'] . '</option>';
                        }
                        ?>
                    </select>
                    <label for="floatingPassword">Выберите тип работ</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" name="ch_plan-date" class="form-control rounded-3" placeholder="Выберите дату">
                        <label for="floatingPassword">Выберите дату</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="ch_plan-form" class="form-control rounded-3" placeholder="Форма работ">
                        <label for="floatingPassword">Форма работ</label>
                    </div>
                    <div class="checkbox_plan-container mb-3">
                        <input type="checkbox" name="ch_plan-check">
                        <label>Отметка о выполнении</label>
                    </div>
                    <div class="warning warningPlan">
                        *Заполните все поля
                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-dark OkChangePlan" type="submit">Изменить</button>
                </form>
            </div>
        </div>
    </div>

        <script src="../js/plan.js"></script>
    

</div>