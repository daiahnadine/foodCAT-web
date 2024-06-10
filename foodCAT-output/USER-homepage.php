<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "firstconnection";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT catfood, price, quantity, image_path FROM catfood";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>FoodCAT Dashboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .dashboard {
            background-color: #E75480;
            padding: 5px;
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

        .cart-icon {
            width: 30px; 
            height: 25px;
            cursor: pointer;
        }

        .text-container {
            position: absolute;
            top: 0;
            left: 0;
            padding: 20px; 
            color: #333; 
        }

        h2 {
            font-size: 36px; 
            margin-top: 90px;
            margin-bottom: 10px;
            margin-left: 20px;
        }

        p {
            font-size: 20px;
            margin-top: 0; 
            margin-left: 20px;
        }

        .cat-food-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 50px;
        }

        .cat-food-item {
            width: 28%; 
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            overflow: hidden;
            transition: transform 0.3s ease; 
        }

        .cat-food-item:hover {
            transform: translateY(-10px);
        }

        .cat-food-item img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
        }

        .cat-food-details {
            padding: 20px;
            position: relative;
        }

        .cat-food-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        .cat-food-price {
            font-size: 16px;
            color: #FF1493;
            font-weight: bold;
        }

        .stock {
            font-size: 14px;
            color: #666;
            margin-top: 5px;
            font-weight: bold;
        }
        
        .add-to-cart-btn {
            background-color: #FF1493;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            position: absolute;
            bottom: 10px;
            right: 10px;
        }

        .add-to-cart-btn:hover {
            background-color: #FF0066;
        }

        .icons a {
            text-decoration: none;
            margin-left: 10px;
        }

        .icons a:last-child {
            margin-right: 10px;
        }

        .icons a:hover img {
            filter: brightness(0.8); 
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="top-bar">
            <div class="logo-container">
                <img src="images/black-cat.png" alt="FoodCAT Logo" class="cat-eye-logo">
                <div class="logo">FoodCAT</div>
            </div>
            <div class="icons">
                <a href="#"><button class="icon-btn"><i class="fas fa-search"></i></button></a>
                <a href="#" id="cart-icon"><button class="icon-btn"><i class="fas fa-shopping-cart"></i></button></a>
                <a href="LOGIN-PAGE.php"><button class="icon-btn"><i class="fas fa-sign-out-alt"></i></button></a>
            </div>
        </div>
    </div>

    <div class="text-container"> 
        <h2>Welcome to FoodCAT!</h2>
        <p>One stop shop for your hungry catto.</p>
        <div class="cat-food-container">
        <?php
        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
                echo '<div class="cat-food-item">';
                $image_path = 'images/';
                switch ($item['catfood']) {
                    case 'Powercat':
                        $image_path .= 'powercat.png';
                        break;
                    case 'Princess':
                        $image_path .= 'princess.png';
                        break;
                    case 'Meow Mix':
                        $image_path .= 'meow-mix.jpg';
                        break;
                    case '9 Lives':
                        $image_path .= '9lives.webp';
                        break;  
                    case 'Whiskas':
                        $image_path .= 'whiskas.webp';
                        break;  
                    case 'Special Cat':
                        $image_path .= 'special-cat.jpg';
                        break;            
                    case 'Friskies':
                        $image_path .= 'friskies.webp';
                        break;            
                    case 'Infinity':
                        $image_path .= 'infinity.jpg';
                        break;
                    case 'Aozi':
                        $image_path .= 'aozi.jpg';
                        break;
                    default:
                        $image_path .= 'default.png';
                        break;
                }
                echo '<img src="' . $image_path . '" alt="' . $item['catfood'] . '">';
                echo '<div class="cat-food-details">';
                echo '<div class="cat-food-name">' . $item['catfood'] . '</div>';
                echo '<div class="cat-food-price">P' . $item['price'] . '</div>';
                echo '<div class="stock">Available: ' . $item['quantity'] . '</div>';
                echo '<form method="POST">';
                echo '<input type="hidden" name="item_name" value="' . $item['catfood'] . '">';
                echo '<button type="submit" name="add_to_cart" class="add-to-cart-btn">ADD TO CART</button>';
                echo '</form>';
                echo '</div>'; 
                echo '</div>'; 
            }
        } else {
            echo '<p>No cat food data available.</p>';
        }
        $conn->close();
        ?>
        </div>
    </div>
</body>
</html>
