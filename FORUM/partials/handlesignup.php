<?php 
$showerr = "false";
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    include "dbconnect.php";
    $name = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
  $existsql = "SELECT*FROM `users` WHERE `user_name` = '$name'";
  $result = mysqli_query($conn, $existsql);
  if (mysqli_num_rows($result) > 0) {
   $showerr =  "username alredy existed please use another name";
  }
  else {
   if ($password == $cpassword) {
    $passhash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT  INTO `users`(`user_name`, `user_email`, `user_pass`, `timestamp`) VALUES ('$name', '$email', '$passhash', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $showalert = true;
        header("location: /forum/index.php?signupsuccess=true");
        exit;
    }
   }
   else {
    $showerr ="Password and Confirm password must be same.";
   }
}
header("location: /forum/index.php?signupsuccess=false&error=$showerr");
$conn ->close();
}
?>