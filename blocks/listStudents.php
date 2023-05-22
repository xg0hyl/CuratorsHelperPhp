<div class="listStudents-container">
    <img src="../images/BackBtn.png" class="back-btn-listStudents back-btn">
        <script>
            $('.back-btn-listStudents').click(function() {
                $('.listStudents-container').css('display', 'none');
                $('.container-home').addClass('active-menu');
            });
        </script>

    <div class="search_group-students text-center">
        <select class="search_select-students">
            <!-- <option value="all" selected>Все группы</option> -->
            <?php 
            include_once "../model/Groups.php";

            $groups = new Groups($db);
            $data = $groups->GetAllWithoutNone();
            foreach ($data as $row) {
                $selected = ($row['id_group'] == 1) ? 'selected' : '';
                echo '<option value="' . $row['id_group'] . '" ' . $selected . '>' . $row['name'] . '</option>';
            }
            ?>
        </select>

    </div>

    <div class="listStudents">
        
    </div>
    <script>
        $(document).ready(function() {
            $('.listStudents').on('click', '.st_item-more', function() {
                var studentId = $(this).data('student-id');
                
                $('.listStudents-container').css('display', 'none');
                $('.studentCard-container').css('display', 'block');

                $('.waiting-background').show();
                $.ajax({
                    url: '../php/cardSelect.php',
                    type: 'POST',
                    data: { studentId: studentId },
                    success: function(response) {
                    $('.waiting-background').hide();
                    $('.CardStSelect').html(response);
                    },
                    error: function(xhr, status, error) {
                    $('.waiting-background').hide();
                    console.log(error);
                    }
                });
            });

            $('.search_select-students').on('change', function() {
                var selectedGroup = $(this).val();
                loadStudentsList(selectedGroup);
            });

            var selectedGroup = $('.search_select-students').val();
            loadStudentsList(selectedGroup);
        });


            function loadStudentsList(selectedGroup) {
                $('.waiting-background').show();
                $.ajax({
                    url: '../php/update_control_students.php',
                    type: 'POST',
                    data: { selectedGroup: selectedGroup },
                    success: function(response) {
                    $('.waiting-background').hide();
                    $('.listStudents').html(response);
                    },
                    error: function(xhr, status, error) {
                    $('.waiting-background').hide();
                    console.log(error);
                    }
                });
            }
    </script>
</div>