<?php
require 'includes/init.php';
if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
  $result = $user_obj->singUpUser($_POST['username'],$_POST['email'],$_POST['password']);
}
if(isset($_SESSION['email'])){
  header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <script>
  function mysub(){
    var a=document.getElementById("passwords").value;
    var b=document.getElementById("passwordss").value;
    if(a==""){
      document.getElementById("messages").innerHTML="Please fill password";
      return false;
    }
    if(a.length < 8){
      document.getElementById("messages").innerHTML="Password length must be atleast 8 characters";
      return false;
    }
    if(a.length > 20){
      document.getElementById("messages").innerHTML="Password length must be maximum 20 characters";
      return false;
    }
    if(a != b){
      document.getElementById("messages").innerHTML="Passwords are not same";
      return false;
    }
  }
  </script>
  <div class="main_container login_signup_container">
    <h1>Sign Up</h1>
    <form action="" onsubmit="return mysub()" method="POST" novalidate>
      <label for="username">Full Name</label>
      <input type="text" id="username" name="username" spellcheck="false" placeholder="Enter your full name" required>
      <label for="email">Email</label>
      <input type="email" id="email" name="email" spellcheck="false" placeholder="Enter your email address" required>
      <label for="password">Password</label>
      <input type="password" id="passwords" name="password" placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
      <span id="messages" style="color:red;"></span><br/><br/>
      <label for="password">Confirm Password</label>
      <input type="password" id="passwordss" name="password" placeholder="Enter your password again" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
      <span id="messagess" style="color:red;"></span>
      <input type="submit" value="Sign Up">
      <a href="index.php" class="form_link">Login</a>
    </form>
    <div>  
      <?php
        if(isset($result['errorMessage'])){
          echo '<p class="errorMsg">'.$result['errorMessage'].'</p>';
        }
        if(isset($result['successMessage'])){
          echo '<p class="successMsg">'.$result['successMessage'].'</p>';
        }
      ?>    
    </div>
    <a href="forgetPassword.php" class="form_link">Forgot your Password?</a><br/><br/>
  </div>
</body>
</html>