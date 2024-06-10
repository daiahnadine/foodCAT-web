<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "firstconnection";


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $catfood = $_POST["catfood"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];

    $sql = "INSERT INTO catfood (catfood, price, quantity) VALUES ('$catfood', '$price', '$quantity')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Catfood added successfully"); 
        window.location.href = "ADMIN-dashboard.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Catfood</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #FF1493;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #FF0066;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h2>Add Catfood</h2>
            <label for="catfood">Catfood:</label>
            <input type="text" name="catfood" required><br>

            <label for="price">Price:</label>
            <input type="number" name="price" required><br>

            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" required><br>

            <button type="submit">Add</button>
        </form>
    </div>
</body>
</html>
