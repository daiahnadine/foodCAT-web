<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$database_name = "FirstConnection";
$sql = "USE $database_name";
if ($conn->query($sql) === FALSE) {
    echo "Error selecting database: " . $conn->error;
}
?>
