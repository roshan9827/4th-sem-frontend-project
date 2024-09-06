<?php
$insert = $exist = $psame = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require "partials/dbconect.php";

  $name =       htmlspecialchars($_POST['username']);
  $phone =      htmlspecialchars($_POST['phone']);
  $email =      htmlspecialchars($_POST['email']);
  $gender =     htmlspecialchars($_POST['gender']);
  $password =   htmlspecialchars($_POST['password']);
  $cpassword =  htmlspecialchars($_POST['cpassword']);

  $sql = "SELECT `name` FROM `users` WHERE `name` = '$name'";
  $result = mysqli_query($conn ,$sql);

  if (mysqli_num_rows($result) > 0) {
      $exist= true;
  } 
  if ($password != $cpassword) {
    $psame = true;
  }
  if (!$exist && !$psame) {
    $hash = password_hash($password,PASSWORD_DEFAULT);
    $sql = "INSERT INTO `users` (`name`, `phone`, `email`, `gender`, `password`,`dt`) VALUES ('$name', '$phone', '$email', '$gender', '$hash', current_timestamp());";  
       $result = mysqli_query($conn,$sql);
       if ($result) {
             // echo "data enterd in database";
             $insert= true;
             $name = $phone = $email = $gender = $password = $cpassword = "";
            }
            else {  
              echo "data not inserted due to -->" . mysqli_error($conn);
            }
          }
      $conn -> close();
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>signup</title>
  </head>
  <body>

   <?php require "partials/nav.php" ?>

<?php 
if ($insert && !$psame && !$exist) {
  echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!..</strong> You account has been succesfully created you can Login Now...
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button></div>';
}

if($exist) {
  echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Sorry!..</strong> Name is alredy taken..please use another name..
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button></div>';
}

if($psame) {
  echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Sorry!..</strong> Password and Conform Password must be same...
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button> </div>';
}
  ?>

       <h2 class = "text-center my-4">SignUp To Our Website:</h2>

<div class="container my-4" style="display: flex;justify-items: center;flex-wrap: nowrap;justify-content: center;">

    <form action = "signup.php" method = "post" class = "col-md-6" >
  <div class="form-group ">
    <label for="username">Username:</label>
    <input type="text" class="form-control" id="username" placeholder="Enter username" name = "username" Required>
  </div>

  <div class="form-group">
    <label for="phone">Phone:</label>
    <input type="number" class="form-control" id="phone" placeholder="Enter phone number" name="phone" Required>
  </div>
  
  <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Email" name = "email" Required>
    </div>
    
      <div class="form-group">
      <label for="gender">Gender:</label><br>
            <input type="radio" id="male" name="gender" value="male" Required>
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="female" Required>
            <label for="female">Female</label><br>
      </div>


  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" id="password" placeholder="Password" name = "password" Required>
  </div>


  <div class="form-group">
    <label for="password">Conform Password:</label>
    <input type="password" class="form-control" id="cpassword" placeholder="confirm Password" name = "cpassword" Required>
    <small id="passhelp" class="form-text text-muted">Make sure to type same password in both password feild.</small>

  </div>
 
  <button type="submit" class="btn btn-primary">SignUp</button>
</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
