<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>CuratorsHelper</title>
</head>
<body>

<div class="login-popup" role="document">
    <div class="rounded-4 shadow login">
        <div class="modal-header p-5 pb-4 border-bottom-0">
            <h1 class="fw-bold mb-0 fs-2">Авторизоваться</h1>
        </div>

        <div class="modal-body p-5 pt-0">
            <form class="" method="post" >
                <div class="warningLogin warning">*Заполните поле</div>
                <div class="form-floating mb-3">
                    <input type="text" name="login" class="form-control rounded-3 input-control" id="floatingInput" placeholder="Логин">
                    <label for="floatingInput">Логин</label>
                </div>
                <div class="warningPassword warning">*Заполните поле</div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control rounded-3" id="floatingPassword" placeholder="Пароль">
                    <label for="floatingPassword">Пароль</label>
                </div>
                <div class="warning errorLog pb-2">*Неверный логин или пароль</div>
                <button class="w-100 mb-2 btn btn-lg rounded-3 btn-dark" type="submit">Войти</button>
                <div>40BCD932A5DFF699DD7E8CB04996710E</div>
            </form>
        </div>
    </div>
</div>

<script src="js/login.js"></script>
</body>
</html>