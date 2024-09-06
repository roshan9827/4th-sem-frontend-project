<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "roshan";
$conn = mysqli_connect($server,$username,$password,$dbname);
if (!$conn) {
    die ("Can not connect with databases due to -->". mysqli_connect_error());
}
else {
    // echo "success";
}
?>