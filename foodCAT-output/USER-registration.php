<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "firstconnection";
    $conn = new mysqli($servername, $username, $password, $database);

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $lastName = $_POST["lastName"];
        $firstName = $_POST["firstName"];
        $middleName = $_POST["middleName"];
        $address = $_POST["address"];
        $contactNum = $_POST["contactNum"];   
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        $check = "SELECT * FROM user WHERE username='$username' OR email='$email'";
        $result = mysqli_query($conn, $check);
        if (mysqli_num_rows($result) > 0) {
            echo "Username or email already exists.";
            exit; 
        }

        $insert = "INSERT INTO user (lastName, firstName, middleName, address, contactNum, email,
        username, password) VALUES ('$lastName', '$firstName', '$middleName', '$address',
        '$contactNumber', '$email', '$username', '$password')";
        
        if(mysqli_query($conn, $insert)) {
            echo "Record inserted successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        $_SESSION["username"] = $username;
        echo "<script>alert('SIGN UP COMPLETE!');
        window.location = 'login.php';</script>";
    }

    $conn->close();
?>
