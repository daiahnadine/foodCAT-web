<?php
session_start();

require_once "connect.php";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $entered_username = $_POST['username'];
        $entered_password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM user WHERE username=? AND password=?");
        $stmt->bind_param("ss", $entered_username, $entered_password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $row['username'];
            header("Location: USER-homepage.php");
            exit;
        } else {
            $error = "Invalid username or password!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
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
  padding: 40px;
  border-radius: 8px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.login-form h2 {
  margin-bottom: 20px;
  text-align: center;
  color: #333;
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
  color: #666;
}

input[type="text"],
input[type="password"],
select {
  width: 93%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
  width: 100%;
  padding: 10px;
  background-color: #FF1493;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
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
</head>
<body>
<div class="container">
    <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <h2>User Login</h2>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" required>
      </div>
      <button type="submit">Login</button>
      <?php if (!empty($error)) { ?>
        <p><?php echo $error; ?></p>
      <?php } ?>
      <p>Don't have an account? <a href="create-account.php">Create Account</a></p>
    </form>
</div>
</body>
</html>
