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
    $new_catfood = $_POST["new_catfood"];
    $new_price = $_POST["new_price"];
    $new_quantity = $_POST["new_quantity"];

    $sql = "UPDATE catfood SET catfood='$new_catfood', price='$new_price', quantity='$new_quantity' WHERE catfood='$catfood'";

    if ($conn->query($sql) === TRUE) {
        echo "Catfood updated successfully";
    } else {
        echo "Error updating catfood: " . $conn->error;
    }

    $_SESSION["username"] = $username;
    echo "<script>alert('Update Successful!');
    window.location = 'ADMIN-dashboard.php';</script>";
}

if (isset($_GET['id'])) {
    $catfood = $_GET['id'];

    $sql = "SELECT * FROM catfood WHERE catfood='$catfood'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $catfood = $row['catfood'];
        $price = $row['price'];
        $quantity = $row['quantity'];
    } else {
        echo "No catfood found with the given name";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Catfood</title>
</head>

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

<body>
    <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h2>Edit Catfood</h2>
            <input type="hidden" name="catfood" value="<?php echo $catfood; ?>">
            <label for="catfood">Catfood:</label>
            <input type="text" name="new_catfood" value="<?php echo $catfood; ?>">

            <label for="price">Price:</label>
            <input type="number" name="new_price" value="<?php echo $price; ?>">

            <label for="quantity">Quantity:</label>
            <input type="number" name="new_quantity" value="<?php echo $quantity; ?>">

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
