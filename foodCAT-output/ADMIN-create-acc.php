<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #333333; 
            margin: 0;
            padding: 0;
        }


        form {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-form {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 20px 20px 20px rgba(0.1, 0.1, 0.1, 0.1);
        }


        label {
            display: block;
            margin-bottom: 5px;
            color: #333333;
        }

        .create-account-form h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

    
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: calc(100% - 10px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #cccccc;
            border-radius: 5px;
        }

  
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #ff69b4;
            color: #ffffff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #ff4f96; 
        }

        button {
            width: 100%;
            padding: 10px;
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

    </style>
</head>
<body>
    <div class="container">
        <form action="ADMIN-registration.php" method="post" class="create-account-form">
            <h2>CREATE ACCOUNT</h2>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
            
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required><br>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required><br>

            <label for="middleName">Middle Name:</label>
            <input type="text" id="middleName" name="middleName" required><br>

            <label for="contactNum">Contact Number:</label>
            <input type="text" id="contactNum" name="contactNum" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            
            <button type="submit">Create Account</button>
        </form>
    </div>
</body>
</html>
