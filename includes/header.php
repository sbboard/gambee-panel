<?php
include("./includes/secrets.php");
require_once('protect.php');

$connection = mysqli_connect($sql_servername, $sql_username, $sql_password, "josuecru_gambee") or die("Error " . mysqli_error($connection));

$sql = "select * from comics";
$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

//create an array
$emparray = array();
while ($row = mysqli_fetch_assoc($result)) {
    $emparray[] = $row;
}

$json = json_encode($emparray);

//close the db connection
mysqli_close($connection);

$obj = json_decode($json);
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="./css/style.css">