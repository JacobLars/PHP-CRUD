<?php

class Player
{
    public $name;
    public $age;
    public $club;

    public $position;

    public $nationality;
    function __construct($name, $age, $club, $position, $nationality)
    {
        $this->name = $name;
        $this->age = $age;
        $this->club = $club;
        $this->position = $position;
        $this->nationality = $nationality;
    }
    function set_name($name)
    {
        $this->name = $name;
    }

    function get_name()
    {
        return $this->name;
    }

    function set_age($age)
    {
        $this->age = $age;
    }

    function get_age()
    {
        return $this->age;
    }

    function set_club($club)
    {
        $this->club = $club;
    }

    function get_club()
    {
        return $this->club;
    }

    function set_position($position)
    {
        $this->position = $position;
    }

    function get_position()
    {
        return $this->position;
    }

    function set_nationality($nationality)
    {
        $this->nationality = $nationality;
    }

    function get_nationality()
    {
        return $this->nationality;
    }

}


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "playersdb";

$conn = new mysqli($servername, $username, $password, $dbname) or die('unable to connect');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $club = $_POST['club'];
    $position = $_POST['position'];
    $nationality = $_POST['nationality'];

    $sql = "INSERT INTO players(name, age, club, position, nationality) VALUES ('$name', $age, '$club', '$position', '$nationality')";
    if ($conn->query($sql) === false) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM players";

$result = $conn->query($sql);

if($result === false){
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$table = '<table><tr><th>Name</th><th>Age</th><th>Club</th><th>Position</th><th>Nationality</th></tr>';

while ($row = $result->fetch_assoc()) {
    $table .= '<tr class="player_row"><td>'. $row["name"] .'</td><td>' . $row["age"] . '</td><td>' . $row["club"] . '</td><td>'. $row["position"]. '</td><td>'. $row["nationality"] .  '</td></tr>';
}

$table .= "</table";
echo $table;
$conn->close();

?>