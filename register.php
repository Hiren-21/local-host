<?php

include 'config.php';
if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $pnumber = mysqli_real_escape_string($conn, ($_POST['pnumber']));
   $city = mysqli_real_escape_string($conn, ($_POST['city']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($image_size > 200000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password, pnumber, city, image) VALUES('$name', '$email', '$pass', '$pnumber', '$city', '$image')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:user_login.php');
         }else{
            $message[] = 'registeration failed!';
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>register now</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="text" name="name" placeholder="enter username" class="box" required>
      <input type="email" name="email" placeholder="enter email" class="box" required>
      <input type="password" name="password" placeholder="enter password" class="box" required>
      <input type="text" name="pnumber" placeholder="phone number" class="box" required>
            <div class="box" required>
         <label>City</label>
         <div class="custom_select">
            <select name="city">
               <option>Select</option>
               <option>Agra</option>
               <option>Ahmedabad</option>
               <option>Amritsar</option>
               <option>Banglore</option>

               <option>Chennai</option>
               <option>Delhi</option>
               <option>Goa</option>
               <option>Hyderabad</option>

               <option>Jamshedpur</option>
               <option>Kerla</option>
               <option>Kolkata</option>
               <option>Mumbai</option>

               <option>Patna</option>
               <option>Ranchi</option>
               <option>Rishikesh</option>
               <option>Udaipur</option>
            </select>
         </div>
         </div>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" name="submit" value="register now" class="btn">
      <p>already have an account? <a href="user_login.php">login now</a></p>
   </form>

</div>

</body>
</html>