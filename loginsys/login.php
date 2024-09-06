<?php
    $login=false;
    $showerr = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "partials/dbconect.php";

  $name =       htmlspecialchars($_POST['username']);
  $password =   htmlspecialchars($_POST['password']);

  $sql = "SELECT * FROM `users` WHERE `name` = '$name'";
  $result = mysqli_query($conn ,$sql);
  if (mysqli_num_rows($result) == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
       if (password_verify($password,$row['password'])) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = "$name";
        header("location:Welcome.php");
    } 
    else {
      $showerr = true;
    }
    }
  }
  else {
    $showerr = true;
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

    <title>login</title>
  </head>
  <body>

   <?php require "partials/nav.php" ?>

<?php 
if ($showerr) {
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry!..</strong> Username and Password not found...
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>';
}

if($login) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!..</strong> You are now loging in...
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>';
}
  ?>

       <h2 class = "text-center my-4">login To Our Website:</h2>

<div class="container my-4" style="display: flex;justify-items: center;flex-wrap: nowrap;justify-content: center;">

    <form action = "login.php" method = "post" class = "col-md-6">
  <div class="form-group ">
    <label for="username">Username:</label>
    <input type="text" class="form-control" id="username" placeholder="Enter username" name = "username" Required>
  </div>


  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" id="password" placeholder="Password" name = "password" Required>
  </div>
 
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
