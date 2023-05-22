<?php
    session_start();
    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        
        include_once "../model/connection.php";
        include_once "../model/Curators.php";
        $database = new Database();
        $db = $database->GetConnection();
        $curator = new Curators($db);
        $resultCurator = $curator->currentCurator($_SESSION['id_pass']);
        $photo = base64_encode($resultCurator['photo']);
        $FIO = $resultCurator['FIO'];
    } 
?>

<div class="nav-bar">
    <div class="menu-container">
        <a href="#" class="menu-profile">

            <?php if($photo): ?>
                <img class="profile-img" src="data:image/jpeg;base64, <?php echo $photo; ?>">
            <?php else: ?>
                <img src="../images/profile.png">
            <?php endif; ?>
            
            <div class="title-menu text-center">
            <?php echo $username; ?>
            </div>
        </a>
        <a href="#" class="menu-home">
            <img src="../images/bi_house-fill.png" alt="">
            <div class="title-menu text-center">
                Главная
            </div>
        </a>
        <a href="#" class="menu-curators">
            <img src="../images/groups.png" alt="">
            <div class="title-menu text-center">
                Кураторы
            </div>
        </a>
        <a href="#" class="menu-mail">
            <img src="../images/cloud.png" alt="">
            <div class="title-menu text-center">
                Почта
            </div>
        </a>
    </div>
</div>
