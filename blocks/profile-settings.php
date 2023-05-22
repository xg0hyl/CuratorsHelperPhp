<div class="settings-container">
    <img src="../images/BackBtn.png" class="back-btn-settings back-btn">
    <script>
        $('.back-btn-settings').click(function() {
            $('.settings-container').removeClass('settings-active');
            $('.container-profile').addClass('active-menu');
        });
    </script>
    <h1 class="text-center">
        Редактировать профиль
    </h1>
    <?php if($photo): ?>
            <img class="settings-photo" src="data:image/jpeg;base64, <?php echo $photo; ?>">
        <?php else: ?>
            <img src="../images/profile.png">
        <?php endif; ?>


    <form action="../php/curatorUpdate.php" method="post" class="settings-form">
        <div class="form-item">
            <h3>Изменить пароль</h3>
            <div class="form-floating mb-3 w-75">
                <input type="password" name="password-setting" class="form-control rounded-3 input-control" id="floatingInput" placeholder="Изменить пароль">
                <label for="floatingInput">Пароль</label>
            </div>
        </div>
        <div class="form-item">
            <h3>Изменить дату рождения</h3>
            <div class="form-floating mb-3 w-75">
                <input type="date" value="" name="date-settings" class="form-control rounded-3 input-control" id="date" placeholder=" ">
                <label for="floatingInput">Выберите дату</label>
            </div>
        </div>
        <div class="form-item">
            <h3>Изменить почту</h3>
            <div class="form-floating mb-3 w-75">
                <input type="email" name="email-setting" class="form-control rounded-3 input-control" id="floatingInput" placeholder="Изменить почту">
                <label for="floatingInput">Почта</label>
            </div>
        </div>
        <div class="form-item">
            <h3>Изменить номер телефона</h3>
            <div class="form-floating mb-3 w-75">
                <input type="text" name="phone-setting" class="form-control rounded-3 input-control" id="phone" placeholder="Номер телефона">
                <label for="floatingInput">Номер телефона</label>
                <script>
                    $(function(){
                        $("#phone").mask("+375 (99) 999-99-99");
                        });
                </script>
            </div>
        </div>

        <button class="w-50 btn btn-lg rounded-3 btn-dark settings-btn" type="submit">Изменить</button>

       
    </form>


    

</div>