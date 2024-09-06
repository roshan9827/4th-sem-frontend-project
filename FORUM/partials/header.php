<?php 
session_start();
echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="/forum"><img src="images/logo.png" alt="logo" width="45" height="45">
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="/forum">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Top 5 Category
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
      $sql = "SELECT category_name,category_id FROM `categories` LIMIT 5";
      $result =mysqli_query($conn , $sql);
    while ( $row = mysqli_fetch_assoc($result)) {
        echo '<a class="dropdown-item" href="threadlist.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a>';
    }
     echo  '</div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contact.php">Contact</a>
    </li>
  </ul>
  <div class=" row">';
  if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
  {
  echo ' <form class="form-inline my-2 my-lg-0"  action="search.php" method= "get" >
        <input class="form-control mr-sm-2" name = "search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
       <p class = "text-light mx-2 my-0"> Welcome: '.$_SESSION['username'].' </p></form>
       <a href="partials/logout.php"  role ="button" class="btn btn-outline-success mx-2">Logout</a>';
  }
  else {
   echo' <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
      </form>
     <button class="btn btn-outline-success ml-4" data-toggle="modal" data-target="#loginModal">Login</button>
      <button class=" btn btn-outline-success mx-2" data-toggle="modal" data-target="#signupmodal" > SignUp</button>';
  }
      echo'</div>
</div>
</nav>';
include "partials/loginmodal.php";
include "partials/signupmodal.php";
if (isset($_GET["signupsuccess"]) && $_GET["signupsuccess"]=="true"){
echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>success!</strong> Your account has been created now you can login.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';}
if (isset($_GET["error"]) && $_GET["signupsuccess"]=="false"){  
  $err=$_GET['error'];
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Sorry!</strong> '.$err.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

if (isset($_GET["loginsuccess"]) && $_GET["loginsuccess"]=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success!</strong> You are now successfully loged in.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

if (isset($_GET["err"]) && $_GET["loginsuccess"]=="false"){  
  $err=$_GET['err'];
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Sorry!</strong> '.$err.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if (isset($_GET["logoutsuccess"]) && $_GET["logoutsuccess"]=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success!</strong> You are now successfully logedout.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
?>