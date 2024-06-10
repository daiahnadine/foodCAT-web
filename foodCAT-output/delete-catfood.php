<?php
    if(isset($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "firstconnection";
        $conn = new mysqli($servername, $username, $password, $database);

        if($conn->connect_error) {
            die("Connection failed: " .$conn->connect_error);
        }


        $sql = "DELETE FROM catfood WHERE catfood='$delete_id'";


        if ($conn->query($sql) === TRUE) {

            header("Location: ADMIN-dashboard.php");
            exit(); 
        } else {
            echo "Error deleting catfood: " . $conn->error;
        }


        $conn -> close();
    } else {
        header("Location: ADMIN-dashboard.php");
        exit();
    }
?>
