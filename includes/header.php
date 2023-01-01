<?php
include("./includes/secrets.php");
require_once('protect.php');

$conn = new mysqli($sql_servername, $sql_username, $sql_password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="./css/style.css">