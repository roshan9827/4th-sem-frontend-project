<?php
if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin']) == true) {
  $loggedin = true;
}
else {
  $loggedin = false;
}
echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="login.php">R-secure</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="Welcome.php">Home <span class="sr-only">(current)</span></a>
      </li>';
if (!$loggedin) {
 echo '<li class="nav-item">
  <a class="nav-link" href="login.php">Login</a>
  </li>
  <li class="nav-item" >
  <a class="nav-link" href="signup.php">Sign Up</a>
  </li>';
}
      if($loggedin){
      echo '<li class="nav-item">
        <a class="nav-link" href="logout.php">Log Out</a>
      </li>';
        }
    echo ' </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>'
?>