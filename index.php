<?php

session_start();
require_once 'config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $email = $_POST['email'];
  $password = $_POST['pass'];

  $result = $conn->query("SELECT * FROM applicant WHERE email = '$email'");
  if ($result->num_rows>0){
	  $user = $result->fetch_assoc();

	  if (password_verify($password,$user['password'])) {
		  $_SESSION['email'] = $user['email'];

		  if ($user['role'] === 'superadmin'){
			
		  } 
      elseif ($user['role'] === 'admin') {
				
	  	} else {

      }
		  exit();
	  } else {
      $_SESSION['login_error'] = "Incorrect Password.";
    }
  } else {
        $_SESSION['login_error'] = "Email not found.";
    }

  $_SESSION['login_error'] = 'Incorrect email or password';
  $_SESSION['active_form'] = 'login';
  header("Location: ");
  exit();
}
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
              </div>
              <br />

              <div class="text-box" style="padding-block: 5px">
                <span class="t-roboto">Password</span>
              </div>
              <div class="input-login">
                <input type="password" id="pass" name="pass" />
              </div>

              <br />
              <div class="h-stack" style="justify-content: center">
                <input type="submit" value="Login" 
                   onmouseover="this.style.color='white'; this.style.backgroundColor='#2e2e2e';"
                   onmouseout="this.style.color='white'; this.style.backgroundColor='black';"/>
              </div>
            </form>
          </div>
          <div class="h-stack" style="padding: 5px; display: flex; align-items: center; justify-content: center;">
            <a href="registration.php"> 
                <button style="border: 0;" 
                    onmouseover="this.style.color='darkblue'; this.style.backgroundColor='lightyellow';"
                    onmouseout="this.style.color='blue'; this.style.backgroundColor='transparent';">
                    I don't have an account
                </button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
