<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "rtcoders";
$conn = mysqli_connect($server , $username ,$password ,$dbname);
if (!$conn) {
    die ("can not connect with database  due to -->" . mysqli_connect_error());
};
?>