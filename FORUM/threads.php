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
</head>

<body>
  <?php require "partials/dbconnect.php";?>
    <?php require "partials/header.php";?>
<?php
   $id= $_GET['thread_id'];
    $sql = "SELECT*FROM `threads` WHERE `threads_id`=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
      // if (isset($row['threads_title']) && isset($row['threads_desc']) && isset($row['threads_user_id'])) {
        $title = $row['threads_title'];
        $desc = $row['threads_desc'];
        $userid = $row['threads_user_id'];

        $sql2 = "SELECT*FROM `users` WHERE `sno`= $userid ";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
                $username = $row2['user_name'];
       }
    ?>

<?php 
$alert = false;
 if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $comment = $_POST['comment'];
    $comment = str_replace('<','&lt', $comment);
    $comment = str_replace('>','&gt', $comment);
    $sno = $_POST['sno'];
    $sql = "INSERT INTO `comments` (`comment_content`, `threads_id`, `comment_by`, `tstamp`) VALUES (' $comment', '$id','$sno', current_timestamp());";
    $result = mysqli_query($conn, $sql);
  $alert = true;
 }
?>
  <?php     
    if ($alert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your comment has been added.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    ?>
    <!-- sliders from here -->
    <div class="container md-3 my-3">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo "$title"?></h1>
            <p class="lead"><?php echo "$desc"?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum.
                Never post personal information about another forum participant.
                Don't post anything that threatens or harms the reputation of any person or organization.
            </p>
            <p>Posted by: <b><?php echo $username;?></b></p>
        </div>
    </div>

    <?php 
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true) {
    echo '
      <div class="container">
        <h1>Post a comment</h1>
    <form action="'. $_SERVER['REQUEST_URI'] .'" method = "post">
  <div class="form-group">
    <label for="desc">Post your comment</label>
    <textarea class="form-control" id="comment" name="comment" rows="3" Required></textarea>
  </div>
      <input type="hidden" name = "sno" value = "'.$_SESSION["sno"].'">
  <button type="submit" class="btn btn-success">Post comment</button>
</form>
    </div>';
  }
  else {
    echo ' <div class="container">
        <h1>Post a comment</h1>
   <p class="lead">Sorry!..please login to Post your comments.</p>
   </div>';
  }
  ?>
    <div class="container my-3 mb-5" style = "min-height:400px">
        <h1 class="py-2">Discussions</h1>
        <?php 
$id = $_GET["thread_id"];
$sql = "SELECT*FROM `comments` WHERE `threads_id`= '$id'";
$result = mysqli_query($conn, $sql);
$blank = true;
while ($row = mysqli_fetch_assoc($result)) {
    $blank = false;
        $id = $row['comment_id'];
        $comment = $row['comment_content'];
        $comment_time = $row['tstamp'];
        $threads_user_id = $row['comment_by'];
        $sql2 = "SELECT*FROM `users` WHERE `sno`= '$threads_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        while ($row2 = mysqli_fetch_assoc($result2))
        echo '
        <div class="media">
        <img class="mr-3" src="images/user.jpg" width="50px" alt="user">
        <div class="media-body">
         '.$comment.'
       </div><p class ="font-weight-bold my-0" >Asked by: '.$row2['user_name'].' at '.$comment_time.'</p>
    </div>';
}
if ($blank) {
    echo '<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <p class="display-4">No comments found</p>
    <p class="lead">Be the first persion to comment.</p>
  </div>
</div>';
}
$conn -> close();
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