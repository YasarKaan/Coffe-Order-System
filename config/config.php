<?php



$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "project_database"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}