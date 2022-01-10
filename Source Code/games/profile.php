<?php
require 'includes/init.php';
if(isset($_SESSION['user_id']) && isset($_SESSION['email'])){
    $user_data = $user_obj->find_user_by_id($_SESSION['user_id']);
    if($user_data ===  false){
        header('Location: logout.php');
        exit;
    }
    $all_users = $user_obj->all_users($_SESSION['user_id']);
}
else{
    header('Location: logout.php');
    exit;
}
$get_req_num = $frnd_obj->request_notification($_SESSION['user_id'], false);
$get_frnd_num = $frnd_obj->get_all_friends($_SESSION['user_id'], false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  $user_data->username;?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dropdown.css">
</head>
<body>
    <div class="profile_container">
        <div class="inner_profile">
            <div class="img">
                <img src="profile_images/<?php echo $user_data->user_image; ?>" alt="Profile image">
            </div>
            <h1><?php echo  $user_data->username;?></h1>
        </div>
        <nav>
            <ul>
                <li class="dropdown">
  <button class="dropbtn">Games</button>
  <div class="dropdown-content">
  <a href="cricket.php">Cricket</a>
  <a href="football.php">Football</a>
  <a href="badminton.php">Badminton</a>
  <a href="handball.php">Handball</a>
  <a href="box.php">Box Cricket</a>
  </div>
</li>
                <li><a href="logout.php" rel="noopener noreferrer">Logout</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>