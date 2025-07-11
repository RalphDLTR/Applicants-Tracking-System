<?php

session_start();
require_once 'config.php';

$email = $_POST['email'];
$password = $_POST['pass'];
$password2 = $_POST['re-enter-pass'];
$role = "admin";

if ($password !== $password2) {
    $_SESSION['register_error'] = 'Passwords do not match!';
    $_SESSION['active_form'] = 'register';
    exit();
}

$checkemail = $conn->query("SELECT email FROM applicant WHERE email = '$email'");
if ($checkemail->num_rows > 0) {
    $_SESSION['register_error'] = 'Email is already registered!';
    $_SESSION['active_form'] = 'register';
    exit();
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$conn->query("INSERT INTO applicant (email, password, role) VALUES ('$email', '$hashed_password', '$role')");

header("Location: index.php");
exit();

?>

<!doctype html>
<html lang=en>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ATS Portal</title>
    <link href="https://fonts.googleapis.com/css?family=Inter|Roboto&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
  </head>

  <body>
    <header>
      <div class="header">
        <div class="container" style="justify-content: start">
          <img src="iReply-logo-footer.png" height="80px" width="auto" />
        </div>
        <div class="h-stack" style="justify-content: end">
          <span class="container t-roboto">Header</span>
          <span class="container t-roboto">Header</span>
          <span class="container t-roboto">Header</span>
          <span class="container t-roboto">Header</span>
        </div>
      </div>
    </header>

    <div class="body">
      <div class="h-stack" style="justify-content: end">
        <div class="v-stack">
          <div class="container login-box">
            <form method="post">

              <div class="text-box" style="padding-block: 5px">
                <span class="t-roboto">Email</span>
              </div>
              <div class="input-login">
                <input type="email" id="email" name="email" />
              </div><br />

              <div class="text-box" style="padding-block: 5px">
                <span class="t-roboto">Password</span>
              </div>
              <div class="input-login">
               <input type="password" id="pass" name="pass" />
              </div> <br />

              <div class="text-box" style="padding-block: 5px">
                <span class="t-roboto">Re-enter Password</span>
              </div>
              <div class="input-login">
               <input type="password" id="re-enter-pass" name="re-enter-pass" />
              </div> <br />

              <div class="h-stack" style="justify-content: center">
                <input type="submit" value="Login" 
                   onmouseover="this.style.color='white'; this.style.backgroundColor='#2e2e2e';"
                   onmouseout="this.style.color='white'; this.style.backgroundColor='black';"/>
              </div>
            </form>
          </div>
          <div class="h-stack" style="padding: 5px; display: flex; align-items: center; justify-content: center;">
            <a href="index.php"> 
                <button style="border: 0;" 
                    onmouseover="this.style.color='darkblue'; this.style.backgroundColor='lightyellow';"
                    onmouseout="this.style.color='blue'; this.style.backgroundColor='transparent';">
                    I have an account
                </button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
