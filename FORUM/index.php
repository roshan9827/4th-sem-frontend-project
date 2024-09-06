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
    .card {
        width: 18rem;
        height: 100%;
        /* Ensures cards stretch evenly */
        display: flex;
        flex-direction: column;
    }

    .card-img-top {
        width: 100%;
        height: 180px;
        /* Set fixed height for images */
        object-fit: cover;
        /* Ensures image is cropped to fit without stretching */
    }

    .card-body {
        flex-grow: 1;
        /* Makes card-body take remaining space */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        /* Distribute content evenly */
    }

    .btn-primary {
        align-self: flex-start;
        /* Align button to the top of the card body */
    }
    </style>
</head>

<body>
    <?php require "partials/dbconnect.php";?>
    <?php require "partials/header.php";?>
    <!-- sliders from here -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="images/photo2.png" alt="First slide" height="400px">
                <div class="carousel-caption d-flex align-items-center justify-content-center"
                    style="top: 50%; transform: translateY(-50%);">
                    <h1 style="color:#ffffff9c; font-weight: bold; font-size: 80px;">RT-Coder's Cafe</h1>
                </div>

            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/matrix.png" alt="Second slide" height="400px">
                <div class="carousel-caption d-flex align-items-center justify-content-center"
                    style="top: 50%; transform: translateY(-50%);">
                    <h2 style="color:#ffffff9c; font-weight: bold; font-size: 80px;">RT-Coder's Cafe</h2>
                </div>

            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/code image.jpg" alt="Third slide" height="400px">
                <div class="carousel-caption d-flex align-items-center justify-content-center"
                    style="top: 50%; transform: translateY(-50%);">
                    <h2 style="color:#ffffff9c; font-weight: bold; font-size: 80px;">RT-Coder's Cafe</h2>
                </div>

            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/photo5.png" alt="Fourth slide" height="400px">
                <div class="carousel-caption d-flex align-items-center justify-content-center"
                    style="top: 50%; transform: translateY(-50%);">
                    <h2 style="color:#ffffff9c; font-weight: bold; font-size: 80px;">RT-Coder's Cafe</h2>
                </div>

            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/photo4.png" alt="Fifth slide" height="400px">
                <div class="carousel-caption d-flex align-items-center justify-content-center"
                    style="top: 50%; transform: translateY(-50%);">
                    <h2 style="color:#ffffff9c; font-weight: bold; font-size: 80px;">RT-Coder's Cafe</h2>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- category container here -->
    <div class="container md-3 my-3">
        <h3 class="text-center">------>RT-Coder's Cafe Categories <------</h3>
                <div class="row">
                    <!-- fetch all the category with for loop -->
                    <?php
            $sql = "SELECT * FROM `categories`";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)){
            $id = $row['category_id'];
            $cat =  $row['category_name'];
            $img =  $row['category_image'];
            $desc = $row['category_description'];
         echo '<div class="col-md-4 my-3">
          <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="images/'.$img.'" alt="'.$cat.' images ">
              <div class="card-body">
                  <h5 class="card-title"><a href = "threadlist.php?catid='.$id.'">'.$cat.'</a></h5>
                  <p class="card-text"> '.substr($desc,0 ,100).'....</p>
                  <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
              </div>
          </div>
      </div>';

         }
          ?>
                </div>
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