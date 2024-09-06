<?php
$insert = false;
$delete = false;
$server = "localhost";
$username = "root";
$password = "";
$dbname = "roshan";
$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $sno = $_POST['note_id'];
    $title = $_POST['title'];
    $description = $_POST['desc'];

   
        $sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$title', '$description')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $insert = true;
        }
    }

// Handle delete request
if (isset($_GET['delete_sno'])) {
    $delete_sno = $_GET['delete_sno'];
    $sql = "DELETE FROM `notes` WHERE `sno`='$delete_sno'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $delete = true;
        header("Location: index.php"); // Refresh page
        exit();
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RT-NOTES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark-subtle">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="unnamed.png" alt="logo" style="width: 50px; height: 50px; background-size: cover; border-radius: 5%;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<?php
if ($insert) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Your note has been added successfully....
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";

}

if ($delete) {
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>DELETED!</strong> Your note has been Deleted successfully....
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";

}
?>

<div class="container my-4">
    <h2>Add notes here:</h2>
    <form id="noteForm" action="" method="post">
        <input type="hidden" name="note_id" id="note_id">
        <div class="mb-3">
            <label for="title" class="form-label">Note title:</label>
            <input type="text" name="title" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Note description:</label>
            <textarea class="form-control" name="desc" id="desc" placeholder="Write your note description here"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" id="formSubmitButton">Add Note</button>
    </form>
</div>

<div class="container my-4">
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">S.no:</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Timestamp</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM `notes`";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <th scope='row'>" . htmlspecialchars($row['sno']) . "</th>
                        <td>" . htmlspecialchars($row['title']) . "</td>
                        <td>" . htmlspecialchars($row['description']) . "</td>
                        <td>" . htmlspecialchars($row['tstamp']) . "</td>
                        <td>
                            <a href='edit.php?sno=" . $row['sno'] . "' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='index.php?delete_sno=" . $row['sno'] . "' class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                    </tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
</body>
</html>
