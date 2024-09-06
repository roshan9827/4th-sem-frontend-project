<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "roshan";

// Create connection
$conn = mysqli_connect($server, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$note_id = $_GET['sno'] ?? null;
$note = null;

// Fetch the note details if $note_id is set
if ($note_id) {
    $sql = "SELECT * FROM `notes` WHERE `sno` = '$note_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $note = mysqli_fetch_assoc($result);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['desc'];

    // Update note
    $sql = "UPDATE `notes` SET `title`='$title', `description`='$description' WHERE `sno`='$note_id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php"); // Redirect to index.php after successful update
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Note</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark-subtle">
    <!-- Add your navbar here -->
</nav>

<div class="container my-4">
    <h2>Edit Note</h2>
    <?php if ($note): ?>
    <form action="edit.php?sno=<?php echo htmlspecialchars($note['sno']); ?>" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Note Title:</label>
            <input type="text" name="title" class="form-control" id="title" value="<?php echo htmlspecialchars($note['title']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Note Description:</label>
            <textarea class="form-control" name="desc" id="desc" required><?php echo htmlspecialchars($note['description']); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Note</button>
    </form>
    <?php else: ?>
    <p>Note not found.</p>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
