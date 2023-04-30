<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "playersdb";

$conn = new mysqli($servername, $username, $password, $dbname) or die('unable to connect');

$id = $_GET['id'];

$sql = "DELETE FROM players WHERE id = '$id'";
if ($conn->query($sql) === false) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: index.php");
exit();
?>