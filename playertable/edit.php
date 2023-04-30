<!DOCTYPE html>
<html>
<head>
	<title>Edit Player</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
    <a id="back_link" href="index.php">Back</a>

    
<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "playersdb";

$conn = new mysqli($servername, $username, $password, $dbname) or die('unable to connect');

$id = $_GET['id'];

$sql = "SELECT * FROM playersdb.players WHERE ID = '$id'";
$result = $conn->query($sql);
if ($result === false) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form values
    $name = $_POST['name'];
    $age = $_POST['age'];
    $club = $_POST['club'];
    $position = $_POST['position'];
    $nationality = $_POST['nationality'];

    // Update the record in the database
    $sql = "UPDATE players SET name='$name', age=$age, club='$club', position='$position', nationality='$nationality' WHERE id=$id";
    if ($conn->query($sql) === false) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Redirect the user to index.php
    header("Location: index.php");
    exit;
}

$editForm = '<form action="edit.php?id=' . $id . '" method="POST">';
while ($row = $result->fetch_assoc()) {
    $editForm .= '<label>Name: </label>'.
    '<input type="text" name="name" value=' . '"' . $row["name"] . '">'   .
    '<label>Age: </label>'.
    '<input type="number" name="age" value=' . '"' . $row["age"] . '">'.
    '<label>Club: </label>'.
    '<input type="text" name="club" value=' . '"' . $row["club"] . '">'.
    '<label>Position: </label>'.
    '<input type="text" name="position" value=' . '"' . $row["position"] . '">'.
    '<label>Nationality: </label>'.
    '<input type="text" name="nationality" value=' . '"' . $row["nationality"] . '">'.
    '<input type="submit" value="Edit Player">';
}

$editForm .= '</form>';
echo $editForm;

$conn->close();

?>
</body>
</html>