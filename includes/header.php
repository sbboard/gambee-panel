<?php
include("./includes/secrets.php");
require_once('protect.php');

// $connection = mysqli_connect($sql_servername, $sql_username, $sql_password, "josuecru_gambee") or die("Error " . mysqli_error($connection));

// $sql = "select * from comics";
// $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

// //create an array
// $emparray = array();
// while ($row = mysqli_fetch_assoc($result)) {
//     $emparray[] = $row;
// }

// $json = json_encode($emparray);

// //close the db connection
// mysqli_close($connection);
$json = file_get_contents("./dummy.json");
$obj = json_decode($json);
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>