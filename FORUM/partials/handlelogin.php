<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    include "dbconnect.php";
    $name = $_POST["username"];
    $password = $_POST["password"];
  $sql = "SELECT*FROM `users` WHERE `user_name` = '$name'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["user_pass"])){
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $name;
            $_SESSION['sno'] = $row['sno'];
            header("location: /forum/index.php?loginsuccess=true");
            exit;
        }
        else {
         $err= "invalid username and password..";    
        }
  } 
  header("location: /forum/index.php?loginsuccess=false&err=$err");
}
?>