<?php
$hostname     = "50.19.85.43";
$username     = "root";
$password     = "sp22cpuc@csumb";
$databasename = "user_results";
// Create connection
$conn = mysqli_connect($hostname, $username, $password,$databasename);
// Check connection
if (!$conn) {
    die("Unable to Connect database: " . mysqli_connect_error());
}
?>