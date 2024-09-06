<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>welcome to RT-Coder's Cafe </title>
    <style>
    #maincontainer {
        min-height: 85vh;
    }
    </style>
</head>

<body>
    <?php require "partials/dbconnect.php";?>
    <?php require "partials/header.php";?>
   <div class="container my-3" id = "maincontainer">
    <h1 class = "py-2">Search result for <em>"<?php echo $_GET['search']?>"</em> </h1>
<?php 
$query = $_GET['search'];
 $sql = "SELECT*FROM `threads` WHERE MATCH(`threads_title`, `threads_desc`) against('$query')";
 $result = mysqli_query($conn, $sql);
 $noresult = true;
 while ($row = mysqli_fetch_assoc($result)) {
    $noresult = false;
         $id = $row['threads_id'];
         $question = $row['threads_title'];
         $description = $row['threads_desc'];
         $url = "threads.php?thread_id=".$id;
         echo '
         <div class="result">
         <h3><a class="text-dark" href="'.$url.'">'.$question.'</a></h3>
         <p>'.$description.'</p>
     </div>';
 }
 if ($noresult) {
    echo '<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <p class="display-4">No results found</p>
      <p class="lead">suggestion:<ul>
      <li>Make sure that all words are spelled correctly.</li>
          <li>Try different keywords.</li>
           <li>Try more general keywords.</li>
      </p>
    </div>
  </div>';
 }
?>

 
    </div>
    <?php require "partials/footer.php";?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>