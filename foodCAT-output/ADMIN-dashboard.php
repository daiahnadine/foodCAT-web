<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            flex-direction: column; 
        }

        table {
            width: 100%;
            max-width: 800px;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #bbb;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        button {
            background: none;
            border: none;
            cursor: pointer;
        }

        .button-icons i {
            color: #333;
            font-size: 18px;
        }

        .button-icons i:hover {
            color: #FF1493;
        }
        
        .dashboard {
            background-color: #E75480;
            padding: 10px;
            text-align: center;
            margin-bottom: 20px; 
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo-container .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .cat-eye-logo {
            width: 75px;
            height: auto;
            margin-right: 10px;
        }
        
        .icon-btn {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            font-size: 24px;
            color: black; 
        }

        .icon-btn:hover {
            color: #333; 
        }
    </style>
</head>
<body>

<div class="container">
    <div class="dashboard">
        <div class="top-bar">
            <div class="logo-container">
                <img src="images/black-cat.png" alt="FoodCAT Logo" class="cat-eye-logo">
                <div class="logo">FoodCAT</div>
            </div>
            <div class="icons">
                <a href="LOGIN-PAGE.php"><button class="icon-btn"><i class="fas fa-sign-out-alt"></i></button></a>
            </div>
        </div>
    <table>
        <tr>
            <th>Catfood</th>
            <th>Price</th>
            <th>Quantity</th>
            <th colspan="3">Actions</th>
        </tr>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "firstconnection";
        $conn = new mysqli($servername, $username, $password, $database);

        if($conn->connect_error) {
            die("Connection failed: " .$conn->connect_error);
        }

        $sql = "SELECT * FROM catfood";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result ->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" .$row["catfood"]. "</td>";
                echo "<td>" .$row["price"]. "</td>";
                echo "<td>" .$row["quantity"]. "</td>";
                echo "<td class='button-icons'><a href='edit-catfood.php?id=".$row['catfood']."'><button><i class='fas fa-edit'></i></button></a></td>";
                echo "<td class='button-icons'><a href='add-catfood.php'><button><i class='fas fa-plus'></i></button></a></td>";
                echo "<td class='button-icons'><a href='delete-catfood.php?delete_id=".$row['catfood']."'><button><i class='fas fa-trash-alt'></i></button></a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No results</td>";
            echo "<td class='button-icons'><a href='add-catfood.php'><button><i class='fas fa-plus'></i></button></a></td>";
            echo "<td class='button-icons'><a href='edit-catfood.php?id='><button><i class='fas fa-edit'></i></button></a></td>";
            echo "<td class='button-icons'><a href='delete-catfood.php?delete_id='><button><i class='fas fa-trash-alt'></i></button></a></td></tr>";
        }

        $conn -> close();
        ?>
    </table>
</div>

</body>
</html>
