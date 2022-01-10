<?php
require 'includes/init.php';
if(isset($_POST['email']) && isset($_POST['password'])){
  $result = $user_obj->loginUser($_POST['email'],$_POST['password']);
}
if(isset($_SESSION['email'])){
  header('Location: profile.php');
  exit;
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
<script>
  $('#myForm').submit(function(e){
    e.preventDefault();
    $.ajax({
        url:'profile.php',
        type:'post',
        data:$('#myForm').serialize(),
        success:function(){
        }
    });
});
  </script>
<body>
  <div class="main_container login_signup_container">
    <h1>Login</h1>
    <form action="" method="POST" id="myForm" name="myForm">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" spellcheck="false" placeholder="Enter your email address" required>
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>
      <input type="submit" id="submit" value="Login">
      <a href="signup.php" class="form_link">Sign Up</a>
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
    </form>
    <?php
    if(isset($_GET["newpwd"])){
      if($_GET["newpwd"] == "passwordupdated"){
        echo "Your password has been reset";
      }
    }
    ?>
    <a href="forgetPassword.php" class="form_link">Forgot your Password?</a><br/><br/>
  </div>
</body>
</html>