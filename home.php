<?php

include 'config.php';
include 'navbar.php';
session_start();
if(!isset($_SESSION['user_id'])){
   header('location:common_login.php');
}
else{
   $user_id = $_SESSION['user_id'];
   $name = $_SESSION['name'];
   if(!isset($user_id)){
      echo "";
   };

   if(isset($_GET['logout'])){
      unset($user_id);
      session_destroy();
      header('location:common_login.php');
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style1.css">

</head>
<body >

   <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">LocalBuddy</h2>
            </div>

            <div class="menu">
                <ul>

                    <li><a href="home.php">HOME</a></li>
                    <li><a href="package_mum.html">Packages</a></li>
                    <li><a href="places.html">Places</a></li>
                    <li><a href="feedback/feedback/index1.php">FEEDBACK</a></li>
                </ul>
            </div>

            

        </div> 
<div class="container background">

   <div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      <h3><?php echo $fetch['name']; ?></h3>
      <a href="update_profile.php" class="btn">update profile</a>
      <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
      <!-- <p>new <a href="login.php">login</a> or <a href="register.php">register</a></p> -->
   </div>

</div>
  <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>