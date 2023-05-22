<div class="container-profile">
    <div class="bg-profile">
        <?php if($photo): ?>
            <img class="curator-photo" src="data:image/jpeg;base64, <?php echo $photo; ?>">
        <?php else: ?>
            <img src="../images/profile.png">
        <?php endif; ?>
        
        <h1 class="mb-0 fio-curator">
        <?php echo $FIO; ?>
        </h1>
        <img src="../images/settings.png" class="settings-profile">

        <script>
            function addSettingsButtonClickHandler() {
            const settingsBtn = $('.settings-profile');
            const thisProfile = $('.container-profile');
            const settingsForm = $('.settings-container');

            settingsBtn.click(() => {
                thisProfile.removeClass('active-menu');
                settingsForm.addClass('settings-active');
            });
            }

            $(document).ready(() => {
                addSettingsButtonClickHandler();
            });
        </script>

    </div>

    <div class="container-info-curator">
        <div class="info-item d-flex">
            <img src="../images/date.png">
            <div class="info-text h-100 d-flex align-items-center"><?php echo $resultCurator['date_born']; ?></div>
        </div>
        <div class="info-item d-flex">
            <img src="../images/phone.png">
            <div class="info-text h-100 d-flex align-items-center"><?php echo $resultCurator['phone']; ?></div>
        </div>
        <div class="info-item d-flex">
            <img src="../images/email.png">
            <div class="info-text h-100 d-flex align-items-center"><?php echo $resultCurator['email']; ?></div>
        </div>
        <div class="info-item d-flex">
            <img src="../images/education.png">
            <div class="info-text h-100 d-flex align-items-center"><?php echo $resultCurator['education']; ?></div>
        </div>
        <div class="info-item d-flex">
            <img src="../images/groups.png">
            <?php $gr = $curator->getGroup($resultCurator['id_group']); ?>
            <div class="info-text h-100 d-flex align-items-center"><?php if($gr) echo $gr['name']; else echo "none" ?></div>
        </div>
        <div class="info-item d-flex">
            <img src="../images/CK.png">
            <?php $cyclic = $curator->getCyclic($resultCurator['id_group']); ?>
            <div class="info-text h-100 d-flex align-items-center"><?php if($cyclic) echo $cyclic['name']; else echo "none" ?></div>
        </div>

    </div>
</div>