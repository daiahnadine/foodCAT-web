<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodCAT</title>
</head>
<style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #fff;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-form {
    background-color: #f2f2f2;
    padding: 45px;
    border-radius: 10px;
    box-shadow: 20px 20px 20px rgba(0.1, 0.1, 0.1, 0.1);
    text-align: center; 
}

.logo-container {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
}

.logo {
    width: 75px; 
    height: auto;
    margin-right: 10px; 
}

.logo + h1 {
    margin: 0;
    color: #333;
}

button {
    width: 100%;
    padding: 15px;
    background-color: #FF1493;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-bottom: 10px;
}

button:hover {
    background-color: #FF0066;
}

p {
    margin-top: 15px;
    text-align: center;
}

a {
    color: #FF1493;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
</style>

<body>
    <div class="container">
        <form class="login-form">
            <div class="logo-container">
                <img src="images/black-cat.png" alt="FoodCAT Logo" class="logo">
                <h1>FoodCAT</h1>
            </div>
            <a href="user-login.php"><button type="button">User</button></a>
            <a href="admin-login.php"><button type="button">Admin</button></a>
            <p>Don't have an account? <a href="create-account.php">Create Account</a></p>
        </form>
    </div>
</body>
</html>
