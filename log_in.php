<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.register {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}
.cancel1{ 
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
  float:right;
}
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 0%;
  border-radius: 20%;
}

.container {
  padding: 16px;
}

span.register{
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .register {
     width: 100%;
    text decoration:none;  }
}
</style>
</head>
<body>

<h2>Login Form</h2>

<form action="http://localhost/dashboard/examble/student/controll.php" method="post">
  <div class="imgcontainer">
    <img src="login.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="email"><b>Mail Id or Username</b></label>
    <input type="text" placeholder="Enter Username" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit" name="login" >Login</button>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="register"><a href="http://localhost/dashboard/examble/student/register.php">Register</a></button>
    <input type="button" value="cancel" class="cancel1" onClick="document.location.href='http://localhost/dashboard/examble/student/user_id/log_in.php';" />
  </div>
</form>

</body>
</html>
