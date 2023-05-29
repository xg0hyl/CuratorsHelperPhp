$(document).ready(function() {
  $('form').submit(function(event) {
    event.preventDefault();

    var loginInput = $('input[name="login"]');
    var passwordInput = $('input[name="password"]');
    var warningLogin = $('.warningLogin');
    var warningPassword = $('.warningPassword');
    var errorLog = $('.errorLog');

    if (!loginInput.val()) {
      loginInput.css('borderColor', 'red');
      warningLogin.css('display', 'block');
      return;
    } else if (!passwordInput.val()) {
      loginInput.css('borderColor', '');
      warningLogin.css('display', 'none');
      passwordInput.css('borderColor', 'red');
      warningPassword.css('display', 'block');
      return;
    } else {
      passwordInput.css('borderColor', '');
      warningPassword.css('display', 'none');

      var data = {
        login: loginInput.val(),
        password: passwordInput.val()
      };

      $.ajax({
        url: 'http://localhost/CuratorsHelperPhp/php/login.php',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(data),
        success: function(result) {
          if (result.success) {
            location.href = 'http://localhost/CuratorsHelperPhp/pages/main.php';
            console.log('true');
          } else {
            errorLog.css('display', 'block');
            console.log(result);
          }
        },
        error: function(error) {
          console.error('Ошибка выполнения запроса:', error);
        }
      });
    }
  });
});
