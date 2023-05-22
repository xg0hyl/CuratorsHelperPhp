const form = document.querySelector('form');
const loginInput = form.querySelector('input[name="login"]');
const passwordInput = form.querySelector('input[name="password"]');
const loginBtn = form.querySelector('button[type="submit"]');
const warningLogin = form.querySelector('.warningLogin');
const warningPassword = form.querySelector('.warningPassword');
const errorLog = form.querySelector('.errorLog');
loginBtn.addEventListener('click', function(event) {
  event.preventDefault(); 

  if (!loginInput.value) {
    loginInput.style.borderColor = "red";
    warningLogin.style.display = "block";
    return;
  } else if (!passwordInput.value) {
    loginInput.style.borderColor = "";
    warningLogin.style.display = "none";
    passwordInput.style.borderColor = "red";
    warningPassword.style.display = "block";
    return;
  } else {
    passwordInput.style.borderColor = "";
    warningPassword.style.display = "none";

    event.preventDefault();
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/login.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        if (xhr.responseText === 'Успех') {
            location.href = 'pages/main.php';
            console.log("true");
        } else {
            errorLog.style.display = "block";
            console.log("Ошибка");
        }
      }
    };
    xhr.send('login=' + encodeURIComponent(loginInput.value) + '&password=' + encodeURIComponent(passwordInput.value));

  }
});

